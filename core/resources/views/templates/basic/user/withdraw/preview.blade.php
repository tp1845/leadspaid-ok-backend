@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')
    <div class="container-fluid">
        <div class="row justify-content-center mt-2">
            <div class="col-lg-12 ">
                <div class="card card-deposit">
                    <h5 class="text-center my-1 mt-3 font-weight-bold">@lang('Current Balance') :
                        <strong class=" font-weight-bold">{{ getAmount(auth()->guard('publisher')->user()->earnings)}}  {{ $general->cur_text }}</strong></h5>

                    <div class="card-body mt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <p class="mb-3">
                                    @php
                                        echo $withdraw->method->description;
                                    @endphp
                                </p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <ul class="list-group text-center">
                                    <li class="list-group-item"> <div class="withdraw-details">
                                            <span class="font-weight-bold">@lang('Request Amount') :</span>
                                            <span class="font-weight-bold pull-right">{{getAmount($withdraw->amount)  }} {{$general->cur_text }}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item"><div class="withdraw-details text-danger">
                                            <span class="font-weight-bold">@lang('Withdrawal Charge') :</span>
                                            <span class="font-weight-bold pull-right">{{getAmount($withdraw->charge) }} {{$general->cur_text }}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item"><div class="withdraw-details text-info">
                                            <span class="font-weight-bold">@lang('After Charge') :</span>
                                            <span class="font-weight-bold pull-right">{{getAmount($withdraw->after_charge) }} {{$general->cur_text }}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="withdraw-details">
                                            <span class="font-weight-bold">@lang('Conversion Rate') : 1 {{$general->cur_text }} = </span>
                                            <span class="font-weight-bold pull-right">  {{getAmount($withdraw->rate)  }} {{$withdraw->currency }}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="withdraw-details text-success">
                                            <span class="font-weight-bold">@lang('You Will Get') :</span>
                                            <span class="font-weight-bold pull-right">{{getAmount($withdraw->final_amount) }} {{$withdraw->currency }}</span>
                                        </div>
                                    </li>
                                </ul>


                                <div class="form-group mt-3">

                                    <label class="font-weight-bold">@lang('Balance Will be') : </label>
                                    <div class="input-group">
                                        <input type="text" value="{{getAmount($withdraw->publisher->earnings - ($withdraw->amount))}}"  class="form-control form-control-lg" placeholder="@lang('Enter Amount')" required readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ">{{ $general->cur_text }} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <form action="{{route('user.withdraw.submit')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    @if($withdraw->method->user_data)
                                        @foreach($withdraw->method->user_data as $k => $v)
                                            @if($v->type == "text")
                                                <div class="form-group">
                                                    <label><strong>{{__($v->field_level)}} @if($v->validation == 'required') <span class="text-danger">*</span>  @endif</strong></label>
                                                    <input type="text" name="{{$k}}" class="form-control" value="{{old($k)}}" placeholder="{{__($v->field_level)}}" @if($v->validation == "required") required @endif>
                                                    @if ($errors->has($k))
                                                        <span class="text-danger">{{ __($errors->first($k)) }}</span>
                                                    @endif
                                                </div>
                                            @elseif($v->type == "textarea")
                                                <div class="form-group">
                                                    <label><strong>{{__($v->field_level)}} @if($v->validation == 'required') <span class="text-danger">*</span>  @endif</strong></label>
                                                    <textarea name="{{$k}}"  class="form-control"  placeholder="{{__($v->field_level)}}" rows="3" @if($v->validation == "required") required @endif>{{old($k)}}</textarea>
                                                    @if ($errors->has($k))
                                                        <span class="text-danger">{{ __($errors->first($k)) }}</span>
                                                    @endif
                                                </div>
                                            @elseif($v->type == "file")

                                                <label><strong>{{__($v->field_level)}} @if($v->validation == 'required') <span class="text-danger">*</span>  @endif</strong></label>
                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new " data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail withdraw-thumbnail b-radius--6"
                                                             data-trigger="fileinput">
                                                            <img class="w-100" id="img" src="{{ getImage(imagePath()['image']['default'])}}" alt="..." style="max-width: 320px; max-height: 220px">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail wh-300-250 mb-3"></div>

                                                        <div class="img-input-div">
                                                                <span class="btn btn--primary btn-file">
                                                                    <span class="fileinput-new text--white"> @lang('Select') {{$v->field_level}}</span>
                                                                    <span class="fileinput-exists  text--white"> @lang('Change')</span>
                                                                    <input type="file" id="imgInp" name="{{$k}}" accept="image/*" @if($v->validation == "required") required @endif>
                                                                </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists"
                                                               data-dismiss="fileinput"> @lang('Remove')</a>
                                                        </div>

                                                    </div>
                                                    @if ($errors->has($k))
                                                        <br>
                                                        <span class="text-danger">{{ __($errors->first($k)) }}</span>
                                                    @endif
                                                </div>

                                            @endif
                                        @endforeach
                                    @endif

                                    <div class="form-group">
                                        <button type="submit" class="btn btn--primary btn-block btn-lg mt-4 text-center">@lang('Confirm')</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endpush

@push('script')

    <script>
        'use strict';
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>

@endpush
