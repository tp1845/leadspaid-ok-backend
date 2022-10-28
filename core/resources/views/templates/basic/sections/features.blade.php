@php
    
    $feature = getContent('features.content',true);
    $features = getContent('features.element',false);

@endphp
  <!-- feature section start -->
  <section class="pt-100 pb-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header text-center">
            <h2 class="section-title">@lang($feature->data_values->heading)</h2>
            <p>@lang($feature->data_values->short_details)</p>
          </div>
        </div>
      </div>
      <div class="feature-item-wrapper">
        <div class="row mb-none-30">
        @foreach ($features as $item)
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-30">
          <div class="feature-card text-center">
            <div class="feature-card__icon">
              <img src="{{getImage('assets/images/frontend/features/'.$item->data_values->image,'65x65')}}" alt="icon">
            </div>
            <div class="feature-card__content">
              <h6 class="title">@lang($item->data_values->feature_name)</h6>
            </div>
          </div><!-- feature-card end -->
        </div>
        @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- feature section end -->