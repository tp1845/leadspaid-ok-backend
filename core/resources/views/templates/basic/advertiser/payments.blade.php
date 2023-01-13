@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<style>
    #myTable_wrapper,
    #MyPayments_wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    #myTable_info,
    #MyPayments_info {
        flex: auto;
        text-align: right;
    }

    #tabs-2 .table.style--two thead tr th:first-child,
    #tabs-2 .card,
    #tabs-1 .card,
    #tabs-1 .table.style--two thead tr th:first-child {
        border-radius: 0;
    }

    .fs-16 {
        font-size: 16px !important;
    }

    .adsrock-list ul li {
        display: flex;
    }

    .adsrock-billing-summary p,
    .adsrock-detail-list,
    .adsrock-detail-list,
    .adsrock-name-list,
    .adsrock-name-list,
    .adsrock-bill-list p,
    .adsrock-bill-list p a {
        font-size: 16px;
    }

    .adsrock-heading p {
        font-size: 14px;
    }

    .adsrock-bill-list h6 {
        /*        font-size: 10px;*/
    }

    .adsrock-heading h4,
    .adsrock-heading h3,
    .adsrock-heading h5 {
        font-size: 16px;
    }

    .adsrock-name-list,
    .adsrock-name-list {
        flex: 0 0 30%;
        width: 30%;
        border-right: 1px solid #ddd;
        padding: 7px 0;
    }

    .adsrock-detail-list,
    .adsrock-detail-list {
        flex: 0 0 70%;
        width: 70%;
        padding: 7px 0;
    }

    .adsrock-download-pd {
        padding: 10px 20px;
    }

    .adsrock-invoice ul li a {
        padding: 10px 30px;
        font-size: 16px;
    }

    .adsrock-icon svg {
        width: 20px;
        height: 20px;
    }

    .adsrock-icon.setup-payment {
        cursor: pointer;
    }

    #myTable_length .custom-select {
        width: 70px;
    }

    #myTable_length,
    #MyPayments_length {
        padding: 5px 0px 0px 5px;
        float: left;
        width: 30%;
    }

    /*#myTable_info, #MyPayments_info  {
    width: 35%;
    float: left;
} */
    /*#myTable_length, #MyPayments_length {
    width: 30%;
    float: left;
}
#myTable_paginate, #MyPayments_paginate {
    width: 35%;
    float: right;
}*/
    #myTable_info,
    #MyPayments_info {
        /* width: 30%;
    float: left;*/
        clear: unset;
        text-align: right;
    }

    #myTable_length,
    #MyPayments_length {
        width: unset;
    }

    #myTable_paginate ul li {
        margin-top: 0;
        margin-bottom: 0;
        padding: 0;
    }

    .table.style--two tr th {
        font-size: 15px;
    }

    .table.style--two tr td,
    .table.style--two tbody tr td {
        font-size: .75rem;
    }

    table.dataTable thead tr,
    .table.style--two thead tr th {
        background-color: #1A273A;
    }

    .table.style--two thead tr th {
        padding: 12px 10px;
    }

    table.dataTable tbody tr td {
        font-size: 16px !important;
        color: #1a273a !important;
        font-weight: normal;
    }

    .paymentt_tab input {
        border-radius: 0;
        height: calc(1rem + 1rem + 2px);
        font-size: 15px !important;
        border: 1px solid #ced4da;
    }

    .daterangepicker .calendar-table th,
    .daterangepicker .calendar-table td {
        font-size: 15px;
    }

    .daterangepicker .ranges li {
        font-size: 15px;
    }

    #MyPayments_wrapper,
    #myTable_wrapper {
        overflow-x: scroll;
    }

    #MyPayments_wrapper .custom-select {
        width: 70px;
    }

    #MyPayments_length,
    #MyPayments_info {
        padding: 5px 0px 0px 5px;
    }

    table.dataTable {
        width: 100% !important;
    }

    .dataTables_paginate .pagination .page-item.active .page-link {
        background-color: #1361b2;
        border-color: #1361b2;
        box-shadow: 0px 3px 5px rgb(0, 0, 0, 0.125);
    }

    .dataTables_paginate .pagination .page-item {
        margin: 0px 7px 7px 7px !important;
    }

    #MyPayments_info {
        padding-top: 0.85em;
    }

    #myTable_paginate ul li a,
    #MyPayments_paginate ul li a {
        border-radius: 0px !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: white !important;
        border: 1px solid transparent;
        background-color: transparent;
        background: transparent;
    }

    .pagination .page-link:hover {
        z-index: 2;
        color: #fff !important;
        text-decoration: none;
        background-color: #1361b2;
        border-color: #1361b2;
    }

    .custom_bg_change_btn button.btn--primary {
        background: #1361b2 !important;
        border-radius: 0;
    }

    .custom_bg_change_btn .form-text {
        color: #5b6e88 !important;
    }

    #MyPayments thead tr th:nth-child(1),
    #MyPayments tbody tr td:nth-child(1) {
        display: none;
    }

    #MyPayments_wrapper thead tr th {
        position: relative;
        cursor: pointer;
    }

    #MyPayments_wrapper thead tr th:nth-child(2):after {
        bottom: 50% !important;
        content: "▲" !important;
        position: absolute !important;
        display: block !important;
        opacity: .125 !important;
        right: 10px !important;
        line-height: 9px !important;
        font-size: .8em !important;
    }

    #MyPayments_wrapper thead tr th:nth-child(2):before {
        position: absolute !important;
        display: block !important;
        opacity: .125 !important;
        right: 10px !important;
        line-height: 9px !important;
        font-size: .8em !important;
        top: 50% !important;
        content: "▼" !important;
    }

    .ar-12 {
        font-size: 12px !important;
    }

    .text-green {
        color: #008000;
    }


    .us_doller input[aria-invalid="false"],
    .us_doller input {
        padding-left: 90px !important;
    }

    .us_doller:after {
        content: 'US$';
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: rgb(33 37 41 / 80%);
        left: 0;
        background: #f1f1f2;
        font-size: 14px;
        height: 100%;
        border: 1px solid #94a1b5;
        padding: 10px 20px;
    }

    .us_doller {
        position: relative;
    }

    .form-control,
    .custom-select {
        border-radius: 0;
        background-color: #fff;
        /*        font-size: 19px!important;*/
        /*        font-weight: 300!important;*/
        color: #212529 !important;
        border-radius: 0 !important;
        vertical-align: middle !important;
        border: 1px solid #94a1b5 !important;
        outline: none !important;
        padding: 10px 18px !important;
        height: auto;
    }
