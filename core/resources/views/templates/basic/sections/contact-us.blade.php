@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')

{{-- @include($activeTemplate.'partials.breadcrumb') --}}
<div class="contact-banner">



            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3119.3563763314287!2d-121.48248508516541!3d38.57164037368576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809ad0dd31655555%3A0x4400fdc2363ca6c4!2s1401%2021st%20Street%20Suite%20R%2C%20Sacramento%2C%20CA%2095811%2C%20USA!5e0!3m2!1sen!2sin!4v1670595056862!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>      
</div>
<style>
    .contact-banner{
        position: relative;
    }
    .contact-banner:after{
        
        position: absolute;
        top: 0;
        left: 0;
        z-index: 20;
        width: 100%;
        height: 100%;
        display: block;
        content: "";
        background-color: #000;
        opacity: .1;

    }
    .contact-3 .title-3:before {
        display:none;
    }
    .contact_wrap p, .contact_wrap p a, .contact_msg {
    color: #586167 !important;
    font-weight:400;
    font-size:18px;
}
    .conpant_icon svg {
        height:24px !important;
    }
    .contact_wrap .title {
    color: #1361b2;
}
.submit-btn button.btn {
    font-size: 24px;
    font-weight: 500;
}
.input-group {
    border-color: #94a1b5 !important;
}
.contact-3 .form-group {
    margin-bottom: unset;
}
.contact-3 .form-group input {
    color: #586167;
    outline: none;
    display: block;
    font-size: 19px;
    height: 63px;
    border-bottom: none;
    border: 1px solid #94a1b5 !important;
    padding: 16px 24px;
    line-height: normal;
    /* background: #f2f7ff; */
    font-weight:300;
}
.contact-3 .form-group textarea {
    border: 1px solid #94a1b5 !important;
    /* background: #f2f7ff; */
    font-size: 19px;
    padding: 16px 24px;
    line-height: normal;
    font-weight:300;
}

.contact-3 .form-group .form-control:focus, .contact-3 .contact_msg:focus, .contact-3 .was-validated .form-select:valid, .contact-3 .form-select.is-valid {
    background-color: #fff;
    border: 1px solid #94a1b5 !important;
    box-shadow: 0 0 20px rgb(0 0 0 / 16%) !important;
    transition: All .2s ease-in-out!important;
}

.contact-3 .form-group i {
    top: 10px;
    right: 10px;
}
.contact-3 .theme-card {
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
}
.contact-3 .contact_section .contact_wrap h4 {
    font-size:18px !important;
}
.contact-3 .contact_section .contact_wrap {
    text-align:left !important;
    -webkit-box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 7%);
    box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 7%);
}
.Rg_advts .form-control.error select#country_id, .Rg_advts .form-control.success select#country_id {
    background: none !important;
}
  .custom_msg .fa-times, .custom_msg .fa-check, .Rg_advts .form-control.success small, .log-in .form-control.success small {
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

.log-in .form-group{
    position: relative;
}

.log-in .form-group label{
    color:#777;
    display: block;
    margin-bottom: 5px; 
}
 

.log-in .form-group input:focus{
    outline: 0;
    border-color: #777;

}
.log-in .form-control.success {
    padding: 0;
    border: none;
    margin-bottom: 1rem !important;
}
.log-in .form-control.error {
    border: none;
    padding: 0;
    margin-bottom: 10px;
}
.log-in .form-control.success small {
    color:#2ecc71;
}
.log-in .form-control.success input {
    border-color: #2ecc71;
}
.Rg_advts_number .form-control.success select, .log-in .form-control.success textarea, .log-in .form-control.success #country_id {
    border: 1px solid #2ecc71;
}
.log-in textarea, .log-in textarea:hover {
    border:1px solid #94a1b5;
}
.log-in textarea:focus-visible {
    outline: none;
}
.log-in .form-control.error input, .log-in .form-control.error textarea, .Rg_advts_bsc .form-control.error select, .Rg_advts_number .form-control.error select {
    border-color: #e74c3c;    
}
.log-in .form-control.error small {
    color: #e74c3c;
}
.log-in .form-group small{
    color: #e74c3c;
    position: absolute;
    bottom: 0;
    left: 0;
    visibility: hidden;
}

.log-in .form-groupl.error small{
    visibility: visible;
}
.log-in input {
    display: block;
    font-size: 19px;
    padding: 16px 24px;
    line-height: normal;
    height:63px;
}
.log-in .form-group, .log-in .form-control {
    position: relative;
}
</style>

@php
    $content = getContent('contact.content',true)
@endphp

