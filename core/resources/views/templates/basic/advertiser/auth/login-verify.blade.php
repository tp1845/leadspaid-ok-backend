@extends($activeTemplate.'layouts.frontendLeadPaid')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<section class="page_middle Rg_advts">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 pt-4 mb-5">
               <p class="Page_title">Verify Your Email </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto text-left">
               <p>Dear {{ $user->name }},</p>

               <p>Before login, you need to verify your email address.</p>

               <p>We have already sent a verification email to {{ $user->email }}.<br>
                Please check your email ({{ $user->email }}) to verify your account.</p>

                <p>If you haven't received the verification email, <a href=""><u>Click here</u></a> to receive a new verification code</p>

                <p>If you are still not receiving a verification code,<br>
                (a) Please check your spam folder<br>
                (b) Or, use a different email address to register as advertiser<br>
                (c) Or, Contact support at contact@leadspaid.com</p>
            </div>
        </div>
    </div>
 </section>
@endsection
@push('script')
<script>
    $("a").click(function(e) {
        e.preventDefault();
        var getFormURL = "{{route('resend_advertiser_verification')}}";
        const getformData = { "_token": "{{ csrf_token() }}", "id": {{$user->id}} };
        $.ajax({
            url: getFormURL,
            data: getformData,
            dataType: 'json',
            type: 'POST',
            success: function ( data ) {
                console.log(data)
                if(data.success){
                    alert('Please check your email and verify. ');
                }else{
                    alert('Please Try after sometime!');
                }
            }
        });
    });
</script>
@endpush
<style>
    .page_middle{ border-top: 5px solid #1361b2; }
    .Rg_advts {
        font-family: Poppins !important;
        font-weight: 200;
    }
    .Page_title {
        color: #191f58;
        font-family: Poppins !important;
        font-weight: 600;
        font-size: 38px;
        margin-top: 50px;
    }

    .user_info_Rg_advts h4,
    .Rg_advts_bsc .Rg_advts_bsc_ttls{
        font-size: 20px;
        line-height: normal;
        font-weight: 500;
    }
    p, p a {
        color: #586167 !important;
        font-weight:400;
        font-size:18px;
    }
     p a {
        font-weight:800;
    }
</style>



