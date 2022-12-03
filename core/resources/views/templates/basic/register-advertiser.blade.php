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

<section class="Rg_advts">
    <div class="container">
	 <div class="row text-center">
            <div class="col-lg-12 pt-5">
               <p class="Rg_advts_ttls_1">Generate Leads Now</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-12 pt-5">
               <p class="Rg_advts_ttls mb-5">Register as an Advertiser</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="row justify-content-evenly">
            <div class="col-md-5">
                <div class="Rg_advts_bsc">
                    <h4 class="Rg_advts_bsc_ttls mb-4">Basic Information</h4>

                   <form class="Rg_advts_form">
                       <input name="cName" id="inputForm" type="text" value="" class="form-control Rg_advts_name mb-3 rounded-0" placeholder="Company Name(Optional ) " aria-required="true" aria-invalid="false">

                        <input name="fName" id="inputForm" type="text" value="" class="form-control Rg_advts_name mb-3 rounded-0" placeholder="First Name " aria-required="true" aria-invalid="false">

                        <select class="form-select mb-3 rounded-0" aria-label="Default select example">
                           @foreach ($countries as $country)
                                                    <option @if($country_code==$country->country_code) selected="selected" @endif value=" {{ $country->country_name }} " label=" {{ $country->country_name }} "> {{ $country->country_name }} </option>
                                                    @endforeach
                        </select>

                        <div class="Rg_advts_number">
                            <select class="form-select mb-3 rounded-0" aria-label="Default select example">
                               @include('partials.country_code')
                            </select>

                            <input name="fName" id="inputNumber" type="text" value="" class=" Rg_advts_name mb-3 rounded-0" placeholder="@lang('Your Phone Number')" aria-required="true" aria-invalid="false">
                            
                        </div>


                   </form>
                </div>
            </div>

            <div class="col-md-5">
                <div class="Rg_advts_bsc">
                    <h4 class="Rg_advts_bsc_ttls mb-4">Lead Generation Information</h4>

                   <form class="Rg_advts_form">
                       <textarea class="form-control Rg_advts_name mb-3 rounded-0" placeholder="Products or Services you want to generate lead for us" id="floatingTextarea"></textarea>

                        <input name="wName" id="inputForm" type="text" value="" class="form-control Rg_advts_name mb-3 rounded-0" placeholder="Website (Optional) " aria-required="true" aria-invalid="false">

                         <input name="wName" id="inputForm" type="text" value="" class="form-control Rg_advts_name mb-3 rounded-0" placeholder="Social Media Page URL(Optional) " aria-required="true" aria-invalid="false">
                   </form>
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
                <div class="row justify-content-evenly">

                    
             
                    <div class="col-md-7">
                        <div class="row">

                            <div class="col-md-8">
                                <input name="wName" id="inputForm" type="email" value="" class="form-control rounded-0 Rg_advts_name mb-3" placeholder="Email Address " aria-required="true" aria-invalid="false">
                            </div>
                            <div class="col-md-4">
                             <input name="wName" id="inputForm" type="password" value="" class="rounded-0 form-control Rg_advts_name mb-3" placeholder="Password " aria-required="true" aria-invalid="false"></div>
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                         <input name="wName" id="inputForm" type="password" value="" class="form-control rounded-0 Rg_advts_name mb-3" placeholder="Confirm Password " aria-required="true" aria-invalid="false">
                     </div>

                     <div class="col-md-7 ms-auto mt-4 mb-xl-0 mb-lg-0 mb-md-0 mb-sm-5 mb-5">
                         <button type="button" class="btn btn-secondary Rg_advts_my_btn">SIGN UP</button>
                     </div>

        </div>
    </div>
</div>



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
    @if($country_code)
    var t = $(`option[data-code={{ $country_code }}]`).attr('selected', '');
    @endif
    $('select[name=country_code]').change(function() {
        $('input[name=country]').val($('select[name=country_code] :selected').data('country'));
    }).change();



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
                        }
                    },
                },

                Social: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Social Media.',
                        },
                        stringLength: {
                            min: 3,
                            message: 'Please fill Social Media.',
                        },
                        regexp: {
                            regexp: /^[a-z A-Z]+$/,
                            message: 'Full Name Invalid.',
                        },
                    },
                },
                Website: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Website Name.',
                        },
                        stringLength: {
                            min: 3,
                            message: 'Please fill Website Name.',
                        },
                        regexp: {
                            regexp: /^[a-z A-Z]+$/,
                            message: 'Full Name Invalid.',
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

<style>
    .Rg_advts {
        font-family: Poppins !important;
        font-weight: 200;

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
        font-weight: 400;
        font-size: 35px;
        letter-spacing: 1px;
        color: #cccdcc;
    }
	
    .user_info_Rg_advts h4,
    .Rg_advts_bsc .Rg_advts_bsc_ttls{
        font-size: 20px;
        line-height: normal;
        font-weight: 500;
    }

    input#inputForm {
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
     .Rg_advts_form textarea{
         font-size: 19px;
        line-height: normal;
     }

.Rg_advts_number {
    display: flex;
    flex-wrap: wrap;
}
.Rg_advts_number select.form-select {
    flex: 0 0 30%;
    width: 30%;
}
.Rg_advts_number input {
    flex: 0 0 70%;
    width: 70%;
    border: 1px solid #ced4da;
    font-size: 19px;
        line-height: normal;
    padding: 16px 24px;
}
.Rg_advts_form input:focus-visible {
    outline: none;
}
.Rg_advts .form-control{
     border: 1px solid #B9B9B9;
}
.Rg_advts .form-control:focus, .Rg_advts_form .form-select:focus {
       box-shadow: 0 0 20px rgb(0 0 0 / 16%);
    border: 1px solid #DEDEDE!important;
        transition: All .2s ease-in-out!important;
   
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



