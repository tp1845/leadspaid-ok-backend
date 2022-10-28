@extends($activeTemplate.'layouts.advertiser.frontend')
@php
    $plan = session()->get('pricePlan');
   
@endphp

@section('panel')
    <div class="container-fluid">
        <div class="row  justify-content-center">
            <div class="col-md-12">
                <div class="card card-deposit text-center">
                    <div class="card-body card-body-deposit">
                        <div class="row">
                            <div class="col-md-3 ">
                                <img class="b-radius--7" src="{{ $data->gateway_currency()->methodImage() }}"
                                style="width:100%; margin:0 auto;"/>
                            </div>
                            <div class="col-md-9 mt-auto mb-auto">
                              
                                <ul class="list-group text-center" style="width:100%;">

                                    @if ($plan)
                                        <li class="list-group-item font-weight-bold">@lang('Type'): <strong class="text-success">{{ $plan->type }}</strong></li>
                                        <li class="list-group-item font-weight-bold">@lang('Credit'): <strong class="text-success">{{number_format($plan->credit) }}</strong></li>
                                    @endif
        
                                    <p class="list-group-item font-weight-bold">
                                        @lang('Amount'):
                                        <strong class="text-success">{{getAmount($data->amount)}} </strong> {{$general->cur_text}}
                                    </p>
                                    <p class="list-group-item font-weight-bold">
                                        @lang('Charge'):
                                        <strong class="text-danger">{{getAmount($data->charge)}}</strong> {{$general->cur_text}}
                                    </p>
        
                                    <p class="list-group-item font-weight-bold">
                                        @lang('Payable'): <strong class="text-success"> {{getAmount($data->amount + $data->charge)}}</strong> {{$general->cur_text}}
                                    </p>
        
                                    <p class="list-group-item font-weight-bold">
                                        @lang('Conversion Rate'): <strong class="text-success">1 {{$general->cur_text}} = {{getAmount($data->rate)}}  {{$data->baseCurrency()}}</strong>
                                    </p>
        
                                    <p class="list-group-item font-weight-bold">
                                        @lang('In') {{$data->baseCurrency()}}:
                                        <strong class="text-success">{{getAmount($data->final_amo)}}</strong>
                                    </p>
        
                                    @if($data->gateway->crypto==1)
                                        <p class="list-group-item">
                                            @lang('Conversion with')
                                            <b> {{ $data->method_currency }}</b> @lang('and final value will Show on next step')
                                        </p>
                                    @endif
                                </ul>
                            </div>
                        </div>
                      
                                       
                        @if( 1000 >$data->method_code)
                            <a href="{{session()->get('pricePlan')? route('user.payment.confirm'): route('user.deposit.confirm')}}" class="btn btn--primary btn-block py-3 font-weight-bold mt-4">@lang('Confirm')</a>
                        @else
                            <a href="{{session()->get('pricePlan')? route('user.payment.manual.confirm'):
                            route('user.deposit.manual.confirm')}}" class="btn btn--primary btn-block py-3 font-weight-bold mt-4">@lang('Confirm')</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop


