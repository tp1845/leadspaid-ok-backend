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
            <div class="col-lg-12 mb-5" >
                <p class="Rg_advts_ttls_1 pt-5">Generate Leads Now!</p>
                <p class="Rg_advts_ttls">REGISTER AS ADVERTISER</p>
                <div class="w-75 m-auto" id="errors_message"></div>
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
                                    <input type="text" id="company_name"  name="company_name" value="{{old('company_name')}}" class="form-control Rg_advts_name rounded-0"  placeholder="Company Name" >
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="full_name" name="name" value="{{old('name')}}" class="form-control Rg_advts_name rounded-0" placeholder="Full Name">
                                </div>
                                <div class="form-group mb-3 custom-state">
                                    <select name="country" class="form-select rounded-0" id="country_id">
                                        <option value="">Select Country</option>
                                        @include('partials.country')
                                    </select>
                                </div>
                                <div class="Rg_advts_number">
                                    <div class="form-group mb-3">
                                        <select name="country_code" class="form-select country_code rounded-0">
                                            @include('partials.country_code')
                                        </select>
                                        <input type="text" name="phone" value="{{old('phone')}}" id="your_phone" class="form-control Rg_advts_name rounded-0" placeholder="@lang('Your Phone Number')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="Rg_advts_bsc" id="advertiser___form">
                                <h4 class="Rg_advts_bsc_ttls mb-4">Lead Generation Information</h4>
                                <div class="Rg_advts_form">
                                    <div class="form-group mb-3">
                                        <textarea name="product_services"  placeholder="Products or Services for which you want to generate leads" id="floatingTextarea">{{old('product_services')}}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="Website" value="{{old('Website')}}" class="form-control Rg_advts_name rounded-0" placeholder="Website (Optional)">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="Social" value="{{old('Social')}}" class="form-control Rg_advts_name rounded-0" placeholder="Social media URL(Optional)">
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="us_doller">
                                            <input type="text" name="ad_budget" value="{{old('ad_budget')}}" id="ad_budget" class="form-control Rg_advts_name rounded-0" placeholder="Ad Budget Per Month">
                                        </div>
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
                                                <input type="text" name="email" value="{{old('email')}}"  id="email" class="form-control Rg_advts_name rounded-0" placeholder="Email Address">
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
                                    <p><small>I agree to your privacy policy and terms of use by submitting this form.</small></p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
@endpush
@push('script')
@include('templates.basic.partials.show-errors');
<script>
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
    jQuery.validator.addMethod("website", function(value, element) {
    return this.optional(element) || /^([^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/i.test(value);
    }, "Please enter a valid Website");


    $("#form").validate({
        rules: {
            name: { required: true,minlength: 3, lettersonly: true },
            company_name: { required: true, minlength: 3},
            country: { required: true},
            phone: { required: true, minlength: 6, phoneonly: true },
            email: { required: true,  valid_email:true  },
            product_services: { required: true},
            Website: { website: true },
            Social: { website: true },
            ad_budget: { required: true,  numbersonly: true, min:1000 },
            password: { required: true, minlength: 6,    },
            password_confirmation: { equalTo: "#password" }
        },messages: {
            name:{  required : 'Full Name is required.', minlength:'Please fill Full Name.', lettersonly:'Full Name Invalid.' },
            company_name:{  required : 'Company Name is required.', minlength:'Please fill Full Company Name.' },
            phone:{  required : 'Phone is required.', minlength:'Please enter valid phone.', phoneonly:'Please enter valid phone.'},
            email:{  required : 'email is required.'},
            product_services:{  required : 'Lead Generation Information is required.', minlength:'Please fill your Lead Generation Information in detail.', },
            Website:{  website:'Please valid Website url.'  },
            Social:{   website:'Please valid Social url.' },
            ad_budget:{  required : 'Ad Budget is required.', numbersonly:'Please enter valid Ad Budget.', min: 'Ad Budget per month should be at least $1000.' },
            password:{  required : 'Please fill a stronger password.',  minlength : 'Please fill a stronger password.',  },
            password_confirmation:{  required : 'The password and its confirm are not the same.', equalTo: 'The password and its confirm are not the same.'}

        }
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
    }
    .Rg_advts .form-control:focus {
    border-color: #16C79A !important;
}
    .Rg_advts_form .custom-state.fv-plugins-icon-container.has-success .form-select {
        background: none !important;
    }
    .Rg_advts_bsc select, .Rg_advts_number select {
        border: 1px solid #94a1b5;
        background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
    }
    .form-select.country_code {
        background: #f1f1f2 url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
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
    font-size: 28px;
    font-weight: 700;
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

    .us_doller {  position: relative; }
    .us_doller input {
        padding-left: 27% !important;
    }
    .us_doller:after {
        width: 25%;
        text-align: center;
        content: 'US$';
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: rgb(33 37 41 / 80%);
        left: 0;
        background: #f1f1f2;
        font-size: 19px;
        height: 100%;
        line-height: 2.1;
        border: 1px solid #94a1b5;
        padding: 10px;
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
