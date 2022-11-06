<?php

namespace App\Http\Controllers\Gateway\stripe_v3;

use App\Deposit;
use App\Advertiser;
use App\Gateway;
use App\GatewayCurrency;
use App\TransactionAdvertiser;
use App\GeneralSetting;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Carbon\Carbon;


class ProcessController extends Controller
{


    /*
     * Get Country Time from Country Name
     */
    public function TimezoneFromName($country_name = "Singapore")
    {

        $countries_list = array(
            "AF" => "Afghanistan",
            "AX" => "Aland Islands",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BQ" => "Bonaire, Sint Eustatius and Saba",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "IO" => "British Indian Ocean Territory",
            "BN" => "Brunei Darussalam",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos (Keeling) Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo",
            "CD" => "Congo, Democratic Republic of the Congo",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "CI" => "Cote D'Ivoire",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CW" => "Curacao",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands (Malvinas)",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GG" => "Guernsey",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard Island and Mcdonald Islands",
            "VA" => "Holy See (Vatican City State)",
            "HN" => "Honduras",
            "HK" => "Hong Kong",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran, Islamic Republic of",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IM" => "Isle of Man",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JE" => "Jersey",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KP" => "Korea, Democratic People's Republic of",
            "KR" => "Korea, Republic of",
            "XK" => "Kosovo",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Lao People's Democratic Republic",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libyan Arab Jamahiriya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macao",
            "MK" => "Macedonia, the Former Yugoslav Republic of",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "MX" => "Mexico",
            "FM" => "Micronesia, Federated States of",
            "MD" => "Moldova, Republic of",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestinian Territory, Occupied",
            "PA" => "Panama",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RE" => "Reunion",
            "RO" => "Romania",
            "RU" => "Russian Federation",
            "RW" => "Rwanda",
            "BL" => "Saint Barthelemy",
            "SH" => "Saint Helena",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "MF" => "Saint Martin",
            "PM" => "Saint Pierre and Miquelon",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "ST" => "Sao Tome and Principe",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "CS" => "Serbia and Montenegro",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SX" => "Sint Maarten",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "SS" => "South Sudan",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syrian Arab Republic",
            "TW" => "Taiwan, Province of China",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania, United Republic of",
            "TH" => "Thailand",
            "TL" => "Timor-Leste",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "UM" => "United States Minor Outlying Islands",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VE" => "Venezuela",
            "VN" => "Viet Nam",
            "VG" => "Virgin Islands, British",
            "VI" => "Virgin Islands, U.s.",
            "WF" => "Wallis and Futuna",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe"
        );
        $country_code =  array_search($country_name, $countries_list);
        $timezone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $country_code);
        $d = new \DateTime("now", new \DateTimeZone($timezone[0]));
        $currentDateTime =  $d->format($d->format("Y-m-d h:i:s"));
        return $currentDateTime; // 2022-11-06 09:44:50
    }

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
        $StripeJSAcc = GatewayCurrency::where('gateway_alias', 'stripe_v3')->latest()->first();
        $gateway_parameter = json_decode($StripeJSAcc->gateway_parameter);

        \Stripe\Stripe::setApiKey($gateway_parameter->secret_key);

        // You can find your endpoint's secret in your webhook settings
        $endpoint_secret = $gateway_parameter->end_point; // main
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];


        $event = null;
        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        // Handle the checkout.session.completed event
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            $data = Deposit::where('btc_wallet',  $session->id)->orderBy('id', 'DESC')->first();

            if ($data->status == 0) {
                PaymentController::userDataUpdate($data->trx);
            }
        }
        http_response_code(200);
    }


    public function charge(Request $request)
    {
        $users = Advertiser::get();

        foreach ($users as $user) {
            $currentDateTime = $this->TimezoneFromName($user->country);
            $newDateTime = date('h A', strtotime($currentDateTime));
            $notify[] = ['success', 'Successfully charged '.  $currentDateTime];
            if ($newDateTime === "06 AM"){
                $previous_deposit = $user->wallet_deposit;
                $new_deposit =  $previous_deposit - $user->amount_used;
                $amount =  $user->total_budget - $new_deposit;
                if ($amount > 0) {
                    $deducting_amount = $amount + ($amount * 0.03);
                    $user->wallet_deposit = $new_deposit +  $amount;
                } else {
                    $deducting_amount = 0;
                    $user->wallet_deposit = $new_deposit;
                }
                $user->save();
    
                $method = Gateway::where('alias', 'stripe')->firstOrFail();
                $gateway_parameter = json_decode($method->parameters);
                $stripe = new   \Stripe\StripeClient($gateway_parameter->secret_key->value);
    
    
                $setup_intent = $stripe->setupIntents->retrieve($user->card_session, []);
                $payment_method_id = $setup_intent->payment_method;
                $payment_method =  $stripe->paymentMethods->retrieve(
                    $payment_method_id,
                    []
                );
                $customer_id = $payment_method->customer;
    
                if ($deducting_amount >= 1) {
                    try {
                        \Stripe\Stripe::setApiKey($gateway_parameter->secret_key->value);
                        \Stripe\PaymentIntent::create([
                            'amount' => $deducting_amount * 100,
                            'currency' => 'usd',
                            'customer' => $customer_id,
                            'payment_method' => $payment_method_id,
                            'off_session' => true,
                            'confirm' => true,
                        ]);
                    } catch (\Stripe\Exception\CardException $e) {
                        // Error code will be authentication_required if authentication is needed
                        echo 'Error code is:' . $e->getError()->code;
                        $payment_intent_id = $e->getError()->payment_intent->id;
                        $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
                        $notify[] = ['error', 'Failed to charge'];
                        return redirect()->route('advertiser.payments')->withNotify($notify);
                    }
                }
    
                $transaction = new TransactionAdvertiser();
                $transaction->user_id =  $user->id;
                $transaction->trx_date = $currentDateTime;
                $transaction->init_blance = getAmount($previous_deposit);
                $transaction->total_budget = getAmount($user->total_budget);
                $transaction->spent_previous_day = getAmount($user->amount_used);
                $deduct_amount = $deducting_amount <= 0 ? 0: $deducting_amount . '(' . $amount . '+GST)'  ;
                $transaction->deduct = $deduct_amount;
                $transaction->final_wallet =  $user->wallet_deposit;
                $transaction->save();
            }          
        }


        return redirect()->route('advertiser.payments')->withNotify($notify);
    }
}
