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
                            <div class="form-group  input-group  mb-3">
                                <select name="country_code" class="country_code form-select form-control  rounded-0">
                                    @include('partials.country_code')
                                </select>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
@endpush
@push('script')

    <script>
        $.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $.validator.addMethod(
            "money",
            function(value, element) {
                var isValidMoney = /^\d{0,10}(\.\d{0,2})?$/.test(value);
                return this.optional(element) || isValidMoney;
            },
            "Enter Correct value."
        );
        jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");
        jQuery.validator.addMethod("numbersonly", function(value, element) {
        return this.optional(element) || /^[0-9]*$/i.test(value);
        }, "Number only please");
        jQuery.validator.addMethod("valid_email", function(value, element) {
        return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
        }, "Please enter a valid email address");


        $("#contact_form").validate({
            rules: {
                name: { required: true,minlength: 3, lettersonly: true },
                company: { required: false, minlength: 3},
                email: { required: true,  valid_email:true  },
                phone: { required: true, minlength: 6, numbersonly: true },
                message: { required: true, minlength: 15 }
            },messages: {
                name:{  required : 'Name is required.', minlength:'Please fill Full Name.', lettersonly:'Full Name Invalid.' },
                company:{  required : 'Company Name is required.', minlength:'Please fill Full Company Name.' },
                phone:{  required : 'Phone is required.', minlength:'Please enter valid phone.', numbersonly:'Please enter valid phone.'},
                email:{  required : 'email is required.'},
                message:  { required : 'Daily Budget is required.', minlength:'Daily Budget should be minimum $50', max: 'Daily Budget should not be greater than $1000'}
            }
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
    .country_code.form-select{
        border: 1px solid #94a1b5;
        background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
        flex: 0 0 25%;
        width: 25%;
        font-weight: 300;
        font-size: 19px;
        padding: 16px 24px;
        border-radius: 0;
        line-height: normal;
    }
    .contact-3 .form-group .form-control:focus,
    .contact-3 .contact_msg:focus,
    .contact-3 .was-validated
    .form-select:valid,
    .contact-3 .form-select.is-valid {
        background-color: #fff;
        border: 1px solid #94a1b5 !important;
        box-shadow: 0 0 20px rgb(0 0 0 / 16%) !important;

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
        -webkit-box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 30%);
        box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 30%);
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
    .fv-plugins-message-container{ width: 100%; }
</style>
@endpush
