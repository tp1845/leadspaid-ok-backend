<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @include('partials.seo')
  <title>{{ $general->sitename($page_title ?? '') }}</title>
  <!-- jQuery library -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <!-- site favicon -->
  <link rel="shortcut icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
  <!-- From Validatation CSS -->
  <link rel="stylesheet" href="https://formvalidation.io/vendors/formvalidation/dist/css/formValidation.min.css" />
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

  <!-- Date Range -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.1/daterangepicker.css" integrity="sha512-vB+6aywqvdBc0/r7xwj5JnbDphFWuv/gSmD74Po2lPSEHWgKPnFp3V3KiX1cTs2b5+ADL7MUlsCUsKOYACCzTQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.1/daterangepicker.js" integrity="sha512-579zfXNAZQ+cP+glXfRntf5TLH444tC8wQ7CsFE8vELKtaKhx8sdWGPYvEXhSxuFXBgWBp942j7yB6JcJ+HxfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

  <!-- Stripe -->
  <script src="https://js.stripe.com/v3/"></script>

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
    <!-- Form Validatation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
    <script src="https://formvalidation.io/vendors/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="https://formvalidation.io/vendors/formvalidation/dist/js/plugins/Bootstrap.min.js"></script>

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