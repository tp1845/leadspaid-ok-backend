<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @include('partials.seo')
  <title>{{ $general->sitename($page_title ?? '') }}</title>
  <!-- site favicon -->
  <link rel="shortcut icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
  <!-- bootstrap 4  -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/bootstrap.min.css')}}">
  <!-- bootstrap toggle css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/bootstrap-toggle.min.css')}}">
  <!-- fontawesome 5  -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/all.min.css')}}">
  <!-- line-awesome webfont -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/line-awesome.min.css')}}">
  <!-- custom select box css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/nice-select.css')}}">
  <!-- code preview css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/prism.css')}}">
  <!-- select 2 css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/select2.min.css')}}">
  <!-- data table css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/datatables.min.css')}}">
  <!-- jvectormap css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/jquery-jvectormap-2.0.5.css')}}">
  <!-- datepicker css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/datepicker.min.css')}}">
  <!-- timepicky for time picker css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/jquery-timepicky.css')}}">
  <!-- bootstrap-clockpicker css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/bootstrap-clockpicker.min.css')}}">
  <!-- bootstrap-pincode css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/bootstrap-pincode-input.css')}}">

  <link rel="stylesheet" href="{{asset('assets/userpanel/css/lightcase.css')}}">
  <!-- dashdoard main css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/app.css')}}">

  <link rel="stylesheet" href="{{asset('assets/additional/bootstrap-fileinput.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/intlTelInput.css')}}">

  @stack('style')
  @stack('style-lib')
</head>

<body>
  <!-- page-wrapper start -->
  <div class="page-wrapper default-version">


    @yield('content')



    <!-- bootstrap js -->
    <script src="{{asset('assets/userpanel/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <!-- bootstrap-toggle js -->
    <script src="{{asset('assets/userpanel/js/vendor/bootstrap-toggle.min.js')}}"></script>
    <!-- slimscroll js for custom scrollbar -->
    <script src="{{asset('assets/userpanel/js/vendor/jquery.slimscroll.min.js')}}"></script>
    <!-- custom select box js -->
    <script src="{{asset('assets/userpanel/js/vendor/jquery.nice-select.min.js')}}"></script>
    <!-- code preview js -->
    <script src="{{asset('assets/userpanel/js/vendor/prism.js')}}"></script>
    <!-- seldct 2 js -->
    <script src="{{asset('assets/userpanel/js/vendor/select2.min.js')}}"></script>

    <script src="{{asset('assets/userpanel/js/vendor/lightcase.js')}}"></script>
    <!-- data-table js -->
    <script src="{{asset('assets/userpanel/js/vendor/datatables.min.js')}}"></script>
    <!-- apex chart js -->
    <script src="{{asset('assets/userpanel/js/vendor/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
    <!-- apex chart init -->

    <!-- main js -->
    <script src="{{asset('assets/userpanel/')}}/js/app.js"></script>

    @include('templates.basic.advertiser.partials.notify')
    @stack('script-lib')

    <script>
      'use strict'
      bkLib.onDomLoaded(function() {
        $(".nicEdit").each(function(index) {
          $(this).attr("id", "nicEditor" + index);
          new nicEditor({
            fullPanel: true
          }).panelInstance('nicEditor' + index, {
            hasPanel: true
          });
        });
      });
    </script>

    @stack('script')

</body>

</html>