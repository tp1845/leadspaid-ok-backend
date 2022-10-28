@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-12 col-md-12 mb-30">
            <div class="row mb-none-30">
                <div class="col-xl-6 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--1 b-radius--10 box-shadow has--link">
                        <a href="javascript:void(0)" class="item--link"></a>
                        <div class="icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount">{{$general->cur_sym}} {{ getAmount($general->cpc,4) }} ({{$general->cur_text}})</span>
                            </div>
                            <div class="desciption">
                                <span>@lang('Cost per Click')</span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->

                <div class="col-xl-6 col-lg-6 col-sm-6 mb-30">
                    <div class="dashboard-w1 bg--primary b-radius--10 box-shadow has--link">
                        <a href="javascript:void(0)" class="item--link"></a>
                        <div class="icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount">{{$general->cur_sym}} {{ getAmount($general->cpm,4)}} ({{$general->cur_text}})</span>
                            </div>
                            <div class="desciption">
                                <span>@lang('Cost per Impression')</span>
                            </div>
                        </div>
                    </div>
                </div><!-- dashboard-w1 end -->

            </div>
        <form action="{{route('admin.advertise.perCost.update')}}" method="POST"
            enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="card mt-25">
                        <div class="card-body">
                            <h5 class="card-title mb-15 border-bottom pb-2">@lang('Update CPC & CPM')</h5>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">@lang('Cost Per Click')</label>
                                            <input class="form-control" name="cpc" type="text" value="{{ getAmount($general->cpc,4) }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="form-control-label font-weight-bold">@lang('Cost Per Impression')<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="cpm" value="{{ getAmount($general->cpm,4) }}">
                                        </div>
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




@endsection

@push('breadcrumb-plugins')
<a href="{{ route('admin.advertise.all') }}" class="btn btn--primary"><i class="las la-backward"></i> @lang('Go Back')</a>
@endpush
