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
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Ad Type')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($logs as $log)
                                <tr>
                                    <td data-label="Date">{{$log->date}}</td>
                                    <td data-label="Ad Title" class="font-weight-bold">{{ $log->ad->ad_title }}</td>                         
                                    <td data-label="Amount">{{ getAmount($log->amount,3) }} {{$general->cur_text}}</td>
                                    <td data-label="Ad Type"><span class="badge {{$log->ad_type == 'click'?'badge--primary':'badge--warning'}} ">{{ $log->ad_type }}</span></td>
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
                    {{paginateLinks($logs)}}
                </div>
        </div>
    </div>



@endsection


@push('breadcrumb-plugins')

<form action="{{route('publisher.date.search')}}" method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
    <input type="text" name="date" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="{{trans('search by dates')}}">
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
