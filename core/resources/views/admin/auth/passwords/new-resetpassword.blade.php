@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper default-version">
        <div class="form-area bg_img" data-background="{{asset('assets/admin/images/1.jpg')}}">
            <div class="form-wrapper">
                <h4 class="logo-text mb-15"><strong>@lang('Reset Password')</strong></h4>
                <form action="{{ route('admin.password/update') }}" method="POST" class="cmn-form mt-30" id="resetpasword">
                    @csrf

                    <input type="hidden" name="id" value="{{ $id }}">
                    
                    <div class="form-group">
                        <label for="pass">@lang('Old Password')</label>
                        <input type="password" name="old_password" class="form-control b-radius--capsule" id="oldpassword" placeholder="@lang('New password')">
                        <i class="las la-lock input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="pass">@lang('New Password')</label>
                        <input type="password" name="new_password" class="form-control b-radius--capsule" id="new_password" placeholder="@lang('New password')">
                        <i class="las la-lock input-icon"></i>
                    </div>
                    

                    <div class="form-group d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.login') }}" class="text-muted text--small"><i class="las la-lock"></i>@lang('Login Here')</a>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Reset Password') <i class="las la-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>
        </div><!-- login-area end -->
    </div>



@endsection
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

    jQuery.validator.addMethod('validate_password',function(value,element){
         
        if($("#oldpassword").val() ==value){
        	
         return false;
        }else{
        	return true;
        }
    },"New password should not be same as old password")


   

 $("#resetpasword").validate({
        rules: {
            old_password: { required: true,minlength: 6 },
            new_password: { required: true,minlength: 6,validate_password: true}
           
        },messages: {
            old_password:{  required : 'Old Password is required.', minlength:'Password  set a stronger password', lettersonly:'Full Name Invalid.' },
            new_password:{  required : 'New Password is required.',minlength:'Password  set a stronger password'}
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