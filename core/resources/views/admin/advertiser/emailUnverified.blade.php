@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two" id="datatable5">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Email')</th>
                                <th scope="col">@lang('Username')</th>
                                <th scope="col">@lang('Phone')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Actions')</th> 
                            </tr>
                            </thead>
                            <tbody>
							@if(!empty($advertisers))
                            @foreach($advertisers as $advertiser)
                            <tr>
                                <td data-label="@lang('Name')" class="text--primary">{{ $advertiser->name }}</td>
                                <td data-label="@lang('Email')">{{ $advertiser->email }}</td>
                                <td data-label="@lang('Username')">{{ $advertiser->username }}</td>
                                <td data-label="@lang('Phone')">{{ $advertiser->mobile }}</td>
                                <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal {{ $advertiser->status==1?'badge--success':'badge--warning' }} ">{{ $advertiser->status==1?'Active':'Banned' }}</span></td>
                                <td data-label="@lang('Actions')">
                                    <a href="{{ route('admin.advertiser.details',['id'=>$advertiser->id]) }}" class="icon-btn" data-toggle="tooltip" data-original-title="@lang('Details')">
                                        <i class="las la-desktop text--shadow"></i>                 
                                    </a>  
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