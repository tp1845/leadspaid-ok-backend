<?php

namespace App\Http\Controllers\Gateway\cashmaal;

use App\Deposit;
use App\GatewayCurrency;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use Auth;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /*
     * Cashmaal
     */

    public static function process($deposit)
    {
    	$cashmaal = json_decode($deposit->gateway_currency());
    	$param = json_decode($cashmaal->gateway_parameter);
        $val['pay_method'] = " ";
        $val['amount'] = getAmount($deposit->final_amo);
        $val['currency'] = $cashmaal->currency;
        $val['succes_url'] = route(returnUrl());
        $val['cancel_url'] = route(returnUrl());
        $val['client_email'] = auth()->guard('advertiser')->user()->email;
        $val['web_id'] = $param->web_id;
        $val['order_id'] = $deposit->trx;
        $val['addi_info'] = "Deposit";
        $send['url'] = 'https://www.cashmaal.com/Pay/';
        $send['method'] = 'post';
        $send['view'] = 'user.payment.redirect';
        $send['val'] = $val;
        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        
    	$gateway = GatewayCurrency::where('alias','cashmaal')->where('currency',$request->currency)->first();
        $IPN_key=json_decode($gateway->gateway_parameter->ipn_key);
        $web_id=json_decode($gateway->gateway_parameter->web_id);
        $data = Deposit::where('trx', $_POST['order_id'])->orderBy('id', 'DESC')->first();
        if ($request->ipn_key != $IPN_key && $web_id != $request->web_id) {
        	$notify[] = ['error','Data invalide'];
        	return redirect()->route(gatewayRedirectUrl())->withNotify($notify);
        }

        if ($request->status == 2) {
        	$notify[] = ['error','Payment in pending'];
        	return redirect()->route(gatewayRedirectUrl())->withNotify($notify);
        }

        if ($request->status != 1) {
        	$notify[] = ['error','Data invalide'];
        	return redirect()->route(gatewayRedirectUrl())->withNotify($notify);
        }

		if($_POST['status'] == 1 && $data->status == 0 && $_POST['currency'] == $data->method_currency ){
			PaymentController::userDataUpdate($data->trx);
            $notify[] = ['success', returnMsg()];
		}else{
			$notify[] = ['error','Payment Failed'];
        	return redirect()->route(returnUrl())->withNotify($notify);
		}
		return redirect()->route(returnUrl())->withNotify($notify);
    }
}
