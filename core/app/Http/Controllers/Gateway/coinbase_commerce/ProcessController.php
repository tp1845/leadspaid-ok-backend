<?php

namespace App\Http\Controllers\Gateway\coinbase_commerce;

use App\Deposit;
use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use Auth;
use Illuminate\Http\Request;
use Session;

class ProcessController extends Controller
{
    /*
     * coinbase Gateway 506
     */

    public static function process($deposit)
    {
        $basic = GeneralSetting::first();
        $coinbaseAcc = json_decode($deposit->gateway_currency()->gateway_parameter);

        $url = 'https://api.commerce.coinbase.com/charges';
        $array = [
            'name' => Auth::guard('advertiser')->user()->username,
            'description' => "Pay to " . $basic->sitename,
            'local_price' => [
                'amount' => $deposit->final_amo,
                'currency' => $deposit->method_currency
            ],
            'metadata' => [
                'trx' => $deposit->trx
            ],
            'pricing_type' => "fixed_price",
            'redirect_url' => route(returnUrl()),
            'cancel_url' => route(returnUrl())
        ];

        $yourjson = json_encode($array);
        $ch = curl_init();
        $apiKey = $coinbaseAcc->api_key;
        $header = array();
        $header[] = 'Content-Type: application/json';
        $header[] = 'X-CC-Api-Key: ' . "$apiKey";
        $header[] = 'X-CC-Version: 2018-03-22';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $yourjson);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);


        $result = json_decode($result);

        if (@$result->error == '') {

            $send['redirect'] = true;
            $send['redirect_url'] = $result->data->hosted_url;
        } else {

            $send['error'] = true;
            $send['message'] = 'Some Problem Occured. Try Again';
        }

        $send['view'] = '';
        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        $postdata = file_get_contents("php://input");
        $res = json_decode($postdata);
        $data = Deposit::where('trx', $res->event->data->metadata->trx)->orderBy('id', 'DESC')->first();
        $coinbaseAcc = json_decode($data->gateway_currency()->gateway_parameter);
        $headers = apache_request_headers();
        $sentSign = $headers['X-Cc-Webhook-Signature'];
        $sig = hash_hmac('sha256', $postdata, $coinbaseAcc->secret);
        if ($sentSign == $sig) {
            if ($res->event->type == 'charge:confirmed' && $data->status == 0) {
                PaymentController::userDataUpdate($data->trx);
            }
        }
    }
}
