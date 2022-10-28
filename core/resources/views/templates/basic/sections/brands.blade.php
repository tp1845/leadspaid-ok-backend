 @php
     $content = getContent('brands.content',true);
     $elements = getContent('brands.element',false);
 @endphp
 <!-- brand section start -->
 <div class="brand-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <h4 class="mb-3 text-lg-left text-center">@lang($content->data_values->heading)</h4>
          <div class="brand-slider">
           @foreach ($elements as $element)
           <div class="single-slide">
            <div class="brand-item">
              <img src="{{getImage('assets/images/frontend/brands/'.$element->data_values->image,'137x43')}}" alt="image">
            </div>
            </div><!-- single-slide end -->
           @endforeach
          </div><!-- brand-slider end -->
        </div>
      </div>
    </div>
  </div>
  <!-- brand section end -->