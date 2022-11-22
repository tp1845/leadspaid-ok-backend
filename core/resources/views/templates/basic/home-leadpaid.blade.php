@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')
     <section class="MainBanner-Home">
        <div class="container">
            <div class="row align-item-center justify-content-center align-items-center">
                <div class="col-lg-3">
                    <img src="{{url('/')}}/assets/templates/leadpaid/images/banner-01.png" alt="leadsPaid">
                </div>
                <div class="col-lg-8">
                    <h1 class="h1">Generate Leads Directly</h1>
                    <p>Generate Leads Directly</p>
                    <a href="#" class="btn btn-secondary btn-lg">Generate Leads</a>
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
        <div class="row">
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

     @endsection
     @push('script-lib')

     @endpush
