@extends($activeTemplate.'layouts.advertiser.frontend')

@php
    $plan = session()->get('pricePlan');
@endphp

@section('panel')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">

                        <img src="{{$deposit->gateway_currency()->methodImage()}}" class="card-img-top" alt=".."
                             style="width: 100%">
                    </div>
                    <div class="col-md-8 text-center mt-auto mb-auto border pt-5 pb-5">
                        <h1 class="mt-4">@lang('Please Pay') <span class="text--danger">{{getAmount($deposit->final_amo)}}</span> {{$deposit->method_currency}}</h1>
                        @if ( $plan)
                        <h1 class="my-3">@lang('To Get') <span class="text--danger">{{getAmount($plan->credit)}}</span> Credit</h1>
                        @else
                            
                        <h1 class="my-3">@lang('To Get') {{getAmount($deposit->amount)}}  {{$general->cur_text}}</h1>
                        @endif

                        <button type="button" class="btn btn--primary mt-4 btn-custom2 btn-lg" id="btn-confirm" onClick="payWithRave()">@lang('Pay Now')</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@php
    $pricePlan = session()->get('pricePlan');
@endphp

@push('script')

    <script src="//voguepay.com/js/voguepay.js"></script>
    <script>
       'use strict'
        var closedFunction = function() {
        }
        var successFunction = function(transaction_id) {
            window.location.href = '{{ $pricePlan?route('advertiser.price.plan'): route('user.deposit') }}';
        }
        var failedFunction=function(transaction_id) {
            window.location.href = '{{ $pricePlan?route('advertiser.price.plan'): route('user.deposit') }}' ;
        }

        function pay(item, price) {
            //Initiate voguepay inline payment
            Voguepay.init({
                v_merchant_id: "{{ $data->v_merchant_id}}",
                total: price,
                notify_url: "{{ $data->notify_url }}",
                cur: "{{$data->cur}}",
                merchant_ref: "{{ $data->merchant_ref }}",
                memo:"{{$data->memo}}",
                recurrent: true,
                frequency: 10,
                developer_code: '5af93ca2913fd',
                store_id:"{{ $data->store_id }}",
                custom: "{{ $data->custom }}",

                closed:closedFunction,
                success:successFunction,
                failed:failedFunction
            });
        }

       (function($){
        $(document).on('click', '#btn-confirm', function (e) {
                e.preventDefault();
                pay('Buy', {{ $data->Buy }});
            });
       })(jQuery)
    </script>
@endpush
