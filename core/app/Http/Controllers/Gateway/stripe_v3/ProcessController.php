<?php

namespace App\Http\Controllers\Gateway\stripe_v3;

use App\Deposit;
use App\GatewayCurrency;
use App\GeneralSetting;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;


class ProcessController extends Controller
{

    /*
     * Stripe V3 Gateway
     */
    public static function process($deposit)
    {
        $StripeJSAcc = json_decode($deposit->gateway_currency()->gateway_parameter);
        $alias = $deposit->gateway->alias;
        $general =  GeneralSetting::first();
        \Stripe\Stripe::setApiKey("$StripeJSAcc->secret_key");

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => $general->sitename,
                'description' => 'Deposit  with Stripe',
                'images' => [asset('assets/images/logoIcon/logo.png')],
                'amount' => $deposit->final_amo * 100,
                'currency' => "$deposit->method_currency",
                'quantity' => 1,
            ]],
            'cancel_url' => route(returnUrl()),
            'success_url' =>  route(returnUrl()),
        ]);

        $send['view'] = 'user.payment.stripe_v3';
        $send['session'] = $session;
        $send['StripeJSAcc'] = $StripeJSAcc;

        return json_encode($send);
    }

    /*
     * Stripe V3 js ipn
     */
    public function ipn(Request $request)
    {
        $StripeJSAcc = GatewayCurrency::where('gateway_alias','stripe_v3')->latest()->first();
        $gateway_parameter = json_decode($StripeJSAcc->gateway_parameter);

        \Stripe\Stripe::setApiKey($gateway_parameter->secret_key);

        // You can find your endpoint's secret in your webhook settings
        $endpoint_secret = $gateway_parameter->end_point; // main
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];


        $event = null;
        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        // Handle the checkout.session.completed event
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            $data = Deposit::where('btc_wallet',  $session->id)->orderBy('id', 'DESC')->first();

            if($data->status==0){
                PaymentController::userDataUpdate($data->trx);
            }
        }
        http_response_code(200);
    }
}
