@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class=" ">
                <div class=" ">
                    <div class="table-responsive--md  table-responsive">
                        <table id="campaign_list" class="table table-striped table-bordered datatable " style="width:100%">
                            <thead>
                                <tr>
                                    <th>Off/On</th>
                                    <th>Advertiser</th>
                                    <th>C.Id</th>
                                    <th>Campaign Name</th>
                                    <th>Approve</th>
                                    <th>Creation Date</th>
                                    <th>Target Country</th>
                                    <th>Daily Budget</th>
                                    <th>Target CPL</th>
                                    <th>Form Used</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Cost</th>
                                    <th>Leads</th>
                                    <th>Cost per <br>Leads</th>
                                    <th>Action</th>
                                    <th>Spend</th>
                                    <th>Targeting Placements</th>
                                    <th>Keywords </th>
                                    <th>Service </th>
                                    <th>Website URL</th>
                                    <th>Social Media</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($campaigns as $campaign)
                                    <tr>
                                        <td> @if($campaign->status)  <span class="badge badge-pill badge-success">ON</span>  @else <span class="badge badge-pill badge-danger">OFF</span>  @endif </td>
                                        <td>{{ $campaign->advertiser->name}} </td>
                                        <td>{{ $campaign->id }} </td>
                                        <td>{{ $campaign->name }} </td>
                                        <td> <input type="checkbox" name="approve" @if($campaign->approve) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-approve" data-id="{{$campaign->id}}"></td>
                                        <td>{{$campaign->created_at->format('Y-m-d H:i ')}}</td>
                                        <td>{{ $campaign->target_country }}</td>
                                        <td>${{  $campaign->daily_budget }}</td>
                                        <td>${{  $campaign->target_cost }}</td>
                                        <td>
                                            @if (isset($campaign->campaign_forms))  {{$campaign->campaign_forms->form_name}}  @endif
                                        </td>
                                        <td>{{ $campaign->start_date }}</td>
                                        <td>{{ $campaign->end_date }}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>
                                            <form id="upload_form_{{$campaign->id}}" data-type="leads"  class="uploadform" action="{{ route('admin.leads.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}"  method="POST"  enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.leads.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-primary up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-success up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_form_{{$campaign->id}}" type="file" name="file" required    />
                                                </div>

                                            </form>
                                        </td>
                                        <td class="spend_col">
                                            <form id="upload_spends_form_{{$campaign->id}}" data-type="spends"  class="uploadform" action="{{ route('admin.campaigns.lgenspend.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}"  method="POST"  enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.campaigns.lgenspend.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-light-red up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-danger up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_spends_form_{{$campaign->id}}" type="file" name="file" required    />
                                                </div>
                                            </form>
                                        </td>
                                        <td> @if($campaign->target_placements)
                                            @foreach($campaign->target_placements as $target_placements)
                                            {{$target_placements}} ,
                                            @endforeach
                                            @endif</td>
                                        <td>{{ $campaign->keywords }}</td>
                                        <td>{{ $campaign->service_sell_buy }}</td>
                                        <td>{{ $campaign->website_url }}</td>
                                        <td>{{ $campaign->social_media_page }}</td>
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
            <div class="card-footer py-4"> </div>
        </div>
    </div>
    {{-- SETUP Lead Preview MODAL --}}
    <div class="modal fade" id="leads_preview_modal" tabindex="-2" aria-labelledby="leads_preview_modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="leads_previewModalLabel">Leads Preview </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <div id="previewData">
                    </div>

                    <button class="btn btn-primary" id="saveLeadsData" data-save-form=''>Save</button>
                    <button class="btn btn-danger"  data-dismiss="modal" aria-label="Close" >Cancel</button>
                    <div id="error-message"> </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
<style>

