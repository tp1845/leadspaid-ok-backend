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

                        <form action="{{$data->url}}" method="{{$data->method}}">


                            <h1 class="mt-4">@lang('Please Pay') <span class="text--success">{{getAmount($deposit->final_amo)}}</span> {{$deposit->method_currency}}</h1>
                            @if ( $plan)
                            <h1 class="my-3">@lang('To Get') <span class="text--success">{{getAmount($plan->credit)}}</span> @lang('Credit')</h1>
                            @else

                            <h1 class="my-3">@lang('To Get') <span class="text--success">{{getAmount($deposit->amount)}}</span>  {{$general->cur_text}}</h1>
                            @endif


                            <script src="{{$data->checkout_js}}"
                                    @foreach($data->val as $key=>$value)
                                    data-{{$key}}="{{$value}}"
                                @endforeach >

                            </script>

                            <input type="hidden" custom="{{$data->custom}}" name="hidden">

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@push('script')
    <script>
        'use strict'
        $(document).ready(function () {
            $('input[type="submit"]').addClass("btn btn--primary mt-4 btn-custom2 btn-lg");
        })
    </script>
@endpush
