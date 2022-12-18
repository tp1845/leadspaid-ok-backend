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

     <section class="MainBanner-Home">
        <div class="container">
            <div class="row align-item-center justify-content-center align-items-center">
                <div class="col-lg-12">
                    <h1 class="h1">Generate Leads Directly</h1>
                    <p>From High Ranking/ Popular/ Authority Sites & Apps</p>
                    <a href="{{route('register_advertiser')}}" class="btn btn-secondary btn-lg my-2 button-large">Join As Advertiser</a>
                </div>

            </div>
            <div class="row align-item-center justify-content-center  mt-5 pt-5">

                <div class="col-lg-4">
                    <div class="hero-box">
                        <h4>20,000+</h4>
                        <h5>Impressions/day</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="hero-box">
                        <h4>50,000+</h4>
                        <h5>Leads Generated</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="hero-box">
                        <h4>11 Countries</h4>
                        <img src="{{url('/')}}/assets/images/homepage/home-flags.png" alt=""  width="300px"  class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
     </section>
     <section class="bg-secondary text-center text-white p-4 MainBanner-bottom" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <h3> Pay Only For Leads. Not for Clicks or Impressions.</h3>
                </div>
            </div>
        </div>
     </section>

     <section class="bg-gray p-5" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <h2 class="title mb-5">How Its Works</h2>
                </div>
            </div>
            <div class="row align-item-center justify-content-center">
                <div class="col-lg-5 text-center ">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/X1QJGzvyoZI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-lg-5">
                    <ul class="how-its-works-list">
                        <li>
                            <b><span>1</span> Lead Form</b>
                            <p>We embed your lead form into popular publishers' leanding pages</p>
                        </li>
                        <li>
                            <b><span>2</span> Relevant audience fill Form  </b>
                            <p>Highly relevant audiences visit these pages & fill your lead form </p>
                        </li>
                        <li>
                            <b><span>3</span> Downlead Leads </b>
                            <p>Advertiser simply download the leads  </p>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
     </section>

    <div class="marketing">
        <div class="container py-5 text-left">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <h2 class="title mb-5">What's Unique</h2>
                </div>
            </div>
            <div class="row pt-5 pb-5 ">
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
                        <p class="h2 p-0 text-muted"><i class="fas fa-quote-left"></i></p>
                        <p class="text2">Get leads instead of buying website traffic through ppc, video or banner ads</p>
                        <!-- <p class="text2">LeadsPaid.com <a href="">generate leads</a> compared to <br>buying traffic</p> -->
                </div>
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
            <hr>
            <div class="row pt-5  align-items-center  ">
                <div class="col-lg-8  ">
                <div class="fw-normal-side"  >
                        <h3 class="fw-normal mb-5 w-100">A New Leads Generation Platform  <br>
                        <span>To Generate Leads Through Popular Publishers</span></h3>
                        <p class=" h2 p-0 text-muted"><i class="fas fa-quote-left"></i></p>
                        <p class="text2">You don't need to own a website or social media to generate leads </p>
                </div>
                </div><!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <img src="{{url('/')}}/assets/images/homepage/leadgeneration.webp" class="img-fluid" alt="leadsPaid">
                </div>
            </div><!-- /.row -->
        </div>
    </div>
    <section class="bg-light p-5" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <h2 class="title mb-5">Advertisers Using LeadsPaid</h2>
                </div>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/erconly.png" alt="" width="100%" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/ramsey.svg" alt="" width="100%" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/zeromortgage.png" alt="" width="100%"  style="max-width: 150px"  >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/getsuncoast.webp" alt="" width="100%" style="max-width: 120px" >
                </div>
            </div>
            <div class="row g-5 py-5 align-items-center justify-content-center">
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/greenwayps.webp" alt="" width="100%" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/landserv.webp" alt="" width="100%" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/buydomains.png" alt="" width="100%" >
                </div>

            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/OjoSantaFe.png" alt="" width="100%"  style="max-width: 180px" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/TripAdvisor.png" alt="" width="100%"  style="max-width: 280px" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/Humana.png" alt="" width="100%"  style="max-width: 220px" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/erconly.png" alt="" width="100%"  >
                </div>
            </div>
        </div>
     </section>

     <section class="bg-secondary  p-5" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <h2 class="title mb-4 text-white">Start Generating Leads</h2>
                   <a href="{{route('register_advertiser')}}" class="btn btn-primary btn-lg my-2 button-large px-5">Join As Advertiser</a>
                </div>
            </div>
        </div>
     </section>

