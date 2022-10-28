<?php

namespace App\Http\Controllers\Gateway\coinpayments_fiat;

use App\Deposit;
use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /*
     * CoinPaymentHosted Gateway
     */

    public static function process($deposit)
    {
        $basic =  GeneralSetting::first();
        $coinpayAcc = json_decode($deposit->gateway_currency()->gateway_parameter);

        $val['merchant'] = $coinpayAcc->merchant_id;
        $val['item_name'] = 'Payment to ' . $basic->sitename;
        $val['currency'] = $deposit->method_currency;
        $val['currency_code'] = "$deposit->method_currency";
        $val['amountf'] = $deposit->final_amo;
        $val['ipn_url'] =  route('ipn.'.$deposit->gateway->alias);
        $val['custom'] = "$deposit->trx";
        $val['amount'] = round($deposit->final_amo,2);
        $val['return'] = route('user.deposit');
        $val['cancel_return'] = route('user.deposit');
        $val['notify_url'] = route('ipn.'.$deposit->gateway->alias);
        $val['success_url'] = route(returnUrl());
        $val['cancel_url'] = route(returnUrl());
        $val['custom'] = $deposit->trx;
        $val['cmd'] = '_pay_simple';
        $val['want_shipping'] = 0;
        $send['val'] = $val;
        $send['view'] = 'user.payment.redirect';
        $send['method'] = 'post';
        $send['url'] = 'https://www.coinpayments.net/index.php';

        return json_encode($send);
    }

    public function ipn(Request $request)
    {

        $track = $request->custom;
        $status = $request->status;
        $amount1 = floatval($request->amount1);
        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();

        if ($status >= 100 || $status == 2) {
            $coinPayAcc = json_decode($data->gateway_currency()->gateway_parameter);

            if ($data->method_currency == $request->currency1 && $data->final_amo <= $amount1  && $coinPayAcc->merchant_id == $request->merchant && $data->status == '0') {
                PaymentController::userDataUpdate($data->trx);
            }
        }
    }
}
