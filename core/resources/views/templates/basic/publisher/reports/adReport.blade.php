@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')
    <div class="row">

        <div class="col-lg-12">
                    <div class="table-responsive--sm">
                        <table class="table  style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Date')</th>
                                <th scope="col">@lang('Ad Title')</th>
                                <th scope="col">@lang('Ad Type')</th>
                                <th scope="col">@lang('Total Clicks')</th>
                                <th scope="col">@lang('Total Impressions')</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($reports as $report)
                                <tr>
                                    <td data-label="@lang('Date')">{{showDateTime($report->date,'d M Y') }}</td>
                                    <td data-label="@lang('Ad Title')">{{ $report->advertise->ad_title }}</td>                         
                                    <td data-label="@lang('Ad Type')"><span class="badge {{$report->advertise->ad_type=='click'?'badge--warning':'badge--primary'}}">{{$report->advertise->ad_type}}</span></td>
                                    <td data-label="@lang('Total Clicks')"><span class="badge badge--warning">{{number_format($report->click_count)}}</span></td>
                                    <td data-label="@lang('Total Impressions')"><span class="badge badge--primary">{{number_format($report->imp_count) }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
              
                <div class="my-2" >
                    {{paginateLinks($reports)}}
                </div>
        </div>
    </div>



@endsection


@push('breadcrumb-plugins')

        <div class="d-flex flex-wrap justify-content-end">
            <form action="{{route('publisher.report.date.search')}}" method="GET" class="form-inline float-sm-right  bg--white ml-3 mb-2">
                <div class="input-group has_append">
                <input type="text" name="date" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="{{trans('search by dates')}}">
                    <div class="input-group-append">
                        <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
    
            <form action="{{route('publisher.report.date.search')}}" method="GET" class="form-inline float-sm-right bg--white ml-3 mb-2">
                <div class="input-group has_append">
                <input type="text" name="search"  class="form-control"  placeholder="{{trans('search by title')}}">
                    <div class="input-group-append">
                        <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        
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
