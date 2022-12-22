@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')

{{-- @include($activeTemplate.'partials.breadcrumb') --}}
<div class="contact-banner">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3119.3563763314287!2d-121.48248508516541!3d38.57164037368576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809ad0dd31655555%3A0x4400fdc2363ca6c4!2s1401%2021st%20Street%20Suite%20R%2C%20Sacramento%2C%20CA%2095811%2C%20USA!5e0!3m2!1sen!2sin!4v1670595056862!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

@php
    $content = getContent('contact.content',true)
@endphp

<section class="small-section contact-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="log-in theme-card">
                    <div class="title-3 text-start">
                        <h2>CONTACT US</h2>
                    </div>
                        <form method="POST" name="contact_form" id="contact_form" action="{{route('contact.send')}}" class="row form gx-3 get-in-touch">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" id="conact_name" name="name" class="rounded-0 form-control py-2" placeholder="@lang('Full Name')" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" id="conact_company" name="company" class="rounded-0 form-control py-2" placeholder="@lang('Company Name')" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" id="conact_email" name="email" class="rounded-0 form-control py-2" placeholder="@lang('Email Address')" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" id="conact_phone" name="phone" class="rounded-0 form-control py-2" placeholder="@lang('Phone Number')">
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <textarea id="conact_message"  name="message" placeholder="@lang('Message')" class="form-control contact_msg rounded-0 py-2" rows="4">{{old('message')}}</textarea>
                            </div>
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
            <div class="col-lg-4 contact_section contact_sidebar mb-4">
                <div class="contact_wrap text-left">
                    <h4 class="title mb-3">Leads Paid Inc.</h4>
                    <p class="mb-0 d-flex justify-content-start">
                        <span class="me-3"><img src="{{asset('assets/images/frontend')}}/icon-pin.png" width="32px" alt="" ></span>
                        <span>1401 21st Street STE R,<br/> Sacramento, California 95811<br>United States</span>
                    </p>
                    <p class="my-3 d-flex justify-content-start">
                        <span class="me-3"><img src="{{asset('assets/images/frontend')}}/icon-email.png" width="32px" alt="" ></span>
                        <span><a href="mailto:&#99;&#111;&#110;&#116;&#97;&#99;&#116;&#64;&#108;&#101;&#97;&#100;&#115;&#112;&#97;&#105;&#100;&#46;&#99;&#111;&#109;">&#99;&#111;&#110;&#116;&#97;&#99;&#116;&#64;&#108;&#101;&#97;&#100;&#115;&#112;&#97;&#105;&#100;&#46;&#99;&#111;&#109;</a></span>
                    </p>
                    <p class="mb-0 d-flex justify-content-start">
                        <span class="me-3"><img src="{{asset('assets/images/frontend')}}/icon-phone.png" width="32px" alt="" ></span>
                        <span>1401</span>
                    </p>
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
    <script src="{{asset('assets/templates/basic')}}/js/vendor/all-icons.js"></script>
    <script src="https://formvalidation.io/vendors/formvalidation/dist/js/plugins/Bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://formvalidation.io/vendors/formvalidation/dist/css/formValidation.min.css">
@endpush
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function(e) {
        FormValidation.formValidation(document.querySelector('#contact_form'), {
            fields: {

                name: {
                    validators: {
                        notEmpty: {
                            message: 'Name is required.',
                        },
                        stringLength: {
                            min: 3,
                            message: 'Please fill Full Name.',
                        },
                        regexp: {
                            regexp: /^[a-z A-Z]+$/,
                            message: 'Full Name Invalid.',
                        },
                    },
                },
                company: {
                    validators: {
                        // notEmpty: {
                        //     message: 'company Name is required.',
                        // },
                        stringLength: {
                            min: 3,
                            message: 'Please fill Full Company Name.',
                        },
                        // regexp: {
                        //     regexp: /^[a-z A-Z]+$/,
                        //     message: 'Full Name Invalid.',
                        // },
                    },
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Phone is required.',
                        },
                        stringLength: {
                            min: 6,
                            message: 'Please enter valid phone.',
                        },
                        callback: {
                            message: 'Number only please',
                            callback: function (input) {
                                const value = input.value;
                                if (value === '') {  return true; }
                                return (
                                     FormValidation.validators.regexp().validate({
                                        value: value,
                                        options: {   regexp: '^[0-9]*$' },
                                    }).valid
                                );
                            },
                        },
                    },
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter a valid email address',
                        },
                        callback: {
                            message: 'Please enter a valid email address',
                            callback: function (input) {
                                const value = input.value;
                                if (value === '') {  return true; }

                                // I want the value has to pass both emailAddress and regexp validators
                                return (
                                    FormValidation.validators.emailAddress().validate({   value: value,  }).valid &&
                                    FormValidation.validators.regexp().validate({
                                        value: value,
                                        options: {   regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$', },
                                    }).valid
                                );
                            },
                        },
                    },
                },
                message: {
                    validators: {
                        notEmpty: {
                            message: 'Message is required.',
                        },
                        stringLength: {
                            min: 5,
                            message: 'Please fill your message in detail',
                        },
                    },
                }
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
            document.querySelector('#contact_form').submit();

        });

    });
</script>

@endpush
@push('style')
<style>
    .contact-banner{
        position: relative;
        filter: invert(10%);
    }

    .contact-3 .title-3:before {
        display:none;
    }
    .contact_msg {
        color: #586167 !important;
        font-weight:400;
        font-size:18px;
    }
    .conpant_icon svg {
        height:24px !important;
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
    .contact-3 .form-group input {
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

    .contact-3 .form-group .form-control:focus,
    .contact-3 .contact_msg:focus,
    .contact-3 .was-validated
    .form-select:valid,
    .contact-3 .form-select.is-valid {
        background-color: #fff;
        border: 1px solid #94a1b5 !important;
        box-shadow: 0 0 20px rgb(0 0 0 / 16%) !important;
        transition: All .2s ease-in-out!important;
    }

    .contact-3 .form-group i {
        top: 10px;
        right: 10px;
    }
    .contact-3 .theme-card {
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
    }

    .contact_sidebar .contact_wrap {
        text-align:left !important;
        -webkit-box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 20%);
        box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 20%);
        height: auto!important;
    }

    .contact_sidebar .contact_wrap {
        text-align:left !important;
        -webkit-box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 7%);
        box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 7%);
        padding: 30px;
    }
    .contact_sidebar .contact_wrap .title {
        font-family: Poppins !important;
        font-weight: 600!important;
        font-size: 30px!important;
        margin-bottom: 15px!important;
        color: #191f58!important;
    }
    .contact_sidebar .contact_wrap p, .contact_sidebar .contact_wrap p a {
        color: #586167 !important;
        font-weight:400;
        font-size:18px;
    }
</style>
@endpush
