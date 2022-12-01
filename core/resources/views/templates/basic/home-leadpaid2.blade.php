@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')
     <section class="MainBanner-Home">
        <div class="container">
            <div class="row align-item-center justify-content-center align-items-center">
                
                <div class="col-lg-12">
                    <h1 class="h1">Generate Leads Directly</h1>
                    <p>An Alternative Lead Source distinct from Search, display & Native Ads</p>
                    <a href="#" class="btn btn-secondary btn-lg my-2">Generate Leads</a>
                </div>
            </div>
        </div>
     </section>
     <section class="bg-secondary text-center text-white p-4 MainBanner-bottom" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <h3> Pay Only For Leads. Not for click or impressions</h3>
                </div>
            </div>
        </div>
     </section>

    <div class="container marketing py-5 text-center">
       

        <div class="row pt-5 ">
      <div class="col-lg-4">
                    @if(Request::get('v') == 1 )
                        <img src="{{url('/')}}/assets/templates/leadpaid/images/banner-01.png?v1" class="img-fluid" alt="leadsPaid">
                    @else
                        <img src="{{url('/')}}/assets/templates/leadpaid/images/banner-02.png?v1" class="img-fluid" alt="leadsPaid">
                    @endif
                </div>



          <div class="col-lg-8">
           <div class="fw-normal-side">
                <h2 class="fw-normal mb-5">An Alternative Lead Sources <br>
                <span>distinct from Search, display & Native Ads</span></h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column Some representative placeholder content for the three columns of text below the carousel.</p>
           </div>
            
          </div><!-- /.col-lg-8 -->
        
         
        </div><!-- /.row -->
    </div>


     @endsection
     @push('script-lib')

     @endpush

<style>
    .fw-normal span {
    font-size: 25px;
    color: #1361b2;
}
.fw-normal{
    color: #1361b2;
}
.fw-normal-side {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    height: 100%;
    align-items: stretch;
    align-content: space-around;
}
</style>