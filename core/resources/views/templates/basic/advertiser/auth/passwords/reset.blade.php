@extends($activeTemplate.'layouts.frontendLeadPaid')
@php
    $bg = getContent('login.content',true)->data_values;
@endphp

@section('content')
{{-- @include($activeTemplate.'partials.breadcrumb') --}}
<section class="py-4 page_middle">
    <div class="container">
      <div class="account-area">
        <div class="row justify-content-center">
            <div class="col-12">
                <p class="page_title mb-5">Password Reset</p>
            </div>
            <div class="col-lg-6">
                <div class="account-wrapper">
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="publisher-tab">
                            <form id="form" class="account-form" method="POST" action="{{ route('advertiser.password.change') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group mb-3">
                                    <label>@lang('New Password') <sup class="text-danger">*</sup></label>
                                    <input type="password" name="password" id="password" placeholder="@lang('password')" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>@lang('Confirm') <sup class="text-danger">*</sup></label>
                                    <input type="password" name="password_confirmation" placeholder="@lang('Confirm Password')" class="form-control" required>
                                </div>
                                <button type="submit" class="cmn-btn w-100 mt-5">@lang('Reset Password')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
@endsection
@push('style')
<style>
    .page_middle{ border-top: 3px solid #1361b2; }
    .page_title{
        text-align: center;
        color: #191f58;
        font-family: Poppins !important;
        font-weight: 600;
        font-size: 38px;
        margin-top: 50px;
    }
    .form-group label {
        font-size: 20px;
        font-weight: 500;
        line-height: normal;
        color: #212529;
    }
    .form-control{
        border-radius: 0;
        border: 1px solid #94a1b5;
        display: block;
        font-size: 19px;
        padding: 16px 24px;
        line-height: normal;
    }
    button.cmn-btn {
        padding-left: 25px;
        padding-right: 25px;
        height: 63px;
        line-height: normal;
        background-color: #1361b2;
        color: #fff;
        border: none;
        font-size: 24px;
        font-weight: 500;
    }
</style>
@endpush

@push('script-lib')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
@endpush
@push('script')
<script>
    $.validator.setDefaults({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
    $("#form").validate({
        rules: {
            password: { required: true, minlength: 6,    },
            password_confirmation: { equalTo: "#password" }
        },messages: {
            password:{  required : 'Please fill a stronger password.',  minlength : 'Please fill a stronger password.',  },
            password_confirmation:{  required : 'The password and its confirm are not the same.', equalTo: 'The password and its confirm are not the same.'}
        }
    });
</script>
@endpush
