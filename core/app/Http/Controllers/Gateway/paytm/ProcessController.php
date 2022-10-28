<?php

namespace App\Http\Controllers\Gateway\paytm;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{
    /*
     * PayTM Gateway
     */

    public static function process($deposit)
    {
        $PayTmAcc = json_decode($deposit->gateway_currency()->gateway_parameter);


        $alias = $deposit->gateway->alias;

        $val['MID'] = trim($PayTmAcc->MID);
        $val['WEBSITE'] = trim($PayTmAcc->WEBSITE);
        $val['CHANNEL_ID'] = trim($PayTmAcc->CHANNEL_ID);
        $val['INDUSTRY_TYPE_ID'] = trim($PayTmAcc->INDUSTRY_TYPE_ID);



        $val['ORDER_ID'] = $deposit->trx;
        $val['TXN_AMOUNT'] = round($deposit->final_amo,2);
        $val['CUST_ID'] = $deposit->user_id;
        $val['CALLBACK_URL'] = route('ipn.'.$alias);
        $val['CHECKSUMHASH'] = (new PayTM())->getChecksumFromArray($val, $PayTmAcc->merchant_key);

        $send['val'] = $val;
        $send['view'] = 'user.payment.redirect';
        $send['method'] = 'post';
        $send['url'] = $PayTmAcc->transaction_url . "?orderid=" . $deposit->trx;

        return json_encode($send);
    }
    public function ipn()
    {

        $data = Deposit::where('trx', $_POST['ORDERID'])->orderBy('id', 'DESC')->first();
        $PayTmAcc = json_decode($data->gateway_currency()->gateway_parameter);
        $ptm = new PayTM();

        if ($ptm->verifychecksum_e($_POST, $PayTmAcc->merchant_key, $_POST['CHECKSUMHASH']) === "TRUE") {

            if ($_POST['RESPCODE'] == "01") {
                $requestParamList = array("MID" => $PayTmAcc->MID, "ORDERID" => $_POST['ORDERID']);
                $StatusCheckSum = $ptm->getChecksumFromArray($requestParamList, $PayTmAcc->merchant_key);
                $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;
                $responseParamList = $ptm->callNewAPI($PayTmAcc->transaction_status_url, $requestParamList);
                if ($responseParamList['STATUS'] == 'TXN_SUCCESS' && $responseParamList['TXNAMOUNT'] == $_POST['TXNAMOUNT']) {
                    PaymentController::userDataUpdate($data->trx);
                    $notify[] = ['success', returnMsg()];
                } else {
                    $notify[] = ['error', 'It seems some issue in server to server communication. Kindly connect with administrator'];
                }
            } else {
                $notify[] = ['error',  $_POST['RESPMSG']];
            }
        } else {
            $notify[] = ['error',  'Security error!'];
        }
        
        return redirect()->route(returnUrl())->withNotify($notify);
    }
}
