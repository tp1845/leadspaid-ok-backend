<?php

namespace App\Http\Controllers\Admin;

use App\Gateway;
use App\GatewayCurrency;
use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class ManualGatewayController extends Controller
{
    public function index()
    {
        $page_title = 'Manual Deposit Methods';
        $gateways = Gateway::manual()->latest()->get();
        $empty_message = 'No deposit methods available.';
        return view('admin.gateway_manual.list', compact('page_title', 'gateways','empty_message'));
    }

    public function create()
    {
        $page_title = 'New Manual Deposit Method';
        return view('admin.gateway_manual.create', compact('page_title'));
    }


    public function store(Request $request)
    {
        $validation_rule = [
            'name'           => 'required|max: 60',
            'image.*'          => 'required|image',
            'image'          => [new FileTypeValidate(['jpeg', 'jpg', 'png'])],
            'rate'           => 'required|gt:0',
            'currency'       => 'required',
            'min_limit'      => 'required|gt:0',
            'max_limit'      => 'required|gte:0',
            'fixed_charge'   => 'required|gte:0',
            'percent_charge' => 'required|between:0,100',
            'instruction'    => 'required|max:64000',
        ];

        $request->validate($validation_rule);
        $last_method = Gateway::manual()->latest()->first();
        $method_code = 1000;
        if ($last_method) {
            $method_code = $last_method->code + 1;
        }

        $filename = '';
        $path = imagePath()['gateway']['path'];
        $size = imagePath()['gateway']['size'];
        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }


        $input_form = [];
        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {
                $arr = array();
                $arr['field_name'] = strtolower(str_replace(' ', '_', trim($request->field_name[$a])));
                $arr['field_level'] = trim($request->field_name[$a]);
                $arr['type'] = $request->type[$a];
                $arr['validation'] = $request->validation[$a];
                $input_form[$arr['field_name']] = $arr;
            }
        }
        $method = new Gateway();
        $method->code = $method_code;
        $method->name = $request->name;
        $method->alias = strtolower(trim(str_replace(' ','_',$request->name)));
        $method->image = $filename;
        $method->status = 0;
        $method->parameters = json_encode([]);
        $method->input_form = $input_form;
        $method->supported_currencies = json_encode([]);
        $method->crypto = 0;
        $method->description = $request->instruction;
        $method->save();

        $method->single_currency()->save(new GatewayCurrency([
            'name' => $request->name,
            'gateway_alias' => strtolower(trim(str_replace(' ','_',$request->name))),
            'currency' => $request->currency,
            'symbol' => '',
            'min_amount' => $request->min_limit,
            'max_amount' => $request->max_limit,
            'fixed_charge' => $request->fixed_charge,
            'percent_charge' => $request->percent_charge,
            'rate' => $request->rate,
            'image' => $filename,
            'gateway_parameter' => json_encode($input_form),
        ]));

        $notify[] = ['success', $method->name . ' Manual Gateway has been added.'];
        return back()->withNotify($notify);
    }

    public function edit($alias)
    {
        $page_title = 'New Manual Deposit Method';
        $method = Gateway::manual()->with('single_currency')->where('alias', $alias)->firstOrFail();
        return view('admin.gateway_manual.edit', compact('page_title', 'method'));
    }

    public function update(Request $request, $code)
    {
        $validation_rule = [
            'name'           => 'required|max: 60',
            'image'          => [
                'nullable',
                'image',
                new FileTypeValidate(['jpeg', 'jpg', 'png'])
            ],
            'rate'           => 'required|gt:0',
            'currency'       => 'required',
            'min_limit'      => 'required|gt:0',
            'max_limit'      => 'required|gte:0',
            'fixed_charge'   => 'required|gte:0',
            'percent_charge' => 'required|between:0,100',
            'instruction'    => 'required|max:64000'
        ];

        $request->validate($validation_rule);
        $method = Gateway::manual()->where('code', $code)->firstOrFail();

        $filename = $method->image;

        $path = imagePath()['gateway']['path'];
        $size = imagePath()['gateway']['size'];
        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $input_form = [];
        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {
                $arr = array();
                $arr['field_name'] = strtolower(str_replace(' ', '_', trim($request->field_name[$a])));
                $arr['field_level'] = trim($request->field_name[$a]);
                $arr['type'] = $request->type[$a];
                $arr['validation'] = $request->validation[$a];
                $input_form[$arr['field_name']] = $arr;
            }
        }

        $method->name = $request->name;
        $method->alias = strtolower(trim(str_replace(' ','_',$request->name)));
        $method->image = $filename;
        $method->parameters = json_encode([]);
        $method->supported_currencies = json_encode([]);
        $method->crypto = 0;
        $method->description = $request->instruction;
        $method->input_form = $input_form;
        $method->save();


        $single_currency = $method->single_currency;

        $single_currency->name = $request->name;
        $single_currency->gateway_alias = strtolower(trim(str_replace(' ','_',$method->name)));
        $single_currency->currency = $request->currency;
        $single_currency->symbol = '';
        $single_currency->min_amount = $request->min_limit;
        $single_currency->max_amount = $request->max_limit;
        $single_currency->fixed_charge = $request->fixed_charge;
        $single_currency->percent_charge = $request->percent_charge;
        $single_currency->rate = $request->rate;
        $single_currency->image = $filename;
        $single_currency->gateway_parameter = json_encode($input_form);
        $single_currency->save();

        $notify[] = ['success', $method->name . ' Manual Gateway has been updated.'];
        return redirect()->route('admin.gateway.manual.edit',[$method->alias])->withNotify($notify);
    }

    public function activate(Request $request)
    {
        $request->validate(['code' => 'required|integer']);
        $method = Gateway::where('code', $request->code)->first();
        $method->status = 1;
        $method->save();
        $notify[] = ['success', $method->name . ' has been activated.'];
        return back()->withNotify($notify);
    }

    public function deactivate(Request $request)
    {
        $request->validate(['code' => 'required|integer']);
        $method = Gateway::where('code', $request->code)->first();
        $method->status = 0;
        $method->save();
        $notify[] = ['success', $method->name . ' has been deactivated.'];
        return back()->withNotify($notify);
    }
}
