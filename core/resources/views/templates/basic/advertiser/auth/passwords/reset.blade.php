@extends($activeTemplate.'layouts.frontendLeadPaid')

@php
    $bg = getContent('login.content',true)->data_values;
@endphp

@section('content')


{{-- @include($activeTemplate.'partials.breadcrumb') --}}
<section class="py-4">
    <div class="container">
      <div class="account-area">
        <div class="row justify-content-center">
            <div class="col-12">
                <p class="page_title mb-5">Account Recovery</p>
            </div>
          <div class="col-lg-6">
            <div class="account-wrapper">
              <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="publisher-tab">
                  <form class="account-form" method="POST" action="{{ route('advertiser.password.change') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group mb-3">
                      <label>@lang('New Password') <sup class="text-danger">*</sup></label>
                      <input type="password" name="password" placeholder="@lang('password')" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>@lang('Confirm') <sup class="text-danger">*</sup></label>
                      <input type="password" name="password_confirmation" placeholder="@lang('Confirm Password')" class="form-control">
                    </div>
                    <button type="submit" class="cmn-btn w-100 mt-5">@lang('Reset Password')</button>
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
@push('style')
<style>
    .page_title{
        text-align: center;
        color: #191f58;
        font-family: Poppins !important;
        font-weight: 600;
        font-size: 38px;
        margin-top: 50px;
    }
    .form-group label {
        font-size: 20px;
        font-weight: 500;
        line-height: normal;
        color: #212529;
    }
    .form-control{
        border-radius: 0;
        border: 1px solid #94a1b5;
        display: block;
        font-size: 19px;
        padding: 16px 24px;
        line-height: normal;
    }
    button.cmn-btn {
        padding-left: 25px;
        padding-right: 25px;
    height: 63px;
    line-height: normal;
    background-color: #1361b2;
    color: #fff;
    border: none;
    font-size: 24px;
    font-weight: 500;
}
</style>
@endpush
