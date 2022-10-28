@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="table-responsive--lg">
                    <table class="table style--two">
                        <thead>
                        <tr>
                            <th scope="col">@lang('Date')</th>
                            <th scope="col">@lang('TRX')</th>
             
                            <th scope="col">@lang('Amount')</th>
                            <th scope="col">@lang('Charge')</th>
                            <th scope="col">@lang('Post Balance')</th>
                            <th scope="col">@lang('Detail')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($trxs as $trx)
                            <tr>
                                <td data-label="@lang('Date')">{{ showDateTime($trx->created_at) }}</td>
                                <td data-label="@lang('TRX')" class="font-weight-bold">{{ $trx->trx }}</td>
                                <td data-label="@lang('Amount')" class="budget">
                                    <strong @if($trx->trx_type == '+') class="text-success" @else class="text-danger" @endif> {{($trx->trx_type == '+') ? '+':'-'}} {{getAmount($trx->amount)}} {{$general->cur_text}}</strong>
                                </td>
                                <td data-label="@lang('Charge')" class="budget">{{ $general->cur_sym }} {{ getAmount($trx->charge) }} </td>
                                <td data-label="@lang('Post Balance')">{{ $trx->post_balance +0 }} {{$general->cur_text}}</td>
                                <td data-label="@lang('Detail')">{{ $trx->details }}</td>
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
@endsection

@push('breadcrumb-plugins')

<form action="{{route('advertiser.trx.search')}}" method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="{{trans('TRX')}}" value="">
        <div class="input-group-append">
            <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endpush




