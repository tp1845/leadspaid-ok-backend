@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">

                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two" id="datatable5">

                            <thead>
                            <tr>
                                <th scope="col">@lang('Method')</th>
                                <th scope="col">@lang('Currency')</th>
                                <th scope="col">@lang('Charge')</th>
                                <th scope="col">@lang('Withdraw Limit')</th>
                                <th scope="col">@lang('Processing Time') </th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(!empty($methods))
                            @foreach($methods as $method)
                                <tr>
                                    <td data-label="@lang('Method')">
                                        <div class="user">
                                            <div class="thumb"><img src="{{ getImage(imagePath()['withdraw']['method']['path'].'/'. $method->image,imagePath()['withdraw']['method']['size'])}}" alt="@lang('image')"></div>

                                            <span class="name">{{__($method->name)}}</span>
                                        </div>
                                    </td>

                                    <td data-label="@lang('Currency')"
                                        class="font-weight-bold">{{ __($method->currency) }}</td>
                                    <td data-label="@lang('Charge')"
                                        class="font-weight-bold">{{ getAmount($method->fixed_charge)}} {{__($general->cur_text) }} {{ (0 < $method->percent_charge) ? ' + '. getAmount($method->percent_charge) .' %' : '' }} </td>
                                    <td data-label="@lang('Withdraw Limit')"
                                        class="font-weight-bold">{{ $method->min_limit + 0 }}
                                        - {{ $method->max_limit + 0 }} {{__($general->cur_text) }}</td>
                                    <td data-label="@lang('Processing Time')">{{ $method->delay }}</td>
                                    <td data-label="@lang('Status')">
                                        @if($method->status == 1)
                                            <span class="text--small badge font-weight-normal badge--success">@lang('Active')</span>
                                        @else
                                            <span class="text--small badge font-weight-normal badge--warning">@lang('Disabled')</span>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.withdraw.method.edit', $method->id)}}"
                                           class="icon-btn ml-1" data-toggle="tooltip" data-original-title="@lang('Edit')"><i class="las la-pen"></i></a>
                                        @if($method->status == 1)
                                            <a href="javascript:void(0)" class="icon-btn btn--danger deactivateBtn  ml-1" data-toggle="tooltip" data-original-title="@lang('Disable')" data-id="{{ $method->id }}" data-name="{{ __($method->name) }}">
                                                <i class="la la-eye-slash"></i>
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" class="icon-btn btn--success activateBtn  ml-1"
                                               data-toggle="tooltip" data-original-title="@lang('Enable')"
                                               data-id="{{ $method->id }}" data-name="{{ __($method->name) }}">
                                                <i class="la la-eye"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                             @endforeach
                             @endif

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>


    {{-- ACTIVATE METHOD MODAL --}}
    <div id="activateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Withdrawal Method Activation Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.withdraw.method.activate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to activate') <span class="font-weight-bold method-name"></span> @lang('method')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Activate')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DEACTIVATE METHOD MODAL --}}
    <div id="deactivateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Withdrawal Method Disable Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.withdraw.method.deactivate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to disable') <span class="font-weight-bold method-name"></span> @lang('method')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--danger">@lang('Disable')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('breadcrumb-plugins')
    <a class="btn btn-sm btn--primary box--shadow1 text--small" href="{{ route('admin.withdraw.method.create') }}"><i class="fa fa-fw fa-plus"></i>@lang('Add New')</a>
@endpush


@push('script')
    <script>
        $(function () {
            "use strict";
            $('.activateBtn').on('click', function () {
                var modal = $('#activateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'));
                modal.modal('show');
            });

            $('.deactivateBtn').on('click', function () {
                var modal = $('#deactivateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });
        });
		$('#datatable5').DataTable({
            
            "sDom": 'Lfrtlip',
            "language": {
                "lengthMenu": "Show rows  _MENU_",
                search: "",
                searchPlaceholder: "Search"
            }
           
        });
    </script>
@endpush

@push('style')
<style>
    table thead tr th:after {
    top: 14px !important;
}
table thead tr th:before {
    bottom: 14px !important;
}


</style>
@endpush