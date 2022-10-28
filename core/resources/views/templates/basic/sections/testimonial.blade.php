   @php
       $content = getContent('testimonial.content',true);
       $elements = getContent('testimonial.element',false);
   @endphp
   
   <!-- overview section start -->
    <section class="overview-section bg_img" data-background="{{getImage('assets/images/frontend/testimonial/'.$content->data_values->background_image,'1920x1080')}}">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-4">
              <div class="video-part text-lg-left text-center">
                <a href="{{$content->data_values->video_link}}" data-rel="lightcase:myCollection" class="video-icon"><i class="las la-play"></i></a>
                <h4 class="caption text-white mt-3">@lang($content->data_values->video_title)</h4>
              </div>
            </div>
            <div class="col-lg-5 mt-lg-0 mt-5">
              <div class="testimonial-wrapper bottom-minus">
                <h4 class="title text-white">@lang($content->data_values->heading)</h4>
                <div class="testimonial-slider">
                @foreach ($elements as $element)
                    
                <div class="single-slide">
                  <div class="testimonial-card">
                    <p class="para-white">@lang($element->data_values->quote)</p>
                    <div class="client d-flex flex-wrap align-items-center mt-4">
                      <div class="thumb">
                        <img src="{{getImage('assets/images/frontend/testimonial/'.$element->data_values->image,'65x65')}}" alt="image">
                      </div>
                      <div class="content">
                        <h6 class="name base--color">{{$element->data_values->client_name}}</h6>
                        <span class="designation para-white font-size--14px">{{$element->data_values->designation}}</span>
                      </div>
                    </div>
                  </div>
                </div><!-- single-slide end -->
                @endforeach
                </div>
              </div><!-- testimonial-wrapper end -->
            </div>
          </div>
        </div>
      </section>
      <!-- overview section end -->