{{-- <section class="Rg_advts">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 pt-5">
               <p class="Rg_advts_ttls_1">Generate Leads Now</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-12 pt-4">
               <p class="Rg_advts_ttls mb-5">Register as Advertiser</p>
            </div>
        </div>
        <form id="form" class="form" name="form"  method="POST" action="{{route('advertiser.register_adv')}}">
            @csrf
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="row justify-content-evenly">
                        <div class="col-md-5">
                            <div class="Rg_advts_bsc" id="publisher___form">
                                <h4 class="Rg_advts_bsc_ttls mb-4">Basic Information</h4>

                                <div class="form-group mb-3">
                                    <input type="text" id="username"  name="company_name" class="form-control Rg_advts_name rounded-0" placeholder="Company Name(Optional)" >
                                    <small>Error Message</small>
                                    <div class="custom_msg">
                                        <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                        <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" id="full_name" name="name" name="text" class="form-control Rg_advts_name rounded-0" placeholder="Full Name">
                                    <small>Error Message</small>
                                    <div class="custom_msg">
                                        <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                        <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="form-group mb-3 custom-state">
                                        <select name="country" class="form-select rounded-0" id="country_id">
                                            <option value="">Select Country</option>
                                            @include('partials.country')
                                        </select>
                                        <small>Error Message</small>
                                    <div class="custom_msg">
                                        <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                        <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="Rg_advts_number">
                                    <div class="form-group mb-3">
                                            <select name="country_code" class="form-select rounded-0">
                                            @include('partials.country_code')
                                            </select>
                                            <input type="text" name="phone" id="your_phone" class="form-control Rg_advts_name rounded-0" placeholder="@lang('Your Phone Number')">
                                        <small>Error Message</small>
                                        <div class="custom_msg">
                                            <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                            <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="Rg_advts_bsc" id="advertiser___form">
                                <h4 class="Rg_advts_bsc_ttls mb-4">Lead Generation Information</h4>

                                <div class="Rg_advts_form">

                                    <div class="form-group mb-3">
                                        <textarea name="product_services" placeholder="Products or Services for which you want to generate leads" id="floatingTextarea"></textarea>
                                        <small>Error Message</small>
                                        <div class="custom_msg">
                                            <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                            <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="Website" class="form-control Rg_advts_name rounded-0" placeholder="Website (Optional)">
                                        <small>Error Message</small>
                                        <div class="custom_msg">
                                            <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                            <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="Social" class="form-control Rg_advts_name rounded-0" placeholder="Social media URL(Optional)">
                                        <small>Error Message</small>
                                        <div class="custom_msg">
                                            <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                            <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                        </div>
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
                                            <input type="text" name="email" id="email" class="form-control Rg_advts_name rounded-0" placeholder="Email Address">
                                            <small>Error Message</small>
                                            <div class="custom_msg">
                                                <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                                <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input type="password" name="password" id="password" class="form-control Rg_advts_name rounded-0" placeholder="Password">
                                        <small>Error Message</small>
                                        <div class="custom_msg">
                                            <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                            <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input type="password" name="password_confirmation" id="confirm_password" class="form-control Rg_advts_name rounded-0" placeholder="Confirm Password">
                                        <small>Error Message</small>
                                        <div class="custom_msg">
                                            <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                            <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                        </div>
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
 </section> --}}

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
    const form = document.getElementById('form');
    const username = document.getElementById('username');
    const country_id = document.getElementById('country_id');
    const email = document.getElementById('email');
    const floatingTextarea = document.getElementById('floatingTextarea');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    //Show input error messages
    function showError(input, message) {
        const formControl = input.parentElement;
        formControl.className = 'form-control error';
        const small = formControl.querySelector('small');
        small.innerText = message;
    }

    //show success colour
    function showSucces(input) {
        const formControl = input.parentElement;
        formControl.className = 'form-control success';
    }


    //checkRequired fields
    function checkRequired(inputArr) {
        inputArr.forEach(function(input){
            if(input.value.trim() === ''){
                var input_name=getFieldName(input);
        // console.log(input_names);
            if(input_name=='Username')
            {
                showError(input, 'Please fill Full Company Name.');
            }
            if(input_name=='Full_name')
            {
                showError(input, 'Please fill Full Name.');
            }
            if(input_name=='Your_phone')
            {
                showError(input, 'Please fill Phone Number.');
            }
            if(input_name=='FloatingTextarea')
            {
                showError(input, 'Please fill Message.');
            }
            if(input_name=='Country_id')
            {
                showError(input, 'Select Country.');
            }
            if(input_name=='Password')
            {
                showError(input, 'Please fill Password');
            }

            }else {
                showSucces(input);

            }
        });
    }


    //check input Length
    function checkLength(input, min ,max) {
        if(input.value.length < min) {
            var input_names=getFieldName(input);
        // console.log(input_names);
            if(input_names=='Username')
            {
                showError(input, 'Please fill Full Company Name.');
            }
            if(input_names=='Full_name')
            {
                showError(input, 'Please fill Full Name.');
            }
            if(input_names=='Your_phone')
            {
                showError(input, 'Please fill Phone Number.');
            }
            if(input_names=='FloatingTextarea')
            {
                showError(input, 'Please fill Message.');
            }
            if(input_names=='Country_id')
            {
                showError(input, 'Select Country.');
            }
            if(input_names=='Password')
            {
                showError(input, 'Please fill Password');
            }

        }else if(input.value.length > max) {
            showError(input, `${getFieldName(input)} must be les than ${max} characters`);
        }else {
            showSucces(input);

        }
    }

    //get FieldName
    function getFieldName(input) {
        return input.id.charAt(0).toUpperCase() + input.id.slice(1);
    }

    // check passwords match
    function checkPasswordMatch(input1, input2) {
        if(input1.value !== input2.value) {
            showError(input2, 'Passwords do not match');
        }
    }

    //check email is valid
    function checkEmail(input) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(re.test(input.value.trim())) {
            showSucces(input)
        }else {
            showError(input,'Please fill valid email address (will be used as username to login)');
        }
    }


    //Event Listeners
    form.addEventListener('submit',function(e) {
        e.preventDefault();

        checkRequired([username, full_name, your_phone, floatingTextarea, password, confirm_password]);
        checkLength(username,3,15);
        checkLength(full_name,3,15);
        checkLength(your_phone,3,10);
        checkLength(floatingTextarea,3,50);
        checkLength(country_id,3,15);
        checkLength(password,6,25);
        checkEmail(email);
        checkPasswordMatch(password, confirm_password);


        const company_name1 = document.form.company_name.value;
        const name1 =document.form.name.value;
        const email1 = document.form.email.value;
        const phone1 = document.form.phone.value;
        const password1 = document.form.password.value;
        const product_services1 = document.form.product_services.value;
        const password_confirmation1 = document.form.password_confirmation.value;
        if (company_name1=="" || name1==""  ||  email1==""  || phone1==""  || password1=="" || product_services1=="" || password_confirmation1==""){
            return false;
        }else
        {
            document.querySelector('#form').submit();
        }
    });
