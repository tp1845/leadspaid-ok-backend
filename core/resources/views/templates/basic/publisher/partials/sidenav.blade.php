<div class="sidebar capsule--rounded bg--" style="background-image: url('{{asset('assets/userpanel/images/sidebar/1.jpg')}}')">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <button class="sidebar__expand"><i class="las la-plus"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{route('publisher.dashboard')}}" class="sidebar__main-logo"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="image"></a>
            <button type="button" class="navbar__expand"></button>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('publisher.dashboard')}}">
                    <a href="{{route('publisher.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive(['publisher.domain.verify','publisher.domain.verify.action'])}}">
                    <a href="{{route('publisher.domain.verify')}}" class="nav-link ">
                        <i class="menu-icon las la-check-circle"></i>
                        <span class="menu-title">@lang('Manage Domain')</span>
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