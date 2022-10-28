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
                                <th scope="col">@lang('Publisher Username')</th>
                                <th scope="col">@lang('Domain Name')</th>
                                <th scope="col">@lang('Domain Tracker')</th>
                                @if (@$result->status == 2)
                                    <th scope="col">@lang('Check Domain')</th>
                                @endif
                                <th scope="col">@lang('Action')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if ($result==null)
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td data-label="@lang('Publisher Username')"><a
                                            href="{{route('admin.publisher.details',@$result->publisher->id)}}"
                                            target="_blank">{{@$result->publisher->username}}</a></td>
                                    <td data-label="@lang('Domain Name')"
                                        class="font-weight-bold">{{@$result->domain_name}}</td>
                                    <td data-label="@lang('Domain Tracker')">{{$result->tracker}}</td>
                                    @if ($result->status == 2)
                                        <td data-label="@lang('Check Domain')">
                                            <a href="{{'http://'.@$result->domain_name.'/'.strtolower(str_replace(' ', '_', $general->sitename)).'.txt'}}"
                                               target="_blank" class="icon-btn btn--success" data-toggle="tooltip"
                                               title="" data-original-title="@lang('Check Domain')">
                                                <i class="las la-check-double text--shadow">@lang('Check Domain')</i>
                                            </a>
                                        </td>
                                    @endif

                                    <td data-label="@lang('Action')">
                                        @if (@$result->status == 2)
                                            <a href="{{route('admin.domain.approve',@$result->id)}}"
                                               class="icon-btn mr-2" data-toggle="tooltip" title="@lang('approve')"
                                               data-original-title="{{trans('Approve')}}">
                                                <i class="las la-check-circle text--shadow">@lang('Approve')</i>
                                            </a>
                                        @endif
                                        @if (@$result->status==1)
                                            <a href="{{route('admin.domain.unapprove',$result->id)}}"
                                               class="icon-btn btn--warning mr-2" data-toggle="tooltip" title=""
                                               data-original-title="{{trans('Unapprove')}}">
                                                <i class="las la-ban text--shadow"></i>
                                            </a>
                                        @endif
                                        <a href="{{route('admin.domain.remove',@$result->id)}}"
                                           class="icon-btn btn--danger" data-toggle="tooltip" title="@lang('remove')"
                                           data-original-title="{{trans('Delete')}}">
                                            <i class="las la-trash text--shadow"></i>
                                        </a>
                                    </td>
                                </tr>
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
    <form action="{{route('admin.domain.search')}}" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="{{trans('Search by Tracker')}}"
                   value="{{old('search')}}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush
