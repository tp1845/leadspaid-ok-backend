@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="table-responsive--lg">
                    <table class="table style--two">
                        <thead>
                        <tr>
                            <th scope="col">@lang('Ad Image')</th>
                            <th scope="col">@lang('Ad Name')</th>
                            <th scope="col">@lang('Ad Title')</th>
                            <th scope="col">@lang('Ad Resolution')</th>
                            <th scope="col">@lang('Country(From)')</th>
                            <th scope="col">@lang('Ad Type')</th>
                            <th scope="col">@lang('Click Count')</th>
                            <th scope="col">@lang('Impr. Count')</th>
                            <th scope="col">@lang('View Image')</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($reports as $report)
                       
                        <tr>
                            <td data-label="@lang('Ad Image')">
                                <div class="user">
                                    <div class="thumb"><img class="adImage" src="{{getImage('assets/images/adImage/'.$report->ad->image) }}" alt="image"></div>
                                    <span class="name"></span>
                                </div>
                            </td>
                            <td data-label="@lang('Ad Name')">{{$report->ad->ad_name}}</td>
                            <td data-label="@lang('Ad Title')">{{$report->ad->ad_title}}</td>
                            <td data-label="@lang('Ad Resolution')"><span class="text--small badge font-weight-normal badge--success">{{$report->ad->resolution}}</span></td>
                        
                            <td data-label="@lang('Country(From)')"><span class="text--small badge font-weight-normal badge--primary">{{$report->country}}</span></td>
                            <td data-label="@lang('Ad Type')"><span class="text--small badge font-weight-normal badge--dark">{{$report->ad->ad_type}}</span></td>
                            <td data-label="@lang('Click Count')"><span class="text--small badge font-weight-normal badge--warning">{{number_format($report->click_count)??'N/A'}}</span></td>
                            <td data-label="@lang('Impr. Count')"><span class="text--small badge font-weight-normal badge--success">{{number_format($report->imp_count)??'N/A'}}</span></td>
                            <td data-label="@lang('View Image')">
                                <a href="{{getImage('assets/images/adImage/'.$report->ad->image) }}" data-rel="lightcase" class="icon-btn"><i class="fas fa-image"></i></a>
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
            <div class="my-3">
                {{$reports->appends(request()->all())->links('admin.partials.paginate')}}
            </div>
        </div>
    </div>
@endsection

@push('script')

 <script>
        'use strict';
        (function ($) {
            $('a[data-rel^=lightcase]').lightcase();
        })(jQuery);
 </script>
@endpush

@push('breadcrumb-plugins')

<form action="{{route('advertiser.report.search')}}" method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="{{trans('Search by title, country')}}" value="{{$query??''}}">
        <div class="input-group-append">
            <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endpush