@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
<div class="container-fluid position-relative px-0">

    <form method="POST" action="{{ route('advertiser.payments.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser">

        <div class="form-inline">
            <div class="has_append input-group" style="width: 215px;">
                <span class="form-text">Total Campaign Budget</span>
            </div>
            <div class="m-1">
                <input type="number" value="{{ Auth::guard('advertiser')->user()->total_budget }}" name="total_budget" class="bg-white form-control text--black" placeholder="Sum of Budget of All ads" value="">
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group has_append" style="width: 215px;">
                <span class="form-text">Amount used before this day</span>
            </div>
            <div class="m-1">
                <input type="text" value="{{ Auth::guard('advertiser')->user()->amount_used }}" name="amount_used" class=" bg-white form-control text--black" placeholder="Amount used yesterday" value="">

            </div>
        </div>
        <div>
            <button type="submit" class="btn btn--primary">@lang('Save changes')</button>
        </div>
    </form>

    <div class="bg-white p-3 rounded-lg" style="width: 150px;position: absolute;right: 2rem;top: 0rem;">
        <div class="text-center">
            <span class="form-text text--black">Wallet Deposit</span>
        </div>
        <div class="m-1">
            <span class="text--gray" value="">$</span>
            <span class="text--gray" value="">{{ Auth::guard('advertiser')->user()->wallet_deposit }}</span>
        </div>

    </div>

</div>

<div class="container-fluid position-relative px-0">

    <form method="POST" action="{{ route('advertiser.payments.createsession') }}">
        @csrf

    </form>
    <div>
        <button class="btn btn--primary setup-payment">@lang('Set up Payment Method')</button>
    </div>

</div>


<div class="container-fluid position-relative px-0">

    <form method="POST" action="{{ route('ipn.advertiser_charge') }}">
        @csrf
        <div>
            <button type="submit" class="btn btn--primary">@lang('Charge from Current wallet')</button>
        </div>
    </form>


</div>

<div class="row">
    <div class="col-lg-12 d d-flex justify-content-end">

        <input type="text" id="daterange" name="daterange" value="Today">

        <form method="GET" id="RangeForm" hidden>
        <input id="startDate" name="startDate" />
        <input id="endDate" name="endDate" />
        <div>
            <button type="submit" class="btn btn--primary">@lang('Charge from Current wallet')</button>
        </div>
    </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="table-responsive--lg">
                <table class="table style--two">
                    <thead>
                        <tr>
                            <th scope="col">@lang('Transaction Date')</th>
                            <th scope="col">@lang('Inital Wallet Balance')</th>
                            <th scope="col">@lang('Total Campaign Budget')</th>
                            <th scope="col">@lang('Amount Spent Yesterday')</th>
                            <th scope="col">@lang('Amount Deducted From Card')</th>
                            <th scope="col">@lang('Final Balance')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($trxs as $trx)
                        <tr>
                            <td data-label="@lang('Transaction Date')">{{ showDateTime($trx->trx_date) }}</td>
                            <td data-label="@lang('Inital Wallet Balance')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->init_blance)  }}</td>
                            <td data-label="@lang('Total Campaign Budget')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->total_budget) }} </td>
                            <td data-label="@lang('Amount Spent Yesterday')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->spent_previous_day) }} </td>
                            <td data-label="@lang('Amount Deducted From Card')" class="budget"> {{ ($trx->deduct) }}</td>
                            <td data-label="@lang('Final Balance')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->final_wallet) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table><!-- table end -->
            </div>
        </div>
        <div class="my-3">
            {{paginateLinks($trxs)}}
        </div>
    </div>
</div>



{{-- SETUP PAYMENT MODAL --}}
<div id="SetupPaymentModal" style="max-width: 100vw;" class="modal fade right modal-lg" tabindex="-1" role="dialog">
    <div class="float-right h-100 m-0 modal-dialog w-100" style="max-width: 25rem;" role="document">
        <div class="modal-content h-100">
            <div class="modal-body h-100">
                <div id="error-message"> </div>
                <form id="payment-form" data-secret="{{$intent->client_secret}}">
                    <div id="payment-element">
                        <!-- Elements will create form elements here -->
                    </div>

                    <button id="submit">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection


@push('script')
<script type="text/javascript">
    "use strict";
    $(function() {
        $(document).ready(function() {
            //Date Range

            var datee =  new Date ((new URLSearchParams(window.location.search)).get('startDate'));
            var startDate =  ( Number(datee.getMonth())+1 )+   "/" + datee.getDate() +"/" + datee.getFullYear()
            var datee =  new Date ((new URLSearchParams(window.location.search)).get('endDate'));
            var endDate =  ( Number(datee.getMonth())+1 )+   "/" + datee.getDate() +"/" + datee.getFullYear()
            $('#daterange').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                "alwaysShowCalendars": true,                
                "startDate":  startDate,
                "endDate": endDate,
                "opens": "left",
                "drops": "auto"
            }, function(start, end, label) {
                $('#startDate').val(start.format('YYYY-MM-DD'));
                $('#endDate').val(end.format('YYYY-MM-DD'));
                $('#RangeForm').submit();
                console.log('New date range selected: ' +  + ' to ' + end.format('MM-DD-YYYY') + ' (predefined range: ' + label + ')');
            });
        });

    });
</script>

<script>
    "use strict";

    $('.setup-payment').on('click', function() {
        var modal = $('#SetupPaymentModal');
        modal.modal('show');
    });
    const options = {
        clientSecret: '{{$intent->client_secret}}',
        // Fully customizable with appearance API.
        appearance: {
            theme: 'stripe'
        },
    };
    const stripe = Stripe('{{$publishable_key}}');
    // Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 3
    const elements = stripe.elements(options);

    // Create and mount the Payment Element
    const paymentElement = elements.create('payment');
    paymentElement.mount('#payment-element');

    const form = document.getElementById('payment-form');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const {
            error
        } = await stripe.confirmSetup({
            //`Elements` instance that was used to create the Payment Element
            elements,
            confirmParams: {
                return_url: '{{ route("advertiser.payments.success") }}',
            }
        });

        if (error) {
            const messageContainer = document.querySelector('#error-message');
            messageContainer.textContent = error.message;
        } else {
            // Your customer will be redirected to your `return_url`. For some payment
            // methods like iDEAL, your customer will be redirected to an intermediate
            // site first to authorize the payment, then redirected to the `return_url`.
        }
    });
</script>
@endpush


@push('style')
<style>
    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }
</style>
@endpush