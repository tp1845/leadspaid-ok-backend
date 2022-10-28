@extends($activeTemplate.'layouts.publisher.master')

@section('content')
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version">
        @include($activeTemplate.'publisher.partials.sidenav')
        @include($activeTemplate.'publisher.partials.topnav')

        <div class="body-wrapper active">
            <div class="bodywrapper__inner">

                @include($activeTemplate.'publisher.partials.breadcrumb')

                @yield('panel')


            </div><!-- bodywrapper__inner end -->
        </div><!-- body-wrapper end -->
    </div>



@endsection

