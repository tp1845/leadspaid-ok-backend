<?php

namespace App\Http\Controllers\Gateway\razorpay;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;
use Session;
use Razorpay\Api\Api;
use Auth;


class ProcessController extends Controller
{
    /*
     * RazorPay Gateway
     */

    public static function process($deposit)
    {
        $razorAcc = json_decode($deposit->gateway_currency()->gateway_parameter);

        //  API request and response for creating an order
        $api_key = $razorAcc->key_id;
        $api_secret = $razorAcc->key_secret;

        $api = new Api($api_key, $api_secret);

        $order = $api->order->create(
            array(
                'receipt' => $deposit->trx,
                'amount' => $deposit->final_amo * 100,
                'currency' => $deposit->method_currency,
                'payment_capture' => '0'
            )
        );


        $val['key'] = $razorAcc->key_id;
        $val['amount'] = $deposit->final_amo * 100;
        $val['currency'] = $deposit->method_currency;
        $val['order_id'] = $order['id'];
        $val['buttontext'] = "Pay with Razorpay";
        $val['name'] = Auth::guard('advertiser')->user()->username;
        $val['description'] = "Payment By Razorpay";
        $val['image'] = asset( 'assets/images/logoIcon/logo.png');
        $val['prefill.name'] = Auth::guard('advertiser')->user()->name ;
        $val['prefill.email'] = Auth::guard('advertiser')->user()->email;
        $val['prefill.contact'] = Auth::guard('advertiser')->user()->mobile;
        $val['theme.color'] = "#2ecc71";
        $send['val'] = $val;

        $send['method'] = 'POST';


        $alias = $deposit->gateway->alias;

        $send['url'] = route('ipn.'.$alias);
        $send['custom'] = $deposit->trx;
        $send['checkout_js'] = "https://checkout.razorpay.com/v1/checkout.js";
        $send['view'] = 'user.payment.'.$alias;

        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        $track = Session::get('Track');
        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        $razorAcc = json_decode($data->gateway_currency()->gateway_parameter);

        if (!$data) {
            $notify[] = ['error', 'Invalid Request'];
        }

        $sig = hash_hmac('sha256', $request->razorpay_order_id . "|" . $request->razorpay_payment_id, $razorAcc->key_secret);

        if ($sig == $request->razorpay_signature && $data->status == '0') {
            PaymentController::userDataUpdate($data->trx);
            $notify[] = ['success', returnMsg().'Ref: ' . $track];
        } else {
            $notify[] = ['error', "Invalid Request"];
        }
      
        return redirect()->route(returnUrl())->withNotify($notify);
    }
}
