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
    {{-- Start Create campaign_create MODAL --}}
    <div id="campaign_create_modal" style="max-width: 100vw;" class="modal fade right modal-lg" tabindex="-1" role="dialog">
        <div class="float-right h-100 m-0 modal-dialog w-100" style="max-width: 25rem;" role="document">
            <button type="button" class="close campaign_create_close"  data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <form method="POST" action="{{ route('advertiser.campaigns.store.demo') }}" id="campaign_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-content h-100 ">
                    <div class="modal-header bg-primary m-0 PageFormStyle">
                        <div class="w-100">
                        <div class="row">
                            <div class="col-lg-3 input-col"> <input type="text" class="form-control" placeholder="Campaign Name" name="campaign_name" value="{{$next_campaign}}" required maxlength="30"></div>
                            <div class="col-lg-3 input-col"><input type="text" class="form-control" placeholder="Company Name to Display" name="company_name" required maxlength="30"></div>
                            <div class="col-lg-3 input-col d-flex  flex-wrap">
                                <div class="upload-box">
                                    <input type="file" name="company_logo" required id="form_company_logo" class="inputfile inputfile-1"  accept="image/jpeg, image/png" >
                                    <label for="form_company_logo"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload Logo</span></label>
                                </div>
                                <div id="company_logo_preview" class="img_preview_box">
                                    <a href="#" class="text-danger del-preview"><i class="fas fa-times-circle"></i></a>
                                    <img id="company_logo_img" src="#" alt="company_logo_img"  style="display: none" />
                                </div>
                            </div>
                            <div class="col-lg-3 text-right"><button id="submit" class="btn btn-light btn-xl">Create Campaign</button></div>
                        </div>
                        <div class="row border-top">
                            <div class="col-lg-3 input-col">
                                <label class="form-label text-white" for="TargetCountryInput">From Which Country</label>
                                <select class="custom-select mr-sm-2" id="TargetCountryInput" name="target_country" required>
                                    <option value="" label="Select a country ... " selected="selected">Select a country ...</option>
                                    @foreach ($countries as $country)
                                        <option @if($user->country === $country->country_name) selected="selected" @endif   value="{{ $country->country_name }}" label=" {{ $country->country_name }} "> {{ $country->country_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 input-col">
                                <label class="form-label text-white" for="DailyBudgetInput">Daliy Budget<i>*</i></label>
                                <input type="text" class="form-control" id="DailyBudgetInput" name="daily_budget" placeholder="Daliy Budget" required>
                            </div>
                            <div class="col-lg-3 input-col ">
                                <label class=" form-label text-white" for="TargetCostInput">Target Cost Per Lead<i>*</i></label>
                                    <input type="text" class="form-control" id="TargetCostInput" name="target_cost"  placeholder="Target Cost Per Lead" required>
                                    {{-- <small class="form-text text-muted">You will get the leads within this cost on average. However, the cost per lead may vary on different days.</small> --}}
                            </div>

                        </div>
                    </div>
                    </div>
                    <div class="modal-body h-100" style="overflow-y: scroll">
                        <div id="error-message"></div>
                        <input type="hidden" value="0" name="campaign_id" id="input_campaign_id">
                        <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser_id">
                        <div class="row mb-3 PageFormStyle">
                            <div class="col d-flex SelectFormType">
                                <div class="form-check mr-4">
                                    <input class="form-check-input" type="radio" name="SelectFormType" id="SelectFormType1" value="Create New Form" checked>
                                    <label class="form-check-label" for="SelectFormType1">
                                        Create New Form
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="SelectFormType" id="SelectFormType2" value="Use Existing Form">
                                    <label class="form-check-label" for="SelectFormType2">
                                      Use Existing Form
                                    </label>
                                  </div>
                            </div>
                        </div>
                        <div class="row" style="display: none">
                            <div class="col">
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
                        <div class="row">
                            <div class="col PageFormStyle">
                                <div class="card border  h-100">
                                    <div class="card-header bg-primary"> <div class="input-col"> <input type="text" class="form-control" id="form_name" name="form_name" placeholder="Form Name" required="" minlength="3" style="max-width: 400px; padding: 5px!important;"></div> </div>
                                    <div class="card-body p-0 ">
                                        <div class="row m-0">
                                            <div class="col-4 py-2 bg-ddd h-100">
                                                <div>
                                                    <h4 class="gray_title top"> Add Form Title & Description</h4>
                                                    <div>
                                                        <label class="col-form-label" for="FormTitleInput_1">Form Title ( add upto 3 variations )</label>
                                                        <div id="form_title_1">
                                                            <div class="input-group input-col">
                                                                <input type="text" class="form-control" id="FormTitleInput_1" name="form_title[1]" placeholder="Form Title 1" required="" minlength="3">
                                                                <div class="input-group-append bg-none">
                                                                    <div class="input-group-text"> <a href="#" class="text-success"  onClick="show_next('#form_title_2', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="form_title_2" style="display: none">
                                                            <div class="input-group input-col my-3">
                                                                <input type="text" class="form-control" id="FormTitleInput_2" name="form_title[2]" placeholder="Form Title 2"  minlength="3">
                                                                <div class="input-group-append bg-none">
                                                                    <div class="input-group-text"> <a href="#" class="text-success"  onClick="show_next('#form_title_3', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="form_title_3" style="display: none">
                                                            <div class="input-group input-col">
                                                                <input type="text" class="form-control" id="FormTitleInput_3" name="form_title[3]" placeholder="Form Title 3"   minlength="3">
                                                                <div class="input-group-append bg-none">
                                                                    <div class="input-group-text"> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="col-form-label" for="form_desc_1_Input">Form Description  ( add upto 3 variations )</label>
                                                    <div id="FormDescription_1">
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control" id="form_desc_1_Input" name="form_desc[1]" placeholder="Form Description 1" required  minlength="3">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success"  onClick="show_next('#FormDescription_2', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="FormDescription_2" style="display: none">
                                                        <div class="input-group input-col my-3">
                                                            <input type="text" class="form-control" id="form_desc_2_Input" name="form_desc[2]" placeholder="Form Description 2"  minlength="3">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success"  onClick="show_next('#FormDescription_3', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="FormDescription_3" style="display: none">
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control" id="form_desc_3_Input" name="form_desc[3]" placeholder="Form Description 3"   minlength="3">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4 class="gray_title"> Add a few relevant creative (Optional)</h4>
                                                    <label class="col-form-label" >Youtube Video Url  ( add upto 3 variations )  </label>
                                                    <div id="Youtube_1">
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control" id="Youtube_URL_1_Input" name="youtube_1" placeholder="Youtube Video Url 1"  maxlength="255">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#Youtube_2', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="Youtube_2" style="display: none" >
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control my-3" id="Youtube_URL_2_Input" name="youtube_2" placeholder="Youtube Video Url 2"  maxlength="255">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#Youtube_3', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Youtube_3" style="display: none" >
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control" id="Youtube_URL_3_Input" name="youtube_3" placeholder="Youtube Video Url 3"  maxlength="255">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text">  </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <label class="col-form-label" >Upload upto 3 images (Optional)</label>
                                                    <div class="input-group input-col" id="upload_image_1">
                                                        <div class="input-col d-flex "  style="width: 88%;">
                                                            <div class="upload-box grey image">
                                                                <input type="file" name="image_1" id="image_1_Input" class="inputfile inputfile-1" accept="image/jpeg, image/png">
                                                                <label for="image_1_Input"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload image 1</span></label>
                                                            </div>
                                                            <div id="image_1_img_preview" class="img_preview_box">
                                                                <a href="#" class="text-danger del-preview"><i class="fas fa-times-circle"></i></a>
                                                                <img id="image_1_img" src="#" alt="image_1_img" />
                                                            </div>
                                                        </div>
                                                        <div class="input-group-append bg-none">
                                                            <div class="input-group-text"> <a href="#" class="text-success"  onClick="show_next('#upload_image_2', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                        </div>
                                                    </div>

                                                    <div class="input-group input-col" id="upload_image_2"  style="display: none">
                                                        <div class="input-col d-flex  flex-wrap"  style="width: 88%;">
                                                            <div class="upload-box grey image  my-2">
                                                                <input type="file" name="image_2" id="image_2_Input" class="inputfile inputfile-1" accept="image/jpeg, image/png">
                                                                <label for="image_2_Input"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload image 2</span></label>
                                                            </div>
                                                            <div id="image_2_img_preview" class="img_preview_box">
                                                                <a href="#" class="text-danger del-preview"><i class="fas fa-times-circle"></i></a>
                                                                <img id="image_2_img" src="#" alt="image_2_img" />
                                                            </div>
                                                        </div>
                                                        <div class="input-group-append bg-none">
                                                            <div class="input-group-text"> <a href="#" class="text-success"  onClick="show_next('#upload_image_3', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                        </div>
                                                    </div>

                                                    <div class="input-group input-col" id="upload_image_3" style="display: none">
                                                        <div class="input-col d-flex"  style="width: 88%;">
                                                            <div class="upload-box grey image">
                                                                <input type="file" name="image_3" id="image_3_Input" class="inputfile inputfile-1" accept="image/jpeg, image/png">
                                                                <label for="image_3_Input"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload image 3</span></label>
                                                            </div>
                                                            <div id="image_3_img_preview" class="img_preview_box">
                                                                <a href="#" class="text-danger del-preview"><i class="fas fa-times-circle"></i></a>
                                                                <img id="image_3_img" src="#" alt="image_3_img" style="display: none" />
                                                            </div>
                                                        </div>
                                                        <div class="input-group-append bg-none">
                                                            <div class="input-group-text">  </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="my-2">Leads Fileds Required</h5>
                                                        <div class="input-col">
                                                            <input type="text"  name="min_row_validation" style=" border: none; height: 1px;  padding: 0; display: block; opacity: 0;"  >
                                                        </div>
                                                        <table class="table table-bordered ">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" width="10px">#</th>
                                                                    <th scope="col" >Required</th>
                                                                    <th scope="col">Fileds</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="sortable" data-row='3'>
                                                                <tr class="sortable-group row_1 ">
                                                                    <td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>
                                                                        <input type="hidden" class="sort" name="field_1[sort]" value="1">
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" checked class="InputQuestion_Required" name="field_1[required]">
                                                                    </td>
                                                                    <td>
                                                                        {{-- <small class="type">Short Answer</small> --}}
                                                                        <input type="text" readonly class="small_info InputQuestionType" name="field_1[question_type]" value="ShortAnswer" required>
                                                                        <div class="input-group input-col">
                                                                            <input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_1[question_text]" value="Full Name" required="" maxlength="50">
                                                                            <div class="input-group-append bg-white">
                                                                                <div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>
                                                                                </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="sortable-group row_2">
                                                                    <td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>
                                                                        <input type="hidden" class="sort" name="field_2[sort]" value="2">
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" checked class="InputQuestion_Required" name="field_2[required]">
                                                                    </td>
                                                                    <td>
                                                                        {{-- <small class="type">Short Answer</small> --}}
                                                                        <input type="text" readonly class="small_info InputQuestionType" name="field_2[question_type]" value="ShortAnswer" required>
                                                                        <div class="input-group input-col">
                                                                            <input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_2[question_text]" value="Email id" required="" maxlength="50">
                                                                            <div class="input-group-append bg-white">
                                                                                <div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="sortable-group row_3">
                                                                    <td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>
                                                                        <input type="hidden" class="sort" name="field_3[sort]" value="3">
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" checked class="InputQuestion_Required" name="field_3[required]">
                                                                    </td>
                                                                    <td>
                                                                        {{-- <small class="type">Short Answer</small> --}}
                                                                        <input type="text" readonly class="small_info InputQuestionType" name="field_3[question_type]" value="ShortAnswer" required>
                                                                        <div class="input-group input-col">
                                                                            <input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_3[question_text]" value="Phone Number" required="" maxlength="50">
                                                                            <div class="input-group-append bg-white">
                                                                                <div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <div class="dropdown mt-3">
                                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                + Add question
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#" onclick="add_form_field('single')"> <i class="far fa-dot-circle icon-Aa"></i> Short Answer</a>
                                                                <a class="dropdown-item" href="#" onclick="add_form_field('multiple')"> <i class="far fa-dot-circle"></i> Multiple Choice</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  --}}

                            {{--  --}}
                            <div class="col" id="formPreview">
                                <div class="card border  mb-4">
                                    <div class="card-header gray"> Form Preview</div>
                                    <div class="card-body">
                                        <div id="formPreviewBLock">
                                            <div class="container">
                                                <div class="loading" style="text-align: center; padding: 15px; display: none;">Loading...</div>
                                                <form id="LeadForm" method="POST" action="#">
                                                    <div id="loadData">
                                                        <div class="video" id="preview_media"> </div>
                                                        <h2 id="preview_form_title" class="form-title"></h2>
                                                        <p  id="preview_form_sub_title"class="form-subtitle"> </p>
                                                        <div class="form-row" id="preview_filed_1"> </div>
                                                        <div class="form-row" id="preview_filed_2"> </div>
                                                        <div class="form-row" id="preview_filed_3"> </div>
                                                        <div class="form-row" id="preview_filed_4"> </div>
                                                        <div class="form-row" id="preview_filed_5"> </div>
                                                        <div class="form-row" id="preview_filed_6"> </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <button type="submit" id="saveData" class="form-btn" disabled>Submit</button>
                                                        <p class="policy">I agree to your privacy policy by submitting the form</p>
                                                        <p class="logo"><img src="https://leadspaid.com/assets/images/campaign_forms/logo.png" alt="">
                                                            <span> A1 Immigration Consultancy</span>
                                                        </p>
                                                    </div>
                                                </form>
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
                </div>
            </form>
        </div>
    </div>
    {{-- End Create campaign_create MODAL --}}
 @endsection
@push('breadcrumb-plugins')
    <button class="btn btn--primary create-campaign-btn"><i class="fas fa-plus"></i> Create Campaign</button>
@endpush
@push('script')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('assets/admin/js/vendor/datepicker.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendor/datepicker.en.js')}}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="{{asset('assets/admin/js/vendor/tagsinput/bootstrap-tagsinput.css')}}">
    <script src="{{asset('assets/admin/js/vendor/tagsinput/bootstrap-tagsinput.min.js')}}"></script>
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
        });

        var campaign_create_modal = $('#campaign_create_modal');
        campaign_create_modal.on('hidden.bs.modal', function (event) { reset_campaign_create_form(); })
        $('.create-campaign-btn').on('click', function () {
            campaign_create_modal.modal('show');
            $("#campaign_form").find("#submit").text('Create Campaign');
        });


        form_company_logo.onchange = evt => { const [file] = form_company_logo.files; if (file) {  company_logo_img.src = URL.createObjectURL(file);  company_logo_img.style.display = "block"; company_logo_preview.style.display = "block"; }}
        image_1_Input.onchange = evt => { const [file] = image_1_Input.files; if (file) {  image_1_img.src = URL.createObjectURL(file);  image_1_img.style.display = "block"; image_1_img_preview.style.display = "block"; updateformpreview();  }}
        image_2_Input.onchange = evt => { const [file] = image_2_Input.files; if (file) {  image_2_img.src = URL.createObjectURL(file);  image_2_img.style.display = "block"; image_2_img_preview.style.display = "block";  }}
        image_3_Input.onchange = evt => { const [file] = image_3_Input.files; if (file) {  image_3_img.src = URL.createObjectURL(file);  image_3_img.style.display = "block"; image_3_img_preview.style.display = "block";  }}
        $('.del-preview').on('click', function(){
            $(this).next('img').attr('src' , '');
            $(this).parent().hide();
            var upload_box = $(this).parent().prev('.upload-box');
            $('.inputfile', upload_box).val("");
            updateformpreview();
        });

        function show_next(id , event){
            $(id).show();
            event.target.style.display = 'none';
        }

        $('table').on('click', '.del-row', function(e){
            var table = $('#sortable');
            var row = table.attr('data-row');
            row = --row;
            table.attr('data-row', row);
            $(this).closest('tr').remove();
            update_field();
        })

        $('table').on('click', '.del-option', function(e){
            var options_block = $(this).parent().parent().parent();
            var options_section = options_block.parent();
            var btn_add_option = $('.btn-add-option', options_section );
            var option = btn_add_option.attr('data-option');
            btn_add_option.attr('data-option', --option);
            $(this).closest('.input-group.option').remove();

            update_options(options_section);
        })

        $('body').on('click', '.btn-add-option', function(e){
           // var options_block = $(this).closest('.options-section');
           var options_block = $(this).parent().prev();
           var options_section = options_block.parent();
           var row = $(this).attr('data-row');
            var option = $(this).attr('data-option');
            if(option <= 6){
            var name = 'field_'+row+'[option_'+option+']';
            var placeholder = "Option "+ option;
            var  html ='<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="'+placeholder+'" name="'+name+'"  maxlength="30"><div class="input-group-text"> <a href="#" class="text-danger del-option"><i class="fas fa-times-circle"></i></a></div></div>';
            $(options_block).append(html);
            update_options(options_section);
            }else{
                Toast('red', 'Only 6 Option Allowed') ;
            }

        });
        function update_options(options_section){
            var options_block =  $(options_section).find(".options-block");
            var btn_add_option = $('.btn-add-option',options_section);
            var row = btn_add_option.attr('data-row');
            var i = 1;
            $('.input-group.option', options_block).each(function (k, el) {
                $(el).find("input").attr('name', 'field_'+row+'[option_'+i+']').attr('placeholder', "Option "+ i );
                i++;
            });
            btn_add_option.attr('data-option', i);
            updateformpreview();
        }


        function update_field(){
            var i = 1;
            $('#sortable .sortable-group').each(function (k, el) {
                $(el).removeClass (function (index, className) { return (className.match (/(^|\s)row_\S+/g) || []).join(' ');  });
                $(el).addClass('row_'+i);
               // if(i <=3){
                    $(el).find(".InputQuestion_text").prop("required", true);
               // }else{
               //     $(el).find(".InputQuestion_text").prop("required", false).removeClass('is-invalid');
               // }
                $(el).find("input.sort").val(i).attr('name', 'field_' + i + '[sort]');
                $(el).find(".InputQuestionType").attr('name', 'field_' + i + '[question_type]');
                 $(el).find(".InputQuestion_Required").attr('name', 'field_' + i + '[required]');
                $(el).find(".InputQuestion_text").attr('name', 'field_' + i + '[question_text]');
                $(el).find(".btn-add-option").attr('data-row',  i);
                var options_section =  $(el).find(".options-section");
                update_options(options_section);
                i++;
            });
            updateformpreview();
        }

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
                html +='<input type="checkbox" checked class="InputQuestion_Required" name="field_'+row+'[required]">';
                html +='</td>';
                html +='<td>';
                if(type == 'multiple'){
                    html +='<input type="text" readonly class="small_info InputQuestionType" name="field_'+row+'[question_type]" value="MultipleChoice" required>';
                }else{
                    html +='<input type="text" readonly class="small_info InputQuestionType" name="field_'+row+'[question_type]" value="ShortAnswer" required>';
                }
                html +='<div class="input-group input-col">';
                html +='<input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_'+row+'[question_text]" required maxlength="50">';
                html +='<div class="input-group-append bg-white">';
                html +='<div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>';
                html +='</div>';
                html +='</div>';
                if(type == 'multiple'){
                    html +='<div class="options-section">';
                    html +='<div class="pl-5 options-block">';
                    html +='<div class="input-group option"><input type="text" class="form-control mt-3 mb-3" placeholder="Option 1" name="field_'+row+'[option_1]" required maxlength="30"><div class="input-group-text ">  </div></div>';
                    html +='<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="Option 2" name="field_'+row+'[option_2]" required  maxlength="30"><div class="input-group-text">  </div></div>';
                    html +='<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="Option 3" name="field_'+row+'[option_3]" required  maxlength="30"><div class="input-group-text"> <a href="#" class="text-danger del-option"><i class="fas fa-times-circle"></i></a></div></div>';
                    html +='<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="Option 4" name="field_'+row+'[option_4]"  maxlength="30"><div class="input-group-text"> <a href="#" class="text-danger del-option"><i class="fas fa-times-circle"></i></a></div></div>';
                    html +='</div>';
                    html +='<div class="pl-5"><a class="btn-add-option btn"  data-row="'+row+'" data-option="5">+ Add Option</a></div>';
                    html +='</div>';

                }
                html +='</td>';
                html +='</tr>';
                table.append(html).attr('data-row', row);
                update_field();
                updateformpreview();
            }else{
                Toast('red', "Only 5 fields allowed");
            }
        }

        function reset_campaign_create_form() {
            $('#campaign_createModalLabel').html('Create Campaign');
            $('#campaign_create_modal form').trigger("reset");
        }

        $(document).ready(function () {
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
            $("#sortable").sortable({
                handle: ".handle",
                stop: function (event, ui) {
                    update_field();
                }
            });
        });
        // Edit campaign

        $('#DailyBudgetInput').keyup(function(){ this.value = this.value.replace(/[^0-9]/g, ""); });
        $('#TargetCostInput').keyup(function(){ this.value =this.value.match(/^\d+\.?\d{0,2}/); });

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

        $.validator.addMethod(
            "money",
            function(value, element) {
                var isValidMoney = /^\d{0,4}(\.\d{0,2})?$/.test(value);
                return this.optional(element) || isValidMoney;
            },
            "Enter Correct value. "
        );

        $.validator.addMethod(
            "check_row",
            function(value, element) {
                 if( $('#sortable .sortable-group').length >= 3 ){
                    return true;
                }else{
                    return false;
                }
            },
            "Minimum 3 fileds are requried"
        );


        $("#campaign_form").validate({
            rules: {
                name: { minlength: 3 },
                min_row_validation:{  check_row: true },
                daily_budget: { required: true, money: true,min: 50,max: 1000 },
                target_cost: { required: false, money: true,min: 10,max: 1000 },
                website_url: { minlength: 7 },
                company_logo: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
                image_1: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
                image_2: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 },
                image_3: { extension: "png|jpg|jpeg|gif", maxsize:2e+6 }

            },messages: {
                daily_budget:  { required : 'Daily Budget is required.', min:'Daily Budget should be minimum $50', max: 'Daily Budget should not be greater than $1000'} ,
                target_cost:  { required : 'Target Cost is required.', min:'Target Cost should be minimum $10', max: 'Target Cost should not be greater than $1000'} ,
                service_sell_buy:'Please fill Product / Service you Sell or Buy in this Campaign -  or leave it blank',
                website_url: 'Please fill Website URL - or leave it blank',
                company_logo: "File must be JPG, GIF or PNG, less than 2MB",
                image_1: "File must be JPG, GIF or PNG, less than 2MB",
                image_2: "File must be JPG, GIF or PNG, less than 2MB",
                image_3: "File must be JPG, GIF or PNG, less than 2MB",
            }
        });
    </script>

    <script>

        function updateformpreview() {

            var youtube_1 = $('#Youtube_URL_1_Input').val();
            var youtube_2 = $('#Youtube_URL_2_Input').val();
            var youtube_4 = $('#Youtube_URL_3_Input').val();
            var image_1_img = $('#image_1_img').attr('src');
            var image_2_img = $('#image_2_img').attr('src');
            var image_3_img = $('#image_3_img').attr('src');
            var title_1 = $('#FormTitleInput_1').val();
            var title_2 = $('#FormTitleInput_2').val();
            var title_3 = $('#FormTitleInput_3').val();
            var sub_title_1 = $('#form_desc_1_Input').val();
            var sub_title_2 = $('#form_desc_2_Input').val();
            var sub_title_3 = $('#form_desc_3_Input').val();
            $('#preview_form_title').html(title_1);
            $('#preview_form_sub_title').html(sub_title_1);
            if(youtube_1){
                const videoId = getVideoId(youtube_1);
                const iframeMarkup = '<iframe src="https://www.youtube.com/embed/' + videoId + '" frameborder="0" width="100%" allowfullscreen></iframe>';
                $('#preview_media').html('<div class="video">'+ iframeMarkup +'</div>');
            }else if(image_1_img !== '#'){
                $('#preview_media').html('<div class="video image"><img src="'+ image_1_img +'" alt="" width="100%" /></div>');
            }
            for ($i = 1; $i < 6; $i++){
                question_type =  $('input[name="field_'+$i+'[question_type]"]').val();
                question_text =  $('input[name="field_'+$i+'[question_text]"]').val();
                question_required      =  $('input[name="field_'+$i+'[required]"]').prop('checked')?'*':'';
                t ='';
                if(question_type === 'MultipleChoice'){
                    t +='<select class="form-select" id="Input_field_'+$i+'"';
                    t +='>';
                        if(question_text){  t +='<option selected value="" class="holder"> '+question_text+ question_required +' </option>'; }
                        for ($j = 1; $j < 7; $j++){ op =  $('input[name="field_'+$i+'[option_'+$j+']"]').val();  if(op){ t +='<option value="'+ op+'">'+ op+'</option>'; } }
                        t +='</select>';
                }else if(question_type === 'ShortAnswer'){
                    t +='<input type="text" class="form-control" id="Input_field_'+$i+'" placeholder="'+question_text+ question_required +'" ';
                    t +='>';
                }
                if(t!==''){ $('#preview_filed_'+$i).html(t); }else{ $('#preview_filed_'+$i).html(t); }
            }
        }
        updateformpreview();
        $('.PageFormStyle').on('input', function() { updateformpreview(); });

    function getVideoId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url?.match(regExp);
        return (match && match[2].length === 11)?match[2]:null;
    }

    function getUrlParams(urlOrQueryString) {
        if ((i = urlOrQueryString.indexOf('?')) >= 0) {
            const queryString = urlOrQueryString.substring(i+1);
            if (queryString) {
            return _mapUrlParams(queryString);
            }
        }
        return {};
    }

    function _mapUrlParams(queryString) {
    return queryString
        .split('&')
        .map(function(keyValueString) { return keyValueString.split('=') })
        .reduce(function(urlParams, [key, value]) {
        if (Number.isInteger(parseInt(value)) && parseInt(value) == value) {
            urlParams[key] = parseInt(value);
        } else {
            urlParams[key] = decodeURI(value);
        }
        return urlParams;
        }, {});
    }

    </script>
