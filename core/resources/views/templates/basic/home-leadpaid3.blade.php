@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
     <section class="MainBanner-Home home-leadpaid-2">
        <div class="container">
            <div class="row align-item-center justify-content-center align-items-center">
                
                <div class="col-lg-12">
                    <h1 class="h1">Generate Leads Directly</h1>
                    <p>From High Ranking/ Authority Websites & Apps</p>
                    <a href="{{route('register_advertiser')}}" class="btn btn-secondary btn-lg my-2">Join As Advertiser</a>
                </div>
            </div>
        </div>
     </section>
     <section class="bg-secondary text-center text-white p-4 MainBanner-bottom" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <h3> Pay Only For Leads. Not for Clicks or Impressions</h3>
                </div>
            </div>
        </div>
     </section>
     <div class="marketing">
    <div class="container py-5 text-center">
       

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
                <h3 class="fw-normal mb-5">An Alternative Lead Source <br>
                <span>Distinct from Search, Display & Programmatic Ads</span></h3>
                <p class="text2">Get leads to your crm instead of buying website traffic through ppc, video or banner ads</p>
            <!-- <p class="text2">LeadsPaid.com <a href="">generate leads</a> compared to <br>buying traffic</p> -->
           </div>
            
          </div><!-- /.col-lg-8 -->
        
         
        </div><!-- /.row -->
    </div>
    </div>

     @endsection
     @push('script-lib')

     @endpush

<style>
body {
    background: #e0e0e0 !important;
    font-family: Poppins !important;
}
p, h1, h2, h3, h4, h5, h5, h6, .btn {    
    font-family: Poppins !important
}
header {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9;
}

header .bg-primary {
    background-color: rgba(6, 44, 78, 0.35) !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}
.MainBanner-Home.home-leadpaid-2 {
    padding-top: 180px;
    padding-bottom: 80px;
    position: relative;
    z-index: 1;
    background-image: url('http://leadspaid.com/assets/images/frontend/breadcrumb/604c3d596c8f01615609177.jpg');
    font-family: Poppins !important;
    background-repeat: no-repeat;
    background-position: bottom;
    background-size: cover;
}
.MainBanner-Home.home-leadpaid-2::after {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #062c4e;
    opacity: 0.75;
    z-index: -1;
}
.fw-normal span {
    font-size: 34px;
    color: #1361b2;
    font-weight: 600;
    padding-top: 10px;
    display: inline-block;
}
.fw-normal{
    color: #1361b2;
}

.fw-normal-side {
    display: flex;
    flex-wrap: wrap;
/*    justify-content: center;*/
    height: 100%;
    align-items: stretch;
    align-content: space-around;
}
.MainBanner-Home {
    background-color: #1a273a;
    color: #fff;
    text-align: center;
    padding: 50px 0;
    min-height: 75vh;
    display: flex;
    align-items: center;
}
.MainBanner-Home p {
    font-size: 22px !important;
    font-weight: 300;
}
.marketing  h3.fw-normal.mb-5 {
    font-size: 47px;
    font-weight: 500 !important;
}
.text2 a:hover {
    color: #6c6c6c;
}
.text2 a {
    color: #6c6c6c;
}
.text2 {
    text-align: left;
    font-size: 26px;
    color: #6c6c6c;
}

.MainBanner-Home .btn {
    max-width: unset !important;
    width: unset !important;
    font-size: 48px !important;
    margin-top: 30px !important;
}

@media only screen and (min-width: 768px) {
.MainBanner-Home .h1 {
    font-size: 81px !important;
    font-family: Poppins !important
}
.MainBanner-Home p {
    font-size: 36px !important;
    font-weight: 300;
}

.MainBanner-Home .btn {
    font-size: 35px !important;
    padding-right: 35px;
    padding-left: 35px;
    display: inline-block;
}
    }
@media only screen and (max-width: 768px) {
    .MainBanner-Home .btn {
        font-size: 35px !important;
        padding-right: 35px;
        padding-left: 35px;
    }
}    
</style>