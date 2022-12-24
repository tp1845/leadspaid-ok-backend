@extends($activeTemplate.'layouts.frontendLeadPaid')
@section('content')
<link rel="stylesheet" href="https://leadspaid.com/assets/templates/basic/css/all.min.css">
<section class="Rg_advts">
    <div class="container">

        <div class="row text-center">
            <div class="col-lg-12 pt-4">
                <p class="Rg_advts_ttls-1 mb-5">Thank you for verifying your account.</p>
                <p class="Rg_advts_ttls-1 mb-5">Your account is pending approval. You will receive an email once it is activated.</p>
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
    .Rg_advts_ttls-1 {
    color: #191f58;
    font-family: Poppins !important;
    font-weight: 600;
    font-size: 38px;
    letter-spacing: 1px;
    }
</style>




