@extends($activeTemplate.'layouts.advertiser.frontend')
@php
    $user = auth()->guard('advertiser')->user();
@endphp
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class=" ">

                <div class="table-responsive--lg">
                    <table id="campaign_list" class="table table-striped table-bordered datatable " style="width:100%">
                        <thead>
                            <tr>
                                <th>Off/On</th>
                                <th>Campaign Name</th>
                                <th>Delivery</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Target Country / City</th>
                                <th>Form Used</th>
                                <th>Daily Budget</th>
                                <th>Cost</th>
                                <th>Leads</th>
                                <th>Cost per Leads</th>
                                <th>Download Leads</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($campaigns as $campaign)
                                <tr>
                                    <td><input type="checkbox" name="status" @if($campaign->status) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$campaign->id}}"></td>
                                    <td>{{ $campaign->name }} <br><a href="#"  href="{{route('advertiser.logout')}}"  class=" create-campaign-btn">Edit</a></td>
                                    <td>{{ $campaign->delivery ? "Active" : "Inactive" }}</td>
                                    <td>{{ $campaign->start_date }}</td>
                                    <td>{{ $campaign->end_date }}</td>
                                    <td>{{ $campaign->target_country }}, {{ $campaign->target_city }}</td>
                                    <td>CZ Form</td>
                                    <td>${{  $campaign->daily_budget }}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td><a href="#">Download</a></td>
                                </tr>
                            @empty

                            @endforelse

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th>0 </th>
                                <th>0</th>
                                <th>0</th>
                                <th> </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- SETUP campaign_create MODAL --}}
    <div id="campaign_create_modal" style="max-width: 100vw;" class="modal fade right modal-lg" tabindex="-1" role="dialog">
        <div class="float-right h-100 m-0 modal-dialog w-100" style="max-width: 25rem;" role="document">
            <div class="modal-content h-100">
                <div class="modal-header">
                    <h5 class="modal-title" id="campaign_createModalLabel">Create Campaign	</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body h-100" style="overflow-y: scroll">
                    <div id="error-message"> </div>
                    <form method="POST" action="{{ route('advertiser.campaigns.store') }}"  >
                        @csrf
                        <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser_id">
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">  Campaign Settings </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="CampaignNameInput">Campaign Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="CampaignNameInput"  name="name" placeholder="Campaign Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label" for="start_dateInput">Start Date</label>
                                            <div class="col-sm-8">
                                            <input type="text" name="start_date" data-range="false" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('Start date')" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class=" row ">
                                            <label class="col-sm-3 col-form-label text-sm-right" for="end_dateInput">End Date</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="end_date" data-range="false" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('End date')">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label" for="DailyBudgetInput">Daily Budget</label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" id="DailyBudgetInput"  name="daily_budget" placeholder="Daily Budget" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Targeting  --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">Targetting</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label" for="TargetCountryInput">Target Country</label>
                                            <div class="col-sm-8">

                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="target_country">
                                                    <option value="0" label="Select a country ... " selected="selected">Select a country ... </option>
                                                    @foreach ($countries as $country)
                                                        <option @if($user->country === $country->country_name) selected="selected" @endif   value=" {{ $country->country_name }} " label=" {{ $country->country_name }} "> {{ $country->country_name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class=" row ">
                                            <label class="col-sm-3 col-form-label text-sm-right" for="target_cityInput">Target City</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="target_cityInput"   class="form-control" placeholder="@lang('Target City')" name="target_city">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label" for="TargetingTypeInput">Targeting Type</label>
                                    <div class="col-sm-12">
                                        <select class="custom-select mr-sm-2" id="TargetingTypeInput" name="target_type"  >
                                            <option value="broad" selected >Broad</option>
                                            <option value="narrow" >Narrow</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="Hide-on-Broad" style="display: none">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label" for="TargetingTypeInputSelect2">Targeting Placements </label>
                                    <div class="col-sm-12">
                                        <select multiple class="form-control" id="TargetingTypeInputSelect2" name="target_placements">
                                            <option>google.com</option>
                                            <option>facebook.com</option>
                                          </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label" for="KeywordsInput">Keywords or tags of those products / services</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="KeywordsInput" name="keywords" placeholder="Keywords or tags of those products / services">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- Lead Form Used  --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">Lead Form Used</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="FormUsedInput">  <a  href="#" data-toggle="modal" data-target="#CreateFormModal"> + Create Form  </a></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="form_id" id="exampleRadios1" value="1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Form 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="form_id" id="exampleRadios2" value="2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Form 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="form_id" id="exampleRadios3" value="3"  >
                                        <label class="form-check-label" for="exampleRadios3">
                                            Form 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Other Fileds  --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary"> Optional </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="ServiceSellBuyInput">Product  / Service you Sell or Buy in this Campaign</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ServiceSellBuyInput" name="service_sell_buy" placeholder="Product  / Service you Sell or Buy in this Campaign">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="WebsiteInput">Website URL (Optional)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="WebsiteInput" name="website_url" placeholder="Website URL (Optional)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="SocialInput">Social Media Page URL (Optional)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="SocialInput" name="social_media_page" placeholder="Social Media Page URL (Optional)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="submit" class="btn btn--primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="CreateFormModal" tabindex="-2" aria-labelledby="CreateFormModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateFormModalLabel">Create Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="CompanyBrandNameInput">Company / Brand Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="CompanyBrandNameInput" placeholder="Company / Brand Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="CompanyLogoInput">Company Logo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="CompanyLogoInput">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="FormTitleInput">Form Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="FormTitleInput" placeholder="Form Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="OfferDescriptionInput">Offer Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="OfferDescriptionInput" placeholder="Offer Description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Youtube_URL_1_Input">Youtube video URL1 (Optional)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Youtube_URL_1_Input" placeholder="Youtube video URL1">
                                {{-- <small class="form-text text-muted">"Upload an image of  (minimum width = 300px / minimum height = 180px)"</small> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Youtube_URL_2_Input">Youtube video URL2 (Optional)</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="Youtube_URL_2_Input" placeholder="Youtube video URL2">
                            {{-- <small class="form-text text-muted">"Upload an image of  (minimum width = 300px / minimum height = 180px)"</small> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Youtube_URL_3_Input">Youtube video URL3 (Optional)</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="Youtube_URL_3_Input" placeholder="Youtube video URL3">
                            {{-- <small class="form-text text-muted">"Upload an image of  (minimum width = 300px / minimum height = 180px)"</small> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field1Input">Field1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field1Input" placeholder="Field 1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field2Input">Field2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field2Input" placeholder="Field 2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field3Input">Field3</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field3Input" placeholder="Field 3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field4Input">Field4</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field4Input" placeholder="Field 4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field5Input">Field5</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field5Input" placeholder="Field 5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="Field6Input">Field6</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Field6Input" placeholder="Field 6">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="LeadsInput">Leads</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="LeadsInput" placeholder="Leads">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="DownloadLeadsInput">Download Leads</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="DownloadLeadsInput" placeholder="Download Leads">
                            </div>
                        </div>
                        <button id="submit" class="btn btn--primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <button class="btn btn--primary create-campaign-btn"><i class="fas fa-plus"></i> Create Campaign	</button>
@endpush
@push('script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin/js/vendor/datepicker.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/datepicker.en.js')}}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    'use strict';

$('#TargetingTypeInputSelect2').select2({
    theme: "classic",
  placeholder: 'Placements',
  allowClear: true
});

$('.toggle-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var campaign_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url:  "/advertiser/campaigns/status" ,
            data: {'status': status, 'campaign_id': campaign_id},
            success: function(data){
               if(data.success){
                    iziToast.success({
                       // title: 'Hey',
                        message: 'Campaign successfully active',
                        position: 'topRight',
                    });
               }else{
                iziToast.error({
                    // title: 'Hey',
                    message: 'Campaign successfully inactive',
                    position: 'topRight',
                });
               }
            }
        });
    })

    $('.create-campaign-btn').on('click', function() {
        var modal = $('#campaign_create_modal');
        modal.modal('show');
    });


    //$(".Hide-on-Broad"){}
    $("#TargetingTypeInput").on('change', function(){
        if(this.value == "broad"){ $(".Hide-on-Broad").hide();  }else{  $(".Hide-on-Broad").show(); }
    })




    $(document).ready(function () {
        $('.datepicker-here').datepicker();
        var MyDatatable =  $('#campaign_list').DataTable({
     columnDefs: [
            { targets: 0, searchable: false,  visible: true, orderable: false},
            { targets: 2, searchable: false,   orderable: false},
            { targets: 11, searchable: false,  visible: true, orderable: false},
            { targets: [7, 8, 9, 10], className: "td-small", width:"10px"},
            { targets: '_all', visible: true }
        ]
    });
   // MyDatatable.columns.adjust().draw();

});


// Edit campaign

</script>
@endpush
@push('style')
<style>
    .table th { padding: 12px 10px; max-width: 200px; }
    .table td { text-align: left!important; border: 1px solid #e5e5e5!important; padding: 10px 10px!important; }
    .toggle-group .btn {  padding-top: 0!important;  padding-bottom: 0!important;  top: -3px;  }
    .toggle.btn-sm {  min-width: 40px; min-height: 15px;  height: 15px; }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
    .toggle input[data-size="small"] ~ .toggle-group label {   text-indent: -999px;   }
    .toggle.btn .toggle-handle{ left: -9px;  top: -2px; }
    .toggle.btn.off .toggle-handle{ left: 9px; }
    .modal.fade:not(.in).right .modal-dialog {  -webkit-transform: translate3d(0%, 0, 0);  transform: translate3d(0%, 0, 0);  max-width: 66rem!important;  }
    #CreateFormModal{   background-color: #00000080;  }
    label{ color: #333!important}


    .select2-container--classic .select2-selection--multiple{
        min-height: 40px!important;
        padding: 10px 20px 10px 20px;



        padding: 1px 10px 6px 10px!important;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    }
    .select2-container .select2-search--inline .select2-search__field { margin-top: 9px!important;}

    /* .select2-container--classic .select2-results__option--highlighted.select2-results__option--selectable[aria-selected="true"] {
    background-color: #3875d7;
    color: #fff;
} */
</style>
@endpush
