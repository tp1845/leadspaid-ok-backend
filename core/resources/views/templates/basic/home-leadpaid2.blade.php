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
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
     <section class="MainBanner-Home">
        <div class="container">
            <div class="row align-item-center justify-content-center align-items-center">
                
                <div class="col-lg-12">
                    <h1 class="h1">Generate Leads Directly</h1>
                    <p>From High Ranking/ Authority Websites & Apps</p>
                    <a href="{{route('register_advertiser')}}" class="btn btn-secondary btn-lg my-2">Join As Advertiser</a>
                </div>
            </div>
        </div>
     </section>
     <section class="bg-secondary text-center text-white p-4 MainBanner-bottom" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <h3> Pay Only For Leads. Not for Clicks or Impressions</h3>
                </div>
            </div>
        </div>
     </section>
     <div class="marketing">
    <div class="container py-5 text-center">
       

        <div class="row pt-5 ">
      <div class="col-lg-4">
                    @if(Request::get('v') == 1 )
                        <img src="{{url('/')}}/assets/templates/leadpaid/images/banner-01.png?v1" class="img-fluid" alt="leadsPaid">
                    @else
                        <img src="{{url('/')}}/assets/templates/leadpaid/images/banner-02.png?v1" class="img-fluid" alt="leadsPaid">
                    @endif
                </div>



          <div class="col-lg-8">
           <div class="fw-normal-side">
                <h3 class="fw-normal mb-5">An Alternative Lead Source <br>
                <span>Distinct from Search, Display & Programmatic Ads</span></h3>
                <p class="text2">Get leads to your crm instead of buying website traffic through ppc, video or banner ads</p>
            <!-- <p class="text2">LeadsPaid.com <a href="">generate leads</a> compared to <br>buying traffic</p> -->
           </div>
            
          </div><!-- /.col-lg-8 -->
        
         
        </div><!-- /.row -->
    </div>
</div>
    <section class="Rg_advts">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 pt-4">
               <p class="Rg_advts_ttls mb-5">Register as Advertiser</p>
            </div>
        </div>
    <form class="Rg_advts_form" id="advertiser_form"  method="POST" action="{{route('advertiser.register_adv')}}">
        @csrf
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="row justify-content-evenly">
                    <div class="col-md-5">
                        <div class="Rg_advts_bsc" id="publisher___form">
                            <h4 class="Rg_advts_bsc_ttls mb-4">Basic Information</h4>

                                <div class="form-group mb-3">
                                   <input name="company_name" id="inputForm" type="text" value="" class="form-control Rg_advts_name rounded-0" placeholder="Company Name(Optional ) " aria-required="true" aria-invalid="false" required>
                               </div>
                               <div class="form-group mb-3">
                                    <input name="name" id="inputForm" type="text" value="" class="form-control Rg_advts_name rounded-0" placeholder="Full Name" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="form-group mb-3 custom-state">
                                    <select class="form-select rounded-0" name="country" aria-label="Default select example">
                                      <option value="">Select Country</option>
                                       @include('partials.country')
                                    </select>
                                </div>
                                <div class="Rg_advts_number">
                                    <div class="form-group mb-3">
                                    <select class="form-select rounded-0" name="country_code" aria-label="Default select example">
                                       @include('partials.country_code')
                                    </select>

                                    <input name="phone" id="inputNumber" type="text" value="" class=" Rg_advts_name rounded-0" name="phone" placeholder="@lang('Your Phone Number')" aria-required="true" aria-invalid="false" required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="Rg_advts_bsc" id="advertiser___form">
                            <h4 class="Rg_advts_bsc_ttls mb-4">Lead Generation Information</h4>

                           <div class="Rg_advts_form">
                               <div class="form-group mb-3">
                               <textarea class="form-control Rg_advts_name rounded-0" name="product_services" placeholder="Products or Services for which you want to generate leads" id="floatingTextarea" required></textarea>
                           </div>
                               <div class="form-group mb-3">
                                    <input name="Website" id="inputForm" type="text" value="" class="form-control Rg_advts_name rounded-0" placeholder="Website (Optional) " aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group mb-3">
                                     <input name="Social" id="inputForm" type="text" value="" class="form-control Rg_advts_name rounded-0" placeholder="Social media URL(Optional) " aria-required="true" aria-invalid="false">
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="row justify-content-evenly">
                    <div class="col-11">
                        <div class="user_info_Rg_advts"><h4 class="Rg_advts_bsc_ttls mb-4">User Information</h4></div>
                    </div>
                </div>
                <div class="password-custom">
                    <div class="row justify-content-evenly">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <input name="email" id="inputForm" type="email" value="" class="form-control rounded-0 Rg_advts_name" placeholder="Email Address " aria-required="true" aria-invalid="false" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                     <input name="password" id="inputForm" type="password" value="" class="rounded-0 form-control Rg_advts_name" placeholder="Password " aria-required="true" aria-invalid="false" required>
                                 </div>
                             </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                     <input name="password_confirmation" id="inputFormc" type="password" value="" class="form-control rounded-0 Rg_advts_name" placeholder="Confirm Password " aria-required="true" aria-invalid="false" required>
                                 </div>
                             </div>
                         </div>
                         </div>
                         <div class="col-md-7 ms-auto mt-4 mb-xl-0 mb-lg-0 mb-md-0 mb-sm-5 mb-5">
                             <button type="submit" class="btn btn-secondary Rg_advts_my_btn">SIGN UP</button>
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
  <script src="https://formvalidation.io/vendors/formvalidation/dist/js/FormValidation.min.js"></script>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://formvalidation.io/vendors/formvalidation/dist/js/plugins/Bootstrap.min.js"></script>   

     @endpush

     @push('script')
