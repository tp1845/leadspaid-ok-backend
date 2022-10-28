@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper default-version">
        <div class="form-area bg_img" data-background="{{asset('assets/admin/images/1.jpg')}}">
            <div class="form-wrapper">
                <h4 class="logo-text mb-15"><strong>@lang('Reset Password')</strong></h4>
                <form action="{{ route('admin.password.change') }}" method="POST" class="cmn-form mt-30">
                    @csrf

                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="pass">@lang('New Password')</label>
                        <input type="password" name="password" class="form-control b-radius--capsule" id="password" placeholder="@lang('New password')">
                        <i class="las la-lock input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label for="pass">@lang('Retype New Password')</label>
                        <input type="password" name="password_confirmation" class="form-control b-radius--capsule" id="password_confirmation" placeholder="@lang('Retype New password')">
                        <i class="las la-lock input-icon"></i>
                    </div>

                    <div class="form-group d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.login') }}" class="text-muted text--small"><i class="las la-lock"></i>@lang('Login Here')</a>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Reset Password') <i class="las la-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>
        </div><!-- login-area end -->
    </div>
@endsection

