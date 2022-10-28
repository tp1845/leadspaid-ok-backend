
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @include('partials.seo')
  <title>{{ $general->sitename($page_title ?? '') }}</title>
  <link rel="icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" sizes="16x16">
  <!-- bootstrap 4  -->
  <link rel="stylesheet" href="{{asset('assets/templates/basic/css/vendor/bootstrap.min.css')}}">
  <!-- fontawesome 5  -->
  <link rel="stylesheet" href="{{asset('assets/templates/basic/css/all.min.css')}}">
  <!-- line-awesome webfont -->
  <link rel="stylesheet" href="{{asset('assets/templates/basic/css/line-awesome.min.css')}}">  
  <!-- animate css -->
  <link rel="stylesheet" href="{{asset('assets/templates/basic/css/vendor/animate.min.css')}}">
  <!-- slick slider css -->
  <link rel="stylesheet" href="{{asset('assets/templates/basic/css/vendor/slick.css')}}">
  <!-- gallery video popup plugin css -->
  <link rel="stylesheet" href="{{asset('assets/templates/basic/css/lightcase.css')}}">
  <!-- main css -->
  <link rel="stylesheet" href="{{asset('assets/templates/basic/css/main.css')}}">
  
  <link href="{{ asset('assets/templates/basic/css/color.php') }}?color={{$general->base_color}}&color2={{$general->secondary_color}}"rel="stylesheet" />

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
  <header class="header">
    <div class="header__bottom">
      <div class="container">
        <nav class="navbar navbar-expand-xl p-0 align-items-center">
          <a class="site-logo site-title" href="{{route('home')}}"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="site-logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu ml-auto">
              <li> <a href="{{route('home')}}">@lang('Home')</a></li>
             
              @foreach($pages as $k => $data)
              <li><a href="{{route('pages',[$data->slug])}}">{{trans($data->name)}}</a></li>
              @endforeach  
              <li> <a href="{{route('blog')}}">@lang('Blog')</a></li>
              @if(auth()->guard('publisher')->user() || auth()->guard('advertiser')->user())
               <li> <a href="{{route('ticket')}}">@lang('Contact')</a></li>
               @else
               <li> <a href="{{route('home.contact')}}">@lang('Contact')</a></li>
              @endif
             </ul>
           
             @if(!auth()->guard('publisher')->user() && !auth()->guard('advertiser')->user())
             <div class="nav-right">
              <a href="{{route('login')}}" class="cmn-btn btn-md">@lang('Login')</a>
             </div>
             @endif
          
             <div class="nav-right">
              <select class="select style--two mr-3 langSel">
                @foreach($language as $item)
                    <option value="{{$item->code}}" @if(session('lang') == $item->code) selected  @endif>{{ __($item->name) }}</option>
                @endforeach
              </select>
              @if(auth()->guard('publisher')->user())
              <a href="{{route('publisher.dashboard')}}" class="cmn-btn btn-md">@lang('Dashboard')</a>
              @endif

              @if(auth()->guard('advertiser')->user())
              <a href="{{route('advertiser.dashboard')}}" class="cmn-btn btn-md">@lang('Dashboard')</a>
              @endif
              
             </div>
           </div>
         </nav>
       </div>
     </div><!-- header__bottom end -->
    </header>
  <!-- header-section end  -->

    @yield('content')

        <!-- footer section start -->
     @include($activeTemplate.'partials.footer')
          <!-- footer section end -->
        </div> <!-- page-wrapper end -->
          <!-- jQuery library -->

        @include('admin.partials.notify')
        <script src="{{asset('assets/templates/basic/js/vendor/jquery-3.5.1.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="{{asset('assets/templates/basic/js/vendor/bootstrap.bundle.min.js')}}"></script>
        <!-- gallery video popup plugin js -->
        <script src="{{asset('assets/templates/basic/js/vendor/lightcase.js')}}"></script>
        <!-- slick slider js -->
        <script src="{{asset('assets/templates/basic/js/vendor/slick.min.js')}}"></script>
        <!-- scroll animation -->
        <script src="{{asset('assets/templates/basic/js/vendor/wow.min.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('assets/templates/basic/js/app.js')}}"></script>
        <script src="{{asset('assets/templates/basic/js/jquery.nice-select.min.js')}}"></script>
  
        @include('partials.plugins')
        @stack('script-lib')
        @stack('script')

        <script>
          (function ($) {
              "use strict";
              $(document).on("change", ".langSel", function() {
                  window.location.href = "{{url('/')}}/change/"+$(this).val() ;
              });
              $('.nic-select').niceSelect();
          })(jQuery);
        </script>

        </body>
    </html>
