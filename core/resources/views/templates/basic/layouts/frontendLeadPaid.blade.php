
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

    <link href="{{asset('assets/templates/leadpaid/css/styles.min.css')}}" rel="stylesheet" >

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
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
              <a class="navbar-brand fw-bold logo" href="{{route('home')}}"><span class="text-dark">Leads</span><span class="text-danger">Paid.com</span></a>
              {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button> --}}
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
               {{-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                  </li>
                </ul> --}}

                <a href="{{route('home')}}" class="btn btn-secondary ms-auto">Generate Leads</a>
              </div>
            </div>
          </nav>
     </header>
  <!-- header-section end  -->

  @yield('content')

        <!-- footer section start -->
        {{-- @include($activeTemplate.'partials.footer') --}}
          <!-- footer section end -->
        </div> <!-- page-wrapper end -->



        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        @stack('script-lib')
        @stack('script')


        </body>
    </html>
