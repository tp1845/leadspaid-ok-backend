
@extends($activeTemplate.'layouts.frontend')
@php
    $bg = getContent('login.content',true)->data_values;
@endphp
@section('content')
    @include($activeTemplate.'partials.breadcrumb')
    <section class="pt-100 pb-100">
        <div class="container">
            <div class="account-area">
                <div class="row justify-content-center">
                    <div class="col-lg-6 bg_img d-flex flex-wrap justify-content-center align-items-center" data-background="{{getImage('assets/images/frontend/login/'.$bg->background_image,'1920x1080')}}">
                        <div class="account-content text-center px-5 py-4">
                            <h2 class="text-white title">@lang('Welcome to') {{$general->sitename}}</h2>
                            <p class="para-white mt-3">@lang('Please login with valid credentials')</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="account-wrapper">
                            <ul class="nav nav-tabs account-tab-nav" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="publisher-tab" data-toggle="tab" href="#publisher" role="tab" aria-controls="publisher" aria-selected="true">@lang('Publisher')</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="advertiser-tab" data-toggle="tab" href="#advertiser" role="tab" aria-controls="advertiser" aria-selected="false">@lang('Advertiser')</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-5" id="myTabContent">
                                <div class="tab-pane fade show active" id="publisher" role="tabpanel" aria-labelledby="publisher-tab">
                                    <form class="account-form" method="POST" action="{{ route('publisher.login')}}" onsubmit="return submitUserForm()">
                                        @csrf
                                        <div class="form-group">
                                            <label>@lang('Username')<sup class="text-danger">*</sup></label>
                                            <input type="text" name="username" placeholder="@lang('Username')" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('Password') <sup class="text-danger">*</sup></label>
                                            <input type="password" name="password" placeholder="@lang('Password')" class="form-control" required>
                                        </div>

                                        @include($activeTemplate.'partials.custom-captcha')
                                        <div class="form-group row">

                                            <div class="col-md-12 ">
                                                @php echo recaptcha() @endphp
                                            </div>
                                        </div>
                                        <button type="submit" class="cmn-btn w-100">@lang('Login Now')</button>
                                        <div class="account-form-group mt-4 mb-4 mb-sm-5 d-flex justify-content-between align-items-center">
                                            <a href="{{route('publisher.password.reset')}}">@lang('Forgot Password?')</a>
                                            <a href="{{route('register')}}">@lang('Don\'t have any account?')</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade show" id="advertiser" role="tabpanel" aria-labelledby="advertiser-tab">
                                    <form class="account-form" method="POST" action="{{ route('advertiser.login')}}" onsubmit="return submitUserForm()">
                                        @csrf
                                        <div class="form-group">
                                            <label>@lang('Username')<sup class="text-danger">*</sup></label>
                                            <input type="text" name="username" placeholder="@lang('Username')" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('Password') <sup class="text-danger">*</sup></label>
                                            <input type="password" name="password" placeholder="@lang('Password')" class="form-control" required>
                                        </div>
                                        @include($activeTemplate.'partials.custom-captcha')
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                @php echo recaptcha() @endphp
                                            </div>
                                        </div>

                                        <button type="submit" class="cmn-btn w-100">@lang('Login Now')</button>
                                        <div class=" mt-4 mb-4 mb-sm-5 d-flex justify-content-between align-items-center">
                                            <a href="{{route('advertiser.password.reset')}}">@lang('Forgot Password?')</a>
                                            <a href="{{route('register')}}">@lang('Don\'t have any account?')</a>
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
@endsection
@push('script')
    <script>
        'use strict'
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }
        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
@endpush


