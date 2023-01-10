@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>Status</th>
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
                            @forelse($advertisers as $advertiser)

                            <tr>
                                <td data-label="@lang('Name')" class="text--primary">
                                    <input type="checkbox" name="status" @if($advertiser->status) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$advertiser->id}}">

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
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>

            </div><!-- card end -->
            <div class="card-footer py-4">
                {{$advertisers->links('admin.partials.paginate')}}
            </div>
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
</script>
@endpush
@push('style')
<style>
    .toggle-group .btn {  padding-top: 0!important;  padding-bottom: 0!important;  top: -3px;  }
    .toggle.btn-sm {  min-width: 40px; min-height: 15px;  height: 15px; }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
    .toggle input[data-size="small"] ~ .toggle-group label {   text-indent: -999px;   }
    .toggle.btn .toggle-handle{ left: -9px;  top: -2px; }
    .toggle.btn.off .toggle-handle{ left: 9px; }
</style>
@endpush