</style>
<div class="container-fluid position-relative px-0     5555555">

    <div class="row">
        <div class="col-md-9 col-xl-9 col-lg-9 col-sm-12 col-12 adsrock-heading mb-xl-0 mb-lg-0 mb-md-0 mb-sm-4 mb-4">
            <div class="row">

                <div class="col-md-6 mb-xl-0 mb-lg-0 mb-md-4 mb-sm-4 mb-4 px-0">
                    <div class="border px-3">
                        <div class="border-bottom py-2 mb-2 d-flex justify-content-between">
                            <h4 class="">Contact Information</h4>
                            <div class="adsrock-icon"><a href="{{ url('/') }}/advertiser/profile">
                                    <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 34.5v7.5h7.5l22.13-22.13-7.5-7.5-22.13 22.13zm35.41-20.41c.78-.78.78-2.05 0-2.83l-4.67-4.67c-.78-.78-2.05-.78-2.83 0l-3.66 3.66 7.5 7.5 3.66-3.66z" />
                                        <path d="M0 0h48v48h-48z" fill="none" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="adsrock-list pt-3">
                            <ul>
                                <li>
                                    <div class="adsrock-name-list">
                                        Company Name:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{ auth()->guard('advertiser')->user()->company_name }}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        Full Name:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{auth()->guard('advertiser')->user()->name}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        Address:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{auth()->guard('advertiser')->user()->billed_to}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        City:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{auth()->guard('advertiser')->user()->city}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        Country:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{auth()->guard('advertiser')->user()->country}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        Postal Code:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{auth()->guard('advertiser')->user()->postal_code}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        Billing Email:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{auth()->guard('advertiser')->user()->email}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        Phone Number:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        @if(!empty(auth()->guard('advertiser')->user()->country_code)) {{auth()->guard('advertiser')->user()->country_code}} - @endif {{auth()->guard('advertiser')->user()->mobile}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 pl-0">
                    <div class="border px-3 h-100">
                        <div class="border-bottom py-2 mb-2 d-flex justify-content-between">
                            <h4 class="">Payment Information</h4>
                            <div class="adsrock-icon setup-payment">
                                <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 34.5v7.5h7.5l22.13-22.13-7.5-7.5-22.13 22.13zm35.41-20.41c.78-.78.78-2.05 0-2.83l-4.67-4.67c-.78-.78-2.05-.78-2.83 0l-3.66 3.66 7.5 7.5 3.66-3.66z" />
                                    <path d="M0 0h48v48h-48z" fill="none" />
                                </svg>
                            </div>
                        </div>
                        <div class="adsrock-list pt-3">
                            <ul>
                                <li>
                                    <div class="adsrock-name-list">
                                        Card Type:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{ucfirst($card_info->brand)}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        Card Number:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{ $card_info->last4? "**** **** **** ". $card_info->last4:""}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        Expires:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{$card_info->last4?$card_info->exp_month."/".$card_info->exp_year:""}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        CVC:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{ $card_info->last4? "***":""}}
                                    </div>
                                </li>
                                <li>
                                    <div class="adsrock-name-list">
                                        Country:
                                    </div>
                                    <div class="adsrock-detail-list pl-3">
                                        {{$card_info->country}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <p class="py-2">*Please note that the current card service charge is 3%</p>
                        <div class="border-top py-10">
                            <div>
                                <form method="POST" action="{{ route('ipn.manual_pay') }}" class="d-flex" style="gap: 10px;">
                                    @csrf
                                    <div class="d-flex" style="display: flex;align-items: center;gap: 14px;">
                                        Amount:
                                        <div class="us_doller" style="width: 160px;">
                                            <input type="text" id="AmountInput" class="form-control bg-white" name="amount" placeholder="Daliy Budget" required>
                                        </div>
                                    </div>
                                    <div class="custom_bg_change_btn">
                                        <button type="submit" class="btn btn--primary fs-16">@lang('Make a Manual payment')</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3 col-lg-3 col-sm-12 col-12 adsrock-heading mb-xl-0 mb-lg-0 mb-md-0 mb-sm-4 mb-4">
            <div class="row h-100">
                <div class="col-12 border p-3">
                    <h4>Billing Summary</h4>
                    <div class="adsrock-billing-summary">
                        <p class="payment-current-wallet">Current Wallet Balance:</p>
                        <h5 class="text-green">${{ Auth::guard('advertiser')->user()->wallet_deposit }}</h5>
                    </div>
                    <hr>
                    <div class="adsrock-bill-list">
                        <h6>Next Bill:</h6>
                        <h3>

                            @php
                            if($showbill){
                            if (isset($nextbill)){
                            echo date('M d, Y', strtotime($nextbill)) . " , 10:00 AM";
                            }else{
                            $currentTime = time() + 3600;

                            if ($newDateTime >= 10) {
                            echo date('M d, Y', strtotime(' +1 day',strtotime ($currentDateTime))) . " , 10:00 AM";
                            }else{
                            echo date('M d, Y',strtotime($currentDateTime)) . " , 10:00 AM";
                            }
                            }

                            }


                            @endphp

                        </h3><br>
                        <p class="ar-12">Everyday at 10:00 AM,</p>
                        <p class="ar-12">


                            <b>1) Amount deducted from your prepaid-wallet</b><br />
                            =Lead Generation Cost spent during 10am yesterday till 10am today.<br />
                            <b>2) Amount charged from your payment method</b><br />
                            =Next day Campaign Budget - Wallet Balance
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <form method="POST" class="d-none" action="{{ route('advertiser.payments.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser">

        <div class="form-inline">
            <div class="has_append input-group" style="width: 240px;">
                <span class="form-text">Total Campaign Budget</span>
            </div>
            <div class="m-1">
                <input type="number" value="{{ Auth::guard('advertiser')->user()->total_budget }}" name="total_budget" class="bg-white form-control text--black" placeholder="Sum of Budget of All ads" value="">
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group has_append" style="width: 240px;">
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

    <div class="bg-white p-3 rounded-lg d-none">
        <div class="text-center">
            <span class="form-text text--black">Wallet Deposit</span>
        </div>
        <div class="m-1">
            <span class="text--gray" value="">$</span>
            <span class="text--gray" value="">{{ Auth::guard('advertiser')->user()->wallet_deposit }}</span>
        </div>

    </div>

