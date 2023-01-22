
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @if(Route::current()->getName() == 'old-home' || Route::current()->getName() == 'new-home')
        <meta name="robots" content="noindex, nofollow">
    @endif
    @if(Route::current()->getName() == 'privacy_policy')
        <meta name="robots" content="noindex, nofollow">
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.seo')
    <title>{{ $general->sitename($page_title ?? '') }}</title>

    <link rel="canonical" href="{{ Request::url() }}" />
    <meta property="og:locale" content="en_US" />

    <link rel="icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" sizes="16x16">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <!-- From Validatation CSS -->
    <link rel="stylesheet" href="https://formvalidation.io/vendors/formvalidation/dist/css/formValidation.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{asset('assets/templates/leadpaid/css/blue/styles.min.css?v1')}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset('assets/templates/basic/css/line-awesome.min.css')}}">
    @stack('style-lib')
    @stack('style')
    <style>
        #MainNav a.nav-link { color: #fff; text-transform: capitalize; font-weight: 400; }
        #navbarSupportedContent li:nth-child(4) {  border: 2px solid #fff; margin: 0px 10px; }
        #navbarSupportedContent li:nth-child(4) a.nav-link:after { display: none!important;  }
        #MainNav .active a.nav-link{  }
        #MainNav a.nav-link { position: relative; }
        #MainNav a.nav-link:after { content: ""; position: absolute; left: 0px; bottom: 0px; width: 0; height: 2px;  transition: width 320ms ease-in; background-color: rgba(242, 245, 248, 1.0);  margin: 0 25px; }
        #MainNav a.nav-link:hover{   color: #3375f5!important }
        #MainNav a.nav-link:hover:after { background-color: #3375f5;}
        @media only screen and (min-width: 992px) { #MainNav a.nav-link:hover:after, #MainNav .active a.nav-link:after{  width: calc( 100% - 50px);  color: inherit } }
    </style>
</head>
  <body>
    @php
        echo fbcomment();
    @endphp
    <div class="preloader">
      <div class="preloader-container">
        <span class="animated-preloader"></span>
      </div>
    </div>

    <!-- scroll-to-top start -->
    <div class="scroll-to-top" style="display:none">
      <span class="scroll-icon">
        <i class="fa fa-rocket" aria-hidden="true"></i>
      </span>
    </div>
    <!-- scroll-to-top end -->
  <div class="page-wrapper">
    <div id="MainHeroHeader">
        <!-- header-section start  -->
        <header>
            <div id="MainNav-container">
                <div id="MainNav">
                    <nav class="navbar navbar-expand-lg no-fixed" >
                        @include('templates.basic.partials.main-nav')
                    </nav>
                    <nav class="navbar navbar-expand-lg fixed" style="top: -100px; position: fixed;"  >
                        @include('templates.basic.partials.main-nav')
                    </nav>
                </div>
            </div>
        </header>
        <!-- header-section end  -->
        @stack('hero')
    </div>
    @yield('content')
        <!-- footer section start -->
        {{-- @include($activeTemplate.'partials.footer') --}}
        @php
        $footer = getContent('footer.content',true);
        $footer = $footer->data_values;
        $overview = getContent('overview.content',true);
        $overview =  $overview->data_values;
        $policies = getContent('policy.element',false);
        @endphp

        <footer id="MainFooter" class="mt-md-5 pt-4 pt-md-5 border-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md">
                        <a class="navbar-brand fw-bold logo" href="{{route('home')}}">
                            <img src="{{asset('assets/templates/leadpaid/images/logo-18-b-rectangle-60-2-wide-1.png?v1')}}" style="max-width: 218px" alt="site-logo">
                        </a>
                        <p class="text-light mt-3" style="font-size: 18px">Leads Paid Inc.<br/>5214F Diamond Heights Blvd<br/>San Francisco, CA 94131 </p>
                    </div>
                    <div class="col-6 col-md">
                      <h5>Company</h5>
                      <ul class="list-unstyled text-small">
                        {{-- <li><a href="#">About </a></li> --}}
                        <li><a href="{{route('home.contact')}}">Contact Us</a></li>
                        <li>
                            <a href="{{route('privacy_policy')}}">Privacy Policy</a>
                        </li>
                        <!-- <li>
                            <a href="{{route('terms_condition')}}">Terms & Condition</a>
                        </li> -->
                      </ul>
                    </div>
                    <div class="col-6 col-md">
                      <h5>Advertiser</h5>
                      <ul class="list-unstyled text-small">
                        <li><a href="{{route('register_advertiser')}}">Join as Advertiser </a></li>
                        <li><a href="{{route('login_advertiser')}}">Login</a></li>
                      </ul>
                    </div>
                    <div class="col-6 col-md">
                      <h5>Publisher</h5>
                      <ul class="list-unstyled text-small">
                        <li><a href="https://www.leadspaid.com/contact-us">Join as Publisher</a></li>
                        {{-- <li><a href="#">Login</a></li> --}}
                      </ul>
                    </div>
                  </div>
                    <div class="footer_social row">
                        <div class="col-12">
                            <ul>
                                {{-- <li><a target="_blank" href="#"><i class="lab la-twitter"></i></a></li>
                                <li><a target="_blank" href="#"><i class="lab la-facebook"></i></a></li>
                                <li><a target="_blank" href="#"><i class="lab la-google-plus"></i></a></li>
                                <li><a target="_blank" href="#"><i class="lab la-instagram"></i></a></li>
                                <li><a target="_blank" href="#"><i class="lab la-vimeo-square"></i></a></li> --}}
                                <li><a target="_blank" href="https://www.linkedin.com/company/leadspaid/"><i class="lab la-linkedin"></i></a></li>
                                <li><a target="_blank" href="https://www.youtube.com/@LeadsPaid"><i class="lab la-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="footer_copywrite text-center text-light">
                © Copyright 2023 LEADS PAID INC. All rights reserved.
            </div>
          </footer>
          <!-- footer section end -->
        </div> <!-- page-wrapper end -->
        @include('admin.partials.notify')
        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        @stack('script-lib')
       <script>

        var $animation_elements = $('.onload');
        var $window = $(window);

        function check_if_in_view() {
            var window_height = $window.height();
            var window_top_position = $window.scrollTop();
            var window_bottom_position = (window_top_position + window_height);
            $.each($animation_elements, function() {
                var $element = $(this);
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);
                if ((element_bottom_position >= window_top_position) &&  (element_top_position <= window_bottom_position)) {  $element.addClass('in-view').addClass('start').animate({opacity: 1.0}, 800);  } else { $element.removeClass('in-view'); }
            });
        }
        $window.on('scroll resize', check_if_in_view);
        $window.trigger('scroll');
        $("document").ready(function($){
            var nav = $('#MainNav-container');
            var height = $('#MainNav-container').outerHeight();
            $('#MainNav-container').height(height);
            $window.scroll(function () { if ($(this).scrollTop() > 200) { nav.addClass("f-nav"); } else { nav.removeClass("f-nav"); } });
        });
        </script>
        @stack('script')
            <style>
                .onload{
                    transition:all .2s ease;
                    opacity: 0;
                    transform: translate3d(0px, -10px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                    transform-style: preserve-3d;
                }
                .onload.start{
                    opacity: 1;
                    transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg);
                    transform-style: preserve-3d;
                }



                #MainNav{ z-index: 9999!important; }
                @if(Request::is('/') || Request::get('v') == '18-b-rectangle-60' )
                    #MainNav .navbar.no-fixed{ background-color: #000011cc!important;   }
                @else
                    #MainNav .navbar.no-fixed{ background-color: #08071b!important;   }
                @endif
                #MainNav .navbar.fixed{
                    position: fixed;
                    overflow: hidden;
                    width: 100%;
                    z-index: 999!important;;
                    top: -100px;
                    left: 0;
                    transition:all .5s ease;
                    background-color: #fff!important;
                    box-shadow: 0 5px 15px rgb(0 0 0 / 10%)!important;
                }

                #MainNav-container.f-nav #MainNav .navbar.fixed{ top: 0!important; }
                @media screen and (max-width: 992px){
                    /* #MainNav .logo{ margin: auto; } */
                     #MainNav .logo img{ max-width: 175px!important;}
                    #MainNav-container:not(.f-nav) .navbar.fixed .navbar-collapse { display: none!important; opacity: 0;}
                }

                #MainNav .navbar.fixed  a.nav-link { color: #000;  }
                #MainNav .navbar.fixed li:nth-child(4) { border: 2px solid #000; }
                #MainNav .navbar.fixed .navbar-toggler .navbar-toggler-icon { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0,0,0, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")!important;'' }

                #MainFooter {
                    margin-top: 0 !important;
                    position: relative;
                }
                #MainFooter:before{
                    background-image: url("{{url('/')}}/assets/templates/leadpaid/images/footer-bg-2.jpg?v1");
                    background-position: center;
                    background-size: cover;
                    position: relative;
                    background-color: #1a273a;
                    opacity: .3;
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    display: block;
                    content: "";
                    z-index: 1;
                }
                #MainFooter .container, .footer_copywrite { position: relative; z-index: 10;}
            </style>
        </body>
    </html>
