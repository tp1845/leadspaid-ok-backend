<?php

namespace App\Http\Controllers\Gateway\instamojo;

use App\Deposit;
use App\GeneralSetting;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessController extends Controller
{

    /*
     * Instamojo Gateway
     */
    public static function process($deposit)
    {
        $pricePlan = session()->get('pricePlan');
        $basic = GeneralSetting::first();
        $instaMojoAcc = json_decode($deposit->gateway_currency()->gateway_parameter);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:$instaMojoAcc->api_key",
                "X-Auth-Token:$instaMojoAcc->auth_token"
            )
        );
        $payload = array(
            'purpose' => 'Payment to ' . $basic->sitename,
            'amount' => round($deposit->final_amo,2),
            'buyer_name' => $deposit->user->username,
            'redirect_url' => route(returnUrl()),
            'webhook' => route('ipn.'.$deposit->gateway->alias),
            'email' => $deposit->user->email,
            'send_email' => true,
            'allow_repeated_payments' => false
        );

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($response);

        if ($res->success) {
            $deposit->btc_wallet = $res->payment_request->id;
            $deposit->save();

            $send['redirect'] = true;
            $send['redirect_url'] = $res->payment_request->longurl;
        } else {
            $send['error'] = true;
            $send['message'] = "Invalid Request";
        }
        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        $data = Deposit::where('btc_wallet', $_POST['payment_request_id'])->orderBy('id', 'DESC')->first();
        $instaMojoAcc = json_decode($data->gateway_currency()->gateway_parameter);

        $imData = $_POST;
        $macSent = $imData['mac'];
        unset($imData['mac']);
        ksort($imData, SORT_STRING | SORT_FLAG_CASE);
        $mac = hash_hmac("sha1", implode("|", $imData), $instaMojoAcc->salt);

        if ($macSent == $mac && $imData['status'] == "Credit" && $data->status == '0') {
            PaymentController::userDataUpdate($data->trx);
        }
    }
}
