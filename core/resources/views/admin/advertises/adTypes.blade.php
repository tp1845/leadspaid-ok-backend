@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Ad Name')</th>
                                <th scope="col">@lang('Ad Type')</th>
                                <th scope="col">@lang('Width')</th>
                                <th scope="col">@lang('Height')</th>
                                <th scope="col">@lang('Ad Slug')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($types as $type)
                                <tr>
                                    <td data-label="@lang('Ad Name')" class="text--primary"> {{$type->adName}}</td>
                                    <td data-label="@lang('Ad Type')"><span
                                            class="text--small badge font-weight-normal badge--warning">{{$type->type}}</span>
                                    </td>
                                    <td data-label="@lang('Width')"><span
                                            class="text--small badge font-weight-normal badge--dark">{{ $type->width }}@lang('px')</span>
                                    </td>
                                    <td data-label="@lang('Height')"><span
                                            class="text--small badge font-weight-normal badge--dark">{{ $type->height }}@lang('px')
                                    </td>
                                    <td data-label="@lang('Ad Slug')">{{ $type->slug }}</td>
                                    <td data-label="@lang('Status')"><span
                                            class="text--small badge font-weight-normal {{ $type->status ==1 ?'badge--success':'badge--warning'}}">{{ $type->status == 1 ? 'Active':'Deactive' }}</span>
                                    </td>
                                    <td data-label="Action">
                                        <button type="button" class="icon-btn btn--primary edit"
                                                data-name="{{$type->adName}}"
                                                data-type="{{$type->type}}"
                                                data-width="{{$type->width}}"
                                                data-height="{{$type->height}}"
                                                data-slug="{{$type->slug}}"
                                                data-status="{{$type->status}}"
                                                data-route="{{route('admin.advertise.update.type',$type->id)}}">
                                            <i class="las la-pen text--shadow"></i>
                                        </button>
                                        
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>

            </div><!-- card end -->
        </div>

        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{route('admin.advertise.add.type')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header btn--primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Add new Type')</h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('Ad Name')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="{{trans('Ad name')}}" type="text"
                                               name="adName" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Ad Type')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="{{trans('Ad Type')}}" type="text"
                                               name="adType" value="image" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label  font-weight-bold">@lang('Width')<span
                                            class="text-danger">*</span></label>
                                    <div class="form-group  input-group has_append">
                                        <input type="text" class="form-control" placeholder="{{trans('width')}}"
                                               name="width" id="width" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">@lang('px')</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label  font-weight-bold">@lang('Height')<span
                                            class="text-danger">*</span></label>
                                    <div class="form-group  input-group has_append">
                                        <input type="text" class="form-control" placeholder="{{trans('height')}}"
                                               name="height" id="height" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">@lang('px')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Slug')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="{{trans('slug')}}"
                                               id="slug" name="slug" value="" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang('Status:')
                                    <label class="switch">
                                        <input type="checkbox" name="status" id="checkbox">
                                        <div class="slider round"></div>
                                    </label>
                                </li>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn--primary">@lang('Save changes')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--edit modal-->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header btn--primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Edit Type')</h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('Ad Name')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="@lang('ad name')" type="text"
                                               name="adName"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Ad Type')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="{{trans('type')}}" type="text"
                                               name="adType" value="" required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label  font-weight-bold">@lang('Width')<span
                                            class="text-danger">*</span></label>
                                    <div class="form-group  input-group has_append">
                                        <input type="text" class="form-control" placeholder="{{trans('width')}}" id="w"
                                               name="width" value="" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">@lang('px')</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label  font-weight-bold">@lang('Height')<span
                                            class="text-danger">*</span></label>
                                    <div class="form-group  input-group has_append">
                                        <input type="text" id="h" class="form-control" placeholder="{{trans('height')}}"
                                               name="height" value="" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">@lang('px')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Slug')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="{{trans('slug')}}" id="s"
                                               name="slug" value="" required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang(' Status:')
                                    <label class="switch">
                                        <input type="checkbox" name="status">
                                        <div class="slider round"></div>
                                    </label>
                                </li>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn--primary">@lang('Save changes')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    

    </div>
@endsection



@push('breadcrumb-plugins')
    <button type="button" class="btn btn--primary" data-toggle="modal" data-target="#addModal"><i
            class="fas fa-plus"></i>
        @lang('Add new Type')
    </button>
@endpush

@push('script')
    <script>
        'use strict';
        var input, input2;
        $('#width').on('keyup', function () {
            input = $(this).val();
            $('#slug').val(input);
            if (input == '') {
                $('#slug').val('');
            }
        });
        $('#height').on('keyup', function () {
            input2 = $(this).val();
            $('#slug').val(input + 'x' + input2);
            if (input2 == '') {
                $('#slug').val('');
            }
        })

        var input3, input4;
        $('#w').on('keyup', function () {
            input3 = $(this).val();
            $('#s').val(input3);
            if (input == '') {
                $('#s').val('');
            }
        });
        $('#h').on('keyup', function () {
            input4 = $(this).val();
            $('#s').val(input3 + 'x' + input4);
            if (input4 == '') {
                $('#s').val('');
            }
        })

        var modal = $('#editModal');
        $('.edit').on('click', function () {
            var name = $(this).data('name');
            var type = $(this).data('type')
            var width = $(this).data('width')
            var height = $(this).data('height')
            var slug = $(this).data('slug')
            var status = $(this).data('status')
            var route = $(this).data('route')

            modal.find('input[name=adName]').val(name)
            modal.find('input[name=adType]').val(type)
            modal.find('input[name=width]').val(width)
            modal.find('input[name=height]').val(height)
            modal.find('input[name=slug]').val(slug)
            if (status == 1) {
                modal.find('input[name=status]').attr('checked', 'checked')
            }
            modal.find('form').attr('action', route)
            modal.modal('show')
        })

       
    </script>


@endpush
