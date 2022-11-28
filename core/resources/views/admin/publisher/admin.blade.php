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
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Email')</th>
                                <th scope="col">@lang('Username')</th>
                                <th scope="col">@lang('Phone')</th>
                                <th scope="col">@lang('Role')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($publishers as $publisher)
                            <tr>
                                <td data-label="@lang('Name')" class="text--primary">{{ $publisher->name }}</td>
                                <td data-label="@lang('Email')">{{ $publisher->email }}</td>
                                <td data-label="@lang('Username')">{{ $publisher->username }}</td>
                                <td data-label="@lang('Phone')">{{ $publisher->phone }}</td>
                                <td data-label="@lang('Role')">
                                    <input type="checkbox" name="role" @if($publisher->role) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" data-on="Publisher Admin" data-off="User" class="toggle-role" data-id="{{$publisher->id}}">
                                </td>
                                <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal {{ $publisher->status==1?'badge--success':'badge--warning' }} ">{{ $publisher->status==1?'Active':'Banned' }}</span></td>
                                <td data-label="@lang('Actions')">
                                    <a href="{{ route('admin.publisher.details',['id'=>$publisher->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="@lang('Details')">
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
        </div>
    </div>
@endsection

@push('style')
<style>
    .toggle-group .btn {  padding-top: 0!important;  padding-bottom: 0!important;  top: 0;  }
    .toggle.btn-sm {  min-width: 60px; min-height: 15px;  height: 15px; }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; display: none; }
    .toggle input[data-size="small"] ~ .toggle-group label {
        /* text-indent: -999px;    */
        padding: 5px;
    }
    .toggle.btn .toggle-handle{ left: -9px;  top: -2px; }
    .toggle.btn.off .toggle-handle{ left: 9px; }
</style>
@endpush
@push('script')
    <script>
        'use strict';
        var leads_preview_modal = $('#leads_preview_modal');
        $(document).ready(function() {
            $('.toggle-role').change(function() {
                var role = $(this).prop('checked') == true ? 1 : 0;
                var publisher_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    //url:  "{{route('admin.publisher.role')}}" ,
                     url: "/admin/publisher/role",
                    data: { 'role': role, 'publisher_id': publisher_id },
                    success: function(data) {
                        if (data.success) {
                            Toast('green', data.message);
                        } else {
                            Toast('red', data.message);
                        }
                    }
                });
            });
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
