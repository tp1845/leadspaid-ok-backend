@extends($activeTemplate.'layouts.advertiser.frontend')
@php
$user = auth()->guard('advertiser')->user();
@endphp
@section('panel')

<section>
    <div class="container">
        <div class="account-area">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <div class="profile account-wrapper">
                        <div class="tab-content mt-5" id="myTabContent">
                            <form method="POST" id="advertiser_form" action="{{route('advertiser.profile.update')}}">
                                @csrf
                                <div class="row">
                                <div class="mb-4 col-md-6" style="overflow: inherit;">
                                    <div class="font-weight-bolder text-body"> Basic Information
                                    </div>
                                    <div class="card-body px-0">
                                        <div class="form-group ">
                                            <label class="d-none">@lang('Company Name')</label>
                                            <input type="text" id="company_name" class="form-control Rg_advts_name rounded-0" name="company_name" value="{{ auth()->guard('advertiser')->user()->company_name }}" placeholder="Company Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-none">@lang('Full Name') <sup class="text-danger">*</sup></label>
                                            <input type="text" id="full_name" name="name" placeholder="Full Name" class="Rg_advts_name form-control rounded-0" value="{{auth()->guard('advertiser')->user()->name}}">
                                        </div>
                                        <div class="form-group country-code">
                                            <label class="d-none">@lang('Mobile') <sup class="text-danger">*</sup></label>
                                            <div class="Rg_advts_number">
                                                <select name="country_code" class="country_code  form-select rounded-0">
                                            @include('partials.country_code')
                                            </select>
                                                <input type="text" name="mobile" value="{{auth()->guard('advertiser')->user()->mobile}}" class="form-control rounded-0" placeholder="@lang('Your Phone Number')">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-4 col-md-6">
                                    <div class="font-weight-bolder text-body"> Address Information
                                    </div>
                                    <div class="card-body px-0">
                                        <div class="form-group ">
                                            <label class="d-none">@lang('Address')<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control rounded-0" name="billed_to" id="floatingTextarea" value="{{auth()->guard('advertiser')->user()->billed_to}}" placeholder="Address">
                                        </div>
                                       <!--  <div class="form-group">
                                            <label class="d-none">@lang('Billing Email Address') <sup class="text-danger">*</sup></label>
                                            <input type="email" name="email" placeholder="Billing Email address" class="form-control rounded-0" value="{{auth()->guard('advertiser')->user()->email}}" required>
                                        </div> -->
                                        <div class="form-group">
                                            <input type="text" placeholder="City" name="city" class="form-control rounded-0" value="{{auth()->guard('advertiser')->user()->city}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Postal Code" name="postal_code" class="form-control rounded-0" value="{{auth()->guard('advertiser')->user()->postal_code}}">
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select rounded-0 mr-sm-2 form-control" value="{{auth()->guard('advertiser')->user()->country}}" name="country">
                                                @foreach ($countries as $country)
                                                <option @if($user->country === $country->country_name)
                                                    selected="selected" @endif
                                                    value=" {{ $country->country_name }} " label=" {{
                                                        $country->country_name }} ">
                                                    {{ $country->country_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="font-weight-bolder text-body"> User Information
                                    </div>

                                    <div class="card-body px-0 pt-1">
                                        <div class="form-group">
                                            <label>@lang('Username / Email Address') <sup class="text-danger">*</sup></label>
                                            <input type="text" id="email" name="email" placeholder="User Name" class="form-control Rg_advts_name rounded-0" readonly value="{{auth()->guard('advertiser')->user()->username}}">
                                        </div>
                                    </div>
                                    @include($activeTemplate.'partials.custom-captcha')
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row m-0">
                                        <div class="col-md-12 ">
                                            @php echo recaptcha() @endphp
                                        </div>
                                    </div>
                                    <button type="submit" class="box--shadow1 rounded-0 btn btn--primary btn-lg text--small Rg_advts_my_btn">@lang('Update Profile')</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('breadcrumb-plugins')
<a href="{{route('advertiser.password')}}" class="btn btn-sm btn--primary box--shadow1 text--small profile_pass_setting rounded-0"><i class="fa fa-key"></i>@lang('Change Password')</a>
@endpush

@push('script')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script>
    'use strict'

    function proPicURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = $(input).parents('.thumb').find('.profilePicPreview');
                $(preview).css('background-image', 'url(' + e.target.result + ')');
                $(preview).addClass('has-image');
                $(preview).hide();
                $(preview).fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".profilePicUpload").on('change', function() {
        proPicURL(this);
    });

    $(".remove-image").on('click', function() {
        $(this).parents(".profilePicPreview").css('background-image', 'none');
        $(this).parents(".profilePicPreview").removeClass('has-image');
        $(this).parents(".thumb").find('input[type=file]').val('');
    });

    $("form").on("change", ".file-upload-field", function() {
        $(this).parent(".file-upload-wrapper").attr("data-text", $(this).val().replace(/.*(\/|\\)/, ''));
    });

   /* document.addEventListener('DOMContentLoaded', function(e) {
        FormValidation.formValidation(document.querySelector('#advertiser_form'), {
            fields: {
                company_name: {
                    validators: {
                        stringLength: {
                            min: 3,
                            message: 'Please fill Full Company Name.',
                        }
                    },
                },

                name: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Full Name.',
                        },
                        stringLength: {
                            min: 3,
                            message: 'Please fill Full Name.',
                        },
                        regexp: {
                            regexp: /^[a-z A-Z]+$/,
                            message: 'Please fill Full Name.',
                        },
                    },
                },
                mobile: {
                    validators: {
                        notEmpty: {
                            message: 'Phone is required.',
                        },
                        stringLength: {
                            min: 6,
                            message: 'Phone is required.',
                        },
                    },
                },
                billed_to: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill address to.',
                        },
                        stringLength: {
                            min: 3,
                            message: 'Please fill address to.',
                        },
                    },
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill vaild Email.',
                        },
                        emailAddress: {},
                    },
                },
                city: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill city.',
                        },
                        stringLength: {
                            min: 2,
                            message: 'Please fill city.',
                        },
                        regexp: {
                            regexp: /^[a-z A-Z]+$/,
                            message: 'City Invalid.',
                        },
                    },
                },
                country: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required.',
                        }
                    },
                },
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Username.',
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_.]+$/,
                            message: 'Username should not contain special characters.',
                        },
                    },
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Password',
                        },
                    },
                },
                password_confirmation: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Confirm Password',
                        },
                        checkConfirmation: {
                            message: 'Passowrd Mismatch',
                            callback: function(input) {
                                return document.querySelector("#advertiser_form").querySelector('[name="password"]').value === input.value;
                            },
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
            document.querySelector('#advertiser_form').submit();

        });
    });*/


jQuery.fn.capitalize = function() {
    $(this[0]).keyup(function(event) {
        var box = event.target;
        var txt = $(this).val();
        var stringStart = box.selectionStart;
        var stringEnd = box.selectionEnd;
        $(this).val(txt.replace(/^(.)|(\s|\-)(.)/g, function($word) {
            return $word.toUpperCase();
        }));
        box.setSelectionRange(stringStart , stringEnd);
    });
   return this;
}
$('#your_phone').keyup(function(){  this.value = this.value.replace(/[^0-9-\.]/g,'');});
$('#ad_budget').keyup(function(){  this.value = this.value.replace(/[^0-9]/g,'');});
$("#company_name").capitalize();
$("#full_name").capitalize();

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
    return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Letters only please");
    jQuery.validator.addMethod("numbersonly", function(value, element) {
    return this.optional(element) || /^[0-9]*$/i.test(value);
    }, "Number only please");
    jQuery.validator.addMethod("phoneonly", function(value, element) {
        return this.optional(element) || /^[0-9.-]*$/i.test(value);
        }, "Number only please");
    jQuery.validator.addMethod("valid_email", function(value, element) {
    return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    }, "Please enter a valid email address");





 $("#advertiser_form").validate({
        rules: {
            name: { required: true,minlength: 3, lettersonly: true },
            company_name: { required: true, minlength: 3},
            country: { required: true},
            mobile: { required: true, minlength: 6, phoneonly: true },
            postal_code: { required: false, maxlength: 200  },
           city: { required: true, minlength: 3, maxlength: 50 },
           billed_to: { required: true, minlength: 10, maxlength: 100 }
        },messages: {
            name:{  required : 'Full Name is required.', minlength:'Please fill Full Name.', lettersonly:'Full Name Invalid.' },
            company_name:{  required : 'Company Name is required.', minlength:'Please fill Full Company Name.' },
            mobile:{  required : 'Phone is required.', minlength:'Please enter valid phone.', phoneonly:'Please enter valid phone.'},
            postal_code: {maxlength: 'maximum 200 characters.'},
            city: {required : 'Please fill valid City.',minlength:'minmum 3 characters.', maxlength: 'maximum 50 characters.'},
            billed_to: {required:'Please fill valid address',minlength: 'minmum 10 characters.' ,maxlength: 'maximum 100 characters.'}
           

        }
    });
</script>

@endpush


@push('style')
<style type="text/css">
    .country-code .input-group-prepend .input-group-text {
        background: #fff !important;
    }

    .country-code select {
        border: none;
    }

    .country-code select:focus {
        outline: none;
        box-shadow: none;
    }

    .nice-select {
        -webkit-tap-highlight-color: transparent;
        background-color: #fff;
        border-radius: 5px;
        border: solid 1px #e8e8e8;
        box-sizing: border-box;
        clear: both;
        cursor: pointer;
        display: block;
        float: left;
        font-family: inherit;
        font-size: 14px;
        font-weight: normal;
        height: 42px;
        line-height: 40px;
        outline: none;
        padding-left: 18px;
        padding-right: 30px;
        position: relative;
        text-align: left !important;
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        white-space: nowrap;
        width: auto;
    }

    .nice-select:hover {
        border-color: #dbdbdb;
    }

    .nice-select:active,
    .nice-select.open,
    .nice-select:focus {
        border-color: #999;
    }

    .nice-select:after {
        border-bottom: 2px solid #999;
        border-right: 2px solid #999;
        content: '';
        display: block;
        height: 5px;
        margin-top: -4px;
        pointer-events: none;
        position: absolute;
        right: 12px;
        top: 50%;
        -webkit-transform-origin: 66% 66%;
        -ms-transform-origin: 66% 66%;
        transform-origin: 66% 66%;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        -webkit-transition: all 0.15s ease-in-out;
        transition: all 0.15s ease-in-out;
        width: 5px;
    }

    .nice-select.open:after {
        -webkit-transform: rotate(-135deg);
        -ms-transform: rotate(-135deg);
        transform: rotate(-135deg);
    }

    .nice-select.open .list {
        opacity: 1;
        pointer-events: auto;
        -webkit-transform: scale(1) translateY(0);
        -ms-transform: scale(1) translateY(0);
        transform: scale(1) translateY(0);
    }

    .nice-select.disabled {
        border-color: #ededed;
        color: #999;
        pointer-events: none;
    }

    .nice-select.disabled:after {
        border-color: #cccccc;
    }

    .nice-select.wide {
        width: 100%;
    }

    .nice-select.wide .list {
        left: 0 !important;
        right: 0 !important;
    }

    .nice-select.right {
        float: right;
    }

    .nice-select.right .list {
        left: auto;
        right: 0;
    }

    .nice-select.small {
        font-size: 12px;
        height: 36px;
        line-height: 34px;
    }

    .nice-select.small:after {
        height: 4px;
        width: 4px;
    }

    .nice-select.small .option {
        line-height: 34px;
        min-height: 34px;
    }

    .nice-select .list {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 0 1px rgba(68, 68, 68, 0.11);
        box-sizing: border-box;
        margin-top: 4px;
        opacity: 0;
        overflow: hidden;
        padding: 0;
        pointer-events: none;
        position: absolute;
        top: 100%;
        left: -11;
        -webkit-transform-origin: 50% 0;
        -ms-transform-origin: 50% 0;
        transform-origin: 50% 0;
        -webkit-transform: scale(0.75) translateY(-21px);
        -ms-transform: scale(0.75) translateY(-21px);
        transform: scale(0.75) translateY(-21px);
        -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
        transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
        z-index: 9;
    }

    .nice-select .list:hover .option:not(:hover) {
        background-color: transparent !important;
    }

    .nice-select .option {
        cursor: pointer;
        font-weight: 400;
        line-height: 40px;
        list-style: none;
        min-height: 40px;
        outline: none;
        padding-left: 18px;
        padding-right: 29px;
        text-align: left;
        -webkit-transition: all 0.2s;
        transition: all 0.2s;
    }

    .nice-select .option:hover,
    .nice-select .option.focus,
    .nice-select .option.selected.focus {
        background-color: #f6f6f6;
    }

    .nice-select .option.selected {
        font-weight: bold;
    }

    .nice-select .option.disabled {
        background-color: transparent;
        color: #999;
        cursor: default;
    }

    .no-csspointerevents .nice-select .list {
        display: none;
    }

    .no-csspointerevents .nice-select.open .list {
        display: block;
    }


    .nice-select {
        height: 24px;
        line-height: 23px;
        border: none;
    }

    .nice-select .list {
        max-height: 200px;
        overflow-y: auto;
    }
    #advertiser_form .card-body .form-group label {
        font-size: 16px;
        color: #1a273a;
    }
    .Rg_advts_number {
    display: flex;
    flex-wrap: wrap;
}
.Rg_advts_number .form-select {
    background: #f1f1f2 url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/15px 10px !important;
    appearance: none;
}
.Rg_advts_number select {
    flex: 0 0 25%;
    width: 25%;
    border: 1px solid #ced4da;
}
.Rg_advts_number input {
    flex: 0 0 75%;
    width: 75%;
}
#advertiser_form .fv-plugins-icon-container i {
    top: 13px;
}
#advertiser_form .form-group input {
    background: #fff;
    display: block;
    font-size: 19px !important;
    padding: 16px 24px;
    line-height: normal;
    height: unset;
   
}
#advertiser_form .form-group select {
    display: block;
    font-size: 19px !important;
    padding: 16px 24px;
    line-height: normal;
    height: unset;
    text-transform: capitalize;
}
.profile_pass_setting {
    font-size: 18px !important;
    padding: .375rem .75rem;
}
.Rg_advts_my_btn {
    font-size: 18px !important;
    padding: .375rem .75rem;
    background-color: #4500dd!important;
    font-weight: 500;
}
.form-control:disabled, .form-control[readonly]{
    background-color: #ccc !important;
}
#advertiser_form .form-group select {
    background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
}
#advertiser_form .form-group input:focus, #advertiser_form .form-group select:focus, #advertiser_form .form-group .form-control:focus {
    border:1px solid #ced4da;
    box-shadow: none;
}