@endpush
@push('style')

<style>

    .icon-Aa{
        background-image: url("data:image/svg+xml,%3Csvg id='Layer_1' data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 50 50'%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill:%23231f20;%7D%3C/style%3E%3C/defs%3E%3Cpath class='cls-1' d='M8.58,31.22l-3.64,11H.25L12.17,7.17h5.47l12,35.09H24.77L21,31.22Zm11.51-3.54-3.44-10.1c-.78-2.29-1.3-4.37-1.82-6.4h-.11c-.52,2.08-1.09,4.22-1.77,6.35L9.52,27.68Z'/%3E%3Cpath class='cls-1' d='M49.33,36.22a34.76,34.76,0,0,0,.42,6H45.58l-.36-3.18h-.16a9.37,9.37,0,0,1-7.7,3.75c-5.1,0-7.71-3.59-7.71-7.24,0-6.09,5.42-9.42,15.15-9.37V25.7c0-2.08-.57-5.83-5.73-5.83a12.49,12.49,0,0,0-6.55,1.88l-1.05-3a15.62,15.62,0,0,1,8.28-2.24c7.71,0,9.58,5.26,9.58,10.31ZM44.9,29.4c-5-.11-10.67.78-10.67,5.67a4.05,4.05,0,0,0,4.32,4.37,6.28,6.28,0,0,0,6.1-4.21,5,5,0,0,0,.25-1.46Z'/%3E%3C/svg%3E");
    }
    .icon-Aa:before {  opacity: 0; }
    .gray_title{  background: #c3c3c3; padding: 10px;  color: #707070;  margin: 15px -14px 0px -15px; }
    .gray_title.top{  margin-top: -8px; }
    .btn--primary {  background-color: #1361b2 !important; }
    .btn--primary:hover {  background-color: #093463 !important; }
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
#campaign_list_wrapper .dataTables_filter input {
    border-radius: 0!important;
}

.page-wrapper.default-version, table td, tfoot tr { font-weight: normal;  font-family: Poppins; }
#campaign_list_wrapper{  overflow-x: scroll; }

    .img_preview_box{ position: relative; display: none;}
    .img_preview_box .del-preview{ position: absolute; right: 0;  top: -8px; background: #fff;  display: inline-block; padding: 0;  border-radius: 20px; }
    .img_preview_box .del-preview i { display: block;}
    #company_logo_img, #image_1_img, #image_2_img, #image_3_img{  height: 54px; width: auto;  max-width: 160px;   padding: 0 5px;  }

    .bg-ddd { background-color: #ddd!important; }
    .invalid-feedback { font-size: 90%!important;  }
    .input-col .invalid-feedback{ width: 100%; }
    #campaign_create_modal .campaign_create_close{ position: absolute; top: 0; left: -30px; width: 30px; height: 30px; background: #fff; opacity: 1; cursor: pointer; }

    #campaign_create_modal .PageFormStyle .form-control, #campaign_create_modal .PageFormStyle .custom-select{
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
        max-width: 100%;
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

    #campaign_create_modal .upload-box.grey .inputfile-1 + label { background-color: #535353; color: #fff!important; width: 100% }
    #campaign_create_modal .upload-box.grey .inputfile-1 + label:hover { background-color: #000; color: #fff!important; }
    #campaign_create_modal .upload-box.grey.image{ min-width: 213px;}
    #campaign_create_modal .input-group .input-col.d-flex { flex: 1 0 0;}

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
    .input-group.option .input-group-text{ background-color: transparent!important; border: 0px!important; padding: 0 0 0 9px;     font-size: 1.4rem;  }
    .bg-none{ background-color: transparent!important;  }
    .input-group-append.bg-none .input-group-text{  background-color: transparent!important;  border: none!important; font-size: 1.4rem;  }
    #campaign_create_modal  .input-group-text {  width: 35px; }
    #formPreview{
        width: 370px;
        max-width: 370px;
    }
    </style>
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
        tr.sortable-group td:nth-child(2){ text-align: center!important; }
        tr.sortable-group .input-group-text{ width: 35px; }
        /* tr.sortable-group.row_1 .del-row, tr.sortable-group.row_2 .del-row{ display: none!important; } */
        tr.sortable-group .small_info { float: right; padding:0 35px 0 0; border: 0; text-align: right;  cursor:unset;   }
        tr.sortable-group .small_info:focus {  box-shadow: none; }

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
        .modal-header .error.invalid-feedback,
        .bg-primary .error.invalid-feedback
        { color: #ff9e9e!important; font-size: 13px!important; }
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
    <link rel="stylesheet" href="{{asset('/assets/templates/leadpaid/css/campaign_iframe_preview.css')}}">
@endpush
