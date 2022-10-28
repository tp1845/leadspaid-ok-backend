<?php

namespace App\Http\Controllers\Gateway\blockio;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{
    /*
     * BlockIO Pay Gateway
     */

    public static function process($deposit)
    {
        $blockIoAcc = json_decode($deposit->gateway_currency()->gateway_parameter);

        $apiKey = $blockIoAcc->api_key;
        $version = 2;
        $pin = $blockIoAcc->api_pin;
        $block_io = new BlockIo($apiKey, $pin, $version);

        if ($deposit->btc_amo == 0 || $deposit->btc_wallet == "") {

            if ($deposit->method_currency == 'DOGE') {
                $dogeprice = curlContent("https://api.coinmarketcap.com/v1/ticker/dogecoin");
                $dresult = json_decode($dogeprice);
                $doge_usd = $dresult[0]->price_usd;
                $usd = $deposit->final_amo;
                $bcoin = round($usd / $doge_usd, 8);
            } else {
                $btcdata = $block_io->get_current_price(array('price_base' => 'USD'));
                if ($btcdata->status != 'success') {
                    $send['error'] = true;
                    $send['message'] = 'Failed to Process';
                }
                $btcrate = $btcdata->data->prices[0]->price;
                $usd = $deposit->final_amo;
                $bcoin = round($usd / $btcrate, 8);
            }
            $ad = $block_io->get_new_address();
            if ($ad->status == 'success') {
                $blockad = $ad->data;
                $wallet = $blockad->address;
                $deposit['btc_wallet'] = $wallet;
                $deposit['btc_amo'] = $bcoin;
                $deposit->update();
            } else {
                $send['error'] = true;
                $send['message'] = 'Failed to Process';
            }
        }
        $send['amount'] = $deposit->btc_amo;
        $send['sendto'] = $deposit->btc_wallet;
        $send['img'] = cryptoQR($deposit->btc_wallet, $deposit->btc_amo);
        $send['currency'] = "$deposit->method_currency";
        $send['view'] = 'user.payment.crypto';
        return json_encode($send);
    }

    public function ipn()
    {
        $DepositData = Deposit::where('status', 0)->where('method_code', 502)->where('try', '<=', 100)->where('btc_amo', '>', 0)->where('btc_wallet', '!=', '')->latest()->get();

        foreach ($DepositData as $data) {

            $blockIoAcc = json_decode($data->gateway_currency()->gateway_parameter);
            $apiKey = $blockIoAcc->api_key;
            $version = 2;
            $pin = $blockIoAcc->api_pin;
            $block_io = new BlockIo($apiKey, $pin, $version);
            $balance = $block_io->get_address_balance(array('addresses' => $data->btc_wallet));

            echo '[' . $data->method_currency . '] - ' . $balance->data->available_balance . ' ---- ' . $data->btc_wallet . '<br>';

            if (@$balance->data->available_balance >= $data->btc_amo && $data->status == '0') {
                PaymentController::userDataUpdate($data->trx);
            }
            $data['try'] = $data->try + 1;
            $data->update();
        }

        echo '<br><br><br><br>RUNNING';
    }
}
