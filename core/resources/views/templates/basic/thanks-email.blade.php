@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://leadspaid.com/assets/templates/basic/css/all.min.css">
<section class="Rg_advts">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 pt-4 d-flex justify-content-center align-items-center pt-4 pb-3">
                <img src="{{asset('assets/images/frontend')}}/robot-arm.png" width="150px" alt="Thank you for registering!" >
                <div class="ps-5">
                    <p class="Rg_advts_ttls__1 mb-5">Thank you for registering!</p>
                    <p class="Rg_advts_ttls-1 ">Please check your email ({{$useremail}}) to verify your account.</p>
                </div>
            </div>
        </div>

    </div>
 </section>
@endsection

@push('script-lib')
<script src="{{asset('assets/templates/basic')}}/js/vendor/particles.js"></script>
<script src="{{asset('assets/templates/basic')}}/js/vendor/app.js"></script>
@endpush
@push('style')
    <style>
        .Rg_advts{  border-top: 3px solid #1361b2; background-color: #1a273a;  background-image: url("{{asset('assets/images/frontend')}}/bg connect.jpg"); background-position: center; background-size: cover;   padding-top: 80px; padding-bottom: 80px;}
        .Rg_advts .container{ max-width: 1200px; background-color: #fffffff0;    }
        #MainFooter { margin-top: 0!important; }
        .Rg_advts_ttls-1, .Rg_advts_ttls__1 { color: #1a273a;  font-weight: 600; font-size: 32px; letter-spacing: 1px; }
    </style>
@endpush
