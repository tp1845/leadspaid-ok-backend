  @php
      $adFormat = getContent('format.content',true);
      $adFormats = getContent('format.element',false);
  @endphp
  
  <!-- ad format section start -->
    <section class="pt-100 pb-100 bg_img overlay--one" data-background="{{getImage('assets/images/frontend/format/'.@$adFormat->data_values->background_image,'1920x1080')}}">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="section-header text-center">
                <h2 class="section-title text-white">@lang($adFormat->data_values->heading)</h2>
              </div>
            </div>
          </div>
          <div class="row justify-content-between">
            <div class="col-lg-12 mb-5">
              <ul class="nav nav-pills side-tab-nav style--white justify-content-center" id="pills-tab" role="tablist">
                  @foreach ($adFormats as $aditem)
                  <li class="nav-item" role="presentation">
                    <a class="nav-link {{$loop->first?'active':''}}" id="{{'ad'.$loop->iteration}}" data-toggle="pill" href="{{'#item'.$loop->iteration}}" role="tab" aria-controls="banner" aria-selected="true"></i>@lang($aditem->data_values->heading)</a>
                  </li>
                  @endforeach
              </ul>
            </div>
            <div class="col-lg-12">
              <div class="tab-content white-glass-bg glass--shadow py-5 px-4 border-radius--8" id="pills-tabContent">
                @foreach ($adFormats as $adformat)
                <div class="tab-pane fade show {{$loop->first?'active':''}}" id="{{'item'.$loop->iteration}}" role="tabpanel" aria-labelledby="{{'ad'.$loop->iteration}}">
                  <div class="ad-format-details">
                    <div class="row align-items-center">
                      <div class="col-lg-6">
                        <div class="thumb">
                          <img src="{{getImage('assets/images/frontend/format/'.@$adformat->data_values->image,'516x283')}}" alt="ad" class="border-radius--5">
                        </div>
                      </div>
                      <div class="col-lg-6 mt-lg-0 mt-4">
                        <div class="content">
                          <h3 class="title text-white">@lang($adformat->data_values->heading)</h3>
                          <p class="mt-3 text-white">@lang($adformat->data_values->short_details)</p>
                        
                        </div>
                      </div>
                    </div>
                  </div><!-- ad-format-details end -->
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ad format section end -->