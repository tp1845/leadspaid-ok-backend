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
     <section class="bg-secondary text-center text-white p-4 MainBanner-bottom" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <h3> Pay Only For Leads. Not for Clicks or Impressions.</h3>
                </div>
            </div>
        </div>
     </section>
    <section>
        <div class="container">
            <div class="row align-item-center justify-content-center py-2">
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
    <section class="bg-gray p-1 py-5 p-lg-5" >
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
                            <b><span>1</span> Embed Lead Form</b>
                            <p>We embed your lead form into popular publishers' leanding pages</p>
                        </li>
                        <li>
                            <b><span>2</span> Relevant Audience Fill the Form  </b>
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
    <section class="bg-light p-1 py-5 py-lg-5 " >
        <div class="container my-4">
            <div class="row">
                <div class="col-lg-12 text-center">
                <h2 class="title   pb-5">Advertisers Using LeadsPaid</h2>
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
                    <img src="{{url('/')}}/assets/images/homepage/brands/getsuncoast.webp" alt="" width="100%" style="max-width: 100px" >
                </div>
            </div>
            <div class="row gx-lg-5  py-3 align-items-center justify-content-center">
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
            <div class="row g-5 align-items-center justify-content-center">
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/OjoSantaFe.png" alt="" width="100%"  style="max-width: 180px" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/TripAdvisor.png" alt="" width="100%"  style="max-width: 280px" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{url('/')}}/assets/images/homepage/brands/Humana.png" alt="" width="100%"  style="max-width: 220px" >
                </div>
            </div>
        </div>
    </section>

    <section class="bg-secondary p-1 py-5 p-lg-5" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <h2 class="title mb-4 text-white">Start Generating Leads</h2>
                <a href="{{route('register_advertiser')}}" class="btn btn-primary btn-lg my-2 button-large  ">Join As Advertiser</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('hero')
    <section class="MainBanner-Home">
        <div class="container">
            <div class="row align-item-center justify-content-center align-items-center">
                <div class="col-lg-12">
                    @if(Request::get('sub') == 1 )
                        <h4 class="sub_title">An AI-Powered Leads Ad Network</h4>
                    @endif
                    <h1 class="h1 hero_title">Generate Leads Directly</h1>
                    <p>From High Ranking/ Popular/ Authority Sites & Apps</p>
                    <a href="{{route('register_advertiser')}}" class="btn btn-secondary btn-lg my-2 button-large">Join As Advertiser</a>
                </div>

            </div>

        </div>
    </section>
@endpush
     @push('script-lib')
        <script src="{{asset('assets/templates/basic')}}/js/vendor/particles.js"></script>
        <script src="{{asset('assets/templates/basic')}}/js/vendor/app.js"></script>

        <script src="{{asset('assets/templates/basic')}}/js/vendor/all-icons.js"></script>
        <script src="https://formvalidation.io/vendors/formvalidation/dist/js/plugins/Bootstrap.min.js"></script>
     @endpush

    @push('script')

    @endpush

    @push('style')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{url('/')}}/assets/font/fonts.css" rel="stylesheet">
    <style>
        body {
        background-color: #fff;
        font-family: Poppins !important;
        }

        .bg-gray{ background-color: #e0e0e0 !important; }
        .bg-light{ background-color: #e9e9e9 !important; }
        .title{ color: #1a273a; font-size: 3rem; }

        #MainHeroHeader{
            background-color: #1a273a;
            @if(Request::get('bg') == 1 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v1.jpg");
            @elseif(Request::get('bg') == 2 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v2.jpg");
            @elseif(Request::get('bg') == 3 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v3.webp");
            @elseif(Request::get('bg') == 4 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v4.png");
            @endif
            background-position: center;
            background-size: cover;
            position: relative;
        }
        #MainHeroHeader:before{
            background-color: #1a273a;
            @if(Request::get('bg'))
                opacity: .7;
            @endif
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: block;
            content: "";
            z-index: 1;
        }
        @if(Request::get('bg') == 1 )
        #MainHeroHeader #MainNav{
            background-color: #000011cc!important;
            border-bottom: 1px solid #000055;
        }
        #MainHeroHeader .MainBanner-Home{
            /* background-color: #000011bc; */
        }
        @endif

        #MainHeroHeader  #MainNav, #MainHeroHeader   .MainBanner-Home { position: relative; z-index: 10; }

        #MainNav{ background-color: transparent!important; }
        .MainBanner-Home {
        font-family: Poppins !important;
        background-color: transparent;
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

        .MainBanner-Home .sub_title{
            background-color: #EEEDE7;
            box-shadow: 5px 5px 0 #1361b2;
            color: #1361b2;
            font-size: 28px;
            font-weight: 500;
            display: inline-block;
            padding: 3px 15px;

        }
        /* Hero */
        .hero-box{ border: 3px solid #fff; width: 100%; padding: 30px; text-align: center; height: 100%;; display: flex; flex-direction: column;  align-items: center; justify-content: center; }
        .hero-box h4{ font-size: 46px; font-weight: bold; color: #1361b2 }
        .hero-box h5{ font-size: 26px; font-weight: normal;  color: #1361b2 }
        /* === */

        .how-its-works-list{ padding: 0; margin: 0; }
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


        .fv-plugins-icon-container {
        position: relative;
        }
        p, h1, h2, h3, h4, h5, h5, h6, .btn {
        font-family: Poppins !important
        }


        .fw-normal span {
        font-size: 34px;
        color: #1a273a;
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
        /* justify-content: center;*/
        height: 100%;
        align-items: stretch;
        align-content: space-around;
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
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        box-shadow: 0px 3px 10px 0px #000;
        }

        #MainFooter {
        margin-top: 0 !important;
        }
        .MainBanner-bottom h3, .MainBanner-bottom .h3 {
            font-size: 30px;
        }

        .MainBanner-Home .hero_title {
            text-shadow: 7px 14px 10px #000000;
            font-family: "Poppins-Bold"!important;
            font-weight: bold;
        }

        .MainBanner-Home p {
            text-shadow: 3px 7px 5px #000000;
            font-weight: 400;
        }
        @media only screen and (min-width: 768px) {
        .MainBanner-Home .hero_title {
            font-size: 81px !important;
        }
        .MainBanner-bottom h3, .MainBanner-bottom .h3 {
            font-size: 45px;
        }
        .MainBanner-Home p {
            font-size: 36px !important;
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
    </style>
@endpush
