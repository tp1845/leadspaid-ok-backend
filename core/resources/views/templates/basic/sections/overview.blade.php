@php
    $overview = getContent('overview.content',true);
    $overview =  $overview->data_values;
@endphp

 <!-- worldwide section start -->
 <section class="worldwide-section bg_img" data-background="{{getImage('assets/images/frontend/overview/'.$overview->background_image,'1920x1080')}}">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 text-center">
          <h2 class="worldwide-title text-white">@lang($overview->heading)</h2>
          <a href="{{url($overview->button_link)}}" class="cmn-btn mt-4">@lang($overview->button_text)</a>
        </div>
      </div>
      <div class="counter-item-wrapper">
        <div class="row justify-content-center mb-none-30">
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 counter-item mb-30">
            <div class="counter-card d-flex flex-wrap align-items-center">
              <div class="counter-card__icon">
                <i class="las la-user"></i>
              </div>
              <div class="counter-card__content">
                <h4 class="counter-card__amount text-white">{{number_format_short($total_publisher+$overview->total_publisher)}}</h4>
                <span class="caption text-white">@lang('Total Publishers')</span>
              </div>
            </div>
          </div><!-- counter-item end -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 counter-item mb-30">
            <div class="counter-card d-flex flex-wrap align-items-center">
              <div class="counter-card__icon">
                <i class="las la-user-tag"></i>
              </div>
              <div class="counter-card__content">
                <h4 class="counter-card__amount text-white">{{number_format_short($total_users+$overview->total_advertiser)}}</h4>
                <span class="caption text-white">@lang('Total Advertiser')</span>
              </div>
            </div>
          </div><!-- counter-item end -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 counter-item mb-30">
            <div class="counter-card d-flex flex-wrap align-items-center">
              <div class="counter-card__icon">
                <i class="lab la-adversal"></i>
              </div>
              <div class="counter-card__content">
                <h4 class="counter-card__amount text-white">{{number_format_short($total_ad+$overview->total_advertise)}}</h4>
                <span class="caption text-white">@lang('Total Advertise')</span>
              </div>
            </div>
          </div><!-- counter-item end -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 counter-item mb-30">
            <div class="counter-card d-flex flex-wrap align-items-center">
              <div class="counter-card__icon">
                <i class="las la-hand-pointer"></i>
              </div>
              <div class="counter-card__content">
                <h4 class="counter-card__amount text-white">{{number_format_short($total_click+$overview->total_click,2)}}</h4>
                <span class="caption text-white">@lang('Total Clicks')</span>
              </div>
            </div>
          </div><!-- counter-item end -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 counter-item mb-30">
            <div class="counter-card d-flex flex-wrap align-items-center">
              <div class="counter-card__icon">
                <i class="las la-globe"></i>
              </div>
              <div class="counter-card__content">
                <h4 class="counter-card__amount text-white">{{number_format_short($total_imp+$overview->total_impression)}}</h4>
                <span class="caption text-white">@lang('Total Impression')</span>
              </div>
            </div>
          </div><!-- counter-item end -->
        
         
        </div>
      </div>
    </div>
  </section>
  <!-- worldwide section end -->