@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://leadspaid.com/assets/templates/basic/css/all.min.css">
<section class="Rg_advts">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 pt-5">
               <p class="Rg_advts_ttls__1">Thanks for register</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-12 pt-4">
               <p class="Rg_advts_ttls-1 mb-5">please check your email to verify your account</p>
            </div>
        </div>
           
    </div>
 </section>
    
   
@endsection

@push('script-lib')
<script src="{{asset('assets/templates/basic')}}/js/vendor/particles.js"></script>
<script src="{{asset('assets/templates/basic')}}/js/vendor/app.js"></script>    

@endpush
<style>
    .Rg_advts_ttls-1, .Rg_advts_ttls__1 {
    color: #1361b2;
    font-family: Poppins !important;
    font-weight: 600;
    font-size: 38px;
    letter-spacing: 1px;
}
</style>