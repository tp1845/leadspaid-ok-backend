@extends($activeTemplate.'layouts.frontendLeadPaid')
@php
    $bg = getContent('login.content',true)->data_values;
@endphp
@section('content')
    {{-- @include($activeTemplate.'partials.breadcrumb') --}}
    <section class="py-4">
            <div class="container">
                <div class="account-area">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <p class="page_title mb-5">Account Recovery</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="account-wrapper">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="publisher" role="tabpanel" aria-labelledby="publisher-tab">
                                        <form action="{{ route('advertiser.password.verify-code') }}" method="POST" class="cmn-form mt-30">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $email }}">
                                            <div class="form-group">
                                                <div id="phoneInput">
                                                    <div class="field-wrapper">
                                                        <div class=" phone">
                                                            <div class="row form-row">
                                                                <div class="col-2">
                                                                    <div class="account-form-group">
                                                                        <input type="text" name="code[]" class="letter border"
                                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="account-form-group">
                                                                        <input type="text" name="code[]" class="letter border"
                                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="account-form-group">
                                                                        <input type="text" name="code[]" class="letter border"
                                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="account-form-group">
                                                                        <input type="text" name="code[]" class="letter border"
                                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="account-form-group">
                                                                        <input type="text" name="code[]" class="letter border"
                                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="account-form-group">
                                                                        <input type="text" name="code[]" class="letter border"
                                                                        pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <button class="cmn-btn w-100" type="submit">@lang('Verify Your Code')</button>
                                            </div>
                                            <div class="form-group text-center my-4">
                                                <small class="text-center"> @lang('Please check including your Junk/Spam Folder.If you do not find')</small>
                                            </div>
                                            <div class="form-group text-center">
                                                <a class="text-primary font-weight-bold " href="{{ route('advertiser.password.reset') }}">@lang('Try again')</a>
                                            </div>
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

@push('script-lib')
    <script src="{{ asset('assets/templates/basic/js/jquery.inputLettering.js') }}"></script>
@endpush
@push('style')
<style>
    .page_title{
        text-align: center;
        color: #191f58;
        font-family: Poppins !important;
        font-weight: 600;
        font-size: 38px;
        margin-top: 50px;
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
        width: 100%;
        height: 50px;
        border-radius: 0;
        text-align: center;
        flex-grow: 1;
        flex-shrink: 1;
        flex-basis: calc(100% / 10);
        outline-style: none;
        padding: 5px 0;
        font-size: 18px;
        font-weight: bold;
        color: red;
        border: 1px solid #04040e;
    }

    #phoneInput .letter + .letter { }

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
        'use strict'
        $(function () {
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
