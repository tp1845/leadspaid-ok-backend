<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $general->sitename($page_title ?? '') }}</title>
    <!-- jQuery library -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <!-- site favicon -->
    <link rel="shortcut icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/bootstrap.min.css') }}">
    <!-- bootstrap toggle css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-toggle.min.css')}}">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/all.min.css')}}">
    <!-- line-awesome webfont -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/line-awesome.min.css')}}">

    @stack('style-lib')

    <!-- custom select box css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/nice-select.css')}}">
    <!-- code preview css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/prism.css')}}">
    <!-- select 2 css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/select2.min.css')}}">
    <!-- jvectormap css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/jquery-jvectormap-2.0.5.css')}}">
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/datepicker.min.css')}}">
    <!-- timepicky for time picker css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/jquery-timepicky.css')}}">
    <!-- bootstrap-clockpicker css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-clockpicker.min.css')}}">
    <!-- bootstrap-pincode css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-pincode-input.css')}}">
    <!-- dashdoard main css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/app.css')}}">

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    @stack('style')
	<style>
	
table thead tr th {
    position: relative;
}
table thead tr th:after {
    bottom: 50% !important;
    content: "▲" !important;
    position: absolute !important;
    right: 10px !important;
    top: 10px !important;
    opacity: .125 !important;
    line-height: 9px !important;
    font-size: .9em !important;
}
table thead tr th:before {
    content: "▼" !important;
    position: absolute;
    right: 10px !important;
    bottom: 10px !important;
    opacity: .125 !important;
    line-height: 9px !important;
    font-size: .9em !important;
}

.card-header {
    display: none;
}
#datatable5_previous, #datatable5_next, #leadsTable_previous, #leadsTable_next, #publisher_admin_previous, #publisher_admin_next {
    color: transparent;
}
.paginate_button {
    margin: 5px 7px;
    position: relative;
    width: 35px;
    height: 35px;
    border: 1px solid #dee2e6;
    line-height: 35px;
    text-align: center;
    cursor: pointer;
    color: #5b6e88;
}
.paginate_button.previous:after {
    position: absolute;
    top: 0;
    right: 11px;
    font-family: "Font Awesome 5 Free";
    font-weight: 700;
    content: "\f104";
    font-size: 16px;
    color: #5b6e88;
}
.paginate_button.next:after {
    position: absolute;
    top: 0;
    right: 11px;
    font-family: "Font Awesome 5 Free";
    font-weight: 700;
    content: "\f105";
    font-size: 16px;
    color: #5b6e88;
}

	</style>
</head>
<body>
@yield('content')



<!-- bootstrap js -->
<script src="{{asset('assets/admin/js/vendor/bootstrap.bundle.min.js')}}"></script>
<!-- bootstrap-toggle js -->
<script src="{{asset('assets/admin/js/vendor/bootstrap-toggle.min.js')}}"></script>

<!-- slimscroll js for custom scrollbar -->
<script src="{{asset('assets/admin/js/vendor/jquery.slimscroll.min.js')}}"></script>
<!-- custom select box js -->
<script src="{{asset('assets/admin/js/vendor/jquery.nice-select.min.js')}}"></script>


@include('admin.partials.notify')
@stack('script-lib')

<script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>

<!-- code preview js -->
<script src="{{asset('assets/admin/js/vendor/prism.js')}}"></script>
<!-- seldct 2 js -->
<script src="{{asset('assets/admin/js/vendor/select2.min.js')}}"></script>
<!-- main js -->
<script src="{{asset('assets/admin/js/app.js')}}"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

{{-- LOAD NIC EDIT --}}
<script>
    (function($,document){
        "use strict";
        bkLib.onDomLoaded(function() {
            $( ".nicEdit" ).each(function( index ) {
                $(this).attr("id","nicEditor"+index);
                new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
            });
        });
        $( document ).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain',function(){
            $('.nicEdit-main').focus();
        });
    })(jQuery, document);
</script>

@stack('script')
<script>
    $(".breadcrumb-plugins").find('.page-title').hide();
     $(".breadcrumb-plugins").find('form').hide();
$(window).on('load', function () {
   
setTimeout(function(){

 var ctext= $(".breadcrumb-plugins").find(".page-title").text();
   $(".dataTables_filter").append('<span>'+ctext+'</span>');
   }, 500);
   }); 

</script>

</body>
</html>
