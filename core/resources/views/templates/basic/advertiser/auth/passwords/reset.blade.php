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
              <h2 class="text-white title">@lang('Reset Password')</h2>
              <p class="para-white mt-3">@lang('Please provide valid email')</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="account-wrapper">
              <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="publisher-tab">
                  <form class="account-form" method="POST" action="{{ route('advertiser.password.change') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                  
                    <div class="form-group">
                      <label>@lang('New Password') <sup class="text-danger">*</sup></label>
                      <input type="password" name="password" placeholder="@lang('password')" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>@lang('Confirm') <sup class="text-danger">*</sup></label>
                      <input type="password" name="password_confirmation" placeholder="@lang('Confirm Password')" class="form-control">
                    </div>
                    <button type="submit" class="cmn-btn w-100">@lang('Reset Password')</button>
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
