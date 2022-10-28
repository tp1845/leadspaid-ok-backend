@extends($activeTemplate.'layouts.frontend')

@section('content')

@include($activeTemplate.'partials.breadcrumb')

@php
    $content = getContent('contact.content',true)
@endphp



<section class="pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center mb-30">
            <div class="col-lg-4 col-md-6 mb-30">
              <div class="contact-info-card border-radius--8 text-center">
                <div class="contact-info-card__icon">
                  <i class="las la-map-marked-alt"></i>
                </div>
                <div class="contact-info-card__content">
                  <h4 class="title">@lang('Office Address')</h4>
                  <p>@lang($content->data_values->address)</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
              <div class="contact-info-card border-radius--8 text-center">
                <div class="contact-info-card__icon">
                  <i class="las la-phone"></i>
                </div>
                <div class="contact-info-card__content">
                  <h4 class="title">@lang('Phone Number')</h4>
                  <p><a href="tel:{{$content->data_values->phone_number}}">{{$content->data_values->phone_number}}</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
              <div class="contact-info-card border-radius--8 text-center">
                <div class="contact-info-card__icon">
                  <i class="las la-envelope"></i>
                </div>
                <div class="contact-info-card__content">
                  <h4 class="title">@lang('Email Address')</h4>
                  <p><a href="mailto:demo@mail.com">{{$content->data_values->email}}</a></p>
                 
                </div>
              </div>
            </div>
          </div>


          <div class="row mt-5">
            <div class="col-lg-12">
              <form class="contact-form" method="POST" action="{{route('contact.send')}}">
                @csrf
                <div class="row">
                  <div class="col-lg-6 left">
                    <h2 class="title mb-3">@lang('Write us.')</h2>
                    <div class="form-group">
                      <label>@lang('Name') <sup class="text-danger">*</sup></label>
                      <input type="text" name="name" placeholder="@lang('Full name')" class="form-control" required value="{{old('name')}}" >
                    </div>
                    <div class="form-group">
                      <label>@lang('Email') <sup class="text-danger">*</sup></label>
                      <input type="email" name="email" placeholder="@lang('Email address')" class="form-control" required value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                      <label>@lang('Subject') <sup class="text-danger">*</sup></label>
                      <input type="text" name="subject" placeholder="@lang('Subject')" class="form-control" required value="{{old('subject')}}">
                    </div>
                  </div>
                  <div class="col-lg-6 right">
                    <div class="form-group">
                      <label> @lang('Message')<sup class="text-danger">*</sup></label>
                      <textarea name="message" placeholder="@lang('Your message')" class="form-control" required>{{old('message')}}</textarea>
                    </div>
                    <button type="submit" class="cmn-btn w-100">@lang('Send Now')</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
    </div>
</section>
      <!-- contact section end -->
@endsection