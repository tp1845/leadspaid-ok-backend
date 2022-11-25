@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')
     <section class="MainBanner-Home">
        <div class="container">
            <div class="row align-item-center justify-content-center align-items-center">
                <div class="col-lg-4">
                    <img src="{{url('/')}}/assets/templates/leadpaid/images/banner-01.png?v1" class="img-fluid" alt="leadsPaid">
                </div>
                <div class="col-lg-8">
                    <h1 class="h1">Generate Leads Directly</h1>
                    <p>Pay only for Leads. Not for cliks or impressions</p>
                    <a href="#" class="btn btn-secondary btn-lg my-2">Generate Leads</a>
                </div>
            </div>
        </div>
     </section>
     <section class="bg-secondary text-center text-white p-4 MainBanner-bottom" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <h3> Pay only for Leads. Not for cliks or impressions</h3>
                </div>
            </div>
        </div>
     </section>

    <div class="container marketing py-5 text-center">
        <div class="row pt-5">
          <div class="col-lg-4">
            <h2 class="fw-normal">Heading</h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <h2 class="fw-normal">Heading</h2>
            <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <h2 class="fw-normal">Heading</h2>
            <p>And lastly this, the third column of representative placeholder content.</p>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>

<div class="container">
    <hr class="featurette-divider my-5">
    <div class="row featurette  align-items-center">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
          <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
        </div>
        <div class="col-md-5">
          <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

        </div>
      </div>
      <hr class="featurette-divider my-5">
      <div class="row featurette  align-items-center">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

        </div>
      </div>
      <hr class="featurette-divider my-5">
    <div class="row align-items-md-stretch ">
        <div class="col-md-6">
          <div class="h-100 p-5 text-bg-primary rounded-3">
            <h2>Title Here</h2>
            <p>Swap the background-color utility and  color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
            <button class="btn btn-outline-light" type="button">Example button</button>
          </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 text-bg-secondary rounded-3">
                <h2>Title Here</h2>
                <p>Swap the background-color utility and  color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
                <button class="btn btn-outline-light" type="button">Example button</button>
              </div>
        </div>
      </div>
</div>
     @endsection
     @push('script-lib')

     @endpush
