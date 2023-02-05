@extends('admin.layouts.app')

@section('panel')

<div class="row" id="apporved_list">

    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">


                <ul class="nav nav-tabs border-0" role="tablist" id="myTab">
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary active" href="#active-campaign" role="tab" data-toggle="tab">Active+Campaigns ({{$activeCampaign->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary " href="#active" role="tab" data-toggle="tab">Active ({{$active->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#pending" role="tab" data-toggle="tab">Pending Approval ({{$pending->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#emaildata" role="tab" data-toggle="tab">Email Unverified ({{$email_unverify->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#banned" role="tab" data-toggle="tab">Banned ({{$banned->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#rejected" role="tab" data-toggle="tab">Rejected ({{$rejected->count()}})</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link btn-primary" href="#advertiserdata" role="tab" data-toggle="tab">All Advertiser ({{$advertisers->count()}})</a>
                    </li>

                </ul>

                <div class="tab-content mt-3">
                    <div role="tabpanel" class="tab-pane active" id="active-campaign">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="activedata">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>A.ID</th>
                                        <th scope="col">@lang('Company Name')</th>
                                        <th scope="col">@lang('Active Campaigns')</th>
                                        <th scope="col">@lang('Active Campaign Budget')</th>
                                        <th scope="col">@lang('Assign Publisher Admin')</th>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Country')</th>
                                        <th scope="col">@lang('Phone')</th>
                                        <th scope="col">@lang('Email')</th>
                                        <th scope="col">@lang('Products/Services')</th>
                                        <th scope="col">@lang('Website')</th>
                                        <th scope="col">@lang('Social Media')</th>
                                        <th scope="col">@lang('Ad Budget')</th>

                                        <th scope="col">@lang('Date Applied')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($activeCampaign))
                                    @foreach($activeCampaign as $advertiser)
                                    <tr>
                                        <td data-label="@lang('Name')" class="text--primary">
                                            <div class="align-items-center d-flex flex-column justify-content-center" style="gap: 5px;">
                                                <input type="checkbox" name="status" @if($advertiser->status) checked @endif data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$advertiser->id}}">
                                                <div style="display: inline-table;">
                                                    <a href="{{ route('admin.advertiser.details',['id'=>$advertiser->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                                        <i class="las la-desktop text--shadow"></i>
                                                    </a>

                                                    <a href="{{ route('admin.advertiser.delete',['id'=>$advertiser->id])}}" class="" data-toggle="tooltip" title="" data-original-title="Ban">
                                                        <i class="fa-regular fa-circle-xmark"></i>

                                                    </a>
                                                </div>

                                            </div>

                                        </td>
                                        <td>{{ $advertiser->id }}</td>
                                        <td data-label="@lang('Company Name')">{{ $advertiser->company_name }}</td>
                                        <td data-label="@lang('Active Campaigns')"><?php echo get_total_active_campaign($advertiser->id) ?></td>
                                        <td data-label="@lang('Active Campaigns')">$<?php echo get_active_campaign_budget($advertiser->id) ?></td>

                                        <td data-label="@lang('Assign Publisher Admin')">
                                            <ul class="check_box_list">
                                                @forelse($publishers_admin as $publisher)
                                                <li><label><input @if(json_decode($advertiser->assign_publisher) != null && in_array($publisher->id, json_decode($advertiser->assign_publisher))) checked @endif type="checkbox" name="assign_publisher_{{ $advertiser->id }}[]" class="assign_publisher" value="{{ $publisher->id }}" data-advertiser_id = "{{$advertiser->id}}">{{ $publisher->name  }}</label></li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </td>
                                        <td data-label="@lang('Name')" class="text--primary">{{ $advertiser->name }}</td>
                                        <td data-label="@lang('Country')">{{ $advertiser->country }}</td>
                                        <td data-label="@lang('Phone')">{{$advertiser->country_code}}-{{ str_replace(ltrim($advertiser->country_code, '+'),"", $advertiser->mobile) }}</td>
                                        <td data-label="@lang('Email')">
                                            <div style="white-space: initial;">{{ $advertiser->email }}</div>
                                        </td>
                                        <td data-label="@lang('Products/Services')" style="max-width: 200px;min-width: 200px;line-break: auto;white-space: initial;">{{ $advertiser->product_services }}</td>
                                        <td data-label="@lang('Website')">{{ $advertiser->Website }}</td>
                                        <td data-label="@lang('Social Media')">{{ $advertiser->Social }}</td>
                                        <td data-label="@lang('Ad Budget')">${{ $advertiser->ad_budget }}</td>


                                        <td><span class="text--small"><strong> {{ Carbon\Carbon::parse($advertiser->created_at)->format('d-m-Y ') }} </strong></span></td>

                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <!-- Tab panes 2 -->
                    <div role="tabpanel" class="tab-pane" id="active">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="activedata">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>A.ID</th>
                                        <th scope="col">@lang('Company Name')</th>
                                        <th scope="col">@lang('Active Campaigns')</th>
                                        <th scope="col">@lang('Active Campaign Budget')</th>
                                        <th scope="col">@lang('Assign Publisher Admin')</th>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Country')</th>
                                        <th scope="col">@lang('Phone')</th>
                                        <th scope="col">@lang('Email')</th>
                                        <th scope="col">@lang('Products/Services')</th>
                                        <th scope="col">@lang('Website')</th>
                                        <th scope="col">@lang('Social Media')</th>
                                        <th scope="col">@lang('Ad Budget')</th>

                                        <th scope="col">@lang('Date Applied')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($active))
                                    @foreach($active as $advertiser)
                                    <tr>
                                        <td data-label="@lang('Name')" class="text--primary">
                                            <div class="align-items-center d-flex flex-column justify-content-center" style="gap: 5px;">
                                                <input type="checkbox" name="status" @if($advertiser->status) checked @endif data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$advertiser->id}}">
                                                <div style="display: inline-table;">
                                                    <a href="{{ route('admin.advertiser.details',['id'=>$advertiser->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                                        <i class="las la-desktop text--shadow"></i>
                                                    </a>

                                                    <a href="{{ route('admin.advertiser.delete',['id'=>$advertiser->id])}}" class="" data-toggle="tooltip" title="" data-original-title="Ban">
                                                        <i class="fa-regular fa-circle-xmark"></i>

                                                    </a>
                                                </div>

                                            </div>

                                        </td>
                                        <td>{{ $advertiser->id }}</td>
                                        <td data-label="@lang('Company Name')">{{ $advertiser->company_name }}</td>
                                        <td data-label="@lang('Active Campaigns')"><?php echo get_total_active_campaign($advertiser->id) ?></td>
                                        <td data-label="@lang('Active Campaigns')">$<?php echo get_active_campaign_budget($advertiser->id) ?></td>

                                        <td data-label="@lang('Assign Publisher Admin')">
                                            <ul class="check_box_list">
                                                @forelse($publishers_admin as $publisher)
                                                <li><label><input @if(json_decode($advertiser->assign_publisher) != null && in_array($publisher->id, json_decode($advertiser->assign_publisher))) checked @endif type="checkbox" name="assign_publisher_{{ $advertiser->id }}[]" class="assign_publisher" value="{{ $publisher->id }}" data-advertiser_id = "{{$advertiser->id}}">{{ $publisher->name  }}</label></li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </td>
                                        <td data-label="@lang('Name')" class="text--primary">{{ $advertiser->name }}</td>
                                        <td data-label="@lang('Country')">{{ $advertiser->country }}</td>
                                        <td data-label="@lang('Phone')">{{$advertiser->country_code}}-{{ str_replace(ltrim($advertiser->country_code, '+'),"", $advertiser->mobile) }}</td>
                                        <td data-label="@lang('Email')">
                                            <div style="white-space: initial;">{{ $advertiser->email }}</div>
                                        </td>
                                        <td data-label="@lang('Products/Services')" style="max-width: 200px;min-width: 200px;line-break: auto;white-space: initial;">{{ $advertiser->product_services }}</td>
                                        <td data-label="@lang('Website')">{{ $advertiser->Website }}</td>
                                        <td data-label="@lang('Social Media')">{{ $advertiser->Social }}</td>
                                        <td data-label="@lang('Ad Budget')">${{ $advertiser->ad_budget }}</td>


                                        <td><span class="text--small"><strong> {{ Carbon\Carbon::parse($advertiser->created_at)->format('d-m-Y ') }} </strong></span></td>

                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <!-- Tab panes 3 -->
                    <div role="tabpanel" class="tab-pane" id="pending">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="pendingdata">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>A.ID</th>
                                        <th scope="col">@lang('Company Name')</th>
                                        <th scope="col">@lang('Assign Publisher Admin')</th>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Country')</th>
                                        <th scope="col">@lang('Phone')</th>
                                        <th scope="col">@lang('Email')</th>

                                        <th scope="col">@lang('Products/Services')</th>
                                        <th scope="col">@lang('Website')</th>
                                        <th scope="col">@lang('Social Media')</th>
                                        <th scope="col">@lang('Ad Budget')</th>

                                        <th scope="col">@lang('Date Applied')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($pending))
                                    @foreach($pending as $advertiser)
                                    <tr>
                                        <td data-label="@lang('Name')" class="text--primary">
                                            <div class="align-items-center d-flex flex-column justify-content-center" style="gap: 5px;">
                                                <?php
                                                if ($advertiser->status == 0)   $status = 1;
                                                if ($advertiser->status == 1)   $status = 2;
                                                if ($advertiser->status == 2)   $status = 0;
                                                ?>
                                                <div class="wrapper wrapper_span align-items-center d-flex flex-column ">
                                                    <input type="range" name="points" min="0" step="1" id="custom-toggle" class="@if($advertiser->status==0) tgl-off @elseif($advertiser->status==1) tgl-on @elseif($advertiser->status==2) tgl-def @endif custom-toggle" max="2" value="{{$status }}" data-size="small" data-onstyle="success" data-style="ios" data-id="{{$advertiser->id}}">
                                                    <span>@if($advertiser->status==0) Pending @elseif($advertiser->status==1) Approved @elseif($advertiser->status==2) Rejected @endif </span>
                                                </div>
                                                <div style="display: inline-table;">
                                                    <a href="{{ route('admin.advertiser.details',['id'=>$advertiser->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                                        <i class="las la-desktop text--shadow"></i>
                                                    </a>
                                                    <a href="{{ route('admin.advertiser.delete',['id'=>$advertiser->id])}}" class="" data-toggle="tooltip" title="" data-original-title="Ban">
                                                        <i class="fa-regular fa-circle-xmark"></i>

                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $advertiser->id }}</td>
                                        <td data-label="@lang('Company Name')">{{ $advertiser->company_name }}</td>
                                        <td data-label="@lang('Assign Publisher Admin')">
                                            <ul class="check_box_list">
                                                @forelse($publishers_admin as $publisher)
                                                <li><label><input @if($advertiser->assign_publisher != null && in_array($publisher->id, $advertiser->assign_publisher)) checked @endif type="checkbox" name="assign_publisher_{{ $advertiser->id }}[]" class="assign_publisher" value="{{ $publisher->id }}" data-advertiser_id = "{{$advertiser->id}}">{{ $publisher->name  }}</label></li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </td>
                                        <td data-label="@lang('Name')" class="text--primary">{{ $advertiser->name }}</td>
                                        <td data-label="@lang('Country')">{{ $advertiser->country }}</td>
                                        <td data-label="@lang('Phone')">{{$advertiser->country_code}}-{{ str_replace(ltrim($advertiser->country_code, '+'),"", $advertiser->mobile) }}</td>
                                        <td data-label="@lang('Email')">
                                            <div style="white-space: initial;">{{ $advertiser->email }}</div>
                                        </td>

                                        <td data-label="@lang('Products/Services')" style="max-width: 200px;min-width: 200px;line-break: auto;white-space: initial;">{{ $advertiser->product_services }}</td>
                                        <td data-label="@lang('Website')">{{ $advertiser->Website }}</td>
                                        <td data-label="@lang('Social Media')">{{ $advertiser->Social }}</td>
                                        <td data-label="@lang('Ad Budget')">${{ $advertiser->ad_budget }}</td>


                                        <td><span class="text--small"><strong> {{ Carbon\Carbon::parse($advertiser->created_at)->format('d-m-Y ') }} </strong></span></td>
                                        {{-- <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal {{ $advertiser->status==1?'badge--success':'badge--warning' }} ">{{ $advertiser->status==1?'Active':'Banned' }}</span></td> --}}

                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <!-- Tab panes 4 -->
                    <div role="tabpanel" class="tab-pane" id="emaildata">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="data-email">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>A.ID</th>
                                        <th scope="col">@lang('Company Name')</th>
                                        <th scope="col">@lang('Assign Publisher Admin')</th>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Country')</th>
                                        <th scope="col">@lang('Phone')</th>
                                        <th scope="col">@lang('Email')</th>

                                        <th scope="col">@lang('Products/Services')</th>
                                        <th scope="col">@lang('Website')</th>
                                        <th scope="col">@lang('Social Media')</th>
                                        <th scope="col">@lang('Ad Budget')</th>

                                        <th scope="col">@lang('Date Applied')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($email_unverify))
                                    @foreach($email_unverify as $advertiser)
                                    <tr>
                                        <td data-label="@lang('Name')" class="text--primary">
                                            <div class="align-items-center d-flex flex-column justify-content-center" style="gap: 5px;">
                                                <input type="checkbox" name="status" @if($advertiser->status) checked @endif data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$advertiser->id}}">

                                                <div style="display: inline-table;">
                                                    <a href="{{ route('admin.advertiser.details',['id'=>$advertiser->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                                        <i class="las la-desktop text--shadow"></i>
                                                    </a>
                                                    <a href="{{ route('admin.advertiser.delete',['id'=>$advertiser->id])}}" class="" data-toggle="tooltip" title="" data-original-title="Ban">
                                                        <i class="fa-regular fa-circle-xmark"></i>

                                                    </a>

                                                </div>

                                            </div>

                                        </td>
                                        <td>{{ $advertiser->id }}</td>
                                        <td data-label="@lang('Company Name')">{{ $advertiser->company_name }}</td>
                                        <td data-label="@lang('Assign Publisher Admin')">
                                            <ul class="check_box_list">
                                                @forelse($publishers_admin as $publisher)
                                                <li><label><input @if($advertiser->assign_publisher != null && in_array($publisher->id, $advertiser->assign_publisher)) checked @endif type="checkbox" name="assign_publisher_{{ $advertiser->id }}[]" class="assign_publisher" value="{{ $publisher->id }}" data-advertiser_id = "{{$advertiser->id}}">{{ $publisher->name  }}</label></li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </td>
                                        <td data-label="@lang('Name')" class="text--primary">{{ $advertiser->name }}</td>
                                        <td data-label="@lang('Country')">{{ $advertiser->country }}</td>
                                        <td data-label="@lang('Phone')">{{$advertiser->country_code}}-{{ str_replace(ltrim($advertiser->country_code, '+'),"", $advertiser->mobile) }}</td>
                                        <td data-label="@lang('Email')">
                                            <div style="white-space: initial;">{{ $advertiser->email }}</div>
                                        </td>

                                        <td data-label="@lang('Products/Services')" style="max-width: 200px;min-width: 200px;line-break: auto;white-space: initial;">{{ $advertiser->product_services }}</td>
                                        <td data-label="@lang('Website')">{{ $advertiser->Website }}</td>
                                        <td data-label="@lang('Social Media')">{{ $advertiser->Social }}</td>
                                        <td data-label="@lang('Ad Budget')">${{ $advertiser->ad_budget }}</td>


                                        <td><span class="text--small"><strong> {{ Carbon\Carbon::parse($advertiser->created_at)->format('d-m-Y ') }} </strong></span></td>
                                        {{-- <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal {{ $advertiser->status==1?'badge--success':'badge--warning' }} ">{{ $advertiser->status==1?'Active':'Banned' }}</span></td> --}}

                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>


                    <!-- Tab panes 5 -->
                    <div role="tabpanel" class="tab-pane" id="banned">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="banneddata">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>A.ID</th>
                                        <th scope="col">@lang('Company Name')</th>
                                        <th scope="col">@lang('Assign Publisher Admin')</th>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Country')</th>
                                        <th scope="col">@lang('Phone')</th>
                                        <th scope="col">@lang('Email')</th>

                                        <th scope="col">@lang('Products/Services')</th>
                                        <th scope="col">@lang('Website')</th>
                                        <th scope="col">@lang('Social Media')</th>
                                        <th scope="col">@lang('Ad Budget')</th>

                                        <th scope="col">@lang('Date Applied')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($banned))
                                    @foreach($banned as $advertiser)
                                    <tr>
                                        <td data-label="@lang('Name')" class="text--primary">
                                            <div class="align-items-center d-flex flex-column justify-content-center" style="gap: 5px;">

                                                <a style="cursor: pointer;" class="_icon activate_btn" data-id="{{$advertiser->id}}" data-toggle="tooltip" title="" data-original-title="Activate">
                                                    <img src="{{ url('/')}}/assets/images/icon/add-button.png" style="width:20px;margin:0 auto;">
                                                </a>
                                                <div style="display: inline-table;">
                                                    <a href="{{ route('admin.advertiser.details',['id'=>$advertiser->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                                        <i class="las la-desktop text--shadow"></i>
                                                    </a>
                                                    <a href="{{ route('admin.advertiser.complete.delete',['id'=>$advertiser->id])}}?tab=banned" onclick="return deleteconfirm(<?php echo get_total_campaign($advertiser->id) ?>)" class="trashIocn" data-toggle="tooltip" title="" data-original-title="Delete">
                                                        <i class="fa-regular fa-circle-xmark"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </td>
                                        <td>{{ $advertiser->id }}</td>
                                        <td data-label="@lang('Company Name')">{{ $advertiser->company_name }}</td>
                                        <td data-label="@lang('Assign Publisher Admin')">
                                            <ul class="check_box_list">
                                                @forelse($publishers_admin as $publisher)
                                                <li><label><input @if($advertiser->assign_publisher != null && in_array($publisher->id, $advertiser->assign_publisher)) checked @endif type="checkbox" name="assign_publisher_{{ $advertiser->id }}[]" class="assign_publisher" value="{{ $publisher->id }}" data-advertiser_id = "{{$advertiser->id}}">{{ $publisher->name  }}</label></li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </td>
                                        <td data-label="@lang('Name')" class="text--primary">{{ $advertiser->name }}</td>
                                        <td data-label="@lang('Country')">{{ $advertiser->country }}</td>
                                        <td data-label="@lang('Phone')">{{$advertiser->country_code}}-{{ str_replace(ltrim($advertiser->country_code, '+'),"", $advertiser->mobile) }}</td>
                                        <td data-label="@lang('Email')">
                                            <div style="white-space: initial;">{{ $advertiser->email }}</div>
                                        </td>

                                        <td data-label="@lang('Products/Services')" style="max-width: 200px;min-width: 200px;line-break: auto;white-space: initial;">{{ $advertiser->product_services }}</td>
                                        <td data-label="@lang('Website')">{{ $advertiser->Website }}</td>
                                        <td data-label="@lang('Social Media')">{{ $advertiser->Social }}</td>
                                        <td data-label="@lang('Ad Budget')">${{ $advertiser->ad_budget }}</td>


                                        <td><span class="text--small"><strong> {{ Carbon\Carbon::parse($advertiser->created_at)->format('d-m-Y ') }} </strong></span></td>
                                        {{-- <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal {{ $advertiser->status==1?'badge--success':'badge--warning' }} ">{{ $advertiser->status==1?'Active':'Banned' }}</span></td> --}}

                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <!-- Tab panes 6 -->
                    <div role="tabpanel" class="tab-pane" id="rejected">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="rejecteddata">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>A.ID</th>
                                        <th scope="col">@lang('Company Name')</th>
                                        <th scope="col">@lang('Assign Publisher Admin')</th>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Country')</th>
                                        <th scope="col">@lang('Phone')</th>
                                        <th scope="col">@lang('Email')</th>

                                        <th scope="col">@lang('Products/Services')</th>
                                        <th scope="col">@lang('Website')</th>
                                        <th scope="col">@lang('Social Media')</th>
                                        <th scope="col">@lang('Ad Budget')</th>

                                        <th scope="col">@lang('Date Applied')</th>
                                        <th scope="col">@lang('Rejection Remarks')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($rejected))
                                    @foreach($rejected as $advertiser)
                                    <tr>
                                        <td data-label="@lang('Name')" class="text--primary">
                                            <div class="align-items-center d-flex flex-column justify-content-center" style="gap: 5px;">

                                                <a style="cursor: pointer;" class="_icon activate_btn" data-id="{{$advertiser->id}}" data-toggle="tooltip" title="" data-original-title="Activate">
                                                    <img src="{{ url('/')}}/assets/images/icon/add-button.png" style="width:20px;margin:0 auto;">
                                                </a>
                                                <div style="display: inline-table;">
                                                    <a href="{{ route('admin.advertiser.details',['id'=>$advertiser->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                                        <i class="las la-desktop text--shadow"></i>
                                                    </a>
                                                    <a href="{{ route('admin.advertiser.delete',['id'=>$advertiser->id])}}" class="" data-toggle="tooltip" title="" data-original-title="Ban">
                                                        <i class="fa-regular fa-circle-xmark"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </td>
                                        <td>{{ $advertiser->id }}</td>
                                        <td data-label="@lang('Company Name')">{{ $advertiser->company_name }}</td>
                                        <td data-label="@lang('Assign Publisher Admin')">
                                            <ul class="check_box_list">
                                                @forelse($publishers_admin as $publisher)
                                                <li><label><input @if($advertiser->assign_publisher != null && in_array($publisher->id, $advertiser->assign_publisher)) checked @endif type="checkbox" name="assign_publisher_{{ $advertiser->id }}[]" class="assign_publisher" value="{{ $publisher->id }}" data-advertiser_id = "{{$advertiser->id}}">{{ $publisher->name  }}</label></li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </td>
                                        <td data-label="@lang('Name')" class="text--primary">{{ $advertiser->name }}</td>
                                        <td data-label="@lang('Country')">{{ $advertiser->country }}</td>
                                        <td data-label="@lang('Phone')">{{$advertiser->country_code}}-{{ str_replace(ltrim($advertiser->country_code, '+'),"", $advertiser->mobile) }}</td>
                                        <td data-label="@lang('Email')">
                                            <div style="white-space: initial;">{{ $advertiser->email }}</div>
                                        </td>

                                        <td data-label="@lang('Products/Services')" style="max-width: 200px;min-width: 200px;line-break: auto;white-space: initial;">{{ $advertiser->product_services }}</td>
                                        <td data-label="@lang('Website')">{{ $advertiser->Website }}</td>
                                        <td data-label="@lang('Social Media')">{{ $advertiser->Social }}</td>
                                        <td data-label="@lang('Ad Budget')">${{ $advertiser->ad_budget }}</td>


                                        <td><span class="text--small"><strong> {{ Carbon\Carbon::parse($advertiser->created_at)->format('d-m-Y ') }} </strong></span></td>
                                        <td data-label="@lang('Rejection Remarks')">{{ $advertiser->rejection_remarks }}</td>
                                        {{-- <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal {{ $advertiser->status==1?'badge--success':'badge--warning' }} ">{{ $advertiser->status==1?'Active':'Banned' }}</span></td> --}}

                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                    <!-- Tab panes 7 -->
                    <div role="tabpanel" class="tab-pane" id="advertiserdata">

                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two" id="advertiser-data">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>A.ID</th>
                                        <th scope="col">@lang('Company Name')</th>
                                        <th scope="col">@lang('Assign Publisher Admin')</th>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Country')</th>
                                        <th scope="col">@lang('Phone')</th>
                                        <th scope="col">@lang('Email')</th>

                                        <th scope="col">@lang('Products/Services')</th>
                                        <th scope="col">@lang('Website')</th>
                                        <th scope="col">@lang('Social Media')</th>
                                        <th scope="col">@lang('Ad Budget')</th>

                                        <th scope="col">@lang('Date Applied')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(!empty($advertisers))
                                    @foreach($advertisers as $advertiser)
                                    <tr>
                                        <td data-label="@lang('Name')" class="text--primary">
                                            <div class="align-items-center d-flex flex-column justify-content-center" style="gap: 5px;">
                                                <input type="checkbox" name="status" @if($advertiser->status) checked @endif data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$advertiser->id}}">

                                                <div style="display: inline-table;">
                                                    <a href="{{ route('admin.advertiser.details',['id'=>$advertiser->id]) }}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="Details">
                                                        <i class="las la-desktop text--shadow"></i>
                                                    </a>

                                                    <a href="{{ route('admin.advertiser.delete',['id'=>$advertiser->id])}}" class="" data-toggle="tooltip" title="" data-original-title="Ban">
                                                        <i class="fa-regular fa-circle-xmark"></i>

                                                    </a>
                                                </div>

                                            </div>
                                        </td>
                                        <td>{{ $advertiser->id }}</td>
                                        <td data-label="@lang('Company Name')">{{ $advertiser->company_name }}</td>
                                        <td data-label="@lang('Assign Publisher Admin')">
                                            <ul class="check_box_list">
                                                @forelse($publishers_admin as $publisher)
                                                <li><label><input @if($advertiser->assign_publisher != null && in_array($publisher->id, $advertiser->assign_publisher)) checked @endif type="checkbox" name="assign_publisher_{{ $advertiser->id }}[]" class="assign_publisher" value="{{ $publisher->id }}" data-advertiser_id = "{{$advertiser->id}}">{{ $publisher->name  }}</label></li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </td>
                                        <td data-label="@lang('Name')" class="text--primary">{{ $advertiser->name }}</td>
                                        <td data-label="@lang('Country')">{{ $advertiser->country }}</td>
                                        <td data-label="@lang('Phone')">{{$advertiser->country_code}}-{{ str_replace(ltrim($advertiser->country_code, '+'),"", $advertiser->mobile) }}</td>
                                        <td data-label="@lang('Email')">
                                            <div style="white-space: initial;">{{ $advertiser->email }}</div>
                                        </td>

                                        <td data-label="@lang('Products/Services')" style="max-width: 200px;min-width: 200px;line-break: auto;white-space: initial;">{{ $advertiser->product_services }}</td>
                                        <td data-label="@lang('Website')">{{ $advertiser->Website }}</td>
                                        <td data-label="@lang('Social Media')">{{ $advertiser->Social }}</td>
                                        <td data-label="@lang('Ad Budget')">${{ $advertiser->ad_budget }}</td>


                                        <td><span class="text--small"><strong> {{ Carbon\Carbon::parse($advertiser->created_at)->format('d-m-Y ') }} </strong></span></td>
                                        {{-- <td data-label="@lang('Status')"><span class="text--small badge font-weight-normal {{ $advertiser->status==1?'badge--success':'badge--warning' }} ">{{ $advertiser->status==1?'Active':'Banned' }}</span></td> --}}

                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- card end -->
        <div class="card-footer py-4">
        <select id="company_search" class="form-select form-select-lg mb-3" aria-label=".form-select-lg" style="right: 13rem;border-radius: 0;z-index: 1;">
                <option value="">Select Company Name</option>
                @forelse($companies as $company)
                <option <?php echo isset($_GET['advertiser']) ? ($_GET['advertiser'] == $company->id ? "selected" : "") : "" ?> value="{{$company->id}}">{{$company->company_name}}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div>


</div>

{{-- Rejection Remarks MODAL --}}
<div class="modal fade" id="rejection_remarks_modal" tabindex="-1" aria-labelledby="RejectionRemarksModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 24rem;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="RejectionRemarksModalLabel">Rejection Remarks</h5>
            </div>
            <div class="modal-body">
                <div>
                    <form onsubmit="event.preventDefault(); submit_rejection(event);">
                        <div class="form-group">
                            <input class="form-control advertiser_id" name="advertiser_id" hidden rows="4"></textarea>
                            <textarea class="form-control" required name="remarks" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')
<form action="{{ route('admin.advertiser.search') }}" method="GET" class="form-inline float-sm-right bg--white">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="@lang('Username or email')" value="{{ $search ?? '' }}">
        <div class="input-group-append">
            <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endpush
@push('script')
<script>
    'use strict';


    function deleteconfirm(campaigncount) {
        if (campaigncount > 0) {
            alert('Unable to delete Advertiser - Advertiser has campaigns');
            return false;

        }
        return confirm('Do you want to delete the Advertiser?');
    }
    $('.activate_btn').click(function() {
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{route('admin.advertiser.update_status')}}",
            // url: "/admin/advertiser/update_status",
            data: {
                'status': 1,
                'id': id
            },
            success: function(data) {
                if (data.success) {
                    Toast('green', data.message);
                } else {
                    Toast('red', data.message);
                }
                setTimeout(function() {
                    location.reload(true);
                }, 1000);
            }
        });
    })

    $('.toggle-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{route('admin.advertiser.update_status')}}",
            // url: "/admin/advertiser/update_status",
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                if (data.success) {
                    Toast('green', data.message);
                } else {
                    Toast('red', data.message);
                }
                setTimeout(function() {
                    location.reload(true);
                }, 1000);
            }
        });
    })
    var leads_preview_modal = $('#leads_preview_modal');
    $(document).ready(function() {
        $('.assign_publisher').change(function() {
            var advertiser_id = $(this).data('advertiser_id');
            var publisher_id = $(this).val();
            var type = $(this)[0].checked? 1:0;


            const formData = {
                "_token": "{{ csrf_token() }}",
                "type": type,
                "publisher_id": publisher_id,
                "advertiser_id": advertiser_id
            };
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('admin.advertiser.assign_advertiser')}}",
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

        $('#activedata').on('page.dt', function() {
            setTimeout(function() {
                $("[data-toggle='toggle']").bootstrapToggle('destroy')
                $("[data-toggle='toggle']").bootstrapToggle();
                add_custom_toggle_click();
            }, 100)

        });
        $('#pendingdata').on('page.dt', function() {
            setTimeout(function() {
                $("[data-toggle='toggle']").bootstrapToggle('destroy')
                $("[data-toggle='toggle']").bootstrapToggle();
                add_custom_toggle_click();
            }, 100)

        });
        $('#data-email').on('page.dt', function() {
            setTimeout(function() {
                $("[data-toggle='toggle']").bootstrapToggle('destroy')
                $("[data-toggle='toggle']").bootstrapToggle();
                add_custom_toggle_click();
                add_custom_toggle_click();
            }, 100)

        });
        $('#banneddata').on('page.dt', function() {
            setTimeout(function() {
                $("[data-toggle='toggle']").bootstrapToggle('destroy')
                $("[data-toggle='toggle']").bootstrapToggle();
                add_custom_toggle_click();
            }, 100)

        });
        $('#rejecteddata').on('page.dt', function() {
            setTimeout(function() {
                $("[data-toggle='toggle']").bootstrapToggle('destroy')
                $("[data-toggle='toggle']").bootstrapToggle();
                add_custom_toggle_click();
            }, 100)

        });
        $('#advertiser-data').on('page.dt', function() {
            setTimeout(function() {
                $("[data-toggle='toggle']").bootstrapToggle('destroy')
                $("[data-toggle='toggle']").bootstrapToggle();
                add_custom_toggle_click();
            }, 100)

        });
    });

    function Toast(color = 'green', message) {
        iziToast.show({
            // icon: 'fa fa-solid fa-check',
            color: color, // blue, red, green, yellow
            message: message,
            position: 'topRight'
        });
    }


    $('#advertiser-data,#pendingdata,#data-email,#banneddata,#rejecteddata,#activedata,#datatable5').DataTable({

        "sDom": 'Lfrtlip',
        "language": {
            "lengthMenu": "Show rows  _MENU_",
            search: "",
            searchPlaceholder: "Search"
        }

    });

    function submit_rejection(e) {
        const {
            remarks,
            advertiser_id
        } = e.target;
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{route('admin.advertiser.approval.rejection')}}",
            data: {
                'approval': 2,
                'remarks': remarks.value,
                'advertiser_id': advertiser_id.value
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
        console.log(advertiser_id.value);
    }

    function add_custom_toggle_click() {

        $(".custom-toggle").click(function() {
            var value = $(this).val();
            var approval = value;
            var id = Number($(this).data('id'));
            value = parseInt(value, 10); // Convert to an integer
            var that = $(this);
            var status_id = 0;
            if (value === 0) {
                that.removeClass('tgl-on', );
                that.removeClass('tgl-off').addClass('tgl-def');
                that.parent().find('span').text('Rejected');
                $('#rejection_remarks_modal textarea').val("");
                $('#rejection_remarks_modal').modal('show');
                $('#rejection_remarks_modal .advertiser_id').val(id);

                return;
            }

            if (value === 2) {
                that.removeClass('tgl-def');

                that.removeClass('tgl-off').addClass('tgl-on');
                that.parent().find('span').text('Approved');
                status_id = 1;
            } else if (value === 0) {
                that.removeClass('tgl-on', );
                that.removeClass('tgl-off').addClass('tgl-def');
                that.parent().find('span').text('Rejected');
                status_id = 2;
            } else if (value === 1) {
                that.removeClass('tgl-def');
                that.removeClass('tgl-on').addClass('tgl-off');
                that.parent().find('span').text('Pending');
                status_id = 0;
            }

            updateStatus(id, status_id);
        })

    }

    function updateStatus(id, status_id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{route('admin.advertiser.update_status')}}",
            // url: "/admin/advertiser/update_status",
            data: {
                'status': status_id,
                'id': id
            },
            success: function(data) {
                if (data.success) {
                    Toast('green', data.message);
                } else {
                    Toast('red', data.message);
                }
                setTimeout(function() {
                    location.reload(true);
                }, 1000);
            }
        });

    }
    add_custom_toggle_click();

    $(document).ready(function() {
        $('#apporved_list ul.nav.nav-tabs').addClass("position-absolute")
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        console.log(activeTab);
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
        $("#company_search").on("change", function() {
            if ($("#company_search").val() === "") {
                window.location.href = window.location.origin + window.location.pathname;
                return;
            }
            window.location.href = window.location.origin + window.location.pathname + "?advertiser=" + $("#company_search").val();
            return;
        });

    });
