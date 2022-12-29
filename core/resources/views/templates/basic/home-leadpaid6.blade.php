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
                   <h3>Pay Only For Leads. Not for Clicks or Impressions.</h3>
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
    <section id="how_it_works" class="p-1 py-5 p-lg-5" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="title mb-5">How It Works</h2>
                </div>
            </div>
            <div class="row align-item-center justify-content-center">
                <div class="col-lg-5 text-center ">
                    <div class="media-wrapper mb-3 mb-lg-0">
                        <video id="player1" width="640" height="360" style="max-width:100%;" poster="http://www.mediaelementjs.com/images/big_buck_bunny.jpg" preload="none" controls playsinline webkit-playsinline>
                            <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/CastVideos/mp4/BigBuckBunny.mp4" type="video/mp4">
                            <track srclang="en" kind="subtitles" src="mediaelement.vtt">
                            <track srclang="en" kind="chapters" src="chapters.vtt">
                        </video>
                    </div>
                    <div class="media_text mt-5">
                        <h2 class="title">RESULT</h2>
                        <p class="media_btn">GREAT LEADS<br/>GREAT SALES</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <ul class="how-its-works-list">
                        <li>
                            <b><span>1</span> AI Embeds Lead Form</b>
                            <p>Our AI Algorithm embeds your lead form into popular publishers' landing pages</p>
                        </li>
                        <li>
                            <b><span>2</span> Relevant Audience Fill the Form  </b>
                            <p>Highly relevant audiences visit these pages and fill your lead form</p>
                        </li>
                        <li>
                            <b><span>3</span> Downlead Leads </b>
                            <p>Advertisers can simply download their leads instantly</p>
                        </li>
                        <li>
                            <b><span>4</span> Deep Learning Optimizer </b>
                            <p>Our Deep learning Optimizer steadily improves your sales lead quality score up to 100% efficiency</p>
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
            <div class="row pt-lg-5 pb-5 ">
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
                        <p class="text2">Pay Only For Leads. Not for Clicks or Impressions.</p>
                        <!-- <p class="text2">LeadsPaid.com <a href="">generate leads</a> compared to <br>buying traffic</p> -->
                </div>
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
            <hr>
            <div class="row pt-5  align-items-center  ">
                <div class="col-lg-8  ">
                <div class="fw-normal-side"  >
                        <h3 class="fw-normal mb-5 w-100">A New Lead Generation Platform  <br>
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
    <section id="section_advertisers" class="bg-light p-1 py-5 py-lg-5 " >
        <div class="container my-4">
            <div class="row">
                <div class="col-lg-12 text-center">
                <h2 class="title pb-5" style="margin-bottom: 20px!important">Advertisers Using LeadsPaid</h2>
                </div>
            </div>

            <div class="logoSlider d-block d-lg-none">
                {{-- 1 --}}
                <div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/TripAdvisor.png" alt="" width="100%" >
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/ramsey.svg" alt="" width="100%" >
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/zeromortgage.png" alt="" width="100%"  style="max-width: 150px"  >
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/getsuncoast.webp" alt="" width="100%" style="max-width: 100px" >
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/greenwayps.webp" alt="" width="100%" >
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/landserv.webp" alt="" width="100%" >
                        </div>
                    </div>
                </div>
                {{--  --}}
                  {{-- 2 --}}
                  <div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/buydomains.png" alt="" width="100%" >
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/OjoSantaFe.png" alt="" width="100%" >
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/erconly.png" alt="" width="100%"   >
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/Humana.png" alt="" width="100%" style="max-width: 220px" >
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/erconly.png" alt="" width="100%" >
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/ramsey.svg" alt="" width="100%" >
                        </div>
                    </div>
                </div>
                {{--  --}}
                  {{-- 3 --}}
                  <div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/erconly.png" alt="" width="100%" >
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/ramsey.svg" alt="" width="100%" >
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/zeromortgage.png" alt="" width="100%"  style="max-width: 150px"  >
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/getsuncoast.webp" alt="" width="100%" style="max-width: 100px" >
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/erconly.png" alt="" width="100%" >
                        </div>
                        <div class="col-6 text-center">
                            <img src="{{url('/')}}/assets/images/homepage/brands/ramsey.svg" alt="" width="100%" >
                        </div>
                    </div>
                </div>
                {{--  --}}

            </div>
            <div class="d-none d-lg-block">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-3 text-center">
                        <img src="{{url('/')}}/assets/images/homepage/brands/TripAdvisor.png" alt="" width="100%"  style="max-width: 280px" >

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
                        <img src="{{url('/')}}/assets/images/homepage/brands/erconly.png" alt="" width="100%" >
                    </div>
                    <div class="col-lg-3 text-center">
                        <img src="{{url('/')}}/assets/images/homepage/brands/Humana.png" alt="" width="100%"  style="max-width: 220px" >
                    </div>
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

        <script type="text/javascript" src="{{asset('assets/templates/basic')}}/js/vendor/slick.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/templates/basic')}}/css/vendor/slick.css"/>
        <link rel="stylesheet" href="{{asset('assets/templates/leadpaid/js/mediaelement')}}/build/mediaelementplayer.min.css">
        <script src="{{asset('assets/templates/leadpaid/js/mediaelement')}}/build/mediaelement-and-player.js"></script>
        @endpush

    @push('script')
        <script>
            $(document).ready(function(){
                $('video, audio').mediaelementplayer({
                    // Do not forget to put a final slash (/)
                    pluginPath: 'https://cdnjs.com/libraries/mediaelement/',
                    // this will allow the CDN to use Flash without restrictions
                    // (by default, this is set as `sameDomain`)
                    shimScriptAccess: 'always'
                    // more configuration
                });
                $('.logoSlider').slick({
                    prevArrow:'<button type="button" class="slick-prev"><i class="las la-chevron-circle-left"></i></button>',
                    nextArrow:'<button type="button" class="slick-next"><i class="las la-chevron-circle-right"></i></button>',

                });
            });
        </script>
    @endpush

    @push('style')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{url('/')}}/assets/font/fonts.css" rel="stylesheet">
    <style>
          .media-wrapper{ overflow: hidden; border: 5px solid #ccc; box-shadow: 2px 2px 2px #666; }
        .mejs__overlay-button {
            background-image: url("{{asset('assets/templates/leadpaid/js/mediaelement')}}/build/mejs-controls.svg")!important;
            border: 0!important;
        }
        .mejs__overlay-loading-bg-img {
            background-image: url("{{asset('assets/templates/leadpaid/js/mediaelement')}}/build/mejs-controls.svg")!important;
        }
        .mejs__button > button {
            background-image: url("{{asset('assets/templates/leadpaid/js/mediaelement')}}/build/mejs-controls.svg")!important;
        }
        .mejs__button svg {
            fill: #000;
        }
        </style>
    <style>
        body {
        background-color: #fff;
        font-family: Poppins !important;
        }


        .bg-gray{ background-color: #f5f7f8 !important; }
        .bg-light{ background-color: #e9e9e9 !important; }
        #section_advertisers{  background: #e0e0e0 url("{{asset('assets/templates/leadpaid/images/')}}/gray_wave_bg.jpg") no-repeat center!important; background-size: cover; }
        .title{ color: #003561; font-size: 3rem; }

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

        #MainNav{ background-color: transparent!important; border-bottom: 0!important; box-shadow: 1px 1px 46px #ffffff; }
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
            background-color: #000000aa;
            /* box-shadow: 5px 5px 0 #1361b2; */
            box-shadow: 0px 0px 5px #fff;
            color: #fff;
            font-size: 28px;
            font-weight: 500;
            display: inline-block;
            padding: 3px 15px;
        }
        @media only screen and (max-width: 568px) {
            .MainBanner-Home .sub_title{
                font-size: 19px;
                padding: 3px 12px;
            }
        }


        /* Hero */
        .hero-box{ border: 0 solid #fff; width: 100%; padding: 30px; text-align: center; height: 100%;; display: flex; flex-direction: column;  align-items: center; justify-content: center; }
        .hero-box h4{ font-size: 46px; font-weight: bold; color: #1361b2 }
        .hero-box h5{ font-size: 26px; font-weight: normal;  color: #1361b2 }
        /* === */

        .MainBanner-bottom{box-shadow: 0px 2px 67px #1361b2;}

        #how_it_works{ background-color: #f5f7f8 !important;  box-shadow: 0px 6px 12px #dfeaef!important; }
        .how-its-works-list{ padding: 0; margin: 0; position: relative; }
        .how-its-works-list li{
        font-size: 22px;
        margin-bottom: 15px;
        background: #fff;
        padding: 15px;
        border-radius: 3px;
        box-shadow: 0px 3px 2px #00000008;
        list-style: none;
        position: relative;
        border: 5px solid #ccc;
        box-shadow: 2px 2px 2px #666;
        }
        @media only screen and (min-width: 1024px) {
            .how-its-works-list li { margin-bottom: -15px }
            .how-its-works-list li:last-child { margin-bottom: 0 }
            .how-its-works-list li:nth-child(odd){ left: 50px; }
            .how-its-works-list li:nth-child(even){ left: 100px;}
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
        .media_text .title{ font-size: 2.5rem; }
        .media_text .media_btn{ font-size: 50px; font-weight: bold; color: #fff; background: #11baf3; border: #000 3px solid; padding: 20px; }

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

        .logoSlider img{
            display: inline-block!important;
        }
        .logoSlider .row > *{
            padding: 20px;
        }
        /* slick-slider */

        .slick-slider {
            padding: 0 20px;
            position: relative;
            display: block;
            box-sizing: border-box;
            user-select: none;
            touch-action: pan-y;
        }

        .slick-prev, .slick-next {
            font-size: 34px;
            position: absolute;
            top: 50%;
            display: block;
            width: 33px;
            height: 45px;
            padding: 0;
            transform: translate(0, -50%);
            cursor: pointer;
            border: none;
            outline: none;
            background: transparent;
        }

        .slick-prev { left: -15px;  }
        .slick-next { right: -15px; }

        /* slick-slider */
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
            .MainBanner-bottom h3, .MainBanner-bottom .h3 {
                line-height: 1.6;
            }
        }

        @media only screen and (max-width: 366px) {
            .MainBanner-Home .btn, .button-large {  padding-right: 11px;  padding-left: 11px;  }
            .MainBanner-Home .sub_title{ padding: 3px 9px; }
        }
    </style>
@endpush
