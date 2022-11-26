@php
    $breadcrumb = getContent('breadcrumb.content',true);
@endphp

<section class="inner-hero bg_img" data-background="{{getImage('assets/images/frontend/breadcrumb/'.$breadcrumb->data_values->background_image)}}" style="background-image: url('{{getImage('assets/images/frontend/breadcrumb/'.$breadcrumb->data_values->background_image)}}');">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2 class="page-title text-white">{{$page_title}}</h2>
          <ul class="page-breadcrumb justify-content-center">

          </ul>
        </div>
      </div>
    </div>
  </section>
