@extends($activeTemplate.'layouts.publisher.frontend')
@section('panel')
<section >
    <div class="container">
        <div class="account-area">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="profile account-wrapper">
                        <div class="tab-content mt-5" id="myTabContent">
                            <form method="POST" id="publisher_form" action="{{route('publisher.profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="mb-4 col-md-6" style="overflow: inherit;">
                                    <div class="form_subtitle"> Basic Information </div>
                                    <div class="card-body px-0">
                                        <div class="form-group ">
                                            <label>@lang('Company Name')</label>
                                            <input type="text" class="form-control" name="company_name" value="{{ $publisher->company_name }}" placeholder="Company Name">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('Full Name') <sup class="text-danger">*</sup></label>
                                            <input type="text" name="name" placeholder="Full Name" class="form-control" value="{{$publisher->name}}" required>
                                        </div>
                                        <div class="form-group country-code">
                                            <label>@lang('Phone') <sup class="text-danger">*</sup></label>
                                            <input type="text" name="phone" value="{{$publisher->phone}}" class="form-control" required placeholder="@lang('Your Phone Number')">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 col-md-6">
                                    <div class="form_subtitle"> Address Information </div>
                                    <div class="card-body px-0">
                                        <div class="form-group">
                                            <label>@lang('Billing Email Address') <sup class="text-danger">*</sup></label>
                                            <input type="email" name="email" placeholder="Billing Email address" class="form-control" value="{{$publisher->email}}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="City" name="city" class="form-control" value="{{$publisher->city}}" required>
                                        </div>

                                        <div class="form-group">
                                            <select class="custom-select mr-sm-2 form-control" value="{{$publisher->country}}" required name="country">
                                                @foreach ($countries as $country)
                                                <option @if($publisher->country === $country->country_name)
                                                    selected="selected" @endif
                                                    value=" {{ $country->country_name }} " label=" {{
                                                        $country->country_name }} ">
                                                    {{ $country->country_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Postal Code" name="postal_code" class="form-control" value="{{$publisher->postal_code}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form_subtitle"> User Information  </div>
                                    <div class="card-body px-0 pt-1">
                                        <div class="form-group">
                                            <label>@lang('Username') <sup class="text-danger">*</sup></label>
                                            <input type="text" name="username" placeholder="User Name" class="form-control" readonly value="{{$publisher->username}}" required>
                                        </div>
                                    </div>
                                    @include($activeTemplate.'partials.custom-captcha')
                                    <div class="form-group row">
                                        <div class="col-md-12 ">
                                            @php echo recaptcha() @endphp
                                        </div>
                                    </div>
                                    <button type="submit" class="box--shadow1 rounded-0 btn btn--primary btn-lg text--small Rg_advts_my_btn">@lang('Update Profile')</button>
                                </div>
                                <div class="col-md-6">

                                    <div class="upload_btn_spc">
                                        <div class="font-weight-bolder text-body"> Upload Profile Logo
                                    </div>

                                <div class="form-group">
                                    <div class="card-bodys px-0 pt-1 my-upload-btns">
                                        <div class="upload-box" style="height: 53px; ">
                                            <input type="file" name="image" id="form_company_logo" class="inputfile inputfile-1" accept="image/jpeg, image/png">
                                            <label for="form_company_logo" class="profile_company_logo" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload Profile Logo*</span> </label>
                                            </div>

                                       <div class="image_preview" style="">
                                              @php
                                            $imge_url='';
                                            if(empty(auth()->guard('publisher')->user()->image)){
                                             $imge_url=get_image('assets/images/profile/user.png');
                                            }else{
                                             $imge_url=get_image('assets/publisher/images/profile/'. auth()->guard('publisher')->user()->image);
                                            }
                                            @endphp
                                           <img src="{{ $imge_url }}" id="imgPreview">
                                       </div>

                                    </div>
                                </div>
                                    </div>
                                    @include($activeTemplate.'partials.custom-captcha')
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
    <a href="{{route('publisher.password')}}" class="profile_pass_setting rounded-0 btn btn-sm btn--primary box--shadow1 text--small" ><i class="fa fa-key"></i>@lang('Change Password')</a>
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script>

    "use strict";
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

    $("#publisher_form").validate({
        rules: {
            name: { required: true,minlength: 3, lettersonly: true },
            company_name: { required: true, minlength: 3},
            country: { required: true},
            phone: { required: true, minlength: 6, phoneonly: true },
            postal_code: { required: false, maxlength: 200  },
           city: { required: true, minlength: 3, maxlength: 50 },
           billed_to: { required: true, minlength: 10, maxlength: 100 },
           image: {extension: "png|jpg|jpeg|gif", maxsize:1e+6}
        },messages: {
            name:{  required : 'Full Name is required.', minlength:'minmum 3 characters.', lettersonly:'Full Name Invalid.' },
            company_name:{  required : 'Company Name is required.', minlength:'minmum 3 characters.' },
            mobile:{  required : 'Phone is required.', minlength:'minmum 6 characters.', phoneonly:'Please enter valid phone.'},
            postal_code: {maxlength: 'maximum 200 characters.'},
            city: {required : 'Please fill valid City.',minlength:'minmum 3 characters.', maxlength: 'maximum 50 characters.'},
            billed_to: {required:'Please fill valid address',minlength: 'minmum 10 characters.' ,maxlength: 'maximum 100 characters.'},
            image: "File must be JPG, GIF or PNG, less than 1MB",
        }
    });

</script>
@endpush
@push('style')
<style type="text/css">
    #publisher_form .form-group input{
        background: #fff;
        display: block;
        font-size: 19px !important;
        padding: 16px 24px;
        line-height: normal;
        height: unset;
        border-radius: 0!important;
    }
    .form_subtitle{
        font-size: 16px;
        color: #212529!important;
        font-weight: bolder!important;
        font-family: 'Roboto', Helvetica, sans-serif, 'Open Sans', Arial;
    }

    #publisher_form .Rg_advts_my_btn {
    font-size: 18px !important;
    padding: 0.375rem 0.75rem;
    background-color: #4500dd!important;
    font-weight: 500;
}
.profile_pass_setting {
    font-size: 18px !important;
    padding: 0.375rem 0.75rem;
}

#publisher_form .form-group select {
    display: block;
    font-size: 19px !important;
    padding: 16px 24px;
    line-height: normal;
    height: unset;
    text-transform: capitalize;
    background: #fff url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e) no-repeat right 0.75rem center/30px 10px !important;
}


.my-upload-btns input {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
.my-upload-btns .profile_company_logo {
    color: #004664;
    background-color: #ddf5ff;
    max-width: 100%;
    font-size: 1.15rem;
    font-weight: 400;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.8rem 1.25rem;
    margin: 0!important;
    border: 1px solid #94a1b5!important;
}
.upload_btn_spc {
    margin-top: 35px;
}
.my-upload-btns {
    position: relative;
    vertical-align: middle;
    display: flex;
}
.my-upload-btns .upload-box {
    margin-right: 15px;
}
.my-upload-btns .image_preview {
    width: 54px;
     border-radius: 50%;
    object-fit: cover;
    overflow: hidden;
}
.my-upload-btns .image_preview img{
    height: 50px;
    width: 60px;
}
</style>
@endpush
