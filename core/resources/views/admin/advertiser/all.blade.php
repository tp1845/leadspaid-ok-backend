@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two" id="datatable5" >
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th scope="col">@lang('Company Name')</th>
                                <th scope="col">@lang('Assign publisher Admin')</th>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Country')</th>
                                <th scope="col">@lang('Phone')</th>
                                <th scope="col">@lang('Email')</th>
                                <th scope="col">@lang('Products/Services')</th>
                                <th scope="col">@lang('Website')</th>
                                <th scope="col">@lang('Social Media')</th>
                                <th scope="col">@lang('Ad Budget')</th>
                                <th scope="col">@lang('Username')</th>
                                <th scope="col">@lang('Date Applied')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                             @if(!empty($advertisers))
                            @foreach($advertisers as $advertiser)
                            <tr>
                                <td data-label="@lang('Name')" class="text--primary">
                                    <input type="checkbox" name="status" @if($advertiser->status) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$advertiser->id}}">
                                </td>
                                <td data-label="@lang('Company Name')">{{ $advertiser->company_name }}</td>
                                <td data-label="@lang('Assign publisher Admin')">
                                    <ul class="check_box_list">
                                        @forelse($publishers_admin as $publisher)
                                            <li><label><input @if($advertiser->assign_publisher != null && in_array($publisher->id, $advertiser->assign_publisher)) checked  @endif  type="checkbox" name="assign_publisher_{{ $advertiser->id }}[]" class="assign_publisher" value="{{ $publisher->id }}" data-advertiser_id = "{{$advertiser->id}}">{{ $publisher->name  }}</label></li>
                                        @empty

                                        @endforelse
                                    </ul>
                                </td>
                                <td data-label="@lang('Name')" class="text--primary">{{ $advertiser->name }}</td>
                                <td data-label="@lang('Country')">{{ $advertiser->country }}</td>
                                <td data-label="@lang('Phone')">{{ $advertiser->mobile }}</td>
                                <td data-label="@lang('Email')">{{ $advertiser->email }}</td>
                                <td data-label="@lang('Products/Services')">{{ $advertiser->product_services }}</td>
                                <td data-label="@lang('Website')">{{ $advertiser->Website }}</td>
                                <td data-label="@lang('Social Media')">{{ $advertiser->Social }}</td>
                                <td data-label="@lang('Ad Budget')">${{ $advertiser->ad_budget }}</td>

                                <td data-label="@lang('Username')">{{ $advertiser->username }}</td>
                                <td><span class="text--small"><strong>  {{ Carbon\Carbon::parse($advertiser->created_at)->format('d-m-Y ') }} </strong></span></td>
                                {{-- <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal {{ $advertiser->status==1?'badge--success':'badge--warning' }} ">{{ $advertiser->status==1?'Active':'Banned' }}</span></td> --}}
                                <td data-label="@lang('Actions')">
                                    <a href="{{ route('admin.advertiser.details',['id'=>$advertiser->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
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

@push('breadcrumb-plugins')
    <form action="{{ route('admin.advertiser.search') }}" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Username or email')" value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush
@push('script')
<script>
    'use strict';
    var leads_preview_modal = $('#leads_preview_modal');
    $(document).ready(function() {
        $('.assign_publisher').change(function() {
            console.log('assign_publisher');
            var advertiser_id = $(this).data('advertiser_id');
            name =  $(this).attr('name');
            var data = new Array();
            $("input[name='"+name+"']:checked").each(function(i) { data.push($(this).val()); });
            const formData = { "_token": "{{ csrf_token() }}", "assign_publisher":data, "advertiser_id":advertiser_id};
            $.ajax({
                type: "POST",
                dataType: "json",
                url:  "{{route('admin.advertiser.assign_publisher')}}" ,
                data: formData,
                success: function(data) {
                    if (data.success) {
                        Toast('green', data.message);
                    } else {
                        Toast('red', data.message);
                    }
                }
            });
        })

        $('.toggle-status').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                    //url:  "{{route('admin.advertiser.update_status')}}" ,
                    url: "/admin/advertiser/update_status",
                data: { 'status': status, 'id': id },
                success: function(data) {
                    if (data.success) {
                        Toast('green', data.message);
                    } else {
                        Toast('red', data.message);
                    }
                }
            });
        })
    });
    function Toast( color = 'green', message ){
            iziToast.show({
            // icon: 'fa fa-solid fa-check',
            color: color, // blue, red, green, yellow
            message: message,
            position: 'topRight'
        });
    }
	
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
    ul.check_box_list { height: 100px; overflow: auto; width: 100%; border: 1px solid #000; }
    ul.check_box_list { list-style-type: none; margin: 0; padding: 0; overflow-x: hidden; }
    ul.check_box_list li { margin: 0; padding: 0; }
    ul.check_box_list label {  text-align: left;  padding: 3px 5px; display: inline-block; width: 100%; color: WindowText; background-color: Window; margin: 0; width: 100%; }
    ul.check_box_list label input { margin-right: 3px; }
    ul.check_box_list label:hover { background-color: Highlight; color: HighlightText; }

    table.table--light thead th { background-color: #1A273A; }
    .pagination .page-item .page-link, .pagination .page-item span {   border-radius: 0 !important;  }
    .pagination .page-item.active .page-link {  background-color: #1361b2;  border-color: #1361b2; }
    .text--primary { color: #1361b2 !important; }
    .btn--primary {  background-color: #11b6f3 !important; }
    .btn-success { background-color: #11b6f3;  border-color: #11b6f3; }
    .toggle-group .btn {  padding-top: 0!important;  padding-bottom: 0!important;  top: -3px;  }
    .toggle.btn-sm {  min-width: 40px; min-height: 15px;  height: 15px; }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
    .toggle input[data-size="small"] ~ .toggle-group label {   text-indent: -999px;   }
    .toggle.btn .toggle-handle{ left: -9px;  top: -2px; }
    .toggle.btn.off .toggle-handle{ left: 9px; }
	table thead tr th:after {
    top: 14px !important;
}
table thead tr th:before {
    bottom: 14px !important;
}

.table td {
    width: 100%;
    white-space: break-spaces !important;
    min-width: 300px;
}
.icon-btn {
    display: inline-flex;
}
table.dataTable tbody tr td:nth-child(8) {
    height: 150px;
    white-space: normal !important;
    overflow-y: scroll;
    display: inline-flex;
}
</style>
@endpush
