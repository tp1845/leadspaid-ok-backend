@extends($activeTemplate.'layouts.frontend')
@php
    $bg = getContent('login.content',true)->data_values;
@endphp
@section('content')
@include($activeTemplate.'partials.breadcrumb')


    @if(!$user->status)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__($page_title)}}</div>

                    <div class="card-body">
                        <a href="{{route('advertiser.logout')}}" class="btn btn-success"><i class="fa fa-sign-out"></i> @lang('Log Out')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif(!$user->ev)

    <section class="pt-100 pb-100">
        <div class="container">
        <div class="account-area">
            <div class="row justify-content-center">
            <div class="col-lg-6 bg_img d-flex flex-wrap justify-content-center align-items-center" data-background="{{getImage('assets/images/frontend/login/'.$bg->background_image, '1920x1080')}}">
                <div class="account-content text-center px-5 py-4">
                <h2 class="text-white title">@lang('Verification Code')</h2>
                <p class="para-white mt-3">@lang('Please Provide the code we\'ve sent in your email.')</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="account-wrapper">
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="publisher" role="tabpanel" aria-labelledby="publisher-tab">
                        <form action="{{route('verify_email',$guard)}}" method="POST" class="cmn-form mt-30">
                            @csrf
                            <div class="form-group">
                                <p class="text-center">@lang('Your Email:')  <strong>{{auth()->guard($guard)->user()->email}}</strong></p>
                            </div>

                            <div class="form-group">
                                <div id="phoneInput">
                                    <div class="field-wrapper">
                                        <div class=" phone">
                                            <div class="row form-row">
                                                <div class="col-2">
                                                <div class="account-form-group">
                                                    <input type="text" name="email_verified_code[]" class="letter border"
                                                    pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                            </div>
                                            </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="email_verified_code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="email_verified_code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="email_verified_code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="email_verified_code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="email_verified_code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button class="cmn-btn w-100" type="submit">@lang('Verify Your Code')</button>
                            </div>

                            <div class="form-group text-center">
                                <small>@lang('Please check including your Junk/Spam Folder. if not found, you can ') <a href="{{route('send_verify_code',$guard)}}?type=email" class="forget-pass text-primary"> @lang('Resend code')</a></small>
                                @if ($errors->has('resend'))
                                    <br/>
                                    <small class="text-danger">{{ $errors->first('resend') }}</small>
                                @endif
                            </div>

                        </form>
                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
