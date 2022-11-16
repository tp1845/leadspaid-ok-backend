@extends($activeTemplate.'layouts.publisher.frontend')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="table-responsive--lg">
                    <table class="table style--two custom-data-table" id="example">
                        <thead>
                        <tr>
                            <th scope="col">@lang('SR No')</th>
                            <th scope="col">@lang('Domain Name')</th>
                            <th scope="col">@lang('Site Keywords')</th>
                            <th scope="col">@lang('Category')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $in = 0;
                        @endphp
                        @forelse($domainVerifications as $key=>$dv)
                            @php
                                $in++;
                                 $keywords = json_encode($dv->keywords);
                            @endphp
                            <tr>
                                <td data-label="@lang('Domain Name')"><span class="font-weight-bold">{{$in}}</span></td>

                                <td data-label="@lang('Domain Name')"><span class="font-weight-bold">{{$dv->domain_name}}</span></td>

                                <td data-label="@lang('Site Keywords')">
                                    <button type="button" class="btn btn--primary btn-sm view" data-keyword="{{$keywords}}" data-toggle="modal" data-target="#modal">@lang('View')</button>
                                </td>

                                <td data-label="@lang('Category')"><span class="font-weight-bold">{{$dv->category}}</span></td>

                                @if ($dv->status == 0)
                                    <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal badge--danger ">@lang('Unverified')</span></td>
                                @elseif($dv->status == 1)
                                    <td data-label=""><span class="text--small badge font-weight-normal badge--success ">@lang('Verified')</span></td>
                                @else
                                    <td data-label="Action"><span class="text--small badge font-weight-normal badge--warning ">@lang('Pending')</span></td>
                                @endif

                                <td data-label="@lang('Action')">
                                    @if ($dv->status==0)
                                        <a href="{{route('publisher.domain.verify.action',$dv->tracker)}}" class="icon-btn btn--success" data-toggle="tooltip" title="@lang('verify')" data-original-title="Verify domain">
                                            <i class="las la-check-circle text--shadow"></i>
                                        </a>
                                        <a class="icon-btn btn--primary edit text-white" data-toggle="modal" data-target="#update" data-toggle="tooltip" title="" data-original-title="@lang('update')" data-keyword="{{$keywords}}" data-route="{{route('publisher.domain.update',$dv->tracker)}}">
                                            <i class="las la-edit text--shadow "></i>
                                        </a>
                                    @endif
                                    <a href="javascript:void(0)" data-route="{{route('publisher.domain.remove',$dv->tracker)}}" class="icon-btn btn--danger delete" data-toggle="tooltip" data-original-title="@lang('remove')">
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
                    </table>
                    <!-- table end -->
                </div>

            </div>
            <div class="my-3">
                {{--                    {{ $domainVerifications->links('templates.basic.publisher.partials.paginate') }}--}}
                {{$domainVerifications->links('templates.basic.publisher.partials.paginate')}}
            </div>
        </div>
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg--primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Add New Domain')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('publisher.domain.verify.update')}}" method="POST" id="kt_docs_formvalidation_text" class="form" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('Domain Name')</label>
                                <input type="text" class="form-control domain_name" name="domain_name" placeholder="Enter Domain Name e.g.(site.com)">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">@lang('Keywords')<span class="text-danger">*</span></label>
                                (<small class="ml-2 mt-2 text-facebook">@lang('Please use the suggested keywords only')</small> )
                                <select name="keywords[]" class="form-control select2-multi-select" id="keyword" multiple="multiple" required>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('Categories')</label>
                                <select name="category[]" class="form-control select2-multi-select" id="category" multiple="multiple" required>
                                    <option disabled>--select category--</option>
                                    <option>test 1</option>
                                    <option>test 2</option>
                                    <option>test 3</option>
                                    <option>test 4</option>
                                    <option>test 5</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                                <button type="submit" class="btn btn--primary">@lang('Save changes')</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!--edit modal-->
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg--primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Update keywords')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold">@lang('Keywords')<span class="text-danger">*</span></label>
                                    (<small class="ml-2 mt-2 text-facebook">@lang('Please use the suggested keywords only')</small> )
                                    <select name="keywords[]" class="form-control select2-multi-select" id="updatekeyword" multiple="multiple">

                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                                    <button type="submit" class="btn btn--primary">@lang('Save changes')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg--primary">
                                <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Keywords')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="tags d-flex justify-content-center flex-wrap"></div>
                            </div>
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
                            @csrf
                            <div class="modal-body text-center">


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
            <button type="button" class="btn btn--primary new mr-2 mt-1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>
                @lang('Add new Domain')
            </button>


            <form method="GET" class="form-inline float-sm-right bg--white">
                <div class="input-group has_append">
                    <input type="text" name="search_table" class="form-control" placeholder="{{trans('Search')}}">

                </div>
            </form>

        @endpush

        @push('script')
            <script src="https://formvalidation.io/vendors/formvalidation/dist/js/FormValidation.min.js"></script>
            <script src="https://formvalidation.io/vendors/formvalidation/dist/js/plugins/Bootstrap.min.js"></script>


            <script>
                'use strict'
                $('.new').on('click', function () {
                    var keywordUrl = "{{route('keywords')}}";
                    $.get(keywordUrl, function (result) {
                        var keywords = result.forEach(function (cn) {
                            $('#keyword').append('<option value="' + cn + '">' + cn + '</option>')
                        });
                    })
                })

                $('.view').on('click', function () {
                    $('.tags').children().remove()
                    var keywords = $(this).data('keyword')
                    if (keywords != null) {
                        keywords.forEach(element => {
                            $('.tags').append(`<span class="single-tag font-weight-bold">${element}</span>`)

                        });
                    }
                })

                $('.edit').on('click', function () {
                    $('#updatekeyword').children().remove()
                    var keywords = $(this).data('keyword')
                    var route = $(this).data('route')
                    $('#update').find('form').attr('action', route)

                    var existing = []
                    if (keywords != null) {
                        keywords.forEach(element => {
                            existing.push(element);
                            $('#updatekeyword').append(`<option value="${element}" selected>${element}</option>`)
                        });
                    }

                    var keywordUrl = "{{route('keywords')}}";
                    $.get(keywordUrl, function (result) {
                        result = result.filter(val => !existing.includes(val));
                        result.forEach(function (cn) {
                            $('#updatekeyword').append('<option value="' + cn + '">' + cn + '</option>')
                        });
                    })
                })

                $('.delete').on('click', function () {
                    var route = $(this).data('route')

                    var modal = $('#deleteModal');
                    modal.find('form').attr('action', route)
                    modal.modal('show');


                })


                $('.custom-data-table').closest('.card').find('.card-body').attr('style', 'padding-top:0px');
                var tr_elements = $('.custom-data-table tbody tr');
                $(document).on('input', 'input[name=search_table]', function () {
                    var search = $(this).val().toUpperCase();
                    var match = tr_elements.filter(function (idx, elem) {
                        return $(elem).text().trim().toUpperCase().indexOf(search) >= 0 ? elem : null;
                    }).sort();
                    var table_content = $('.custom-data-table tbody');
                    if (match.length == 0) {
                        table_content.html('<tr><td colspan="100%" class="text-center">Not Found</td></tr>');
                    } else {
                        table_content.html(match);
                    }
                })


            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function (e) {
                    FormValidation.formValidation(document.querySelector('#kt_docs_formvalidation_text'), {
                        fields: {
                            domain_name: {
                                validators: {
                                    stringLength: {
                                        message: 'Please Enter a valid Url',
                                    },
                                    regexp: {
                                        regexp: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/,
                                        message: 'Please Enter a valid Url',
                                    },
                                },
                            },
                            keywords: {
                                validators: {
                                    notEmpty: {
                                        message: 'The Keywords field is required',
                                    }
                                },
                            },
                            category: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please selected category',
                                    }
                                },
                            },
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
                    }).on('core.form.valid', function () {
                        document.querySelector('#kt_docs_formvalidation_text').submit();

                    });
                });
            </script>

        @endpush

        @push('style')
            <link rel="stylesheet" href="https://formvalidation.io/vendors/formvalidation/dist/css/formValidation.min.css"/>

            <style>
                .fv-plugins-bootstrap:not(.form-inline) label ~ .fv-plugins-icon {
                    top: 29px;
                }

                div.dataTables_wrapper div.dataTables_paginate {
                    padding: 0 20px 20px;
                }

                .modal-body select {
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    text-indent: 1px;
                    text-overflow: '';
                }

                .ss {
                    border-bottom: none;
                }

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
            </style>

    @endpush
