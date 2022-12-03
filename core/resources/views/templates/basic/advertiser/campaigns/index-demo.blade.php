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
                            <th>Target Country </th>
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
                                <td>{{ $campaign->name }} <br><a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-type="edit" class="editcampaign create-campaign-btn">Edit</a> | <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}"   data-type="duplicate" class="duplicatecampaign create-campaign-btn">Duplicate</a></td>
                                <td>@if($campaign->approve) <span class="green">Approved  </span> @else
                                    <span class="orange">Pending</span>
                                   @endif
                                </td>
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
                                <td><a href="{{ route('advertiser.campaignsformleads.export',$campaign->id) }}">XLSX Download</a> |
                                    <a href="{{ route('advertiser.campaignsformleads.exportcsv',$campaign->id) }}">CSV Download</a> |
                                    <a href="{{ route('advertiser.campaignsleads.googlesheet',$campaign->id) }}">Google Sheet</a>
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
            <form method="POST" action="{{ route('advertiser.campaigns.store.demo') }}" id="campaign_form">
            @csrf
            <div class="modal-content h-100">
                <div class="modal-header bg-primary row m-0">
                    <div class="col-lg-3 input-col"> <input type="text" class="form-control" placeholder="Campaign Name" name="campaign_name" value="{{$next_campaign}}" required></div>
                    <div class="col-lg-3 input-col"><input type="text" class="form-control" placeholder="Company Name to Display" name="form['company_name']" required></div>
                    <div class="col-lg-3 input-col">
                        <div class="upload-box">
                            <input type="file" name="form['company_logo']" required id="form_company_logo" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple="">
                            <label for="form_company_logo"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload Logo</span></label>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right"><button id="submit" class="btn btn-light btn-xl">Create Campaign</button></div>
                </div>

                <div class="modal-body h-100" style="overflow-y: scroll">
                    <div id="error-message"></div>
                        <input type="hidden" value="0" name="campaign_id" id="input_campaign_id">
                        <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser_id">
                        <div class="row">
                            <div class="col-3">
                                <div class="card border mb-4 h-100">
                                    <div class="card-header bg-primary">Leads Criteria</div>
                                    <div class="card-body bg-ddd">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" for="leadsCriteriaInput">Leads Criteria<i>*</i></label>
                                            <div class="col-sm-12 input-col">
                                                 {{-- <input type="text" class="form-control" id="leadsCriteriaInput" name="leads_criteria" placeholder="Leads Criteria" required> --}}
                                                 <textarea name="leads_criteria" class="form-control" id="leadsCriteriaInput"  placeholder="Leads Criteria" required maxlength="255" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col">
                                                <div class=" row ">
                                                    <label class="col-sm-12 col-form-label " for="TargetCountryInput">From Which Conuntry</label>
                                                    <div class="col-sm-12 input-col">
                                                        <select class="custom-select mr-sm-2" id="TargetCountryInput" name="target_country" required>
                                                            <option value="" label="Select a country ... " selected="selected">Select a country ...</option>
                                                            @foreach ($countries as $country)
                                                                <option @if($user->country === $country->country_name) selected="selected" @endif   value="{{ $country->country_name }}" label=" {{ $country->country_name }} "> {{ $country->country_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" for="DailyBudgetInput">Daliy Budget<i>*</i></label>
                                            <div class="col-sm-12 input-col">
                                                <input type="number" class="form-control" id="DailyBudgetInput" name="daily_budget" placeholder="Daliy Budget" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" for="TargetCostInput">Target Cost Per Leads<i>*</i></label>
                                            <div class="col-sm-12 input-col">
                                                <input type="number" class="form-control" id="TargetCostInput" name="target_cost"  placeholder="Target Cost Per Leads" required>
                                                <small   class="form-text text-muted">We'll never share your email with anyone else.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col">
                                <div class="card border mb-4 h-100">
                                    <div class="card-header bg-primary"> Form Settings</div>
                                    <div class="card-body">
                                        <div class="form-group row">

                                            <div class="col-12 SelectFormType">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" checked>
                                                    <label class="form-check-label" for="form_1"> Create New Form </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-bordered ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" width="10px">#</th>
                                                            <th scope="col" >Required</th>
                                                            <th scope="col">Fileds</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="sortable" data-row='3'>
                                                        <tr class="sortable-group">
                                                            <td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>
                                                                <input type="hidden" class="sort" name="field_1[sort]" value="1">
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="InputQuestion_Required" name="field_1[required]">
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_1[question_text]" required="">
                                                                    <div class="input-group-append bg-white">
                                                                        <div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>
                                                                      </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="sortable-group">
                                                            <td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>
                                                                <input type="hidden" class="sort" name="field_2[sort]" value="2">
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="InputQuestion_Required" name="field_2[required]">
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_2[question_text]" required="">
                                                                    <div class="input-group-append bg-white">
                                                                        <div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>
                                                                      </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="sortable-group">
                                                            <td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>
                                                                <input type="hidden" class="sort" name="field_3[sort]" value="3">
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="InputQuestion_Required" name="field_3[required]">
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_3[question_text]" required="">
                                                                    <div class="input-group-append bg-white">
                                                                        <div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>
                                                                      </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr class="sortable-group"><td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i><input type="hidden" class="sort" name="field_2[sort]" value="2"></td><td><input type="checkbox" class="InputQuestion_Required" name="field_2[required]"></td><td><div class="input-group"><input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_2[question_text]" required=""><div class="input-group-append bg-white"><div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div></div></div><input type="text" class="form-control mt-3 mb-3" placeholder="Option 1" name="field_2[option_1]" required=""><input type="text" class="form-control mb-3" placeholder="Option 2" name="field_2[option_2]" required=""><input type="text" class="form-control mb-3" placeholder="Option 3" name="field_2[option_3]" required=""><input type="text" class="form-control " placeholder="Option 4" name="field_2[option_4]"></td></tr>
                                                    </tbody>
                                                </table>

                                                <div class="dropdown mt-3">
                                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        + Add More
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                      <a class="dropdown-item" href="#" onclick="add_form_field('single')">Sort Question</a>
                                                      <a class="dropdown-item" href="#" onclick="add_form_field('multiple')">Multiple Choise</a>

                                                    </div>
                                                  </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             {{--  --}}
                             <div class="col" id="formPreview">
                                <div class="card border  mb-4">
                                    <div class="card-header gray"> Form Preview</div>
                                    <div class="card-body">
                                        <iframe id="leadpaidform_1" src="https://leadspaid.com/campaign_form/1/1" referrerpolicy="unsafe-url" sandbox="allow-top-navigation allow-scripts allow-forms  allow-same-origin allow-popups-to-escape-sandbox" width="300px" height="600" style="border: 1px solid black;"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="optional_block" style="display: none">
                            <div class="col-12 mt-3">
                                <div class="card border mb-4 ">
                                    <div class="card-header bg-light">Add a few creatives relevant to this campaign (Optional)</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div>
                                                    <label class="col-form-label" for="WebsiteInput">Your Website (Optional)</label>
                                                    <input type="text" class="form-control" id="WebsiteInput" name="website_url" placeholder="Your Website">
                                                </div>
                                                <div>
                                                    <label class="col-form-label" for="SocialInput">Social Media URL (Optional)</label>
                                                    <input type="text" class="form-control" id="SocialInput" name="social_media_page" placeholder="Social Media URL">
                                                </div>

                                            </div>
                                            <div class="col-lg-3">

                                                <label class="col-form-label" >Youtube Video Url (Optional)  </label>
                                                <input type="text" class="form-control" id="Youtube_URL_1_Input" name="youtube_1" placeholder="Youtube Video Url 1">
                                                <input type="text" class="form-control my-3" id="Youtube_URL_2_Input" name="youtube_2" placeholder="Youtube Video Url 2">
                                                <input type="text" class="form-control" id="Youtube_URL_3_Input" name="youtube_3" placeholder="Youtube Video Url 3">
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="col-form-label" for="CampaignNameInput">Upload upto 3 images (Optional)</label>
                                                <div class="upload-box grey">
                                                    <input type="file" name="image_1" id="image_1_Input" class="inputfile inputfile-1">
                                                    <label for="image_1_Input"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload image 1</span></label>
                                                </div>
                                                <div class="upload-box grey  my-2">
                                                    <input type="file" name="image_2" id="image_2_Input" class="inputfile inputfile-1">
                                                    <label for="image_2_Input"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload image 2</span></label>
                                                </div>
                                                <div class="upload-box grey">
                                                    <input type="file" name="image_3" id="image_3_Input" class="inputfile inputfile-1">
                                                    <label for="image_3_Input"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload image 3</span></label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3">
                        <button id="submit" class="btn btn--primary btn-xl mt-3 mb-5">Create Campaign</button>
                    </div>
                </div>

            </div>
        </form>
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
        campaign_create_modal.on('hidden.bs.modal', function (event) { })
        $('.create-campaign-btn').on('click', function () { campaign_create_modal.modal('show');  });

        $("input").keyup(function(){ show_optional_block() });
        $("select").change(function(){ show_optional_block() });
        function show_optional_block(){ $('#optional_block').show(); }

        $('table').on('click', '.del-row', function(e){
            var table = $('#sortable');
            var row = table.attr('data-row');
            row = --row;
            table.attr('data-row', row);
            $(this).closest('tr').remove()
        })

        function add_form_field(type = 'single'){
            var table = $('#sortable');
            var row = table.attr('data-row');
                row = ++row;
                if(row <=5){
                var html ='<tr class="sortable-group">';
                html +='<td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>';
                html +='<input type="hidden" class="sort" name="field_'+row+'[sort]" value="'+row+'">';
                html +='</td>';
                html +='<td>';
                html +='<input type="checkbox" class="InputQuestion_Required" name="field_'+row+'[required]">';
                html +='</td>';
                html +='<td>';
                html +='<div class="input-group">';
                html +='<input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_'+row+'[question_text]" required>';
                html +='<div class="input-group-append bg-white">';
                html +='<div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>';
                html +='</div>';
                html +='</div>';
                if(type == 'multiple'){
                    html +='<input type="text" class="form-control mt-3 mb-3" placeholder="Option 1" name="field_'+row+'[option_1]" required>';
                    html +='<input type="text" class="form-control mb-3" placeholder="Option 2" name="field_'+row+'[option_2]" required>';
                    html +='<input type="text" class="form-control mb-3" placeholder="Option 3" name="field_'+row+'[option_3]" required>';
                    html +='<input type="text" class="form-control " placeholder="Option 4" name="field_'+row+'[option_4]" >';
                }
                html +='</td>';
                html +='</tr>';
                table.append(html).attr('data-row', row);
            }else{
                Toast('red', "Only 5 fields allowed");
            }
        }
        $(document).ready(function () {

            $("#sortable").sortable({
                handle: ".handle",
                stop: function (event, ui) {
                    var i = 1;
                    $('.sortable-group').each(function (k, el) {
                        if(i <=3){
                            $(el).find(".InputQuestion_text").prop("required", true);
                        }else{
                            $(el).find(".InputQuestion_text").prop("required", false).removeClass('is-invalid');
                        }
                        $(el).find("input.sort").val(i).attr('name', 'field_' + i + '[sort]');
                        $(el).find(".InputQuestionType").attr('name', 'field_' + i + '[question_type]');
                        $(el).find(".InputQuestion_Required").attr('name', 'field_' + i + '[required]');
                        $(el).find(".InputQuestion_text").attr('name', 'field_' + i + '[question_text]');
                        $(el).find(".InputQuestion_Option_1").attr('name', 'field_' + i + '[option_1]');
                        $(el).find(".InputQuestion_Option_2").attr('name', 'field_' + i + '[option_2]');
                        $(el).find(".InputQuestion_Option_3").attr('name', 'field_' + i + '[option_3]');
                        $(el).find(".InputQuestion_Option_4").attr('name', 'field_' + i + '[option_4]');
                        i++;
                    });
                }
            });
        });
        // Edit campaign

        function Toast(color = 'green', message) {
            iziToast.show({
                // icon: 'fa fa-solid fa-check',
                color: color, // blue, red, green, yellow
                message: message,
                position: 'topRight'
            });
        }
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script>
        $.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-col').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $.validator.addMethod( "greaterThan",
        function(endvalue, element, params) {
            var startalue = $(params).val();
            var isValueNumeric = !isNaN(parseFloat(endvalue)) && isFinite(endvalue);
            var isTargetNumeric = !isNaN(parseFloat(startalue)) && isFinite(startalue);
            if (!/Invalid|NaN/.test(new Date(endvalue))) {
                return Date.parse(endvalue) > Date.parse(startalue);
            } else{ return false };
        }, 'Must be greater than Start Date.');
        $.validator.addMethod(
            "money",
            function(value, element) {
                var isValidMoney = /^\d{0,4}(\.\d{0,2})?$/.test(value);
                return this.optional(element) || isValidMoney;
            },
            "Enter Correct value. "
        );

        $("#campaign_form").validate({
            rules: {
                name: {  minlength: 3 },
                daily_budget: {  required: true, money: true,min: 50},
                website_url: {minlength: 7},
                company_logo: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
                image_1: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
                image_2: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
                image_3: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },

            },messages: {
                daily_budget:'Daily Budget should be minimum $50',
                service_sell_buy:'Please fill Product / Service you Sell or Buy in this Campaign -  or leave it blank',
                website_url: 'Please fill Website URL - or leave it blank',
                company_logo: "File must be JPG, GIF or PNG, less than 2MB",
                image_1: "File must be JPG, GIF or PNG, less than 2MB",
                image_2: "File must be JPG, GIF or PNG, less than 2MB",
                image_3: "File must be JPG, GIF or PNG, less than 2MB",
            }
        });

    </script>
