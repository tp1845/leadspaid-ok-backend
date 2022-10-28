@extends($activeTemplate.'layouts.frontend')

@section('content')
@include($activeTemplate.'partials.breadcrumb')

<!--=======Blog Section Starts Here=======-->
    <section class="blog-details-section pt-100 pb-100">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8">
              <div class="blog-details-wrapper">
                <div class="blog-details__thumb">
                  <img src="{{ getImage('assets/images/frontend/blog/'.$blog->data_values->image,'730x486') }}" alt="image">
                  <div class="post__date">
                    <span class="date">{{showDateTime($blog->created_at,'d')}}</span>
                    <span class="month">{{showDateTime($blog->created_at,'M')}}</span>
                  </div>
                </div><!-- blog-details__thumb end -->
                <div class="blog-details__content">
                  <h4 class="blog-details__title">@lang($blog->title)</h4>
                  <p><?php echo $blog->data_values->content ?></p>
                </div><!-- blog-details__content end -->
                <div class="blog-details__footer">
                  <h4 class="caption">@lang('Share This Post')</h4>
                  <ul class="social__links">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}"><i class="fab fa-facebook-f" target="_blank"></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?text=Post and Share &amp;url={{urlencode(url()->current()) }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    
                  </ul>
                </div><!-- blog-details__footer end -->
              </div><!-- blog-details-wrapper end -->
             
              <div class="comment-form-area">
                <h3 class="title">@lang('leave a comment')</h3>
                <div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5" data-width="700"></div>
              </div><!-- comment-form-area end -->
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="sidebar">
                <div class="widget">
                  <h5 class="widget__title">@lang('Recent posts')</h5>
                  <ul class="small-post-list">
                    @foreach ($recentPosts as $recent)
                   <li class="small-post">
                      <div class="small-post__thumb"><img src="{{ getImage('assets/images/frontend/blog/'.'thumb_'.$recent->data_values->image,'318x212') }}" alt="image"></div>
                      <div class="small-post__content">
                        <h5 class="post__title"><a href="{{ route('blog.details',[$recent->id,str_slug($recent->data_values->title)]) }}">{{Str::limit($recent->data_values->title,30)}}</a></h5>
                      </div>
                    </li><!-- small-post end -->
                   @endforeach
                  </ul><!-- small-post-list end -->
                </div>
                <div class="widget">
                  <h5 class="widget__title">@lang('Site Statistics')</h5>
                  <ul class="categories__list">

                    <li class="categories__item d-flex justify-content-between">
                        @lang('Total Clicks') <span class="text-right ml-5 stat_text">{{number_format_short($total_click+$stat->data_values->total_click)}}</span>
                    </li>
                    <li class="categories__item d-flex justify-content-between">
                        @lang('Total Impression') <span class="text-right ml-5 stat_text">{{number_format_short($total_imp+$stat->data_values->total_impression)}}</span>
                    </li>
                    <li class="categories__item d-flex justify-content-between">
                        @lang('Total Advertiser') <span class="text-right ml-5 stat_text">{{number_format_short($total_users+$stat->data_values->total_advertiser)}}</span>
                    </li>
                    <li class="categories__item d-flex justify-content-between">
                        @lang('Total Publisher') <span class="text-right ml-5 stat_text">{{number_format_short($total_publisher+$stat->data_values->total_publisher)}}</span>
                    </li>
                  </ul>
                </div><!-- widget end -->
               
               <!-- widget end -->
                
              </div><!-- sidebar end -->
            </div>
          </div>
        </div>
      </section>
      <!-- blog-details-section end -->


<!--=======Blog Section Ends Here=======-->
@stop

@push('style')
    
<style>
  .stat_text{
    color: #16c79a
  }
</style>

@endpush
