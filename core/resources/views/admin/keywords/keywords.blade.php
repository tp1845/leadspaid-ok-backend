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
                                <th scope="col">@lang('Date')</th>
                                <th scope="col">@lang('Keywords')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($keywords as $keyword)

                                <tr>
                                    <td data-label="@lang('Date')">{{showDateTime($keyword->created_at,'d-M-Y')}}</td>

                                    <td data-label="@lang('Keywords')"><span
                                            class="badge badge--primary">{{$keyword->keywords}}</span></td>
                                    <td data-label="Action">
                                        <button type="button" data-toggle="modal" data-target="#editModal"
                                                class="icon-btn edit" data-toggle="tooltip" title="edit"
                                                data-keyword="{{$keyword->keywords}}"
                                                data-route="{{route('admin.update.keywords',$keyword->id)}}"
                                        >
                                            <i class="las la-edit text--shadow"></i>
                                        </button>
                                        <a href="javascript:void(0)"
                                           data-route="{{route('admin.remove.keyword',$keyword->id)}}"
                                           class="icon-btn btn--danger delete" data-toggle="tooltip" title=""
                                           data-original-title="remove">
                                            <i class="las la-trash text--shadow"></i>
                                        </a>
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
    </div>


    <!--keywords modal-->
    @php
        $keyword = <<<EOR
        keyword one
        keyword two
        keyword three
        EOR;
    @endphp

    <!--add modal-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('admin.add.keywords')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('Add Keywords')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">@lang('Keywords')</label>
                            (<small
                                class="ml-2 mt-2 text-facebook">@lang('Separate multiple keywords in new line by press')
                                <code>@lang('enter')</code> @lang('key')</small>)
                            <textarea name="keywords" class="form-control" rows="3"
                                      placeholder="{{$keyword}}"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Add')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--edit modal-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('admin.add.keywords')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('Update Keywords')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">@lang('Keywords')</label>
                            <input type="text" class="form-control" name="keyword">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Update')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form action="" method="POST">
                    <div class="modal-body text-center">

                        @csrf
                        <i class="las la-exclamation-circle text-danger f-size--100  mb-15"></i>
                        <h3 class="text--secondary mb-15">@lang('Are You Sure Want to Delete This?')</h3>

                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('close')</button>
                        <button type="submit" class="btn btn--danger del">@lang('Delete')</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection



@push('breadcrumb-plugins')

    <button type="button" class="btn btn--primary" data-toggle="modal" data-target="#addModal">
        <i class="las la-plus"></i>@lang('Add New')
    </button>

@endpush

@push('script')

    <script>
        'use strict'
        $(function () {

            $('.edit').on('click', function () {
                $('.key').find('option').remove();
                var route = $(this).data('route');
                var keyword = $(this).data('keyword')
                $('#editModal').find('form').attr('action', route)
                $('#editModal').find('input[name=keyword]').val(keyword);
            })
        })

        $('.delete').on('click', function () {
            var route = $(this).data('route')
            var modal = $('#deleteModal');
            $('#deleteModal').find('form').attr('action', route)
            modal.modal('show');
        })
    </script>

@endpush
