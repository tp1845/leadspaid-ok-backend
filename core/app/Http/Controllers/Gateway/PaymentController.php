<?php

namespace App\Http\Controllers\Gateway;

use Session;
use App\User;
use App\Deposit;
use App\PricePlan;
use App\Advertiser;
use App\Transaction;
use App\AdvertiserPlan;
use App\GeneralSetting;
use App\GatewayCurrency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PaymentController extends Controller
{
  
    public function __construct()
    {
        return $this->activeTemplate = activeTemplate();
       
    }

    public function deposit($id = null)
    {
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $page_title = 'Deposit Methods';
    
        if(Route::current()->getName()=='user.payment'){
            $page_title = 'Payment methods';
            $plan = PricePlan::findOrFail($id);
            Session::put('pricePlan', $plan); 
        }

        return view($this->activeTemplate . 'user.payment.deposit', compact('gatewayCurrency', 'page_title'));
    }

    public function depositInsert(Request $request)
    {
        $pricePlan = session()->get('pricePlan');

        $request->validate([
            'amount' => 'required|numeric|min:0',
            'method_code' => 'required',
            'currency' => 'required',
        ]);

        if(isset($pricePlan) && $pricePlan->price != $request->amount){
             $notify[]=['error','Sorry Amount mismatch'];
             return back()->withNotify($notify);
        }

        $user = auth()->guard('advertiser')->user();

        $now = \Carbon\Carbon::now();
        if (session()->has('req_time') && $now->diffInSeconds(\Carbon\Carbon::parse(session('req_time'))) <= 2) {
            $notify[] = ['error', 'Please wait a moment, processing your deposit'];
            return redirect()->route('payment.preview')->withNotify($notify);
        }
        session()->put('req_time', $now);

        $gate = GatewayCurrency::where('method_code', $request->method_code)->where('currency', $request->currency)->first();


        if (!$gate) {
            $notify[] = ['error', 'Invalid Gateway'];
            return back()->withNotify($notify);
        }

        if ($gate->min_amount > $request->amount || $gate->max_amount < $request->amount) {
            $notify[] = ['error', 'Please Follow Deposit Limit'];
            return back()->withNotify($notify);
        }

        $charge = getAmount($gate->fixed_charge + ($request->amount * $gate->percent_charge / 100));
        $payable = getAmount($request->amount + $charge);
        $final_amo = getAmount($payable * $gate->rate);

        $depo['user_id'] = $user->id;
        $depo['method_code'] = $gate->method_code;
        $depo['method_currency'] = strtoupper($gate->currency);
        $depo['amount'] = $request->amount;
        $depo['charge'] = $charge;
        $depo['rate'] = $gate->rate;
        $depo['final_amo'] = getAmount($final_amo);
        $depo['btc_amo'] = 0;
        $depo['btc_wallet'] = "";
        $depo['trx'] = getTrx();
        $depo['try'] = 0;
        $depo['status'] = 0;
        $data = Deposit::create($depo);
        Session::put('Track', $data['trx']);
       
        if(session()->get('pricePlan')){

            return redirect()->route('user.payment.preview');
        }
        return redirect()->route('user.deposit.preview');
        
    }


    public function depositPreview()
    {

        $track = Session::get('Track');
        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->firstOrFail();
        if (is_null($data)) {
            $notify[] = ['error', 'Invalid Request'];
            return redirect()->route(returnUrl())->withNotify($notify);
        }
        if ($data->status != 0) {
            $notify[] = ['error', 'Invalid Request'];
            return redirect()->route(returnUrl())->withNotify($notify);
        }
        $page_title = 'Payment Preview';
         if(session()->get('pricePlan')){

             return view($this->activeTemplate . 'user.payment.preview', compact('data', 'page_title'));
         }
        return view($this->activeTemplate . 'user.payment.preview', compact('data', 'page_title'));
    }


    public function depositConfirm()
    {
        $track = Session::get('Track');
        $deposit = Deposit::where('trx', $track)->orderBy('id', 'DESC')->with('gateway')->first();
        if (is_null($deposit)) {
            $notify[] = ['error', 'Invalid Request'];
            return redirect()->route(returnUrl())->withNotify($notify);
        }
        if ($deposit->status != 0) {
            $notify[] = ['error', 'Invalid Request'];
            return redirect()->route(returnUrl())->withNotify($notify);
        }

        if ($deposit->method_code >= 1000) {
            $this->userDataUpdate($deposit);
            $notify[] = ['success', 'Your payment request is queued for approval.'];
            return back()->withNotify($notify);
        }


        $dirName = $deposit->gateway->alias;
        $new = __NAMESPACE__ . '\\' . $dirName . '\\ProcessController';

        $data = $new::process($deposit);
        $data = json_decode($data);


        if (isset($data->error)) {
            $notify[] = ['error', $data->message];
            return redirect()->route(returnUrl())->withNotify($notify);
        }
        if (isset($data->redirect)) {
            return redirect($data->redirect_url);
        }

        // for Stripe V3
        if(@$data->session){
            $deposit->btc_wallet = $data->session->id;
            $deposit->save();
        }

        $page_title = 'Payment Confirm';
        return view($this->activeTemplate . $data->view, compact('data', 'page_title', 'deposit'));
    }


    public static function userDataUpdate($trx)
    {
        $gnl = GeneralSetting::first();
        $data = Deposit::where('trx', $trx)->first();
        $pricePlan = session()->get('pricePlan');
        
        if ($data->status == 0) {
            $data['status'] = 1;
            $data->update();

            $user = Advertiser::findOrFail($data->user_id);
            if($pricePlan==null){
               
               $user->balance += $data->amount;
               $user->update();
              
            } else{
                if($pricePlan->type==='impression')
                {
                    $user->impression_credit += $pricePlan->credit;
                    
                }
                else
                {
                    $user->click_credit += $pricePlan->credit;
                    
                }
                
                $user->update();
                $advPlans['advertiser_id'] = $user->id ;
                $advPlans['price_plan_id'] = $pricePlan->id;
                $advPlans['plan_type'] = $pricePlan->type;
                AdvertiserPlan::updateOrCreate($advPlans);
            }

            $gateway = $data->gateway;
            $transaction = new Transaction();
            $transaction->user_id = $data->user_id;
            $transaction->amount = $data->amount;
            $transaction->post_balance = getAmount($user->balance);
            $transaction->charge = getAmount($data->charge);
            $transaction->trx_type = '+';
            $transaction->details = $pricePlan?$pricePlan->name.'Plan purchased': 'Payment Via ' . $gateway->name;
            $transaction->trx = $data->trx;
            $transaction->date = Carbon::now();
            $transaction->save();


            if($pricePlan){
                notify($user, 'PLAN_PURCHASED', [
                    'plan' => $pricePlan->name,
                    'credit'=> $pricePlan->credit,
                    'type' => $pricePlan->type,
                    'method_name' => $data->gateway_currency()->name,
                    'method_currency' => $data->method_currency,
                    'method_amount' => getAmount($data->final_amo),
                    'amount' => getAmount($data->amount),
                    'currency' => $gnl->cur_text,
                    'rate' => getAmount($data->rate),
                    'trx' => $data->trx,
                    'post_balance' => getAmount($user->balance)
                ]);
            } else {
                notify($user, 'DEPOSIT_COMPLETE', [
                    'method_name' => $data->gateway_currency()->name,
                    'method_currency' => $data->method_currency,
                    'method_amount' => getAmount($data->final_amo),
                    'amount' => getAmount($data->amount),
                    'charge' => getAmount($data->charge),
                    'currency' => $gnl->cur_text,
                    'rate' => getAmount($data->rate),
                    'trx' => $data->trx,
                    'post_balance' => getAmount($user->balance)
                ]);
            }
            

            


        }
    }

    public function manualDepositConfirm()
    {
        $track = Session::get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
           
            return  session()->get('pricePlan') ? redirect()->route('advertiser.price.plan'):redirect()->route('user.deposit');
        }
        if ($data->status != 0) {
            return  session()->get('pricePlan') ? redirect()->route('advertiser.price.plan'):redirect()->route('user.deposit');
        }
        if ($data->method_code > 999) {

            $page_title = 'Deposit Confirm';
            $method = $data->gateway_currency();
            return view($this->activeTemplate . 'user.manual_payment.manual_confirm', compact('data', 'page_title', 'method'));
        }
        abort(404);
    }

    public function manualDepositUpdate(Request $request)
    {
        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return  session()->get('pricePlan') ? redirect()->route('advertiser.price.plan'):redirect()->route('user.deposit');
        }
        if ($data->status != 0) {
            return  session()->get('pricePlan') ? redirect()->route('advertiser.price.plan'):redirect()->route('user.deposit');
        }

        $params = json_decode($data->gateway_currency()->gateway_parameter);

        $rules = [];
        $inputField = [];
        $verifyImages = [];

        if ($params != null) {
            foreach ($params as $key => $cus) {
                $rules[$key] = [$cus->validation];
                if ($cus->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], 'mimes:jpeg,jpg,png');
                    array_push($rules[$key], 'max:2048');

                    array_push($verifyImages, $key);
                }
                if ($cus->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($cus->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }


        $this->validate($request, $rules);


        $directory = date("Y")."/".date("m")."/".date("d");
        $path = imagePath()['verify']['deposit']['path'].'/'.$directory;


        $collection = collect($request);

        $reqField = [];
        if ($params != null) {
            foreach ($collection as $k => $v) {

                foreach ($params as $inKey => $inVal) {
                    if ($k != $inKey) {
                        continue;
                    } else {
                        if ($inVal->type == 'file') {
                            if ($request->hasFile($inKey)) {

                                try {
                                    $reqField[$inKey] = [
                                        'field_name' => $directory.'/'.uploadImage($request[$inKey], $path),
                                        'type' => $inVal->type,
                                    ];
                                } catch (\Exception $exp) {
                                    $notify[] = ['error', 'Could not upload your ' . $inKey];
                                    return back()->withNotify($notify)->withInput();
                                }
                            }
                        } else {
                            $reqField[$inKey] = $v;
                            $reqField[$inKey] = [
                                'field_name' => $v,
                                'type' => $inVal->type,
                            ];
                        }
                    }
                }
            }
            $data->detail = $reqField;
        } else {
            $data->detail = null;
        }



        $data->status = 2; // pending
        if(session()->get('pricePlan')){
            $data->payment_stat = session()->get('pricePlan')->id;
        }
        $data->update();

        $gnl = GeneralSetting::first();
        if(session('pricePlan')){
            notify($data->user, 'PURCHASE_REQUEST', [
                'name' => session('pricePlan')->name,
                'credit'=> session('pricePlan')->credit,
                'type' => session('pricePlan')->type,
                'method_name' => $data->gateway_currency()->name,
                'method_currency' => $data->method_currency,
                'method_amount' => getAmount($data->final_amo),
                'amount' => getAmount($data->amount),
                'charge' => getAmount($data->charge),
                'currency' => $gnl->cur_text,
                'rate' => getAmount($data->rate),
                'trx' => $data->trx
            ]);
        } else {
            notify($data->user, 'DEPOSIT_REQUEST', [
                'method_name' => $data->gateway_currency()->name,
                'method_currency' => $data->method_currency,
                'method_amount' => getAmount($data->final_amo),
                'amount' => getAmount($data->amount),
                'charge' => getAmount($data->charge),
                'currency' => $gnl->cur_text,
                'rate' => getAmount($data->rate),
                'trx' => $data->trx
            ]);

        }

        if(session()->get('pricePlan')){
            $notify[] = ['success', 'Your payment request has been taken.'];
            return redirect()->route('advertiser.price.plan')->withNotify($notify);
        }
        $notify[] = ['success', 'You have deposit request has been taken.'];
        return redirect()->route('user.deposit.history')->withNotify($notify);
    }


}
