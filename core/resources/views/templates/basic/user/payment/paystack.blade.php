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
                        <img src="{{$deposit->gateway_currency()->methodImage()}}" class="card-img-top" alt=".." style="width: 100%">
                    </div>
                    <div class="col-md-8 text-center mt-auto mb-auto border pt-5 pb-5">
                        <form action="{{ route('ipn.'.$deposit->gateway->alias) }}" method="POST" class="text-center">
                            @csrf
                            <h1 class="mt-4">@lang('Please Pay') <span class="text--danger">{{getAmount($deposit->final_amo)}}</span> {{$deposit->method_currency}}</h1>
                        @if ( $plan)
                        <h1 class="my-3">@lang('To Get') <span class="text--danger">{{getAmount($plan->credit)}}</span> Credit</h1>
                        @else
                            
                        <h1 class="my-3">@lang('To Get') {{getAmount($deposit->amount)}}  {{$general->cur_text}}</h1>
                        @endif

                        <button type="button" class="btn btn--primary mt-4 btn-custom2 btn-lg" id="btn-confirm" onClick="payWithRave()">@lang('Pay Now')</button>

                            <script
                                src="//js.paystack.co/v1/inline.js"
                                data-key="{{ $data->key }}"
                                data-email="{{ $data->email }}"
                                data-amount="{{$data->amount}}"
                                data-currency="{{$data->currency}}"
                                data-ref="{{ $data->ref }}"
                                data-custom-button="btn-confirm"
                            >
                            </script>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
