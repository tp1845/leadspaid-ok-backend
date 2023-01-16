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
                                    <th>A.Id</th>
                                    <th>Assign to<br>Publisher Admin</th>
                                    <th>Assign to<br>Campaign Manager</th>
                                    <th>AdNetwork 1</th>
                                    <th>AdNetwork 2</th>
                                    <th>AdNetwork 3</th>
                                    <th>AdNetwork 4</th>
                                    <th>AdNetwork 5</th>
                                    <th>AdNetwork 6</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($advertisers as $advertiser)
                                    <tr>
                                        <td> @if($advertiser->status)  <span class="badge badge-pill badge-success">ON</span>  @else <span class="badge badge-pill badge-danger">OFF</span>  @endif </td>
                                        <td>{{ $advertiser->company_name}} </td>
                                        <td>{{ $advertiser->id}} </td>
                                        <td data-label="@lang('Assign publisher Admin')">
                                            <ul class="check_box_list">
                                                @forelse($publishers_admin as $publisher)
                                                    <li><label>
                                                        <input
                                                        @if($advertiser->assign_publisher != null && in_array($publisher->id, $advertiser->assign_publisher))
                                                            checked  readonly disabled @else name="assign_publisher_by_pub_{{$advertiser->id}}[]"  @endif
                                                            @if($advertiser->assign_publisher_by_pub != null && in_array(Auth::guard('publisher')->user()->id, $advertiser->assign_publisher_by_pub))  readonly disabled  @endif
                                                            @if($advertiser->assign_publisher_by_pub != null && in_array($publisher->id, $advertiser->assign_publisher_by_pub)) checked  @endif

                                                        type="checkbox"
                                                        class="assign_publisher"
                                                        value="{{ $publisher->id }}"
                                                        data-advertiser_id = "{{$advertiser->id}}"
                                                        data-update_type = "publisher_admin"
                                                        >
                                                        {{ $publisher->name }}</label></li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </td>

                                        <td data-label="@lang('Assign Campaign Mamager')">
                                            <ul class="check_box_list">
                                                @forelse($campaign_manager as $cm)
                                                    <li><label>
                                                        <input
                                                        @if($advertiser->assign_cm != null && in_array($cm->id, $advertiser->assign_cm))
                                                            checked  readonly disabled @else  name="assign_cm_by_pub_{{$advertiser->id}}[]"   @endif
                                                        @if($advertiser->assign_publisher_by_pub != null && in_array(Auth::guard('publisher')->user()->id, $advertiser->assign_publisher_by_pub))  readonly disabled  @endif
                                                        @if($advertiser->assign_cm_by_pub != null && in_array(Auth::guard('publisher')->user()->id, $advertiser->assign_cm_by_pub)) readonly disabled  @endif
                                                        @if($advertiser->assign_cm_by_pub != null && in_array($cm->id, $advertiser->assign_cm_by_pub)) checked  @endif
                                                        type="checkbox"
                                                        class="assign_publisher"
                                                        value="{{ $cm->id }}"
                                                        data-advertiser_id = "{{$advertiser->id}}" data-update_type = "campaign_mamager"
                                                        >
                                                        {{ $cm->name }}</label></li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </td>
                                            <form action="post" id="form_{{ $advertiser->id}}">
                                                <input type="hidden" name="advertiser_id" value="{{$advertiser->id}}" >
                                                <input type="hidden" name="publisher_id" value="{{Auth::guard('publisher')->user()->id}}" >
                                                {{-- Urls --}}
                                                <td data-label="url">
                                                        <input type="text" name="ad_network[ad_1][network]" data-aid='{{$advertiser->id}}' placeholder="Ad Network 1" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_1']['network'] }}" @endif >
                                                        <input type="text" name="ad_network[ad_1][url]" data-aid='{{$advertiser->id}}' placeholder="Ad Network URL 1" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_1']['url'] }}" @endif >
                                                        <input type="text" name="ad_network[ad_1][id]" data-aid='{{$advertiser->id}}' placeholder="ID 1" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_1']['id'] }}" @endif >
                                                        <input type="text" name="ad_network[ad_1][password]" data-aid='{{$advertiser->id}}' placeholder="Password 1" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_1']['password'] }}" @endif >
                                                        <input type="text" name="ad_network[ad_1][remarks]" data-aid='{{$advertiser->id}}' placeholder="Remearks 1" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_1']['remarks'] }}" @endif >
                                                </td>
                                                <td data-label="url">
                                                    <input type="text" name="ad_network[ad_2][network]" data-aid='{{$advertiser->id}}' placeholder="Ad Network 2" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_2']['network'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_2][url]" data-aid='{{$advertiser->id}}' placeholder="Ad Network URL 2" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_2']['url'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_2][id]" data-aid='{{$advertiser->id}}' placeholder="ID 2" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_2']['id'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_2][password]" data-aid='{{$advertiser->id}}' placeholder="Password 2" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_2']['password'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_2][remarks]" data-aid='{{$advertiser->id}}' placeholder="Remearks 2" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_2']['remarks'] }}" @endif >
                                                </td>
                                                <td data-label="url">
                                                    <input type="text" name="ad_network[ad_3][network]" data-aid='{{$advertiser->id}}' placeholder="Ad Network 3" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_3']['network'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_3][url]" data-aid='{{$advertiser->id}}' placeholder="Ad Network URL 3" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_3']['url'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_3][id]" data-aid='{{$advertiser->id}}' placeholder="ID 3" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_3']['id'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_3][password]" data-aid='{{$advertiser->id}}' placeholder="Password 3" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_3']['password'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_3][remarks]" data-aid='{{$advertiser->id}}' placeholder="Remearks 3" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_3']['remarks'] }}" @endif >
                                                </td>
                                                <td data-label="url">
                                                    <input type="text" name="ad_network[ad_4][network]" data-aid='{{$advertiser->id}}' placeholder="Ad Network 4" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_4']['network'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_4][url]" data-aid='{{$advertiser->id}}' placeholder="Ad Network URL 4" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_4']['url'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_4][id]" data-aid='{{$advertiser->id}}' placeholder="ID 4" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_4']['id'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_4][password]" data-aid='{{$advertiser->id}}' placeholder="Password 4" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_4']['password'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_4][remarks]" data-aid='{{$advertiser->id}}' placeholder="Remearks 4" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_4']['remarks'] }}" @endif >
                                                </td>
                                                <td data-label="url">
                                                    <input type="text" name="ad_network[ad_5][network]" data-aid='{{$advertiser->id}}' placeholder="Ad Network 5" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_5']['network'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_5][url]" data-aid='{{$advertiser->id}}' placeholder="Ad Network URL 5" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_5']['url'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_5][id]" data-aid='{{$advertiser->id}}' placeholder="ID 5" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_5']['id'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_5][password]" data-aid='{{$advertiser->id}}' placeholder="Password 5" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_5']['password'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_5][remarks]" data-aid='{{$advertiser->id}}' placeholder="Remearks 5" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_5']['remarks'] }}" @endif >
                                                </td>
                                                <td data-label="url">
                                                    <input type="text" name="ad_network[ad_6][network]" data-aid='{{$advertiser->id}}' placeholder="Ad Network 6" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_6']['network'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_6][url]" data-aid='{{$advertiser->id}}' placeholder="Ad Network URL 6" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_6']['url'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_6][id]" data-aid='{{$advertiser->id}}' placeholder="ID 6" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_6']['id'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_6][password]" data-aid='{{$advertiser->id}}' placeholder="Password 6" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_6']['password'] }}" @endif >
                                                    <input type="text" name="ad_network[ad_6][remarks]" data-aid='{{$advertiser->id}}' placeholder="Remearks 6" class="form-control mb-2 AdNetwork ad_network_aid_{{$advertiser->id}}" @if($advertiser->publisher_advertiser) value="{{ $advertiser->publisher_advertiser->ad_network['ad_6']['remarks'] }}" @endif >
                                                </td>
                                            </form>
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

     {{-- SETUP Form Preview MODAL --}}
     <div class="modal fade" id="form_preview_modal" tabindex="-1" aria-labelledby="FormPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="FormPreviewModalLabel">Form Preview</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="form_preview_html"  ></div>
            </div>
          </div>
        </div>
      </div>
