<style>
    .sidebar__logo {
    padding: 0;
    display: -ms-flexbox;
    display: block;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
    text-align: center;
}
.custom_nav_btn .navbar__expand {
    margin: 0;
    width: 100%;
    height: unset;
    font-size: 20px;
    background: transparent;
    min-width: 40px;
}
.custom_nav_btn .sidebar__expand {
    position: unset;
}
.custom_nav_btn {
    position: fixed;
    left: 210px;
    width: 40px;
    display: flex;
    height: 35px;
    background: #f3f5f7;
    border-radius: 5px 0px 0px 5px;
    align-items: center;
    justify-content: center;
    bottom: 40px;
}
/*.custom_nav_btn .navbar__expand:after, .custom_nav_btn .navbar__expand:before, .sidebar.active .navbar__expand.active {
    display: none;
}*/
.navbar__expand::after {
    border: none;
}
.sidebar.active:hover .sidebar__menu-header {
    font-size: 0;
}
.sidebar.active .navbar__expand {
    display: block;
}
.navbar__expand.active .fa-angle-left::before {
    content: "\f105";
}
.sidebar__expand {
    background-color: transparent;
    color: #000;
    position: absolute;
    font-size: 20px;
    text-align: center;
    display: none;
}
.sidebar.active .custom_nav_btn {
    left: 40px;
}
.sidebar.active .sidebar__expand {
    display: block;
}
.sidebar.active:hover .sidebar__logo a, .sidebar.active .sidebar__logo-shape, .sidebar.active:hover .sidebar__menu .sidebar-dropdown > a::before, .sidebar.active:hover .sidebar__menu .sidebar-menu-item > a .menu-title, .sidebar.active:hover .menu-badge {
    display: none;
}
.sidebar.active:hover {
    width: 80px;
}
.sidebar.active:hover .sidebar__menu .sidebar-menu-item > a {
    padding: 15px;
    padding-right: 5px;
    justify-content: center;
}
.sidebar.active {
    transition: none !important;
}
[class*="overlay"].overlay--indigo::before {
    background-color: #10163a !important;
}
</style>
<script src="https://kit.fontawesome.com/3a1bd56da8.js" crossorigin="anonymous"></script>
<div class="sidebar {{ sidebarVariation()['selector'] }} {{ sidebarVariation()['sidebar'] }} {{ @sidebarVariation()['overlay'] }} {{ @sidebarVariation()['opacity'] }}"
    data-background="{{getImage('assets/admin/images/sidebar/2.jfif')}}"  style="background-image: url('{{asset('assets/admin/images/sidebar/2.jfif')}}')">
    <button class="res-sidebar-close-btn d-none"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{route('admin.dashboard')}}" class="sidebar__main-logo"><img
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/logo3.png')}}" alt="@lang('image')"></a>
            <a href="{{route('admin.dashboard')}}" class="sidebar__logo-shape"><img
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" alt="@lang('image')"></a>
            <button type="button" class="navbar__expand d-none"></button>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('admin.dashboard')}}">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>
                {{-- <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.advertise.*',3)}}">
                        <i class="menu-icon las la-ad"></i>
                        <span class="menu-title">@lang('Advertises') </span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.advertise.*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.advertise.all')}}">
                                <a href="{{route('admin.advertise.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Advertises')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.advertise.price-plan')}}">
                                <a href="{{route('admin.advertise.price-plan')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Price Plan')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.advertise.type')}}">
                                <a href="{{route('admin.advertise.type')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Type')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.advertise.perCost')}}">
                                <a href="{{route('admin.advertise.perCost')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('CPC & CPM')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.advertise.iplog')}}">
                                <a href="{{route('admin.advertise.iplog')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Ip Logs')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.advertise.blockedip')}}">
                                <a href="{{route('admin.advertise.blockedip')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Blocked Ip Log')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}

                {{-- <li class="sidebar-menu-item {{menuActive('admin.keywords')}}">
                    <a href="{{route('admin.keywords')}}" class="nav-link">
                        <i class="menu-icon lab la-kickstarter-k"></i>
                        <span class="menu-title">@lang('Manage Keywords')</span>
                    </a>
                </li> --}}


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.advertiser*',3)}}">
                        <i class="menu-icon lab la-autoprefixer"></i>
                        <span class="menu-title">@lang('Manage Advertiser')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.advertiser*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.advertiser.all')}}">
                                <a href="{{route('admin.advertiser.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Advertiser')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.advertiser.active.all')}}">
                                <a href="{{route('admin.advertiser.active.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Active Advertiser')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.advertiser.banned.all')}}">
                                <a href="{{route('admin.advertiser.banned.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Banned Advertiser')</span>
                                    @if($banned_advertiser_count)
                                    <span
                                        class="menu-badge pill bg--primary ml-auto">{{$banned_advertiser_count}}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.advertiser.email.unverified')}}">
                                <a href="{{route('admin.advertiser.email.unverified')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email Unverified')</span>
                                    @if($email_unverified_advertiser)
                                    <span
                                        class="menu-badge pill bg--primary ml-auto">{{$email_unverified_advertiser}}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.advertiser.sms.unverified')}}">
                                <a href="{{route('admin.advertiser.sms.unverified')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('SMS Unverified')</span>
                                    @if($sms_unverified_advertiser)
                                    <span
                                        class="menu-badge pill bg--primary ml-auto">{{$sms_unverified_advertiser}}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.advertiser.email.all')}}">
                                <a href="{{route('admin.advertiser.email.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Send Email to all')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.campaigns*',3)}}">
                        <i class="menu-icon lab la-autoprefixer"></i>
                        <span class="menu-title">@lang('Manage Campaigns')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.campaigns*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.campaigns.all')}}">
                                <a href="{{route('admin.campaigns.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Campaigns')</span>
                                </a>
                            </li>
                            {{-- <li class="sidebar-menu-item {{menuActive('admin.campaigns.lgenspend')}}">
                                <a href="{{route('admin.campaigns.lgenspend')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('LGen Spend Upload')</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.leads*',3)}}">
                        <i class="menu-icon lab la-autoprefixer"></i>
                        <span class="menu-title">@lang('Manage Leads')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.leads*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.leads.all')}}">
                                <a href="{{route('admin.leads.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Leads')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.publisher*',3)}}">
                        <i class="menu-icon lab la-chromecast"></i>
                        <span class="menu-title">@lang('Manage Publisher')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.publisher*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.publisher.all')}}">
                                <a href="{{route('admin.publisher.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Publisher')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.publisher.admin.all')}}">
                                <a href="{{route('admin.publisher.admin.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Admin Publisher')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.publisher.active.all')}}">
                                <a href="{{route('admin.publisher.active.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Active Publisher')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.publisher.banned.all')}}">
                                <a href="{{route('admin.publisher.banned.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Banned Publishers')</span>
                                    @if($banned_publisher_count)
                                    <span
                                        class="menu-badge pill bg--primary ml-auto">{{$banned_publisher_count}}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.publisher.email.unverified')}}">
                                <a href="{{route('admin.publisher.email.unverified')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email Unverified')</span>
                                    @if($email_unverified_publisher)
                                    <span
                                        class="menu-badge pill bg--primary ml-auto">{{$email_unverified_publisher}}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.publisher.sms.unverified')}}">
                                <a href="{{route('admin.publisher.sms.unverified')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('SMS Unverified')</span>
                                    @if($sms_unverified_publisher)
                                    <span
                                        class="menu-badge pill bg--primary ml-auto">{{$sms_unverified_publisher}}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.publisher.email.all')}}">
                                <a href="{{route('admin.publisher.email.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Send Email to all')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.domain*',3)}}">
                        <i class="menu-icon las la-check-circle"></i>
                        <span class="menu-title">@lang('Manage Domain')</span>
                        @if(0 < $pending_domain)
                        <span class="menu-badge pill bg--primary ml-auto">
                            <i class="fa fa-exclamation"></i>
                        </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.domain*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.domain.pending')}}">
                                <a href="{{route('admin.domain.pending')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Domain')</span>
                                    @if(0 < $pending_domain)
                                    <span class="menu-badge pill bg--primary ml-auto">
                                        {{$pending_domain}}
                                    </span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.domain.approved')}}">
                                <a href="{{route('admin.domain.approved')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved Domain')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.gateway*',3)}}">
                        <i class="menu-icon las la-credit-card"></i>
                        <span class="menu-title">@lang('Payment Gateways')</span>

                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.gateway*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.gateway.automatic.index')}} ">
                                <a href="{{route('admin.gateway.automatic.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Automatic Gateways')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.gateway.manual.index')}} ">
                                <a href="{{route('admin.gateway.manual.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Manual Gateways')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.deposit*',3)}}">
                        <i class="menu-icon las la-credit-card"></i>
                        <span class="menu-title">@lang('Deposits')</span>
                        @if(0 < $pending_deposits_count)
                            <span class="menu-badge pill bg--primary ml-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.deposit*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.deposit.pending')}} ">
                                <a href="{{route('admin.deposit.pending')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Deposits')</span>
                                    @if($pending_deposits_count)
                                        <span class="menu-badge pill bg--primary ml-auto">{{$pending_deposits_count}}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.deposit.approved')}} ">
                                <a href="{{route('admin.deposit.approved')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved Deposits')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.deposit.successful')}} ">
                                <a href="{{route('admin.deposit.successful')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Successful Deposits')</span>
                                </a>
                            </li>


                            <li class="sidebar-menu-item {{menuActive('admin.deposit.rejected')}} ">
                                <a href="{{route('admin.deposit.rejected')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Rejected Deposits')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.deposit.list')}} ">
                                <a href="{{route('admin.deposit.list')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Deposits')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.withdraw*',3)}}">
                        <i class="menu-icon la la-bank"></i>
                        <span class="menu-title">@lang('Withdrawals') </span>
                        @if(0 < $pending_withdraw_count)
                            <span class="menu-badge pill bg--primary ml-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.withdraw*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.withdraw.method.index')}}">
                                <a href="{{route('admin.withdraw.method.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Withdraw Methods')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.withdraw.pending')}} ">
                                <a href="{{route('admin.withdraw.pending')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Log')</span>

                                    @if($pending_withdraw_count)
                                        <span class="menu-badge pill bg--primary ml-auto">{{$pending_withdraw_count}}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.withdraw.approved')}} ">
                                <a href="{{route('admin.withdraw.approved')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved Log')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.withdraw.rejected')}} ">
                                <a href="{{route('admin.withdraw.rejected')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Rejected Log')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.withdraw.log')}} ">
                                <a href="{{route('admin.withdraw.log')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Withdrawals Log')</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.ticket*',3)}}">
                        <i class="menu-icon la la-ticket"></i>
                        <span class="menu-title">@lang('Support Ticket') </span>
                        @if(0 < $pending_ticket_count)
                            <span class="menu-badge pill bg--primary ml-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.ticket*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.ticket')}} ">
                                <a href="{{route('admin.ticket')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Ticket')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.ticket.pending')}} ">
                                <a href="{{route('admin.ticket.pending')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Ticket')</span>
                                    @if($pending_ticket_count)
                                        <span
                                            class="menu-badge pill bg--primary ml-auto">{{$pending_ticket_count}}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.ticket.closed')}} ">
                                <a href="{{route('admin.ticket.closed')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Closed Ticket')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.ticket.answered')}} ">
                                <a href="{{route('admin.ticket.answered')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Answered Ticket')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive(['admin.earnings.publisher','admin.transaction.advertiser','admin.users.login.ipHistory','admin.report.login.history'],3)}}">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title">@lang('Report') </span>
                    </a>
                    <div class="sidebar-submenu {{menuActive(['admin.earnings.publisher','admin.transaction.advertiser','admin.users.login.ipHistory','admin.report.login.history'],2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.earnings.publisher')}}">
                                <a href="{{route('admin.earnings.publisher')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Publishers Earning Log')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.transaction.advertiser')}}">
                                <a href="{{route('admin.transaction.advertiser')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Advertisers TRX Log')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive(['admin.report.login.history','admin.report.login.ipHistory'])}}">
                                <a href="{{route('admin.report.login.history')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Login History')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>




                <li class="sidebar__menu-header">@lang('Settings')</li>
                 <li class="sidebar-menu-item {{menuActive('admin.create-users')}}">
                    <a href="{{route('admin.create-users')}}">
                        <i class="menu-icon las la-images"></i>
                        <span class="menu-title">Create User</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{menuActive('admin.users')}}">
                    <a href="{{route('admin.users')}}">
                        <i class="menu-icon las la-images"></i>
                        <span class="menu-title">Manage User</span>
                    </a>
                </li>
			   
			    
                <li class="sidebar-menu-item {{menuActive('admin.setting.index')}}">
                    <a href="{{route('admin.setting.index')}}" class="nav-link">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('General Setting')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('admin.setting.logo_icon')}}">
                    <a href="{{route('admin.setting.logo_icon')}}" class="nav-link">
                        <i class="menu-icon las la-images"></i>
                        <span class="menu-title">@lang('Logo Icon Setting')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('admin.extensions.index')}}">
                    <a href="{{route('admin.extensions.index')}}" class="nav-link">
                        <i class="menu-icon las la-cogs"></i>
                        <span class="menu-title">@lang('Extensions')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item  {{menuActive(['admin.language.manage','admin.language.key'])}}">
                    <a href="{{route('admin.language.manage')}}" class="nav-link"
                       data-default-url="{{ route('admin.language.manage') }}">
                        <i class="menu-icon las la-language"></i>
                        <span class="menu-title">@lang('Language') </span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('admin.seo')}}">
                    <a href="{{route('admin.seo')}}" class="nav-link">
                        <i class="menu-icon las la-globe"></i>
                        <span class="menu-title">@lang('SEO Manager')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.email.template*',3)}}">
                        <i class="menu-icon la la-envelope-o"></i>
                        <span class="menu-title">@lang('Email Manager')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.email.template*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.email.template.global')}} ">
                                <a href="{{route('admin.email.template.global')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Global Template')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive(['admin.email.template.index','admin.email.template.edit'])}} ">
                                <a href="{{ route('admin.email.template.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email Templates')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.email.template.setting')}} ">
                                <a href="{{route('admin.email.template.setting')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email Configure')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.sms.template*',3)}}">
                        <i class="menu-icon la la-mobile"></i>
                        <span class="menu-title">@lang('SMS Manager')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.sms.template*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.sms.template.global')}} ">
                                <a href="{{route('admin.sms.template.global')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('API Setting')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive(['admin.sms.template.index','admin.sms.template.edit'])}} ">
                                <a href="{{ route('admin.sms.template.index') }}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('SMS Templates')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar__menu-header">@lang('Frontend Manager')</li>

                <li class="sidebar-menu-item {{menuActive('admin.frontend.templates')}}">
                    <a href="{{route('admin.frontend.templates')}}" class="nav-link ">
                        <i class="menu-icon la la-html5"></i>
                        <span class="menu-title">@lang('Manage Templates')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('admin.frontend.manage.pages')}}">
                    <a href="{{route('admin.frontend.manage.pages')}}" class="nav-link ">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title">@lang('Manage Pages')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.frontend.sections*',3)}}">
                        <i class="menu-icon la la-html5"></i>
                        <span class="menu-title">@lang('Manage Section')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.frontend.sections*',2)}} ">
                        <ul>
                            @php
                               $lastSegment =  collect(request()->segments())->last();
                            @endphp
                            @foreach(getPageSections(true) as $k => $secs)
                                @if($secs['builder'])
                                    <li class="sidebar-menu-item  @if($lastSegment == $k) active @endif ">
                                        <a href="{{ route('admin.frontend.sections',$k) }}" class="nav-link">
                                            <i class="menu-icon las la-dot-circle"></i>
                                            <span class="menu-title">{{__($secs['name'])}}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
				<li class="sidebar-menu-item ">
                    <div class="sidebar__logo custom_nav_btn">
                        <button type="button" class="navbar__expand"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                      
                    </div>
                    
                </li>
            </ul>
            <div class="text-center mb-3 text-uppercase">
                <span class="text--primary">{{systemDetails()['name']}}</span>
                <span class="text--success">@lang('V'){{systemDetails()['version']}} </span>
            </div>
        </div>

    </div>

</div>
<!-- sidebar end -->
<script>
    $(".sidebar__expand").click(function(){
     if($('.navbar__expand').hasClass('active')){
        $(".sidebar").removeClass('active');
        
       
     }

    })

</script>