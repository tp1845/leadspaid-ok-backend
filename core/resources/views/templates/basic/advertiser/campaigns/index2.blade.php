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
                                <td><a href="{{ route('advertiser.campaignsformleads.export',$campaign->id) }}">XLSX </a> |
                                    <a href="{{ route('advertiser.campaignsformleads.exportcsv',$campaign->id) }}">CSV </a> |
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
            <div class="modal-content h-100">
                <div class="modal-header">
                    <h5 class="modal-title" id="campaign_createModalLabel">Create Campaign </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body h-100" style="overflow-y: scroll">
                    <div id="error-message"></div>
                    <form method="POST" action="{{ route('advertiser.campaigns.store') }}" id="campaign_form">
                        @csrf
                        <input type="hidden" value="0" name="campaign_id" id="input_campaign_id">
                        <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser_id">
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary"> Campaign Settings</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="CampaignNameInput">Campaign Name<i>*</i></label>
                                    <div class="col-sm-10 input-col">
                                        <input type="text" class="form-control" id="CampaignNameInput" name="name" placeholder="Campaign Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label" for="start_dateInput">Start Date<i>*</i></label>
                                    <div class="col-sm-4 input-col">
                                        <input type="text" name="start_date" id="StartDate_input" class="form-control"  required>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col">
                                        <div class=" row ">
                                            <label class="col-sm-4 col-form-label " for="SelectEndDateSelect">End Date </label>
                                            <div class="col-sm-8 input-col">
                                                <select class="custom-select mr-sm-2" name="end_date_select" id="SelectEndDateSelect">
                                                    <option value="NoEndDate" selected>No end Date</option>
                                                    <option value="SetEndDate">Set end Date</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class=" row ">
                                            <div class="col-sm-6 input-col">
                                                {{-- <input style="display: none" id="EndDate_input" type="text" name="end_date" data-range="false" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control" data-position='bottom left' placeholder="@lang('End date')"> --}}
                                                <input class="form-control" style="display: none" id="EndDate_input" type="text" name="end_date" placeholder="@lang('End date')">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="DailyBudgetInput">Daily Budget<i>*</i></label>
                                    <div class="col-sm-4 input-col">
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
                                            <div class="col-sm-8 input-col">

                                                <select class="custom-select mr-sm-2" id="TargetCountryInput" name="target_country" required>
                                                    <option value="" label="Select a country ... " selected="selected">Select a country ...</option>
                                                    @foreach ($countries as $country)
                                                        <option @if($user->country === $country->country_name) selected="selected" @endif   value="{{ $country->country_name }}" label=" {{ $country->country_name }} "> {{ $country->country_name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!--div class=" row ">
                                            <label class="col-sm-3 col-form-label text-sm-right" for="target_cityInput">Target City<i>*</i></label>
                                            <div class="col-sm-9 input-col">
                                                <input type="text" id="target_cityInput" class="form-control" placeholder="@lang('Target City')" name="target_city" required>
                                            </div>
                                        </div -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="TargetingTypeInput">Targeting Type<i>*</i></label>
                                    <div class="col-sm-4 input-col">
                                        <select class="custom-select mr-sm-2" id="TargetingTypeInput" name="target_type" required>
                                            <option value="broad" selected>Broad</option>
                                            <option value="narrow">Narrow</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="Hide-on-Broad" style="display: none">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label" for="target_placements_Input">Targeting Placements </label>
                                        <div class="col-sm-6 input-col">
                                            <select multiple class="form-control" id="target_placements_Input" name="target_placements[]">
                                                   <option value="none">none</option>
                                                <option value="google.com">google.com</option>
                                                <option value="facebook.com">facebook.com</option>
                                              
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label" for="KeywordsInput">Keywords or tags of those products / services</label>
                                        <div class="col-sm-6 input-col">
                                            <input type="text" class="form-control tags_input w-100" id="KeywordsInput" name="keywords" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label" for="target_categories_Input">Targeting Categories </label>
                                        <div class="col-sm-6 input-col">
                                            <select multiple class="form-control" id="target_categories_Input" name="target_categories[]">
                                                 <option value="none">none</option>
                                                <option value="Immigration">Immigration </option>
                                                <option value="Permanent Residency">Permanent Residency</option>
                                                <option value="Citizenship">Citizenship</option>
                                            </select>
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
                                    <label for="FormUsedInput"> <a href="#" id="CreateFormModal_btn" data-toggle="modal" data-target="#CreateFormModal"> + Create Form </a></label>
                                    <div id="formOptions" class="input-col">
                                        <div class="form-check" style="height:1px; overflow:hidden;">
                                            <input class="form-check-input" type="radio" name="form_id" id="form_0" value="" required>
                                            <label class="form-check-label" for="form_0">
                                            </label>
                                        </div>
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
                                    <label class="col-sm-12 col-form-label" for="ServiceSellBuyInput">Product / Service you Sell or Buy in this Campaign</label>
                                    <div class="col-sm-12 input-col">
                                        <input type="text" class="form-control" id="ServiceSellBuyInput" name="service_sell_buy" placeholder="Product  / Service you Sell or Buy in this Campaign">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-sm-12 col-form-label" for="WebsiteInput">Website URL used in this Campaign (Optional)</label>
                                    <div class="col-sm-12 input-col">
                                        <input type="url" class="form-control" id="website_url" name=" website_url" placeholder="Website URL (Optional)" onblur="ValidURL(this.value)"

                                    </div>
                                    <span style="color: red;">
                                         @error('website_url'){{$message}}@enderror
                                    </span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label" for="SocialInput">Social Media Page URL used in this Campaign(Optional)</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="SocialInput" name="social_media_page" placeholder="Social Media Page URL (Optional)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="submit" class="btn btn--primary">Create Campaign</button>
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
                        <div class="row">
                            <div class="col-md-8">
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">Form Settings</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="FormNameInput">Form Name</label>
                                    <div class="col-sm-6 input-col">
                                        <input type="text" class="form-control" id="FormNameInput" name="form_name" placeholder="Form Name" required minlength="3">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="CompanyBrandNameInput">Company / Brand Name</label>
                                    <div class="col-sm-6 input-col">
                                        <input type="text" class="form-control" id="CompanyBrandNameInput" name="company_name" placeholder="Company / Brand Name" required minlength="3">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="CompanyLogoInput">Company Logo</label>
                                    <div class="col-sm-6 input-col">
                                        <input type="file" class="form-control-file pl-0" name="company_logo" id="CompanyLogoInput" class="CompanyLogoInput" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="FormTitleInput">Form Title</label>
                                    <div class="col-sm-6 input-col">
                                        <input type="text" class="form-control" id="FormTitleInput" name="form_title" placeholder="Form Title"  required minlength="3">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="OfferDescriptionInput">Offer Description</label>
                                    <div class="col-sm-6 input-col">
                                        <input type="text" class="form-control" id="OfferDescriptionInput" name="offer_desc" placeholder="Offer Description" required minlength="3">
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- creative --}}
                        <div class="card border shadow-sm mb-4">
                            <div class="card-header bg-light text-secondary">Creative</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="Youtube_URL_1_Input">Youtube Video Url1(Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control pl-0" id="Youtube_URL_1_Input" name="youtube_1" placeholder="Youtube video URL1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="Youtube_URL_2_Input">Youtube Video Url2(Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control pl-0" id="Youtube_URL_2_Input" name="youtube_2" placeholder="Youtube video URL2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="Youtube_URL_3_Input">Youtube Video Url3(Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control pl-0" id="Youtube_URL_3_Input" name="youtube_3" placeholder="Youtube video URL3">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="video_1_Input">Upload a video 1(Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file pl-0" id="video_1_Input" name="video_1" placeholder="video video URL1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="video_URL_2_Input">Upload a video 2(Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file pl-0" id="video_URL_2_Input" name="video_2" placeholder="video video URL2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="video_URL_3_Input">Upload a video 3(Optional)</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file pl-0" id="video_URL_3_Input" name="video_3" placeholder="video video URL3">
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="image_1_Input">Upload an image 1 (Optional)</label>
                                    <div class="col-sm-6 input-col">
                                        <input type="file" class="form-control-file pl-0" id="image_1_Input" name="image_1" placeholder="Upload an image 1">
                                        <small class="form-text text-muted">Upload an image of (minimum width = 300px / minimum height = 180px)</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="image_2_Input">Upload an image 2 (Optional)</label>
                                    <div class="col-sm-6 input-col">
                                        <input type="file" class="form-control-file pl-0" id="image_2_Input" name="image_2" placeholder="Upload an image 2">
                                        <small class="form-text text-muted">Upload an image of (minimum width = 300px / minimum height = 180px)</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label" for="image_3_Input">Upload an image 3 (Optional)</label>
                                    <div class="col-sm-6 input-col">
                                        <input type="file" class="form-control-file pl-0" id="image_3_Input" name="image_3" placeholder="Upload an image 3">
                                        <small class="form-text text-muted">Upload an image of (minimum width = 300px / minimum height = 180px)</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                   <div class="col-md-4">
                    <div class="text-center">
                        <h3>Preview:<span class="form_name_t">Form Name<span> </h3>
                    </div>
                    <div class="card sidbar_preview">

                  
      <div class="video">
        <iframe max-width="300px" max-height="600px" src="https://www.youtube.com/embed/X1QJGzvyoZI" title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
      </div>
      <h2 class="form-title">Singapore PR Application 2022</h2>
      <p class="form-subtitle">Calculate Your PR Chances Now!</p>
      <div class="form-wrap">
      <div class="form-row InputText1fullname" id="p1">
        <label for="InputText1" class="form-label">Full Name*</label>
        <input type="text" class="form-control " id="InputText1" placeholder="Full Name*" required>
      </div>
      <div class="form-row singapore_mobile_number" id="p2">
        <label for="InputText3" class="form-label">Singapore Mobile Number*</label>
        <input type="text" class="form-control" id="singapore_mobile_number" placeholder="Singapore Mobile Number*" required>
      </div>
      <div class="form-row work_email" id="p3">
        <label for="InputText2" class="form-label">Work Email*</label>
        <input type="email" class="form-control" id="work_email" placeholder="Work Email*" required>
      </div>
      <div class="form-row relationship_to_singaporean" id="p4">
        <label for="InputText4" class="form-label">Relationship to Singaporean/PR*</label>
        <select class="form-select" id="relationship_to_singaporean" required>
          <option selected value="" class="holder">Relationship to Singaporean/PR*</option>
          <option value="No Relationship">No Relationship</option>
          <option value="Spouse">Spouse</option>
          <option value="Child">Child</option>
          <option value="Aged Parent">Aged Parent</option>
        </select>
      </div>
      <div class="form-row length_of_stay" id="p5">
        <label for="InputText4" class="form-label">Length of stay in Singapore?*</label>
        <select class="form-select" id="length_of_stay" required>
          <option selected value="" disabled>Length of stay in Singapore?*</option>
          <option value="Over 2 years">Over 2 years</option>
          <option value="2 years">2 years</option>
          <option value="1 year">1 year</option>
          <option value="Less than 6 months">Less than 6 months</option>
        </select>
      </div>
  </div>
      <div class="form-row">
        <button type="submit" class="form-btn">Submit</button>
        <p class="policy">I agree to your privacy policy by submitting the form</p>
        <p class="logo company_logo_t "><img src="{{ url('/')}}/assets/images/logo.png" alt="" class="company_logo_t2" > 
            <span class="brandname_t"></span></p>
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
                                        <th scope="col" class="required_field">Required</th>
                                        <th scope="col">Question</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody id="sortable">

                                    @for ($i = 1; $i < 6; $i++)
                                        <tr class="sortable-group" >
                                            <td class="handle" data-order="{{ $i }}"><i class="fa fa-solid fa-grip-vertical"></i>
                                                <input type="hidden" class="sort" name='field_{{ $i }}[sort]' value="{{ $i }}"></td>
                                            <th scope="row">
                                                <select class="custom-select mr-sm-2 InputQuestionType" id="InputQuestionType_{{ $i }}" data-id="{{ $i }}" name='field_{{ $i }}[question_type]' onchange="change_filed_type({{ $i }},this.value)">
                                                    <option value="ShortAnswer" selected="">Short Answer</option>
                                                    <option value="MultipleChoice">Multiple Choice</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="checkbox_field_{{ $i }}" class="InputQuestion_Required"  name='field_{{ $i }}[required]'>
                                            </td>
                                            <td><input type="text" class="form-control InputQuestion_text_field_{{ $i }}" placeholder="Enter Your Question" name='field_{{ $i }}[question_text]' @if($i <= 3)required @endif ></td>
                                            <td><input type="text" class="InputQuestion_text_1 form-control QuestionOption_{{ $i }} InputQuestion_Option_1" placeholder="Option 1" style="display: none" name='field_{{ $i }}[option_1]' onblur="appendoptiion({{ $i }},this.value)"  ></td>
                                            <td><input type="text" class="QuestionOption_requried form-control QuestionOption_{{ $i }} InputQuestion_Option_2" placeholder="Option 2" style="display: none" name='field_{{ $i }}[option_2]' onblur="appendoptiion({{ $i }},this.value)" ></td>
                                            <td><input type="text" class="QuestionOption_requried form-control QuestionOption_{{ $i }} InputQuestion_Option_3" placeholder="Option 3" style="display: none" name='field_{{ $i }}[option_3]' onblur="appendoptiion({{ $i }},this.value)" ></td>
                                            <td><input type="text" class="form-control QuestionOption_{{ $i }} InputQuestion_Option_4" placeholder="Option 4" style="display: none" name='field_{{ $i }}[option_4]'  onblur="appendoptiion({{ $i }},this.value)" ></td>
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
            $("#campaign_form").find("#submit").text('Create Campaign');
            $("#StartDate_input").prop('readonly',false);
                     $("#StartDate_input").css('pointer-events','unset');
                     $("#TargetCountryInput").css('pointer-events','unset');
                     $("#TargetingTypeInput").css('pointer-events','unset');
                     $("#target_placements_Input").css('pointer-events','unset');
                     $(".bootstrap-tagsinput").css('pointer-events','unset');
                     $("#target_categories_Input").css('pointer-events','unset');
                     $("#formOptions").css('pointer-events','unset');
                     $("#ServiceSellBuyInput").css('pointer-events','unset');
                     $("#WebsiteInput").css('pointer-events','unset');
                     $("#SocialInput").css('pointer-events','unset');
        });
        $('body').on('click', '.editcampaign, .duplicatecampaign', function (e) {
            e.preventDefault();
            var typp=$(this).data('type');
            reset_campaign_create_form();
            $('#campaign_createModalLabel').html('Edit Campaign');
            campaign_create_modal.modal('show');
            var campaign_id = $(this).attr('data-id');
            // var url = '{{ route("advertiser.campaigns.edit", ":campaign_id") }}';
            // url = url.replace(':campaign_id', campaign_id);
            // url =  "/advertiser/campaigns/edit/"+ campaign_id;
            var url = $(this).attr('href');
            $.get(url, function (data) {
                $("#campaign_form").find("#submit").text('Save Campaign');
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
                $("input[name=form_id]").prop("disabled", true);
                $("input[name=form_id][value=" + data.form_id + "]").prop('checked', true).prop("disabled", false);
                $("#CreateFormModal_btn").hide();
                /// target_placements_Input
                $.each(data.target_placements, function (idx, val) {
                    $("select#target_placements_Input option[value='" + val + "']").prop("selected", true);
                });
                $.each(data.target_categories, function (idx, val) {
                    $("select#target_categories_Input option[value='" + val + "']").prop("selected", true);
                });
                
                 if(data.approve==1){
                     $("#StartDate_input").prop('readonly',true);
                     $("#StartDate_input").css('pointer-events','none');
                     $("#TargetCountryInput").css('pointer-events','none');
                     $("#TargetingTypeInput").css('pointer-events','none');
                     $("#target_placements_Input").css('pointer-events','none');
                     $(".bootstrap-tagsinput").css('pointer-events','none');
                     $("#target_categories_Input").css('pointer-events','none');
                   //  $("#formOptions").css('pointer-events',);
                     $("#ServiceSellBuyInput").css('pointer-events','none');
                     $("#WebsiteInput").css('pointer-events','none');
                     $("#SocialInput").css('pointer-events','none');
                 }else{
                       $("#StartDate_input").prop('readonly',false);
                     $("#StartDate_input").css('pointer-events','unset');
                     $("#TargetCountryInput").css('pointer-events','unset');
                     $("#TargetingTypeInput").css('pointer-events','unset');
                     $("#target_placements_Input").css('pointer-events','unset');
                     $(".bootstrap-tagsinput").css('pointer-events','unset');
                     $("#target_categories_Input").css('pointer-events','unset');
                     $("#formOptions").css('pointer-events','unset');
                     $("#ServiceSellBuyInput").css('pointer-events','unset');
                     $("#WebsiteInput").css('pointer-events','unset');
                     $("#SocialInput").css('pointer-events','unset');
                 }

                 if(typp=="duplicate"){
                    $("#campaign_form").find("#submit").text('Create Campaign');
                 $("input[name='name']").val(data.name+'-copy');
                 $('#input_campaign_id').val('');
                 $("#campaign_createModalLabel").text('Duplicate Campaign');
                 $("#StartDate_input").val('{{ date("Y-m-d")}}');
                 $("#SelectEndDateSelect").val('NoEndDate');
                 $("#EndDate_input").hide();
                 $("#StartDate_input").prop('readonly',false);
                     $("#StartDate_input").css('pointer-events','unset');
                     $("#TargetCountryInput").css('pointer-events','unset');
                     $("#TargetingTypeInput").css('pointer-events','unset');
                     $("#target_placements_Input").css('pointer-events','unset');
                     $(".bootstrap-tagsinput").css('pointer-events','unset');
                     $("#target_categories_Input").css('pointer-events','unset');
                     $("#formOptions").css('pointer-events','unset');
                     $("#ServiceSellBuyInput").css('pointer-events','unset');
                     $("#WebsiteInput").css('pointer-events','unset');
                     $("#SocialInput").css('pointer-events','unset');
 

               }else{
                $("#campaign_createModalLabel").text('Edit Campaign');
               }

            })
        });

        function reset_campaign_create_form() {
            $('#campaign_createModalLabel').html('Create Campaign');
            $('#SelectEndDateSelect').val("NoEndDate").change();
            $('#TargetingTypeInput').val("broad").change();
            $('#campaign_create_modal form').trigger("reset");
            $('#input_campaign_id').val(0);
            $("input[name=form_id]").prop("disabled", false);
            $("#CreateFormModal_btn").show();
            keywords_Input.tagsinput('removeAll');
        }

        //$(".Hide-on-Broad"){}
        $("#TargetingTypeInput").on('change', function () {
            if (this.value == "broad") {
                $(".Hide-on-Broad").hide();
                $("#target_placements_Input").prop("required", false);
                $("#KeywordsInput").prop("required", false);
                $("#target_categories_Input").prop("required", false);
            } else {
                $(".Hide-on-Broad").show();
                $("#target_placements_Input").prop("required", true);
                $("#KeywordsInput").prop("required", true);
                $("#target_categories_Input").prop("required", true);
            }
        })
        $("#SelectEndDateSelect").on('change', function () {
            if (this.value == "NoEndDate") {
                $("#EndDate_input").hide().prop("required", false).val('');
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
                        if(i <=3){
                            $(el).find(".InputQuestion_text").prop("required", true);
                        }else{
                            $(el).find(".InputQuestion_text").prop("required", false).removeClass('is-invalid');
                        }
                        var jj=$(el).find('.handle').data("order");

                        console.log(jj);
                        $("#p"+i).css('order',jj);

                        var abdc= $(el).find("input.sort").val(i);
                        console.log(abdc);
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
            //InputQuestionType
            $('.InputQuestionType').change(function () {
                var id = $(this).data('id');
                var QuestionOption = ".QuestionOption_" + id;
                if (this.value == "ShortAnswer") {
                    $(QuestionOption).hide();
                    $(QuestionOption+'.QuestionOption_requried').prop("required", false);;

                } else {
                    $(QuestionOption).show();
                    $(QuestionOption+'.QuestionOption_requried').prop("required", true)
                }
            })
        });
        // Edit campaign
        // Save Form
        function ajaxSubmit_createForm(form_ele, form_id){
            var form = $(form_id);
            var actionUrl = form.attr('action');
            var formData = new FormData(form_ele);
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
                        form.trigger("reset");
                    } else {
                        console.log(data);
                        Toast('red', data.form_name);
                    }
                }
            });
        }
       // $("#CreateForm").submit(function (e) {
            // e.preventDefault();
            // var form = $(this);
            // var actionUrl = form.attr('action');
            // var formData = new FormData(this);
            // ;
            // $.ajax({
            //     type: "POST",
            //     url: actionUrl,
            //     data: formData,
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     success: function (data) {
            //         if (data.success) {
            //             Toast('green', 'Form successfully Created');
            //             $('#CreateFormModal').modal('hide');
            //             var option = '<div class="form-check">';
            //             option += '<input class="form-check-input" type="radio" name="form_id" id="form_' + data.form_id + '" value="' + data.form_id + '" required >';
            //             option += '<label class="form-check-label" for="form_' + data.form_id + '">' + data.form_name + '</label>';
            //             option += '</div>';
            //             $('#formOptions').append(option);
            //         } else {
            //             console.log(data);
            //             Toast('red', data.form_name);
            //         }
            //     }
            // });
      //  });

        // End Form Saving
        function Toast(color = 'green', message) {
            iziToast.show({
                // icon: 'fa fa-solid fa-check',
                color: color, // blue, red, green, yellow
                message: message,
                position: 'topRight'
            });
        }
         function ValidURL(str) {
            var regex = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$(?:www\.)?/
            if (!regex.test(str)) {
              
                
            } else {
               $("#website_url").removeClass("is-invalid");
               

               
            }
        }
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
    <script>
        $.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group .input-col').append(error);
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
                end_date: { greaterThan: "#StartDate_input" },
                daily_budget: {  required: true, money: true,min: 50},
                 service_sell_buy: {  minlength: 3 },
           

            },messages: {
             daily_budget:'Daily Budget should be minimum $50',
             service_sell_buy:'Please fill Product / Service you Sell or Buy in this Campaign -  or leave it blank',
            
            }
        });

      
       

        $('[name="start_date"]').datepicker({
            dateFormat: 'mm/dd/yy',
            range: false,
            minDate: 0,
            position: 'bottom left'
        }).on('changeDate', function(e) {
            // Revalidate the date field
            $(this).focus().blur();
        });
        $('[name="end_date"]').datepicker({
            dateFormat: 'mm/dd/yy',
            range: false,
            minDate: 0,
            position: 'bottom left'

        }).on('change', function(e) {
            // Revalidate the date field
            $(this).focus().blur();

        });

        $("#CreateForm").validate({
            rules: {
                company_logo: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
                image_1: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
                image_2: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
                image_3: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
            },
            messages: {
                company_logo: "File must be JPG, GIF or PNG, less than 2MB",
                image_1: "File must be JPG, GIF or PNG, less than 2MB",
                image_2: "File must be JPG, GIF or PNG, less than 2MB",
                image_3: "File must be JPG, GIF or PNG, less than 2MB",

            },
            submitHandler: function(form) {
                ajaxSubmit_createForm(form, '#CreateForm');
                return false;
            }
        });
        // just for the demos, avoids form submit

        $("#FormNameInput").on('keypress',function(){
           var name=$(this).val();
           $(".form_name_t").text(name);
        });

        $("#CompanyBrandNameInput").on('keypress',function(){
           var name=$(this).val();
           $(".brandname_t").text(name);
        });
       
       $("#FormTitleInput").on('keypress',function(){
          var name=$(this).val();
           $(".form-title").text(name);
       });

        $("#OfferDescriptionInput").on('keypress',function(){
          var name=$(this).val();
           $(".form-subtitle").text(name);
       });

        // for InputQuestion_text
        $(".InputQuestion_text").on('keypress',function(){
         if($("#InputQuestionType_1").val()=="ShortAnswer"){
               
                 var input2=$(this).val();
                var str='';
                if($("#checkbox_field_1").is(':checked')){
                    str='*';
                    
                }

                  $("#InputText1").attr("placeholder",input2+' '+str);
                     
                }
        });
     $("#checkbox_field_1").click(function(){
        

        if($(this).is(":checked")){
            
         var InputText1=$("#InputText1").attr('placeholder');
           if(InputText1.indexOf('*') != -1){
               $("#InputText1").attr('placeholder',InputText1+'');
               
           }else{
                var ppp=InputText1.slice(0,-1);
             $("#InputText1").attr('placeholder',ppp+' *');
                  
           }
        }

  });

      // for InputQuestion_text
        $(".InputQuestion_text_field_1").on('keydown, keyup',function(){
         setpreviewdata(1);
         });


           $(".InputQuestion_text_field_2").on('keydown, keyup',function(){
              setpreviewdata(2); 
           });
              $(".InputQuestion_text_field_3").on('keydown, keyup',function(){
                setpreviewdata(3); 
               });
               $(".InputQuestion_text_field_4").on('keydown, keyup',function(){
                setpreviewdata(4); 
               });
                $(".InputQuestion_text_field_5").on('keydown, keyup',function(){
                setpreviewdata(5); 
               });
    
     function change_filed_type(id,val){
        console.log("id:",id);
        console.log("value:",val);

        if(val=="ShortAnswer"){
        $("#p"+id).find("select").remove();
        $("#p"+id).find("label").after('<input type="text" name="" class="form-control" aria-required="true">');
        }else if(val=="MultipleChoice"){
            $("#p"+id).find("input").remove();
            $("#p"+id).find("label").after('<select name="" class="form-select"></select>');
        }
      
     }

     function setpreviewdata(id){
           
        if($("#InputQuestionType_"+id).val()=="ShortAnswer"){
               
                 var input2=$('.InputQuestion_text_field_'+id).val();
                var str='';
                if($("#checkbox_field_"+id).is(':checked')){
                    str='*';
                    
                }

                  $("#p"+id).find("input").attr("placeholder",input2+' '+str);
                     
                }else if( $("#InputQuestionType_"+id).val()=="MultipleChoice"){
                   
                  
                  var input2=$('.InputQuestion_text_field_'+id).val();
                  var option='<option value="">'+input2+"</option>";                                  
                   $("#p"+id).find("select").find('option:first').text(input2);
                } 
     }

  function appendoption(id,val){
     if(val!==""){
    var opt='<option value="'+val+'">'+val+'</option>';

    $("#p"+id).find("select").append(opt);
     }

  }


     $("#checkbox_field_1").click(function(){
        

        if($(this).is(":checked")){
            
         var InputText1=$("#InputText1").attr('placeholder');
           if(InputText1.indexOf('*') != -1){
               $("#InputText1").attr('placeholder',InputText1+'');
               
           }else{
                var ppp=InputText1.slice(0,-1);
             $("#InputText1").attr('placeholder',ppp+' *');
             
           }
        }else{
           
            var InputText1=$("#InputText1").attr('placeholder');
            if(InputText1.indexOf('*') != -1){
                 var ppp=InputText1.slice(0,-1);
               $("#InputText1").attr('placeholder',ppp+'');
               
           }else{
              
             $("#InputText1").attr('placeholder',InputText1+' ');
            
           }
           
        }


  });


