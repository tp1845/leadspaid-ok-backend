@extends($activeTemplate.'layouts.publisher.frontend')

@section('panel')
<form action="{{ route('publisher.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center mb-none-30">
        
        
     <div class="col-lg-8 col-md-9 mb-30">
            <div class="card profile-update-card">
                <div class="card-body px-5 py-2">
                    <div class="form-group">
                        <div class="image-upload">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview" style="background-image: url({{ get_image('assets/publisher/images/profile/'. auth()->guard('publisher')->user()->image) }})">
                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                    <label for="profilePicUpload1" class="bg--success"><i class="las la-edit"></i></label>
                                    <small class="mt-2 text-facebook">@lang('Supported files'): <b>jpeg, jpg</b>. @lang('Image will be resized into 400x400px') </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Username')</label>
                                    <input class="form-control" type="text" disabled  value="{{ auth()->guard('publisher')->user()->username }}" >
                                </div>
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Name')</label>
                                    <input class="form-control" type="text" name="name" value="{{ auth()->guard('publisher')->user()->name }}" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Email')</label>
                                    <input class="form-control" type="email" value="{{ auth()->guard('publisher')->user()->email }}"  disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Country')</label>
                                    <input class="form-control" type="text" disabled value="{{ auth()->guard('publisher')->user()->country }}" >
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('City')</label>
                                    <input class="form-control" type="text" name="city" value="{{ auth()->guard('publisher')->user()->city }}" >
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Phone')</label>
                                    <input class="form-control" type="text" value="{{ auth()->guard('publisher')->user()->phone }}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Save Changes')</button>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</form>

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