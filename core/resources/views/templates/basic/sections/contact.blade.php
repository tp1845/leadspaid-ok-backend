@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')

{{-- @include($activeTemplate.'partials.breadcrumb') --}}
<div class="contact-banner">


        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.434530149296!2d-122.08289098520113!3d37.426838439874835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9f77429516d%3A0xbe5e67b16d7b10fe!2s1%20Amphitheatre%20Pkwy%2C%20Mountain%20View%2C%20CA%2094043%2C%20USA!5e0!3m2!1sen!2sin!4v1670230258100!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
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
    .contact-3 .title-3:before {
        display:none;
    }
    .contact_wrap p, .contact_wrap p a, .contact_msg {
    color: #586167 !important;
    font-weight:300;
}
    .conpant_icon svg {
        height:24px !important;
    }
    .contact_wrap .title {
    color: #1361b2;
}
.submit-btn button.btn {
    font-size: 24px;
    font-weight: 500;
}
.input-group {
    border-color: #94a1b5 !important;
}
.contact-3 .form-group {
    margin-bottom: unset;
}
.contact-3 .form-group .input-group input {
    color: #586167;
    outline: none;
    display: block;
    font-size: 19px;
    height: 63px;
    border-bottom: none;
    border: 1px solid #94a1b5 !important;
    padding: 16px 24px;
    line-height: normal;
    /* background: #f2f7ff; */
    font-weight:300;
}
.contact-3 .form-group textarea {
    border: 1px solid #94a1b5 !important;
    /* background: #f2f7ff; */
    font-size: 19px;
    padding: 16px 24px;
    line-height: normal;
    font-weight:300;
}

.contact-3 .form-group .input-group .form-control:focus, .contact-3 .contact_msg:focus, .contact-3 .was-validated .form-select:valid, .contact-3 .form-select.is-valid {
    background-color: #fff;
    border: 1px solid #94a1b5 !important;
    box-shadow: 0 0 20px rgb(0 0 0 / 16%) !important;
    transition: All .2s ease-in-out!important;
}

.contact-3 .form-group i {
    top: 10px;
    right: 10px;
}
.contact-3 .contact_section .contact_wrap {
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
}
</style>

@php
    $content = getContent('contact.content',true)
@endphp

<section class="small-section contact-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="log-in theme-card">
                    <div class="title-3 text-start">
                        <h2>Contact Us</h2>
                    </div>

                        <form method="POST" id="form-contact" action="{{route('contact.send')}}" class="row gx-3 get-in-touch">
                            @csrf
                        <div class="form-group col-md-6 mb-3">
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    </div>
                                </div> -->
                                {{-- <label>@lang('Name') <sup class="text-danger">*</sup></label> --}}
                                <input type="text" id="conact_name" name="name" placeholder="@lang('Full Name')" class="rounded-0 form-control py-2" required value="{{old('name')}}" required >
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                                    <div class="input-group-text conpant_icon">
                                        <svg id="Layer_1" style="enable-background:new 0 0 91 91;" version="1.1" viewBox="0 0 91 91" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M52.7,19.1H19.9v53.2h32.8V19.1z M34.7,62.2h-3.4v-6.2h3.4V62.2z M34.7,49.7h-3.4v-6.2h3.4V49.7z M34.7,37.3h-3.4v-6.2h3.4   V37.3z M45,62.2h-3.4v-6.2H45V62.2z M45,49.7h-3.4v-6.2H45V49.7z M45,37.3h-3.4v-6.2H45V37.3z"/><path d="M75.2,65.6V40.9l-19.7,0v31.4h13C72.2,72.3,75.2,69.3,75.2,65.6z M67.6,62.3H61V59h6.6V62.3z M67.6,54H61v-3.4h6.6V54z"/></g></svg>
                                    </div>
                                </div> -->
                                <input type="text"  id="conact_company" name="company" placeholder="@lang('Company Name')" class="rounded-0 form-control py-2" required value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    </div>
                                </div> -->
                                <input type="email" id="conact_email" name="email" placeholder="@lang('Email Address')" class="rounded-0 form-control py-2" required value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    </div>
                                </div> -->
                                <input type="tel" id="conact_phone" name="phone" placeholder="@lang('Phone Number')" class="rounded-0 form-control py-2" required value="{{old('phone')}}">
                            </div>
                        </div>

                        {{-- <div class="form-group mb-3 col-md-12">
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    </div>
                                </div> -->
                                <input type="text" id="conact_subject" name="subject" placeholder="@lang('Subject')" class="rounded-0 form-control" required value="{{old('subject')}}">
                            </div>
                        </div> --}}
                        <div class="form-group mb-3 col-md-12">
                            <textarea name="message" id="conact_message" placeholder="@lang('Message')" class="form-control contact_msg rounded-0 py-2" required rows="4">{{old('message')}}</textarea>
                        </div>
                        <div class="col-md-12 submit-btn">
                            <button type="submit" class="btn btn-secondary px-5 py-2 text-uppercase fw-bold">@lang('Submit Message')</button>
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
            <div class="col-lg-4 contact_section contact_right mb-4">
                <div class="row">
                    <div class="col-lg-12 col-sm-6">
                        <div class="contact_wrap">
                            <h4 class="title mb-0">@lang('LeadsPaid.com Inc.')</h4>
                            <p class="mb-2">1 Amphitheatre Parkway Mountain View, CA 94043</p>
                            <p> <a href="mailto:&#99;&#111;&#110;&#116;&#97;&#99;&#116;&#64;&#108;&#101;&#97;&#100;&#115;&#112;&#97;&#105;&#100;&#46;&#99;&#111;&#109;">&#99;&#111;&#110;&#116;&#97;&#99;&#116;&#64;&#108;&#101;&#97;&#100;&#115;&#112;&#97;&#105;&#100;&#46;&#99;&#111;&#109;</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
      <!-- contact section end -->
