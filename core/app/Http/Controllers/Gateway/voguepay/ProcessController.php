<?php

namespace App\Http\Controllers\Gateway\voguepay;

use App\Deposit;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{
    /*
     * Vogue Pay Gateway
     */

    public static function process($deposit)
    {
        $vogueAcc = json_decode($deposit->gateway_currency()->gateway_parameter);
        $send['v_merchant_id'] = $vogueAcc->merchant_id;


        $alias = $deposit->gateway->alias;

        $send['notify_url'] = route('ipn.'.$alias);
        $send['cur'] = $deposit->method_currency;
        $send['merchant_ref'] = $deposit->trx;
        $send['memo'] = 'Payment';
        $send['store_id'] = $deposit->user_id;
        $send['custom'] = $deposit->trx;
        $send['Buy'] = round($deposit->final_amo,2);
        $send['view'] = 'user.payment.voguepay';
        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required'
        ]);

        $trx = $request->transaction_id;
        $req_url = "https://voguepay.com/?v_transaction_id=$trx&type=json";
        $vougueData = curlContent($req_url);
        $vougueData = json_decode($vougueData);
        $track = $vougueData->merchant_ref;

        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        $vogueAcc = json_decode($data->gateway_currency()->gateway_parameter);
        if ($vougueData->status == "Approved" && $vougueData->merchant_id == $vogueAcc->merchant_id && $vougueData->total == getAmount($data->final_amo) && $vougueData->cur_iso == $data->method_currency &&  $data->status == '0') {
            //Update User Data
            PaymentController::userDataUpdate($data->trx);
            session()->forget('pricePlan');
        }
    }
}
