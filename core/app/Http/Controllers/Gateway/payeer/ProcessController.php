<?php

namespace App\Http\Controllers\Gateway\payeer;

use App\Deposit;
use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /*
     * Payeer Gateway
     */

    public static function process($deposit)
    {
        $PayeerAcc = json_decode($deposit->gateway_currency()->gateway_parameter);
        $basic =  GeneralSetting::first();
        $arHash = [trim($PayeerAcc->merchant_id), $deposit->trx, round($deposit->final_amo,2), $deposit->method_currency, base64_encode("Pay To $basic->sitename")];
        $arHash[] = $PayeerAcc->secret_key;
        $val['m_shop'] = trim($PayeerAcc->merchant_id);
        $val['m_orderid'] = $deposit->trx;
        $val['m_amount'] = round($deposit->final_amo,2);
        $val['m_curr'] = $deposit->method_currency;
        $val['m_desc'] = base64_encode("Pay To $basic->sitename");
        $val['m_sign'] = strtoupper(hash('sha256', implode(":", $arHash)));
        $send['val'] = $val;
        $send['view'] = 'user.payment.redirect';
        $send['method'] = 'get';
        $send['url'] = 'https://payeer.com/merchant';


        return json_encode($send);
    }


    public function ipn(Request $request)
    {
        if (isset($_POST["m_operation_id"]) && isset($_POST["m_sign"])) {

            $data = Deposit::where('trx', $_POST['m_orderid'])->orderBy('id', 'DESC')->first();
            $PayeerAcc = json_decode($data->gateway_currency()->gateway_parameter);
            $sign_hash = strtoupper(hash('sha256', implode(":", array(
                $_POST['m_operation_id'],
                $_POST['m_operation_ps'],
                $_POST['m_operation_date'],
                $_POST['m_operation_pay_date'],
                $_POST['m_shop'],
                $_POST['m_orderid'],
                $_POST['m_amount'],
                $_POST['m_curr'],
                $_POST['m_desc'],
                $_POST['m_status'],
                $PayeerAcc->secret_key
            ))));

            if ($_POST["m_sign"] != $sign_hash) {
                $notify[] = ['error', 'The digital signature did not matched.'];
            } else {
                if ($_POST['m_amount'] == getAmount($data->final_amo) && $_POST['m_curr'] == $data->method_currency && $_POST['m_status'] == 'success' && $data->status == '0') {
                    PaymentController::userDataUpdate($data->trx);
                    $notify[] = ['success', returnMsg()];
                } else {
                    $notify[] = ['error', 'Payment Failed.'];
                }
            }
        } else {
            $notify[] = ['error', 'Payment Failed.'];
        }
       
        return redirect()->route(returnUrl())->withNotify($notify);
    }
}
