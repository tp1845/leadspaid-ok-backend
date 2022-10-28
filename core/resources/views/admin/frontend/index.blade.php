@extends('admin.layouts.app')

@section('panel')
    @if(@$section->content)
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.frontend.sections.content', $key)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="content">
                            <div class="row">
                                @php
                                    $imgCount = 0;
                                @endphp
                                @foreach($section->content as $k => $item)
                                    @if($k == 'images')
                                        @php
                                            $imgCount = collect($item)->count();
                                        @endphp
                                        @foreach($item as $imgKey => $image)
                                            <div class="col-md-4">
                                                <input type="hidden" name="has_image" value="1">
                                                <div class="form-group">
                                                    <label>{{__(inputTitle(@$imgKey))}}</label>
                                                    <div class="image-upload">
                                                        <div class="thumb">
                                                            <div class="avatar-preview">
                                                                <div class="profilePicPreview" style="background-image: url({{getImage('assets/images/frontend/' . $key .'/'. @$content->data_values->$imgKey,@$section->content->images->$imgKey->size) }})">
                                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="avatar-edit">
                                                                <input type="file" class="profilePicUpload" name="image_input[{{ @$imgKey }}]" id="profilePicUpload{{ $loop->index }}" accept=".png, .jpg, .jpeg">
                                                                <label for="profilePicUpload{{ $loop->index }}"
                                                                       class="bg--primary">{{__(inputTitle(@$imgKey))}}</label>
                                                                <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg'), @lang('png')</b>.
                                                                    @if(@$section->content->images->$imgKey->size)
                                                                        | @lang('Will be resized to'):
                                                                        <b>{{@$section->content->images->$imgKey->size}}</b>
                                                                        @lang('px').
                                                                    @endif
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="@if($imgCount > 1) col-md-12 @else col-md-8 @endif">
                                            @push('divend')
                                        </div>
                                        @endpush
                                    @else
                                        @if($k != 'images')
                                            @if($item == 'icon')
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label class="form-control-label font-weight-bold">{{__(inputTitle($k))}}</label>
                                                        <div class="input-group has_append">
                                                            <input type="text" class="form-control icon" name="{{ $k }}" value="{{ @$content->data_values->$k }}" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary iconPicker" data-icon="{{ @$content->data_values->$k ? substr(@$content->data_values->$k,10,-6) : 'las la-home' }}" role="iconpicker"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($item == 'textarea')

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label  font-weight-bold">{{__(inputTitle($k))}}</label>
                                                        <textarea rows="10" class="form-control" placeholder="{{__(inputTitle($k))}}" name="{{$k}}" required>{{ @$content->data_values->$k}}</textarea>
                                                    </div>
                                                </div>

                                            @elseif($item == 'textarea-nic')
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label  font-weight-bold">{{__(inputTitle($k))}}</label>
                                                        <textarea rows="10" class="form-control nicEdit" placeholder="{{__(inputTitle($k))}}" name="{{$k}}" >{{ @$content->data_values->$k}}</textarea>
                                                    </div>
                                                </div>
                                            @elseif($k == 'select')
                                                @php
                                                    $selectName = $item->name;
                                                @endphp
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label  font-weight-bold">{{__(inputTitle(@$selectName))}}</label>
                                                        <select class="form-control" name="{{ @$selectName }}">
                                                            @foreach($item->options as $selectItemKey => $selectOption)
                                                                <option value="{{ $selectItemKey }}" @if(@$content->data_values->$selectName == $selectItemKey) selected @endif>{{ $selectOption }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label  font-weight-bold">{{__(inputTitle($k))}}</label>
                                                        <input type="text" class="form-control" placeholder="{{__(inputTitle($k))}}" name="{{$k}}" value="{{@$content->data_values->$k }}" required/>
                                                    </div>
                                                </div>

                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                                @stack('divend')
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn--dark btn-block btn-lg">@lang('Submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    

    @if(@$section->element)

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive--sm table-responsive">
                            <table class="table table--light style--two custom-data-table">
                                <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    @if(@$section->element->images)
                                        <th>@lang('Image')</th>
                                    @endif
                                    @foreach($section->element as $k => $type)
                                        @if($k !='modal')
                                            @if($type=='text' || $type=='icon')
                                                <th>{{ __(inputTitle($k)) }}</th>
                                            @elseif($k == 'select')
                                                <th>{{inputTitle(@$section->element->$k->name)}}</th>
                                            @endif
                                        @endif
                                    @endforeach
                                    <th>@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @forelse($elements as $data)
                                    <tr>
                                        <td data-label="@lang('SL')">{{$loop->iteration}}</td>
                                        @if(@$section->element->images)
                                        @php $firstKey = collect($section->element->images)->keys()[0]; @endphp
                                            <td data-label="@lang('Image')">
                                                <div class="customer-details d-block">
                                                    <a href="javascript:void(0)" class="thumb">
                                                        <img src="{{ getImage('assets/images/frontend/' . $key .'/'. @$data->data_values->$firstKey,@$section->element->images->$firstKey->size) }}" alt="@lang('image')">
                                                    </a>
                                                </div>
                                            </td>
                                        @endif
                                        @foreach($section->element as $k => $type)
                                            @if($k !='modal')
                                                @if($type == 'text' || $type == 'icon')
                                                    @if($type == 'icon')
                                                        <td data-label="@lang('Icon')">@php echo @$data->data_values->$k; @endphp</td>
                                                    @else
                                                        <td data-label="{{ __(inputTitle($k)) }}">{{__(@$data->data_values->$k)}}</td>
                                                    @endif
                                                @elseif($k == 'select')
                                                    @php
                                                        $dataVal = @$section->element->$k->name;
                                                    @endphp
                                                    <td data-label="{{inputTitle(@$section->element->$k->name)}}">{{@$data->data_values->$dataVal}}</td>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td data-label="@lang('Action')">
                                            @if($section->element->modal)
                                            @php
                                                $images = [];
                                                if(@$section->element->images){
                                                    foreach($section->element->images as $imgKey => $imgs){
                                                        $images[] = getImage('assets/images/frontend/' . $key .'/'. @$data->data_values->$imgKey,@$section->element->images->$imgKey->size);
                                                    }
                                                }
                                            @endphp
                                                <button class="icon-btn updateBtn" 
                                                    data-id="{{$data->id}}" 
                                                    data-all="{{json_encode($data->data_values)}}" 
                                                    @if(@$section->element->images) 
                                                        data-images="{{ json_encode($images) }}" 
                                                    @endif>
                                                    <i class="la la-pencil-alt"></i>
                                                </button>
                                            @else
                                                <a href="{{route('admin.frontend.sections.element',[$key,$data->id])}}" class="icon-btn"><i class="la la-pencil-alt"></i></a>
                                            @endif
                                            <button class="icon-btn btn--danger removeBtn" data-id="{{ $data->id }}"><i class="la la-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Add METHOD MODAL --}}
        <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> @lang('Add New') {{__(inputTitle($key))}} @lang('Item')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.frontend.sections.content', $key) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="element">
                        <div class="modal-body">
                            @foreach($section->element as $k => $type)
                                @if($k != 'modal')
                                    @if($type == 'icon')

                                        <div class="form-group">
                                            <label>{{__(inputTitle($k))}}</label>
                                            <div class="input-group has_append">
                                                <input type="text" class="form-control icon" name="{{ $k }}" required>

                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary iconPicker" data-icon="las la-home" role="iconpicker"></button>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($k == 'select')
                                    <div class="form-group">
                                        <label>{{inputTitle(@$section->element->$k->name)}}</label>
                                        <select class="form-control" name="{{ @$section->element->$k->name }}">
                                            @foreach($section->element->$k->options as $selectKey => $options)
                                                <option value="{{ $selectKey }}">{{ $options }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @elseif($k == 'images')
                                        @foreach($type as $imgKey => $image)
                                        <input type="hidden" name="has_image" value="1">
                                        <div class="form-group">
                                            <label>{{__(inputTitle($k)) }}</label>
                                            <div class="image-upload">
                                                <div class="thumb">
                                                    <div class="avatar-preview">
                                                        <div class="profilePicPreview" style="background-image: url({{ getImage('/',@$section->element->images->$imgKey->size) }})">
                                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="avatar-edit">
                                                        <input type="file" class="profilePicUpload" name="image_input[{{ $imgKey }}]" id="addImage{{ $loop->index }}" accept=".png, .jpg, .jpeg">
                                                        <label for="addImage{{ $loop->index }}" class="bg--success">{{ __(inputTitle($imgKey)) }}</label>
                                                        <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg'), @lang('png')</b>.
                                                            @if(@$section->element->images->$imgKey->size)
                                                                | @lang('Will be resized to'): <b>{{@$section->element->images->$imgKey->size}}</b> @lang('px').
                                                            @endif
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @elseif($type == 'textarea')

                                        <div class="form-group">
                                            <label>{{__(inputTitle($k))}}</label>
                                            <textarea rows="4" class="form-control" placeholder="{{__(inputTitle($k))}}" name="{{$k}}" required></textarea>
                                        </div>

                                    @elseif($type == 'textarea-nic')

                                        <div class="form-group">
                                            <label>{{__(inputTitle($k))}}</label>
                                            <textarea rows="4" class="form-control nicEdit" placeholder="{{__(inputTitle($k))}}" name="{{$k}}"></textarea>
                                        </div>

                                    @else

                                        <div class="form-group">
                                            <label>{{__(inputTitle($k))}}</label>
                                            <input type="text" class="form-control" placeholder="{{__(inputTitle($k))}}" name="{{$k}}" required/>
                                        </div>

                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn--primary">@lang('Save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        {{-- Update METHOD MODAL --}}
        <div id="updateBtn" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> @lang('Update')  {{__(inputTitle($key))}} @lang('Item')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.frontend.sections.content', $key) }}" class="edit-route" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="element">
                        <input type="hidden" name="id">
                        <div class="modal-body">
                            @foreach($section->element as $k => $type)
                                @if($k != 'modal')
                                    @if($type == 'icon')

                                        <div class="form-group">
                                            <label>{{inputTitle($k)}}</label>
                                            <div class="input-group has_append">
                                                <input type="text" class="form-control icon" name="{{ $k }}" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary iconPicker" data-icon="las la-home" role="iconpicker"></button>
                                                </div>
                                            </div>
                                        </div>

                                    @elseif($k == 'select')
                                    <div class="form-group">
                                        <label>{{inputTitle(@$section->element->$k->name)}}</label>
                                        <select class="form-control" name="{{ @$section->element->$k->name }}">
                                            @foreach($section->element->$k->options as $selectKey => $options)
                                                <option value="{{ $selectKey }}">{{ $options }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @elseif($k == 'images')
                                        @foreach($type as $imgKey => $image)
                                        <input type="hidden" name="has_image" value="1">
                                        <div class="form-group">
                                            <label>{{__(inputTitle($k))}}</label>
                                            <div class="image-upload">
                                                <div class="thumb">
                                                    <div class="avatar-preview">
                                                        <div class="profilePicPreview imageModalUpdate{{ $loop->index }}">
                                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="avatar-edit">
                                                        <input type="file" class="profilePicUpload" name="image_input[{{ $imgKey }}]" id="uploadImage{{ $loop->index }}" accept=".png, .jpg, .jpeg">
                                                        <label for="uploadImage{{ $loop->index }}" class="bg--success">{{ __(inputTitle($imgKey)) }}</label>
                                                        <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg'), @lang('png')</b>.
                                                            @if(@$section->element->images->$imgKey->size)
                                                                | @lang('Will be resized to'): <b>{{@$section->element->images->$imgKey->size}}</b> @lang('px').
                                                            @endif
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @elseif($type == 'textarea')

                                        <div class="form-group">
                                            <label>{{inputTitle($k)}}</label>
                                            <textarea rows="4" class="form-control" placeholder="{{__(inputTitle($k))}}" name="{{$k}}" required></textarea>
                                        </div>

                                    @elseif($type == 'textarea-nic')

                                        <div class="form-group">
                                            <label>{{inputTitle($k)}}</label>
                                            <textarea rows="4" class="form-control nicEdit" placeholder="{{__(inputTitle($k))}}" name="{{$k}}"></textarea>
                                        </div>

                                    @else
                                        <div class="form-group">
                                            <label>{{inputTitle($k)}}</label>
                                            <input type="text" class="form-control" placeholder="{{__(inputTitle($k))}}" name="{{$k}}" required/>
                                        </div>

                                    @endif
                                @endif
                            @endforeach
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn--primary">@lang('Update')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        {{-- REMOVE METHOD MODAL --}}
        <div id="removeModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Confirmation')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.frontend.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="modal-body">
                            <p class="font-weight-bold">@lang('Are you sure to delete this item? Once deleted can not be undone.')</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn--danger">@lang('Remove')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('breadcrumb-plugins')
            @if($section->element->modal)
                <a href="javascript:void(0)" class="btn btn-sm btn--primary box--shadow1 text--small addBtn"><i class="fa fa-fw fa-plus"></i>@lang('Add New')</a>
            @else
                <a href="{{route('admin.frontend.sections.element',$key)}}" class="btn btn-sm btn--success box--shadow1 text--small"><i class="fa fa-fw fa-plus"></i>@lang('Add New')</a>
            @endif
        @endpush
    @endif
    {{-- if section element end --}}


@endsection

@push('script-lib')
    <script src="{{ asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
@endpush


@push('script')

    <script>
        (function ($) {
            "use strict";
            $('.removeBtn').on('click', function () {
                var modal = $('#removeModal');
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });

            $('.addBtn').on('click', function () {
                var modal = $('#addModal');
                modal.modal('show');
            });

            $('.updateBtn').on('click', function () {
                var modal = $('#updateBtn');
                modal.find('input[name=id]').val($(this).data('id'));

                var obj = $(this).data('all');
                var images = $(this).data('images');
                if (images) {
                    for (var i = 0; i < images.length; i++) {
                        var imgloc = images[i];
                        $(`.imageModalUpdate${i}`).css("background-image", "url(" + imgloc + ")");
                    }
                }
                $.each(obj, function (index, value) {
                    modal.find('[name=' + index + ']').val(value);
                });

                modal.modal('show');
            });

            $('#updateBtn').on('shown.bs.modal', function (e) {
                $(document).off('focusin.modal');
            });
            $('#addModal').on('shown.bs.modal', function (e) {
                $(document).off('focusin.modal');
            });

            $('.iconPicker').iconpicker().on('change', function (e) {
                $(this).parent().siblings('.icon').val(`<i class="${e.icon}"></i>`);
            });
        })(jQuery);
    </script>

@endpush