element.style {
}
#campaign_create_modal .PageFormStyle .form-control {
    font-size: 20px!important;
}
#campaign_create_modal .PageFormStyle .form-control, #campaign_create_modal .PageFormStyle .custom-select {
    border-radius: 0;
    background-color: #fff;
    /* font-size: 19px!important; */
    /* font-weight: 300!important; */
    color: #212529!important;
    border-radius: 0!important;
    vertical-align: middle!important;
    border: 1px solid #94a1b5!important;
    outline: none!important;
    padding: 10px 18px!important;
    min-height: 52px;
    height: auto;
}
#campaign_create_modal .PageFormStyle .us_doller input[aria-invalid="false"], #campaign_create_modal form input[aria-invalid="false"] {
    font-weight: 400 !important;
}
#campaign_create_modal form input {
    font-size: 14px !important;
}
.invalid-feedback {
    display: none;
    width: 100%;
    margin-top: 4px;
    font-size: 14px;
    color: #dc3545;
}
#advertiser_form .form-group .was-validated #advertiser_form .form-group .form-control:invalid, #advertiser_form .form-group .form-control.is-invalid {
    border-color: #dc3545;
    padding-right: calc(1.5em + .75rem);
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(.375em + .1875rem) center;
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
}
#advertiser_form .text-body {
    font-size: 16px;
}
.Rg_advts_my_btn:hover {
    background-color: #4500dd!important;
}
</style>
@endpush