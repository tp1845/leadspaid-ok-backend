<?php

namespace App\Http\Controllers\Gateway\mollie;

use App\Deposit;
use App\GeneralSetting;
use App\Http\Controllers\Gateway\PaymentController;
use App\Http\Controllers\Controller;
use Mollie\Laravel\Facades\Mollie;

class ProcessController extends Controller
{

    /*
     * Paypal Gateway
     */
    public static function process($deposit)
    {
        $basic =  GeneralSetting::first();
        $mollieAcc = json_decode($deposit->gateway_currency()->gateway_parameter);

        config(['mollie.key' => trim($mollieAcc->api_key)]);

        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => "$deposit->method_currency",
                'value' => ''.sprintf('%0.2f', round($deposit->final_amo,2)).'', // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => "Payment To $basic->sitename Account",
            'redirectUrl' => route('ipn.mollie'),
            'metadata' => [
                "order_id" => $deposit->trx,
            ],
        ]);


        $payment = Mollie::api()->payments()->get($payment->id);


        session()->put('payment_id',$payment->id);
        session()->put('deposit_id',$deposit->id);


        $send['redirect'] = true;
        $send['redirect_url'] = $payment->getCheckoutUrl();

        return json_encode($send);
    }
    public function ipn()
    {
        $deposit_id = session()->get('deposit_id');
        if($deposit_id ==  null){
            return redirect()->route('home');
        }

        $deposit = Deposit::where('id',$deposit_id)->where('status',0)->first();

        $mollieAcc = json_decode($deposit->gateway_currency()->gateway_parameter);
        config(['mollie.key' => trim($mollieAcc->api_key)]);
        $payment = Mollie::api()->payments()->get(session()->get('payment_id'));
        if ($payment->status == "paid") {
            PaymentController::userDataUpdate($deposit->trx);
            $notify[] = ['success', returnMsg()];
        }else{
            $notify[] = ['error', 'Invalid Request.'];
        }

        session()->forget('deposit_id');
        session()->forget('payment_id');

       

        return redirect()->route(returnUrl())->withNotify($notify);

    }
}
