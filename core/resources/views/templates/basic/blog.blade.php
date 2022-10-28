@extends($activeTemplate.'layouts.frontend')

@section('content')
@include($activeTemplate.'partials.breadcrumb')
<section class="pt-100 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row mb-none-30 justify-content-center">
            @forelse($blogs as $blog)
            <div class="col-lg-4 col-md-6 mb-30">
              <div class="blog-post hover--effect-1 has-link">
                <a href="{{ route('blog.details',[$blog->id,str_slug($blog->data_values->title)]) }}" class="item-link"></a>
                <div class="blog-post__thumb">
                  <img src="{{ getImage('assets/images/frontend/blog/'.'thumb_'.$blog->data_values->image,'318x212') }}" alt="image" class="w-100">
                </div>
                <div class="blog-post__content">
                  <ul class="blog-post__meta mb-3">
                    <li>
                      <i class="las la-calendar-day"></i>
                      <span>{{showDateTime($blog->created_at)}}</span>
                    </li>
                  </ul>
                  <h4 class="blog-post__title">{{ $blog->data_values->title }}</h4>
                  <p>
                    {{Str::limit(strip_tags($blog->data_values->content),50)}}

                  </p>
                  <span class="blog-post__icon">@lang('Read More')<i class="las la-arrow-right ml-2"></i></span>
                </div>
              </div>
            </div><!-- blog-post end -->
            @empty
             <div class="col-md-12 mb-30 ">
                <h3 class="text-center">@lang('Currently No Blogs Available!!')</h3>
              </div><!-- blog-post end -->
              @endforelse
          </div>
        </div><!-- row end -->
          <div class="row">
            <div class="col-lg-12">
                {{$blogs->links()}}
            </div>
          </div><!-- row end -->
        </div>
      </div>
    </section>
@endsection
