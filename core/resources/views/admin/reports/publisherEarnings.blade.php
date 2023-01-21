@extends('admin.layouts.app')

@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two" id="datatable5">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Date')</th>
                                <th scope="col">@lang('Publisher')</th>
                                <th scope="col">@lang('Ad Title')</th>
                                <th scope="col">@lang('Ad Type')</th>
                                <th scope="col">@lang('Amount')</th>
                            </tr>
                            </thead>
                            <tbody>

                             @if(!empty($earningLogs))
                            @foreach($earningLogs as  $log)
                               <tr>
                                <td data-label="@lang('Date')">{{ $log->date }}</td>
                                <td data-label="@lang('Publisher')"><a href="{{ route('admin.publisher.details', $log->publisher_id) }}">{{ @$log->publisher->username }}</a></td>
                                <td data-label="@lang('Ad Title')" class="font-weight-bold">{{$log->ad->ad_title}}</td>
                                <td data-label="@lang('Ad Type')" class="font-weight-bold"><span class="badge {{$log->ad_type=='click'?'badge--primary':'badge--warning'}}">{{$log->ad_type}}</span></td>
                                <td data-label="@lang('Amount')" class="budget font-weight-bold">
                                    {{getAmount($log->amount)}} {{$general->cur_text}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')

        <div class="d-flex flex-wrap justify-content-end">
            <form action="{{route('admin.earnings.publisher')}}" method="GET" class="form-inline float-sm-right bg--white ml-3 mb-2">
                <div class="input-group has_append">
                <input type="text" name="date" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('search by dates')">
                    <div class="input-group-append">
                        <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

            <form action="{{route('admin.earnings.publisher')}}" method="GET" class="form-inline float-sm-right bg--white ml-3 mb-2">
                <div class="input-group has_append">
                    <input type="text" name="search" class="form-control" placeholder="@lang('Username')" value="{{ $search ?? '' }}">
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
    // date picker
    "use strict";
    $('.datepicker-here').datepicker();
 $('#datatable5').DataTable({
            
            "sDom": 'Lfrtlip',
            "language": {
                "lengthMenu": "Show rows  _MENU_",
                search: "",
                searchPlaceholder: "Search"
            }
           
        });

</script>
@endpush
@push('style')
<style>
    table thead tr th:after {
    top: 14px !important;
}
table thead tr th:before {
    bottom: 14px !important;
}
</style>
@endpush