$(document).ready(()=>{
      $('#CompanyLogoInput').change(function(){
        const file = this.files[0];
        
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
           
            $('.company_logo_t2').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });

    </script>
@endpush
@push('style')
    <style>
        .card.sidbar_preview {
    border: 5px solid #000;
    padding: 5px !important;
}
        th.required_field {    width: 8%;}
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
.green{    color:green;}
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
      font-weight: 400;
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
      font-size: 13px;
    }

    ::-webkit-input-placeholder {
      /* WebKit, Blink, Edge */
      color: gray !important;
      font-size: 13px;
    }

    :-moz-placeholder {
      /* Mozilla Firefox 4 to 18 */
      color: gray !important;
      font-size: 13px;
      opacity: 1;
    }

    ::-moz-placeholder {
      /* Mozilla Firefox 19+ */
      color: gray !important;
      font-size: 13px;
      opacity: 1;
    }

    :-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: gray !important;
      font-size: 13px;
    }

    ::-ms-input-placeholder {
      /* Microsoft Edge */
      color: gray !important;
      font-size: 13px;
    }

    ::placeholder {
      /* Most modern browsers support this now. */
      color: gray !important;
      font-size: 13px;
    }
  .card.sidbar_preview {
    border: 2px solid #000;
    padding: 5px !important;
    border-radius: 0;
}

