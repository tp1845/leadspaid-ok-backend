<div class="sidebar bg--" style="background-image: url('{{asset('assets/userpanel/images/sidebar/1.jpg')}}')">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <button class="sidebar__expand"><i class="las la-plus"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{route('advertiser.dashboard')}}" class="sidebar__main-logo"><img
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="image"></a>
            <button type="button" class="navbar__expand"></button>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('advertiser.dashboard')}}">
                    <a href="{{route('advertiser.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('advertiser.ad*',3)}}">
                        <i class="menu-icon la las la-ad"></i>
                        <span class="menu-title">@lang('Advertisements')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('advertiser.ad*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('advertiser.ad.all')}}">
                                <a href="{{route('advertiser.ad.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Ads')</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-menu-item {{menuActive(['advertiser.ad.create','advertiser.ad.store'])}}">
                                <a href="{{route('advertiser.ad.create')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Create Ad')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('advertiser.ad.report')}}">
                                <a href="{{route('advertiser.ad.report')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Ad Reports')</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
              
                <li class="sidebar-menu-item  {{menuActive('advertiser.price.plan')}}">
                    <a href="{{route('advertiser.price.plan')}}" class="nav-link"
                      >
                        <i class="menu-icon las la-money-bill"></i>
                        <span class="menu-title">@lang('Price Plans') </span>
                    </a>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('user.deposit*',3)}}">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title">@lang('Deposit') </span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('user.deposit*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('user.deposit')}}">
                                <a href="{{route('user.deposit')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Deposit Money')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('user.deposit.history')}}">
                                <a href="{{route('user.deposit.history')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Deposit Log')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                
                <li class="sidebar-menu-item {{menuActive('advertiser.trx.logs')}}">
                    <a href="{{route('advertiser.trx.logs')}}" class="nav-link">
                        <i class="menu-icon fas fa-exchange-alt"></i>
                            <span class="menu-title">@lang('Transaction Log')</span>
                        </a>
                    </li>
                <li class="sidebar-menu-item {{menuActive(['advertiser.day.logs','advertiser.day.search','advertiser.date.search'])}}">
                    <a href="{{route('advertiser.day.logs')}}" class="nav-link">
                        <i class="menu-icon las la-calendar-week"></i>
                            <span class="menu-title">@lang('Per Day Logs')</span>
                        </a>
                    </li>
              
                    <li class="sidebar-menu-item {{menuActive(['ticket','ticket.open','ticket.view'])}}">
                    <a href="{{route('ticket')}}" class="nav-link">
                        <i class="menu-icon las la-ticket-alt"></i>
                            <span class="menu-title">@lang('Support Ticket')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{menuActive('advertiser.profile')}}">
                    <a href="{{route('advertiser.profile')}}" class="nav-link">
                        <i class="menu-icon las la-user-cog"></i>
                            <span class="menu-title">@lang('Profile Setting')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{menuActive('advertiser.twofactor')}}">
                    <a href="{{route('advertiser.twofactor')}}" class="nav-link">
                        <i class="menu-icon las la-key"></i>
                            <span class="menu-title">@lang('2FA Security')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{menuActive('advertiser.payments')}}">
                    <a href="{{route('advertiser.payments')}}" class="nav-link">
                        <i class="menu-icon las la-credit-card"></i>
                            <span class="menu-title">@lang('Payments')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('advertiser.logout')}}">
                    <a href="{{route('advertiser.logout')}}" class="nav-link">
                        <i class="menu-icon las la-sign-out-alt"></i>
                            <span class="menu-title">@lang('logout')</span>
                        </a>
                    </li>

            </ul>
        </div>
    </div>
</div>
<!-- sidebar end -->

<!-- Button trigger modal -->
<!-- Button trigger modal -->
