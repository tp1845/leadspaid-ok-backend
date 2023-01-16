<style>
    .sidebar__menu .menu-icon {
        width: 20px;
    }
    .sidebar .slimScrollDiv .slimScrollBar {
        background-color: #000000 !important;
        width: 0px !important;
        opacity: 0.25 !important;
    }
        .sidebar__menu .menu-title{font-size: 20px ; color: #fff}
    .custom_side_bar {
    /*    display: flex;*/
        flex-wrap: wrap;
        align-items: center;
        align-content: space-between;
        transition: none;
        height: 100% !important;
        transition:unset;
        position: relative;
    }

    .sidebar, .slimScrollDiv {
        transition:unset;
    }
    .sidebar__menu.footer-fix {
        margin-bottom: 0 !important;
        border-top: 1px solid #626262;
    }

    /*.sidebar__menu {
        margin-bottom: 0;
        position: absolute;
        left: 0;
        top: 0;

    }*/
    /*.sidebar__menu.footer-fix {
        margin-bottom: 60px;
        position: absolute;
        left: 0;
        top: auto;
        bottom: 0;
    }*/
    .custom_side_bar ul li a {
        padding: 5px 13px !important;
    }
    .input-col .invalid-feedback {
        width: 100%;
        color: #ff9e9e;
    }
    #campaign_create_modal .PageFormStyle .form-control::placeholder {
        font-weight: 400;
    }
    .custom_nav_btn .navbar__expand {
        margin: 0;
        width: 100%;
        height: unset;
        font-size: 20px;
        background: transparent;
        min-width: 40px;
    }
    .custom_nav_btn {
        padding: 5px 13px !important;
        line-height: 1.5;
    }
    .custom_nav_btn .sidebar__expand {
        position: unset;
    }
    .sidebar__menu .sidebar-menu-item.active::before {
        width: 20px;
        top: -50px;
    }

    .sidebar.active .sidebar__menu .sidebar-menu-item > a {
        justify-content: flex-start;
    }
    .sidebar.active ul li .custom_nav_btn .sidebar__expand {
        padding-left: 2px;
        color: #000;
        font-size: 20px;
        width: 100%;
        min-width: 40px;
    }
    .sidebar.active .sidebar__menu .sidebar-menu-item.active > a .menu-icon {
        color: #fff !important;
    }
    .custom_nav_btn {
        position: absolute;
        right: 0;
        width: 40px;
        display: flex;
        height: 35px;
        background: #f3f5f7;
        border-radius: 5px 0px 0px 5px;
        align-items: center;
        justify-content: center;
    }
    .navbar__expand:before {
        display: none;
    }
    .sidebar .sidebar__inner .sidebar__logo {
        padding: 0;
    }
    .sidebar .sidebar__inner .sidebar__logo .sidebar__main-logo {
        width: 100%;
    }
    .sidebar__menu {
        margin-top: 20px;
        margin-bottom: 100px;
        width: 100%;
    }
    .sidebar.active .sidebar__menu {
        margin-bottom: unset;
    }
    @media (min-width:1080px){
     .sidebar__menu {
        margin-bottom: 15vh;
    }
    .sidebar.active .sidebar__menu {
        margin-bottom: 15vh;
    }
    }
    @media (min-width:1199px){
     .sidebar__menu {
        margin-bottom: 23vh;
    }
    .sidebar.active .sidebar__menu {
        margin-bottom: 23vh;
    }
    }
    @media (min-width:1280px){
     .sidebar__menu {
        margin-bottom: 30vh;
    }
    .sidebar.active .sidebar__menu {
        margin-bottom: 43vh;
    }
    }
    @media (min-width:1440px){
     .sidebar__menu {
        margin-bottom: 37vh;
    }
    .sidebar.active .sidebar__menu {
        margin-bottom: 49vh;
    }
    }
    @media (min-width:1920px){
    .sidebar__menu {
        margin-bottom: 45vh;
    }
    .sidebar.active .sidebar__menu {
        margin-bottom: 57vh;
    }
    }

    </style>
    <div class="sidebar bg--" style="background-image: url('{{asset('assets/userpanel/images/sidebar/2.jfif')}}')">
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{route('publisher.dashboard')}}" class="sidebar__main-logo"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo-3.png')}}" alt="image"> </a>
        </div>

        <div class="sidebar__menu-wrapper custom_side_bar" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">

                @if(auth()->guard('publisher')->user()->role === 1 || auth()->guard('publisher')->user()->role == 2)
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('publisher.campaigns*',3)}}">
                        <i class="menu-icon lab la-autoprefixer"></i>
                        <span class="menu-title">@lang('Manage Campaigns')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('publisher.campaigns*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('publisher.campaigns.all')}}">
                                <a href="{{route('publisher.campaigns.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Campaigns')</span>
                                </a>
                            </li>
                            @php $assigned_advertisers = get_assigned_advertisers(auth()->guard('publisher')->user()->id); @endphp
                            @foreach ($assigned_advertisers as $advertiser)
                                <li class="sidebar-menu-item {{menuActive('publisher.campaigns.advertiser', $advertiser['id'] )}}">
                                    <a href="{{route('publisher.campaigns.advertiser', $advertiser['id'] )}}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"> {{$advertiser['company_name']}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                {{--  --}}
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('publisher.advertiser*',3)}}">  <i class="menu-icon las la-home"></i> <span class="menu-title">@lang('My Advertisers')</span> </a>
                    <div class="sidebar-submenu {{menuActive('publisher.advertiser*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('publisher.advertiser.all')}}">
                                <a href="{{route('publisher.advertiser.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Advertiser')</span>
                                </a>
                            </li>
                            @php $assigned_advertisers = get_assigned_advertisers(auth()->guard('publisher')->user()->id); @endphp
                            @foreach ($assigned_advertisers as $advertiser)
                                <li class="sidebar-menu-item {{menuActive('publisher.advertiser', $advertiser['id'] )}}">
                                    <a href="{{route('publisher.advertiser.detail', $advertiser['id'] )}}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"> {{$advertiser['company_name']}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @endif

            </ul>
            {{-- Footer Menu --}}
            <ul class="sidebar__menu footer-fix">
                <li class="sidebar-menu-item {{menuActive('publisher.dashboard')}}">
                    <a href="{{route('publisher.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive(['publisher.domain.verify','publisher.domain.verify.action'])}}">
                    <a href="{{route('publisher.domain.verify')}}" class="nav-link ">
                        <i class="menu-icon las la-check-circle"></i>
                        <span class="menu-title">@lang('Manage Domains')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive('publisher.advertises')}}">
                    <a href="{{route('publisher.advertises')}}" class="nav-link ">
                        <i class="menu-icon las la-ad"></i>
                        <span class="menu-title">@lang('Advertisements')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('user.withdraw*',3)}}">
                        <i class="menu-icon las la-credit-card"></i>
                        <span class="menu-title">@lang('Withdraw')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('user.withdraw*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('user.withdraw.methods')}} ">
                                <a href="{{route('user.withdraw.methods')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Widthdraw Money')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('user.withdraw.history')}} ">
                                <a href="{{route('user.withdraw.history')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Widthdraw logs')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item {{menuActive(['publisher.report.ad'])}}">
                    <a href="{{route('publisher.report.ad')}}" class="nav-link">
                        <i class="menu-icon las la-calendar-check"></i>
                        <span class="menu-title">@lang('Per Day Ad Reports')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive(['publisher.report.perDay','publisher.day.search'])}}">
                    <a href="{{route('publisher.report.perDay')}}" class="nav-link">
                        <i class="menu-icon las la-calendar-week"></i>
                        <span class="menu-title">@lang('Per Day Earning Logs')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive(['ticket','ticket.open','ticket.view'])}}">
                    <a href="{{route('ticket')}}" class="nav-link">
                        <i class="menu-icon las la-ticket-alt"></i>
                        <span class="menu-title">@lang('Support Ticket')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('publisher.profile')}}">
                    <a href="{{route('publisher.profile')}}" class="nav-link">
                        <i class="menu-icon las la-user-cog"></i>
                        <span class="menu-title">@lang('Profile Setting')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive('publisher.twofactor')}}">
                    <a href="{{route('publisher.twofactor')}}" class="nav-link">
                        <i class="menu-icon las la-key"></i>
                        <span class="menu-title">@lang('2FA Security')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('publisher.logout')}}">
                    <a href="{{route('publisher.logout')}}" class="nav-link">
                        <i class="menu-icon las la-sign-out-alt"></i>
                        <span class="menu-title">@lang('logout')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- sidebar end -->
