<?php

namespace App\Http\Controllers\Gateway\coingate;

use App\Deposit;
use App\GeneralSetting;
use App\Http\Controllers\Controller;
use CoinGate\CoinGate;
use CoinGate\Merchant\Order;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{
    /*
     * Coingate Gateway 505
     */

    public static function process($deposit)
    {
        $coingateAcc = json_decode($deposit->gateway_currency()->gateway_parameter);
        CoinGate::config(array(
            'environment' => 'live', // sandbox OR live
            'auth_token' => $coingateAcc->api_key
        ));

        $basic =  GeneralSetting::first();

        $post_params = array(
            'order_id' => $deposit->trx,
            'price_amount' => round($deposit->final_amo,2),
            'price_currency' => $deposit->method_currency,
            'receive_currency' => $deposit->method_currency,
            'callback_url' => route('ipn.'.$deposit->gateway->alias),
            'cancel_url' => route(returnUrl()),
            'success_url' => route(returnUrl()),
            'title' => 'Payment to ' . $basic->sitename,
            'token' => $deposit->trx
        );

        $order = Order::create($post_params);
        if ($order) {
            $send['redirect'] = true;
            $send['redirect_url'] = $order->payment_url;
        } else {
            $send['error'] = true;
            $send['message'] = 'Unexpected Error! Please Try Again';
        }
        $send['view'] = '';
        return json_encode($send);
    }

    public function ipn()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $validIp = curlContent('https://api.coingate.com/v2/ips-v4');
        if (strpos($validIp, $ip) !== false) {
            $data = Deposit::where('trx', $_POST['token'])->orderBy('id', 'DESC')->first();
            if ($_POST['status'] == 'paid' && $_POST['price_amount'] == $data->final_amo && $data->status == '0') {
                PaymentController::userDataUpdate($data->trx);
            }
        }
    }
}
