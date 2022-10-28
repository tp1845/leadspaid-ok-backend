@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper default-version">
        <div class="form-area bg_img" data-background="{{asset('assets/admin/images/1.jpg')}}">
            <div class="form-wrapper">
                <h4 class="logo-text mb-15"><strong>@lang('Recover Account')</strong></h4>
                <form action="{{ route('admin.password.verify-code') }}" method="POST" class="cmn-form mt-30">
                    @csrf
                    <div class="form-group">
                        <div id="phoneInput">
                            <div class="field-wrapper">
                                <div class=" phone">
                                    <input type="text" name="code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1" required>
                                    <input type="text" name="code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1" required>
                                    <input type="text" name="code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1" required>
                                    <input type="text" name="code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1" required>
                                    <input type="text" name="code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1" required>
                                    <input type="text" name="code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.password.reset') }}" class="text-muted text--small">@lang('Try to send again')</a>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Verify Code') <i class="las la-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>
        </div><!-- login-area end -->
    </div>
@endsection


@push('script-lib')
    <script src="{{asset('assets/admin/js/jquery.inputLettering.js')}}"></script>
@endpush
@push('style')
    <style>
        #phoneInput .field-wrapper {
            position: relative;
            text-align: center;
        }

        #phoneInput .form-group {
            min-width: 300px;
            width: 50%;
            margin: 4em auto;
            display: flex;
            border: 1px solid rgba(96, 100, 104, 0.3);
        }

        #phoneInput .letter {
            height: 50px;
            border-radius: 0;
            text-align: center;
            max-width: calc((100% / 10) - 1px);
            flex-grow: 1;
            flex-shrink: 1;
            flex-basis: calc(100% / 10);
            outline-style: none;
            padding: 5px 0;
            font-size: 18px;
            font-weight: bold;
            color: red;
            border: 1px solid #0e0d35;
        }

        #phoneInput .letter + .letter {
        }

        @media (max-width: 480px) {
            #phoneInput .field-wrapper {
                width: 100%;
            }

            #phoneInput .letter {
                font-size: 16px;
                padding: 2px 0;
                height: 35px;
            }
        }

    </style>
@endpush
@push('script')
    <script>
        $(function () {
            "use strict";

            $('#phoneInput').letteringInput({
                inputClass: 'letter',
                onLetterKeyup: function ($item, event) {
                    console.log('$item:', $item);
                    console.log('event:', event);
                },
                onSet: function ($el, event, value) {
                    console.log('element:', $el);
                    console.log('event:', event);
                    console.log('value:', value);
                }
            });
        });
    </script>
@endpush
