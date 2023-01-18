@extends($activeTemplate.'layouts.publisher.frontend')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div >
                <div >
                    <div class="table-responsive--lg">
                        <table id="campaign_list" class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Off/On</th>
                                    <th>Advertiser</th>
                                    <th>C.Id</th>
                                    <th>Campaign Name</th>
                                    <th>Delivery</th>
                                    <th>Creation date</th>
                                    <th>Target Country</th>
                                    <th>Daily Budget</th>
                                    <th>Target CPL</th>
                                    <th>Form Used</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Cost</th>
                                    <th>Leads</th>
                                    <th>CPL</th>
                                    <th>Action</th>
                                    <th>Spend</th>
                                    <th>iframe 1 ( 300 X 600 )</th>
                                    <th>iframe 2 ( 1140 X 530 )</th>
                                    <th>iframe 3 ( 1024 X 585 )</th>
                                    <th>iframe 4 ( 1024 X 505 )</th>
                                    <th>publisher_url 1</th>
                                    <th>publisher_url 2</th>
                                    <th>publisher_url 3</th>
                                    <th>publisher_url 4</th>
                                    <th>publisher_url 5</th>
                                    <th>publisher_url 6</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($campaigns as $campaign)
                                    <tr>
                                        <td> @if($campaign->status)  <span class="badge badge-pill badge-success">ON</span>  @else <span class="badge badge-pill badge-danger">OFF</span>  @endif </td>
                                        <td>{{ $campaign->advertiser->company_name}} </td>
                                        <td>{{ $campaign->id }} </td>
                                        <td>{{ $campaign->name }} </td>
                                        <td>{{ $campaign->delivery ? "Active" : "Inactive" }}</td>
                                        <td>{{$campaign->created_at->format('Y-m-d H:i ')}}</td>
                                        <td>{{ $campaign->target_country }}</td>
                                        <td>${{  $campaign->daily_budget }}</td>
                                        <td>${{  $campaign->target_cost }}</td>
                                        <td>  @if (isset($campaign->campaign_forms))  {{$campaign->campaign_forms->form_name}}  @endif  </td>
                                        <td>{{ $campaign->start_date }}</td>
                                        <td>{{ $campaign->end_date }}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>

                                        <td>
                                            <form id="upload_form_{{$campaign->id}}" data-type="leads"  class="uploadform" action="{{ route('publisher.leads.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}"  method="POST"  enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('publisher.leads.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-primary up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-success up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_form_{{$campaign->id}}" type="file" name="file" required    />
                                                </div>

                                           </form>
                                        </td>
                                        <td class="spend_col">
                                            <form id="upload_spends_form_{{$campaign->id}}" data-type="spends"  class="uploadform" action="{{ route('publisher.campaigns.lgenspend.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}"  method="POST"  enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('publisher.campaigns.lgenspend.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-light-red up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-danger up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_spends_form_{{$campaign->id}}" type="file" name="file" required    />
                                                </div>
                                            </form>
                                        </td>
                                        <td data-label="Script">
                                            <textarea onclick="this.focus();this.select()" id="advertScript1" class="form-control" rows="2" readonly=""><iframe src="{{url("/")}}/campaign_form/{{Auth::guard('publisher')->user()->id}}/1/{{$campaign->id}}" referrerpolicy="unsafe-url"  sandbox="allow-top-navigation allow-scripts allow-forms allow-same-origin allow-popups-to-escape-sandbox" width="100%" height="600" style="border: 1px solid black;"></iframe></textarea>
                                        </td>

                                        <td data-label="Script">
                                            <textarea onclick="this.focus();this.select()" id="advertScript2" class="form-control" rows="2" readonly=""><iframe src="{{url("/")}}/campaign_form/{{Auth::guard('publisher')->user()->id}}/2/{{$campaign->id}}" referrerpolicy="unsafe-url"  sandbox="allow-top-navigation allow-scripts allow-forms allow-same-origin allow-popups-to-escape-sandbox" width="100%" height="526" style="border: 1px solid black;"></iframe></textarea>
                                        </td>

                                        <td data-label="Script">
                                            <textarea onclick="this.focus();this.select()" id="advertScript3" class="form-control" rows="2" readonly=""><iframe src="{{url("/")}}/campaign_form/{{Auth::guard('publisher')->user()->id}}/3/{{$campaign->id}}" referrerpolicy="unsafe-url"  sandbox="allow-top-navigation allow-scripts allow-forms allow-same-origin allow-popups-to-escape-sandbox" width="100%" height="573" style="border: 1px solid black;"></iframe></textarea>
                                        </td>

                                        <td data-label="Script">
                                            <textarea onclick="this.focus();this.select()" id="advertScript4" class="form-control" rows="2" readonly=""><iframe src="{{url("/")}}/campaign_form/{{Auth::guard('publisher')->user()->id}}/4/{{$campaign->id}}" referrerpolicy="unsafe-url"  sandbox="allow-top-navigation allow-scripts allow-forms allow-same-origin allow-popups-to-escape-sandbox" width="100%" height="573" style="border: 1px solid black;"></iframe></textarea>
                                        </td>

                                        {{-- Urls --}}
                                        <td data-label="url">
                                            <textarea rows="2" placeholder="publisher_url 1" name="url[url_1]" data-cid='{{$campaign->id}}'   class="form-control publisher_url url_cid_{{$campaign->id}}" >{{ $campaign->campaign_publisher->url[0] ?? '' }}</textarea>

                                            {{-- <input type="text" name="url[url_1]" value="{{ $campaign->campaign_publisher->url[0] ?? '' }}" data-cid='{{$campaign->id}}' placeholder="publisher_url 1" class="form-control publisher_url url_cid_{{$campaign->id}}"  > --}}
                                        </td>
                                        <td data-label="url">
                                            <textarea rows="2" placeholder="publisher_url 2" name="url[url_2]" data-cid='{{$campaign->id}}'   class="form-control publisher_url url_cid_{{$campaign->id}}" >{{ $campaign->campaign_publisher->url[1] ?? '' }}</textarea>
                                            {{-- <input type="text" name="url[url_2]" value="{{ $campaign->campaign_publisher->url[1] ?? '' }}" data-cid='{{$campaign->id}}' placeholder="publisher_url 2"  class="form-control publisher_url url_cid_{{$campaign->id}}"  > --}}
                                        </td>
                                        <td data-label="url">
                                            <textarea rows="2" placeholder="publisher_url 3" name="url[url_3]" data-cid='{{$campaign->id}}'   class="form-control publisher_url url_cid_{{$campaign->id}}" >{{ $campaign->campaign_publisher->url[2] ?? '' }}</textarea>
                                            {{-- <input type="text" name="url[url_3]" value="{{ $campaign->campaign_publisher->url[2] ?? '' }}" data-cid='{{$campaign->id}}' placeholder="publisher_url 3"  class="form-control publisher_url url_cid_{{$campaign->id}}"  > --}}
                                        </td>
                                        <td data-label="url">
                                            <textarea rows="2" placeholder="publisher_url 4" name="url[url_4]" data-cid='{{$campaign->id}}'   class="form-control publisher_url url_cid_{{$campaign->id}}" >{{ $campaign->campaign_publisher->url[3] ?? '' }}</textarea>
                                        </td>
                                        <td data-label="url">
                                            <textarea rows="2" placeholder="publisher_url 5" name="url[url_5]" data-cid='{{$campaign->id}}'   class="form-control publisher_url url_cid_{{$campaign->id}}" >{{ $campaign->campaign_publisher->url[4] ?? '' }}</textarea>
                                        </td>
                                        <td data-label="url">
                                            <textarea rows="2" placeholder="publisher_url 6" name="url[url_6]" data-cid='{{$campaign->id}}'   class="form-control publisher_url url_cid_{{$campaign->id}}" >{{ $campaign->campaign_publisher->url[5] ?? '' }}</textarea>
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
    .btn--primary {  background-color: #1A273A !important; }
    .btn--primary:hover {  background-color: #1361b2 !important; }
    .small, small { font-size: 90%; }
    table.dataTable thead tr { background-color: #1A273A; }
    .dataTables_paginate .pagination .page-item.active .page-link{
    background-color: #1361b2;
    border-color: #1361b2;
    box-shadow: 0px 3px 5px rgb(0,0,0,0.125);
    }

    .btn--primary.create-campaign-btn{ background-color: #1361b2!important; border-radius: 0; }
    #campaign_list td{ font-size: 15px; }
    #campaign_list td:nth-child(3){  font-size: 14px; }
    #campaign_list a.create-campaign-btn { font-size: 13px; }

    #campaign_list_wrapper .dataTables_paginate .pagination .page-item .page-link,
    #campaign_list_wrapper .dataTables_length select,
    #campaign_list_wrapper .dataTables_filter input {  border-radius: 0!important; }

    .page-wrapper.default-version, table td, tfoot tr { font-weight: normal;  font-family: Poppins; }
    #campaign_list_wrapper{  overflow-x: scroll; }

    .td-iframe{ min-width: 200px!important;}
    .table th { padding: 12px 10px; max-width: 200px; }
    .td-url{ min-width: 200px; max-width: 200px; }
    th.td-url{ text-align: center!important; }
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
    textarea{ min-height: auto!important; }
    div.dataTables_wrapper .dataTables_length label, div.dataTables_wrapper div.dataTables_filter label, div.dataTables_wrapper .dataTables_info, .table td{ color: #000; }
    .form-control { color: #442ce7; }
    td textarea.form-control, td input.form-control { font-size: 16px!important; }
</style>
@endpush
@push('script')
    <script>
        'use strict';

        $(document).ready(function () {
            var MyDatatable = $('#campaign_list').DataTable({
                columnDefs: [{
                    targets: 0,
                    searchable: false,
                    visible: true,
                    orderable: false
                },

                    {
                        targets:  [13, 14, 15, 16,17],
                        searchable: false,
                        visible: true,
                        orderable: false
                    },
                    {
                        targets: [ 16, 17,18],
                        className: "td-iframe",
                        width: "100px",
                        searchable: false,
                        orderable: false
                    },
                    {
                        targets: [ 19, 20, 21, 22, 23, 24],
                        className: "td-url",
                        width: "200px",
                        searchable: false,
                        orderable: false
                    },
                    {
                        targets: '_all',
                        visible: true
                    }
                ]
            });
            $("body").on("blur", "td textarea.publisher_url", function() {
                var url = [];
                var campaign_id =  $(this).attr('data-cid');
                var publisher_id =  {{Auth::guard('publisher')->user()->id}};
                const formData = { "_token": "{{ csrf_token() }}", "campaign_id":campaign_id, "publisher_id":publisher_id, "url":[] };
                var get_input = 'textarea.url_cid_'+campaign_id;
                jQuery(get_input).each(function(index, el) {
                    if(el.value){
                      formData['url'][index++] = el.value;
                    }
                });
                var PostURL = "{{route('publisher.campaigns.url_save')}}";
                $.ajax({
                    url: PostURL,
                    data: formData,
                    dataType: 'json',
                    type: 'POST',
                    success: function ( data ) {
                        Toast('green', 'URL Successfully Saved!');
                    }
                });
            });
        });

        var leads_preview_modal = $('#leads_preview_modal');
        $(document).ready(function() {
            $('.toggle-approve').change(function() {
                var approval = $(this).prop('checked') == true ? 1 : 0;
                var campaign_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:  "{{route('admin.campaigns.approval')}}",
                    data: { 'approval': approval, 'campaign_id': campaign_id },
                    success: function(data) {
                        if (data.success) {
                            Toast('green', data.message);
                        } else {
                            Toast('red', data.message);
                        }
                    }
                });
            })
            $('input[type=file]').change(function () {
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