@endsection
@push('style')
<style>
    ul.check_box_list { height: 100px; overflow: auto; width: 100%; border: 1px solid #000; }
    ul.check_box_list { list-style-type: none; margin: 0; padding: 0; overflow-x: hidden; }
    ul.check_box_list li { margin: 0; padding: 0; }
    ul.check_box_list label {  text-align: left;  padding: 3px 5px; display: inline-block; width: 100%; color: WindowText; background-color: Window; margin: 0; width: 100%; }
    ul.check_box_list label input { margin-right: 3px; }
    ul.check_box_list label:hover { background-color: Highlight; color: HighlightText; }
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
</style>
@endpush
@push('script')
    <script>
        'use strict';
        $(document).ready(function () {

            $('.assign_publisher').change(function() {
            var advertiser_id = $(this).data('advertiser_id');
            var update_type = $(this).data('update_type');
            name =  $(this).attr('name');
            var data = new Array();
            $("input[name='"+name+"']:checked").each(function(i) { data.push($(this).val()); });
            const formData = { "_token": "{{ csrf_token() }}", "data_ids":data, "advertiser_id":advertiser_id, "update_type":update_type};
            console.log(formData);
            $.ajax({
                type: "POST",
                dataType: "json",
                url:  "{{route('publisher.advertiser.assign_publisher_by_pub_save')}}" ,
                data: formData,
                success: function(data) {
                    if (data.success) {
                        Toast('green', data.message);
                    } else {
                        Toast('red', data.message);
                    }
                }
            });
        })

            $('input[type="checkbox"][readonly]').on("click.readonly", function(event){event.preventDefault();}).css("opacity", "0.5");
            var form_preview_modal = $('#form_preview_modal');
            $('.btn_form_preview').on('click', function() {
            var id =  $(this).data('id');
                var iframe_html = '<iframe id="leadpaidform_1" src="https://leadspaid.com/campaign_form/{{auth()->guard('publisher')->user()->id}}/1/'+id+'" referrerpolicy="unsafe-url" sandbox="allow-top-navigation allow-scripts allow-forms  allow-same-origin allow-popups-to-escape-sandbox" width="100%" height="600" style="border: 1px solid black;"></iframe>';
                $('#form_preview_html').html(iframe_html);
                form_preview_modal.modal('show');
            });

            var MyDatatable = $('#campaign_list').DataTable({
                columnDefs: [{
                    targets: 0,
                    searchable: false,
                    visible: true,
                    orderable: false
                },

                    // {
                    //     targets:  [13, 14, 15, 16,17],
                    //     searchable: false,
                    //     visible: true,
                    //     orderable: false
                    // },
                    // {
                    //     targets: [ 16, 17,18],
                    //     className: "td-iframe",
                    //     width: "100px",
                    //     searchable: false,
                    //     orderable: false
                    // },
                    // {
                    //     targets: [ 19, 20, 21, 22, 23, 24],
                    //     className: "td-url",
                    //     width: "200px",
                    //     searchable: false,
                    //     orderable: false
                    // },
                    // {
                    //     targets: '_all',
                    //     visible: true
                    // }
                ]
            });
            $("body").on("blur", "td input.AdNetwork", function() {
                var advertiser_id =  $(this).attr('data-aid');
                var form_id = '#form_'+advertiser_id;
                var form_array = $(form_id).serializeArray();
                form_array.push({ name: '_token',  value: "{{ csrf_token() }}" });
               // var url = [];
              //  var publisher_id =  {{Auth::guard('publisher')->user()->id}};
               // const formData = { "_token": "{{ csrf_token() }}", "advertiser_id":advertiser_id, "publisher_id":publisher_id, "ad_network":[] };
                //var get_input = 'input.ad_network_aid_'+advertiser_id;
                // jQuery(get_input).each(function(index, el) {
                //     if(el.value){
                //         i = index++;
                //         formData['ad_network']['type_'+i] = el.value;
                //     }
                // });
                var form_data = $.param(form_array); // set it up for submission
                console.log(form_data);
                var PostURL = "{{route('publisher.advertiser.ad_network_save')}}";
                $.ajax({
                    url: PostURL,
                    data: form_data,
                    dataType: 'json',
                    type: 'POST',
                    success: function ( data ) {
                        Toast('green', 'AdNetwork Successfully Saved!');
                    }
                });
            });
        });

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