<script>
    "use strict";
   



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
                            message: 'Full Name Invalid.',
                        },
                    },
               
                },

                phone: {
                       validators: {
                        notEmpty: {
                            message: 'Please fill Phone Number.',
                        },
                        stringLength: {
                            min: 6,
                            message: 'Please fill Phone Number.',
                        },
                    },
                },
              
                country: {
                    validators: {
                        notEmpty: {
                            message: 'Select Country.',
                        }
                    },
                },
                product_services: {
                      validators: {
                        notEmpty: {
                            message: 'Please fill product or services.',
                        },
                        stringLength: {
                            min: 20,
                            message: 'Please fill product or services in detail.',
                        },
                    },
                },
                 email: {
                     validators: {
                        notEmpty: {
                            message: 'Please fill valid email address (will be used as username to login)',
                        },
                        emailAddress: {
                            message: 'Please fill valid email address (will be used as username to login)',
                        },
                    },
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Password',
                        },
                        stringLength: {
                            min: 6,
                            message: 'Please fill minimum 6 characters',
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
            document.querySelector('#advertiser_form').submit();

        });
        
    });
</script>
@endpush
<style>
body {
    background: #e0e0e0 !important;
    font-family: Poppins !important;
}
p, h1, h2, h3, h4, h5, h5, h6, .btn {    
    font-family: Poppins !important
}
.MainBanner-Home {
 font-family: Poppins !important;   
}
.Rg_advts .form-control.is-valid {
    border: 1px solid #94a1b5 !important;
}
.Rg_advts .was-validated .form-control:valid, .Rg_advts .form-control.is-valid {
    border-color: #94a1b5 !important;
}
.fw-normal span {
    font-size: 34px;
    color: #1361b2;
    font-weight: 600;
    padding-top: 10px;
    display: inline-block;
}
.fw-normal{
    color: #1361b2;
}

.fw-normal-side {
    display: flex;
    flex-wrap: wrap;
/*    justify-content: center;*/
    height: 100%;
    align-items: stretch;
    align-content: space-around;
}
.MainBanner-Home {
    background-color: #1a273a;
    color: #fff;
    text-align: center;
    padding: 50px 0;
    min-height: 75vh;
    display: flex;
    align-items: center;
}
.MainBanner-Home p {
    font-size: 22px !important;
    font-weight: 300;
}
.marketing  h3.fw-normal.mb-5 {
    font-size: 47px;
    font-weight: 500 !important;
}
.text2 a:hover {
    color: #6c6c6c;
}
.text2 a {
    color: #6c6c6c;
}
.text2 {
    text-align: left;
    font-size: 26px;
    color: #6c6c6c;
}

.MainBanner-Home .btn {
    max-width: unset !important;
    width: unset !important;
    font-size: 48px !important;
    margin-top: 30px !important;
}
.Rg_advts {
        font-family: Poppins !important;
        font-weight: 200;
        background:#fff;
    }
    .Rg_advts .form-control:focus {
    border-color: #16C79A !important;
}
    .Rg_advts_form .custom-state.fv-plugins-icon-container.has-success .form-select {
        background: none !important;
    }
    .Rg_advts_number .form-select, .Rg_advts_form .form-select {
    background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
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
.Rg_advts .form-control:focus, .Rg_advts_form .form-select:focus, .Rg_advts .was-validated .form-control:valid, .Rg_advts .form-control.is-valid {
       box-shadow: 0 0 20px rgb(0 0 0 / 16%);
        border: 1px solid #94a1b5 !important;
        transition: All .2s ease-in-out!important;
   
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
.Rg_advts form {
    margin: 0;
    padding-bottom:50px;
}
#MainFooter {
    margin-top: 0 !important;
}

@media only screen and (min-width: 768px) {
.MainBanner-Home .h1 {
    font-size: 81px !important;
    font-family: Poppins !important
}
.MainBanner-Home p {
    font-size: 36px !important;
    font-weight: 300;
}

.MainBanner-Home .btn {
    font-size: 35px !important;
    padding-right: 35px;
    padding-left: 35px;
    display: inline-block;
}
    }
@media only screen and (max-width: 768px) {
    .MainBanner-Home .btn {
        font-size: 35px !important;
        padding-right: 35px;
        padding-left: 35px;
    }
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