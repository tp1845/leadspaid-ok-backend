<?php

namespace App\Http\Controllers\Gateway\stripe_js;

use App\Deposit;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;


class ProcessController extends Controller
{

    /*
     * StripeJS Gateway
     */
    public static function process($deposit)
    {
        $StripeJSAcc = json_decode($deposit->gateway_currency()->gateway_parameter);
        $val['key'] = $StripeJSAcc->publishable_key;
        $val['name'] = Auth::guard('advertiser')->user()->username;
        $val['description'] = "Payment with Stripe";
        $val['amount'] = $deposit->final_amo * 100;
        $val['currency'] = $deposit->method_currency;
        $send['val'] = $val;


        $alias = $deposit->gateway->alias;

        $send['src'] = "https://checkout.stripe.com/checkout.js";
        $send['view'] = 'user.payment.' . $alias;
        $send['method'] = 'post';
        $send['url'] = route('ipn.' . $alias);
        return json_encode($send);
    }

    /*
     * StripeJS js ipn
     */
    public function ipn(Request $request)
    {

        $track = Session::get('Track');
        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        if ($data->status == 1) {
            $notify[] = ['error', 'Invalid Request.'];
        }
        $StripeJSAcc = json_decode($data->gateway_currency()->gateway_parameter);


        Stripe::setApiKey($StripeJSAcc->secret_key);

        Stripe::setApiVersion("2020-03-02");

        $customer =  Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken,
        ]);

        $charge = Charge::create([
            'customer' => $customer->id,
            'description' => 'Payment with Stripe',
            'amount' => $data->final_amo * 100,
            'currency' => $data->method_currency,
        ]);


        if ($charge['status'] == 'succeeded') {
            PaymentController::userDataUpdate($data->trx);
            $notify[] = ['success', returnMsg()];
        }
        
        return redirect()->route(returnUrl())->withNotify($notify);
    }
}
