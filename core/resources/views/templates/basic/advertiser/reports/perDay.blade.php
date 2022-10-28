@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="table-responsive--md">
                    <table class=" table style--two">
                        <thead>
                        <tr>
                            <th scope="col">@lang('Date')</th>
                            <th scope="col">@lang('TRX')</th>
                            <th scope="col">@lang('Amount')</th>
                            <th scope="col">@lang('Detail')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $trx)
                            <tr>
                                <td data-label="@lang('Date')">{{ $trx->date }}</td>
                                <td data-label="@lang('TRX')" class="font-weight-bold">{{ $trx->trx }}</td>
                              
                                <td data-label="@lang('Amount')" class="budget">
                                    <strong @if($trx->trx_type == '+') class="text-success" @else class="text-danger" @endif> {{($trx->trx_type == '+') ? '+':'-'}} {{getAmount($trx->amount)}} {{$general->cur_text}}</strong>
                                </td>
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
                {{paginateLinks($transactions)}}
            </div>
        </div>
    </div>



@endsection


@push('breadcrumb-plugins')

        <form action="{{route('advertiser.date.search')}}" method="GET" class="form-inline float-sm-right bg--white">
            <div class="input-group has_append">
            <input type="text" name="date" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="{{trans('search between two dates')}}">
                <div class="input-group-append">
                    <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
    </form>
        
        
@endpush

@push('script-lib')
<script src="{{asset('assets/admin/js/vendor/datepicker.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/datepicker.en.js')}}"></script>
@endpush
@push('script')
    
    <script>
    'use strict';
    $('.datepicker-here').datepicker();
    </script>
@endpush
