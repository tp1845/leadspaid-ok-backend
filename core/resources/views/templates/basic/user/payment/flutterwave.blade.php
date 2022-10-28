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
                        <h1 class="mt-4">@lang('Please Pay') <span class="text--success">{{getAmount($deposit->final_amo)}}</span> {{$deposit->method_currency}}</h1>
                        @if ( $plan)
                        <h1 class="my-3">@lang('To Get') <span class="text--success">{{getAmount($plan->credit)}}</span> @lang('Credit')</h1>
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


@push('script')
<script
src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>

<script>
    'use strict'
var btn = document.querySelector("#btn-confirm");
btn.setAttribute("type", "button");
const API_publicKey = "{{$data->API_publicKey}}";

function payWithRave() {
    var x = getpaidSetup({
        PBFPubKey: API_publicKey,
        customer_email: "{{$data->customer_email}}",
        amount: "{{$data->amount }}",
        customer_phone: "{{$data->customer_phone}}",
        currency: "{{$data->currency}}",
        txref: "{{$data->txref}}",
        onclose: function () {
        },
        callback: function (response) {
            var txref = response.tx.txRef;
            var status = response.tx.status;
            var chargeResponse = response.tx.chargeResponseCode;
            if (chargeResponse == "00" || chargeResponse == "0") {
                window.location = '{{ url('ipn/flutterwave') }}/' + txref + '/' + status;
            } else {
                window.location = '{{ url('ipn/flutterwave') }}/' + txref + '/' + status;
            }
            // x.close(); // use this to close the modal immediately after payment.
        }
    });
}
</script>

@endpush
