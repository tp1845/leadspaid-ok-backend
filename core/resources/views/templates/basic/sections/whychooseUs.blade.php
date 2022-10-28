@php
    $content = getContent('whychooseUS.content',true);
    $elements = getContent('whychooseUS.element',false)
@endphp

 <!-- choose us section start -->
 <section class="pt-100 pb-100 section--bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header text-center">
            <h2 class="section-title">@lang( $content->data_values->heading)</h2>
            <p>@lang($content->data_values->short_details)</p>
          </div>
        </div>
      </div>
      <div class="row mb-none-30">
      @foreach ($elements as $element)
          
      <div class="col-lg-4 col-md-6 mb-30">
        <div class="choose-card style--two">
          <div class="choose-card__icon">
            <img src="{{getImage('assets/images/frontend/whychooseUs/'.$element->data_values->image,'75x75')}}" alt="image">
          </div>
          <div class="choose-card__content">
            <h4 class="title mb-2">@lang($element->data_values->title)</h4>
            <p>@lang($element->data_values->short_details)</p>
          </div>
        </div><!-- choose-card end -->
      </div>
      @endforeach
        
      </div>
    </div>
  </section>
  <!-- choose us section end -->