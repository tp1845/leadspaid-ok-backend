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
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Price')</th>
                                <th scope="col">@lang('Type')</th>
                                <th scope="col">@lang('Credit')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($plans as $plan)
                                <tr>
                                    <td data-label="@lang('Name')" class="text--primary">{{ $plan->name }}</td>
                                    <td data-label="@lang('Price')"><span
                                            class="badge  bg--primary">{{$general->cur_sym}} {{ getAmount($plan->price) }}</span>
                                    </td>
                                    <td data-label="@lang('Type')"><span
                                            class="text--small badge font-weight-normal {{$plan->type=='click' ? 'badge--dark':'badge--warning'}} bg--">{{ ucfirst($plan->type) }}</span>
                                    </td>
                                    <td data-label="@lang('Credit')"><span
                                            class="badge badge-pill bg--secondary">{{ getAmount($plan->credit) }}</span>
                                    </td>
                                    <td data-label="@lang('Status')"><span
                                            class="text--small badge font-weight-normal {{ $plan->status ==1 ?'badge--success':'badge--warning'}}">{{ $plan->status ==1?'Active':'Deactive' }}</span>
                                    </td>
                                    <td data-label="@lang('Actions')">
                                        <button type="button" class="icon-btn btn--primary edit"
                                                data-name="{{$plan->name}}"
                                                data-price="{{getAmount($plan->price,2)}}"
                                                data-type="{{$plan->type}}"
                                                data-credit="{{getAmount($plan->credit)}}"
                                                data-status="{{$plan->status}}"
                                                data-route="{{route('admin.advertise.update.price-plan',$plan->id)}}">
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

        <!--add modal-->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{route('admin.advertise.add.price-plan')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header btn--primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Add new Plan')</h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('Name')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="{{trans('Plan name')}}" type="text"
                                               name="name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-control-label  font-weight-bold">@lang('Price')<span
                                            class="text-danger">*</span></label>
                                    <div class="form-group  input-group has_append">
                                        <input type="text" class="form-control" placeholder="{{trans('Price')}}"
                                               name="price" required value="{{ old('price') }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">{{$general->cur_text}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Type')<span
                                                class="text-danger">*</span></label>
                                        <select name="type" class="form-control">
                                            <option>@lang('--select type--')</option>
                                            <option value="impression">@lang('Impression')</option>
                                            <option value="click">@lang('Click')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Credit')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="{{trans('Credit')}}"
                                               name="credit" value="{{ old('credit') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang(' Status:')
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
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header btn--primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Edit Plans')</h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('Name')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="{{trans('Plan name')}}" type="text"
                                               name="name" value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-control-label  font-weight-bold">@lang('Price')<span
                                            class="text-danger">*</span></label>
                                    <div class="form-group  input-group has_append">
                                        <input type="text" class="form-control" placeholder="{{trans('Price')}}"
                                               name="price" required value="">
                                        <div class="input-group-append">
                                            <div class="input-group-text">{{$general->cur_sym}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Type')<span
                                                class="text-danger">*</span></label>
                                        <select name="type" class="form-control">
                                            <option>@lang('--Select type--')</option>
                                            <option value="impression">@lang('Impression')</option>
                                            <option value="click">@lang('Click')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Credit')<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="{{trans('Credit')}}" type="text"
                                               name="credit" value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    @lang('Status:')
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
        @lang('Add new Plan')
    </button>
@endpush

@push('script')

    <script>
        'use strict';
        var modal = $('#editModal');
        $('.edit').on('click', function () {
            var name = $(this).data('name');
            var price = $(this).data('price')
            var type = $(this).data('type')
            var credit = $(this).data('credit')
            var status = $(this).data('status')
            var route = $(this).data('route')

            modal.find('input[name=name]').val(name)
            modal.find('input[name=price]').val(price)
            modal.find('select[name=type]').val(type)

            modal.find('input[name=credit]').val(credit)
            if (status == 1) {
                modal.find('input[name=status]').attr('checked', 'checked')
            }
            modal.find('form').attr('action', route)
            modal.modal('show')
        })
    </script>


@endpush