@endpush
@push('style')
<style>
     .bg-ddd {  background-color: #ddd!important; }
    #campaign_create_modal .form-control, #campaign_create_modal .custom-select{
        border-radius: 0; background-color:#fff;
        font-size: 20px!important;
        font-weight: 300!important;
        color: #000!important;
        border-radius: 0!important;
        vertical-align: middle!important;
        border: 1px solid #B9B9B9!important;
        outline: none!important;
        padding: 10px 18px!important;
        height: auto;
    }
    #campaign_create_modal .modal-header .btn{
        background-color:#fff;
    }
    #campaign_create_modal .btn-xl{
        border-radius: 0;
        font-size: 20px!important;
        border-radius: 0!important;
        padding: 10px 18px!important;
        font-weight: bold;
        text-transform: uppercase;
    }
    #campaign_create_modal .modal-header{
        background: #004664!important
    }

    #campaign_create_modal .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    #campaign_create_modal .inputfile-1 + label {
        color: #f1e5e6;
        background-color: #ddf5ff;
        max-width: 80%;
        font-size: 1.15rem;
        font-weight: 300;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        padding: 0.8rem 1.25rem;
        margin: 0!important
    }
    #campaign_create_modal .inputfile-1 + label:hover {
        background-color: #75a4b8;
    }

    #campaign_create_modal .upload-box.grey .inputfile-1 + label { background-color: #535353; color: #fff!important; }
    #campaign_create_modal .upload-box.grey .inputfile-1 + label:hover { background-color: #000; color: #fff!important; }

    #campaign_create_modal .inputfile-1 + label svg {
        width: 1em;
        height: 1em;
        vertical-align: middle;
        fill: currentColor;
        margin-top: -0.25em;
        margin-right: 0.25em;
    }

    #campaign_create_modal .card , #campaign_create_modal .card-header {  border-radius: 0!important; overflow: visible;  }
    #campaign_create_modal .card-header {   font-weight: 500!important; font-size: 1.2rem;}

    #campaign_create_modal .card-header.bg-primary{
        background-color: #0087c1!important;
        color: #fff!important;

    }

    #campaign_create_modal table th { font-weight: 500; }
    table th:last-child { text-align: left; }
    .input-group-append.bg-white .input-group-text{ background-color: transparent!important; border: 0px!important; padding: 0 0 0 9px;     font-size: 1.4rem;  }


    #formPreview{
        width: 370px;
        max-width: 370px;
    }
    </style>
    <style>
        th.required_field { width: 8%;}
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

        tr.sortable-group td:nth-child(2){ text-align: center!important; }
        tr.sortable-group .input-group-text{ width: 35px; }
        tr.sortable-group.row_1 .del-row, tr.sortable-group.row_2 .del-row{ display: none!important; }
        tr.sortable-group .type{ float: right; padding-right: 35px; }

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
            max-width: 104.5rem !important;
        }
        .modal-header span{ color: #000!important; }
        .modal-header .error.invalid-feedback{ color: #ff9e9e!important; }

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
.green{ color:green;}
.orange{color:orange;}
.container {
      width: 300px;
      margin: 10px auto;
    }

    .video {
      margin-bottom: 5px;
      padding: 0 5px;
    }

    .video iframe {
      border: 1px solid #000;
    }

    .form-title {
      text-align: center;
      font-size: 25px;
      font-weight: bold;
      margin: 0 0 0 0;
      padding: 0;
    }

    .form-subtitle {
      text-align: center;
      font-size: 14px;
      margin: 0 0 10px 0;
      padding: 0;
    }

    .form-row {
      width: 100%;
      margin-bottom: 8px;
      padding: 0 5px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .form-row.form-check {
      flex-direction: row;
    }

    .form-row .form-label {
      display: none;
      width: 100%;
      margin-bottom: 5px;
    }

    .form-row .form-control,
    .form-row .form-select {
      display: block;
      box-sizing: border-box;
      width: 100%;
      padding: 0.375rem 0.5rem;
      font-size: .9rem;
      font-weight: 300;
      line-height: 1.5;
      color: #212529;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: 3px;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .form-row .form-control {}

    .form-row .form-select {
      background-color: #fff;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 0.75rem center;
      background-size: 16px 12px;
    }

    .form-row select:invalid,
    .form-row select option:first-child {
      color: gray !important;
    }

    .form-btn {
      display: block;
      width: 100%;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #fff;
      background-color: #000;
      border-radius: 3px;
      cursor: pointer;
      margin-top: 2px;
    }

    .policy {
      margin: 5px 0 0 0;
      padding: 0;
      font-size: 12px;
      color: #666;
      text-align: center;
      width: 100%;
    }
    .logo{
      text-align: center;
      width: 100%;
      margin: 0;
      padding: 0;
      font-size: 12px;
      display: flex;
      align-content: center;
      flex-direction: row;
      align-items: center;
      gap: 5px;
    }

    .logo img{ display: inline-block; width: 120px; }

    .form-row select:invalid,
    .form-row select option:first-child {
      color: gray !important;
      font-size: 20px;
    }

    ::-webkit-input-placeholder {
      /* WebKit, Blink, Edge */
      color: gray !important;
      font-size: 20px;
    }

    :-moz-placeholder {
      /* Mozilla Firefox 4 to 18 */
      color: gray !important;
      font-size: 20px;
      opacity: 1;
    }

    ::-moz-placeholder {
      /* Mozilla Firefox 19+ */
      color: gray !important;
      font-size: 20px;
      opacity: 1;
    }

    :-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: gray !important;
      font-size: 20px;
    }

    ::-ms-input-placeholder {
      /* Microsoft Edge */
      color: gray !important;
      font-size: 20px;
    }

    ::placeholder {
        /* Most modern browsers support this now. */
        color: gray !important;
        font-size: 20px;
    }
    .card.sidbar_preview {
        border: 5px solid #000;
        padding: 5px !important;
    }
    .SelectFormType label { font-size: 20px; }
    .SelectFormType input[type="radio"] { transform: scale(1.3); margin-top: 0.5rem; }
    </style>
@endpush