</script>
@endpush
@push('style')
<style>
    .breadcrumb-plugins {
        display: none;
    }

    ul.check_box_list {
        height: 100px;
        overflow: auto;
        width: 100%;
        border: 1px solid #000;
    }

    ul.check_box_list {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    ul.check_box_list li {
        margin: 0;
        padding: 0;
    }


    .table td {
        text-align: left !important;
        border: 1px solid #e5e5e5 !important;
        padding: 10px 10px !important;
    }

    ul.check_box_list label {
        text-align: left;
        padding: 3px 5px;
        display: inline-block;
        width: 100%;
        color: WindowText;
        background-color: Window;
        margin: 0;
        width: 100%;
    }

    ul.check_box_list label input {
        margin-right: 3px;
    }

    ul.check_box_list label:hover {
        background-color: Highlight;
        color: HighlightText;
    }

    table.table--light thead th {
        background-color: #1A273A;
    }

    .pagination .page-item .page-link,
    .pagination .page-item span {
        border-radius: 0 !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #1361b2;
        border-color: #1361b2;
    }

    .text--primary {
        color: #1361b2 !important;
    }

    .btn--primary {
        background-color: #11b6f3 !important;
    }

    .btn-success {
        background-color: #11b6f3;
        border-color: #11b6f3;
    }

    #custom-toggle {
        -webkit-appearance: none;
        appearance: none;
        height: 23px !important;
        width: 60px;
        background-color: #ddd;
        -webkit-border-radius: 25px;
        border-radius: 25px;
        padding: 0;
        margin: 0;
        cursor: pointer;
    }

    #custom-toggle.tgl-def::-webkit-slider-thumb {
        background-color: red;
    }

    #custom-toggle.tgl-on::-webkit-slider-thumb {
        background-color: green;
    }

    #custom-toggle.tgl-off::-webkit-slider-thumb {
        background-color: orange;
    }

    #custom-toggle::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        height: 23px !important;
        width: 23px !important;
        -webkit-border-radius: 25px;
        border-radius: 25px;
    }

    #custom-toggle:focus {
        outline: none;
    }

    .wrapper_span span {
        font-size: 12px !important;
    }

    .rangeActive {
        background-color: green;
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
        top: -3px;
    }

    .toggle.btn.off .toggle-handle {
        left: 9px;
    }

    table thead tr th:after {
        top: 14px !important;
    }

    table thead tr th:before {
        bottom: 14px !important;
    }

    table.dataTable tbody tr td:nth-child(7) {
        max-width: 200px;
    }

    table.dataTable tbody tr td:nth-child(8) {
        max-width: 200px;
        line-break: auto;
        white-space: initial;
    }

    .icon-btn {
        display: inline-flex;
    }


    #apporved_list ul.nav.nav-tabs {
        /* position: absolute; */
        top: 30px;
        z-index: 1;
        left: 0;
    }

    #apporved_list .dataTables_filter span {
        display: none;
    }

    .toggle.btn {
        width: 27px !important;
        height: 20px !important;
    }

    #banned .trashIocn i {
        color: red;
        border-radius: 100%;
    }

    [data-original-title="Ban"] {
        vertical-align: middle;
        font-size: 23px;
    }

    [data-original-title="Ban"],
    [data-original-title="Delete"] {
        vertical-align: middle;
        font-size: 23px;
    }

    [data-original-title="Ban"] i,
    [data-original-title="Delete"] i {
        font-size: 23px;
    }

    thead>tr>th:nth-child(2) {
        max-width: 50px !important;
        padding-left: 0 !important;
        vertical-align: middle;
    }
</style>
@endpush