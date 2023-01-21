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
                                <th scope="col">@lang('Username')</th>
                                <th scope="col">@lang('IP')</th>
                                <th scope="col">@lang('Location')</th>
                                <th scope="col">@lang('Browser')</th>
                                <th scope="col">@lang('OS')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(!empty($login_logs))
                            @foreach($login_logs as $log)
                                <tr>
                                    <td data-label="@lang('Date')">{{diffForHumans($log->created_at) }}</td>
                                    @if ($log->publisher_id == null)
                                        
                                    <td data-label="@lang('Username')"><a href="{{ route('admin.advertiser.details', $log->advertiser_id)}}"> {{ ($log->advertiser) ? $log->advertiser->username : '' }}</a></td>
                                    @else
                                    <td data-label="@lang('Username')"><a href="{{ route('admin.publisher.details', $log->publisher_id)}}"> {{ ($log->publisher) ? $log->publisher->username : '' }}</a></td>
                                    @endif
                                   
                                    <td data-label="@lang('IP')">
                                        <a href="{{route('admin.users.login.ipHistory',[$log->user_ip])}}">
                                            {{ $log->user_ip }}
                                        </a>
                                    </td>
                                    <td data-label="@lang('Location')">{{ $log->location }}</td>
                                    <td data-label="@lang('Browser')">{{ __($log->browser) }}</td>
                                    <td data-label="@lang('OS')">{{ __($log->os) }}</td>
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
   
    <form action="" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Search here')" value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
   
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

@push('script')
    <script>

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