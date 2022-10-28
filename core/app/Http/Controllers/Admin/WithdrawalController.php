<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Publisher;
use App\Transaction;
use App\User;
use App\WithdrawMethod;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function pending()
    {
        $page_title = 'Pending Withdrawals';
        $withdrawals = Withdrawal::where('status', 2)->with(['publisher','method'])->latest()->paginate(getPaginate());
        $empty_message = 'No withdrawal is pending';
        $type = 'pending';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message','type'));
    }
    public function approved()
    {
        $page_title = 'Approved Withdrawals';
        $withdrawals = Withdrawal::where('status', 1)->with(['publisher','method'])->latest()->paginate(getPaginate());
        $empty_message = 'No withdrawal is approved';
        $type = 'approved';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message','type'));
    }

    public function rejected()
    {
        $page_title = 'Rejected Withdrawals';
        $withdrawals = Withdrawal::where('status', 3)->with(['publisher','method'])->latest()->paginate(getPaginate());
        $empty_message = 'No withdrawal is rejected';
        $type = 'rejected';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message','type'));
    }

    public function log()
    {
        $page_title = 'Withdrawals Log';
        $withdrawals = Withdrawal::where('status', '!=', 0)->with(['publisher','method'])->latest()->paginate(getPaginate());
        $empty_message = 'No withdrawal history';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message'));
    }


    public function logViaMethod($method_id,$type = null){
        $method = WithdrawMethod::findOrFail($method_id);
        if ($type == 'approved') {
            $page_title = 'Approved Withdrawal Via '.$method->name;
            $withdrawals = Withdrawal::where('status', 1)->with(['publisher','method'])->latest()->paginate(getPaginate());
        }elseif($type == 'rejected'){
            $page_title = 'Rejected Withdrawals Via '.$method->name;
            $withdrawals = Withdrawal::where('status', 3)->with(['publisher','method'])->latest()->paginate(getPaginate());

        }elseif($type == 'pending'){
            $page_title = 'Pending Withdrawals Via '.$method->name;
            $withdrawals = Withdrawal::where('status', 2)->with(['publisher','method'])->latest()->paginate(getPaginate());
        }else{
            $page_title = 'Withdrawals Via '.$method->name;
            $withdrawals = Withdrawal::where('status', '!=', 0)->with(['publisher','method'])->latest()->paginate(getPaginate());
        }
        $empty_message = 'Withdraw Log Not Found';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message','method'));
    }


    public function search(Request $request, $scope)
    {
        $search = $request->search;
        $page_title = '';
        $empty_message = 'No search result found.';

        $withdrawals = Withdrawal::with(['publisher', 'method'])->where('status','!=',0)->where(function ($q) use ($search) {
            $q->where('trx', 'like',"%$search%")
                ->orWhereHas('publisher', function ($user) use ($search) {
                    $user->where('username', 'like',"%$search%");
                });
        });

        switch ($scope) {
            case 'pending':
                $page_title .= 'Pending Withdrawal Search';
                $withdrawals = $withdrawals->where('status', 2);
                break;
            case 'approved':
                $page_title .= 'Approved Withdrawal Search';
                $withdrawals = $withdrawals->where('status', 1);
                break;
            case 'rejected':
                $page_title .= 'Rejected Withdrawal Search';
                $withdrawals = $withdrawals->where('status', 3);
                break;
            case 'log':
                $page_title .= 'Withdrawal History Search';
                break;
        }

        $withdrawals = $withdrawals->paginate(getPaginate());
        $page_title .= ' - ' . $search;

        return view('admin.withdraw.withdrawals', compact('page_title', 'empty_message', 'search', 'scope', 'withdrawals'));
    }

    public function dateSearch(Request $request,$scope){
        $search = $request->date;
        if (!$search) {
            return back();
        }
        $date = explode('-',$search);
        $notify[]=['error','Invalid Date'];
        if(!(@strtotime($date[0]))){
            return back()->withNotify($notify);
        }
        if(isset($date[1]) && !strtotime($date[1])){
            return back()->withNotify($notify);
        }
        $start = @$date[0];
        $end = @$date[1];
        if ($start) {
            $withdrawals = Withdrawal::where('status','!=',0)->where('created_at','>',Carbon::parse($start)->subDays(1))->where('created_at','<=',Carbon::parse($start)->addDays(1));
        }
        if($end){
            $withdrawals = Withdrawal::where('status','!=',0)->where('created_at','>',Carbon::parse($start)->subDays(1))->where('created_at','<',Carbon::parse($end));
        }
        if ($request->method) {
            $method = WithdrawMethod::findOrFail($request->method);
            $withdrawals = $withdrawals->where('method_id',$method->id);
        }

        switch ($scope) {
            case 'pending':
                $withdrawals = $withdrawals->where('status', 2);
                break;
            case 'approved':
                $withdrawals = $withdrawals->where('status', 1);
                break;
            case 'rejected':
                $withdrawals = $withdrawals->where('status', 3);
                break;
        }

        $withdrawals = $withdrawals->with(['publisher', 'method'])->paginate(getPaginate());
        $page_title = 'Withdraw Log';
        $empty_message = 'No Withdrawals Found';
        $dateSearch = $search;
        return view('admin.withdraw.withdrawals', compact('page_title', 'empty_message', 'dateSearch', 'withdrawals','scope'));


    }

    public function details($id)
    {
        $general = GeneralSetting::first();
        $withdrawal = Withdrawal::where('id',$id)->where('status', '!=', 0)->with(['publisher','method'])->firstOrFail();
        $page_title = $withdrawal->publisher->username.' Withdraw Requested ' . getAmount($withdrawal->amount) . ' '.$general->cur_text;
        $details = ($withdrawal->withdraw_information != null) ? json_encode($withdrawal->withdraw_information) : null;



        $methodImage =  getImage(imagePath()['withdraw']['method']['path'].'/'. $withdrawal->method->image,'800x800');

        return view('admin.withdraw.detail', compact('page_title', 'withdrawal','details','methodImage'));
    }

    public function approve(Request $request)
    {
        $request->validate(['id' => 'required|integer']);
        $withdraw = Withdrawal::where('id',$request->id)->where('status',2)->with('publisher')->firstOrFail();
        $withdraw->status = 1;
        $withdraw->admin_feedback = $request->details;
        $withdraw->save();

        $general = GeneralSetting::first();
        notify($withdraw->publisher, 'WITHDRAW_APPROVE', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => getAmount($withdraw->final_amount),
            'amount' => getAmount($withdraw->amount),
            'charge' => getAmount($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => getAmount($withdraw->rate),
            'trx' => $withdraw->trx,
            'admin_details' => $request->details
        ]);

        $notify[] = ['success', 'Withdrawal Marked  as Approved.'];
        return redirect()->route('admin.withdraw.pending')->withNotify($notify);
    }


    public function reject(Request $request)
    {
        $general = GeneralSetting::first();
        $request->validate(['id' => 'required|integer']);
        $withdraw = Withdrawal::where('id',$request->id)->where('status',2)->firstOrFail();

        $withdraw->status = 3;
        $withdraw->admin_feedback = $request->details;
        $withdraw->save();

        $user = Publisher::find($withdraw->user_id);
        $user->earnings += getAmount($withdraw->amount);
        $user->save();



            $transaction = new Transaction();
            $transaction->user_id = $withdraw->user_id;
            $transaction->amount = $withdraw->amount;
            $transaction->post_balance = getAmount($user->balance);
            $transaction->charge = 0;
            $transaction->trx_type = '+';
            $transaction->details = getAmount($withdraw->amount) . ' ' . $general->cur_text . ' Refunded from Withdrawal Rejection';
            $transaction->trx = $withdraw->trx;
            $transaction->save();


        

        notify($user, 'WITHDRAW_REJECT', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => getAmount($withdraw->final_amount),
            'amount' => getAmount($withdraw->amount),
            'charge' => getAmount($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => getAmount($withdraw->rate),
            'trx' => $withdraw->trx,
            'post_balance' => getAmount($user->earnings),
            'admin_details' => $request->details
        ]);

        $notify[] = ['success', 'Withdrawal has been rejected.'];
        return redirect()->route('admin.withdraw.pending')->withNotify($notify);
    }

}