</script>
@endpush
@push('style')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
        background-color: #fff;
        font-family: Poppins !important;
        }

        .bg-gray{ background-color: #e0e0e0 !important; }
        .bg-light{ background-color: #e9e9e9 !important; }
        .title{ color: #1a273a; font-size: 3rem; }


        /* Hero */
        .hero-box{ border: 3px solid #fff; width: 100%; padding: 30px; text-align: center; height: 100%;; display: flex; flex-direction: column;  align-items: center; justify-content: center; }
        .hero-box h4{ font-size: 46px; font-weight: bold; color: #fff }
        .hero-box h5{ font-size: 26px; font-weight: normal;  color: #fff }
        /* === */

        .how-its-works-list{ }
        .how-its-works-list li{
        font-size: 22px;
        margin-bottom: 15px;
        background: #fff;
        padding: 15px;
        border-radius: 3px;
        box-shadow: 0px 3px 2px #00000008;
        list-style: none;
        }
        .how-its-works-list li b span{
        display: inline-block;
        width: 30px;
        height: 30px;
        text-align: center;
        font-size: 18px;
        line-height: 30px;
        background: #1361b2;
        color: #fff;
        padding: 0;
        border-radius: 100%;
        margin-right: 3px;

        }


        .Rg_advts .form-control.error select#country_id, .Rg_advts .form-control.success select#country_id {
        background: none !important;
        }
        .custom_msg .fa-times, .custom_msg .fa-check, .Rg_advts .form-control.success small {
        display: none;
        }
        .Rg_advts .form-control {
        position: relative;
        }
        .error .custom_msg .fa-times {
        display: block;
        position: absolute;
        top: 25px;
        right: 22px;
        color: #e74c3c;
        }
        .success .custom_msg .fa-check {
        display: block;
        position: absolute;
        top: 23px;
        right: 22px;
        color: #2ecc71;
        }

        .fa-times::before {
        content: "\f00d";
        }
        .fa-check::before {
        content: "\f00c";
        }
        .fa, .far, .fas {
        font-family: "Font Awesome 5 Free";
        }
        .fa, .fab, .fad, .fal, .far, .fas {
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        line-height: 1;
        }
        .fv-plugins-bootstrap .fv-plugins-icon {
        height: 38px;
        line-height: 38px;
        width: 38px;
        }

        .Rg_advts .form-group{
        position: relative;
        }

        .Rg_advts .form-group label{
        color:#777;
        display: block;
        margin-bottom: 5px;
        }


        .Rg_advts .form-group input:focus{
        outline: 0;
        border-color: #777;

        }
        .Rg_advts .form-control.success {
        padding: 0;
        border: none;
        margin-bottom: 1rem !important;
        }
        .Rg_advts .form-control.error {
        border: none;
        padding: 0;
        margin-bottom: 10px;
        }
        .Rg_advts .form-control.success small {
        color:#2ecc71;
        }
        .Rg_advts .form-control.success input {
        border-color: #2ecc71;
        }
        .Rg_advts_number .form-control.success select, .Rg_advts .form-control.success textarea, .Rg_advts .form-control.success #country_id {
        border: 1px solid #2ecc71;
        }
        .Rg_advts textarea, .Rg_advts textarea:hover {
        border:1px solid #94a1b5;
        }
        .Rg_advts textarea:focus-visible {
        outline: none;
        }
        .Rg_advts .form-control.error input, .Rg_advts_form .form-control.error textarea, .Rg_advts_bsc .form-control.error select, .Rg_advts_number .form-control.error select {
        border-color: #e74c3c;
        }
        .Rg_advts .form-control.error small {
        color: #e74c3c;
        }
        .Rg_advts .form-group small{
        color: #e74c3c;
        position: absolute;
        bottom: 0;
        left: 0;
        visibility: hidden;
        }

        .Rg_advts .form-groupl.error small{
        visibility: visible;
        }
        .Rg_advts_bsc select {
        font-size: 19px;
        padding: 16px 24px;
        border-radius: 0;
        line-height: normal;
        }
        .Rg_advts_bsc select, .Rg_advts_number select {
        border: 1px solid #94a1b5;
        background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/30px 10px !important;
        }
        .Rg_advts textarea, .Rg_advts textarea:hover {
        border:1px solid #94a1b5;
        }
        .fv-plugins-icon-container {
        position: relative;
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

        .MainBanner-Home .btn, .button-large {
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
        width: 100%;
        line-height: normal;
        max-height: 140px;
        height: 100%;
        }

        .Rg_advts_number .form-group, .Rg_advts_number .form-control.error, .Rg_advts_number .form-control.success {
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
            font-family: Poppins !important;
            font-weight: bold;
        }
        .MainBanner-bottom h3, .MainBanner-bottom .h3 {
            font-size: 45px;
        }
        .MainBanner-Home p {
            font-size: 36px !important;
            font-weight: 300;
        }

        .MainBanner-Home .btn, .button-large {
            font-size: 35px !important;
            padding-right: 35px;
            padding-left: 35px;
            display: inline-block;
        }
        }
        @media only screen and (max-width: 768px) {
        .MainBanner-Home .btn, .button-large {
            font-size: 30px !important;
            padding-right: 15px;
            padding-left: 15px;
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
@endpush
