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
                    <h3>Pay Only For Leads. Not For Clicks Or Impressions.</h3>
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
                <div class="col-lg-5">
                    <ul class="how-its-works-list">
                        <li>
                            <b><span>1</span> AI Embeds Lead Form</b>
                            <p>Our AI Algorithm embeds your lead form into popular publishers' landing pages</p>
                        </li>
                        <li>
                            <b><span>2</span> Relevant Audience Fill the Form  </b>
                            <p>Website visitors having strong interest in topics related to your lead gen campaign fill out your lead form</p>
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
                    <div class="media_text mt-5 text-center d-block d-lg-none">
                        <h2 class="title">RESULT</h2>
                        <p class="media_btn">GREAT LEADS<br/>GREAT SALES!!!</p>
                    </div>
                </div>
                <div class="col-lg-5 text-center ">
                    <div class="media-wrapper mb-3 mb-lg-0">
                        <video id="player1" width="640" height="360" style="max-width:100%;" poster="http://www.mediaelementjs.com/images/big_buck_bunny.jpg" preload="none" controls playsinline webkit-playsinline>
                            <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/CastVideos/mp4/BigBuckBunny.mp4" type="video/mp4">
                            <track srclang="en" kind="subtitles" src="mediaelement.vtt">
                            <track srclang="en" kind="chapters" src="chapters.vtt">
                        </video>
                    </div>
                    <div class="media_text mt-5 d-none d-lg-block">
                        <h2 class="title">RESULT</h2>
                        <p class="media_btn">GREAT LEADS<br/>GREAT SALES!!!</p>
                    </div>
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
            <div class="row g-xl-1 pt-lg-3 pb-0 pb-lg-5  ">
                <div class="col-lg-6 text-center  mb-2 mb-lg-0">
                    <div class="marketing_block one">
                        <h3>An Alternative Lead Source <br>
                        <span>Distinct from Search, Display &<br> Programmatic Ads</span></h3>
                        <img src="{{url('/')}}/assets/images/homepage/banner-02.png?v1" class="img-fluid" alt="leadsPaid">
                        <p>Get leads instead of buying website traffic <br/>through ppc, video or banner ads.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="marketing_block two"  >
                        <h3>High Quality Lead Gen Platform<br>
                        <span>To generate leads without a website or <br>social media</span></h3>
                        <img src="{{url('/')}}/assets/images/homepage/leadgeneration.png" class="img-fluid" alt="leadsPaid">
                        <p>Generate leads through popular high traffic  <br>  and targetted websites/Apps.</p>
                    </div>
                </div>
            </div><!-- /.row -->

        </div>
    </div>
    <section id="section_advertisers" class="bg-light p-1 pt-3 pt-lg-4 pb-4 pb-lg-5 " >
        <div class="container-fluidss my-4">
            <h2 class="title pb-3 pb-lg-5 text-center" style="margin-bottom: 20px!important">OVER 200,000 LEADS GENERATED FOR COMPANIES INCLUDING...</h2>
            <div class="logoSlider d-block d-lg-block">
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/TripAdvisor.png" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/ramsey.svg" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/zeromortgage.png" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/getsuncoast.webp" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/greenwayps.webp" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/landserv.webp" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/buydomains.png" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/OjoSantaFe.png" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/erconly.png" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/Humana.png" alt="" >
                </div>
            </div>
        </div>
    </section>
    {{-- Hotspot --}}
    <div id="hotspot_section" class="section bg-gray d-flex justify-content-center align-items-center" style="overflow: hidden">
        <div class="container" style="position: relative; z-index: 10;" >
            <div class="row justify-content-center align-items-center" >
                <div class="col-12 mb-5">
                    <h2 class="title text-center"><strong>What Leading Companies Say About Us?</strong></h2>
                </div>
                <div class="col-lg-8 col-xl-8 ">
                    <div class="testimonial_block">
                        <p class=" h2 p-0 text-muted"><i class="fas fa-quote-left" aria-hidden="true"></i></p>
                        <div class="testimonial_slider">
                            <div>
                            <p class="text2">Leads started increasing slowly but steadily. I'd say, the AI is marvelous. It worked!</p>
                            </div>
                            <div>
                            <p class="text2">270,000 - 1st month sales | 357,000 - 2nd month sales | 590,000 - 6th month sales. Achieved our Target Growth in 6 months. Great support from LeadsPaid team. Thank you!</p>
                            </div>
                            <div>
                            <p class="text2">Created lead generation campaigns myself easily. Every day, get about 20 to 30 leads consistently. I recommend leadspaid.com.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="headshot-container" >
            <img src="{{url('/')}}/assets/images/homepage/hotspot/img-1.png?v1" loading="lazy" alt="spot image" class="headshot headshot-1">
            <img src="{{url('/')}}/assets/images/homepage/hotspot/img-2.png?v1" loading="lazy" alt="spot image" class="headshot headshot-2">
            <img src="{{url('/')}}/assets/images/homepage/hotspot/img-3.png?v1" loading="lazy" alt="spot image" class="headshot headshot-3">
            <img src="{{url('/')}}/assets/images/homepage/hotspot/img-4.png?v1" loading="lazy" alt="spot image" class="headshot headshot-4">
            <img src="{{url('/')}}/assets/images/homepage/hotspot/img-5.png?v1" loading="lazy" alt="spot image" class="headshot headshot-5">
            <img src="{{url('/')}}/assets/images/homepage/hotspot/img-6.png?v1" loading="lazy" alt="spot image" class="headshot headshot-6">
            <img src="{{url('/')}}/assets/images/homepage/hotspot/img-7.png?v1" loading="lazy" alt="spot image" class="headshot headshot-7">
            <img src="{{url('/')}}/assets/images/homepage/hotspot/img-8.png?v1" loading="lazy" alt="spot image" class="headshot headshot-8">
            <img src="{{url('/')}}/assets/images/homepage/hotspot/img-9.png?v1" loading="lazy" alt="spot image" class="headshot headshot-9">
            <div class="headshot-quote-container"> <img src="{{url('/')}}/assets/images/homepage/hotspot/img-10.png?v1" loading="lazy" alt="spot image" class="headshot"> </div>
        </div>
    </div>
    {{-- end Hotspot --}}

    <section id="JoinAsAdvertiser_section" class=" p-1 py-5 p-lg-5" >
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-3">
                    <img src="{{url('/')}}/assets/images/homepage/robot.png" alt="" width="100%" />
                </div>
                <div class="col-lg-8 text-center">
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

                $('.testimonial_slider').slick({
                    dots:false,
                    arrows:true,
                    slidesPerRow:1,
                    slidesToShow:1,
                    autoplay:false,
                    prevArrow:'<button type="button" class="slick-prev"><i class="las la-chevron-circle-left"></i></button>',
                    nextArrow:'<button type="button" class="slick-next"><i class="las la-chevron-circle-right"></i></button>',
                });

                $('.logoSlider').slick({
                    dots:false,
                    arrows:false,
                    slidesPerRow:9,
                    slidesToShow:9,
                    useTransform:false,
                    speed:6000,
                    autoplay:true,
                    autoplaySpeed:0,
                    prevArrow:'<button type="button" class="slick-prev"><i class="las la-chevron-circle-left"></i></button>',
                    nextArrow:'<button type="button" class="slick-next"><i class="las la-chevron-circle-right"></i></button>',
                    responsive: [
                    {
                        breakpoint: 980, // tablet breakpoint
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 480, // mobile breakpoint
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
                });
            });
        </script>
    @endpush

    @push('style')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{url('/')}}/assets/font/fonts.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/templates/leadpaid/css/hotspot_section.css?v1" rel="stylesheet">
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
        #section_advertisers{
            background: #a1c0e0!important;
            /* background: #e0e0e0 url("{{asset('assets/templates/leadpaid/images/')}}/gray_wave_bg.jpg") no-repeat center!important; background-size: cover; */
        }
        #section_advertisers .title{ font-size: 21px!important;  }
        #section_advertisers  .slick-slider{ padding: 0}
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
        @media only screen and (max-width: 1200px) {  #MainHeroHeader{background-position: center left; }  }
        @media only screen and (max-width: 600px) {  #MainHeroHeader{ background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v1-mobile.jpg"); background-position: center right;  }  }
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
        .how-its-works-list{ padding: 0; margin: 0; position: relative;

        }
        @media only screen and (min-width: 991px) { .how-its-works-list{
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-around; } }

        .how-its-works-list li{
            font-size: 22px;
            margin-bottom: 15px;
            /* background: #fff;
            padding: 15px; */
            /* border-radius: 3px;
            box-shadow: 0px 3px 2px #00000008;
            box-shadow: 2px 2px 2px #666;
            border: 5px solid #ccc;
            */
            list-style: none;
            position: relative;
        }
        @media only screen and (min-width: 1024px) {
            /* .how-its-works-list li { margin-bottom: -15px }
            .how-its-works-list li:last-child { margin-bottom: 0 }
            .how-its-works-list li:nth-child(odd){ left: 50px; }
            .how-its-works-list li:nth-child(even){ left: 100px;} */
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
        .media_text .title{ font-size: 50px; }
        .media_text .media_btn{ font-size: 50px; font-weight: bold; color: #fff; background: #11baf3; border: #000 3px solid; padding: 20px; }
        @media only screen and (max-width: 991px) { .media_text .title, .media_text .media_btn{ font-size: 36px;  } }

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

        .marketing_block {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        height: 100%;
        align-items: stretch;
        align-content: space-around;
        padding: 30px;
        }

        .marketing_block.one { background: #f4fbff; }
        .marketing_block.two { background: #f4f5fd; }
        .marketing_block img { display: inline-block; margin: 30px 0;   }
        @media only screen and (min-width: 992px) {
            .marketing_block { display: flex;  flex-wrap: wrap; justify-content: center;  height: 100%; align-items: stretch; align-content: space-around;}
            .marketing_block img {   max-height: 371px; height: 100%; }
        }
        .marketing_block .text2 { text-align: center; }
        .marketing_block  h3 {
        font-size: 32px;
        font-weight: 500 !important;
        }
        .marketing_block h3 span {
            font-size: 24px;
            color: #1a273a;
            font-weight: 600;
            padding-top: 10px;
        }
        .marketing_block p {
            text-align: center;
            font-size: 22px;
        }

        .text2 a { color: #6c6c6c; }
        .text2 a:hover { color: #6c6c6c; }
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

        #JoinAsAdvertiser_section{ background-color: #11baf3;  }
        #JoinAsAdvertiser_section .title{ font-size: 63px }
        #JoinAsAdvertiser_section .button-large{ font-size: 39px; box-shadow: 0px 0px 10px #fff; }
        @media only screen and (max-width: 991px) {  #JoinAsAdvertiser_section .title{ font-size: 55px } }

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
        .logoSlider .slick-slide{ text-align: center; }
        .logoSlider img{
            display: inline-block!important;
            max-width: 200px;
            width: auto;
            padding: 0 15px;
            max-height: 60px;
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
            top: 40%;
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

        .slick-prev { left: -22px;  }
        .slick-next { right: -22px; }

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
