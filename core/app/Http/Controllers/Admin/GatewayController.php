<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Gateway;
use App\GatewayCurrency;

use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GatewayController extends Controller
{
    public function index()
    {
        $page_title = 'Payment Gateways';
        $empty_message = 'No gateway has been installed.';
        $gateways = Gateway::orderBy('name')->with('currencies')->automatic()->get();
        return view('admin.gateway.list', compact('page_title', 'empty_message', 'gateways'));
    }

    public function edit($alias)
    {
        $gateway = Gateway::automatic()->with('currencies')->where('alias', $alias)->firstOrFail();
        $page_title = 'Update Gateway : ' . $gateway->name;

        $supportedCurrencies = collect(json_decode($gateway->supported_currencies))->except($gateway->currencies->pluck('currency'));

        $parameters = collect(json_decode($gateway->parameters));
        $global_parameters = null;
        $hasCurrencies = false;
        $currency_idx = 1;

        if ($gateway->currencies->count() > 0) {
            $global_parameters = json_decode($gateway->currencies->first()->gateway_parameter);
            $hasCurrencies = true;
        }

        return view('admin.gateway.edit', compact('page_title', 'gateway', 'supportedCurrencies', 'parameters', 'hasCurrencies', 'currency_idx', 'global_parameters'));
    }


    public function update(Request $request, $code)
    {

        $gateway = Gateway::whereCode($code)->firstOrFail();

        $this->gatewayValidator($request)->validate();
        $this->gatewayCurrencyValidator($request, $gateway)->validate();

        $parameters = collect(json_decode($gateway->parameters));

        foreach ($parameters->where('global', true) as $key => $pram) {
            $parameters[$key]->value = $request->global[$key];
        }

        $path = imagePath()['gateway']['path'];
        $size = imagePath()['gateway']['size'];

        $filename = $gateway->image;
        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size, $filename);
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }
        $gateway->alias = $request->alias;
        $gateway->parameters = json_encode($parameters);
        $gateway->image = $filename;
        $gateway->save();

        $gateway_currencies = collect([]);

        if ($request->has('currency')) {

            foreach ($request->currency as $key => $currency) {
                $currency_identifier = $this->currencyIdentifier($currency['name'], $gateway->name . ' ' . $currency['currency']);

                $param = [];
                foreach ($parameters->where('global', true) as $pkey => $pram) {
                    $param[$pkey] = $pram->value;
                }

                foreach ($parameters->where('global', false) as $param_key => $param_value) {
                    $param[$param_key] = $currency['param'][$param_key];
                }

                $filename = null;
                $existing_currency = $gateway->currencies()->where('currency', $currency['currency'])->first();
                if ($existing_currency) {
                    $filename = $existing_currency->image;
                }
                $uploaded_image = 'currency.' . $key . '.image';
                if ($request->hasFile($uploaded_image)) {
                    try {

                        $filename = uploadImage($request->file($uploaded_image), $path, $size);
                    } catch (\Exception $exp) {
                        $notify[] = ['error', $currency_identifier . ' Image could not be uploaded.'];
                        return back()->withNotify($notify);
                    }
                }

                $gateway_currency = new GatewayCurrency([
                    'name' => $currency['name'],
                    'gateway_alias' => $gateway->alias,
                    'image' => $filename,
                    'currency' => $currency['currency'],
                    'min_amount' => $currency['min_amount'],
                    'max_amount' => $currency['max_amount'],
                    'fixed_charge' => $currency['fixed_charge'],
                    'percent_charge' => $currency['percent_charge'],
                    'rate' => $currency['rate'],
                    'symbol' => $currency['symbol'],
                    'gateway_parameter' => json_encode($param),
                ]);


                $gateway_currencies->push($gateway_currency);
            }
        }

        $gateway->currencies()->delete();

        $gateway->currencies()->saveMany($gateway_currencies);

        $notify[] = ['success', $gateway->name . ' has been updated.'];
        return redirect()->route('admin.gateway.automatic.edit', $gateway->alias)->withNotify($notify);
    }

    public function remove(Request $request, $code)
    {
        $request->validate(['id' => 'required']);
        $gateway = Gateway::where('code', $code)->firstOrFail();
        $gateway_currency = $gateway->currencies()->find($request->id);
        $name = $gateway_currency->name;
        removeFile(imagePath()['gateway']['path'] . '/' . $gateway_currency->image);
        $gateway_currency->delete();
        $notify[] = ['success', $name . ' has been removed from ' . $gateway->name];
        return back()->withNotify($notify);
    }

    public function activate(Request $request)
    {
        $request->validate(['code' => 'required']);
        $gateway = Gateway::where('code', $request->code)->firstOrFail();
        $gateway->status = 1;
        $gateway->save();
        $notify[] = ['success', $gateway->name . ' has been activated.'];
        return back()->withNotify($notify);
    }

    public function deactivate(Request $request)
    {
        $request->validate(['code' => 'required']);
        $gateway = Gateway::where('code', $request->code)->firstOrFail();
        $gateway->status = 0;
        $gateway->save();
        $notify[] = ['success', $gateway->name . ' has been disabled.'];
        return back()->withNotify($notify);
    }




    public function gatewayValidator(Request $request)
    {
        $validation_rule = [
            'alias' => 'required',
            'description' => 'nullable',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ];
        $validator = Validator::make($request->all(), $validation_rule);
        return $validator;
    }

    public function gatewayCurrencyValidator(Request $request, Gateway $gateway)
    {
        $custom_attributes = [];
        $validation_rule = [];

        $param_list = collect(json_decode($gateway->parameters));
        $supported_currencies = collect(json_decode($gateway->supported_currencies))->flip()->implode(',');

        foreach ($param_list->where('global', true) as $key => $pram) {
            $validation_rule['global.' . $key] = 'required';
            $custom_attributes['global.' . $key] = $this->keyToWords($key);
        }


        if ($request->has('currency')) {
            foreach ($request->currency as $key => $currency) {
                $validation_rule['currency.' . $key . '.currency']       = 'required|string|in:' . $supported_currencies;
                $validation_rule['currency.' . $key . '.symbol']       = 'required|string';

                $validation_rule['currency.' . $key . '.name']           = 'required';
                $validation_rule['currency.' . $key . '.image']          = ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])];
                $validation_rule['currency.' . $key . '.min_amount']     = 'required|numeric|lte:currency.' . $key . '.max_amount';
                $validation_rule['currency.' . $key . '.max_amount']     = 'required|numeric|gt:0|gte:currency.' . $key . '.min_amount';
                $validation_rule['currency.' . $key . '.fixed_charge']   = 'required|numeric|gte:0';
                $validation_rule['currency.' . $key . '.percent_charge'] = 'required|numeric|min:0|max:100';
                $validation_rule['currency.' . $key . '.rate']           = 'required|numeric|gt:0';

                $supported_currencies = explode(',', $supported_currencies);

                $supported_currencies = collect(removeElement($supported_currencies, $currency['currency']))->implode(',');

                $currency_identifier = $this->currencyIdentifier($currency['name'], $gateway->name . ' ' . $currency['currency']);

                $custom_attributes['currency.' . $key . '.name']           = $currency_identifier . ' name';
                $custom_attributes['currency.' . $key . '.image']          = $currency_identifier . ' ' . $this->keyToWords('image');
                $custom_attributes['currency.' . $key . '.min_amount']     = $currency_identifier . ' ' . $this->keyToWords('min_amount');
                $custom_attributes['currency.' . $key . '.max_amount']     = $currency_identifier . ' ' . $this->keyToWords('max_amount');
                $custom_attributes['currency.' . $key . '.fixed_charge']   = $currency_identifier . ' ' . $this->keyToWords('fixed_charge');
                $custom_attributes['currency.' . $key . '.percent_charge'] = $currency_identifier . ' ' . $this->keyToWords('percent_charge');
                $custom_attributes['currency.' . $key . '.rate']           = $currency_identifier . ' ' . $this->keyToWords('rate');
                $custom_attributes['currency.' . $key . '.currency']           = $currency_identifier . ' ' . $this->keyToWords('currency');
                $custom_attributes['currency.' . $key . '.symbol']           = $currency_identifier . ' ' . $this->keyToWords('symbol');

                foreach ($param_list->where('global', false) as $param_key => $param_value) {
                    $validation_rule['currency.' . $key . '.param.' . $param_key] = 'required';
                    $custom_attributes['currency.' . $key . '.param.' . $param_key] = $currency_identifier . ' ' . $this->keyToWords($param_value->title);
                }
            }
        }

        $validator = Validator::make($request->all(), $validation_rule, $custom_attributes);
        return $validator;
    }

    private function currencyIdentifier($name, $default = '')
    {
        return $name ?? $default;
    }


    private function keyToWords($key, $separator = '_')
    {
        return ucwords(str_replace('_', ' ', $key));
    }

}
