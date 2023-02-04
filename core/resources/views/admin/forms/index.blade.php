@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class=" ">
            <select id="company_search" class="form-select form-select-lg mb-3 position-absolute" aria-label=".form-select-lg" style="right: 13rem;top: -2.85rem;border-radius: 0;z-index: 1;">
                <option value="">Select Company Name</option>
                @forelse($companies as $company)
                <option <?php echo isset($_GET['advertiser']) ? ($_GET['advertiser'] == $company->id ? "selected" : "") : "" ?> value="{{$company->id}}">{{$company->company_name}}</option>
                @empty
                @endforelse
            </select>
            <div class="table-responsive--lg">
                <table id="form_list" class="table table-striped table-bordered datatable " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>A.ID</th>
                            <th>A.Name</th>
                            <th>Form Name</th>
                            <th>Leads</th>
                            <th>Download Leads</th>
                            <th>Company</th>
                            <th>C.Logo</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>USP </th>
                            <th>Youtube_1</th>
                            <th>Youtube_2</th>
                            <th>Youtube_3</th>
                            <th>Image_1</th>
                            <th>Image_2</th>
                            <th>Image_3</th>
                            <th>Field 1</th>
                            <th>Field 2</th>
                            <th>Field 3</th>
                            <th>Field 4</th>
                            <th>Field 5</th>
                            <th>Status</th>
                            <th>Creation Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forms as $form)
                        <tr>
                            <td>{{ $form->id }}</td>
                            <td>{{ $form->advertiser_id }}</td>
                            <td>{{ $form->aname }}</td>
                            <td>
                                @if (isset($form->form_name))
                                <a href="#" class="btn_form_preview" data-id="{{$form->id}}" data-name="{{ $form->form_name }}"> {{ $form->form_name }} </a> @endif
                            </td>
                            <td>{{ get_form_leads_by_id($form->id)}}</td>
                            <td><a>XLSX</a> |
                                <a>CSV</a>
                                {{-- | <a href="#">Google Sheet</a> --}}
                            </td>
                            <td>
                                <spn>{{ $form->company_name }}</spn>
                            </td>
                            <td style="min-width: 120px;">
                                <?php if (!empty($form->company_logo)) { ?>
                                    <img onerror="this.onerror=null; this.src='https://www.thermaxglobal.com/wp-content/uploads/2020/05/image-not-found-300x169.jpg'" src='{{asset("assets/images/campaign_forms/". $form->company_logo)}}' style="width: 120px;object-fit: cover;height: 70px;" />
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                if (!empty($form->title)) {
                                    echo "<ul>";
                                    foreach (json_decode($form->title) as $formt) {
                                        if (!empty($formt)) {
                                            echo "<li>" . $formt . '</li>';
                                        }
                                    }
                                    echo "</ul>";
                                }
                                ?>
                            </td>
                            <td>
                                <spn>
                                    <?php
                                    if (!empty($form->form_desc)) {
                                        foreach (json_decode($form->form_desc) as $form_desc) {
                                            if (!empty($form_desc)) {
                                                echo $form_desc . '<br>';
                                            }
                                        }
                                    }

                                    ?>

                                </spn>

                            </td>
                            <td>{{ $form->punchline }}</td>
                            <td><a target="_about" href="{{$form->youtube_1}}">{{$form->youtube_1 }}</a></td>
                            <td><a target="_about" href="{{$form->youtube_2}}">{{$form->youtube_2 }}</a></td>
                            <td><a target="_about" href="{{$form->youtube_3}}">{{$form->youtube_3 }}</a></td>
                            <td style="min-width: 120px;">
                                <?php if (!empty($form->image_1)) { ?>
                                    <img onerror="this.onerror=null; this.src='https://www.thermaxglobal.com/wp-content/uploads/2020/05/image-not-found-300x169.jpg'" src='{{asset("assets/images/campaign_forms/". $form->image_1)}}' style="width: 120px;object-fit: cover;height: 70px;" />
                                <?php } ?>
                            </td>
                            <td style="min-width: 120px;">
                                <?php if (!empty($form->image_2)) { ?>
                                    <img onerror="this.onerror=null; this.src='https://www.thermaxglobal.com/wp-content/uploads/2020/05/image-not-found-300x169.jpg'" src='{{asset("assets/images/campaign_forms/". $form->image_2)}}' style="width: 120px;object-fit: cover;height: 70px;" />
                                <?php } ?>
                            </td>
                            <td style="min-width: 120px;">
                                <?php if (!empty($form->image_3)) { ?>
                                    <img onerror="this.onerror=null; this.src='https://www.thermaxglobal.com/wp-content/uploads/2020/05/image-not-found-300x169.jpg'" src='{{asset("assets/images/campaign_forms/". $form->image_3)}}' style="width: 120px;object-fit: cover;height: 70px;" />
                                <?php } ?>
                            </td>
                            <td>{{json_decode($form->field_1)->question_text?? '' }}</td>
                            <td>{{json_decode($form->field_2)->question_text?? '' }}</td>
                            <td>{{json_decode($form->field_3)->question_text?? '' }}</td>
                            <td>{{json_decode($form->field_4)->question_text?? '' }}</td>
                            <td>{{json_decode($form->field_5)->question_text?? '' }}</td>
                            <td>{{$form->status ==0?'Off' : "Active" }}</td>
                            <td>{{$form->created_at}}</td>
                            <td>
                                <a href="{{ route('admin.forms.complete.delete',['id'=>$form->id]) }}" onclick="return deleteconfirm(<?php echo get_total_campaign_by_formid($form->id) ?>,<?php echo get_form_leads_by_id($form->id) ?>)" class="trashIocn" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa-regular fa-circle-xmark"></i>

                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- SETUP Form Preview MODAL --}}
