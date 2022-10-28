@extends($activeTemplate.'.layouts.publisher.frontend')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-12 col-md-12 mb-30">
            <div class="row mb-none-30">
                <div class="col-xl-4 col-md-6 mb-30">
                    <div class="widget bb--3 border--info b-radius--10 bg--white p-4 box--shadow2 has--link">
                      <a href="#0" class="item--link"></a>
                      <div class="widget__icon b-radius--rounded bg--info"><i class="fa fa-globe"></i></div>
                      <div class="widget__content">
                        <p class="text-uppercase text-muted">@lang('Total Impression From My Site')</p>
                        <h2 class="text--info font-weight-bold">{{ $count->imp_count ? $count->imp_count:0}}</h2>
                      </div>
                      <div class="widget__arrow">
                        <i class="fas fa-chevron-right"></i>
                      </div>
                    </div><!-- widget end -->
                </div>

                <div class="col-xl-4 col-md-6 mb-30">
                    <div class="widget bb--3 border--success b-radius--10 bg--white p-4 box--shadow2 has--link">
                      <a href="#0" class="item--link"></a>
                      <div class="widget__icon b-radius--rounded bg--success"><i class="fa fa-hand-point-up"></i></div>
                      <div class="widget__content">
                        <p class="text-uppercase text-muted">@lang('Total Clicked From My Site')</p>
                        <h2 class="text--success font-weight-bold">{{ $count->click_count ?  $count->click_count : 0}}</h2>
                      </div>
                      <div class="widget__arrow">
                        <i class="fas fa-chevron-right"></i>
                      </div>
                    </div><!-- widget end -->
                </div>
                <!-- dashboard-w1 end -->
           
                <div class="col-xl-4 col-md-6 mb-30">
                    <div class="widget bb--3 border--purple b-radius--10 bg--white p-4 box--shadow2 has--link">
                      <a href="#0" class="item--link"></a>
                      <div class="widget__icon b-radius--rounded bg--purple"><i class="fa fa-globe"></i></div>
                      <div class="widget__content">
                        <p class="text-uppercase text-muted">@lang('Ad Type')</p>
                        <h2 class="text--purple font-weight-bold">{{ ucfirst($advertise->ad_type)}}</h2>
                      </div>
                      <div class="widget__arrow">
                        <i class="fas fa-chevron-right"></i>
                      </div>
                    </div><!-- widget end -->
                </div>
                <!-- dashboard-w1 end -->
            </div>

            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <div class="card mt-25">
                        <div class="card-body">
                            <h5 class="card-title mb-15 border-bottom pb-2">{{$advertise->name}} @lang('Information')</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">@lang('Advertiser')</label>
                                            <input class="form-control" type="text" value="{{$advertise->advertiser->name}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">@lang('Name')<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="name" value="{{$advertise->ad_name}}" disabled>
                                        </div>
                                    </div>
                                </div>
                        </div>               
                    </div>
                </div>
                
            <div class="col-xl-5 col-lg-12"> 
                <div class="card b-radius--10 overflow-hidden box--shadow1 mt-4 d-inline-block">
                    <div class="card-body p-0">
                        <div class="p-3 bg--white">
                            <div class="border rounded p-2" ><img src="{{getImage('assets/images/adImage/'.$advertise->image) }}" width="{{ $advertise->type->width }}" height="{{ $advertise->type->height }}"/></div>
                            <div class="mt-15">
                                <h4 class="">{{$advertise->ad_name}} <small class="text-danger">({{ @$advertise->resolution }})px </small></h4>
                                <span class="text--small">@lang('Created At') <strong>{{date('d M, Y h:i A',strtotime($advertise->created_at))}} </strong></span>
                            </div> 
                        </div>
                    </div>
                </div>
          </div>
        </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
  <a href="{{ route('publisher.published.ad') }}" class="btn btn--primary"><i class="las la-backward"></i>@lang('Go Back')</a>

@endpush

@push('script')
  <script>
         'use strict';
         (function ($) {
            $("select[name=country]").val("{{ @$user->address->country }}");  
         })(jQuery);
  </script>
@endpush

@push('style')
    <style>
        .ad-image img{
            height: 280px;
        }
    </style>
   
@endpush