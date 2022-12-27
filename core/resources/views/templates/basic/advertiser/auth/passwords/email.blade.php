@extends('templates.basic.layouts.frontendLeadPaid')
@php
    $bg = getContent('login.content',true)->data_values;
@endphp
@section('content')
{{-- @include($activeTemplate.'partials.breadcrumb') --}}

<section class="page_middle pt-100 pb-100">
    <div class="container">
      <div class="account-area py-4">
        <div class="row justify-content-center">
          {{-- <div class="col-lg-6 bg_img d-flex flex-wrap justify-content-center align-items-center" data-background="{{getImage('assets/images/frontend/login/'.$bg->background_image,'1920x1080')}}">
            <div class="account-content text-center px-5 py-4">
              <h2 class="text-white title">@lang('Reset Password')</h2>
              <p class="para-white mt-3">@lang('Please provide valid email')</p>
            </div>
          </div> --}}
          <div class="col-12">
            <p class="page_title mb-5">RESET PASSWORD</p>
          </div>
          <div class="col-md-6">
            <div class="account-wrapper">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="publisher" role="tabpanel" aria-labelledby="publisher-tab">
                  <form class="account-form" method="POST" action="{{ route('advertiser.password.reset') }}">
                    @csrf
                    <div class="form-group">
                      <label class="mb-2">@lang('Email Address') <sup class="text-danger">*</sup></label>
                      <input type="email" name="email" placeholder="@lang('Email Address')" class="form-control" required>
                        @foreach ($errors->all() as $error)
                            <div class="invalid-feedback d-block">{{ $error }}</div>
                        @endforeach
                    </div>
                    <div class="text-center mt-5 mb-xl-0 mb-lg-0 mb-md-0 mb-sm-5 mb-5">
                        <button type="submit" class="cmn-btn ">@lang('Send Password Reset Code')</button>
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
@push('style')
<style>
    .page_middle{ border-top: 3px solid #1361b2; }
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
