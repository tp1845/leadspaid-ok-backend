
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @if(Route::current()->getName() == 'old-home')
    <meta name="robots" content="noindex, nofollow">
      @endif
      @if(Route::current()->getName() == 'privacy_policy')
    <meta name="robots" content="noindex, nofollow">
      @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.seo')
    <title>{{ $general->sitename($page_title ?? '') }}</title>
    <link rel="icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" sizes="16x16">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <!-- From Validatation CSS -->
    <link rel="stylesheet" href="https://formvalidation.io/vendors/formvalidation/dist/css/formValidation.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{asset('assets/templates/leadpaid/css/blue/styles.min.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset('assets/templates/basic/css/line-awesome.min.css')}}">
    @stack('style-lib')
    @stack('style')

    <style>
      #MainNav a.nav-link {
    color: #fff;
    text-transform: capitalize;
    font-weight: 400;
}
#navbarSupportedContent li:nth-child(2),#navbarSupportedContent li:nth-child(3) {
    border: 2px solid #fff;
    margin: 0px 10px;
}
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
            <nav class="navbar navbar-expand-lg bg-primary " id="MainNav">
                <div class="container">
                <a class="navbar-brand fw-bold logo" href="{{route('home')}}">
                    @if(Request::get('v') == 2 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-2.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 3 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-3.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 4 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-4.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 5 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-5.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 6 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-6.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 7 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-7.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 8 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-8.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 9 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-9.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 10 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-10.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 11 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-11.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 12 )
                    <img src="{{asset('assets/templates/leadpaid/images/logo-12.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 13)
                    <img src="{{asset('assets/templates/leadpaid/images/logo-13.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 14)
                    <img src="{{asset('assets/templates/leadpaid/images/logo-14.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 15)
                    <img src="{{asset('assets/templates/leadpaid/images/logo-15.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 16)
                    <img src="{{asset('assets/templates/leadpaid/images/logo-16.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 17)
                    <img src="{{asset('assets/templates/leadpaid/images/logo-17.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 18)
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.1.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-2')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.2.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-3')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.3.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-4')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.4.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-5')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.5.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6-brainthick')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6-brainthick.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6-2')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6-2.png?v3')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6-3')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6-3.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6-4')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6-4.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6-5')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6-5.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6-6')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6-6.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6-7')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6-7.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6-7-1')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6-7-1.png?v3')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-6-7-2')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.6-7-2.png?v3')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-7')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.7.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-8')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.8.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-8-2')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.8-2.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-8-3')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.8-3.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-8-4')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.8-4.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-8-5')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.8-5.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-9')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.9.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-10')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.10.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-11')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.11.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-12')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.12.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-13')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.13.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-14')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.14.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-15')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.15.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-16')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.16.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-17')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.17.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-18')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.18.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-19')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.19.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == '18-20')
                    <img src="{{asset('assets/templates/leadpaid/images/logo-18.20.png?v2')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 19)
                    <img src="{{asset('assets/templates/leadpaid/images/logo-19.png')}}" style="max-width: 250px" alt="site-logo">
                    @elseif(Request::get('v') == 20)
                    <img src="{{asset('assets/templates/leadpaid/images/logo-20.png')}}" style="max-width: 250px" alt="site-logo">
                    @else
                    <img src="{{asset('assets/templates/leadpaid/images/logo.png')}}?v1" style="max-width: 250px" alt="site-logo">
                    @endif
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    {{--<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.contact')}}">Contact Us</a>
                    </li>
                    @if(!auth()->guard('publisher')->user() && !auth()->guard('advertiser')->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register_advertiser')}}">Join As Advertiser</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login_advertiser')}}">Login</a>
                    </li>
                    @endif
                    @if(auth()->guard('publisher')->user())
                    <li class="nav-item"><a href="{{route('publisher.dashboard')}}" class="nav-link">@lang('Dashboard')</a></li>
                    @endif
                    @if(auth()->guard('advertiser')->user())
                    <li class="nav-item"><a href="{{route('advertiser.dashboard')}}" class="nav-link">@lang('Dashboard')</a></li>
                    @endif
                    </ul>


                </div>
                </div>
            </nav>
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
                            @if(Request::get('v') == 2 )
                            <img src="{{asset('assets/templates/leadpaid/images/logo-2.png')}}" style="max-width: 250px" alt="site-logo">
                           @else
                            <img src="{{asset('assets/templates/leadpaid/images/logo.png')}}" style="max-width: 250px" alt="site-logo">
                           @endif
                        </a>
                        <p class="text-light mt-3" style="font-size: 18px"> 1401 21st Street STE R,<br/> Sacramento,  California 95811<br/> United States </p>
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
                        <li><a href="#">Join as Publisher</a></li>
                        <li><a href="#">Login</a></li>
                      </ul>
                    </div>
                  </div>
                    <div class="footer_social row">
                        <div class="col-12">
                            <ul>
                                {{-- <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                <li><a href="#"><i class="lab la-facebook"></i></a></li>
                                <li><a href="#"><i class="lab la-google-plus"></i></a></li>
                                <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                <li><a href="#"><i class="lab la-vimeo-square"></i></a></li> --}}
                                <li><a href="#"><i class="lab la-linkedin"></i></a></li>
                                <li><a href="#"><i class="lab la-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="footer_copywrite text-center text-light">
                © COPYRIGHT 2022 LEADS PAID INC. ALL RIGHTS RESERVED.
            </div>
          </footer>

          <!-- footer section end -->
        </div> <!-- page-wrapper end -->
        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        @stack('script-lib')
        @stack('script')
        </body>
    </html>