</div>



<div class="row">
    <div class="col-lg-12 d d-flex justify-content-between align-items-end">
        <div class="adsrock-invoice mt-2">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab">Invoices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#tabs-1" role="tab">Transactions</a>
                </li>

            </ul><!-- Tab panes -->
        </div>
        <div class="my-2 paymentt_tab">
            <input type="text" id="daterange" name="daterange" value="Today">
            <form method="GET" id="RangeForm" hidden>
                <input id="startDate" name="startDate" />
                <input id="endDate" name="endDate" />
            </form>
            <!-- <button type="button" class="btn btn-danger rounded-0 ml-2 adsrock-download-pd">Download Invoice</button> -->
        </div>

    </div>
    <div class="col-12">
        <div class="tab-content">
            <div class="tab-pane " id="tabs-1" role="tabpanel">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="table-responsive--lg">
                                <table class="table style--two" id="MyPayments">
                                    <thead>
                                        <tr>
                                            <th scope="col">@lang('ID')</th>
                                            <th scope="col">@lang('Transaction Date')</th>
                                            <th scope="col">@lang('Initial Wallet Balance')</th>
                                            <th scope="col">@lang('Total Campaign Budget')</th>
                                            <th scope="col">@lang('Amount Spent Yesterday')</th>
                                            <th scope="col">@lang('Amount Deducted From Card')</th>
                                            <th scope="col">@lang('Final Wallet Balance')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                        @forelse($trxs as $trx)
                                        <tr>
                                            <td data-label="@lang('ID')">{{ $i++ }}</td>
                                            <td data-label="@lang('Transaction Date')">{{ \Carbon\Carbon::parse($trx->trx_date)->isoFormat("DD-MMM 'YY | hh:mm A")  }}</td>
                                            <td data-label="@lang('Inital Wallet Balance')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->init_blance)  }}</td>
                                            <td data-label="@lang('Total Campaign Budget')" class="budget">{{$trx->total_budget === "NA"? "NA": $general->cur_sym . " ".  getAmount((float)$trx->total_budget)}} </td>
                                            <td data-label="@lang('Amount Spent Yesterday')" class="budget">{{$trx->spent_previous_day === "NA"? "NA": $general->cur_sym . " ".  getAmount((float)$trx->spent_previous_day) }} </td>
                                            <td data-label="@lang('Amount Deducted From Card')" class="budget"> {{ ($trx->deduct) }}</td>
                                            <td data-label="@lang('Final Wallet Balance')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->final_wallet) }}</td>
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

                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="tabs-2" role="tabpanel">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="table-responsive--lg">
                                <table class="table style--two" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="text-white px-1">Date</span></th>
                                            <th scope="col"><span class="text-white px-1">Invoice Number</span></th>
                                            <th scope="col"><span class="text-white px-1">Amount (USD)</span></th>
                                            <th scope="col"><span class="text-white px-1">Payment Status</span></th>
                                            <th scope="col"><span class="text-white px-1">Download</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ta as $tas)
                                        @if($tas['deduct'] !=0)
                                        <tr>
                                            <td scope="col">{{date('Y-m-d',strtotime($tas['trx_date']))}}</td>
                                            <td scope="col"> {{get_invoice_format($tas['id']) }} </td>
                                            <td scope="col">{{$tas['deduct']}}</td>
                                            <td scope="col">Paid</td>
                                            <td scope="col">
                                                @if(empty(auth()->guard('advertiser')->user()->billed_to) || empty(auth()->guard('advertiser')->user()->city) )
                                                <a href="{{ url('/')}}/advertiser/profile" onclick="return confirm('Please fill your profile before downloading the invoice')"><svg style="enable-background:new 0 0 128 128; width:20px" version="1.1" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <g />
                                                        <g id="Ps" />
                                                        <g id="Ai" />
                                                        <g id="Ai_download" />
                                                        <g id="Image" />
                                                        <g id="Image_download" />
                                                        <g id="Video" />
                                                        <g id="Video_download" />
                                                        <g id="Ps_download" />
                                                        <g id="Doc" />
                                                        <g id="Doc_download" />
                                                        <g id="Music" />
                                                        <g id="Music_download" />
                                                        <g id="Pdf">
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <path d="M104,126H24c-5.514,0-10-4.486-10-10V12c0-5.514,4.486-10,10-10h40.687      c2.671,0,5.183,1.041,7.07,2.929l39.314,39.314c1.889,1.889,2.929,4.399,2.929,7.07V116C114,121.514,109.514,126,104,126z M24,6      c-3.309,0-6,2.691-6,6v104c0,3.309,2.691,6,6,6h80c3.309,0,6-2.691,6-6V51.313c0-1.579-0.641-3.125-1.757-4.242L68.929,7.757      C67.796,6.624,66.289,6,64.687,6H24z" style="fill:#FD4233;" />
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path d="M95.21,80.32c-0.07-0.51-0.48-1.15-0.92-1.58c-1.26-1.24-4.03-1.89-8.25-1.95      c-2.86-0.03-6.3,0.22-9.92,0.73c-1.62-0.93-3.29-1.95-4.6-3.18c-3.53-3.29-6.47-7.86-8.31-12.89c0.12-0.47,0.22-0.88,0.32-1.3      c0,0,1.98-11.28,1.46-15.1c-0.07-0.52-0.12-0.67-0.26-1.08l-0.17-0.44c-0.54-1.25-1.6-2.57-3.26-2.5L60.32,41H60.3      c-1.86,0-3.36,0.95-3.76,2.36c-1.2,4.44,0.04,11.09,2.29,19.69l-0.58,1.4c-1.61,3.94-3.63,7.9-5.41,11.39l-0.23,0.45      c-1.88,3.67-3.58,6.79-5.13,9.43l-1.59,0.84c-0.12,0.06-2.85,1.51-3.49,1.89c-5.43,3.25-9.03,6.93-9.63,9.85      c-0.19,0.94-0.05,2.13,0.92,2.68l1.54,0.78c0.67,0.33,1.38,0.5,2.1,0.5c3.87,0,8.36-4.82,14.55-15.62      c7.14-2.32,15.28-4.26,22.41-5.32c5.43,3.05,12.11,5.18,16.33,5.18c0.75,0,1.4-0.07,1.92-0.21c0.81-0.22,1.49-0.68,1.91-1.3      C95.27,83.76,95.43,82.06,95.21,80.32z M36.49,99.33c0.7-1.93,3.5-5.75,7.63-9.13c0.26-0.21,0.9-0.81,1.48-1.37      C41.28,95.72,38.39,98.46,36.49,99.33z M60.95,43c1.24,0,1.95,3.13,2.01,6.07c0.06,2.94-0.63,5-1.48,6.53      c-0.71-2.26-1.05-5.82-1.05-8.15C60.43,47.45,60.38,43,60.95,43z M53.65,83.14c0.87-1.55,1.77-3.19,2.69-4.92      c2.25-4.25,3.67-7.57,4.72-10.3c2.1,3.82,4.72,7.07,7.79,9.67c0.39,0.32,0.8,0.65,1.22,0.98C63.82,79.8,58.41,81.31,53.65,83.14      z M93.08,82.79c-0.38,0.23-1.47,0.37-2.17,0.37c-2.26,0-5.07-1.03-9-2.72c1.51-0.11,2.9-0.17,4.14-0.17      c2.27,0,2.94-0.01,5.17,0.56C93.44,81.4,93.47,82.55,93.08,82.79z" style="fill:#FF402F;" />
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Pdf_download" />
                                                        <g id="Word" />
                                                        <g id="Word_download" />
                                                        <g id="Exel" />
                                                        <g id="Exel_download" />
                                                        <g id="Powerpoint" />
                                                        <g id="Powerpoint_download" />
                                                        <g id="Zip" />
                                                        <g id="Zip_download" />
                                                    </svg>Download PDF</a>
                                                @else
                                                <a href="{{ url('/')}}/advertiser/invoices/{{ $tas['id'] }}"><svg style="enable-background:new 0 0 128 128; width:20px" version="1.1" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <g />
                                                        <g id="Ps" />
                                                        <g id="Ai" />
                                                        <g id="Ai_download" />
                                                        <g id="Image" />
                                                        <g id="Image_download" />
                                                        <g id="Video" />
                                                        <g id="Video_download" />
                                                        <g id="Ps_download" />
                                                        <g id="Doc" />
                                                        <g id="Doc_download" />
                                                        <g id="Music" />
                                                        <g id="Music_download" />
                                                        <g id="Pdf">
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <path d="M104,126H24c-5.514,0-10-4.486-10-10V12c0-5.514,4.486-10,10-10h40.687      c2.671,0,5.183,1.041,7.07,2.929l39.314,39.314c1.889,1.889,2.929,4.399,2.929,7.07V116C114,121.514,109.514,126,104,126z M24,6      c-3.309,0-6,2.691-6,6v104c0,3.309,2.691,6,6,6h80c3.309,0,6-2.691,6-6V51.313c0-1.579-0.641-3.125-1.757-4.242L68.929,7.757      C67.796,6.624,66.289,6,64.687,6H24z" style="fill:#FD4233;" />
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path d="M95.21,80.32c-0.07-0.51-0.48-1.15-0.92-1.58c-1.26-1.24-4.03-1.89-8.25-1.95      c-2.86-0.03-6.3,0.22-9.92,0.73c-1.62-0.93-3.29-1.95-4.6-3.18c-3.53-3.29-6.47-7.86-8.31-12.89c0.12-0.47,0.22-0.88,0.32-1.3      c0,0,1.98-11.28,1.46-15.1c-0.07-0.52-0.12-0.67-0.26-1.08l-0.17-0.44c-0.54-1.25-1.6-2.57-3.26-2.5L60.32,41H60.3      c-1.86,0-3.36,0.95-3.76,2.36c-1.2,4.44,0.04,11.09,2.29,19.69l-0.58,1.4c-1.61,3.94-3.63,7.9-5.41,11.39l-0.23,0.45      c-1.88,3.67-3.58,6.79-5.13,9.43l-1.59,0.84c-0.12,0.06-2.85,1.51-3.49,1.89c-5.43,3.25-9.03,6.93-9.63,9.85      c-0.19,0.94-0.05,2.13,0.92,2.68l1.54,0.78c0.67,0.33,1.38,0.5,2.1,0.5c3.87,0,8.36-4.82,14.55-15.62      c7.14-2.32,15.28-4.26,22.41-5.32c5.43,3.05,12.11,5.18,16.33,5.18c0.75,0,1.4-0.07,1.92-0.21c0.81-0.22,1.49-0.68,1.91-1.3      C95.27,83.76,95.43,82.06,95.21,80.32z M36.49,99.33c0.7-1.93,3.5-5.75,7.63-9.13c0.26-0.21,0.9-0.81,1.48-1.37      C41.28,95.72,38.39,98.46,36.49,99.33z M60.95,43c1.24,0,1.95,3.13,2.01,6.07c0.06,2.94-0.63,5-1.48,6.53      c-0.71-2.26-1.05-5.82-1.05-8.15C60.43,47.45,60.38,43,60.95,43z M53.65,83.14c0.87-1.55,1.77-3.19,2.69-4.92      c2.25-4.25,3.67-7.57,4.72-10.3c2.1,3.82,4.72,7.07,7.79,9.67c0.39,0.32,0.8,0.65,1.22,0.98C63.82,79.8,58.41,81.31,53.65,83.14      z M93.08,82.79c-0.38,0.23-1.47,0.37-2.17,0.37c-2.26,0-5.07-1.03-9-2.72c1.51-0.11,2.9-0.17,4.14-0.17      c2.27,0,2.94-0.01,5.17,0.56C93.44,81.4,93.47,82.55,93.08,82.79z" style="fill:#FF402F;" />
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Pdf_download" />
                                                        <g id="Word" />
                                                        <g id="Word_download" />
                                                        <g id="Exel" />
                                                        <g id="Exel_download" />
                                                        <g id="Powerpoint" />
                                                        <g id="Powerpoint_download" />
                                                        <g id="Zip" />
                                                        <g id="Zip_download" />
                                                    </svg>Download PDF</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table><!-- table end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-none">
        <div class="col-lg-12">
            <div class="card">
                <div class="table-responsive--lg">
                    <table class="table style--two">
                        <thead>
                            <tr>
                                <th scope="col">@lang('ID')</th>
                                <th scope="col">@lang('Transaction Date')</th>
                                <th scope="col">@lang('Inital Wallet Balance')</th>
                                <th scope="col">@lang('Total Campaign Budget')</th>
                                <th scope="col">@lang('Amount Spent Yesterday')</th>
                                <th scope="col">@lang('Amount Deducted From Card')</th>
                                <th scope="col">@lang('Final Wallet Balance')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @forelse($trxs as $trx)
                            <tr>
                                <td data-label="@lang('Transaction Date')">{{ $i++ }}</td>
                                <td data-label="@lang('Transaction Date')">{{ \Carbon\Carbon::parse($trx->trx_date)->isoFormat("DD-MMM 'YY | hh:mm A")  }}</td>
                                <td data-label="@lang('Inital Wallet Balance')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->init_blance)  }}</td>
                                <td data-label="@lang('Total Campaign Budget')" class="budget">{{$trx->total_budget === "NA"? "NA": $general->cur_sym . " ".  getAmount((float)$trx->total_budget)}} </td>
                                <td data-label="@lang('Amount Spent Yesterday')" class="budget">{{$trx->spent_previous_day === "NA"? "NA": $general->cur_sym . " ".  getAmount((float)$trx->spent_previous_day) }} </td>
                                <td data-label="@lang('Amount Deducted From Card')" class="budget"> {{ ($trx->deduct) }}</td>
                                <td data-label="@lang('Final Wallet Balance')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->final_wallet) }}</td>
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

            </div>
        </div>
    </div>



    <!------------------->
    <div class="container-fluid position-relative px-0 mt-3 fs-16 custom_bg_change_btn">

        <form method="POST" action="{{ route('advertiser.payments.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser">

            <div class="form-inline">
                <div class="has_append input-group" style="width: 240px;">
                    <span class="form-text">Total Campaign Budget</span>
                </div>
                <div class="m-1">
                    <input type="number" value="{{ Auth::guard('advertiser')->user()->total_budget }}" name="total_budget" class="bg-white form-control text--black" placeholder="Sum of Budget of All ads" value="">
                </div>
            </div>
            <div class="form-inline">
                <div class="input-group has_append" style="width: 240px;">
                    <span class="form-text">Amount used before this day</span>
                </div>
                <div class="m-1">
                    <input type="text" value="{{ Auth::guard('advertiser')->user()->amount_used }}" name="amount_used" class=" bg-white form-control text--black" placeholder="Amount used yesterday" value="">

                </div>
            </div>
            <div>
                <button type="submit" class="btn btn--primary fs-16">@lang('Save changes')</button>
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
    <div class="container-fluid position-relative px-0 my-2 fs-16 custom_bg_change_btn">
        <form method="POST" action="{{ route('advertiser.payments.createsession') }}">
            @csrf
        </form>
        <div>
            <button class="btn btn--primary setup-payment fs-16">@lang('Set up Payment Method')</button>
        </div>
    </div>


    <div class="container-fluid position-relative px-0  fs-16 custom_bg_change_btn">

        <form method="POST" action="{{ route('ipn.current_advertiser_charge') }}">
            @csrf
            <div>
                <button type="submit" class="btn btn--primary fs-16">@lang('Make a payment')</button>
            </div>
        </form>


    </div>




    <!----------------------->







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
                var isSearched = new URLSearchParams(window.location.search).get('startDate') == null ? false : true;
                var datee = new Date((new URLSearchParams(window.location.search)).get('startDate'));
                var startDate = (Number(datee.getMonth()) + 1) + "/" + datee.getDate() + "/" + datee.getFullYear()
                var datee = new Date((new URLSearchParams(window.location.search)).get('endDate'));
                var endDate = (Number(datee.getMonth()) + 1) + "/" + datee.getDate() + "/" + datee.getFullYear()
                $('#daterange').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment().add(1, 'days')],
                        'Yesterday': [moment().subtract(1, 'days'), moment()],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment().add(1, 'days')],
                        'Last 30 Days': [moment().subtract(30, 'days'), moment().add(1, 'days')],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    "alwaysShowCalendars": true,
                    "startDate": isSearched ? startDate : moment().subtract(6, 'days'),
                    "endDate": isSearched ? endDate : moment().add(1, 'days'),
                    "opens": "left",
                    "drops": "auto"
                }, function(start, end, label) {
                    $('#startDate').val(start.format('YYYY-MM-DD'));
                    $('#endDate').val(end.format('YYYY-MM-DD'));
                    $('#RangeForm').submit();
                    console.log('New date range selected: ' + +' to ' + end.format('MM-DD-YYYY') + ' (predefined range: ' + label + ')');
                });
            });

        });

        $(document).ready(function() {
            $('#myTable').DataTable({
                searching: false,
                "order": [
                    [1, "ASC"]
                ],
                "sDom": 'Lfrtlip',
                "language": {
                    "lengthMenu": "Show rows  _MENU_"
                }
            });
            $('#MyPayments').DataTable({
                searching: false,
                "order": [
                    [0, "asc"]
                ],
                "sDom": 'Lfrtlip',
                'columnDefs': [{
                    'targets': [1], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                }],
                "language": {
                    "lengthMenu": "Show rows  _MENU_"
                }
            });
        });

        $(".nav-item").find(".nav-link").click(function() {

            var hrff = $(this).attr("href");

            if (hrff == "#tabs-2") {
                $(".paymentt_tab").show();
            } else if (hrff == "#tabs-1") {
                $(".paymentt_tab").show();
            }

        })
    </script>

    <script>
        "use strict";
        var typingTimer;
        var $input = $('#AmountInput');

        $('#AmountInput').keyup(function() {
            this.value = this.value.replace(/[^0-9]/g, "");
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, 300);
        });

        function doneTyping() {
            if (Number($('#AmountInput').val()) > 10000){
                $('#AmountInput').val (10000);
            }
            if (Number($('#AmountInput').val()) < 10){
                $('#AmountInput').val(10);
            }
        }


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

        $("#MyPayments").find("th:nth-child(2)").click(function() {

            $("#MyPayments").find("th:nth-child(1)").trigger('click');
        })
    </script>
    @endpush


    @push('style')
    <style>
        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
        }

        .payment-current-wallet {
            font-size: 16px !important;
            font-weight: 600;
        }
    </style>
    <style>

    </style>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    @endpush