<div class="modal fade" id="form_preview_modal" tabindex="-1" aria-labelledby="FormPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="FormPreviewModalLabel">Form Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="form_preview_html"></div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    'use strict';

    function deleteconfirm(campaigncount, leadscount) {
        if (campaigncount > 0) {
            alert('Unable to delete form since it is used in existing Campaigns');
            return false;
        }
        if (leadscount > 0) {
            alert('Unable to Delete Form, since it has Leads');
            return false;
        }
        return true;
    }
    var form_preview_modal = $('#form_preview_modal');
    $('.btn_form_preview').on('click', function() {
        var id = $(this).data('id');
        var iframe_html = '<iframe id="leadpaidform_1" src="https://leadspaid.com/campaign_form/1/1/' + id + '" referrerpolicy="unsafe-url" sandbox="allow-top-navigation allow-scripts allow-forms  allow-same-origin allow-popups-to-escape-sandbox" width="100%" height="600" style="border: 1px solid black;"></iframe>';
        $('#form_preview_html').html(iframe_html);
        form_preview_modal.modal('show');
    });
    $(document).ready(function() {
        var MyDatatable = $('#form_list').DataTable({
            columnDefs: [{
                targets: 7,
                searchable: false,
                visible: true,
                orderable: false
            }, ],
            "sDom": 'Lfrtlip',
            "language": {
                "lengthMenu": "Show rows  _MENU_",
                search: "",
                searchPlaceholder: "Search"
            }
        });

        $("#company_search").on("change", function() {
            if ($("#company_search").val() === "") {
                window.location.href = window.location.origin + window.location.pathname;
                return;
            }
            window.location.href = window.location.origin + window.location.pathname + "?advertiser=" + $("#company_search").val();
            return;
        });
    });
