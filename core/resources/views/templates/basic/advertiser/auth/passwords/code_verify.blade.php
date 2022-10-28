@extends($activeTemplate.'layouts.frontend')
@php
    $bg = getContent('login.content',true)->data_values;
@endphp
@section('content')

    @include($activeTemplate.'partials.breadcrumb')
    <section class="pt-100 pb-100">
            <div class="container">
            <div class="account-area">
                <div class="row justify-content-center">
                    <div class="col-lg-6 bg_img d-flex flex-wrap justify-content-center align-items-center" data-background="{{getImage('assets/images/frontend/login/'.$bg->background_image,'1920x1080')}}">
                    <div class="account-content text-center px-5 py-4">
                    <h2 class="text-white title">@lang('Reset Password')</h2>
                    <p class="para-white mt-3">@lang('Please provide valid email')</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-wrapper">
                    <div class="tab-content mt-5" id="myTabContent">
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
            
                                <div class="form-group">
                                    <button class="cmn-btn w-100" type="submit">@lang('Verify Your Code')</button>
                                </div>
            
                                <div class="form-group text-center">
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
