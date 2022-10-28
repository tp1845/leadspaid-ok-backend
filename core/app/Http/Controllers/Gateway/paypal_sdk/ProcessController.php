<?php

namespace App\Http\Controllers\Gateway\paypal_sdk;

use App\Deposit;
use App\GatewayCurrency;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class ProcessController extends Controller
{

    /*
     * Paypal Gateway
     */
    public static function process($deposit)
    {
        $paypalAcc = json_decode($deposit->gateway_currency()->gateway_parameter);
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $paypalAcc->clientId,     // ClientID
                $paypalAcc->clientSecret      // ClientSecret
            )
        );
        ///  createPayment
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName('Payment via '.$deposit->gateway->name)
            ->setCurrency("$deposit->method_currency")
            ->setQuantity(1)
            ->setSku("$deposit->trx")// Similar to `item_number` in Classic API
            ->setPrice(round($deposit->final_amo,2));
        $itemList = new ItemList();
        $itemList->setItems(array($item1));

               $details = new Details();
               $details->setShipping(0)
                   ->setTax(0)
                   ->setSubtotal(round($deposit->final_amo,2));



        $amount = new Amount();
        $amount->setCurrency("$deposit->method_currency")
            ->setTotal(round($deposit->final_amo, 2))
            ->setDetails($details);


        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Payment via ' . $deposit->gateway->name)
            ->setInvoiceNumber($deposit->trx);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('ipn.paypal_sdk'))
            ->setCancelUrl(   
                route(returnUrl())
            );


        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $payment->create($apiContext);



        $send['redirect'] = true;
        $send['redirect_url'] = $payment->getApprovalLink();


        return json_encode($send);
    }

    public function ipn()
    {
       $paypalAcc = GatewayCurrency::where('gateway_alias','paypal_sdk')->latest()->first();
        $paypalAcc = json_decode($paypalAcc->gateway_parameter);
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $paypalAcc->clientId,     // ClientID
                $paypalAcc->clientSecret      // ClientSecret
            )
        );


       $paymentId = \request('paymentId');

       $payment = Payment::get($paymentId, $apiContext);


       $execution = new PaymentExecution();
       $execution->setPayerId(request('PayerID'));


       $total = $payment->transactions[0]->amount->total;
       $currency = $payment->transactions[0]->amount->currency;

       $invoice_number = $payment->transactions[0]->invoice_number;

       $transaction = new Transaction();
       $amount = new Amount();

       $details = new Details();


       $details->setShipping(0)
           ->setTax(0)
           ->setSubtotal($total);

       $amount->setCurrency("$currency");
       $amount->setTotal($total);
       $amount->setDetails($details);
       $transaction->setAmount($amount);

       $execution->addTransaction($transaction);
       $result = $payment->execute($execution, $apiContext);


        $data =  Deposit::where('trx',$invoice_number)->orderBy('id','desc')->first();
        if ($result->state == "approved" && $data->status == '0') {
            PaymentController::userDataUpdate($data->trx);
            $notify[] = ['success', returnMsg()];
        }else{
            $notify[] = ['error', 'Failed to process payment'];
        }
      
        return redirect()->route(returnUrl())->withNotify($notify);
    }

}
