@extends($activeTemplate.'layouts.frontendLeadPaid')

@php
    $bg = getContent('login.content',true)->data_values;
    $isPublisherForm = 'show active';
    $isAdvertiserForm = 'show';
    $isTab = 'none';
    if (isset($type)){
    $isAdvertiserForm = ($isTab == 'none')?($type == 'Advertiser')?'show active':'':'none';
    $isPublisherForm = ($isTab == 'none')?($type == 'Publisher')?'show active':'':'active';
    }else{
    $isTab = (isset($type) == '')?'flex':'none';
    if (old('form_type') == 'Advertiser') {
    $isAdvertiserForm = 'show active';
    $isPublisherForm = 'show';
    }
    }
@endphp
@section('content')
<section class="Rg_advts">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <p class="Rg_advts_ttls_1 pt-5">Generate Leads Now!</p>
                <p class="Rg_advts_ttls mb-5">REGISTER AS ADVERTISER</p>
            </div>
        </div>
        <form id="form" class="form" name="form"  method="POST" action="{{route('advertiser.register_adv')}}">
            @csrf
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="row justify-content-evenly">
                        <div class="col-md-6">
                            <div class="Rg_advts_bsc" id="publisher___form">
                                <h4 class="Rg_advts_bsc_ttls mb-4">Basic Information</h4>
                                <div class="form-group mb-3">
                                    <input type="text" id="company_name"  name="company_name" class="form-control Rg_advts_name rounded-0" placeholder="Company Name" >
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="full_name" name="name" name="text" class="form-control Rg_advts_name rounded-0" placeholder="Full Name">
                                </div>
                                <div class="form-group mb-3 custom-state">
                                    <select name="country" class="form-select rounded-0" id="country_id">
                                        <option value="">Select Country</option>
                                        @include('partials.country')
                                    </select>
                                </div>
                                <div class="Rg_advts_number">
                                    <div class="form-group mb-3">
                                        <select name="country_code" class="form-select rounded-0">
                                            @include('partials.country_code')
                                        </select>
                                        <input type="text" name="phone" id="your_phone" class="form-control Rg_advts_name rounded-0" placeholder="@lang('Your Phone Number')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="Rg_advts_bsc" id="advertiser___form">
                                <h4 class="Rg_advts_bsc_ttls mb-4">Lead Generation Information</h4>
                                <div class="Rg_advts_form">
                                    <div class="form-group mb-3">
                                        <textarea name="product_services" placeholder="Products or Services for which you want to generate leads" id="floatingTextarea"></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="Website" class="form-control Rg_advts_name rounded-0" placeholder="Website (Optional)">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="Social" class="form-control Rg_advts_name rounded-0" placeholder="Social media URL(Optional)">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="ad_budget" class="form-control Rg_advts_name rounded-0" placeholder="Ad Budget Per Month">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-0">
                            <div class="user_info_Rg_advts"><h4 class="Rg_advts_bsc_ttls mb-4">User Information</h4></div>
                        </div>
                        <div class="password-custom">
                            <div class="row justify-content-evenly">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="email" id="email" class="form-control Rg_advts_name rounded-0" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row g-md-2">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <input type="password" name="password" id="password" class="form-control Rg_advts_name rounded-0" placeholder="Password">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <input type="password" name="password_confirmation" id="confirm_password" class="form-control Rg_advts_name rounded-0" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4 mb-xl-0 mb-lg-0 mb-md-0 mb-sm-5 mb-5">
                                    <button type="submit" class="btn btn-secondary Rg_advts_my_btn">SIGN UP</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
 </section>
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
        FormValidation.formValidation(document.querySelector('#form'), {
            fields: {

                name: {
                    validators: {
                        notEmpty: {
                            message: 'Full Name is required.',
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
                company_name: {
                    validators: {
                        notEmpty: {
                            message: 'Company Name is required.',
                        },
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
                },
                product_services: {
                    validators: {
                        notEmpty: {
                            message: 'Lead Generation Information is required.',
                        },
                        stringLength: {
                            min: 5,
                            message: 'Please fill your Lead Generation Information in detail',
                        },
                    },
                },
                country: {
                    validators: {
                        notEmpty: {
                            message: 'Please Select Country.',
                        }
                    },
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill a stronger password.',
                        },
                        stringLength: {
                            min: 5,
                            message: 'Please fill a stronger password.',
                        },
                    },
                },
                password_confirmation: {
                    validators: {

                        identical: {
                            compare: function () {
                                return form.querySelector('[name="password"]').value;
                            },
                            message: 'The password and its confirm are not the same',
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
            document.querySelector('#form').submit();

        });

    });
</script>
@endpush
@push('style')
<style>
    .Rg_advts{  border-top: 3px solid #1361b2; background-color: #1a273a;  background-image: url("{{asset('assets/images/frontend')}}/bg connect.jpg"); background-position: center; background-size: cover;   padding-top: 50px; padding-bottom: 50px;}
    .Rg_advts .container{ max-width: 1200px; background-color: #fffffff0; padding-bottom: 60px;  border: 5px solid #1361b2; }
    #MainFooter { margin-top: 0!important; }
    /* ==== */

.Rg_advts .form-control.error select#country_id, .Rg_advts .form-control.success select#country_id {
    background: none !important;
}
  .custom_msg .fa-times, .custom_msg .fa-check, .Rg_advts .form-control.success small {
    display: none;
  }
  .Rg_advts .form-control {
    position: relative;
  }

.Rg_advts .form-group{ position: relative; }

.Rg_advts .form-group label{
    color:#777;
    display: block;
    margin-bottom: 5px;
}


.Rg_advts .form-group input:focus{
    outline: 0;
    border-color: #777;

}


.Rg_advts textarea, .Rg_advts textarea:hover {
    border:1px solid #94a1b5;
}
.Rg_advts textarea:focus-visible {
    outline: none;
}


.form button {
    cursor: pointer;
    /* background-color: #3498db;
    border: 2px solid #3498db;
    border-radius: 4px; */
    color: #fff;
    display: block;
    padding: 10px;
    font-size: 16px;
    margin-top:20px;
    width:100%;
}
    .Rg_advts {
        font-family: Poppins !important;
        font-weight: 200;
    }
    .Rg_advts .form-control:focus {
    border-color: #16C79A !important;
}
    .Rg_advts_form .custom-state.fv-plugins-icon-container.has-success .form-select {
        background: none !important;
    }
    .Rg_advts_bsc select, .Rg_advts_number select {
        border: 1px solid #94a1b5;
        background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
    }
    .Rg_advts_ttls {
        color: #1a273a;
        font-weight: bold;
        font-size: 52px;
        text-transform: uppercase;
        margin: 0;
    }
     .Rg_advts_ttls_1 {
        font-weight: bold;
        font-size: 38px;
        color: #1361b2;
        margin: 0;
    }
    @media (max-width: 768px){
        .Rg_advts_ttls {
        font-size: 36px;
    }
     .Rg_advts_ttls_1 {

        font-size: 28px;
    }
    }
    .user_info_Rg_advts h4,
    .Rg_advts_bsc .Rg_advts_bsc_ttls{
        font-size: 20px;
        line-height: normal;
        font-weight: 500;
    }

    .Rg_advts input {
        display: block;
        font-size: 19px;
        padding: 16px 24px;
        line-height: normal;
    }
    .Rg_advts_form select{
        font-size: 19px;
        padding: 16px 24px;
        border-radius: 0;
        line-height: normal;
    }
    .Rg_advts_form textarea {
    font-size: 19px;
    padding: 16px 24px;
    width: 100%;
    line-height: normal;
    max-height: 140px;
    height: 100%;
}

    .Rg_advts_number .form-group, .Rg_advts_number .form-control.error, .Rg_advts_number .form-control.success {
    display: flex;
    flex-wrap: wrap;
}
.Rg_advts_number select {
    flex: 0 0 25%;
    width: 25%;
}
.Rg_advts_number input {
    flex: 0 0 75%;
    width: 75%;
    border: 1px solid #94a1b5;
    font-size: 19px;
        line-height: normal;
    padding: 16px 24px;
}
.Rg_advts_form input:focus-visible {
    outline: none;
}

.Rg_advts .form-control, .Rg_advts_form select, .Rg_advts_number input {
    border: 1px solid #94a1b5;
    /* background: #f2f7ff; */
}
.Rg_advts .form-control:focus, .Rg_advts_form .form-select:focus {
       box-shadow: 0 0 20px rgb(0 0 0 / 16%);
    border: 1px solid #94a1b5 !important;
        transition: All .2s ease-in-out!important;

}
.Rg_advts .form-control.is-valid {
    border: 1px solid #94a1b5 !important;
}

.Rg_advts .form-control:valid:focus, .Rg_advts .form-control.is-valid:focus {
    box-shadow: none;
}
.Rg_advts_bsc textarea.form-control{
    min-height: 140px;
}
button.btn.btn-secondary.Rg_advts_my_btn {
    font-size: 24px;
    font-weight: 500;
    display: inline-block;
}
.Rg_advts_my_btn {
    width: 100%;
    max-width: 250px;
    height: 63px;
        line-height: normal;
}

.user_info_Rg_advts {
    padding-left: 15px;
}

.Rg_advts input, .Rg_advts select, .Rg_advts textarea {
    font-weight: 300;
}
.Rg_advts .form-group i {
    top: 10px;
    right: 10px;
}
.Rg_advts .form-group .fv-plugins-message-container {
    font-weight: 400;
}
.Rg_advts_bsc select {
    font-size: 19px;
    padding: 16px 24px;
    border-radius: 0;
    line-height: normal;
}

.fv-plugins-bootstrap .fv-help-block {
    font-size: 14px;
}
.was-validated .form-control:invalid,  .is-invalid {
    border-color: #e74c3c!important;
}
@media screen and (max-width: 480px){
    .Rg_advts_number input {
        flex: 0 0 70%;
        width: 70%;
    }
    .Rg_advts_number select.form-select {
        flex: 0 0 30%;
        width: 30%;
    }
}
</style>
@endpush
