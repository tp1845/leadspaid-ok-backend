<?php

namespace App\Http\Controllers\Gateway\skrill;

use App\Deposit;
use App\GeneralSetting;
use App\Http\Controllers\Gateway\PaymentController;
use App\Http\Controllers\Controller;
use Session;

class ProcessController extends Controller
{

    /*
     * Skrill Gateway
     */
    public static function process($deposit)
    {
        $basic =  GeneralSetting::first();
        $skrillAcc = json_decode($deposit->gateway_currency()->gateway_parameter);


        $val['pay_to_email'] = trim($skrillAcc->pay_to_email);
        $val['transaction_id'] = "$deposit->trx";

        $val['return_url'] = route(returnUrl());
        $val['return_url_text'] = "Return $basic->sitename";
        $val['cancel_url'] =  route(returnUrl());
        $val['status_url'] = route('ipn.'.$deposit->gateway->alias);
        $val['language'] = 'EN';
        $val['amount'] = round($deposit->final_amo,2);
        $val['currency'] = "$deposit->method_currency";
        $val['detail1_description'] = "$basic->sitename";
        $val['detail1_text'] = "Pay To $basic->sitename";
        $val['logo_url'] = asset('assets/images/logoIcon/logo.png');

        $send['val'] = $val;
        $send['view'] = 'user.payment.redirect';
        $send['method'] = 'post';
        $send['url'] = 'https://www.moneybookers.com/app/payment.pl';
        return json_encode($send);
    }


    public function ipn()
    {
        $data = Deposit::where('trx', $_POST['transaction_id'])->orderBy('id', 'DESC')->first();
        $SkrillrAcc = json_decode($data->gateway_currency()->gateway_parameter);
        $concatFields = $_POST['merchant_id']
            . $_POST['transaction_id']
            . strtoupper(md5($SkrillrAcc->secret_key))
            . $_POST['mb_amount']
            . $_POST['mb_currency']
            . $_POST['status'];

        if (strtoupper(md5($concatFields)) == $_POST['md5sig'] && $_POST['status'] == 2 && $_POST['pay_to_email'] == $SkrillrAcc->pay_to_email && $data->status = '0') {
            PaymentController::userDataUpdate($data->trx);
            session()->forget('pricePlan');
        }
    }
}
