@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Ad Image')</th>
                                <th scope="col">@lang('Ad Name')</th>
                                <th scope="col">@lang('Ad Resolution')</th>
                                <th scope="col">@lang('Targeted Country')</th>
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
                                <td data-label="@lang('Ad Resolution')"><span class="text--small badge font-weight-normal badge--success">{{$report->ad->resolution}}</span></td>
                                <td data-label="@lang('Targeted Country')"><span class="text--small badge font-weight-normal badge--primary">{{$report->country}}</span></td>
                                <td data-label="@lang('Ad Type')"><span class="text--small badge font-weight-normal badge--dark">{{$report->ad->ad_type}}</span></td>
                                <td data-label="@lang('Click Count')"><span class="text--small badge font-weight-normal badge--warning">{{$report->click_count??'N/A'}}</span></td>
                                <td data-label="@lang('Impr. Count')"><span class="text--small badge font-weight-normal badge--success">{{$report->imp_count??'N/A'}}</span></td>
                                <td data-label="@lang('View Image')">
                                    <button title="@lang('View Image')" class="icon-btn btn--primary image-pop"  type="button" 
                                     data-image="{{getImage('assets/images/adImage/'.$report->ad->image) }}"
                                     data-res="{{ $report->ad->resolution }}"
                                     data-name="{{ $report->ad->ad_name }}"
                                    ><i class="fas fa-image"></i></button>
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
                    {{$reports->links('admin.partials.paginate')}}
                </div>
            </div><!-- card end -->
        </div>

        <!-- Button trigger modal -->
       
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body text-center">
                    <span class="font-weight-bold">@lang('Image Preview')</span>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                       </button>
                       <div class="card b-radius--10 overflow-hidden box--shadow1 mt-4 d-inline-block">
                        <div class="card-body p-0">
                            <div class="p-3 bg--white">
                                <div>
                                    <h4 id="adname"><small class="text-danger " id="res"></small></h4>
                                </div> 
                                <div><img id="img"  src="" /></div>
                            </div>
                        </div>
                     </div>
                    </div>
              </div>
            </div>
        </div>
        

    </div>
@endsection

@push('script')
    
 <script>
        'use strict';
        (function ($) {
            var modal = $('#exampleModal');
            $('.image-pop').on('click',function(){
            
            $('#adname').text($(this).data('name'));
            $('#res').text($(this).data('res'));
            var path = $(this).data('image');

            $('#img').attr('src', path);
            
            modal.modal('show');
            });
        })(jQuery);
 </script>

@endpush

@push('breadcrumb-plugins')
<a href="{{ route('advertiser.ad.report') }}" class="btn btn--primary mr-5"><i class="las la-backward"></i> @lang('Go Back')</a>
<form action="{{route('advertiser.report.search')}}" method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="{{trans('Search by Country')}}" value="{{old('search')}}">
        <div class="input-group-append">
            <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endpush
