  <!-- publisher & advertiser section start -->
  @php
  $benefit = getContent('benefits.content',true);
  @endphp

  <section class="pt-100 pb-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header text-center">
            <h2 class="section-title">@lang($benefit->data_values->heading)</h2>
            <p>@lang($benefit->data_values->short_details)</p>
          </div>
        </div>
      </div><!-- row end -->
      <div class="row align-items-center">
        <div class="col-lg-4">
         
          @php
              echo $benefit->data_values->advertiser_benefits
          @endphp
          <a href="{{url($benefit->data_values->button_text_1_link)}}" class="cmn-btn mt-5"><i class="las la-eye font-size--18px mr-2"></i>@lang($benefit->data_values->button_text_1)</a>
        </div>
        <div class="col-lg-4 d-lg-block d-none">
          <!-- bottom-white-bg class makes a overlay shadow at bottom of this image -->
          <div class="bottom-white-bg">
            <img src="{{getImage('assets/images/frontend/benefits/'.$benefit->data_values->image,'350x551')}}" alt="image">
          </div>
        </div>
        <div class="col-lg-4 mt-lg-0 mt-5">
            @php
              echo $benefit->data_values->publisher_benefits
            @endphp
          <a href="{{url($benefit->data_values->button_text_2_link)}}" class="cmn-btn mt-5"><i class="las la-plus font-size--18px mr-2"></i> @lang($benefit->data_values->button_text_2)</a>
        </div>
      </div>
    </div>
  </section>
  <!-- publisher & advertiser section end -->