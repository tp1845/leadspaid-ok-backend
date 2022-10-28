@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.sections.content', 'seo')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="data">
                        <input type="hidden" name="seo_image" value="1">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview" style="background-image: url({{getImage(imagePath()['seo']['path'].'/'. @$seo->data_values->image,imagePath()['seo']['size']) }})">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image_input" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                                <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg')</b>. @lang('Image will be resized into') {{imagePath()['seo']['size']}}@lang('px'). </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 mt-xl-0 mt-4">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Meta Keywords')</label>
                                    <small class="ml-2 mt-2 text-facebook">@lang('Separate multiple keywords by') <code>,</code>(@lang('comma')) @lang('or') <code>@lang('enter')</code> @lang('key')</small>
                                    <select name="keywords[]" class="form-control select2-auto-tokenize"  multiple="multiple" required>
                                        @if(@$seo->data_values->keywords)
                                            @foreach($seo->data_values->keywords as $option)
                                                <option value="{{ $option }}" selected>{{ __($option) }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Meta Description')</label>
                                    <textarea name="description" rows="3" class="form-control" placeholder="@lang('SEO meta description')" required>{{ @$seo->data_values->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Social Title')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Social Share Title')" name="social_title" value="{{ @$seo->data_values->social_title }}" required/>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Social Description')</label>
                                    <textarea name="social_description" rows="3" class="form-control" placeholder="@lang('Social Share  meta description')" required>{{ @$seo->data_values->social_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Update')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
<script>
    (function ($) {
        "use strict";
        $('.select2-auto-tokenize').select2({
            dropdownParent: $('.card-body form'),
            tags: true,
            tokenSeparators: [',']
        }); 
    })(jQuery);
</script>
@endpush