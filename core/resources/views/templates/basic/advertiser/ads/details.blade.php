@extends($activeTemplate.'.layouts.advertiser.frontend')

@section('panel')
    <div class="row mb-none-30">

        <div class="col-xl-12 col-lg-12 col-md-12 mb-30">
            <div class="row mb-none-30">
                <div class="col-xl-4 col-md-6 mb-30">
                    <div class="widget bb--3 border--success b-radius--10 bg--white p-4 box--shadow2 has--link">
                        <a href="#0" class="item--link"></a>
                        <div class="widget__icon b-radius--rounded bg--success"><i class="fa fa-hand-point-up"></i>
                        </div>
                        <div class="widget__content">
                            <p class="text-uppercase text-muted">@lang('Total Clicked')</p>
                            <h2 class="text--success font-weight-bold">{{ $advertise->clicked ?  $advertise->clicked : 0}}</h2>

                        </div>
                        <div class="widget__arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div><!-- widget end -->
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-4 col-md-6 mb-30">
                    <div class="widget bb--3 border--info b-radius--10 bg--white p-4 box--shadow2 has--link">
                        <a href="#0" class="item--link"></a>
                        <div class="widget__icon b-radius--rounded bg--info"><i class="fa fa-globe"></i></div>
                        <div class="widget__content">
                            <p class="text-uppercase text-muted">@lang('Total Impression')</p>
                            <h2 class="text--info font-weight-bold">{{ $advertise->impression ? $advertise->impression:0}}</h2>

                        </div>
                        <div class="widget__arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div><!-- widget end -->
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-4 col-md-6 mb-30">
                    <div class="widget bb--3 border--purple b-radius--10 bg--white p-4 box--shadow2 has--link">
                        <a href="#0" class="item--link"></a>
                        <div class="widget__icon b-radius--rounded bg--purple"><i
                                class="{{$advertise->ad_type=='click'?'fa fa-hand-point-up':'fa fa-globe'}}"></i></div>
                        <div class="widget__content">
                            <p class="text-uppercase text-muted">@lang('Ad Type')</p>
                            <h2 class="text--purple font-weight-bold">{{ ucfirst($advertise->ad_type)}}</h2>
                        </div>
                        <div class="widget__arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div><!-- widget end -->
                </div><!-- dashboard-w1 end -->
            </div>

            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <div class="card mt-25">
                        <div class="card-body">
                            <h5 class="card-title mb-15 border-bottom pb-2">{{$advertise->name}} @lang('Information')</h5>

                            <form action="{{route('advertiser.ad.update',$advertise->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">@lang('Type')<span
                                                    class="text-danger"></span></label>
                                            <input class="form-control" type="text" name="name"
                                                   value="{{$advertise->ad_name}}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">@lang('Ad title')<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="title"
                                                   value="{{$advertise->ad_title}}">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">@lang('Redirect Url')
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="url"
                                                   value="{{$advertise->redirect_url}}">
                                        </div>
                                    </div>

                                </div>

                                @if(($advertise->keywords!=null))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label class="font-weight-bold" for="">@lang('Keywords')<span
                                                        class="text-danger">*</span></label>
                                                <select name="keywords[]" class="form-control select2-multi-select"
                                                        data-keyword="{{json_encode(@$advertise->keywords)}}"
                                                        id="keyword" multiple="multiple">
                                                    @foreach (@$advertise->keywords as $keyword)
                                                        <option value="{{@$keyword}}" selected>{{@$keyword}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                                @if($advertise->t_country!=null)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label class="font-weight-bold"
                                                       for="exampleInputPassword1">@lang('Targeted Country')<span
                                                        class="text-danger">*</span></label>
                                                <select name="country[]" class="form-control select2-multi-select"
                                                        id="country"
                                                        data-country="{{json_encode(@$advertise->t_country)}}"
                                                        multiple="multiple">
                                                    @foreach (@$advertise->t_country as $country)
                                                        <option value="{{$country}}" selected>{{$country}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox form-check-primary my-2">
                                            <input type="checkbox" name="global" class="custom-control-input"
                                                   {{$advertise->global==1?'checked':''}} id="customCheck21">
                                            <label class="custom-control-label font-weight-bold"
                                                   for="customCheck21">@lang('Target for global')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-12 col-md-6  col-sm-3 col-12">
                                        <label class="form-control-label font-weight-bold">@lang('Status') </label>
                                        <input type="checkbox" data-width="100%" data-onstyle="-success"
                                               data-offstyle="-danger" data-toggle="toggle" data-on="Active"
                                               data-off="Inactive" data-width="100%" name="status"
                                               @if($advertise->status == 1 ) checked @endif>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-12">
                    <div class="card b-radius--10 overflow-hidden box--shadow1 mt-4 d-inline-block">
                        <div class="card-body pb-5">
                            <div class="p-3 bg--white">
                                <div class="border rounded p-2"><img
                                        src="{{getImage('assets/images/adImage/'.$advertise->image) }}"
                                        width="{{  $advertise->type->width }}"
                                        height="{{  $advertise->type->height }}"/></div>
                                <div class="mt-15">
                                    <h4 class="">{{$advertise->ad_name}} <small
                                            class="text-danger">({{ @$advertise->resolution }})px </small></h4>
                                    <span
                                        class="text--small">@lang('Created At') <strong>{{date('d M, Y h:i A',strtotime($advertise->created_at))}} </strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Save Changes')
                        </button>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>

    {{-- Add Sub Balance MODAL --}}


@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('advertiser.ad.all') }}" class="btn btn--primary"><i class="las la-backward"></i> @lang('Go Back')
    </a>

@endpush


@push('script')
    <script>
        'use strict';
            (function ($) {
                var country = $('#country').data('country');

                var url = "{{route('countries')}}";
                $.get(url, function (result, state) {
                    result = result.filter(val => !country.includes(val));
                    result.forEach(function (cn) {
                        $('#country').append('<option value="' + cn + '">' + cn + '</option>')
                    });
                })

                var keyword = $('#keyword').data('keyword')
                var keywordUrl = "{{route('keywords')}}";

                $.get(keywordUrl, function (result) {
                    result = result.filter(val => !keyword.includes(val));
                    result.forEach(function (cn) {
                        $('#keyword').append('<option value="' + cn + '">' + cn + '</option>')
                    });
                })

                if($(".global").is(':checked'))
                   $("#country").attr('disabled',true);  // checked
                else
                    $("#country").attr('disabled',false);

                    $(".global").on('change',function(){
                       if( $(this).is(':checked')){
                         $("#country").attr('disabled',true); 
                       } else{
                        $("#country").attr('disabled',false); 
                       }
                    })
                    
            })(jQuery);
        

    </script>
@endpush

@push('style')
    <style>
        .ad-image img {
            height: 280px;
        }
    </style>

@endpush
