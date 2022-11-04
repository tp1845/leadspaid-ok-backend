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
                                    @for ($i = 0; $i <= 30; $i++)
                                    <tr>
                                        <td><input type="checkbox" checked data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios"></td>
                                        <td>{{ $i }}_TT_All_Cz_Desktop_Applying_All(Calculate) <br><a href="#" class=" create-campaign-btn">Edit</a></td>
                                        <td>Active</td>
                                        <td>2022-10-12</td>
                                        <td>2023-10-12</td>
                                        <td>Singapore, Singapore</td>
                                        <td>CZ Form</td>
                                        <td>${{ $i }}00</td>
                                        <td>2{{ $i }}0</td>
                                        <td>10</td>
                                        <td>10</td>
                                        <td><a href="#">Download</a></td>
                                    </tr>
                                     @endfor
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
                                        <th>1170 </th>
                                        <th>1170</th>
                                        <th>18</th>
                                        <th> </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="my-3">

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
                      <button type="submit"  class="btn btn--danger del">@lang('Delete')</button>
                    </div>

                    </form>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body h-100" style="overflow-y: scroll">
                <div id="error-message"> </div>

                <form>
                    <div class="form-group">
                        {{-- <label for="CampaignNameInput">Campaign Name</label> --}}
                        <input type="text" class="form-control" id="CampaignNameInput" placeholder="Campaign Name">
                    </div>
                    <div class="form-group">
                        {{-- <label for="DeliveryInput">Delivery</label> --}}
                        <input type="text" class="form-control" id="DeliveryInput" placeholder="Delivery">
                    </div>

                    <div class="input-group   mb-3">
                        <input type="text" name="start_date" data-range="false" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('Start date')">
                    </div>

                    <div class="input-group mb-3 ">
                        <input type="text" name="end_date" data-range="false" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('End date')">
                    </div>

                    <div class="form-group">
                      <label for="FormUsedInput">Form Used  -  <a  href="#" data-toggle="modal" data-target="#CreateFormModal"> Create Form  </a></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Form 1
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Form 2
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3"  >
                            <label class="form-check-label" for="exampleRadios3">
                                Form 3
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                        {{-- <label for="DailyBudgetInput">Daily Budget</label> --}}
                        <input type="text" class="form-control" id="DailyBudgetInput" placeholder="Daily Budget">
                    </div>
                    <div class="form-group">
                        {{-- <label for="ServiceSellBuyInput">Product  / Service you Sell or Buy in this Campaign</label> --}}
                        <input type="text" class="form-control" id="ServiceSellBuyInput" placeholder="Product  / Service you Sell or Buy in this Campaign">
                    </div>
                    <div class="form-group">
                        {{-- <label for="KeywordsInput">Keywords or tags of those products / services</label> --}}
                        <input type="text" class="form-control" id="KeywordsInput" placeholder="Keywords or tags of those products / services">
                    </div>
                    <div class="form-group">
                        {{-- <label for="WebsiteInput">Website URL (Optional)</label> --}}
                        <input type="text" class="form-control" id="WebsiteInput" placeholder="Website URL (Optional)">
                    </div>
                    <div class="form-group">
                        {{-- <label for="SocialInput">Social Media Page URL (Optional)</label> --}}
                        <input type="text" class="form-control" id="SocialInput" placeholder="Social Media Page URL (Optional)">
                    </div>
                    <div class="form-group">
                        {{-- <label for="FormUsedInput">Form Used</label> --}}
                        <input type="text" class="form-control" id="FormUsedInput" placeholder="Form Used">
                    </div>
                    <div class="form-group">
                        {{-- <label for="CostInput">Cost</label> --}}
                        <input type="text" class="form-control" id="CostInput" placeholder="Cost">
                    </div>
                    <div class="form-group">
                        {{-- <label for="LeadsInput">Leads</label> --}}
                        <input type="text" class="form-control" id="LeadsInput" placeholder="Leads">
                    </div>
                    <div class="form-group">
                        {{-- <label for="DownloadLeadsInput">Download Leads</label> --}}
                        <input type="text" class="form-control" id="DownloadLeadsInput" placeholder="Download Leads">
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
                <div class="form-group">
                    {{-- <label for="FormNameInput">Form Name</label> --}}
                    <input type="text" class="form-control" id="FormNameInput" placeholder="Form Name">
                </div>
                <div class="form-group">
                    {{-- <label for="Field1Input">Field1</label> --}}
                    <input type="text" class="form-control" id="Field1Input" placeholder="Field 1">
                </div>
                <div class="form-group">
                    {{-- <label for="Field2Input">Field2</label> --}}
                    <input type="text" class="form-control" id="Field2Input" placeholder="Field 2">
                </div>
                <div class="form-group">
                    {{-- <label for="Field3Input">Field3</label> --}}
                    <input type="text" class="form-control" id="Field3Input" placeholder="Field 3">
                </div>
                <div class="form-group">
                    {{-- <label for="Field4Input">Field4</label> --}}
                    <input type="text" class="form-control" id="Field4Input" placeholder="Field 4">
                </div>
                <div class="form-group">
                    {{-- <label for="Field5Input">Field5</label> --}}
                    <input type="text" class="form-control" id="Field5Input" placeholder="Field 5">
                </div>
                <div class="form-group">
                    {{-- <label for="Field6Input">Field6</label> --}}
                    <input type="text" class="form-control" id="Field6Input" placeholder="Field 6">
                </div>
                <div class="form-group">
                    {{-- <label for="LeadsInput">Leads</label> --}}
                    <input type="text" class="form-control" id="LeadsInput" placeholder="Leads">
                </div>
                <div class="form-group">
                    {{-- <label for="DownloadLeadsInput">Download Leads</label> --}}
                    <input type="text" class="form-control" id="DownloadLeadsInput" placeholder="Download Leads">
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
<script>
    'use strict';
//     iziToast.success({
//     title: 'Hey',
//     message: 'What would you like to add?'
// });
    $('.create-campaign-btn').on('click', function() {
        var modal = $('#campaign_create_modal');
        modal.modal('show');
    });

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
</script>

@endpush

@push('style')
<style>
    .toggle-group .btn {
        padding-top: 0!important;
        padding-bottom: 0!important;
        top: -3px;
    }
    .toggle.btn-sm {
    min-width: 40px;
    min-height: 15px;
    height: 15px;
    }
    .table th {   padding: 12px 10px; max-width: 200px; }
    .table td {  text-align: left!important; border: 1px solid #e5e5e5!important;      padding: 10px 10px!important; }
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
    .toggle input[data-size="small"] ~ .toggle-group label {   text-indent: -999px;   }

    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
        max-width: 66rem!important;
    }
    #CreateFormModal{
        background-color: #00000080;
    }
</style>
@endpush