</script>
@endpush
@push('style')
<style>
    .table th {
        padding: 12px 10px;
        max-width: 200px;
    }

    #form_list_filter>span {
        font-weight: bolder;
    }

    .table td {
        vertical-align: top;
        text-align: left !important;
        border: 1px solid #e5e5e5 !important;
        padding: 10px 10px !important;
    }

    table.dataTable thead tr {
        background-color: #1A273A;
    }

    table.dataTable tbody tr td {
        font-size: 16px;
        color: #1a273a;
        font-weight: normal;
    }

    label {
        color: #000 !important;
    }

    #form_list_wrapper .dataTables_filter input {
        border-radius: 0 !important;
    }

    #form_list_wrapper {
        overflow-x: scroll;
    }

    .dataTables_paginate .pagination .page-item.active .page-link {
        background-color: #1361b2;
        border-color: #1361b2;
        box-shadow: 0px 3px 5px rgb(0, 0, 0, 0.125);
    }

    #form_list_wrapper .dataTables_paginate .pagination .page-item .page-link {
        border-radius: 0 !important;
    }

    table.dataTable thead tr th {
        font-size: 17px;
        border-right: 1px solid #ffffff36;
    }

    #form_list_wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    #form_list_info {
        flex: auto;
        text-align: right;
    }

    #form_list_length {
        /*width: 30%;
    float: left;*/
        padding: 5px 0px 0px 5px;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin: 2px 0;
        white-space: nowrap;
        justify-content: flex-start !important;
        padding-left: 10px;
    }

    table.dataTable thead tr th.sorting:before,
    table.dataTable thead tr th.sorting_asc:before,
    table.dataTable thead tr th.sorting_desc:before,
    table.dataTable thead tr th.sorting_asc_disabled:before,
    table.dataTable thead tr th.sorting_desc_disabled:before,
    table.dataTable thead tr th.sorting:before,
    table.dataTable thead tr th.sorting_asc:before,
    table.dataTable thead tr th.sorting_desc:before,
    table.dataTable thead tr th.sorting_asc_disabled:before,
    table.dataTable thead tr th.sorting_desc_disabled:before {
        bottom: 50% !important;
        content: "▲" !important;
    }

    /* table.dataTable thead tr th.sorting:before, table.dataTable thead tr th.sorting:after, table.dataTable thead tr th.sorting_asc:before, table.dataTable thead tr th.sorting_asc:after, table.dataTable thead tr th.sorting_desc:before, table.dataTable thead tr th.sorting_desc:after, table.dataTable thead tr th.sorting_asc_disabled:before, table.dataTable thead tr th.sorting_asc_disabled:after, table.dataTable thead tr th.sorting_desc_disabled:before, table.dataTable thead tr th.sorting_desc_disabled:after, ttable.dataTable thead tr th.sorting:before, table.dataTable thead tr th.sorting:after, table.dataTable thead tr th.sorting_asc:before, table.dataTable thead tr th.sorting_asc:after, table.dataTable thead tr th.sorting_desc:before, table.dataTable thead tr th.sorting_desc:after, table.dataTable thead tr th.sorting_asc_disabled:before, table.dataTable thead tr th.sorting_asc_disabled:after, table.dataTable thead tr th.sorting_desc_disabled:before, table.dataTable thead tr th.sorting_desc_disabled:after {
    position: absolute !important;
    display: block !important;
    opacity: .125 !important;
    right: 10px !important;
    line-height: 9px !important;
    font-size: .8em !important;
} */
    table.dataTable thead tr th.sorting:after,
    table.dataTable thead tr th.sorting_asc:after,
    table.dataTable thead tr th.sorting_desc:after,
    table.dataTable thead tr th.sorting_asc_disabled:after,
    table.dataTable thead tr th.sorting_desc_disabled:after,
    table.dataTable thead tr th.sorting:after,
    table.dataTable thead tr th.sorting_asc:after,
    table.dataTable thead tr th.sorting_desc:after,
    table.dataTable thead tr th.sorting_asc_disabled:after,
    table.dataTable thead tr th.sorting_desc_disabled:after {
        top: 50% !important;
        content: "▼" !important;
    }

    #form_list ul li {
        list-style: disc;
        font-size: 16px;
    }

    #form_list ul {
        padding-left: 20px;
    }

    table.dataTable tbody td:nth-child(3) a,
    table.dataTable tbody td:nth-child(3) {
        font-size: 15px;
    }

    @media (min-width: 768px) {
        .form-list-wrapper-new {
            position: relative;
        }

        #form_list_wrapper #form_list_filter {
            position: absolute;
            right: 0;
            top: -45px;
            text-align: right;
        }
    }

    /* Max width */
    #form_list>tbody>tr>td:nth-child(7) spn {
        width: max-content;
        display: block;
        line-break: anywhere;
        overflow-wrap: anywhere;
        max-width: 178px;
        white-space: initial;
    }

    #form_list>tbody>tr>td:nth-child(10) spn {
        width: max-content;
        display: block;
        line-break: anywhere;
        overflow-wrap: anywhere;
        max-width: 278px;
        white-space: initial;
    }

    #form_list>tbody>tr>td:nth-child(12) a,
    #form_list>tbody>tr>td:nth-child(13) a,
    #form_list>tbody>tr>td:nth-child(14) a {
        width: max-content;
        display: block;
        line-break: anywhere;
        overflow-wrap: anywhere;
        max-width: 228px;
        white-space: break-spaces;
    }

    #form_list .trashIocn i {
        color: red;
        border-radius: 100%;
    }

    #form_list tbody tr td:last-child {
        text-align: center !important;
        vertical-align: middle;
    }
</style>
@endpush