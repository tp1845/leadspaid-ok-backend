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
                                <th scope="col">@lang('Ad Name')</th>
                                <th scope="col">@lang('Ad title')</th>
                                <th scope="col">@lang('Type')</th>
                                <th scope="col">@lang('Advertiser')</th>
                                <th scope="col">@lang('Impression')</th>
                                <th scope="col">@lang('Click')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($advertises as $advertise)
                            
                            <tr>
                                <td data-label="@lang('Ad Name')" class="text--primary">{{ $advertise->ad_name }}</td>
                                <td data-label="@lang('Ad title')" class="text--primary">{{ $advertise->ad_title }}</td>
                                <td data-label="@lang('Type')"><span class="text--small badge font-weight-normal {{$advertise->ad_type=='click'?'badge--primary':'badge--warning'}} ">{{ $advertise->ad_type }}</span></td>
                                <td data-label="@lang('Advertiser')"><a href="{{route('admin.advertiser.details',$advertise->advertiser->id)}}">{{ $advertise->advertiser->name }}</a></td>
                                
                                <td data-label="@lang('Impression')">{{$advertise->impression??'0'}}</td>
                              
                                <td data-label="@lang('Click')">{{$advertise->clicked??'0'}}</td>
                               
                                @if ($advertise->status)
                                <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal badge--success">@lang('Active')</span></td>
                                @else
                                <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal badge--warning">@lang('Deactive')</span></td>
                                @endif
                                <td data-label="@lang('Action')">
                                    <a href="{{ route('admin.advertise.details',$advertise->id) }}" class="icon-btn" data-toggle="tooltip" title="@lang('details')">
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
                <div class="card-footer py-4">
                    {{$advertises->links('admin.partials.paginate')}}
                </div>
            </div><!-- card end -->
        </div>


    </div>
@endsection
