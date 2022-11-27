
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,500&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="{{asset('assets/templates/leadpaid/css/blue/styles.min.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset('assets/templates/basic/css/line-awesome.min.css')}}">
    @stack('style-lib')
    @stack('style')
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
    <div class="scroll-to-top">
      <span class="scroll-icon">
        <i class="fa fa-rocket" aria-hidden="true"></i>
      </span>
    </div>
    <!-- scroll-to-top end -->
  <div class="page-wrapper">
      <!-- header-section start  -->

      <header>
        <nav class="navbar navbar-expand-lg bg-primary " id="MainNav">
            <div class="container">
              <a class="navbar-brand fw-bold logo" href="{{route('home')}}">
                <img src="{{asset('assets/templates/leadpaid/images/logo.png')}}" style="max-width: 250px" alt="site-logo">
                </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('home.contact')}}">Contact Us</a>
                  </li>
                  {{-- @if(!auth()->guard('publisher')->user() && !auth()->guard('advertiser')->user()) --}}
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Advertiser Login</a>
                  </li>
                  {{-- @endif --}}
                </ul>


              </div>
            </div>
          </nav>
     </header>
  <!-- header-section end  -->

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

        <footer class="pt-4 my-md-5 pt-md-5 border-top" id="MainFooter">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md">
                        <a class="navbar-brand fw-bold logo" href="{{route('home')}}">
                            <img src="{{asset('assets/templates/leadpaid/images/logo.png')}}" style="max-width: 250px" alt="site-logo">
                        </a>
                    </div>
                    <div class="col-6 col-md">
                      <h5>Company</h5>
                      <ul class="list-unstyled text-small">
                        <li><a href="#">About </a></li>
                        <li><a href="{{route('home.contact')}}">Contact Us</a></li>
                        <li>
                            <a href="{{route('privacy_policy')}}">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{route('terms_condition')}}">Terms & Condition</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-6 col-md">
                      <h5>Advertiser</h5>
                      <ul class="list-unstyled text-small">
                        <li><a href="#">Join as Advertiser </a></li>
                        <li><a href="#">Login</a></li>
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
                                <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                <li><a href="#"><i class="lab la-facebook"></i></a></li>
                                <li><a href="#"><i class="lab la-google-plus"></i></a></li>
                                <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                <li><a href="#"><i class="lab la-vimeo-square"></i></a></li>
                                <li><a href="#"><i class="lab la-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="footer_copywrite text-center text-light">
                © COPYRIGHT 2022  LEADSPAID.COM. ALL RIGHTS RESERVED
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
