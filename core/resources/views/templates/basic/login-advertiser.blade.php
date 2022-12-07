@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://leadspaid.com/assets/templates/basic/css/all.min.css"> -->
<section class="Rg_advts">
    <div class="container">
        
        <div class="row text-center">
            <div class="col-lg-12 pt-4">
               <p class="Rg_advts_ttls mb-5">Advertiser Login</p>
            </div>
        </div>
                                    <form class="account-form" id="login_form" method="POST" action="{{ route('advertiser.login')}}" onsubmit="return submitUserForm()">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="mb-2">@lang('Username/Email Address')<sup class="text-danger">*</sup></label>
                                            <input type="text" name="username" placeholder="@lang('Username')" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="mb-2">@lang('Password') <sup class="text-danger">*</sup></label>
                                            <input type="password" name="password" placeholder="@lang('Password')" class="form-control" required>
                                        </div>
                                        @include($activeTemplate.'partials.custom-captcha')
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                @php echo recaptcha() @endphp
                                            </div>
                                        </div>
                                        <div class="col-md-7 ms-auto mt-4 mb-xl-0 mb-lg-0 mb-md-0 mb-sm-5 mb-5">
                                        <button type="submit" class="cmn-btn ">@lang('Login Now')</button>
                                        </div>

                                       
                                        <div class="custom-forgot mt-4 mb-4 mb-sm-5 d-flex justify-content-between align-items-center">
                                            <a href="{{route('advertiser.password.reset')}}">@lang('Forgot Password?')</a>
                                            <a href="{{route('register_advertiser')}}">@lang('Don\'t have any account?')</a>
                                        </div>
                                    </form>
                                  
    </div>
 </section>
    


   
@endsection

@push('script-lib')
<script src="{{asset('assets/templates/basic')}}/js/vendor/particles.js"></script>
<script src="{{asset('assets/templates/basic')}}/js/vendor/app.js"></script> 
  <script src="https://formvalidation.io/vendors/formvalidation/dist/js/FormValidation.min.js"></script>
  <script src="https://formvalidation.io/vendors/formvalidation/dist/js/FormValidation.min.js"></script>

  <script src="{{asset('assets/templates/basic')}}/js/vendor/all-icons.js"></script> 
  <script src="https://formvalidation.io/vendors/formvalidation/dist/js/plugins/Bootstrap.min.js"></script>   

@endpush

@push('script')
<script>


    function submitUserForm() {
        var response = grecaptcha.getResponse();
        if (response.length == 0) {
            document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">@lang("Captcha field is required.")</span>';
            return false;
        }
        return true;
    }

    function verifyCaptcha() {
        document.getElementById('g-recaptcha-error').innerHTML = '';
    }


    document.addEventListener('DOMContentLoaded', function(e) {

        FormValidation.formValidation(document.querySelector('#login_form'), {
            fields: {
             
                username: {
                     validators: {
                        notEmpty: {
                            message: 'Please fill Username/Email Address.',
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
            document.querySelector('#login_form').submit();

        });
        
    });
</script>
@endpush
<style>
    
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
    .Rg_advts_number .form-select, .Rg_advts_form .form-select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
    }
    .Rg_advts_ttls {
        color: #1361b2;
        font-family: Poppins !important;
        font-weight: 600;
        font-size: 38px;
        letter-spacing: 1px;
    }
     .Rg_advts_ttls_1 {
        
        font-family: Poppins !important;
        font-weight: 600;
        font-size: 63px;
        letter-spacing: 1px;
        color: #cccdcc;
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
        line-height: normal;
    }

.Rg_advts_number .form-group {
    display: flex;
    flex-wrap: wrap;
}
.Rg_advts_number select.form-select {
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
.Rg_advts .was-validated .form-control:valid, .Rg_advts .form-control.is-valid {
    border-color: #94a1b5 !important;
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
}
.Rg_advts_my_btn {
    width: 100%;
    max-width: 250px;
    height: 63px;
        line-height: normal;
}
.Rg_advts input::placeholder {
  
}

.Rg_advts input:-ms-input-placeholder { /* Internet Explorer 10-11 */

}

.Rg_advts input::-ms-input-placeholder { /* Microsoft Edge */

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
button.cmn-btn {
    font-size: 24px;
    font-weight: 500;
} 
button.cmn-btn {
    width: 100%;
    max-width: 250px;
    height: 63px;
    line-height: normal;
    background-color: #1361b2;
    color: #fff;
    border: none;
}
button.cmn-btn:hover{
    background-color: #105297;
}
.account-form input.form-control{
    border-radius: 0;
}
.Rg_advts .form-group label {
    font-size: 20px;
    font-weight: 500;
    line-height:normal;
    color:#212529;
}
.custom-forgot a {
    font-weight: 500;
    color:#212529;
}
.Rg_advts .form-group i {
    top: 50px !important;
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



