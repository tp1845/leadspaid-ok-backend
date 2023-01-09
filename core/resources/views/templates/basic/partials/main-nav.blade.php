<div class="container">
    <a class="navbar-brand fw-bold logo" href="{{route('home')}}">
        @if(Request::is('/'))
            <img src="{{asset('assets/templates/leadpaid/images/logo.png')}}?v1" style="max-width: 250px" alt="site-logo">
        @elseif(Request::get('v') == '18-b-rectangle-60-1' )
            <img src="{{asset('assets/templates/leadpaid/images/logo-18-b-rectangle-60-1.png?v1')}}" style="max-width: 250px" alt="site-logo">
        @elseif(Request::get('v') == '18-b-rectangle-60-2' )
            <img src="{{asset('assets/templates/leadpaid/images/logo-18-b-rectangle-60-2.png?v1')}}" style="max-width: 250px" alt="site-logo">
        @elseif(Request::get('v') == '18-b-rectangle-60-2-wide-1' )
            <img src="{{asset('assets/templates/leadpaid/images/logo-18-b-rectangle-60-2-wide-1.png?v1')}}" style="max-width: 250px" alt="site-logo">
        @elseif(Request::get('v') == '18-b-rectangle-wide1' )
            <img src="{{asset('assets/templates/leadpaid/images/logo-18-b-rectangle-wide1.png?v1')}}" style="max-width: 250px" alt="site-logo">
        @elseif(Request::get('v') == '18-b-rectangle-wide2' )
            <img src="{{asset('assets/templates/leadpaid/images/logo-18-b-rectangle-wide2.png?v1')}}" style="max-width: 250px" alt="site-logo">
        @else
            <img src="{{asset('assets/templates/leadpaid/images/logo-18-b-rectangle-60.png?v4')}}" style="max-width: 250px" alt="site-logo">
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
