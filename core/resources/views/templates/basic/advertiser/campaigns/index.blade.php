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
                                <td>{{ $campaign->name }} <br><a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" class="editcampaign create-campaign-btn">Edit</a></td>
                                <td>{{ $campaign->delivery ? "Active" : "Inactive" }}</td>
                                <td>{{ $campaign->start_date }}</td>
                                <td>{{ $campaign->end_date }}</td>
                                <td>{{ $campaign->target_country }}, {{ $campaign->target_city }}</td>
                                <td> @if (isset($campaign->campaign_forms))
                                        {{$campaign->campaign_forms->form_name}}
                                    @endif</td>
                                <td>${{ $campaign->daily_budget }}</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><a href="{{ route('advertiser.campaignsformleads.export',$campaign->id) }}">Xlsx</a> |
                                <a href="{{ route('advertiser.campaignsformleads.exportcsv',$campaign->id) }}">Csv</a> |
                                    <a href="#">Google Sheet</a>
                                </td>
                            </tr>
                        @empty

                        @endforelse

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                            <th></th>
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
                    <h5 class="modal-title" id="campaign_createModalLabel">Create Campaign </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body h-100" style="overflow-y: scroll">
                    <div id="error-message"></div>
                    <form method="POST" action="{{ route('advertiser.campaigns.store') }}">
                        @csrf
                        <input type="hidden" value="0" name="campaign_id" id="input_campaign_id">
                        <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser_id">
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary"> Campaign Settings</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="CampaignNameInput">Campaign Name<i>*</i></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="CampaignNameInput" name="name" placeholder="Campaign Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label" for="start_dateInput">Start Date<i>*</i></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="start_date" data-range="false" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('Start date')" required>
                                    </div>
                                </div>


                                <div class="form-group row">

                                    <div class="col">
                                        <div class=" row ">
                                            <label class="col-sm-4 col-form-label " for="SelectEndDateSelect">End Date </label>
                                            <div class="col-sm-8">
                                                <select class="custom-select mr-sm-2" name="end_date_select" id="SelectEndDateSelect">
                                                    <option value="NoEndDate" selected>No end Date</option>
                                                    <option value="SetEndDate">Set end Date</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class=" row ">
                                            <div class="col-sm-6">
                                                <input style="display: none" id="EndDate_input" type="text" name="end_date" data-range="false" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('End date')">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="DailyBudgetInput">Daily Budget<i>*</i></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="DailyBudgetInput" name="daily_budget" placeholder="Daily Budget" required>
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
                                            <label class="col-sm-4 col-form-label" for="TargetCountryInput">Target Country<i>*</i></label>
                                            <div class="col-sm-8">

                                                <select class="custom-select mr-sm-2" id="TargetCountryInput" name="target_country" required>
                                                    <option value="0" label="Select a country ... " selected="selected">Select a country ...</option>
                                                    @foreach ($countries as $country)
                                                        <option @if($user->country === $country->country_name) selected="selected" @endif   value="{{ $country->country_name }}" label=" {{ $country->country_name }} "> {{ $country->country_name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class=" row ">
                                            <label class="col-sm-3 col-form-label text-sm-right" for="target_cityInput">Target City</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="target_cityInput" class="form-control" placeholder="@lang('Target City')" name="target_city">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="TargetingTypeInput">Targeting Type<i>*</i></label>
                                    <div class="col-sm-4">
                                        <select class="custom-select mr-sm-2" id="TargetingTypeInput" name="target_type" required>
                                            <option value="broad" selected>Broad</option>
                                            <option value="narrow">Narrow</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="Hide-on-Broad" style="display: none">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label" for="TargetingTypeInputSelect2">Targeting Placements </label>
                                        <div class="col-sm-6">
                                            <select multiple class="form-control" id="target_placements_Input" name="target_placements[]">
                                                <option value="google.com">google.com</option>
                                                <option value="facebook.com">facebook.com</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label" for="KeywordsInput">Keywords or tags of those products / services</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control tags_input w-100" id="KeywordsInput" name="keywords" placeholder=" ">
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
                                    <label for="FormUsedInput"> <a href="#" data-toggle="modal" data-target="#CreateFormModal"> + Create Form </a></label>
                                    <div id="formOptions">
                                        @foreach ($forms as $form)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="form_id" id="form_{{ $form->id }}" value="{{ $form->id }}" required>
                                                <label class="form-check-label" for="form_{{ $form->id }}">
                                                    {{ $form->form_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Other Fileds  --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary"> Optional</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="ServiceSellBuyInput">Product / Service you Sell or Buy in this Campaign</label>
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
                    <form id="CreateForm" method="POST" action="{{ route('advertiser.forms.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser_id">
                        {{-- Form Settings --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">Form Settings</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="FormNameInput">Form Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="FormNameInput" name="form_name" placeholder="Form Name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="CompanyBrandNameInput">Company / Brand Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="CompanyBrandNameInput" name="company_name" placeholder="Company / Brand Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="CompanyLogoInput">Company Logo</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file pl-0" name="company_logo" id="CompanyLogoInput">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="FormTitleInput">Form Title</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="FormTitleInput" name="form_title" placeholder="Form Title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="OfferDescriptionInput">Offer Description</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="OfferDescriptionInput" name="offer_desc" placeholder="Offer Description">
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- creative --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">Creative</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="Youtube_URL_1_Input">Youtube video URL1 (Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="Youtube_URL_1_Input" name="youtube_1" placeholder="Youtube video URL1">
                                        {{-- <small class="form-text text-muted">"Upload an image of  (minimum width = 300px / minimum height = 180px)"</small> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="Youtube_URL_2_Input">Youtube video URL2 (Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="Youtube_URL_2_Input" name="youtube_2" placeholder="Youtube video URL2">
                                        {{-- <small class="form-text text-muted">"Upload an image of  (minimum width = 300px / minimum height = 180px)"</small> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="Youtube_URL_3_Input">Youtube video URL3 (Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="Youtube_URL_3_Input" name="youtube_3" placeholder="Youtube video URL3">
                                        {{-- <small class="form-text text-muted">"Upload an image of  (minimum width = 300px / minimum height = 180px)"</small> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="image_1_Input">Upload an image 1 (Optional)</label>
                                    <div class="col-sm-6">

                                        <input type="file" class="form-control-file pl-0" id="image_1_Input" name="image_1" placeholder="Upload an image 1">
                                        <small class="form-text text-muted">Upload an image of (minimum width = 300px / minimum height = 180px)</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="image_2_Input">Upload an image 2 (Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file pl-0" id="image_2_Input" name="image_2" placeholder="Upload an image 2">
                                        <small class="form-text text-muted">Upload an image of (minimum width = 300px / minimum height = 180px)</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="image_3_Input">Upload an image 3 (Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file pl-0" id="image_3_Input" name="image_3" placeholder="Upload an image 3">
                                        <small class="form-text text-muted">Upload an image of (minimum width = 300px / minimum height = 180px)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- lead fields settings  --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">Lead Fields Settings</div>
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th scope="col" width="10px">#</th>
                                        <th scope="col">Field Type</th>
                                        <th scope="col">Question</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody id="sortable">

                                    @for ($i = 1; $i < 6; $i++)
                                        <tr class="sortable-group">
                                            <td class="handle"><i class="fa fa-solid fa-grip-vertical"></i>
                                                <input type="hidden" class="sort" name='field_{{ $i }}[sort]' value="{{ $i }}"></td>
                                            <th scope="row">
                                                <select class="custom-select mr-sm-2 InputQuestionType" id="InputQuestionType_{{ $i }}" data-id="{{ $i }}" name='field_{{ $i }}[question_type]'>
                                                    <option value="ShortAnswer" selected="">Short Answer</option>
                                                    <option value="MultipleChoice">Multiple Choice</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name='field_{{ $i }}[question_text]'></td>
                                            <td><input type="text" class="form-control QuestionOption_{{ $i }} InputQuestion_Option_1" placeholder="Option 1" style="display: none" name='field_{{ $i }}[option_1]'></td>
                                            <td><input type="text" class="form-control QuestionOption_{{ $i }} InputQuestion_Option_2" placeholder="Option 2" style="display: none" name='field_{{ $i }}[option_2]'></td>
                                            <td><input type="text" class="form-control QuestionOption_{{ $i }} InputQuestion_Option_3" placeholder="Option 3" style="display: none" name='field_{{ $i }}[option_3]'></td>
                                            <td><input type="text" class="form-control QuestionOption_{{ $i }} InputQuestion_Option_4" placeholder="Option 4" style="display: none" name='field_{{ $i }}[option_4]'></td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
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
    <button class="btn btn--primary create-campaign-btn"><i class="fas fa-plus"></i> Create Campaign</button>
@endpush
@push('script')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('assets/admin/js/vendor/datepicker.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendor/datepicker.en.js')}}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="{{asset('assets/admin/js/vendor/tagsinput/bootstrap-tagsinput.css')}}">
    <script src="{{asset('assets/admin/js/vendor/tagsinput/bootstrap-tagsinput.min.js')}}"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        'use strict';
        var keywords_Input = $('.tags_input');
        keywords_Input.tagsinput({
            tagClass: 'badge badge-primary'
        });
        $('#TargetingTypeInputSelect2').select2({
            theme: "classic",
            placeholder: 'Placements',
            allowClear: true
        });
        $('.toggle-status').change(function () {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var campaign_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                // url:  "{{route('advertiser.campaigns.status')}}" ,
                url: "/advertiser/campaigns/status",
                data: {
                    'status': status,
                    'campaign_id': campaign_id
                },
                success: function (data) {
                    if (data.success) {
                        Toast('green', 'Campaign successfully active');
                    } else {
                        Toast('red', 'Campaign successfully inactive');
                    }
                }
            });
        })
        var campaign_create_modal = $('#campaign_create_modal');
        campaign_create_modal.on('hidden.bs.modal', function (event) {
            reset_campaign_create_form();
        })
        $('.create-campaign-btn').on('click', function () {
            campaign_create_modal.modal('show');
        });
        $('body').on('click', '.editcampaign', function (e) {
            e.preventDefault();
            reset_campaign_create_form();
            $('#campaign_createModalLabel').html('Edit Campaign');
            campaign_create_modal.modal('show');
            var campaign_id = $(this).attr('data-id');
            // var url = '{{ route("advertiser.campaigns.edit", ":campaign_id") }}';
            // url = url.replace(':campaign_id', campaign_id);
            // url =  "/advertiser/campaigns/edit/"+ campaign_id;
            var url = $(this).attr('href');
            $.get(url, function (data) {
                console.log(data);
                $('#input_campaign_id').val(campaign_id);
                $("input[name='name']").val(data.name);
                $("input[name='start_date']").val(data.start_date);
                $("input[name='end_date']").val(data.end_date);
                if (data.end_date !== null) {
                    $('#SelectEndDateSelect').val("SetEndDate").change();
                } else {
                    $('#SelectEndDateSelect').val("NoEndDate").change();
                }
                $("input[name='daily_budget']").val(data.daily_budget);
                $("#TargetCountryInput").val(data.target_country).change();
                $("input[name='target_city']").val(data.target_city);
                $("#TargetingTypeInput").val(data.target_type).change();
                keywords_Input.tagsinput('add', data.keywords);
                $("input[name='service_sell_buy']").val(data.service_sell_buy);
                $("input[name='website_url']").val(data.website_url);
                $("input[name='social_media_page']").val(data.social_media_page);
                $("input[name=form_id][value=" + data.form_id + "]").prop('checked', true);
                /// target_placements_Input
                $.each(data.target_placements, function (idx, val) {
                    $("select#target_placements_Input option[value='" + val + "']").prop("selected", true);
                });
            })
        });

        function reset_campaign_create_form() {
            $('#campaign_createModalLabel').html('Create Campaign');
            $('#SelectEndDateSelect').val("NoEndDate").change();
            $('#TargetingTypeInput').val("broad").change();
            $('#campaign_create_modal form').trigger("reset");
            $('#input_campaign_id').val(0);
            keywords_Input.tagsinput('removeAll');
        }

        //$(".Hide-on-Broad"){}
        $("#TargetingTypeInput").on('change', function () {
            if (this.value == "broad") {
                $(".Hide-on-Broad").hide();
            } else {
                $(".Hide-on-Broad").show();
            }
        })
        $("#SelectEndDateSelect").on('change', function () {
            if (this.value == "NoEndDate") {
                $("#EndDate_input").hide().prop("required", false);
            } else {
                $("#EndDate_input").show().prop("required", true);
                // setTimeout(function(){   $("#EndDate_input").focus() }, 100);
            }
        })
        $(document).ready(function () {
            $('.datepicker-here').datepicker();
            var MyDatatable = $('#campaign_list').DataTable({
                columnDefs: [{
                    targets: 0,
                    searchable: false,
                    visible: true,
                    orderable: false
                },
                    {
                        targets: 2,
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
                        targets: [7, 8, 9, 10],
                        className: "td-small",
                        width: "10px"
                    },
                    {
                        targets: '_all',
                        visible: true
                    }
                ]
            });
            // MyDatatable.columns.adjust().draw();
            $("#sortable").sortable({
                handle: ".handle",
                stop: function (event, ui) {
                    var i = 1;
                    $('.sortable-group').each(function (k, el) {
                        $(el).find("input.sort").val(i).attr('name', 'field_' + i + '[sort]');
                        $(el).find(".InputQuestionType").attr('name', 'field_' + i + '[question_type]');
                        $(el).find(".InputQuestion_text").attr('name', 'field_' + i + '[question_text]');
                        $(el).find(".InputQuestion_Option_1").attr('name', 'field_' + i + '[option_1]');
                        $(el).find(".InputQuestion_Option_2").attr('name', 'field_' + i + '[option_2]');
                        $(el).find(".InputQuestion_Option_3").attr('name', 'field_' + i + '[option_3]');
                        $(el).find(".InputQuestion_Option_4").attr('name', 'field_' + i + '[option_4]');
                        i++;
                    });
                }
            });
            //InputQuestionType
            $('.InputQuestionType').change(function () {
                var id = $(this).data('id');
                var QuestionOption = ".QuestionOption_" + id;
                if (this.value == "ShortAnswer") {
                    $(QuestionOption).hide();
                } else {
                    $(QuestionOption).show();
                }
            })
        });
        // Edit campaign
        // Save Form
        $("#CreateForm").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            var formData = new FormData(this);
            ;
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.success) {
                        Toast('green', 'Form successfully Created');
                        $('#CreateFormModal').modal('hide');
                        var option = '<div class="form-check">';
                        option += '<input class="form-check-input" type="radio" name="form_id" id="form_' + data.form_id + '" value="' + data.form_id + '" required >';
                        option += '<label class="form-check-label" for="form_' + data.form_id + '">' + data.form_name + '</label>';
                        option += '</div>';
                        $('#formOptions').append(option);
                    } else {
                        console.log(data);
                        Toast('red', data.form_name);
                    }
                }
            });
        });

        // End Form Saving
        function Toast(color = 'green', message) {
            iziToast.show({
                // icon: 'fa fa-solid fa-check',
                color: color, // blue, red, green, yellow
                message: message,
                position: 'topRight'
            });
        }
    </script>
@endpush
@push('style')
    <style>
        .handle {
            cursor: move;
        }

        .card-header {
            color: #000 !important;
            font-weight: bold;
        }

        .table th {
            padding: 12px 10px;
            max-width: 200px;
        }

        .table td {
            text-align: left !important;
            border: 1px solid #e5e5e5 !important;
            padding: 10px 10px !important;
        }

        .toggle-group .btn {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            top: -3px;
        }

        .toggle.btn-sm {
            min-width: 40px;
            min-height: 15px;
            height: 15px;
        }

        .toggle.ios, .toggle-on.ios, .toggle-off.ios {
            border-radius: 20px;
        }

        .toggle.ios .toggle-handle {
            border-radius: 20px;
        }

        .toggle input[data-size="small"] ~ .toggle-group label {
            text-indent: -999px;
        }

        .toggle.btn .toggle-handle {
            left: -9px;
            top: -2px;
        }

        .toggle.btn.off .toggle-handle {
            left: 9px;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
            max-width: 66rem !important;
        }

        #CreateFormModal {
            background-color: #00000080;
        }

        label {
            color: #000 !important
        }

        label i {
            color: red !important;
            font-style: normal;
            font-weight: bold;
        }

        .select2-container--classic .select2-selection--multiple {
            min-height: 40px !important;
            padding: 10px 20px 10px 20px;
            padding: 1px 10px 6px 10px !important;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            vertical-align: middle;
            background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .select2-container .select2-search--inline .select2-search__field {
            margin-top: 9px !important;
        }

        .bootstrap-tagsinput {
            width: 100% !important;
            padding: 8px 6px !important;
            box-shadow: none !important;
            border: 1px solid #ced4da !important;
        }
    </style>
@endpush
