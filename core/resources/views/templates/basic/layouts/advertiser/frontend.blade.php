@extends($activeTemplate.'layouts.advertiser.master')

@section('content')
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version">
        @include($activeTemplate.'advertiser.partials.sidenav')
        @include($activeTemplate.'advertiser.partials.topnav')

        <div class="body-wrapper active">
            <div class="bodywrapper__inner">
                @include($activeTemplate.'advertiser.partials.breadcrumb')
                @yield('panel')
            </div>
        </div>
    </div>
@endsection

