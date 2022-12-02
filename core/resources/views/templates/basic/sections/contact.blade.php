@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')

{{-- @include($activeTemplate.'partials.breadcrumb') --}}
<div class="contact-banner">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7458270242414!2d103.8757511!3d1.3285200000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da17871c5aaacd%3A0x4096b7de29a92cc4!2s16%20Tannery%20Ln%2C%20%2308-00%20Crystal%20Time%20Building%2C%20Singapore%20347778!5e0!3m2!1sen!2sin!4v1669634064801!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<style>
    .contact-banner{
        position: relative;
    }
    .contact-banner:after{
        position: absolute;
        top: 0;
        left: 0;
        z-index: 20;
        width: 100%;
        height: 100%;
        display: block;
        content: "";
        background-color: #000;
        opacity: .1;

    }
</style>

@php
    $content = getContent('contact.content',true)
@endphp

<section class="small-section contact-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-2">
                <div class="log-in theme-card">
                    <div class="title-3 text-start">
                        <h2>Contact Us</h2>
                    </div>

                        <form method="POST" action="{{route('contact.send')}}" class="row gx-3 get-in-touch">
                            @csrf
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    </div>
                                </div>
                                {{-- <label>@lang('Name') <sup class="text-danger">*</sup></label> --}}
                                <input type="text" name="name" placeholder="@lang('Full Name')*" class="form-control" required value="{{old('name')}}" required >
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    </div>
                                </div>
                                <input type="email" name="email" placeholder="@lang('Email Address')*" class="form-control" required value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    </div>
                                </div>
                                <input type="tel" name="phone" placeholder="@lang('Phone Number')*" class="form-control" required value="{{old('phone')}}">
                            </div>
                        </div>

                        {{-- <div class="form-group col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    </div>
                                </div>
                                <input type="text" name="subject" placeholder="@lang('Subject')" class="form-control" required value="{{old('subject')}}">
                            </div>
                        </div> --}}
                        <div class="form-group col-md-12">
                            <textarea name="message" placeholder="@lang('Message')*" class="form-control" required rows="4">{{old('message')}}</textarea>
                        </div>
                        <div class="col-md-12 submit-btn">
                            <button type="submit" class="btn btn-secondary w-100">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
                {{-- <div class="theme-card">
                <div class="contact-bottom">
                    <div class="contact-map">
                        <iframe title="contact location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946229!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563449626439!5m2!1sen!2sin" allowfullscreen=""></iframe>
                    </div>
                </div>
                </div> --}}
            </div>
            <div class="col-lg-4 contact_section contact_right order-1">
                <div class="row">
                    <div class="col-lg-12 col-sm-6">
                        <div class="contact_wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>

                            <h4 class="title">@lang('Office Address')</h4>
                            <p>@lang($content->data_values->address)</p>

                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6">
                        <div class="contact_wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <h4 class="title">@lang('Phone Number')</h4>
                            <p><a href="tel:{{$content->data_values->phone_number}}">{{$content->data_values->phone_number}}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6">
                        <div class="contact_wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <h4 class="title">@lang('Email Address')</h4>
                             {{-- <p><a href="mailto:{{$content->data_values->email}}">{{$content->data_values->email}}</a></p> --}}
                             <p>{{--<a href="mailto:info@leadspaid.com">info@leadspaid.com</a> --}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
      <!-- contact section end -->
@endsection
