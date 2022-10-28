<?php

namespace App\Http\Controllers\Gateway\paystack;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;
use Auth;

class ProcessController extends Controller
{
    /*
     * PayStack Gateway
     */

    public static function process($deposit)
    {
        $paystackAcc = json_decode($deposit->gateway_currency()->gateway_parameter);

        $alias = $deposit->gateway->alias;


        $send['key'] = $paystackAcc->public_key;
        $send['email'] = Auth::guard('advertiser')->user()->email;
        $send['amount'] = $deposit->final_amo * 100;
        $send['currency'] = $deposit->method_currency;
        $send['ref'] = $deposit->trx;
        $send['view'] = 'user.payment.'.$alias;
        return json_encode($send);
    }



    public function ipn(Request $request)
    {
        $request->validate([
            'reference' => 'required',
            'paystack-trxref' => 'required',
        ]);

        $track = $request->reference;
        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        $paystackAcc = json_decode($data->gateway_currency()->gateway_parameter);
        $secret_key = $paystackAcc->secret_key;

        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = 'https://api.paystack.co/transaction/verify/' . $track;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $secret_key]);
        $r = curl_exec($ch);
        curl_close($ch);

        if ($r) {
            $result = json_decode($r, true);
            if ($result) {
                if ($result['data']) {
                    if ($result['data']['status'] == 'success') {

                        $am = $result['data']['amount'];
                        $sam = round($data->final_amo, 2) * 100;

                        if ($am == $sam && $result['data']['currency'] == $data->method_currency  && $data->status == '0') {
                            PaymentController::userDataUpdate($data->trx);
                            $notify[] = ['success', returnMsg()];
                        } else {
                            $notify[] = ['error', 'Less Amount Paid. Please Contact With Admin'];
                        }
                    } else {
                        $notify[] = ['error', $result['data']['gateway_response']];
                    }
                } else {
                    $notify[] = ['error', $result['message']];
                }
            } else {
                $notify[] = ['error', 'Something went wrong while executing'];
            }
        } else {
            $notify[] = ['error', 'Something went wrong while executing'];
        }
       
        return redirect()->route(returnUrl())->withNotify($notify);
    }
}