@endsection
@push('script-lib')
<script src="{{asset('assets/templates/basic')}}/js/vendor/particles.js"></script>
<script src="{{asset('assets/templates/basic')}}/js/vendor/app.js"></script> 
  <script src="https://formvalidation.io/vendors/formvalidation/dist/js/FormValidation.min.js"></script>
  <script src="https://formvalidation.io/vendors/formvalidation/dist/js/FormValidation.min.js"></script>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://formvalidation.io/vendors/formvalidation/dist/js/plugins/Bootstrap.min.js"></script>   

@endpush
@push('script')
<script>
document.addEventListener('DOMContentLoaded', function(e) {

FormValidation.formValidation(document.querySelector('#form-contact'), {
    fields: {
        name: {
            validators: {
                notEmpty: {
                    message: 'Please fill Full  Name',
                },
                stringLength: {
                    min: 3,
                    message: 'Please fill Full  Name.',
                }
            },
        },
        company: {
             validators: {
                notEmpty: {
                    message: 'Please fill company Name.',
                },
                stringLength: {
                    min: 3,
                    message: 'Please fill company Name.',
                },
            },
       
        },

        email: {
            validators: {
                notEmpty: {
                    message: 'Please fill valid email address',
                },
                emailAddress: {
                    message: 'Please fill valid email address',
                },
            },
               
        },
      
        phone: {
            validators: {
                notEmpty: {
                    message: 'Please fill Phone Number.',
                },
                stringLength: {
                    min: 6,
                    message: 'Please fill Phone Number.',
                },
            },
        },
        subject: {
              validators: {
                notEmpty: {
                    message: 'Please fill subject.',
                },
                stringLength: {
                    min: 20,
                    message: 'Please fill subject.',
                },
            },
        },
        message: {
             validators: {
                notEmpty: {
                    message: 'Please fill message.',
                },
                emailAddress: {
                    message: 'Please fill message.',
                },
            },
        },
    },
    plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap(),
        submitButton: new FormValidation.plugins.SubmitButton(),
        icon: new FormValidation.plugins.Icon({
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh',
        }),
        alias: new FormValidation.plugins.Alias({
            checkConfirmation: 'callback'
        }),
    },
}).on('core.form.valid', function() {
    document.querySelector('#form-contact').submit();

});

});
</script>    

@endpush