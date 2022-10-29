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
        <div >
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

@endsection