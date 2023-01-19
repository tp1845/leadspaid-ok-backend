@extends('admin.layouts.app')

@section('panel')

<div class="row mb-none-30">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <form action="{{ route('admin.save-users')}}" method="POST" id="advertiser_form">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                        	<div class="form-group col-md-6">
                        		<label class="">@lang('Role')</label>	
                            	<select class="custom-select rounded-0 mr-sm-2 form-control"  name="role">                                    
                                   <option value="">Select Role</option>
                                    <option value="1">Publisher_Admin</option>
                                    <option value="2">Campaign Manager</option>
                                    <option value="3">Campaign executive</option>
                                     <option value="0">Normal Publisher </option>
                                      <option value="4">Admin </option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                            	<label class="">@lang('Company Name')</label>
                              <select name="company_name" class="form-control" >
                                  <option value="Leads Paid Inc.">Leads Paid Inc. </option>
                              </select>

                                
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">@lang('Name') <sup class="text-danger">*</sup></label>
                                <input type="text" id="full_name" name="name" placeholder="Name" class="Rg_advts_name form-control rounded-0" value="" onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode  == 32">
                            </div>
                            <div class="form-group col-md-6">
                            	<label class="">@lang('Country') <sup class="text-danger">*</sup></label>
                            	<select class="custom-select rounded-0 mr-sm-2 form-control"  name="country"> 
                            	<option value="">Select country</option>                                   
                                   @foreach ($countries as $country)
                                        <option 
                                            value=" {{ $country->country_name }} " label=" {{
                                                        $country->country_name }}" @if($country->country_name=="Singapore") selected @endif>
                                                    {{ $country->country_name }}
                                                </option>
                                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">@lang('Email ID (User Name)') <sup class="text-danger">*</sup></label>
                                <input type="text" id="email" name="email" placeholder="Email id" class="form-control Rg_advts_name rounded-0" value="@leadspaid.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">@lang('Password') <sup class="text-danger">*</sup></label>
                                <input type="text" id="password" name="password" placeholder="Password" class="form-control Rg_advts_name rounded-0" value="">
                            </div>
                            <div class="col-md-6 form-group">
                            	<div class="form-group country-code">
	                                <label class="">@lang('Mobile') <sup class="text-danger">*</sup></label>
	                                <div class="Rg_advts_number">
	                                    <select name="country_code" class="country_code  form-select rounded-0">
                                        
	                                @include('partials.country_code')
	                                </select>
	                                    <input type="text" name="mobile" value="" class="form-control rounded-0" placeholder="@lang('Your Phone Number')">
	                                </div>
	                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="box--shadow1 rounded-0 btn btn--primary btn-lg text--small Rg_advts_my_btn">@lang('Create User')</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



@endsection
<style>
	#advertiser_form .form-group input:focus, #advertiser_form .form-group select:focus, #advertiser_form .form-group .form-control:focus {
    border: 1px solid #ced4da;
    box-shadow: none;
}
#advertiser_form .form-group .was-validated #advertiser_form .form-group .form-control:invalid, #advertiser_form .form-group .form-control.is-invalid {
    border-color: #dc3545;
    padding-right: calc(1.5em + .75rem);
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(.375em + .1875rem) center;
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
}
	#advertiser_form .Rg_advts_my_btn {
    font-size: 18px !important;
    padding: .375rem .75rem;
    background-color: #4500dd!important;
    font-weight: 500;
}
#advertiser_form .form-group label {
    font-size: 14px;
}
.Rg_advts_number {
    display: flex;
    flex-wrap: wrap;
}
.Rg_advts_number select {
    flex: 0 0 30%;
    width: 30%;
    border: 1px solid #ced4da;
}
.Rg_advts_number input {
    flex: 0 0 70%;
    width: 70%;
}

#advertiser_form .form-group select, #advertiser_form .form-group input {
    background: #fff;
    display: block;
    font-size: 19px !important;
    padding: 16px 24px;
    line-height: normal;
    height: unset;
}
#advertiser_form .form-group select {
    background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
    appearance: none;
}
.Rg_advts_number .form-select {
    background: #f1f1f2 url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/15px 10px !important;
    appearance: none;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #ccc !important;
}
</style>

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

   $(".country_code").val('+65');


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
            company_name: { required: true},
            country: { required: true},
            email: { required: true,valid_email:true},
            role: {required: true},
            password: {required: true,minlength: 6},
            mobile: {required: true,minlength: 6}
           
        },messages: {
            name:{  required : 'Full Name is required.', minlength:'minmum 3 characters.', lettersonly:'Full Name Invalid.' },
            company_name:{  required : 'Company Name is required.'
             },
            email:{  required : 'Please enter a valid email address.' },
            password:{  required : 'Password is required.' },
            role: { required : 'Select a User Role.',minlength: 'minmum 6 characters.'},
             mobile:{ required: ' '} 

        }
    });


$(document).ready(()=>{
      $('#form_company_logo').change(function(){
        const file = this.files[0];
        ;
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            $(".image_preview").show();
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });

 
  
</script>

@endpush