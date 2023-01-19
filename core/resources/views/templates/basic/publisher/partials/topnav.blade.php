
<nav class="navbar-wrapper active">
    <h5 style="position: absolute; left:35px; font-size: 25px; color: #3382f6; ">
           {{ get_publisher_type('name') }}
    </h5>
    <button class="res-sidebar-open-btn"><i class="las la-bars"></i></button>
    <form class="navbar-search">
      <button type="submit" class="navbar-search__btn">
        <i class="las la-search"></i>
      </button>
      <input type="search" name="navbar-search__field" id="navbar-search__field" placeholder="Search your products">
      <button type="button" class="navbar-search__close"><i class="las la-times"></i></button>
    </form>
    {{-- <div class="navbar navbar-expand-md">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span>@lang('Menu')</span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto main-menu align-items-center">

          <li class="dropdown">
            <a href="#0" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">@lang('Widthdraw') <i class="las la-angle-down"></i></a>
            <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
              <a href="{{route('user.withdraw.methods')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-money-bill"></i>
                <span class="dropdown-menu__caption">@lang('Widthdraw Money')</span>
              </a>
              <a href="{{route('user.withdraw.history')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon  las la-server"></i>
                <span class="dropdown-menu__caption">@lang('Widthdraw Log')</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div> --}}
    <div class="navbar__right">
      <ul class="main-menu d-flex flex-wrap align-items-center">
        <li class="dropdown">
          <button type="button" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
            <span class="navbar-user">
                <span class="navbar-user__thumb">
                    @if(empty(auth()->guard('publisher')->user()->image))
                        <img src="{{ url('/')}}/assets/images/profile/user.png" alt="image">
                    @else
                        <img src="{{ get_image('assets/publisher/images/profile/'. auth()->guard('publisher')->user()->image) }}" alt="image">
                    @endif
                </span>
              <span class="mx-1">{{  get_publisher_username() }}</span>
              <span class="icon"><i class="las la-chevron-circle-down"></i></span>
            </span>
          </button>
          <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">

            @if(Route::has('publisher.profile'))
            <a href="{{route('publisher.profile')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
              <i class="dropdown-menu__icon las la-cog"></i>
              <span class="dropdown-menu__caption">@lang('Edit profile')</span>
            </a>
            @endif

            @if(Route::has('publisher.password'))
            <a href="{{route('publisher.password')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
              <i class="dropdown-menu__icon las la-key"></i>
              <span class="dropdown-menu__caption">@lang('Change Password')</span>
            </a>
           @endif


           @if(Route::has('publisher.twofactor'))
           <a href="{{route('publisher.twofactor')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
             <i class="dropdown-menu__icon las la-key"></i>
             <span class="dropdown-menu__caption">@lang('Enable 2FA')</span>
           </a>
          @endif
           @if(Route::has('publisher.logout'))
            <a href="{{route('publisher.logout')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
              <i class="dropdown-menu__icon las la-sign-out-alt"></i>
              <span class="dropdown-menu__caption">@lang('Logout')</span>
            </a>
            @endif
          </div>
        </li>
      </ul>
    </div>
  </nav>
<!-- navbar-wrapper end -->