table.dataTable thead tr {
    background-color: #1A273A;
}
table.dataTable thead tr th {
    border-right: 1px solid #ffffff36;
    font-size: 17px;
    padding: 12px 10px;
    max-width: 200px;
    vertical-align: inherit;
    line-height: .8;
}
.table td {
    text-align: left !important;
    border: 1px solid #e5e5e5 !important;
    padding: 10px 10px !important;
}
#campaign_list td {
    font-size: 16px;
    color: #1a273a;
    vertical-align: top;
}

.dataTables_paginate .pagination .page-item.active .page-link {
    background-color: #1361b2;
    border-color: #1361b2;
    box-shadow: 0px 3px 5px rgb(0 0 0 / 13%);
}


table.dataTable thead tr th.sorting:before, table.dataTable thead tr th.sorting_asc:before, table.dataTable thead tr th.sorting_desc:before, table.dataTable thead tr th.sorting_asc_disabled:before, table.dataTable thead tr th.sorting_desc_disabled:before, table.dataTable thead tr th.sorting:before, table.dataTable thead tr th.sorting_asc:before, table.dataTable thead tr th.sorting_desc:before, table.dataTable thead tr th.sorting_asc_disabled:before, table.dataTable thead tr th.sorting_desc_disabled:before {
    bottom: 50% !important;
    content: "▲" !important;
}
table.dataTable thead tr th.sorting:before, table.dataTable thead tr th.sorting:after, table.dataTable thead tr th.sorting_asc:before, table.dataTable thead tr th.sorting_asc:after, table.dataTable thead tr th.sorting_desc:before, table.dataTable thead tr th.sorting_desc:after, table.dataTable thead tr th.sorting_asc_disabled:before, table.dataTable thead tr th.sorting_asc_disabled:after, table.dataTable thead tr th.sorting_desc_disabled:before, table.dataTable thead tr th.sorting_desc_disabled:after, ttable.dataTable thead tr th.sorting:before, table.dataTable thead tr th.sorting:after, table.dataTable thead tr th.sorting_asc:before, table.dataTable thead tr th.sorting_asc:after, table.dataTable thead tr th.sorting_desc:before, table.dataTable thead tr th.sorting_desc:after, table.dataTable thead tr th.sorting_asc_disabled:before, table.dataTable thead tr th.sorting_asc_disabled:after, table.dataTable thead tr th.sorting_desc_disabled:before, table.dataTable thead tr th.sorting_desc_disabled:after {
    position: absolute !important;
    display: block !important;
    opacity: .125 !important;
    right: 10px !important;
    line-height: 9px !important;
    font-size: .8em !important;
}
table.dataTable thead tr th.sorting:before, table.dataTable thead tr th.sorting:after, table.dataTable thead tr th.sorting_asc:before, table.dataTable thead tr th.sorting_asc:after, table.dataTable thead tr th.sorting_desc:before, table.dataTable thead tr th.sorting_desc:after, table.dataTable thead tr th.sorting_asc_disabled:before, table.dataTable thead tr th.sorting_asc_disabled:after, table.dataTable thead tr th.sorting_desc_disabled:before, table.dataTable thead tr th.sorting_desc_disabled:after, table.dataTable thead tr th.sorting:before, table.dataTable thead tr th.sorting:after, table.dataTable thead tr th.sorting_asc:before, table.dataTable thead tr th.sorting_asc:after, table.dataTable thead tr th.sorting_desc:before, tatable.dataTable thead tr th.sorting_desc:after, table.dataTable thead tr th.sorting_asc_disabled:before, table.dataTable thead tr th.sorting_asc_disabled:after, table.dataTable thead tr th.sorting_desc_disabled:before, table.dataTable thead tr th.sorting_desc_disabled:after {
    position: absolute !important;
    display: block !important;
    opacity: .125 !important;
    right: 10px !important;
    line-height: 9px !important;
    font-size: .8em !important;
}
table.dataTable thead tr th.sorting:after, table.dataTable thead tr th.sorting_asc:after, table.dataTable thead tr th.sorting_desc:after, table.dataTable thead tr th.sorting_asc_disabled:after, table.dataTable thead tr th.sorting_desc_disabled:after, table.dataTable thead tr th.sorting:after, table.dataTable thead tr th.sorting_asc:after, table.dataTable thead tr th.sorting_desc:after, table.dataTable thead tr th.sorting_asc_disabled:after, table.dataTable thead tr th.sorting_desc_disabled:after {
    top: 50% !important;
    content: "▼" !important;
}

