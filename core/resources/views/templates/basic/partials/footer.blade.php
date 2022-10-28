@php
    $footer = getContent('footer.content',true);
    $footer = $footer->data_values;
    $overview = getContent('overview.content',true);
    $overview =  $overview->data_values;
    $policies = getContent('policy.element',false);
@endphp

<footer class="footer">
    <div class="cta-area">
      <div class="container pb-4">
        <div class="row align-items-center">
          <div class="col-lg-8 col-md-7">
            <h2 class="cta-title text-white">@lang($footer->heading)</h2>
          </div>
          <div class="col-lg-4 col-md-5 text-md-right mt-md-0 mt-3">
            <a href="{{url($footer->button_link)}}" class="cmn-btn">@lang($footer->button_text)</a>
          </div>
        </div>
      </div>
    </div><!-- cta-area end -->
   
    <div class="footer__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <a href="{{route('home')}}" class="footer-logo"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="image"></a>
          </div>
        </div>
        <div class="row justify-content-center mt-5 mb-none-30">
          <div class="col-md-2 col-6 footer-counter-item mb-30">
            <div class="footer-counter-card">
              <h4 class="title">{{number_format_short($total_users+$overview->total_advertiser)}}</h4>
              <p class="caption">@lang('Total Advertisers')</p>
            </div>
          </div>
          <div class="col-md-2 col-6 footer-counter-item mb-30">
            <div class="footer-counter-card">
              <h4 class="title">{{number_format_short($total_publisher+$overview->total_publisher)}}</h4>
              <p class="caption">@lang('Total Publishers')</p>
            </div>
          </div>
        
          <div class="col-md-2 col-6 footer-counter-item mb-30">
            <div class="footer-counter-card">
              <h4 class="title">{{number_format_short($total_ad+$overview->total_advertise)}}</h4>
              <p class="caption">@lang('Total Advertise')</p>
            </div>
          </div>
          <div class="col-md-2 col-6 footer-counter-item mb-30">
            <div class="footer-counter-card">
              <h4 class="title">{{number_format_short($total_click+$overview->total_click,2)}}</h4>
              <p class="caption">@lang('Total Click')</p>
            </div>
          </div>
          <div class="col-md-2 col-6 footer-counter-item mb-30">
            <div class="footer-counter-card">
              <h4 class="title">{{number_format_short($total_imp+$overview->total_impression)}}</h4>
              <p class="caption">@lang('Total Impression')</p>
            </div>
          </div>
          
        </div>
      </div>
    </div><!-- footer__top end -->
    <div class="footer__bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-lg-left text-center">
            <p class="para-white">@lang($footer->copyright) <a href="{{url('/')}}">{{$general->sitename}}</a>@lang(' All Rights Reserved')</p>
          </div>
          <div class="col-lg-6 mt-lg-0 mt-2">
            <ul class="footer-short-links d-flex flex-wrap justify-content-lg-end justify-content-center">
              @foreach ($policies as $policy)
              <li>
                <a href="{{route('policy',[$policy->id,slug($policy->data_values->heading)])}}">{{$policy->data_values->heading}}</a>
              </li>
              @endforeach
           
            </ul>
          </div>
        </div>
      </div>
    </div><!-- footer__bottom end -->
  </footer>