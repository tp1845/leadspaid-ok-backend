@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')


<section class="pt-100 pb-100">
    <div class="container">
        <div class="account-area">
            <div class="row justify-content-center">

                <div class="col-lg-7">
                    <div class="profile account-wrapper">
                        <div class="tab-content mt-5" id="myTabContent">
                            <form method="POST" id="publisher_form" action="{{route('publisher.profile.update')}}">
                                @csrf
                                <div class="card border shadow-sm mb-4" style="overflow: inherit;">
                                    <div class="bg-light card-header font-weight-bolder text-body"> Basic Information
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group ">
                                            <label>@lang('Company Name')</label>
                                            <input type="text" class="form-control" name="company_name" value="{{ $publisher->company_name }}" placeholder="Company Name">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('Full Name') <sup class="text-danger">*</sup></label>
                                            <input type="text" name="name" placeholder="Full Name" class="form-control" value="{{$publisher->name}}" required>
                                        </div>
                                        <div class="form-group country-code">
                                            <label>@lang('Phone') <sup class="text-danger">*</sup></label>
                                            <input type="text" name="phone" value="{{$publisher->phone}}" class="form-control" required placeholder="@lang('Your Phone Number')">

                                        </div>
                                        <div class="form-group">
                                            <label>@lang('Billing Email Address') <sup class="text-danger">*</sup></label>
                                            <input type="email" name="email" placeholder="Billing Email address" class="form-control" value="{{$publisher->email}}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="City" name="city" class="form-control" value="{{$publisher->city}}" required>
                                        </div>

                                        <div class="form-group">
                                            <select class="custom-select mr-sm-2 form-control" value="{{$publisher->country}}" required name="country">
                                                @foreach ($countries as $country)
                                                <option @if($publisher->country === $country->country_name)
                                                    selected="selected" @endif
                                                    value=" {{ $country->country_name }} " label=" {{
                                                        $country->country_name }} ">
                                                    {{ $country->country_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Postal Code" name="postal_code" class="form-control" value="{{$publisher->postal_code}}" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="card border shadow-sm mb-4">
                                    <div class="bg-light card-header font-weight-bolder text-body"> User Information
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>@lang('Username') <sup class="text-danger">*</sup></label>
                                            <input type="text" name="username" placeholder="User Name" class="form-control" readonly value="{{$publisher->username}}" required>
                                        </div>
                                    </div>

                                </div>

                                @include($activeTemplate.'partials.custom-captcha')
                                <div class="form-group row">
                                    <div class="col-md-12 ">
                                        @php echo recaptcha() @endphp
                                    </div>
                                </div>
                                <button type="submit" class="box--shadow1 btn btn--primary btn-lg text--small w-100">@lang('Save Changes')</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('breadcrumb-plugins')
    <a href="{{route('publisher.password')}}" class="btn btn-sm btn--primary box--shadow1 text--small" ><i class="fa fa-key"></i>@lang('Password Setting')</a>
@endpush

@push('script')
<script>

    "use strict";
    function proPicURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var preview = $(input).parents('.thumb').find('.profilePicPreview');
            $(preview).css('background-image', 'url(' + e.target.result + ')');
            $(preview).addClass('has-image');
            $(preview).hide();
            $(preview).fadeIn(650);
        }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".profilePicUpload").on('change', function () {
        proPicURL(this);
    });
    
    document.addEventListener('DOMContentLoaded', function(e) {
        FormValidation.formValidation(document.querySelector('#publisher_form'), {
            fields: {
                company_name: {
                    validators: {
                        stringLength: {
                            min: 3,
                            message: 'Please fill Full Company Name.',
                        }
                    },
                },

                name: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Full Name.',
                        },
                        stringLength: {
                            min: 3,
                            message: 'Please fill Full Name.',
                        },
                        regexp: {
                            regexp: /^[a-z A-Z]+$/,
                            message: 'Full Name Invalid.',
                        },
                    },
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Phone Number.',
                        },
                        stringLength: {
                            min: 6,
                            message: 'Please fill Phone Number.',
                        },
                    },
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill vaild Email.',
                        },
                        emailAddress: {},
                    },
                },
                city: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill city.',
                        },
                        stringLength: {
                            min: 2,
                            message: 'Please fill city.',
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'City Invalid.',
                        },
                    },
                },
                country: {
                    validators: {
                        notEmpty: {
                            message: 'Select Country.',
                        }
                    },
                },
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Username.',
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_]+$/,
                            message: 'Username Invalid.',
                        },
                    },
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Password',
                        },
                    },
                },
                password_confirmation: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Confirm Password',
                        },
                        checkConfirmation: {
                            message: 'Passowrd Mismatch',
                            callback: function(input) {
                                return document.querySelector("#publisher_form").querySelector('[name="password"]').value === input.value;
                            },
                        },
                    },
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                icon: new FormValidation.plugins.Icon({
                    valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh',
                }),
                alias: new FormValidation.plugins.Alias({
                    checkConfirmation: 'callback'
                }),
            },
        }).on('core.form.valid', function() {
            document.querySelector('#publisher_form').submit();

        });
    });

    $(".remove-image").on('click', function () {
        $(this).parents(".profilePicPreview").css('background-image', 'none');
        $(this).parents(".profilePicPreview").removeClass('has-image');
        $(this).parents(".thumb").find('input[type=file]').val('');
    });

    $("form").on("change", ".file-upload-field", function(){ 
    $(this).parent(".file-upload-wrapper").attr("data-text",   $(this).val().replace(/.*(\/|\\)/, '') );
    });
</script>

@endpush