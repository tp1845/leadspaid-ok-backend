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
    <section class="text-center text-white p-4 MainBanner-bottom onload" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Pay Only For Leads, Not Clicks Or Impressions.</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="onload">
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
    <section id="how_it_works" class="p-1 py-5 p-lg-5 onload" >
        <div class="container ">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="title mb-5">How It Works</h2>
                </div>
            </div>

            <div class="row align-item-center justify-content-center">
                <div class="col-lg-5 order-1 order-lg-0">
                    <ul class="how-its-works-list">

                        <li class="onload slow">
                            <b><span>1</span> AI Embeds Lead Form</b>
                            <p>Our AI algorithm embeds your lead form into popular publishers' landing pages.</p>
                        </li>
                        <li class="onload slow">
                            <b><span>2</span> Relevant Audience Fill Out The Form</b>
                            <p>Visitors who have a strong interest in topics related to your lead generation campaigns fill out your lead form on these landing pages.</p>
                        </li>
                        <li class="onload slow">
                            <b><span>3</span> Downlead Leads </b>
                            <p>Advertisers can simply download their leads instantly.</p>
                        </li>
                        <li class="onload slow">
                            <b><span>4</span> Deep Learning Optimizer </b>
                            <p>Our deep learning optimizer steadily improves your sales lead quality score up to 100% efficiency.</p>
                        </li>
                    </ul>
                    <div class="media_text mt-2 mt-lg-5 text-center d-block d-lg-none">
                        <h2 class="title">RESULT</h2>
                        <p class="media_btn">GREAT LEADS<br/>GREAT SALES!!!</p>
                    </div>
                </div>
                <div class="col-lg-5 text-center order-0 order-lg-1 ">
                    <div class="media-wrapper mb-5 mb-lg-0">
                        <video id="player1" width="640" height="360" style="max-width:100%;" poster="{{url('/')}}/assets/images/video/how-its-works-thumb.jpg" preload="none" controls playsinline webkit-playsinline>
                            <source src="{{url('/')}}/assets/images/video/how-its-works-video.mp4" type="video/mp4">
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

    <div class="marketing onload">
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
                        <span>Distinct from Search, Display, and <br> Programmatic Ads</span></h3>
                        <img src="{{url('/')}}/assets/images/homepage/banner-02.png?v1" class="img-fluid" alt="leadsPaid">
                        <p>Get leads instead of buying website traffic <br/>through PPC, video or banner ads.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="marketing_block two"  >
                        <h3>High Quality Lead Gen Platform<br>
                        <span>To generate leads without a website or <br>social media</span></h3>
                        <img src="{{url('/')}}/assets/images/homepage/leadgeneration.png" class="img-fluid" alt="leadsPaid">
                        <p>Generate leads through popular high traffic <br> and targeted websites/Apps.</p>
                    </div>
                </div>
            </div><!-- /.row -->

        </div>
    </div>
    <section id="section_advertisers" class="bg-light p-1 pt-3 pt-lg-4 pb-4 pb-lg-5 onload" >
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
                    <img src="{{url('/')}}/assets/images/homepage/brands/merrill.png" alt="" >
                </div>
                <div>
                    <img src="{{url('/')}}/assets/images/homepage/brands/lake-austin.png" alt="" >
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
    <div id="hotspot_section" class="onload section bg-gray d-flex justify-content-center align-items-center" style="overflow: hidden">
        <div class="container" style="position: relative; z-index: 10;" >
            <div class="row justify-content-center align-items-center" >
                <div class="col-12 mb-3 mb-lg-5">
                    <h2 class="title text-center"><strong>What Leading Companies Say About Us?</strong></h2>
                </div>
                <div class="col-lg-8 col-xl-8 ">
                    <div class="testimonial_block">
                        <p class=" h2 p-0 text-muted" style="padding-left: 22px!important"><i class="fas fa-quote-left" aria-hidden="true"></i></p>
                        <div class="testimonial_slider">
                            <div>
                            <p class="text2">Leads started increasing slowly but steadily. I'd say, the AI is marvelous. It worked!</p>
                            </div>
                            <div>
                            <p class="text2">270k - 1st month sales | 357k - 2nd month sales | 590k - 6th month sales. Achieved our growth target in 6 months! Strongly recommend. </p>
                            </div>
                            <div>
                            <p class="text2">Created lead generation campaigns myself easily. Every day, get about 20 to 30 leads consistently. I recommend leadspaid.</p>
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

    <section id="JoinAsAdvertiser_section" class="onload p-1 py-5 p-lg-5" >
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
    <section class="MainBanner-Home onload">
        <div class="container">
            <div class="row align-item-center justify-content-center align-items-center">
                <div class="col-lg-12 hero-text-col">
                    @if(Request::get('sub') == 1 )
                        <h4 class="sub_title">An AI-Powered Leads Ad Network</h4>
                    @endif
                    <h1 class="h1 hero_title">Generate Leads Directly</h1>
                    {{-- <p>From High Ranking/ Popular/ Authority Sites & Apps</p> --}}
                    <div class="d-block text-center">
                        <p class="verticalFlip">
                            <span>From High Ranking, Popular, Authority Sites & Apps.</span>
                            <span>No Website or Social Media Needed!</span>
                            <span>From High Ranking, Popular, Authority Sites & Apps.</span>
                            <span>No Website or Social Media Needed!</span>
                            {{-- <span>Horrible.</span>
                            <span>Magnificent.</span>
                            <span>Adorable.</span> --}}
                        </p>
                    </div>

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
                    speed: 300,
                    slidesPerRow:1,
                    slidesToShow:1,
                    autoplay:true,
                    autoplaySpeed:5000,
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
                    draggable:false,
                    infinite:true,
                    pauseOnFocus:false,
                    pauseOnHover:false,
                    prevArrow:'',
                    nextArrow:'',
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
    <link href="{{url('/')}}/assets/templates/leadpaid/css/hotspot_section.css?v2" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"  />
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

        .testimonial_slider .slick-arrow{ color: #003561; }
        .testimonial_slider p{  font-size: 20px!important;  }


        /*Vertical Flip*/
        .verticalFlip{
            display: inline-block;
            text-indent: 8px;
            text-align: center;
            height: 75px;
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        .verticalFlip span{
            animation: vertical 16s linear infinite 0s;
            -ms-animation: vertical 16s linear infinite 0s;
            -webkit-animation: vertical 16s linear infinite 0s;
            color: #fff;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            width: 100%;
            text-align: center;
            top: 0;
            left: 0;
        }
        .verticalFlip span:nth-child(2){
            animation-delay: 4s;
            -ms-animation-delay: 4s;
            -webkit-animation-delay: 4s;
        }
         .verticalFlip span:nth-child(3){
            animation-delay: 8s;
            -ms-animation-delay: 8s;
            -webkit-animation-delay: 8s;
        }
        .verticalFlip span:nth-child(4){
            animation-delay: 12s;
            -ms-animation-delay: 12s;
            -webkit-animation-delay: 12s;
        }
        /*.verticalFlip span:nth-child(5){
            animation-delay: 10s;
            -ms-animation-delay: 10s;
            -webkit-animation-delay: 10s;
        } */

        /*Vertical Flip Animation*/
        /* @-moz-keyframes vertical{
            0% {  opacity: 0; }
            5% {  opacity: 0; -moz-transform: rotateX(180deg); }
            10% { opacity: 1; -moz-transform: translateY(0px); }
            25% { opacity: 1; -moz-transform: translateY(0px); }
            30% { opacity: 0; -moz-transform: translateY(0px); }
            80% { opacity: 0; }
            100% { opacity: 0;}
        } */
        @-webkit-keyframes vertical{

           0% {  opacity: 0;  -webkit-transform: translateY(100px); }
            10% { opacity: 1; -webkit-transform: translateY(0px); }
            25% { opacity: 1; -webkit-transform: translateY(0px); }
            30% { opacity: 0; -webkit-transform: translateY(-100px); }
            80% { opacity: 0; }
            100% { opacity: 0; }
        }
        /* @-ms-keyframes vertical{
            0% { opacity: 0; }
            5% { opacity: 0; -ms-transform: rotateX(180deg); }
            10% { opacity: 1; -ms-transform: translateY(0px); }
            25% { opacity: 1; -ms-transform: translateY(0px); }
            30% { opacity: 0; -ms-transform: translateY(0px); }
            80% { opacity: 0; }
            100% { opacity: 0; }
        }
 */

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
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v3.jpg");
            @elseif(Request::get('bg') == 4 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v4.jpg");
            @elseif(Request::get('bg') == 5 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v5.jpg");
            @elseif(Request::get('bg') == 6 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v6.jpg");
            @elseif(Request::get('bg') == 7 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v7.jpg");
            @elseif(Request::get('bg') == 8 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v8.jpg");
            @elseif(Request::get('bg') == 9 )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v9.1.jpg");
            @elseif(Request::get('bg') == "9.2" )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v9.2.jpg");
            @elseif(Request::get('bg') == "9.3" )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v9.3.jpg");
            @elseif(Request::get('bg') == "9.3.2" )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v9.3.jpg");
            @elseif(Request::get('bg') == "9.4" )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v9.4.jpg");
            @elseif(Request::get('bg') == "9.5" )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v9.5.jpg");
            @elseif(Request::get('bg') == "9.6" )
                background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v9.6.jpg");
            @endif
            background-position: center;
            background-size: cover;
            position: relative;
        }
        @media o
        @media only screen and (max-width: 1200px) {  #MainHeroHeader{background-position: center left; }  }
        @media only screen and (max-width: 600px) {  #MainHeroHeader{ background-image: url("{{url('/')}}/assets/images/homepage/home-hero-v1-mobile.jpg"); background-position: center right;  }  }
        @if(Request::get('over') == 1 )
        #MainHeroHeader:before {
            content: '';
            width: 100%;
            height: 100%;
            background: rgba(0, 80, 171, 0.74);
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            mix-blend-mode: soft-light;
        }

        #MainHeroHeader:after {
            content: '';
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            mix-blend-mode: darken;
        }
        @else
        #MainHeroHeader:before{
            background-color: #1a273a;
            opacity: .7;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: block;
            content: "";
            z-index: 1;
        }
        @endif
        #MainHeroHeader:before{
            @if(Request::get('bg') == "9.2" || Request::get('bg') == "9.3" || Request::get('bg') == "9.4" || Request::get('bg') == "9.5" || Request::get('bg') == "9.6")
                background-color: #00000066!important;
                opacity: 1!important;
            @elseif(Request::get('bg') == "9.3.2" )
                background-color: #151f5688!important;
                opacity: 1!important;
            @endif
        }

        #MainHeroHeader  #MainNav, #MainHeroHeader .MainBanner-Home { position: relative; z-index: 10; }

        #MainNav{ background-color: transparent!important; border-bottom: 0!important;
            /* box-shadow: 1px 1px 100px #ffffff; */
         }
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
            box-shadow: 0px -2px 0px #4335e3;
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

        @media only screen and (max-width: 568px) {
            .MainBanner-Home .sub_title{
                font-size: 19px;
                padding: 3px 12px;
            }
        }
        @media only screen and (max-width: 600px) {
            .MainBanner-Home  { position: relative; }
            .MainBanner-Home .sub_title{ position: absolute; width: calc(100% - 60px);  left: 30px; top: 15px;  }
        }
        @media only screen and (max-width: 503px) {
            .MainBanner-Home .sub_title{ width: calc(100% - 30px); left: 15px;   }
        }
        @media only screen and (max-width: 378px) {
            .MainBanner-Home .sub_title{    }
        }

        /* Hero */
        .hero-box{ border: 0 solid #fff; width: 100%; padding: 30px; text-align: center; height: 100%;; display: flex; flex-direction: column;  align-items: center; justify-content: center; }
        .hero-box h4{ font-size: 46px; font-weight: bold; color: #1361b2 }
        .hero-box h5{ font-size: 26px; font-weight: normal;  color: #1361b2 }
        /* === */

        .MainBanner-bottom{box-shadow: 0px 2px 67px #1361b2; background-color:#0a0434; }

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

        .how-its-works-list li.onload.start {
            display: inline-block;
            animation: slideInUp; /* referring directly to the animation's @keyframe declaration */
            animation-duration: 2s; /* don't forget to set a duration! */
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

        .marketing_block.one { background: #f4f5fd; }
        .marketing_block.two { background: #f4fbff; }
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
            border: 0px solid #4833e6!important;
        }
         @media only screen and (max-width: 991px) {   .MainBanner-Home .btn, .button-large {  margin-top: 0 !important; } }
        .MainBanner-Home .btn{ background-color: #4833e6!important; }
        #JoinAsAdvertiser_section{ background-color: #11baf3; margin-bottom: -2px; }
        #JoinAsAdvertiser_section .title{ font-size: 63px }
        #JoinAsAdvertiser_section .button-large{ font-size: 39px; box-shadow: 7px 7px 10px #1a273a }
        @media only screen and (max-width: 991px) {  #JoinAsAdvertiser_section .title{ font-size: 55px } }


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
            width: 100%;
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