.form-wrap {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
}

#p1 {
    order: 1;
}

#p2 {
    order: 2;
}

#p3 {
    order: 3;
}

#p4 {
    order: 4;
}

#p5 {
    order: 5;
}
#campaign_list thead tr {
    background-color: #1a273a;
}
.btn--primary.create-campaign-btn{
     background-color: #1361b2!important;
    border-radius: 0;
}
#campaign_list td{
    font-size: 15px;
}
#campaign_list td:nth-child(3){
    font-size: 14px;
}
#campaign_list a.create-campaign-btn {
    font-size: 13px;
}
.dataTables_paginate .pagination .page-item.active .page-link{
    background-color: #1361b2;
    border-color: #1361b2;
    box-shadow: 0px 3px 5px rgb(0,0,0,0.125);
}
#campaign_list_wrapper .dataTables_filter input {
    border-radius: 0;
}
#campaign_list_wrapper .dataTables_paginate .pagination .page-item .page-link{
    border-radius: 0!important;
}
#campaign_list_wrapper .dataTables_length select {
    border-radius: 0;
}
.page-wrapper.default-version,
table td,
tfoot tr {
    font-weight: normal;
    font-family: Poppins;
}
#campaign_list_wrapper{
    overflow-x: scroll;
    </style>
}
}
}
    
@endpush




