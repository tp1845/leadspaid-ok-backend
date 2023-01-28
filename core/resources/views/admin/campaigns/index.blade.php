@extends('admin.layouts.app')
@section('panel')
<div class="row" id="apporved_list">
    <div class="col-lg-12">
        <div class=" ">
            <div class="custom-table-data">




                <ul class="nav nav-tabs border-0" role="tablist" id="myTab">
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary active" href="#apporved" role="tab" data-toggle="tab">Apporved</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#pendingapproved" role="tab" data-toggle="tab">Pending Approval</a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#reject" role="tab" data-toggle="tab">Reject</a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#allcampigns" role="tab" data-toggle="tab">All Campaigns</a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#trash" role="tab" data-toggle="tab"><i class="fa-solid fa-trash-can"></i></a>
                    </li>

                </ul>


                <!-- Tab panes 1 -->
                <div class="tab-content mt-3">
                    <div role="tabpanel" class="tab-pane active" id="apporved">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="apporveddata">
                                <thead>
                                    <tr>
                                        <th>Off/On</th>
                                        <th>Campaign Name</th>
                                        <th>C.Id</th>
                                        <th>Advertiser</th>
                                        <th>A.Id</th>
                                        <th>Approve</th>
                                        <th>Rejection Remarks</th>
                                        <th>Creation Date</th>
                                        <th>Target Country</th>
                                        <th>Daily Budget</th>
                                        <th>Target CPL</th>
                                        <th>Form Used</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Cost</th>
                                        <th>Leads</th>
                                        <th>CPL</th>
                                        <th>Upload Leads</th>
                                        <th>Spend</th>
                                        <th>Targeting Placements</th>
                                        <th>Keywords </th>
                                        <th>Service </th>
                                        <th>Website URL</th>
                                        <th>Social Media</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($active))
                                    @foreach($active as $campaign)
                                    <tr>
                                        <td> @if($campaign->status==1) <span class="badge badge-pill badge-success">ON</span> @elseif(empty($campaign->status)) <span class="badge badge-pill badge-danger">OFF</span> @endif </td>
                                        <td>{{ $campaign->name }} </td>

                                        <td>{{ $campaign->id }} </td>
                                        <td>{{ $campaign->advertiser->name}} </td>
                                        <td>{{ $campaign->advertiser->id}} </td>


                                        <td>
                                            <div class="wrapper wrapper_span">
                                                <input type="range" name="points" min="0" step="1" id="custom-toggle" class="@if($campaign->approve==0) tgl-def @elseif($campaign->approve==1) tgl-on @elseif($campaign->approve==2) tgl-off @endif custom-toggle" max="2" value="{{ $campaign->approve }}" data-size="small" data-onstyle="success" data-style="ios" data-id="{{$campaign->id}}">
                                                <span>@if($campaign->approve==0) Pending @elseif($campaign->approve==1) Approve @elseif($campaign->approve==2) Rejected @endif </span>
                                            </div>
                                            <!--input type="checkbox" name="approve" @if($campaign->approve) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-approve" data-id="{{$campaign->id}}" -->
                                        </td>
                                        <td>{{ $campaign->rejection_remarks }}</td>
                                        <td>{{$campaign->created_at->format('Y-m-d H:i ')}}</td>
                                        <td>{{ $campaign->target_country }}</td>
                                        <td>${{ $campaign->daily_budget }}</td>
                                        <td>${{ $campaign->target_cost }}</td>
                                        <td>
                                            @if (isset($campaign->campaign_forms))
                                            <a href="#" class="btn_form_preview" data-id="{{$campaign->id}}" data-name="{{$campaign->campaign_forms->form_name}}"> {{$campaign->campaign_forms->form_name}} </a> @endif
                                        </td>
                                        <td>{{ $campaign->start_date }}</td>
                                        <td>{{ $campaign->end_date }}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>
                                            <form id="upload_form_{{$campaign->id}}" data-type="leads" class="uploadform" action="{{ route('admin.leads.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.leads.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-primary up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-success up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td class="spend_col">
                                            <form id="upload_spends_form_{{$campaign->id}}" data-type="spends" class="uploadform" action="{{ route('admin.campaigns.lgenspend.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.campaigns.lgenspend.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-light-red up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-danger up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_spends_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td> @if($campaign->target_placements)
                                            @foreach($campaign->target_placements as $target_placements)
                                            {{$target_placements}} ,
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $campaign->keywords }}</td>
                                        <td>{{ $campaign->service_sell_buy }}</td>
                                        <td>{{ $campaign->website_url }}</td>
                                        <td>{{ $campaign->social_media_page }}</td>
                                        <td>
                                            <a href="{{ route('admin.campaigns.delete',['id'=>$campaign->id])}}?tab=active" class="my_ttoltip" data-toggle="tooltip" title="Ban" data-original-title="Ban">
                                                <i class="fa-regular fa-circle-xmark"></i>

                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <!-- Tab panes 2 -->
                    <div role="tabpanel" class="tab-pane" id="pendingapproved">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="pendingdata">
                                <thead>
                                    <tr>
                                        <th>Off/On</th>
                                        <th>Campaign Name</th>
                                        <th>C.Id</th>
                                        <th>Advertiser</th>
                                        <th>A.Id</th>


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
                                        <th>CPL</th>
                                        <th>Upload Leads</th>
                                        <th>Spend</th>
                                        <th>Targeting Placements</th>
                                        <th>Keywords </th>
                                        <th>Service </th>
                                        <th>Website URL</th>
                                        <th>Social Media</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($pending))
                                    @foreach($pending as $campaign)
                                    <tr>
                                        <td> @if($campaign->status==1) <span class="badge badge-pill badge-success">ON</span> @elseif(empty($campaign->status)) <span class="badge badge-pill badge-danger">OFF</span> @endif </td>
                                        <td>{{ $campaign->name }} </td>
                                        <td>{{ $campaign->id }} </td>
                                        <td>{{ $campaign->advertiser->name}} </td>
                                        <td>{{ $campaign->advertiser->id}} </td>


                                        <td>

                                            <div class="wrapper">
                                                <input type="range" name="points" min="0" step="1" id="custom-toggle" class="@if($campaign->approve==0) tgl-def @elseif($campaign->approve==1) tgl-on @elseif($campaign->approve==2) tgl-off @endif custom-toggle" max="2" value="{{ $campaign->approve }}" data-size="small" data-onstyle="success" data-style="ios" data-id="{{$campaign->id}}">
                                                <span>@if($campaign->approve==0) Pending @elseif($campaign->approve==1) Approve @elseif($campaign->approve==2) Rejected @endif </span>
                                            </div>
                                            <!--input type="checkbox" name="approve" @if($campaign->approve) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-approve" data-id="{{$campaign->id}}" -->
                                        </td>
                                        <td>{{$campaign->created_at->format('Y-m-d H:i ')}}</td>
                                        <td>{{ $campaign->target_country }}</td>
                                        <td>${{ $campaign->daily_budget }}</td>
                                        <td>${{ $campaign->target_cost }}</td>
                                        <td>
                                            @if (isset($campaign->campaign_forms))
                                            <a href="#" class="btn_form_preview" data-id="{{$campaign->id}}" data-name="{{$campaign->campaign_forms->form_name}}"> {{$campaign->campaign_forms->form_name}} </a> @endif
                                        </td>
                                        <td>{{ $campaign->start_date }}</td>
                                        <td>{{ $campaign->end_date }}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>
                                            <form id="upload_form_{{$campaign->id}}" data-type="leads" class="uploadform" action="{{ route('admin.leads.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.leads.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-primary up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-success up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td class="spend_col">
                                            <form id="upload_spends_form_{{$campaign->id}}" data-type="spends" class="uploadform" action="{{ route('admin.campaigns.lgenspend.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.campaigns.lgenspend.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-light-red up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-danger up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_spends_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td> @if($campaign->target_placements)
                                            @foreach($campaign->target_placements as $target_placements)
                                            {{$target_placements}} ,
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $campaign->keywords }}</td>
                                        <td>{{ $campaign->service_sell_buy }}</td>
                                        <td>{{ $campaign->website_url }}</td>
                                        <td>{{ $campaign->social_media_page }}</td>
                                        <td>
                                            <a href="{{ route('admin.campaigns.delete',['id'=>$campaign->id])}}?tab=pending" class="" data-toggle="tooltip" title="" data-original-title="Ban">
                                                <i class="fa-regular fa-circle-xmark"></i>

                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>

                    <!-- Tab panes 3 -->
                    <div role="tabpanel" class="tab-pane" id="reject">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="rejectdata">
                                <thead>
                                    <tr>
                                        <th>Off/On</th>
                                        <th>Campaign Name</th>
                                        <th>C.Id</th>
                                        <th>Advertiser</th>
                                        <th>A.Id</th>


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
                                        <th>CPL</th>
                                        <th>Upload Leads</th>
                                        <th>Spend</th>
                                        <th>Targeting Placements</th>
                                        <th>Keywords </th>
                                        <th>Service </th>
                                        <th>Website URL</th>
                                        <th>Social Media</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($reject))
                                    @foreach($reject as $campaign)
                                    <tr>
                                        <td> @if($campaign->status==1) <span class="badge badge-pill badge-success">ON</span> @elseif(empty($campaign->status)) <span class="badge badge-pill badge-danger">OFF</span> @endif</td>
                                        <td>{{ $campaign->name }} </td>
                                        <td>{{ $campaign->id }} </td>
                                        <td>{{ $campaign->advertiser->name}} </td>
                                        <td>{{ $campaign->advertiser->id}} </td>


                                        <td>

                                            <div class="wrapper">
                                                <input type="range" name="points" min="0" step="1" id="custom-toggle" class="@if($campaign->approve==0) tgl-def @elseif($campaign->approve==1) tgl-on @elseif($campaign->approve==2) tgl-off @endif custom-toggle" max="2" value="{{ $campaign->approve }}" data-size="small" data-onstyle="success" data-style="ios" data-id="{{$campaign->id}}">
                                                <span>@if($campaign->approve==0) Pending @elseif($campaign->approve==1) Approve @elseif($campaign->approve==2) Rejected @endif </span>
                                            </div>
                                            <!--input type="checkbox" name="approve" @if($campaign->approve) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-approve" data-id="{{$campaign->id}}" -->
                                        </td>
                                        <td>{{$campaign->created_at->format('Y-m-d H:i ')}}</td>
                                        <td>{{ $campaign->target_country }}</td>
                                        <td>${{ $campaign->daily_budget }}</td>
                                        <td>${{ $campaign->target_cost }}</td>
                                        <td>
                                            @if (isset($campaign->campaign_forms))
                                            <a href="#" class="btn_form_preview" data-id="{{$campaign->id}}" data-name="{{$campaign->campaign_forms->form_name}}"> {{$campaign->campaign_forms->form_name}} </a> @endif
                                        </td>
                                        <td>{{ $campaign->start_date }}</td>
                                        <td>{{ $campaign->end_date }}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>
                                            <form id="upload_form_{{$campaign->id}}" data-type="leads" class="uploadform" action="{{ route('admin.leads.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.leads.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-primary up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-success up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td class="spend_col">
                                            <form id="upload_spends_form_{{$campaign->id}}" data-type="spends" class="uploadform" action="{{ route('admin.campaigns.lgenspend.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.campaigns.lgenspend.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-light-red up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-danger up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_spends_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td> @if($campaign->target_placements)
                                            @foreach($campaign->target_placements as $target_placements)
                                            {{$target_placements}} ,
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $campaign->keywords }}</td>
                                        <td>{{ $campaign->service_sell_buy }}</td>
                                        <td>{{ $campaign->website_url }}</td>
                                        <td>{{ $campaign->social_media_page }}</td>
                                        <td>
                                            <a href="{{ route('admin.campaigns.delete',['id'=>$campaign->id])}}?tab=reject" class="" data-toggle="tooltip" title="" data-original-title="Ban">
                                                <i class="fa-regular fa-circle-xmark"></i>

                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>

                    <!-- Tab panes 4 -->
                    <div role="tabpanel" class="tab-pane" id="allcampigns">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table-striped table-bordered datatable " style="width:100%" id="datatable7">
                                <thead>
                                    <tr>
                                        <th>Off/On</th>
                                        <th>Campaign Name</th>
                                        <th>C.Id</th>
                                        <th>Advertiser</th>
                                        <th>A.Id</th>


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
                                        <th>CPL</th>
                                        <th>Upload Leads</th>
                                        <th>Spend</th>
                                        <th>Targeting Placements</th>
                                        <th>Keywords </th>
                                        <th>Service </th>
                                        <th>Website URL</th>
                                        <th>Social Media</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($campaigns))
                                    @foreach($campaigns as $campaign)
                                    <tr>
                                        <td> @if($campaign->status==1) <span class="badge badge-pill badge-success">ON</span> @elseif(empty($campaign->status)) <span class="badge badge-pill badge-danger">OFF</span> @endif </td>
                                        <td>{{ $campaign->name }} </td>
                                        <td>{{ $campaign->id }} </td>
                                        <td>{{ $campaign->advertiser->name}} </td>
                                        <td>{{ $campaign->advertiser->id}} </td>


                                        <td>

                                            <div class="wrapper">

                                                <input type="range" name="points" min="0" step="1" id="custom-toggle" class="@if($campaign->approve==0) tgl-def @elseif($campaign->approve==1) tgl-on @elseif($campaign->approve==2) tgl-off @endif custom-toggle" max="2" value="{{ $campaign->approve }}" data-size="small" data-onstyle="success" data-style="ios" data-id="{{$campaign->id}}">
                                                <span>@if($campaign->approve==0) Pending @elseif($campaign->approve==1) Approve @elseif($campaign->approve==2) Rejected @endif </span>

                                            </div>

                                            <!--input type="checkbox" name="approve" @if($campaign->approve) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-approve" data-id="{{$campaign->id}}"-->
                                        </td>
                                        <td>{{$campaign->created_at->format('Y-m-d H:i ')}}</td>
                                        <td>{{ $campaign->target_country }}</td>
                                        <td>${{ $campaign->daily_budget }}</td>
                                        <td>${{ $campaign->target_cost }}</td>
                                        <td>
                                            @if (isset($campaign->campaign_forms))
                                            <a href="#" class="btn_form_preview" data-id="{{$campaign->id}}" data-name="{{$campaign->campaign_forms->form_name}}"> {{$campaign->campaign_forms->form_name}} </a> @endif
                                        </td>
                                        <td>{{ $campaign->start_date }}</td>
                                        <td>{{ $campaign->end_date }}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>
                                            <form id="upload_form_{{$campaign->id}}" data-type="leads" class="uploadform" action="{{ route('admin.leads.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.leads.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-primary up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-success up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td class="spend_col">
                                            <form id="upload_spends_form_{{$campaign->id}}" data-type="spends" class="uploadform" action="{{ route('admin.campaigns.lgenspend.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.campaigns.lgenspend.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-light-red up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-danger up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_spends_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td> @if($campaign->target_placements)
                                            @foreach($campaign->target_placements as $target_placements)
                                            {{$target_placements}} ,
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $campaign->keywords }}</td>
                                        <td>{{ $campaign->service_sell_buy }}</td>
                                        <td>{{ $campaign->website_url }}</td>
                                        <td>{{ $campaign->social_media_page }}</td>
                                        <td>
                                            <a href="{{ route('admin.campaigns.delete',['id'=>$campaign->id])}}?tab=allcampigns" class="" data-toggle="tooltip" title="" data-original-title="Ban">
                                                <i class="fa-regular fa-circle-xmark"></i>

                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>


                    <!-- Tab panes 5 -->
                    <div role="tabpanel" class="tab-pane" id="trash" class="trash-color">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="trashdata">
                                <thead>
                                    <tr>
                                        <th>Off/On</th>
                                        <th>Campaign Name</th>
                                        <th>C.Id</th>
                                        <th>Advertiser</th>
                                        <th>A.Id</th>


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
                                        <th>CPL</th>
                                        <th>Upload Leads</th>
                                        <th>Spend</th>
                                        <th>Targeting Placements</th>
                                        <th>Keywords </th>
                                        <th>Service </th>
                                        <th>Website URL</th>
                                        <th>Social Media</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($trash))
                                    @foreach($trash as $campaign)
                                    <tr>
                                        <td> @if($campaign->status==2) <span class="badge badge-pill badge-danger">Delete</span>@elseif($campaign->status==1) <span class="badge badge-pill badge-success">ON</span> @else <span class="badge badge-pill badge-danger">OFF</span> @endif </td>
                                        <td>{{ $campaign->name }} </td>
                                        <td>{{ $campaign->id }} </td>
                                        <td>{{ $campaign->advertiser->name}} </td>
                                        <td>{{ $campaign->advertiser->id}} </td>


                                        <td>

                                            <div class="wrapper">
                                                <input type="range" name="points" min="0" step="1" id="custom-toggle" class="@if($campaign->approve==0) tgl-def @elseif($campaign->approve==1) tgl-on @elseif($campaign->approve==2) tgl-off @endif custom-toggle" max="2" value="{{ $campaign->approve }}" data-size="small" data-onstyle="success" data-style="ios" data-id="{{$campaign->id}}">
                                                <span>@if($campaign->approve==0) Pending @elseif($campaign->approve==1) Approve @elseif($campaign->approve==2) Rejected @endif </span>
                                            </div>
                                            <!--input type="checkbox" name="approve" @if($campaign->approve) checked @endif  data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-approve" data-id="{{$campaign->id}}" -->
                                        </td>
                                        <td>{{$campaign->created_at->format('Y-m-d H:i ')}}</td>
                                        <td>{{ $campaign->target_country }}</td>
                                        <td>${{ $campaign->daily_budget }}</td>
                                        <td>${{ $campaign->target_cost }}</td>
                                        <td>
                                            @if (isset($campaign->campaign_forms))
                                            <a href="#" class="btn_form_preview" data-id="{{$campaign->id}}" data-name="{{$campaign->campaign_forms->form_name}}"> {{$campaign->campaign_forms->form_name}} </a> @endif
                                        </td>
                                        <td>{{ $campaign->start_date }}</td>
                                        <td>{{ $campaign->end_date }}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>
                                            <form id="upload_form_{{$campaign->id}}" data-type="leads" class="uploadform" action="{{ route('admin.leads.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.leads.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-primary up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-success up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td class="spend_col">
                                            <form id="upload_spends_form_{{$campaign->id}}" data-type="spends" class="uploadform" action="{{ route('admin.campaigns.lgenspend.import',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <a href="{{ route('admin.campaigns.lgenspend.export',['cid'=> $campaign->id,'aid'=> $campaign->advertiser_id, 'fid'=>$campaign->form_id]  ) }}" class="text-light-red up-down-btn"><i class="fa fas fa-arrow-alt-circle-down"></i></a>
                                                <div class="upload-btn-wrapper">
                                                    <button class="text-danger up-down-btn"><i class="fa fas fa-arrow-alt-circle-up"></i></button>
                                                    <input data-form="upload_spends_form_{{$campaign->id}}" type="file" name="file" required />
                                                </div>
                                            </form>
                                        </td>
                                        <td> @if($campaign->target_placements)
                                            @foreach($campaign->target_placements as $target_placements)
                                            {{$target_placements}} ,
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $campaign->keywords }}</td>
                                        <td>{{ $campaign->service_sell_buy }}</td>
                                        <td>{{ $campaign->website_url }}</td>
                                        <td>{{ $campaign->social_media_page }}</td>
                                        <td>
                                            <a href="{{ route('admin.campaigns.restore',['id'=>$campaign->id])}}" class="" data-toggle="tooltip" title="" data-original-title="Re-Store">
                                                <img src="{{url('/')}}/assets/images/icon/add-button.png" style="width:20px;margin:0 auto;">
                                            </a>
                                            <a href="{{ route('admin.campaigns.complete.delete',['id'=>$campaign->id]) }}?tab=trash" onclick="return confirm('Do you want parmenent delete the campaign ?')" class="trashIocn" data-toggle="tooltip" title="" data-original-title="Delete">
                                                <i class="fa-regular fa-circle-xmark"></i>

                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                </div>
                <div class="table-responsive--md  table-responsive">

                </div>
            </div><!-- card end -->
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
                    <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <div id="error-message"> </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @push('style')
    <style>
        .breadcrumb-plugins {
            display: none;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .wrapper {
            width: 100px;
            height: 50%;
            display: grid;
            justify-content: center;
            padding: 20px 0;
        }

        #custom-toggle {
            -webkit-appearance: none;
            appearance: none;
            height: 20px;
            width: 40px;
            background-color: #333;
            -webkit-border-radius: 25px;
            border-radius: 25px;
            padding: 0;
            margin: 0;
            cursor: pointer;
        }

        #custom-toggle.tgl-def::-webkit-slider-thumb {
            background-color: orange;
        }

        #custom-toggle.tgl-on::-webkit-slider-thumb {
            background-color: green;
        }

        #custom-toggle.tgl-off::-webkit-slider-thumb {
            background-color: red;
        }

        #custom-toggle::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            -webkit-border-radius: 25px;
            border-radius: 25px;
        }

        #custom-toggle:focus {
            outline: none;
        }

        .wrapper_span span {
            font-size: 8px !important;
        }

        .rangeActive {
            background-color: green;
        }

        #apporved_list table tbody tr td:last-child {
            text-align: center !important;
        }

        #trash .trashIocn i {
            color: red;
            border-radius: 100%;
        }

        table.dataTable thead tr {
            background-color: #1A273A;
        }

        table.dataTable thead tr th {
            border-right: 1px solid #ffffff36;
            font-size: 17px;
            /*    padding: 12px 10px;*/
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



        .pagination .page-item .page-link,
        .pagination .page-item span,

        #campaign_list_wrapper .dataTables_paginate .pagination .page-item .page-link,
        #campaign_list_wrapper .dataTables_length select,
        #campaign_list_wrapper .dataTables_filter input {
            border-radius: 0 !important;
        }

        .btn-success {
            background-color: #11b6f3 !important;
        }

        .table th {
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

        .toggle.ios,
        .toggle-on.ios,
        .toggle-off.ios {
            border-radius: 20px;
        }

        .toggle.ios .toggle-handle {
            border-radius: 20px;
        }

        .toggle input[data-size="small"]~.toggle-group label {
            text-indent: -999px;
        }

        .toggle.btn .toggle-handle {
            left: -9px;
            top: -2px;
        }

        .toggle.btn.off .toggle-handle {
            left: 9px;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline;
        }

        .btn {
            cursor: pointer;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }

        .up-down-btn {
            font-size: 28px;
            background: transparent;
            border: 0;
            padding: 0
        }

        .text-light-red {
            color: #ff7481 !important
        }

        #apporved_list ul.nav.nav-tabs {
            top: 30px;
            z-index: 1;
            left: 10px;
        }

        #apporved_list .dataTables_filter span {
            display: none;
        }

        .paging_simple_numbers .paginate_button.next:after,
        .paging_simple_numbers .paginate_button.previous:after {
            display: none;
        }

        .paging_simple_numbers .paginate_button {
            border: none;
        }

        .toggle.btn {
            width: 27px !important;
            height: 20px !important;
        }

        [data-original-title="Ban"],
        [data-original-title="Delete"] {
            vertical-align: middle;
            font-size: 21px;
        }

        [data-original-title="Ban"] i,
        [data-original-title="Delete"] i {
            font-size: 21px;
        }
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#apporved_list ul.nav.nav-tabs').addClass("position-absolute")
        $('#datatable7, #pendingdata, #apporveddata,#rejectdata,#trashdata').DataTable({

            "sDom": 'Lfrtlip',
            "language": {
                "lengthMenu": "Show rows  _MENU_",
                search: "",
                searchPlaceholder: "Search"
            }

        });
        'use strict';
        var leads_preview_modal = $('#leads_preview_modal');
        var form_preview_modal = $('#form_preview_modal');
        $('.btn_form_preview').on('click', function() {
            var id = $(this).data('id');
            var iframe_html = '<iframe id="leadpaidform_1" src="https://leadspaid.com/campaign_form/1/1/' + id + '" referrerpolicy="unsafe-url" sandbox="allow-top-navigation allow-scripts allow-forms  allow-same-origin allow-popups-to-escape-sandbox" width="100%" height="600" style="border: 1px solid black;"></iframe>';
            $('#form_preview_html').html(iframe_html);
            form_preview_modal.modal('show');
        });



        $(document).on("change", ".toggle-approve", function(e) {
            var approval = $(this).prop('checked') == true ? 1 : 0;
            var campaign_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{route('admin.campaigns.approval')}}",
                //url: "/admin/campaigns/approval",
                data: {
                    'approval': approval,
                    'campaign_id': campaign_id
                },
                success: function(data) {
                    if (data.success) {
                        Toast('green', data.message);
                    } else {
                        Toast('red', data.message);
                    }
                }
            });
        });
        $(document).on("change", "input[type=file]", function(e) {
            var data_form = $(this).attr('data-form');
            var form_id = '#' + data_form;
            var form = $(form_id);
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
                success: function(data) {
                    if (data.success) {
                        $('#saveLeadsData').attr('data-form', data_form);
                        if (datatype == "leads") {
                            previewData(data.data);
                        } else {
                            previewSpendData(data.data);
                        }
                        leads_preview_modal.attr('data-form', data_form);
                        leads_preview_modal.modal('show');
                    } else {
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
            $(this).attr('disabled', 'disabled');
            var data_form = $(this).attr('data-form');
            var form_id = '#' + data_form;
            var form = $(form_id);
            var actionUrl = form.attr('action');
            var formData = new FormData(form[0]);
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.success) {
                        if (datatype == "leads") {
                            alert('Leads Saved');
                        } else {
                            alert('Spends Saved');
                        }
                        reset_upload_preview(form);
                    } else {
                        alert('Try Again');
                        $('#saveLeadsData').removeAttr('disabled');
                    }
                }
            });

        });

        function previewData(data) {
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

        function previewSpendData(data) {
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

        function reset_upload_preview(form) {
            form[0].reset();
            leads_preview_modal.modal('hide').removeAttr('data-form');
            $('#saveLeadsData').removeAttr('disabled');
            $('#previewData').html('');
        }
        leads_preview_modal.on('hide.bs.modal', function() {
            var data_form = leads_preview_modal.attr('data-form');
            var form_id = '#' + data_form;
            var form = $(form_id);
            form[0].reset();
            leads_preview_modal.removeAttr('data-form');
        })

        function Toast(color = 'green', message) {
            iziToast.show({
                // icon: 'fa fa-solid fa-check',
                color: color, // blue, red, green, yellow
                message: message,
                position: 'topRight'
            });
        }


        function filterme(value) {
            value = parseInt(value, 10); // Convert to an integer
            var that = $(this);
            if (value === 3) {
                that.removeClass('tgl-def');

                that.removeClass('tgl-off').addClass('tgl-on');
                that.parent().find('span').text('Approved');
            } else if (value === 2) {
                that.removeClass('tgl-on', );
                that.removeClass('tgl-off').addClass('tgl-def');
                that.parent().find('span').text('Pending');
            } else if (value === 1) {
                that.removeClass('tgl-def');
                that.removeClass('tgl-on').addClass('tgl-off');
                that.parent().find('span').text('Rejected');
            }
        }
        $('#apporveddata').on('page.dt', function() {
            setTimeout(function() {
                add_custom_toggle_click();
            }, 100)

        });
        $('#pendingdata').on('page.dt', function() {
            setTimeout(function() {
                add_custom_toggle_click();
            }, 100)

        });
        $('#rejectdata').on('page.dt', function() {
            setTimeout(function() {
                add_custom_toggle_click();
            }, 100)

        });
        $('#datatable7').on('page.dt', function() {
            setTimeout(function() {
                add_custom_toggle_click();
            }, 100)

        });
        $('#trashdata').on('page.dt', function() {
            setTimeout(function() {
                add_custom_toggle_click();
            }, 100)

        });

        function add_custom_toggle_click() {
            $(".custom-toggle").click(function() {
            var value = $(this).val();

            value = parseInt(value, 10); // Convert to an integer
            var that = $(this);
            if (value === 2) {
                that.removeClass('tgl-def');

                that.removeClass('tgl-on').addClass('tgl-off');
                that.parent().find('span').text('Rejected');
            } else if (value === 0) {
                that.removeClass('tgl-on', );
                that.removeClass('tgl-off').addClass('tgl-def');
                that.parent().find('span').text('Pending');
            } else if (value === 1) {
                that.removeClass('tgl-def');
                that.removeClass('tgl-off').addClass('tgl-on');
                that.parent().find('span').text('Approve');
            }

            var approval = value;
            var campaign_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{route('admin.campaigns.approval')}}",
                //url: "/admin/campaigns/approval",
                data: {
                    'approval': approval,
                    'campaign_id': campaign_id
                },
                success: function(data) {
                    if (data.success) {
                        Toast('green', data.message);
                    } else {
                        Toast('red', data.message);
                    }

                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                }
            });

        })
        }
      
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover'
        })

        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            console.log(activeTab);
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
            add_custom_toggle_click();
        });
    </script>
    @endpush