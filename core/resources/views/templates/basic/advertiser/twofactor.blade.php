@extends($activeTemplate.'layouts.advertiser.frontend')

@section('panel')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row justify-content-center mt-4">
                    
                    <div class="col-lg-6">
                        @if(Auth::guard('advertiser')->user()->ts)
                            <div class="card">
                                <div class="card-header bg--primary">
                                    <h5 class="card-title text-white">@lang('Two Factor Authenticator')</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mx-auto text-center">
                                        <a href="#0"  class="btn btn-block btn-lg btn--danger" data-toggle="modal" data-target="#disableModal">
                                            @lang('Disable Two Factor Authenticator')</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-header bg--primary">
                                    <h5 class="card-title text-white mb-0">@lang('Two Factor Authenticator')</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="key" value="{{$secret}}" class="form-control form-control-lg" id="referralURL" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text copytext" id="copyBoard" onclick="myFunction()"> <i class="fa fa-copy"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mx-auto text-center">
                                        <img class="mx-auto" src="{{$qrCodeUrl}}">
                                    </div>
                                    <div class="form-group mx-auto text-center">
                                        <a href="#0" class="btn btn--primary  btn-lg mt-3 mb-1" data-toggle="modal" data-target="#enableModal">@lang('Enable Two Factor Authenticator')</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg--primary">
                                <h5 class="card-title text-white mb-0">@lang('Google Authenticator')</h5>
                            </div>
                            <div class=" card-body">
                                <p>@lang('Google Authenticator is a multifactor app for mobile devices. It generates timed codes used during the 2-step verification process. To use Google Authenticator, install the Google Authenticator application on your mobile device.')</p>
                                <a class="btn btn--primary btn-md mt-3" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank">@lang('DOWNLOAD APP')</a>
                            </div>
                        </div><!-- //. single service item -->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--Enable Modal -->
    <div id="enableModal" class="modal fade" role="dialog">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('Verify Your Otp')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('advertiser.twofactor.enable')}}" method="POST">
                    @csrf
                    <div class="modal-body ">
                        <div class="form-group">
                            <input type="hidden" name="key" value="{{$secret}}">
                            <input type="text" class="form-control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger" data-dismiss="modal">@lang('close')</button>
                        <button type="submit" class="btn btn--primary">@lang('verify')</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!--Disable Modal -->
    <div id="disableModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('Verify Your Otp Disable')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('advertiser.twofactor.disable')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('close')</button>
                        <button type="submit" class="btn btn--primary">@lang('verify')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        'use strict'
        function myFunction() {
            var copyText = document.getElementById("referralURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            /*For mobile devices*/
            document.execCommand("copy");
            iziToast.success({message: "Copied: " + copyText.value, position: "topRight"});
        }
    </script>
@endpush


