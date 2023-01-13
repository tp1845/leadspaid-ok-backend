@php
  $testing = auth()->guard('advertiser')->user()->id === 11?true:false;
@endphp

<style>
.btn--primary.create-campaign-btn {
    background-color: #4500dd!important;
    border-radius: 0;
}
.create-campaign-btn {
    font-size: 18px !important;
}
.nav-payment ul li:first-child {
    margin-bottom: 5px;
}
.nav-payment ul li img {
    height: 30px;
}
.nav-payment ul li .num-img {
    height: 25px;
}
.nav-payment {
    position: absolute;
    left: 20px;
}
.nav-payment span {
    font-size: 18px;
    font-weight: 500;
}
</style>

<nav class="navbar-wrapper active">
 <div class="nav-payment">
      <ul>
        @if(empty( auth()->guard('advertiser')->user()->card_session))
        <li><img class="num-img" src="{{ url('/')}}/assets/images/gif/number-1.png" /><span class="px-2">Add a payment method (Credit/ Debit card)</span><img src="{{ url('/')}}/assets/images/gif/arrow.gif" /></li>
        @endif
        <li>
          @if(get_total_campaign( auth()->guard('advertiser')->user()->id) == 0)
          @if(!empty( auth()->guard('advertiser')->user()->card_session))
           <img class="num-img" src="{{ url('/')}}/assets/images/gif/number-1.png" />
          @else
          <img class="num-img" src="{{ url('/')}}/assets/images/gif/number-2.png" />
         
          @endif
          <span class="px-2">Create your first lead Generation Campaign</span><img src="{{ url('/')}}/assets/images/gif/arrow.gif" /></li>
          @endif
      </ul>   

    </div>
    <button class="res-sidebar-open-btn"><i class="las la-bars"></i></button>
    <form class="navbar-search d-none">
      <button type="submit" class="navbar-search__btn">
        <i class="las la-search"></i>
      </button>
      <input type="search" name="navbar-search__field" id="navbar-search__field" placeholder="Search your products">
      <button type="button" class="navbar-search__close"><i class="las la-times"></i></button>
    </form>
    <div class="navbar navbar-expand-md mr-2 d-none">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span>@lang('Menu')</span>
      </button>
      @if( $testing  )
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto main-menu align-items-center">

          <li class="dropdown">
            <a href="#0" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">@lang('Deposit') <i class="las la-angle-down"></i></a>
            <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
              <a href="{{route('user.deposit')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-wallet"></i>
                <span class="dropdown-menu__caption">@lang('Deposit Money')</span>
              </a>
              <a href="{{route('user.deposit.history')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon lab la-stack-exchange"></i>
                <span class="dropdown-menu__caption">@lang('Deposit Log')</span>
              </a>
            </div>
          </li>
          <li class="dropdown">
            <a href="#0" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">@lang('Advertisements') <i class="las la-angle-down"></i></a>
            <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
              <a href="{{route('advertiser.ad.all')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon lab la-adversal"></i>
                <span class="dropdown-menu__caption">@lang('All Ads')</span>
              </a>
              <a href="{{route('advertiser.ad.create')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-plus-circle"></i>
                <span class="dropdown-menu__caption">@lang('Create Ad')</span>
              </a>
              <a href="{{route('advertiser.ad.report')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-digital-tachograph"></i>
                <span class="dropdown-menu__caption">@lang('Ad Reports')</span>
              </a>
            </div>
          </li>

        </ul>
      </div>
      @endif
    </div>
    <div class="navbar__right">
	
	
      <ul class="main-menu d-flex flex-wrap align-items-center">

        <li>          
          <a href="{{ url('/')}}/advertiser/campaigns/?action=create_campiagin"class="btn btn--primary text-white create-campaign-btn"><i class="fas fa-plus"></i> Create Campaign</a>
        </li>
        <li class="dropdown">
          <button type="button" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
            <span class="navbar-user">
                {{auth()->guard('advertiser')->user()->username}}
                {{-- <span class="navbar-user__thumb"><img src="{{ get_image('assets/advertiser/images/profile/'. auth()->guard('advertiser')->user()->image) }}" alt="image"></span> --}}
              <span class="icon"><i class="las la-chevron-circle-down"></i></span>
            </span>
          </button>
          <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">

            @if(Route::has('advertiser.profile'))
            <a href="{{route('advertiser.profile')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
              <i class="dropdown-menu__icon las la-cog"></i>
              <span class="dropdown-menu__caption">@lang('Edit profile')</span>
            </a>
            @endif

            @if(Route::has('advertiser.password'))
            <a href="{{route('advertiser.password')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
              <i class="dropdown-menu__icon las la-key"></i>
              <span class="dropdown-menu__caption">@lang('Change Password')</span>
            </a>
           @endif

            @if(Route::has('advertiser.twofactor'))
            <a href="{{route('advertiser.twofactor')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
              <i class="dropdown-menu__icon las la-key"></i>
              <span class="dropdown-menu__caption">@lang('Enable 2FA')</span>
            </a>
           @endif
           @if(Route::has('advertiser.logout'))
            <a href="{{route('advertiser.logout')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
              <i class="dropdown-menu__icon las la-sign-out-alt"></i>
              <span class="dropdown-menu__caption">@lang('Logout')</span>
            </a>
            @endif
          </div>
        </li>
      </ul>
    </div>
  </nav>
