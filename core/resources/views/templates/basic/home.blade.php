@extends($activeTemplate.'layouts.frontend')


@section('content')

@php
    $content =  getContent('banner.content',true);

@endphp

 
    <!-- hero start -->
    <section class="hero bg_img" data-background="{{asset('assets/images/frontend/banner/'.$content->data_values->background_image)}}">
        <div id="particles-js"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
              <h2 class="hero__title text-white">@lang($content->data_values->heading)</h2>
              <p class="para-white mt-3 hero__details">@lang($content->data_values->short_details)</p>
              <div class="btn-group justify-content-center mt-4">
                
                  <a href="{{route('publisher.login')}}" class="cmn-btn"><i class="las la-eye font-size--18px mr-2"></i>@lang('Become a Publisher')</a>
                  <a href="{{route('advertiser.login')}}" class="cmn-btn"><i class="las la-plus font-size--18px mr-2"></i>@lang('Become an Advertiser')</a>
                
               
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- hero end -->
    


    @if($sections->secs != null)
        @foreach(json_decode($sections->secs) as $sec)
            @include($activeTemplate.'sections.'.$sec)
        @endforeach
    @endif
@endsection

@push('script-lib')
<script src="{{asset('assets/templates/basic')}}/js/vendor/particles.js"></script>
<script src="{{asset('assets/templates/basic')}}/js/vendor/app.js"></script>    
@endpush