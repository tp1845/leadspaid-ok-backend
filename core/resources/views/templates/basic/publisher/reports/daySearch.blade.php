@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Date')</th>
                                <th scope="col">@lang('TRX')</th>
                                <th scope="col">@lang('Total Earning')</th>
                                <th scope="col">@lang('Post Balance')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($logs as $trx)
                                <tr>
                                    <td data-label="@lang('Date')">{{ $trx->date}}</td>
                                    <td data-label="@lang('TRX')" class="font-weight-bold">{{ $trx->trx }}</td>                  
                                    <td data-label="@lang('Total Earning')">{{ $trx->post_balance +0 }} {{$general->cur_text}}</td>
                                    <td data-label="@lang('Post Balance')">{{ $trx->details }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                
                    {{ $logs->links('admin.partials.paginate') }}
        </div>
    </div>



@endsection


@push('breadcrumb-plugins')

<form action="{{route('publisher.date.search')}}" method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
    <input type="text" name="date" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="{{trans('Search between two dates')}}">
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

