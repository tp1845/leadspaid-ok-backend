@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
    <div class="container-fluid" id="ticket-create">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg--primary">

                        <a href="{{route('ticket') }}" class="btn btn-sm btn--dark float-right">
                            @lang('My Support Ticket')
                        </a>
                    </div>

                    <div class="card-body">

                        <form  action="{{route('ticket.store')}}"  method="post" enctype="multipart/form-data" id="advertiser_form" onsubmit="return submitUserForm();">
                            @csrf
                            <div class="row ">
                                <div class="form-group col-md-6">
                                    <label for="name">@lang('Name')</label>
                                    <input type="text"  name="name" value="{{@$user->name}}" class="form-control form-control-lg rounded-0" placeholder="@lang('Enter Name')" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">@lang('Email address')</label>
                                    <input type="email"  name="email" value="{{@$user->email}}" class="form-control form-control-lg rounded-0" placeholder="@lang('Enter your Email')" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">@lang('Company Name')</label>
                                    <input type="text"  name="name" value="{{@$user->name}}" class="form-control form-control-lg rounded-0" placeholder="@lang('Enter Name')" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">@lang('Phone Number')</label>

                                    <div class="Rg_advts_number">
                                        <select name="country_code" class="country_code  form-select rounded-0">
                                        @include('partials.country_code')
                                        </select>
                                        <input type="text" name="mobile" value="{{auth()->guard('advertiser')->user()->mobile}}" class="form-control rounded-0" placeholder="@lang('Your Phone Number')">
                                    </div>
                                    <!-- <input type="email"  name="email" value="{{@$user->email}}" class="form-control form-control-lg rounded-0" placeholder="@lang('Enter your Email')" required> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="website">@lang('What is your enquiry about?')</label>
                                            <select class="custom-select rounded-0 mr-sm-2 form-control"  name="subject" aria-invalid="false">
                                                <option value=" United States " label=" United States ">
                                                Campaign | Unable to Crete Campaign
                                                </option>
                                                <option value=" Canada " label=" Canada ">
                                                Payments | Unable to add Billing Method
                                                </option>
                                                <option value=" Afghanistan " label=" Afghanistan ">
                                                Payments | Billing Enquiry
                                                </option>
                                                <option value=" Albania " label=" Albania ">
                                                Edit Profile | Difficulty in editing profile
                                                </option>
                                            </select>

                                            <!-- <input type="text" name="subject" value="{{old('subject')}}" class="form-control form-control-lg rounded-0" placeholder="@lang('Subject')" > -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="inputMessage">@lang('Message')</label>
                                            <textarea name="message" id="inputMessage" rows="6" class="form-control form-control-lg rounded-0">{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="file-upload">
                                                        <label for="inputAttachments">@lang('Attachments')</label>
                                                        <div class="file-upload-wrapper" data-text="Select your file!">
                                                            <input type="file" name="attachments[]" id="inputAttachments" class="file-upload-field">
                                                        </div>
                                                        <div id="fileUploadsContainer"></div>
                                                        <p class="ticket-attachments-message text-muted">
                                                            @lang("Allowed File Extensions: .jpg, .jpeg, .png, .pdf, .doc, .docx")
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-4 text-right">
                                                    <button type="button" class="btn btn--primary btn-sm mt-4" onclick="extraTicketAttachment()">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <div class="row form-group justify-content-center">
                                <div class="col-md-12">
                                    <button class="btn btn--primary Rg_advts_my_btn rounded-0" type="submit" id="recaptcha" ><i class="fa fa-paper-plane"></i>&nbsp;@lang('Create Support Ticket')</button>
                                    <!-- <button class=" btn btn-danger" type="button" onclick="formReset()">&nbsp;@lang('Cancel')</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>

</script>

<style>
    
    #ticket-create .bg--primary, #ticket-create form .btn--primary, #ticket-create form .file-upload-wrapper:before {
    background-color: #4500dd!important;
}   
#ticket-create .form-group input, #ticket-create .form-group select {
    background: #fff;
    display: block;
    font-size: 19px !important;
    padding: 16px 24px;
    line-height: normal;
    height: unset;
}
#ticket-create .file-upload-wrapper:before {
    line-height: 63px;
    border-radius: 0;
}
#ticket-create .file-upload-wrapper:after {
    line-height: 63px;
    border-radius: 0px;
}
#ticket-create .file-upload-wrapper {
    height: 63px;
}
#ticket-create .form-group input:focus, #ticket-create .form-group select:focus, #ticket-create .form-group .form-control:focus {
    border: 1px solid #ced4da;
    box-shadow: none;
}
#ticket-create .form-group select {
    background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
        appearance: none;
}
#ticket-create .Rg_advts_my_btn {
    font-size: 18px !important;
    padding: .375rem .75rem;
    background-color: #4500dd!important;
    font-weight: 500;
}
#ticket-create .form-group .was-validated #ticket-create .form-group .form-control:invalid, #ticket-create .form-group .form-control.is-invalid {
    border-color: #dc3545;
    padding-right: calc(1.5em + .75rem);
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(.375em + .1875rem) center;
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
}
.Rg_advts_number {
    display: flex;
    flex-wrap: wrap;
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

</style>
@push('script')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script>
        'use strict'
        function extraTicketAttachment() {
            $("#fileUploadsContainer").append(`<div class="file-upload-wrapper" data-text="Select your file!">
                                                    <input type="file" name="attachments[]" id="inputAttachments" class="file-upload-field">
                                                </div>`)
        }
        function formReset() {
            window.location.href = "{{url()->current()}}"
        }


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
            mobile: { required: true, minlength: 6, phoneonly: true },
            message: { required: true  },
            subject: { required: true}
        },messages: {
            name:{  required : 'Full Name is requiredired.', minlength:'minmum 3 characters.', lettersonly:'Full Name Invalid.' },
            company_name:{  required : 'Company Name is required.', minlength:'minmum 3 characters.' },
            mobile:{  required : 'Phone is required.', minlength:'minmum 6 characters.', phoneonly:'Please enter valid phone.'},
            message: {required: 'Message  is required.'},
          
            subject: {required:'Please select  valid subject'}
           

        }
    });

    </script>
@endpush
