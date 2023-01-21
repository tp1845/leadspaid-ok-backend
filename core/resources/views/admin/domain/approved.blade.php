@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two" id="datatable5">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Publisher Username')</th>
                                <th scope="col">@lang('Domain Name')</th>
                                <th scope="col">@lang('Site Keywords')</th>
                                <th scope="col">@lang('Domain Tracker')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(!empty($approves))
                            @foreach($approves as $approved)
                                <tr>
                                    <td data-label="@lang('Publisher Username')"><a
                                            href="{{route('admin.publisher.details',$approved->publisher->id)}}"
                                            target="_blank">{{$approved->publisher->username}}</a></td>
                                    <td data-label="@lang('Domain Name')" class="font-weight-bold"><a
                                            href="https://{{$approved->domain_name}}"
                                            target="_blank">{{$approved->domain_name}}</a></td>
                                    <td data-label="@lang('Site Keywords')">
                                        <button type="button" class="icon-btn btn--primary btn-sm view"
                                                data-keyword="{{json_encode(@$approved->keywords)}}">@lang('View')</button>
                                    </td>
                                    <td data-label="@lang('Domain Tracker')">{{$approved->tracker}}</td>
                                    <td data-label="@lang('Action')">
                                        <a href="{{route('admin.domain.unapprove',$approved->id)}}"
                                           class="icon-btn btn--warning mr-2" data-toggle="tooltip" title=""
                                           data-original-title="{{trans('Unapprove')}}">
                                            <i class="las la-ban text--shadow"></i>
                                        </a>
                                        <a href="javacript:void(0)"
                                           data-route="{{route('admin.domain.remove',$approved->id)}}"
                                           class="icon-btn btn--danger delete" data-toggle="tooltip" title=""
                                           data-original-title="{{trans('Delete')}}">
                                            <i class="las la-trash text--shadow"></i>
                                        </a>
                                    </td>
                                </tr>
                           @endforeach
                           @endif

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{$approves->links('admin.partials.paginate')}}
                </div>
            </div><!-- card end -->
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg--primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Keywords')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="tags d-flex flex-wrap justify-content-center"></div>
                    </div>
                </div>
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
    </div>
@endsection



@push('breadcrumb-plugins')
    <form action="{{route('admin.domain.search')}}" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="{{trans('Search by tracker')}}"
                   value="{{old('search')}}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush


@push('script')

    <script>
        'use strict'
        $('.view').on('click', function () {
            $('.tags').children().remove()
            var keywords = $(this).data('keyword')
            if (keywords != null) {
                keywords.forEach(element => {
                    $('.tags').append(`<span class="single-tag font-weight-bold">${element}</span>`)

                });
            }
            $('#modal').modal('show')
        })
        $('.delete').on('click', function () {
            var route = $(this).data('route')
            var modal = $('#deleteModal');
            $('#deleteModal').find('form').attr('action', route)
            modal.modal('show');
        })
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
        .tags {
            margin: -3px -7px;
        }

        .tags .single-tag {
            margin: 3px 7px;
            font-size: 14px;
            padding: 2px 10px;
            border: 1px solid #e5e5e5;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
        }
		  table thead tr th:after {
    top: 14px !important;
}
table thead tr th:before {
    bottom: 14px !important;
}
    </style>

@endpush