</section>


    @elseif(!$user->sv)


    <section class="pt-100 pb-100">
            <div class="container">
            <div class="account-area">
                <div class="row justify-content-center">
                    <div class="col-lg-6 bg_img d-flex flex-wrap justify-content-center align-items-center" data-background="{{getImage('assets/images/frontend/login/'.$bg->background_image, '1920x1080')}}">
                    <div class="account-content text-center px-5 py-4">
                    <h2 class="text-white title">@lang('Verification Code')</h2>
                    <p class="para-white mt-3">@lang('Please Provide the code we\'ve sent in your mobile no.')</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-wrapper">
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="publisher" role="tabpanel" aria-labelledby="publisher-tab">
                            <form action="{{route('verify_sms',$guard)}}" method="POST" class="cmn-form mt-30">
                                @csrf
                                <div class="form-group">
                                    <p class="text-center">@lang('Your Mobile Number:')  <strong>{{auth()->guard($guard)->user()->mobile}}</strong></p>
                                </div>

                                <div class="form-group">
                                    <div id="phoneInput">
                                        <div class="field-wrapper">
                                            <div class=" phone">
                                                <div class="row form-row">
                                                    <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="sms_verified_code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                                    <div class="col-2">
                                                        <div class="account-form-group">
                                                            <input type="text" name="sms_verified_code[]" class="letter border"
                                                            pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                    </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="account-form-group">
                                                            <input type="text" name="sms_verified_code[]" class="letter border"
                                                            pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                    </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="account-form-group">
                                                            <input type="text" name="sms_verified_code[]" class="letter border"
                                                            pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                    </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="account-form-group">
                                                            <input type="text" name="sms_verified_code[]" class="letter border"
                                                            pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                    </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="account-form-group">
                                                            <input type="text" name="sms_verified_code[]" class="letter border"
                                                            pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                    </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <button class="cmn-btn w-100" type="submit">@lang('Verify Your Code')</button>
                                </div>

                                <div class="form-group text-center">
                                    <small>@lang('Didn\'t get code in your phone yet ?') <a href="{{route('send_verify_code',$guard)}}?type=phone" class="forget-pass text-primary"> @lang('Resend code')</a></small>
                                    @if ($errors->has('resend'))
                                        <br/>
                                        <small class="text-danger">{{ $errors->first('resend') }}</small>
                                    @endif
                                </div>

                            </form>
                        </div>

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
    </section>

    @elseif(!$user->tv)

    <section class="pt-100 pb-100">
        <div class="container">
        <div class="account-area">
            <div class="row justify-content-center">
                <div class="col-lg-6 bg_img d-flex flex-wrap justify-content-center align-items-center" data-background="{{getImage('assets/images/frontend/login/'.$bg->background_image,'1920x1080')}}">
                <div class="account-content text-center px-5 py-4">
                <h2 class="text-white title">@lang('Verification Code')</h2>
                <p class="para-white mt-3">@lang('Please Provide the code we\'ve sent in your mobile no.')</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="account-wrapper">
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="publisher" role="tabpanel" aria-labelledby="publisher-tab">
                        <form action="{{route('go2fa.verify',$guard)}}" method="POST" class="cmn-form mt-30">
                            @csrf
                            <div class="form-group">
                                <p class="text-center">@lang('Current Time'): {{\Carbon\Carbon::now()}}</p>
                            </div>


                            <div class="form-group">
                                <div id="phoneInput">
                                    <div class="field-wrapper">
                                        <div class=" phone">
                                            <div class="row form-row">
                                                <div class="col-2">
                                                <div class="account-form-group">
                                                    <input type="text" name="code[]" class="letter border"
                                                    pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                            </div>
                                            </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="account-form-group">
                                                        <input type="text" name="code[]" class="letter border"
                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button class="cmn-btn w-100" type="submit">@lang('Verify Your Code')</button>
                            </div>

                        </form>
                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
</section>



    @else
        <script>
            window.location.href = "{{route($guard.'.home')}}";
        </script>
    @endif



@endsection




@push('script-lib')
    <script src="{{ asset($activeTemplateTrue.'js/jquery.inputLettering.js') }}"></script>
@endpush
@push('style')
    <style>

        #phoneInput .field-wrapper {
            position: relative;
            text-align: center;
        }

        #phoneInput .form-group {
            min-width: 300px;
            width: 50%;
            margin: 4em auto;
            display: flex;
            border: 1px solid rgba(96, 100, 104, 0.3);
        }

        #phoneInput .letter {
            height: 50px;
            border-radius: 0;
            text-align: center;

            flex-grow: 1;
            flex-shrink: 1;
            flex-basis: calc(100% / 10);
            outline-style: none;
            padding: 5px 0;
            font-size: 18px;
            font-weight: bold;
            color: red;
            border: 1px solid #0e0d35;
        }

        #phoneInput .letter + .letter {
        }

        @media (max-width: 480px) {
            #phoneInput .field-wrapper {
                width: 100%;
            }

            #phoneInput .letter {
                font-size: 16px;
                padding: 2px 0;
                height: 35px;
            }
        }

    </style>
@endpush

@push('script')
    <script>
        'use strict'
        $(function () {
            $('#phoneInput').letteringInput({
                inputClass: 'letter',
                onLetterKeyup: function ($item, event) {
                    console.log('$item:', $item);
                    console.log('event:', event);
                },
                onSet: function ($el, event, value) {
                    console.log('element:', $el);
                    console.log('event:', event);
                    console.log('value:', value);
                }
            });
        });
    </script>
@endpush