<section class="small-section contact-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="log-in theme-card">
                    <div class="title-3 text-start">
                        <h2>Contact Us</h2>
                    </div>
                        <form method="POST" name="contact_form" id="contact_form" action="{{route('contact.send')}}" class="row form gx-3 get-in-touch">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" id="conact_name" name="name" class="rounded-0 form-control py-2" placeholder="@lang('Full Name')" >
                                    <small>Error Message</small>
                                    <div class="custom_msg">
                                        <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                        <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" id="conact_company" name="company" class="rounded-0 form-control py-2" placeholder="@lang('Company Name')" >
                                    <small>Error Message</small>
                                    <div class="custom_msg">
                                        <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                        <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" id="conact_email" name="email" class="rounded-0 form-control py-2" placeholder="@lang('Email Address')" >
                                    <small>Error Message</small>
                                    <div class="custom_msg">
                                        <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                        <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" id="conact_phone" name="phone" class="rounded-0 form-control py-2" placeholder="@lang('Phone Number')">
                                    <small>Error Message</small>
                                    <div class="custom_msg">
                                        <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                        <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <textarea id="conact_message"  name="message" placeholder="@lang('Message')" class="form-control contact_msg rounded-0 py-2" rows="4">{{old('message')}}</textarea>
                                    <small>Error Message</small>
                                    <div class="custom_msg">
                                        <i data-field="company_name" class="fv-plugins-icon fa fa-times" aria-hidden="true"></i>
                                        <i data-field="name" class="fv-plugins-icon fa fa-check" aria-hidden="true"></i>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-btn">
                            <button type="submit" class="btn btn-secondary px-5 py-2 text-uppercase fw-bold">@lang('Submit Message')</button>
                        </div>
                    </form>
                </div>
                {{-- <div class="theme-card">
                <div class="contact-bottom">
                    <div class="contact-map">
                        <iframe title="contact location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946229!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563449626439!5m2!1sen!2sin" allowfullscreen=""></iframe>
                    </div>
                </div>
                </div> --}}
            </div>
            <div class="col-lg-4 contact_section contact_right mb-4">
                <div class="row">
                    <div class="col-lg-12 col-sm-6">
                        <div class="contact_wrap text-left">
                            <h4 class="title mb-0">@lang('Leads Paid Inc.')</h4>
                            <p class="mb-2">1401 21st Street STE R Sacramento, California 95811 United States</p>
                            <p> <a href="mailto:&#99;&#111;&#110;&#116;&#97;&#99;&#116;&#64;&#108;&#101;&#97;&#100;&#115;&#112;&#97;&#105;&#100;&#46;&#99;&#111;&#109;">&#99;&#111;&#110;&#116;&#97;&#99;&#116;&#64;&#108;&#101;&#97;&#100;&#115;&#112;&#97;&#105;&#100;&#46;&#99;&#111;&#109;</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
      <!-- contact section end -->
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
const form = document.getElementById('contact_form');
const conact_name = document.getElementById('conact_name');
const conact_email = document.getElementById('conact_email');
const conact_company = document.getElementById('conact_company');
const conact_phone = document.getElementById('conact_phone');
const conact_message = document.getElementById('conact_message');

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
               
            var input_names=getFieldName(input);
          
                if(input_names=='Conact_name')
                {
                    showError(input, 'Please fill Full Name.');
                }
                else if(input_names=='Conact_email')
                {
                    showError(input, 'Please fill valid email address.');
                }
                else if(input_names=='Conact_company')
                {
                    showError(input, 'Please fill company Name.');
                }
                else if(input_names=='Conact_phone')
                {
                    showError(input, 'Please fill Phone Number.');
                }
                else if(input_names=='Conact_message')
                {
                    showError(input, 'Please fill Message.');
                }else
                {
                    
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
          
          if(input_names=='Conact_name')
          {
              showError(input, 'Please fill Full Name.');
          }
          else if(input_names=='Conact_email')
          {
              showError(input, 'Please fill valid email address.');
          }
          else if(input_names=='Conact_company')
          {
              showError(input, 'Please fill company Name.');
          }
          else if(input_names=='Conact_phone')
          {
              showError(input, 'Please fill Phone Number.');
          }
          else if(input_names=='Conact_message')
          {
              showError(input, 'Please fill Message.');
          }else
          {
              
          }
        
    }else if(input.value.length > max) {
        showError(input, `${getFieldName(input)} must be les than ${max} characters`);
    }else {
        showSucces(input);
     
    }
}
//check email is valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        showSucces(input)
    }else {
        showError(input,'Please fill valid email address ');
    }
}

//get FieldName
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

//Event Listeners
form.addEventListener('submit',function(e) {
    e.preventDefault();
    checkRequired([conact_name, conact_email, conact_company, conact_phone, conact_message]);
  
      checkLength(conact_name,3,15);
      checkLength(conact_company,3,10);
      checkEmail(conact_email);
      checkLength(conact_phone,3,10);
      checkLength(conact_message,3,15);
    const name = document.contact_form.name.value;
    const company =document.contact_form.company.value;
    const email = document.contact_form.email.value;
    const phone = document.contact_form.phone.value;
    const message = document.contact_form.message.value;
//console.log('name',name);

if (name=="" || company==""  ||  email==""  || phone==""  || message==""){  
  return false;  
}else
{
    document.getElementById("contact_form").submit();
}

   
});

</script>    

@endpush