.pagination .page-item .page-link, .pagination .page-item span,

#campaign_list_wrapper .dataTables_paginate .pagination .page-item .page-link,
#campaign_list_wrapper .dataTables_length select,
#campaign_list_wrapper .dataTables_filter input {
    border-radius: 0!important;
}
.btn-success {
    background-color: #11b6f3 !important;
}
    .table th { padding: 12px 10px; max-width: 200px; }
    .table td { text-align: left!important; border: 1px solid #e5e5e5!important; padding: 10px 10px!important; }
    .toggle-group .btn {  padding-top: 0!important;  padding-bottom: 0!important;  top: -3px;  }
    .toggle.btn-sm {  min-width: 40px; min-height: 15px;  height: 15px; }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
    .toggle input[data-size="small"] ~ .toggle-group label {   text-indent: -999px;   }
    .toggle.btn .toggle-handle{ left: -9px;  top: -2px; }
    .toggle.btn.off .toggle-handle{ left: 9px; }
    .upload-btn-wrapper { position: relative; overflow: hidden; display: inline; }
    .btn { cursor: pointer; }
    .upload-btn-wrapper input[type=file] { font-size: 100px; position: absolute; width: 100%; height: 100%; left: 0; top: 0; opacity: 0; cursor: pointer; }
    .up-down-btn{ font-size: 28px; background: transparent; border: 0; padding: 0 }
    .text-light-red{ color: #ff7481!important}
</style>
@endpush
@push('script')
  <!-- data table css -->
  <link rel="stylesheet" href="{{asset('assets/userpanel/css/vendor/datatables.min.css')}}">
    <!-- data-table js -->
    <script src="{{asset('assets/userpanel/js/vendor/datatables.min.js')}}"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        'use strict';
        var leads_preview_modal = $('#leads_preview_modal');
        $(document).ready(function() {


            var MyDatatable = $('#campaign_list').DataTable({
                columnDefs: [{
                    targets: 0,
                    searchable: false,
                    orderable: false
                },
                {
                    targets: 11,
                    searchable: false,
                    visible: true,
                    orderable: false
                },
                {
                    targets: [4, 15, 16],
                    // className: "",
                    // width: "10px"
                    searchable: false,
                    orderable: false
                },
                {
                    targets: '_all',
                    visible: true
                }
                ],"sDom": 'Lfrtlip',"language": {  "lengthMenu": "Show rows  _MENU_" } });


                $(document).on("change",".toggle-approve",function(e){
                var approval = $(this).prop('checked') == true ? 1 : 0;
                var campaign_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                      url:  "{{route('admin.campaigns.approval')}}",
                     //url: "/admin/campaigns/approval",
                    data: { 'approval': approval, 'campaign_id': campaign_id },
                    success: function(data) {
                        if (data.success) {

                            Toast('green', data.message);
                        } else {
                            Toast('red', data.message);
                        }
                    }
                });
            });
            $(document).on("change","input[type=file]",function(e){
                var data_form = $(this).attr('data-form');
                var form_id = '#'+data_form;
                var form =$(form_id);
                var actionUrl = form.attr('action');
                var datatype = form.attr('data-type');
                actionUrl = actionUrl.replace('import', 'importpreview');
                var formData = new FormData(form[0]);
                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data)
                    {
                        if (data.success) {
                            $('#saveLeadsData').attr('data-form', data_form );
                            if(datatype =="leads"){
                            previewData(data.data);
                            }else{
                            previewSpendData(data.data);
                            }
                            leads_preview_modal.attr('data-form', data_form );
                            leads_preview_modal.modal('show');
                        }else{
                            form[0].reset();
                            Toast('red', 'Something worng please check sheet');
                            $.each(data.data, function(index, value) {
                                Toast('red', value);
                            });
                        }
                    }
                });

            });
            $('#saveLeadsData').on('click', function() {
                $(this).attr('disabled','disabled');
                var data_form = $(this).attr('data-form');
                var form_id = '#'+data_form;
                var form =$(form_id);
                var actionUrl = form.attr('action');
                var formData = new FormData(form[0]);
                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data)
                    {
                        if (data.success) {
                            if(datatype =="leads"){ alert('Leads Saved');}else{alert('Spends Saved');}
                            reset_upload_preview(form);
                        }else{
                            alert('Try Again');
                            $('#saveLeadsData').removeAttr('disabled');
                        }
                    }
                });

            });
        });

        function previewData(data){
          //  rows = $.parseJSON(data);
          var t = "<table class='table table-strip '>";
            t += '<tr>';
                    t += '<td> advertiser_id </td>';
                    // t += '<td> campaign_id </td>';
                    t += '<td> campaign_name </td>';
                    t += '<td> Price </td>';
                    t += '<td> field_1 </td>';
                    t += '<td> field_2 </td>';
                    t += '<td> field_3 </td>';
                    t += '<td> field_4 </td>';
                    t += '<td> field_5 </td>';
                t += '</tr>';
            $.each(data, function(index, vl) {
                t += '<tr>';
                    t += '<td>' + vl.advertiser_id + '</td>';
                    //t += '<td>' + vl.campaign_id + '</td>';
                    t += '<td>' + data[0].campaign_name + '</td>';
                    t += '<td>' + vl.price + '</td>';
                    t += '<td>' + vl.field_1 + '</td>';
                    t += '<td>' + vl.field_2 + '</td>';
                    t += '<td>' + vl.field_3 + '</td>';
                    t += '<td>' + vl.field_4 + '</td>';
                    t += '<td>' + vl.field_5 + '</td>';
                t += '</tr>';
            });
            t += "</table>"
            $('#previewData').html(t);
        }

        function previewSpendData(data){
          //  rows = $.parseJSON(data);
          var t = "<table class='table table-strip '>";
            t += '<tr>';
                    t += '<td> campaign_id </td>';
                    t += '<td> campaign_name </td>';
                    t += '<td> Cost </td>';
                    t += '<td> lgen_date </td>';
                    t += '<td> lgen_source </td>';
                    t += '<td> lgen_medium </td>';
                    t += '<td> lgen_campaign </td>';
                t += '</tr>';
            $.each(data, function(index, vl) {
                t += '<tr>';
                    t += '<td>' + vl.campaign_id + '</td>';
                    t += '<td>' + data[0].campaign_name + '</td>';
                    t += '<td>' + vl.cost + '</td>';
                    t += '<td>' + vl.lgen_date + '</td>';
                    t += '<td>' + vl.lgen_source + '</td>';
                    t += '<td>' + vl.lgen_medium + '</td>';
                    t += '<td>' + vl.lgen_campaign + '</td>';
                t += '</tr>';
            });
            t += "</table>"
            $('#previewData').html(t);
        }

        function reset_upload_preview(form){
            form[0].reset();
            leads_preview_modal.modal('hide').removeAttr('data-form');
            $('#saveLeadsData').removeAttr('disabled');
            $('#previewData').html('');
        }
        leads_preview_modal.on('hide.bs.modal', function () {
            var data_form = leads_preview_modal.attr('data-form');
            var form_id = '#'+data_form;
            var form =$(form_id);
            form[0].reset();
            leads_preview_modal.removeAttr('data-form');
        })
        function Toast( color = 'green', message ){
            iziToast.show({
            // icon: 'fa fa-solid fa-check',
            color: color, // blue, red, green, yellow
            message: message,
            position: 'topRight'
        });
    }
    </script>
@endpush
