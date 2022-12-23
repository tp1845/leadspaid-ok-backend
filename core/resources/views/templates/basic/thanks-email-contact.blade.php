@extends($activeTemplate.'layouts.frontendLeadPaid')
@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://leadspaid.com/assets/templates/basic/css/all.min.css">

<div class="contact-banner">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3119.3563763314287!2d-121.48248508516541!3d38.57164037368576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809ad0dd31655555%3A0x4400fdc2363ca6c4!2s1401%2021st%20Street%20Suite%20R%2C%20Sacramento%2C%20CA%2095811%2C%20USA!5e0!3m2!1sen!2sin!4v1670595056862!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<section class="small-section contact-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pt-4 d-flex justify-content-start align-items-center">
                <img src="{{asset('assets/images/frontend')}}/robot-arm.png" width="150px" alt="" >
                <div class="ps-5">
                    <p class="Rg_advts_ttls-1">Thanks for contacting us.</p>
                    <p class="Rg_advts_ttls-1 mb-0"> We will contact you soon.</p>
                </div>

            </div>
            <div class="col-lg-4 contact_section contact_sidebar mb-4">
                <div class="contact_wrap text-left">
                    <h4 class="title mb-3">Leads Paid Inc.</h4>
                    <p class="mb-0 d-flex justify-content-start">
                        <span class="me-3"><img src="{{asset('assets/images/frontend')}}/icon-pin.png" width="32px" alt="" ></span>
                        <span>1401 21st Street STE R,<br/> Sacramento, California 95811<br>United States</span>
                    </p>
                    <p class="my-3 d-flex justify-content-start">
                        <span class="me-3"><img src="{{asset('assets/images/frontend')}}/icon-email.png" width="32px" alt="" ></span>
                        <span><a href="mailto:&#99;&#111;&#110;&#116;&#97;&#99;&#116;&#64;&#108;&#101;&#97;&#100;&#115;&#112;&#97;&#105;&#100;&#46;&#99;&#111;&#109;">&#99;&#111;&#110;&#116;&#97;&#99;&#116;&#64;&#108;&#101;&#97;&#100;&#115;&#112;&#97;&#105;&#100;&#46;&#99;&#111;&#109;</a></span>
                    </p>
                    <p class="mb-0 d-flex justify-content-start">
                        <span class="me-3"><img src="{{asset('assets/images/frontend')}}/icon-phone.png" width="32px" alt="" ></span>
                        <span>1401</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection

@push('script-lib')
<script src="{{asset('assets/templates/basic')}}/js/vendor/particles.js"></script>
<script src="{{asset('assets/templates/basic')}}/js/vendor/app.js"></script>

@endpush
@push('style')
<style>
    .Rg_advts_ttls-1, .Rg_advts_ttls__1 {
    color: #191f58;
    font-family: Poppins !important;
    font-weight: 600;
    font-size: 34px;
    letter-spacing: 1px;
    margin-bottom: 10px;
    }
    .contact-banner{
        position: relative;
      filter: invert(10%) ;
    }

    .contact_sidebar .contact_wrap {
        text-align:left !important;
        -webkit-box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 20%);
        box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 20%);
        height: auto!important;
    }

    .contact_sidebar .contact_wrap {
        text-align:left !important;
        -webkit-box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 30%)!important;
        box-shadow: 3.346px 3.716px 22.5px rgb(0 0 0 / 30%)!important;
        padding: 30px;
    }
    .contact_sidebar .contact_wrap .title {
        font-family: Poppins !important;
        font-weight: 600!important;
        font-size: 30px!important;
        margin-bottom: 15px!important;
        color: #191f58!important;
    }
    .contact_sidebar .contact_wrap p, .contact_sidebar .contact_wrap p a {
        color: #586167 !important;
        font-weight:400;
        font-size:18px;
    }


</style>
@endpush
