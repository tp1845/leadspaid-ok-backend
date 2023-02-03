@extends($activeTemplate.'layouts.advertiser.frontend')
@php
$user = auth()->guard('advertiser')->user();
@endphp
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div id="campaigns_date_table">
            <div class="paymentt_tab">
                <input type="text" id="daterange" name="daterange" value="Today">
                <form method="GET" id="RangeForm" hidden>
                    <input id="startDate" name="startDate" />
                    <input id="endDate" name="endDate" />
                </form>
                <!-- <button type="button" class="btn btn-danger rounded-0 ml-2 adsrock-download-pd">Download Invoice</button> -->
            </div>
            <div class="table-responsive--lg">
                @php
                $daily_bug=0;
                $leadd=0;
                $output = [];
                $cpll = 0;
                $costt = 0;
                @endphp
                <ul class="nav custon_nav">
                    <li class="nav-item"><button data-bs-target="#live" type="button" role="tab" aria-controls="live" aria-selected="true" class="nav-link active">Live</button></li>

                    <li class="nav-item"><button data-tab="pending_approve" class="nav-link " data-bs-toggle="tab" data-bs-target="#pending_approve" type="button" role="tab" aria-controls="pending_approve" aria-selected="false"><i class="fa-solid fa-thumbs-up"></i> Pending Approval</a></li>

                    <li class="nav-item"><button data-tab="draft" class="nav-link " data-bs-toggle="tab" data-bs-target="#draft" type="button" role="tab" aria-controls="draft" aria-selected="false"><i class="fa-solid fa-edit"></i> Draft</a></li>

                    <li class="nav-item"><button data-tab="trash" class="nav-link " data-bs-toggle="tab" data-bs-target="#trash" type="button" role="tab" aria-controls="trash" aria-selected="false"><i class="fa-solid fa-trash-can"></i> Deleted</a></li>

                </ul>
                <?php
                if (isset($_GET['startDate'])) {
                    $start_date = $_GET['startDate'];
                    $end_date = $_GET['endDate'];
                } else {
                    $start_date = null;
                    $end_date = null;
                }
                ?>
                {{-- Tab Live  --}}
                <div class="tab-pane fade show active" id="live" role="tabpanel" aria-labelledby="live-tab">
                    <table id="campaign_list_live" class="live table table-striped table-bordered datatable " style="width:100%">
                        <thead>
                            <tr>
                                <th>Off/On</th>
                                <th>Campaign Name</th>
                                <th>Delivery</th>
                                <th>Download Leads</th>
                                <th>Leads</th>
                                <th>Cost</th>
                                <th>CPL</th>
                                <th>Daily Budget</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Target Country </th>
                                <th>Form Used</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($campaigns as $campaign)

                            @php

                            $daily_bug= $daily_bug+$campaign->daily_budget;
                            $leadValue = get_campiagn_leads_by_id($campaign->id,$start_date,$end_date);
                            if ($leadValue > 0){
                            array_push($output,$campaign->id);
                            $leadd=$leadd+ $leadValue;
                            }
                            $costValue = get_campiagn_cost_by_id($campaign->id,$start_date,$end_date)>0?number_format(get_campiagn_cost_by_id($campaign->id,$start_date,$end_date), 2, '.', '' ):0;
                            $costt= $costt+ $costValue ;
                            if ($leadValue === 0 && $costValue > 0) {
                                $cplValue = "";
                            } elseif ($leadValue > 0 && $costValue === 0) {
                                $cplValue = "";
                            } else {
                                if ($leadValue > 0 && $costValue > 0) {
                                    $cplValueWithoutFormatted =  number_format(get_campiagn_cost_by_id($campaign->id, $start_date, $end_date) / get_campiagn_leads_by_id($campaign->id, $start_date, $end_date), 2, '.', '');
                                    $cplValue = "$" .  $cplValueWithoutFormatted;

                                    $cpll = $cpll + $cplValueWithoutFormatted;
                                }else{
                                    $cplValue = 0;
                                }
                            }
                            @endphp
                            <tr class="@if(($campaign->status==0) && ($campaign->approve==0)) delete_row @endif   @if($campaign->delivery == 2 ) draft @endif  ">
                                <td><input type="checkbox" name="status" @if($campaign->status) checked @endif data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$campaign->id}}"></td>
                                <td class="edit_btns">{{ $campaign->name }} <br>
                                    @if(($campaign->status==0) && ($campaign->approve==0)) @else <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-status="@if($campaign->status)1 @else 0 @endif" data-type="edit" class="editcampaign create-campaign-btn2">Edit</a> | @endif

                                    @if($campaign->delivery !=2 )
                                    <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-type="duplicate" class="duplicatecampaign create-campaign-btn2">Duplicate</a>
                                    @endif


                                    @if(($campaign->status==0) && ($campaign->approve==0)) @else

                                    @if($campaign->delivery !=2 ) | @endif <a href="{{ route("advertiser.campaigns.delete-camp",  $campaign->id ) }}" data-id="{{ $campaign->id }}" class="btn-danger1 delete_campaign">Delete</a> @endif
                                </td>
                                <td>
                                    @if(($campaign->status==0) && ($campaign->approve==0)) Deleted
                                    @else
                                    @if($campaign->delivery ==2 )
                                    <span class="yellow">Draft</span>
                                    @elseif($campaign->approve ==1 )

                                    <span class="green">Active </span>
                                    @else
                                    <span class="orange">Pending<br />Approval</span>
                                    @endif
                                    @endif
                                </td>
                                <td><a href="{{ route('advertiser.campaignsformleads.export',$campaign->id) }}">XLSX </a> |
                                    <a href="{{ route('advertiser.campaignsformleads.exportcsv',$campaign->id) }}">CSV </a>
                                    {{-- |  <a href="{{ route('advertiser.campaignsleads.googlesheet',$campaign->id) }}">Google Sheet</a> --}}
                                </td>
                                <td for="leads_count">{{ get_campiagn_leads_by_id($campaign->id,$start_date,$end_date)}} </td>
                                <td>{{$costValue>0?"$" . $costValue:0}}</td>
                                <td>{{ $cplValue }}</td>
                                <td> ${{ $campaign->daily_budget }}</td>
                                <td>@if($campaign->start_date !== '0000-00-00') {{ $campaign->start_date }} @endif</td>
                                <td>@if($campaign->approve && $campaign->status ) Ongoing @endif</td>
                                <td>{{ $campaign->target_country }} </td>
                                <td>
                                    @if (isset($campaign->campaign_forms))
                                    {{$campaign->campaign_forms->form_name}}
                                    @endif
                                    @if (isset($campaign->campaign_forms_exits))
                                    {{$campaign->campaign_forms_exits->form_name}}
                                    @endif
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Overall Total</th>
                                <th></th>
                                <th></th>
                                <th>{{$leadd}}</th>
                                <th>${{number_format($costt,2)}}</th>
                                <th>${{number_format($cpll,2)}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{-- Tab pending_approve  --}}
                <div class="tab-pane  fade show active" id="pending_approve" role="tabpanel" aria-labelledby="pending_approve-tab" style="display:none;">
                    <table id="campaign_list_pending" class="pending_approve table table-striped table-bordered datatable " style="width:100%">
                        <thead>
                            <tr>
                                <th>Off/On</th>
                                <th>Campaign Name</th>
                                <th>Delivery</th>
                                <th>Download Leads</th>
                                <th>Leads</th>
                                <th>Cost</th>
                                <th>CPL</th>
                                <th>Daily Budget</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Target Country </th>
                                <th>Form Used</th>
                            </tr>
                        </thead>
                        <tbody>



                            @forelse($campaignspending as $campaign)
                            <?php
                            $daily_bug = $daily_bug + $campaign->daily_budget;
                            $leadValue = get_campiagn_leads_by_id($campaign->id, $start_date, $end_date);
                            if ($leadValue > 0) {
                                array_push($output, $campaign->id);
                                $leadd = $leadd + $leadValue;
                            }

                            $costValue =  get_campiagn_cost_by_id($campaign->id, $start_date, $end_date) > 0 ? number_format(get_campiagn_cost_by_id($campaign->id, $start_date, $end_date), 2, '.', '') : 0;
                            $costt =  $costt + $costValue;
                            if ($leadValue === 0 && $costValue > 0) {
                                $cplValue = "";
                            } elseif ($leadValue > 0 && $costValue === 0) {
                                $cplValue = "";
                            } else {
                                if ($leadValue > 0 && $costValue > 0) {
                                    $cplValueWithoutFormatted =  number_format(get_campiagn_cost_by_id($campaign->id, $start_date, $end_date) / get_campiagn_leads_by_id($campaign->id, $start_date, $end_date), 2, '.', '');
                                    $cplValue = "$" .  $cplValueWithoutFormatted;

                                    $cpll = $cpll + $cplValueWithoutFormatted;
                                }else{
                                    $cplValue = 0;
                                }
                            }
                            ?>
                            <tr class="@if(($campaign->status==0) && ($campaign->approve==0)) delete_row @endif
                              @if($campaign->delivery ==2 ) draft @endif
                            ">
                                <td><input type="checkbox" name="status" @if($campaign->status) checked @endif data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$campaign->id}}"></td>
                                <td class="edit_btns">{{ $campaign->name }} <br>
                                    @if(($campaign->status==0) && ($campaign->approve==0)) @else <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-status="@if($campaign->status)1 @else 0 @endif" data-type="edit" class="editcampaign create-campaign-btn2">Edit</a> | @endif

                                    @if($campaign->delivery !=2 )
                                    <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-type="duplicate" class="duplicatecampaign create-campaign-btn2">Duplicate</a>
                                    @endif


                                    @if(($campaign->status==0) && ($campaign->approve==0)) @else

                                    @if($campaign->delivery !=2 ) | @endif <a href="{{ route("advertiser.campaigns.delete-camp",  $campaign->id ) }}" data-id="{{ $campaign->id }}" class="btn-danger1 delete_campaign">Delete</a> @endif
                                </td>
                                <td>
                                    @if(($campaign->status==0) && ($campaign->approve==0)) Deleted
                                    @else
                                    @if($campaign->delivery ==2)
                                    <span class="yellow">Draft</span>
                                    @elseif($campaign->approve ==1 )

                                    <span class="green">Active </span>
                                    @else
                                    <span class="orange">Pending<br />Approval</span>
                                    @endif
                                    @endif
                                </td>
                                <td><a href="{{ route('advertiser.campaignsformleads.export',$campaign->id) }}">XLSX </a> |
                                    <a href="{{ route('advertiser.campaignsformleads.exportcsv',$campaign->id) }}">CSV </a>
                                    {{-- |  <a href="{{ route('advertiser.campaignsleads.googlesheet',$campaign->id) }}">Google Sheet</a> --}}
                                </td>
                                <td for="leads_count">{{ get_campiagn_leads_by_id($campaign->id,$start_date,$end_date)}} </td>
                                <td>{{$costValue>0?"$" . $costValue:0}}</td>
                                <td>{{ $cplValue}}</td>
                                <td>${{ $campaign->daily_budget }}</td>
                                <td>@if($campaign->start_date !== '0000-00-00') {{ $campaign->start_date }} @endif</td>
                                <td>@if($campaign->approve && $campaign->status ) Ongoing @endif</td>
                                <td>{{ $campaign->target_country }} </td>
                                <td> @if (isset($campaign->campaign_forms))
                                    {{$campaign->campaign_forms->form_name}}
                                    @endif
                                    @if (isset($campaign->campaign_forms_exits))
                                    {{$campaign->campaign_forms_exits->form_name}}
                                    @endif
                                </td>
                            </tr>
                            @empty

                            @endforelse

                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Overall Total</th>
                                <th></th>
                                <th></th>
                                <th>{{$leadd}}</th>
                                <th>${{number_format($costt,2)}}</th>
                                <th>${{number_format($cpll,2)}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                {{-- Tab draft  --}}
                <div class="tab-pane  fade show active" id="draft" role="tabpanel" aria-labelledby="draft-tab" style="display:none;">
                    <table id="campaign_list_draft" class="draft table table-striped table-bordered datatable " style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Off/On</th>
                                <th>Campaign Name</th>
                                <th>Delivery</th>
                                <th>Download Leads</th>
                                <th>Leads</th>
                                <th>Cost</th>
                                <th>CPL</th>
                                <th>Daily Budget</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Target Country </th>
                                <th>Form Used</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($campaigns_draft as $campaign)
                            @php
                            $daily_bug= $daily_bug+$campaign->daily_budget;
                            $leadValue = get_campiagn_leads_by_id($campaign->id,$start_date,$end_date);
                            if ($leadValue > 0){
                            array_push($output,$campaign->id);
                            $leadd=$leadd+ $leadValue;
                            }
                            $costValue = get_campiagn_cost_by_id($campaign->id,$start_date,$end_date)>0?number_format(get_campiagn_cost_by_id($campaign->id,$start_date,$end_date), 2, '.', '' ):0;
                            $costt= $costt+ $costValue ;
                            if ($leadValue === 0 && $costValue > 0) {
                                $cplValue = "";
                            } elseif ($leadValue > 0 && $costValue === 0) {
                                $cplValue = "";
                            } else {
                                if ($leadValue > 0 && $costValue > 0) {
                                    $cplValueWithoutFormatted =  number_format(get_campiagn_cost_by_id($campaign->id, $start_date, $end_date) / get_campiagn_leads_by_id($campaign->id, $start_date, $end_date), 2, '.', '');
                                    $cplValue = "$" .  $cplValueWithoutFormatted;

                                    $cpll = $cpll + $cplValueWithoutFormatted;
                                }else{
                                    $cplValue = 0;
                                }
                            }
                            @endphp
                            <tr id="{{$campaign->id}}" class="@if(($campaign->status==0) && ($campaign->approve==0)) delete_row @endif
                             @if($campaign->delivery == 2 ) draft @endif
                            ">
                                <td>{{$campaign->id}}</td>
                                <td><input type="checkbox" name="status" @if($campaign->status) checked @endif data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$campaign->id}}"></td>
                                <td class="edit_btns">{{ $campaign->name }} <br>
                                    @if(($campaign->status==0) && ($campaign->approve==0)) @else <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-status="@if($campaign->status)1 @else 0 @endif" data-type="edit" class="editcampaign create-campaign-btn2">Edit</a> | @endif

                                    @if($campaign->delivery !=2 )
                                    <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-type="duplicate" class="duplicatecampaign create-campaign-btn2">Duplicate</a>
                                    @endif


                                    @if(($campaign->status==0) && ($campaign->approve==0)) @else

                                    @if($campaign->delivery !=2 ) | @endif <a href="{{ route("advertiser.campaigns.delete-camp",  $campaign->id ) }}" data-id="{{ $campaign->id }}" class="btn-danger1 delete_campaign">Delete</a> @endif
                                </td>
                                <td>
                                    @if(($campaign->status==0) && ($campaign->approve==0))
                                        Deleted
                                    @else
                                        @if($campaign->delivery == 2 )
                                            <span class="yellow">Draft</span>
                                        @elseif($campaign->approve ==1 )
                                            <span class="green">Active </span>
                                        @else
                                            <span class="orange">Pending<br />Approval</span>
                                        @endif
                                    @endif
                                </td>
                                <td><a href="{{ route('advertiser.campaignsformleads.export',$campaign->id) }}">XLSX </a> |
                                    <a href="{{ route('advertiser.campaignsformleads.exportcsv',$campaign->id) }}">CSV </a>
                                    {{-- |  <a href="{{ route('advertiser.campaignsleads.googlesheet',$campaign->id) }}">Google Sheet</a> --}}
                                </td>
                                <td for="leads_count">{{ get_campiagn_leads_by_id($campaign->id,$start_date,$end_date)}} </td>
                                <td>{{$costValue>0?"$" . $costValue:0}}</td>
                                <td>{{ $cplValue }}</td>
                                <td> ${{ $campaign->daily_budget }}</td>
                                <td>@if($campaign->start_date !== '0000-00-00') {{ $campaign->start_date }} @endif</td>
                                <td>@if($campaign->approve && $campaign->status ) Ongoing @endif</td>
                                <td>{{ $campaign->target_country }} </td>
                                <td> @if (isset($campaign->campaign_forms))
                                    {{$campaign->campaign_forms->form_name}}
                                    @endif
                                    @if (isset($campaign->campaign_forms_exits))
                                    {{$campaign->campaign_forms_exits->form_name}}
                                    @endif
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Overall Total</th>
                                <th></th>
                                <th></th>
                                <th>{{$leadd}}</th>
                                <th>${{number_format($costt,2)}}</th>
                                <th>${{number_format($cpll,2)}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                {{-- Tab trash  --}}
                <div class="tab-pane  fade show active" id="trash" role="tabpanel" aria-labelledby="trash-tab" style="display:none;">
                    <table id="campaign_list_trash" class="trash table table-striped table-bordered datatable " style="width:100%">
                        <thead>
                            <tr>
                                <th>Off/On</th>
                                <th>Campaign Name</th>
                                <th>Delivery</th>
                                <th>Download Leads</th>
                                <th>Leads</th>
                                <th>Cost</th>
                                <th>CPL</th>
                                <th>Daily Budget</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Target Country </th>
                                <th>Form Used</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($campaignstrash as $campaign)
                            @php
                            $daily_bug= $daily_bug+$campaign->daily_budget;
                            $leadValue = get_campiagn_leads_by_id($campaign->id,$start_date,$end_date);
                            $costValue = get_campiagn_cost_by_id($campaign->id,$start_date,$end_date)>0?number_format(get_campiagn_cost_by_id($campaign->id,$start_date,$end_date), 2, '.', '' ):0;
                            $costt= $costt+ $costValue ;
                            if ($leadValue === 0 && $costValue > 0) {
                                $cplValue = "";
                            } elseif ($leadValue > 0 && $costValue === 0) {
                                $cplValue = "";
                            } else {
                                if ($leadValue > 0 && $costValue > 0) {
                                    $cplValueWithoutFormatted =  number_format(get_campiagn_cost_by_id($campaign->id, $start_date, $end_date) / get_campiagn_leads_by_id($campaign->id, $start_date, $end_date), 2, '.', '');
                                    $cplValue = "$" .  $cplValueWithoutFormatted;
                                    $cpll = $cpll + $cplValueWithoutFormatted;
                                }else{
                                    $cplValue = 0;
                                }
                            }
                            @endphp
                            <tr class="@if(($campaign->status==0) && ($campaign->approve==0)) delete_row @endif
                            ">
                                <td><input type="checkbox" name="status" @if($campaign->status) checked @endif data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$campaign->id}}"></td>
                                <td class="edit_btns">{{ $campaign->name }} <br>
                                    @if(($campaign->status==0) && ($campaign->approve==0)) @else <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-status="@if($campaign->status)1 @else 0 @endif" data-type="edit" class="editcampaign create-campaign-btn2">Edit</a> | @endif
                                    @if($campaign->delivery !=2 )
                                    <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-type="duplicate" class="duplicatecampaign create-campaign-btn2">Duplicate</a>
                                    @endif
                                    @if(($campaign->status==0) && ($campaign->approve==0)) @else
                                    @if($campaign->delivery !=2 ) | @endif <a href="{{ route("advertiser.campaigns.delete-camp",  $campaign->id ) }}" data-id="{{ $campaign->id }}" class="btn-danger1 delete_campaign">Delete</a> @endif
                                </td>
                                <td>
                                    @if(($campaign->status==0) && ($campaign->approve==0)) Deleted
                                    @else
                                    @if($campaign->delivery ==2 )
                                    <span class="yellow">Draft</span>
                                    @elseif($campaign->approve ==1 )

                                    <span class="green">Active </span>
                                    @else
                                    <span class="orange">Pending<br />Approval</span>
                                    @endif
                                    @endif
                                </td>
                                <td><a href="{{ route('advertiser.campaignsformleads.export',$campaign->id) }}">XLSX </a> |
                                    <a href="{{ route('advertiser.campaignsformleads.exportcsv',$campaign->id) }}">CSV </a>
                                    {{-- |  <a href="{{ route('advertiser.campaignsleads.googlesheet',$campaign->id) }}">Google Sheet</a> --}}
                                </td>
                                <td for="leads_count">{{ get_campiagn_leads_by_id($campaign->id,$start_date,$end_date)}} </td>
                                <td>{{$costValue>0?"$" . $costValue:0}}</td>
                                <td>{{ $cplValue}}</td>
                                <td> ${{ $campaign->daily_budget }}</td>
                                <td>@if($campaign->start_date !== '0000-00-00') {{ $campaign->start_date }} @endif</td>
                                <td>@if($campaign->approve && $campaign->status ) Ongoing @endif</td>
                                <td>{{ $campaign->target_country }} </td>
                                <td> @if (isset($campaign->campaign_forms))
                                    {{$campaign->campaign_forms->form_name}}
                                    @endif
                                    @if (isset($campaign->campaign_forms_exits))
                                    {{$campaign->campaign_forms_exits->form_name}}
                                    @endif
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Overall Total</th>
                                <th></th>
                                <th></th>
                                <th>{{$leadd}}</th>
                                <th>${{number_format($costt,2)}}</th>
                                <th>${{number_format($cpll,2)}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Start Create campaign_create MODAL --}}
<div id="campaign_create_modal" style="max-width: 100vw;" class="modal fade right modal-lg" tabindex="-1" role="dialog">
    <div class="float-right h-100 m-0 modal-dialog w-100" style="max-width: 25rem;" role="document">
        <button type="button" class="close campaign_create_close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <form method="POST" action="{{ route('advertiser.campaigns.store.demo') }}" id="campaign_form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="0" name="draft_form_id" id="draft_form_id">
            <input type="hidden" value="0" name="campaign_id" id="input_campaign_id">
            <input type="hidden" value="{{ Auth::guard('advertiser')->user()->id }}" name="advertiser_id">
            <div class="modal-content h-100 ">
                <div class="modal-header bg-primary m-0 PageFormStyle py-0">
                    <div class="w-100">
                        <div class="row align-items-end justify-content-between pb-2">
                            <div class="col-lg-3 input-col">
                                <label class="form-label lp-dark mb-1 ar-16 ls-mt-2" for="campaign_name_Input"><b>Campaign Name</b></label>
                                <input type="text" class="form-control" id="campaign_name_Input" placeholder="eg. Lead_Gen1" name="campaign_name" required maxlength="30">
                            </div>
                            <div class="col-lg-3 text-right"><button id="submit" class="btn btn-light btn-xl">Create Campaign</button></div>
                        </div>
                        <div class="row py-2">
                            <div class="col-lg-3 input-col">
                                <label class="form-label lp-dark mb-1 ar-16" for="TargetCountryInput"><b>Country</b> <span id="text_white" class="ar-14 lp-dark">(from which leads are required)</span></label>
                                <select class="custom-select mr-sm-2" id="TargetCountryInput" name="target_country" required>
                                    <option value="" label="Select a country ... " selected="selected">Select a country ...</option>
                                    @foreach ($countries as $country)
                                    <option @if($user->country === $country->country_name) selected="selected" @endif value="{{ $country->country_name }}" label=" {{ $country->country_name }} "> {{ $country->country_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 input-col">
                                <label class="form-label lp-dark mb-1 ar-16" for="DailyBudgetInput"><b>Daliy Budget</b><i>*</i></label>
                                <div class="us_doller">
                                    <input type="text" class="form-control" id="DailyBudgetInput" name="daily_budget" placeholder="Daliy Budget" required>
                                </div>
                            </div>
                            <div class="col-lg-3 input-col ">
                                <label class=" form-label lp-dark mb-1 ar-16" for="TargetCostInput"><b>Target Cost Per Lead</b><i>*</i></label>
                                <div class="us_doller"><input type="text" class="form-control" id="TargetCostInput" name="target_cost" placeholder="Target Cost Per Lead" required>
                                </div>
                                {{-- <small class="form-text text-muted">You will get the leads within this cost on average. However, the cost per lead may vary on different days.</small> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body h-100" style="overflow-y: scroll">
                    <div id="error-message"></div>

                    <div class="row mb-3 PageFormStyle">
                        <div class=" col input-col ">
                            <div class=" d-flex SelectFormType ">
                                <div class="form-check mr-4">
                                    <input class="form-check-input SelectFormType" type="radio" name="SelectFormType" id="SelectFormType1" value="CreateNewForm" required >
                                    <label class="form-check-label" for="SelectFormType1">
                                        Create New Form
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input SelectFormType" type="radio" name="SelectFormType" id="SelectFormType2" value="UseExistingForm" required >
                                    <label class="form-check-label" for="SelectFormType2">
                                        Use An Existing Form
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row w-100">
                        <div class="col PageFormStyle formBlock" id="MainForm">
                            <div id="UseExistingForm" style="display: none">
                                <div class="card border h-100">
                                    <div class="card-header bg-primary">Form List</div>
                                    <div class="card-body p-3 input-col">
                                        @foreach ($forms as $form)
                                        <div class="form-check large-check">
                                            <input class="form-check-input" type="radio" name="form_id_existing" id="form_{{ $form->id }}" value="{{ $form->id }}" required onclick="updateformpreview_by_Id(event,this)">
                                            <label class="form-check-label" for="form_{{ $form->id }}">
                                                {{ $form->form_name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div id="CreateNewForm" style="display: none">
                                <div class="card lp-border h-100">
                                    <div class="card-header bg-primary cuxtom_pt_5">
                                        <div class="input-col">
                                            <label class="col-form-label ar-16" for="form_name" style=""><b>Form Name</b></label>
                                            <input type="text" class="form-control" id="form_name" name="form_name" placeholder="eg.  Zoho_Form_1" required="" minlength="3" style="max-width: 400px; padding: 5px!important;">
                                        </div>
                                    </div>
                                    <div class="card-body p-0 ">
                                        <div class="row align-items-end m-0 py-2 pb-3 company_row">

                                            <div class="col-lg-12">
                                                <label class="form-label lp-dark mb-1 ar-16" for="company_name_Input"><b>Company/Brand Name</b>
                                                    <span id="text_white" class="ar-14 lp-dark">(Optional)</span>
                                                </label>
                                                <div class="input-col">
                                                    <input type="text" name="logo_comapny" class="logo_comapny">
                                                </div>

                                            </div>

                                            <div class="col-lg-3 ">


                                                <input type="text" class="form-control" id="company_name_Input" placeholder="eg. {{ auth()->guard('advertiser')->user()->company_name }}" name="company_name" maxlength="30">

                                            </div>
                                            <div class="col-lg-6 input-col d-flex  flex-wrap align-items-center">
                                                <div class="upload-box" style="height: 53px; ">
                                                    <input type="file" name="company_logo" id="form_company_logo" class="inputfile inputfile-1" accept="image/jpeg, image/png">
                                                    <label for="form_company_logo"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                                        </svg> <span>Upload Logo*</span></label>
                                                </div>
                                                <div id="company_logo_preview" class="img_preview_box">
                                                    <a href="#" class="text-danger del-preview">
                                                        <i class="fas fa-times-circle"></i></a>
                                                    <img id="company_logo_img" src="#" alt="company_logo_img" style="display: none" />
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row m-0">
                                            <div class="col-4 pt-0  h-100 leftForm lp-border-right">
                                                <div class="fbox bg-blue">
                                                    <h4 class="gray_title top"> Add Product/Service Details</h4>
                                                    <div>
                                                        <label class="col-form-label ar-16" for="FormTitleInput_1 "><b>Product/Service/Offer</b>
                                                            <span class="ar-14">(Add up to 3 variations)</span></label>
                                                        <div id="form_title_1">
                                                            <div class="input-group input-col">
                                                                <input type="text" class="form-control" id="FormTitleInput_1" name="form_title[1]" placeholder="eg. Start a Free 30-day Trial" required="" minlength="3" maxlength="25">
                                                                <div class="input-group-append bg-none">
                                                                    <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#form_title_2', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="form_title_2" style="display: none">
                                                            <div class="input-group input-col my-3">
                                                                <input type="text" class="form-control" id="FormTitleInput_2" name="form_title[2]" placeholder="eg. Start a Free 30-day Trial" minlength="3" maxlength="25">
                                                                <div class="input-group-append bg-none">
                                                                    <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#form_title_3', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="form_title_3" style="display: none">
                                                            <div class="input-group input-col">
                                                                <input type="text" class="form-control" id="FormTitleInput_3" name="form_title[3]" placeholder="eg. Start a Free 30-day Trial" minlength="3" maxlength="25">
                                                                <div class="input-group-append bg-none">
                                                                    <div class="input-group-text"> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="col-form-label mt-3 ar-16" for="form_desc_1_Input"><b>Product/Service/Offer Description </b> <span class="ar-14">(Add up to 3 variations)</span></label>
                                                    <div id="FormDescription_1">
                                                        <div class="input-group input-col my-3">
                                                            <input type="text" class="form-control" id="form_desc_1_Input" name="form_desc[1]" placeholder="40k+ companies run on Zoho" required minlength="3" maxlength="68">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#FormDescription_2', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="FormDescription_2" style="display: none">
                                                        <div class="input-group input-col my-3">
                                                            <input type="text" class="form-control" id="form_desc_2_Input" name="form_desc[2]" placeholder="Over 40k companies run their business with Zoho" minlength="3" maxlength="68">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#FormDescription_3', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="FormDescription_3" style="display: none">
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control" id="form_desc_3_Input" name="form_desc[3]" placeholder="Over 40k companies run their business with Zoho" minlength="3" maxlength="68">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label class="col-form-label mt-3 ar-16" for="FormPunchlineInput"><b>Unique Selling Proposition </b><span class="ar-14">(Why someone should buy your product or service) / </span><b>Offer Validity</b></label>
                                                    <div id="form_title_1">
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control" id="FormPunchlineInput" name="form_punchline" placeholder="eg. No Credit Card Required." maxlength="23">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fbox">
                                                    <h4 class="gray_title"> Add Up to 6 Creatives <small class="title-small">(One of the creatives will be shown randomly and optimized)</small> </h4>
                                                    <label class="col-form-label ar-16"><b>Youtube Videos </b><span class="ar-14"> </span> </label>



                                                    <div class="custom_image_video">
                                                        <div class="input-group input-col" id="video_image_1">
                                                            <div class="input-col " style="width: 88%;">
                                                                <div class="video_1  upload-box grey image">

                                                                    <label class="add_video" data-id="1">
                                                                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                                            <defs>
                                                                                <style>
                                                                                    .cls-1 {
                                                                                        fill: none;
                                                                                        stroke: #000;
                                                                                        stroke-linecap: round;
                                                                                        stroke-linejoin: round;
                                                                                        stroke-width: 2px;
                                                                                    }
                                                                                </style>
                                                                            </defs>
                                                                            <title />
                                                                            <g id="plus">
                                                                                <line class="cls-1" x1="16" x2="16" y1="7" y2="25" />
                                                                                <line class="cls-1" x1="7" x2="25" y1="16" y2="16" />
                                                                            </g>
                                                                        </svg> <span>Add Video</span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group input-col" id="video_image_2">
                                                            <div class="input-col " style="width: 88%;">
                                                                <div class="video_2  upload-box grey image" data-id="2">

                                                                    <label class="add_video" data-id="2">
                                                                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                                            <defs>
                                                                                <style>
                                                                                    .cls-1 {
                                                                                        fill: none;
                                                                                        stroke: #000;
                                                                                        stroke-linecap: round;
                                                                                        stroke-linejoin: round;
                                                                                        stroke-width: 2px;
                                                                                    }
                                                                                </style>
                                                                            </defs>
                                                                            <title />
                                                                            <g id="plus">
                                                                                <line class="cls-1" x1="16" x2="16" y1="7" y2="25" />
                                                                                <line class="cls-1" x1="7" x2="25" y1="16" y2="16" />
                                                                            </g>
                                                                        </svg> <span>Add Video</span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group input-col" id="video_image_3">
                                                            <div class="input-col " style="width: 88%;">
                                                                <div class="video_3  upload-box grey image" data-id="3">
                                                                    <label class="add_video" data-id="3">
                                                                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                                            <defs>
                                                                                <style>
                                                                                    .cls-1 {
                                                                                        fill: none;
                                                                                        stroke: #000;
                                                                                        stroke-linecap: round;
                                                                                        stroke-linejoin: round;
                                                                                        stroke-width: 2px;
                                                                                    }
                                                                                </style>
                                                                            </defs>
                                                                            <title />
                                                                            <g id="plus">
                                                                                <line class="cls-1" x1="16" x2="16" y1="7" y2="25" />
                                                                                <line class="cls-1" x1="7" x2="25" y1="16" y2="16" />
                                                                            </g>
                                                                        </svg> <span>Add Video</span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Youtube_1" style="display:none;">
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control" id="Youtube_URL_1_Input" name="youtube_1" placeholder="Youtube Video Url 1" maxlength="255">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#Youtube_2', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="Youtube_2" style="display: none">
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control my-3" id="Youtube_URL_2_Input" name="youtube_2" placeholder="Youtube Video Url 2" maxlength="255">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#Youtube_3', event)"><i class="fas fa-plus-circle"></i></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Youtube_3" style="display: none">
                                                        <div class="input-group input-col">
                                                            <input type="text" class="form-control" id="Youtube_URL_3_Input" name="youtube_3" placeholder="Youtube Video Url 3" maxlength="255">
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- <label class="col-form-label mt-4" ><b>Upload upto 3 images</b> (Add up to 3 variations) </label> -->
                                                    <label class="col-form-label mt-3 ar-16"><b>Images</b></label>
                                                    <div class="custom_image_upload">
                                                        <div class="input-group input-col" id="upload_image_1">
                                                            <div class="input-col " style="width: 88%;">
                                                                <div class="upload-box grey image">
                                                                    <input type="file" name="image_1" id="image_1_Input" class="inputfile inputfile-1" accept="image/jpeg, image/png">
                                                                    <label for="image_1_Input">
                                                                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                                            <defs>
                                                                                <style>
                                                                                    .cls-1 {
                                                                                        fill: none;
                                                                                        stroke: #000;
                                                                                        stroke-linecap: round;
                                                                                        stroke-linejoin: round;
                                                                                        stroke-width: 2px;
                                                                                    }
                                                                                </style>
                                                                            </defs>
                                                                            <title />
                                                                            <g id="plus">
                                                                                <line class="cls-1" x1="16" x2="16" y1="7" y2="25" />
                                                                                <line class="cls-1" x1="7" x2="25" y1="16" y2="16" />
                                                                            </g>
                                                                        </svg> <span>Add images</span></label>
                                                                </div>
                                                                <div id="image_1_img_preview" class="img_preview_box">
                                                                    <a href="#" class="text-danger del-preview"><i class="fas fa-times-circle"></i></a>
                                                                    <img id="image_1_img" src="#" alt="image_1_img" />
                                                                </div>
                                                            </div>
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#upload_image_2', event)">
                                                                        <!-- <i class="fas fa-plus-circle"></i></i> -->
                                                                    </a></div>
                                                            </div>
                                                        </div>

                                                        <div class="input-group input-col" id="upload_image_2">
                                                            <div class="input-col flex-wrap" style="width: 88%;">
                                                                <div class="upload-box grey image">
                                                                    <input type="file" name="image_2" id="image_2_Input" class="inputfile inputfile-1" accept="image/jpeg, image/png">
                                                                    <label for="image_2_Input"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                                            <defs>
                                                                                <style>
                                                                                    .cls-1 {
                                                                                        fill: none;
                                                                                        stroke: #000;
                                                                                        stroke-linecap: round;
                                                                                        stroke-linejoin: round;
                                                                                        stroke-width: 2px;
                                                                                    }
                                                                                </style>
                                                                            </defs>
                                                                            <title />
                                                                            <g id="plus">
                                                                                <line class="cls-1" x1="16" x2="16" y1="7" y2="25" />
                                                                                <line class="cls-1" x1="7" x2="25" y1="16" y2="16" />
                                                                            </g>
                                                                        </svg> <span>Add images</span></label>
                                                                </div>
                                                                <div id="image_2_img_preview" class="img_preview_box">
                                                                    <a href="#" class="text-danger del-preview">
                                                                        <i class="fas fa-times-circle"></i>
                                                                    </a>
                                                                    <img id="image_2_img" src="#" alt="image_2_img" />
                                                                </div>
                                                            </div>
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> <a href="#" class="text-success" onClick="show_next('#upload_image_3', event)">
                                                                        <!-- <i class="fas fa-plus-circle"></i></i> -->
                                                                    </a></div>
                                                            </div>
                                                        </div>

                                                        <div class="input-group input-col" id="upload_image_3">
                                                            <div class="input-col" style="width: 88%;">
                                                                <div class="upload-box grey image">
                                                                    <input type="file" name="image_3" id="image_3_Input" class="inputfile inputfile-1" accept="image/jpeg, image/png">
                                                                    <label for="image_3_Input"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                                            <defs>
                                                                                <style>
                                                                                    .cls-1 {
                                                                                        fill: none;
                                                                                        stroke: #000;
                                                                                        stroke-linecap: round;
                                                                                        stroke-linejoin: round;
                                                                                        stroke-width: 2px;
                                                                                    }
                                                                                </style>
                                                                            </defs>
                                                                            <title />
                                                                            <g id="plus">
                                                                                <line class="cls-1" x1="16" x2="16" y1="7" y2="25" />
                                                                                <line class="cls-1" x1="7" x2="25" y1="16" y2="16" />
                                                                            </g>
                                                                        </svg> <span>Add images</span></label>
                                                                </div>
                                                                <div id="image_3_img_preview" class="img_preview_box">
                                                                    <a href="#" class="text-danger del-preview">
                                                                        <i class="fas fa-times-circle"></i>
                                                                    </a>
                                                                    <img id="image_3_img" src="#" alt="image_3_img" style="display: none" />
                                                                </div>
                                                            </div>
                                                            <div class="input-group-append bg-none">
                                                                <div class="input-group-text"> </div>
                                                            </div>




                                                        </div>


                                                    </div>
                                                    <div class="input-group input-col create_qty_error">
                                                        <input type="text" name="create_qty" class="form-control create_qty">
                                                    </div>



                                                </div>
                                            </div>
                                            <div class="col rightForm">
                                                <div class="row">
                                                    <div class="col-12 padding">
                                                        <h5 class="my-2">Lead Form Fields <small class="title-small2">(Add Up to 5 Fields)</small></h5>
                                                        <div class="input-col"> <input type="text" name="min_row_validation" style=" border: none;  height: 1px;
padding: 0; display: block; opacity: 0;">
                                                        </div>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" width="10px">#</th>
                                                                    <th scope="col" style="min-width: 100px;">
                                                                        <div class="ar-16">Required</div>
                                                                    </th>
                                                                    <th scope="col"><span class="ar-16">Fileds</span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="sortable" data-row='3'>
                                                                <tr class="sortable-group row_1">
                                                                    <td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>
                                                                        <input type="hidden" class="sort" name="field_1[sort]" value="1">
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" checked class="InputQuestion_Required" name="field_1[required]">
                                                                    </td>
                                                                    <td>{{-- <small class="type">Short Answer</small> --}}
                                                                        <input type="text" readonly class="small_info InputQuestionType" name="field_1[question_type]" value="ShortAnswer" required>
                                                                        <div class="input-group input-col">
                                                                            <input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_1[question_text]" value="Full Name" required="" maxlength="39">
                                                                            <div class="input-group-append bg-white">
                                                                                <div class="input-group-text">
                                                                                    <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a>
                                                                                </div>
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
                                                                    <td>{{-- <small class="type">Short Answer</small> --}}
                                                                        <input type="text" readonly class="small_info InputQuestionType" name="field_2[question_type]" value="ShortAnswer" required>
                                                                        <div class="input-group input-col">
                                                                            <input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_2[question_text]" value="Email id" required="" maxlength="39">
                                                                            <div class="input-group-append bg-white">
                                                                                <div class="input-group-text">
                                                                                    <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a>
                                                                                </div>
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
                                                                    <td>{{-- <small class="type">Short Answer</small> --}}
                                                                        <input type="text" readonly class="small_info InputQuestionType" name="field_3[question_type]" value="ShortAnswer" required>
                                                                        <div class="input-group input-col">
                                                                            <input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_3[question_text]" value="Phone Number" required="" maxlength="39">
                                                                            <div class="input-group-append bg-white">
                                                                                <div class="input-group-text">
                                                                                    <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <div class="dropdown  my-3">
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

                        </div>
                        {{-- --}}

                        {{-- --}}
                        <div class="col" id="formPreview">
                            <div class=" mb-4">
                                <h3 class=" gray formPreview_title"> Form Preview</h3>
                                <div class=" ">
                                    <div id="formPreviewBLock">
                                        <div class="container w-100">
                                            <form id="LeadForm" action="#">

                                                <div class="form-bottom-logo">
                                                    <p class="logo">
                                                        <span id="preview_company_logo"> </span>
                                                        <span id="preview_company_name"> A1 Immigration Consultancy</span>
                                                    </p>
                                                </div>
                                                <div>
                                                    <div id="loadData">
                                                        <div class="video custom_after_text border-bottom shadow" id="preview_media">
                                                            <div class="">Add Creative</div>
                                                        </div>
                                                        <h2 id="preview_form_title" class="form-title"></h2>
                                                        <p id="preview_form_sub_title" class="form-subtitle"> </p>
                                                        <p id="preview_Punchline" class="form-punchline"> </p>

                                                        <div class="form-row" id="preview_filed_1"> </div>
                                                        <div class="form-row" id="preview_filed_2"> </div>
                                                        <div class="form-row" id="preview_filed_3"> </div>
                                                        <div class="form-row" id="preview_filed_4"> </div>
                                                        <div class="form-row" id="preview_filed_5"> </div>

                                                    </div>
                                                    <div class="form-row mt-3">
                                                        <button type="submit" id="saveData" class="form-btn" disabled>Submit</button>
                                                        <p class="policy">I agree to your <a href="https://www.leadspaid.com/privacy-policy" class="privcy-polcy" rel="noindex, nofollow" target="_blank"> privacy policy </a> by submitting this form.</p>

                                                    </div>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close close_youtube" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Add Youtube video link</label>
                    <input type="text" name="video" data-video="" class="form-control youtube_video">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_youtube" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save_youtube">Add Video</button>
            </div>
        </div>
    </div>
</div>




{{-- End Create campaign_create MODAL --}}
@endsection
@push('breadcrumb-plugins')
<!--button class="btn btn--primary create-campaign-btn"><i class="fas fa-plus"></i> Create Campaign</button-->
@endpush
@push('script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin/js/vendor/datepicker.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/datepicker.en.js')}}"></script>

<!-- loading Jquery Start-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-loading/1.3.0/jquery.loading.min.js"></script>
<!-- Loading Jquery End-->

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="{{asset('assets/admin/js/vendor/tagsinput/bootstrap-tagsinput.css')}}">
<script src="{{asset('assets/admin/js/vendor/tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/jeffreydwalter/ColReorderWithResize@9ce30c640e394282c9e0df5787d54e5887bc8ecc/ColReorderWithResize.js"></script>

<script>
    'use strict';
    $(function() {
        $(document).ready(function() {
            //Date Range
            var isSearched = new URLSearchParams(window.location.search).get('startDate') == null ? false : true;
            var datee = new Date((new URLSearchParams(window.location.search)).get('startDate'));
            var startDate = (Number(datee.getMonth()) + 1) + "/" + datee.getDate() + "/" + datee.getFullYear()
            var datee = new Date((new URLSearchParams(window.location.search)).get('endDate'));
            var endDate = (Number(datee.getMonth()) + 1) + "/" + datee.getDate() + "/" + datee.getFullYear()
            $('#daterange').daterangepicker({
                ranges: {
                    'Today': [moment(), moment().add(1, 'days')],
                    'Yesterday': [moment().subtract(1, 'days'), moment()],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment().add(1, 'days')],
                    'Last 30 Days': [moment().subtract(30, 'days'), moment().add(1, 'days')],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'All Time': [moment("<?php echo date_format(auth()->guard('advertiser')->user()->created_at, "Y-m-d") ?>", 'YYYY-MM-DD'), moment().add(1, 'days')]

                },
                minDate:moment("<?php echo date_format(auth()->guard('advertiser')->user()->created_at, "Y-m-d") ?>", 'YYYY-MM-DD'),
                "alwaysShowCalendars": true,
                "startDate": isSearched ? startDate : moment().subtract(6, 'days'),
                "endDate": isSearched ? endDate : moment().add(1, 'days'),
                "opens": "left",
                "drops": "auto"
            }, function(start, end, label) {
                $('#startDate').val(start.format('YYYY-MM-DD'));
                $('#endDate').val(end.format('YYYY-MM-DD'));
                $('#RangeForm').submit();
                console.log('New date range selected: ' + +' to ' + end.format('MM-DD-YYYY') + ' (predefined range: ' + label + ')');
            });
        });

    });
    $('input[type=radio][name=SelectFormType]').on('change', function() {
        var type = $(this).val();
        if (type === 'CreateNewForm') {
            $('#CreateNewForm').show();
            $('#UseExistingForm').hide();
            $('#MainForm').removeClass('UseExistingCol');
            $('input[type=radio][name=form_id]').prop('checked', false);
        } else if (type === 'UseExistingForm') {
            $('#CreateNewForm').hide();
            $('#UseExistingForm').show();
            $('#MainForm').addClass('UseExistingCol');
        }

    });
    $('.toggle-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        $(".editcampaign").attr('data-status', status);
        var campaign_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{route('advertiser.campaigns.status')}}",
            data: {
                'status': status,
                'campaign_id': campaign_id
            },
            success: function(data) {
                if (data.success) {
                    Toast('green', 'Campaign successfully active');
                } else {
                    Toast('red', 'Campaign successfully inactive');
                }
            }
        });
    });

    var campaign_create_modal = $('#campaign_create_modal');
    campaign_create_modal.on('hidden.bs.modal', function(event) {
        reset_campaign_create_form();
        updateformpreview();
    })
    $('.create-campaign-btn').on('click', function(e) {
        e.preventDefault();
        $(".img_preview_box").hide();
        $(".row_4").remove();
        $(".row_5").remove();
        $("#form_company_logo").value = ' ';
        $(".leftForm").find('input').prop('readonly', false);
        $(".rightForm").find('input').prop('readonly', false);
        $("#preview_company_logo").hide();;
        $("#preview_company_name").html('');
        $('#company_logo_img').attr('src', '');
        $("#Youtube_1").find('input').val('');
        $("#Youtube_2").find('input').val('');
        $("#Youtube_3").find('input').val('');
        $("#video_image_1").find(".youtube_iframe").remove();
        $("#video_image_2").find(".youtube_iframe").remove();
        $("#video_image_3").find(".youtube_iframe").remove();
        setTimeout(function() {
            updateformpreview();
            updateformpreviewtext();
        }, 2000);
        campaign_create_modal.modal('show');
        $("#campaign_form").find("#submit").text('Create Campaign');
        validate_form_data();

        var validator = $("#campaign_form").validate();
        validator.resetForm();
        $("#campaign_form").find('.has-error').removeClass("has-error");
        $("#campaign_form").find('.has-success').removeClass("has-success");
        $('#campaign_form').find('.form-control-feedback').remove();
        $('#campaign_form').find('input').removeClass('is-invalid');
        $("#CreateNewForm").hide();
        $("#UseExistingForm").hide();
        $("#campaign_create_modal").attr('data-status', 'create');
    });


    form_company_logo.onchange = evt => {
        const [file] = form_company_logo.files;
        if (file) {
            company_logo_img.src = URL.createObjectURL(file);
            company_logo_img.style.display = "block";
            company_logo_preview.style.display = "block";
            $(".logo_comapny").val(1);
            updateformpreviewtext();
            CampaignAutoSave();
        } else {
            $(".logo_comapny").val('');
        }
    }
    image_1_Input.onchange = evt => {
        const [file] = image_1_Input.files;
        if (file) {
            image_1_img.src = URL.createObjectURL(file);
            image_1_img.style.display = "block";
            image_1_img_preview.style.display = "block";
            updateformpreview();
        }
    }
    image_2_Input.onchange = evt => {
        const [file] = image_2_Input.files;
        if (file) {
            image_2_img.src = URL.createObjectURL(file);
            image_2_img.style.display = "block";
            image_2_img_preview.style.display = "block";
            updateformpreview();
        }
    }
    image_3_Input.onchange = evt => {
        const [file] = image_3_Input.files;
        if (file) {
            image_3_img.src = URL.createObjectURL(file);
            image_3_img.style.display = "block";
            image_3_img_preview.style.display = "block";
            updateformpreview();
        }
    }

    $('.del-preview').on('click', function() {
        $(this).next('img').attr('src', '#');
        $(this).parent().hide();
        var
            upload_box = $(this).parent().prev('.upload-box');
        $
            ('.inputfile', upload_box).val("");
        if ($("#company_name_Input").val() == "") {
            $(".logo_comapny").val('');
        }
        setTimeout(function() {

            updateformpreview();

        }, 500);
    });

    function show_next(id, event) {
        $(id).show();
        event.target.style.display = 'none';
    }

    $('table').on('click', '.del-row', function(e) {
        var table = $('#sortable');
        var row = table.attr('data-row');
        row = --row;
        table.attr('data-row', row);
        $(this).closest('tr').remove();
        update_field();
        CampaignAutoSave();
    })

    $('table').on('click', '.del-option', function(e) {
        var options_block = $(this).parent().parent().parent();
        var options_section = options_block.parent();
        var btn_add_option = $('.btn-add-option', options_section);
        var option = btn_add_option.attr('data-option');
        btn_add_option.attr('data-option', --option);
        $(this).closest('.input-group.option').remove();

        update_options(options_section);
    })

    $('body').on('click', '.btn-add-option', function(e) {
        // var options_block = $(this).closest('.options-section');
        var options_block = $(this).parent().prev();
        var options_section = options_block.parent();
        var row = $(this).attr('data-row');
        var option = $(this).attr('data-option');
        if (option <= 6) {
            var name = 'field_' + row + '[option_' + option + ']';
            var placeholder = "Option " + option;
            var html = '<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="' + placeholder + '" name="' + name + '"  maxlength="30"><div class="input-group-text"> <a href="#" class="text-danger del-option"><i class="fas fa-times-circle"></i></a></div></div>';
            $(options_block).append(html);
            update_options(options_section);
            makeinoputcharateruppercase();
        } else {
            Toast('red', 'Only 6 Options Allowed');
        }

    });

    function update_options(options_section) {
        var options_block = $(options_section).find(".options-block");
        var btn_add_option = $('.btn-add-option', options_section);
        var row = btn_add_option.attr('data-row');
        var i = 1;
        $('.input-group.option', options_block).each(function(k, el) {
            $(el).find("input").attr('name', 'field_' + row + '[option_' + i + ']').attr('placeholder', "Option " + i);
            i++;
        });
        btn_add_option.attr('data-option', i);
        updateformpreviewtext();
    }


    function update_field() {
        var i = 1;
        $('#sortable .sortable-group').each(function(k, el) {
            $(el).removeClass(function(index, className) {
                return (className.match(/(^|\s)row_\S+/g) || []).join(' ');
            });
            $(el).addClass('row_' + i);
            // if(i <=3){
            $(el).find(".InputQuestion_text").prop("required", true);
            // }else{
            //     $(el).find(".InputQuestion_text").prop("required", false).removeClass('is-invalid');
            // }
            $(el).find("input.sort").val(i).attr('name', 'field_' + i + '[sort]');
            $(el).find(".InputQuestionType").attr('name', 'field_' + i + '[question_type]');
            $(el).find(".InputQuestion_Required").attr('name', 'field_' + i + '[required]');
            $(el).find(".InputQuestion_text").attr('name', 'field_' + i + '[question_text]');
            $(el).find(".btn-add-option").attr('data-row', i);
            var options_section = $(el).find(".options-section");
            update_options(options_section);
            i++;
        });
        updateformpreviewtext();
    }

    function add_form_field(type) {
        var table = $('#sortable');
        var row = table.attr('data-row');
        row = ++row;
        if (row <= 5) {
            var html = '<tr class="sortable-group">';
            html += '<td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>';
            html += '<input type="hidden" class="sort" name="field_' + row + '[sort]" value="' + row + '">';
            html += '</td>';
            html += '<td>';
            html += '<input type="checkbox" checked class="InputQuestion_Required" name="field_' + row + '[required]">';
            html += '</td>';
            html += '<td>';

            if (type == 'multiple') {
                html += '<input type="text" readonly class="small_info InputQuestionType" name="field_' + row + '[question_type]" value="MultipleChoice" required>';
            } else {
                html += '<input type="text" readonly class="small_info InputQuestionType" name="field_' + row + '[question_type]" value="ShortAnswer" required>';
            }
            html += '<div class="input-group input-col">';
            html += '<input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_' + row + '[question_text]" required maxlength="39">';
            html += '<div class="input-group-append bg-white">';
            html += '<div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>';
            html += '</div>';
            html += '</div>';
            if (type == 'multiple') {
                html += '<div class="options-section">';
                html += '<div class="pl-5 options-block">';
                html += '<div class="input-group option"><input type="text" class="form-control mt-3 mb-3" placeholder="Option 1" name="field_' + row + '[option_1]" required maxlength="30"><div class="input-group-text ">  </div></div>';
                html += '<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="Option 2" name="field_' + row + '[option_2]" required  maxlength="30"><div class="input-group-text">  </div></div>';
                html += '<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="Option 3" name="field_' + row + '[option_3]"  maxlength="30"><div class="input-group-text"> <a href="#" class="text-danger del-option"><i class="fas fa-times-circle"></i></a></div></div>';
                html += '<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="Option 4" name="field_' + row + '[option_4]"  maxlength="30"><div class="input-group-text"> <a href="#" class="text-danger del-option"><i class="fas fa-times-circle"></i></a></div></div>';
                html += '</div>';
                html += '<div class="pl-5"><a class="btn-add-option btn"  data-row="' + row + '" data-option="5">+ Add Option</a></div>';
                html += '</div>';
            }
            html += '</td>';
            html += '</tr>';
            table.append(html).attr('data-row', row);
            update_field();
            validate_custom_field();
            updateformpreviewtext();
            makeinoputcharateruppercase();
        } else {
            Toast('red', "Only 5 fields allowed");
        }
    }

    function add_form_field_2(row_num, type) {
        var table = $('#sortable');
        var row = table.attr('data-row');
        row = row_num;
        if (row <= 5) {
            var html = '';
            html += '<td class="handle ui-sortable-handle"><i class="fa fa-solid fa-grip-vertical"></i>';
            html += '<input type="hidden" class="sort" name="field_' + row + '[sort]" value="' + row + '">';
            html += '</td>';
            html += '<td>';
            html += '<input type="checkbox" checked class="InputQuestion_Required" name="field_' + row + '[required]">';
            html += '</td>';
            html += '<td>';

            if (type == 'multiple') {
                html += '<input type="text" readonly class="small_info InputQuestionType" name="field_' + row + '[question_type]" value="MultipleChoice" required>';
            } else {
                html += '<input type="text" readonly class="small_info InputQuestionType" name="field_' + row + '[question_type]" value="ShortAnswer" required>';
            }
            html += '<div class="input-group input-col">';
            html += '<input type="text" class="form-control InputQuestion_text" placeholder="Enter Your Question" name="field_' + row + '[question_text]" required maxlength="39">';
            html += '<div class="input-group-append bg-white">';
            html += '<div class="input-group-text"> <a href="#" class="text-danger del-row"><i class="fas fa-times-circle"></i></a></div>';
            html += '</div>';
            html += '</div>';
            if (type == 'multiple') {
                html += '<div class="options-section">';
                html += '<div class="pl-5 options-block">';
                html += '<div class="input-group option"><input type="text" class="form-control mt-3 mb-3" placeholder="Option 1" name="field_' + row + '[option_1]" required maxlength="30"><div class="input-group-text ">  </div></div>';
                html += '<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="Option 2" name="field_' + row + '[option_2]" required  maxlength="30"><div class="input-group-text">  </div></div>';
                html += '<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="Option 3" name="field_' + row + '[option_3]"  maxlength="30"><div class="input-group-text"> <a href="#" class="text-danger del-option"><i class="fas fa-times-circle"></i></a></div></div>';
                html += '<div class="input-group option"><input type="text" class="form-control mb-3" placeholder="Option 4" name="field_' + row + '[option_4]"  maxlength="30"><div class="input-group-text"> <a href="#" class="text-danger del-option"><i class="fas fa-times-circle"></i></a></div></div>';
                html += '</div>';
                html += '<div class="pl-5"><a class="btn-add-option btn"  data-row="' + row + '" data-option="5">+ Add Option</a></div>';
                html += '</div>';

            }
            html += '</td>';
            html += '';
            $(".row_" + row_num).html(html);
            //table.append(html).attr('data-row', row);
            update_field();
            validate_custom_field();
            updateformpreviewtext();
            makeinoputcharateruppercase();

        } else {
            Toast('red', "Only 5 fields allowed");
        }
    }

    function reset_campaign_create_form() {
        $('#campaign_createModalLabel').html('Create Campaign');
        $('#campaign_create_modal form').trigger("reset");
        $('#input_campaign_id').val(0);
        $('#draft_form_id').val(0);
    }

    $(document).ready(function() {
        var campaign_list_live = $('#campaign_list_live').DataTable({
            columnDefs: [{
                    targets: 0,
                    searchable: true,
                    visible: true,
                    orderable: true
                },
                {
                    targets: 2,
                    searchable: true,
                    orderable: true
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
            ],
            "sDom": 'Lfrtlip',
            "language": {
                "lengthMenu": "Show rows  _MENU_",
                search: "",
                searchPlaceholder: "Search"
            }
        });

        var campaign_list_pending = $('#campaign_list_pending').DataTable({
            columnDefs: [{
                    targets: 0,
                    searchable: true,
                    visible: true,
                    orderable: true
                },
                {
                    targets: 2,
                    searchable: true,
                    orderable: true
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
            ],
            "sDom": 'Lfrtlip',
            "language": {
                "lengthMenu": "Show rows  _MENU_",
                search: "",
                searchPlaceholder: "Search"
            }
        });
        var campaign_list_draft = $('#campaign_list_draft').DataTable({
            order:[0,"desc"],
            columnDefs: [{
                    targets: 0,
                    searchable: false,
                    visible: false,
                    orderable: true,

                },{
                    targets: 1,
                    searchable: true,
                    visible: true,
                    orderable: true
                },
                {
                    targets: 3,
                    searchable: true,
                    orderable: true
                },
                {
                    targets: 12,
                    searchable: false,
                    visible: true,
                    orderable: false
                },
                {
                    targets: [8, 9, 10, 11],
                    className: "td-small",
                    width: "10px"
                },
                {
                    targets: '_all',
                    visible: true
                }
            ],
            "sDom": 'Lfrtlip',
            "language": {
                "lengthMenu": "Show rows  _MENU_",
                search: "",
                searchPlaceholder: "Search"
            }
        });
        var campaign_list_trash = $('#campaign_list_trash').DataTable({
            columnDefs: [{
                    targets: 0,
                    searchable: true,
                    visible: true,
                    orderable: true
                },
                {
                    targets: 2,
                    searchable: true,
                    orderable: true
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
            ],
            "sDom": 'Lfrtlip',
            "language": {
                "lengthMenu": "Show rows  _MENU_",
                search: "",
                searchPlaceholder: "Search"
            }
        });

        campaign_create_modal.on('hidden.bs.modal', function(event) {
            var rows = campaign_list_draft.rows(0).data() ;
            var max = 0;
            $('#campaign_list_draft tr').each(function() { var value = parseInt($(this).attr('id')); max = (value > max) ? value : max; });
            var last_id = rows[0]['DT_RowId'];
              $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{route('advertiser.campaigns.get_last_draft')}}",
                    success: function(data) {
                        if (data.success) {
                            console.log(data.row)
                            if(data.row.id > max){
                                var url_edit = '{{  route("advertiser.campaigns.edit", ":id") }}';
                                url_edit = url_edit.replace(':id', data.row.id);
                                var url_del = '{{  route("advertiser.campaigns.delete-camp", ":id") }}';
                                url_del = url_del.replace(':id', data.row.id);

                                var toggle_button = '';

                            var camp_name = data.row.name +' <br/> <a href="'+url_edit+'" data-id="'+ data.row.id +'" data-status="1" data-type="edit" class="editcampaign create-campaign-btn2">Edit</a> | <a href="'+url_del+'" data-id="'+ data.row.id +'" class="btn-danger1 delete_campaign">Delete</a>';

                            var url_XLSX = '{{ route("advertiser.campaignsformleads.export",":id") }}';
                                url_XLSX = url_XLSX.replace(':id', data.row.id);
                                var url_CSV = '{{ route("advertiser.campaignsformleads.exportcsv",":id") }}';
                                url_CSV = url_CSV.replace(':id', data.row.id);
                            var camp_export =  '<a href="'+url_XLSX+'">XLSX </a> | <a href="'+url_CSV+'">CSV </a>';

                            campaign_list_draft.row.add([data.row.id ,toggle_button,camp_name,'Draft',camp_export,'0','0','0','$'+data.row.daily_budget,data.row.start_date,data.row.end_date,data.row.target_country,data.row.campaign_forms.form_name]).node().id = data.row.id;
                            campaign_list_draft.draw();
                            }
                        }
                    }
                });
            })

        $("#sortable").sortable({
            handle: ".handle",
            stop: function(event, ui) {
                update_field();
            }
        });
    });
    // Edit campaign

    $('#DailyBudgetInput').keyup(function() {
        this.value = this.value.replace(/[^0-9]/g, "");
    });
    $('#TargetCostInput').keyup(function() {
        this.value = this.value.match(/^\d+\.?\d{0,2}/);
    });

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

<!-- owl slider ---->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="{{asset('/assets/templates/leadpaid/css/campaign_iframe_preview.css?v6')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- owl slider ---->
<script>
    function validate_form_data() {
        $.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-col').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $.validator.addMethod(
            "money",
            function(value, element) {
                var isValidMoney = /^\d{0,10}(\.\d{0,2})?$/.test(value);
                return this.optional(element) || isValidMoney;
            },
            "Enter Correct value."
        );

        $.validator.addMethod(
            "check_row",
            function(value, element) {
                if ($('#sortable .sortable-group').length >= 3) {
                    return true;
                } else {
                    return false;
                }
            },
            "Minimum 3 fileds are requried"
        );

        var campaigns = @json($campaignsval);
        if (($('#input_campaign_id').val() == "") || ($('#input_campaign_id').val() == 0)) {

            $.validator.addMethod(
                "unique_campaign_name",
                function(value, element) {
                    var $result = $.map(campaigns, function(item, i) {
                        name = item.name;
                        if (name.toLowerCase() == value.toLowerCase()) {
                            return 'exits';
                        }
                    })[0];

                    return $result == 'exits' ? false : true;
                },
                "Use a different campaign name (Same Campaign Name already exist)"
            );
            $.validator.addMethod(
                "unique_form_name",
                function(value, element) {
                    var $result = $.map(campaigns, function(item, i) {
                        name = item.campaign_forms?item.campaign_forms.form_name:item.campaign_forms_exits.form_name;
                        if (name.toLowerCase() == value.toLowerCase()) {  return 'exits';  }
                    })[0];
                    return $result == 'exits' ? false : true;
                },
                "Use a different Form name (Same Form Name already exist)"
            );

            $.validator.addMethod(
                "unique_form_inputs", function(value, element) {
                    var nam = $(element).attr('name');
                    $result =   0;
                    $(".InputQuestion_text").each(function() {
                        if (nam != $(this).attr('name')) { if ($.trim($(this).val()).toLowerCase() == $.trim(value).toLowerCase()) {  $result++;  } }
                    });
                    return $result > 0?false:true;
                },
                "Field is repeating - Please change it"
            );

            $("#campaign_form").validate({
                rules: {
                    campaign_name: {
                        minlength: 3,
                        unique_campaign_name: true
                    },
                    form_name: {
                        minlength: 3,
                      //  unique_form_name: true
                    },
                    min_row_validation: {
                        check_row: true
                    },
                    daily_budget: {
                        required: true,
                        money: true,
                        min: 50,
                        max: 1000
                    },
                    target_cost: {
                        required: false,
                        money: true,
                        min: 10,
                        max: 1000
                    },
                    website_url: {
                        minlength: 7
                    },

                    image_1: {
                        extension: "png|jpg|jpeg|gif",
                        maxsize: 2e+6
                    },
                    image_2: {
                        extension: "png|jpg|jpeg|gif",
                        maxsize: 2e+6
                    },
                    image_3: {
                        extension: "png|jpg|jpeg|gif",
                        maxsize: 2e+6
                    },
                    create_qty: {
                        required: true
                    },
                    logo_comapny: {
                        required: true
                    },
                    'field_1[question_text]': {
                        required: true,
                        unique_form_inputs:true
                    },
                    'field_2[question_text]': {
                        required: true,
                        unique_form_inputs:true
                    },
                    'field_3[question_text]': {
                        required: true,
                        unique_form_inputs:true
                    },
                    'field_4[question_text]': {
                        required: true,
                        unique_form_inputs:true
                    },
                    'field_5[question_text]': {
                        required: true,
                        unique_form_inputs:true
                    },
                },
                messages: {
                    campaign_name: {
                        required: 'Campaign Name is required.'
                    },

                    target_country: {
                        required: 'Country is required.'
                    },


                    daily_budget: {
                        required: 'Daily Budget is required.',
                        min: 'Daily Budget should be minimum $50',
                        max: 'Daily Budget should not be greater than $1000'
                    },
                    target_cost: {
                        required: 'Target Cost is required.',
                        min: 'Target Cost should be minimum $10',
                        max: 'Target Cost should not be greater than $1000'
                    },
                    SelectFormType: {
                        required: 'Form is required.'
                    },
                    form_name: {
                        required: 'Form Name is required.'
                    },
                    'form_title[1]': {
                        required: '"Product/Service/Offer" is required.'
                    },
                    'form_desc[1]': {
                        required: '"Product/Service/Offer Description" is required.'
                    },
                    'field_1[question_text]': {
                        required: 'Question is required.'
                    },
                    'field_2[question_text]': {
                        required: 'Question is required.'
                    },
                    'field_3[question_text]': {
                        required: 'Question is required.'
                    },
                    'field_4[question_text]': {
                        required: 'Question is required.'
                    },
                    'field_5[question_text]': {
                        required: 'Question is required.'
                    },
                    'form_id': {
                        required: 'Form is required.'
                    },

                    service_sell_buy: 'Please fill Product / Service you Sell or Buy in this Campaign -  or leave it blank',
                    website_url: 'Please fill Website URL - or leave it blank',

                    image_1: "File must be JPG, GIF or PNG, less than 2MB",
                    image_2: "File must be JPG, GIF or PNG, less than 2MB",
                    image_3: "File must be JPG, GIF or PNG, less than 2MB",
                    create_qty: "Add at least 1 creative",
                    logo_comapny: 'Company/Brand Name or Logo - Any 1 is mandatory',
                }
            });

        } else {

            $("#campaign_form").validate({
                rules: {
                    campaign_name: {
                        minlength: 3
                    },
                    form_name: {
                        minlength: 3
                    },
                    min_row_validation: {
                        check_row: true
                    },
                    daily_budget: {
                        required: true,
                        money: true,
                        min: 50,
                        max: 1000
                    },
                    target_cost: {
                        required: false,
                        money: true,
                        min: 10,
                        max: 1000
                    },
                    website_url: {
                        minlength: 7
                    },

                    image_1: {
                        extension: "png|jpg|jpeg|gif",
                        maxsize: 2e+6
                    },
                    image_2: {
                        extension: "png|jpg|jpeg|gif",
                        maxsize: 2e+6
                    },
                    image_3: {
                        extension: "png|jpg|jpeg|gif",
                        maxsize: 2e+6
                    },
                    create_qty: {
                        required: true
                    },
                    logo_comapny: {
                        required: true
                    }

                },
                messages: {
                    campaign_name: {
                        required: 'Campaign Name is required.'
                    },

                    target_country: {
                        required: 'Country is required.'
                    },


                    daily_budget: {
                        required: 'Daily Budget is required.',
                        min: 'Daily Budget should be minimum $50',
                        max: 'Daily Budget should not be greater than $1000'
                    },
                    target_cost: {
                        required: 'Target Cost is required.',
                        min: 'Target Cost should be minimum $10',
                        max: 'Target Cost should not be greater than $1000'
                    },
                    SelectFormType: {
                        required: 'Form is required.'
                    },
                    form_name: {
                        required: 'Form Name is required.'
                    },
                    'form_title[1]': {
                        required: '"Product/Service/Offer" is required.'
                    },
                    'form_desc[1]': {
                        required: '"Product/Service/Offer Description" is required.'
                    },
                    'field_1[question_text]': {
                        required: 'Question is required.'
                    },
                    'field_2[question_text]': {
                        required: 'Question is required.'
                    },
                    'field_3[question_text]': {
                        required: 'Question is required.'
                    },
                    'field_4[question_text]': {
                        required: 'Question is required.'
                    },
                    'field_5[question_text]': {
                        required: 'Question is required.'
                    },
                    'form_id': {
                        required: 'Form is required.'
                    },

                    service_sell_buy: 'Please fill Product / Service you Sell or Buy in this Campaign -  or leave it blank',
                    website_url: 'Please fill Website URL - or leave it blank',

                    image_1: "File must be JPG, GIF or PNG, less than 2MB",
                    image_2: "File must be JPG, GIF or PNG, less than 2MB",
                    image_3: "File must be JPG, GIF or PNG, less than 2MB",
                    create_qty: "Add at least 1 creative",
                    logo_comapny: 'Company/Brand Name or Logo - Any 1 is mandatory',
                }
            });
        }

        $("#company_name_Input").blur(function() {
            if ($(this).val() == "") {
                $(".logo_comapny").val('');
            } else {
                $(".logo_comapny").val(1);
            }
        });

    }

    $(".campaign_create_close").click(function() {
        $("#campaign_create_modal").modal('hide');
    });
</script>
<script>
    function updateformpreview_by_Id(event, el) {
        form_id = $(el).val();
        var getFormURL = "{{route('advertiser.campaigns.getform')}}";
        const getformData = {
            "_token": "{{ csrf_token() }}",
            "form_id": form_id
        };
        $.ajax({
            url: getFormURL,
            data: getformData,
            dataType: 'json',
            type: 'POST',
            success: function(data) {

                updateformpreview(data.form[0]);
            }
        });
    }

    function resetformpreview() {
        $('#preview_form_title').html('');
        $('#preview_form_sub_title').html('');
        $('#preview_Punchline').html('');
        $('#preview_company_name').html('');
        $('#preview_company_logo').html('');
        $('#preview_media').html('');
        for ($i = 1; $i < 6; $i++) {
            $('#preview_filed_' + $i).html('');
        }
    }

    function updateformpreview(data = false) {
        resetformpreview();
        var image_1_img = image_2_img = image_3_img = "#";
        if (data == false) {
            var youtube_1 = $('.video_1').find('iframe').attr('src');
            var youtube_2 = $('.video_2').find('iframe').attr('src');
            var youtube_3 = $('.video_3').find('iframe').attr('src');
            var image_1_img = $('#image_1_img').attr('src');
            var image_2_img = $('#image_2_img').attr('src');
            var image_3_img = $('#image_3_img').attr('src');
            var title_1 = $('#FormTitleInput_1').val();
            var title_2 = $('#FormTitleInput_2').val();
            var title_3 = $('#FormTitleInput_3').val();
            var sub_title_1 = $('#form_desc_1_Input').val();
            var sub_title_2 = $('#form_desc_2_Input').val();
            var sub_title_3 = $('#form_desc_3_Input').val();
            var company_name = $('#company_name_Input').val();
            var company_logo = $('#company_logo_img').attr('src');
            var Punchline = $('#FormPunchlineInput').val();
        } else {
            var image_src = '{{url("/")}}/assets/images/campaign_forms/';
            var youtube_1 = data.youtube_1;
            var youtube_2 = data.youtube_2;
            var youtube_3 = data.youtube_3;;
            if (data.image_1 !== null) {
                var image_1_img = image_src + data.image_1;
            }
            if (data.image_2 !== null) {
                var image_2_img = image_src + data.image_2;
            }

            if (data.image_3 !== null) {
                var image_3_img = image_src + data.image_3;
            }
            var title_1 = data.title[1];;
            var title_2 = data.title[2];
            var title_3 = data.title[3];
            var sub_title_1 = data.form_desc[1];
            var sub_title_2 = data.form_desc[1];
            var sub_title_3 = data.form_desc[1];
            var company_name = data.company_name;
            var company_logo = image_src + data.company_logo;
            var Punchline = data.punchline;
        }

        $('#preview_form_title').html(title_1);
        $('#preview_form_sub_title').html(sub_title_1);
        $('#preview_Punchline').html(Punchline);
        $('#preview_company_name').html(company_name);

        if (company_logo !== '#') {
            if (company_logo != '') {
                $('#preview_company_logo').show();
                $('#preview_company_logo').html('<img src="' + company_logo + '" alt="" width="100%" />');
            } else {
                $('#preview_company_logo').html('')
            }
        } else {
            $('#preview_company_logo').html('')
        }

        var image_vide = '<div class="owl-carousel owl-theme ">';
        var creative_status = '';
        if (youtube_1) {

            const iframeMarkup = '<iframe src="' + youtube_1 + '" frameborder="0" width="100%" allowfullscreen></iframe>';

            image_vide += '<div class="item">' + iframeMarkup + '</div>';
            creative_status = 1;
        }

        if (youtube_2) {

            const iframeMarkup = '<iframe src="' + youtube_2 + '" frameborder="0" width="100%" allowfullscreen></iframe>';
            image_vide += '<div class="item">' + iframeMarkup + '</div>';
            creative_status = 1;
        }

        if (youtube_3) {

            const iframeMarkup = '<iframe src="' + youtube_3 + '" frameborder="0" width="100%" allowfullscreen></iframe>';
            image_vide += '<div class="item">' + iframeMarkup + '</div>';
            creative_status = 1;
        }

        if (image_1_img !== '#') {

            image_vide += '<div class="item"><div class="image-wapperr"><img src="' + image_1_img + '" alt="" width="100%" /></div></div>';
            creative_status = 1;
        }
        if (image_2_img !== '#') {

            image_vide += '<div class="item"><div class="image-wapperr"><img src="' + image_2_img + '" alt="" width="100%" /></div></div>';
            creative_status = 1;
        }

        if (image_3_img !== '#') {

            image_vide += '<div class="item"><div class="image-wapperr"><img src="' + image_3_img + '" alt="" width="100%" /></div></div>';
            creative_status = 1;
        }

        image_vide += '</div>';
        $('#preview_media').html(image_vide);
        if (creative_status == 1) {
            $(".create_qty").val(creative_status);
            $(".create_qty").attr('data-status', 1);
        } else {
            $(".create_qty").val('');
            $(".create_qty").attr('data-status', 0);
        }

        // $("#preview_media").loading();
        $('#preview_media').find("iframe").hide();
        $('#preview_media').find("iframe").after("<div class='youtubvre_loadingg' style='min-width:300px;text-align:center'>loading from youtube..</div>");
        $('#preview_media').find("iframe").on("load", function() {
            $('#preview_media').find("iframe").show();
            $('#preview_media').find(".youtubvre_loadingg").remove();
        });


        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel");
            owl.owlCarousel({
                items: 1,
                margin: 0,
                loop: false,
                dots: false,
                autoWidth: true,
                nav: true,
                navText: ["<div class='nav-btn prev-slide'></div>", "<div class='nav-btn next-slide'></div>"]
            });
        });


        updateformpreviewtext();
    }

    function updateformpreviewtext(data = false) {
        if (data == false) {
            var title_1 = $('#FormTitleInput_1').val();
            var title_2 = $('#FormTitleInput_2').val();
            var title_3 = $('#FormTitleInput_3').val();
            var sub_title_1 = $('#form_desc_1_Input').val();
            var sub_title_2 = $('#form_desc_2_Input').val();
            var sub_title_3 = $('#form_desc_3_Input').val();
            var company_name = $('#company_name_Input').val();
            var company_logo = $('#company_logo_img').attr('src');
            var Punchline = $('#FormPunchlineInput').val();
        } else {

            var title_1 = data.title[1];;
            var title_2 = data.title[2];
            var title_3 = data.title[3];
            var sub_title_1 = data.form_desc[1];
            var sub_title_2 = data.form_desc[1];
            var sub_title_3 = data.form_desc[1];
            var company_name = data.company_name;
            var company_logo = image_src + data.company_logo;
            var Punchline = data.punchline;
        }

        $('#preview_form_title').html(title_1);
        $('#preview_form_sub_title').html(sub_title_1);
        $('#preview_Punchline').html(Punchline);
        $('#preview_company_name').html(company_name);

        if (company_logo !== '#') {
            if (company_logo != '') {
                $('#preview_company_logo').show();
                $('#preview_company_logo').html('<img src="' + company_logo + '" alt="" width="100%" />');
            } else {
                $('#preview_company_logo').html('');
            }
        } else {
            $('#preview_company_logo').html('')
        }



        for ($i = 1; $i < 6; $i++) {
            if (data == false) {

                question_type = $('input[name="field_' + $i + '[question_type]"]').val();
                question_text = $('input[name="field_' + $i + '[question_text]"]').val();
                question_required = $('input[name="field_' + $i + '[required]"]').prop('checked') ? '*' : '';
            } else {

                question_type = null;
                question_text = null;
                question_required = null;
                options = [];
                var fd = data['field_' + $i];

                if (fd) {
                    question_type = fd['question_type'];
                    question_text = fd['question_text'];
                    if (fd['required']) {
                        question_required = fd['required'] ? '*' : '';
                    } else {
                        question_required = '';
                    }
                    if (question_type == 'MultipleChoice') {
                        if (fd['option_1']) {
                            options[0] = fd['option_1'];
                        }
                        if (fd['option_2']) {
                            options[1] = fd['option_2'];
                        }
                        if (fd['option_3']) {
                            options[2] = fd['option_3'];
                        }
                        if (fd['option_4']) {
                            options[3] = fd['option_4'];
                        }
                        if (fd['option_5']) {
                            options[4] = fd['option_5'];
                        }
                        if (fd['option_6']) {
                            options[5] = fd['option_6'];
                        }
                    }
                }
            }

            t = '';
            if (question_type === 'MultipleChoice') {
                t += '<select class="form-select" id="Input_field_' + $i + '"';
                t += '>';
                if (question_text) {
                    t += '<option selected value="" class="holder"> ' + question_text + question_required + ' </option>';
                }
                if (data == false) {
                    for ($j = 1; $j < 7; $j++) {
                        op = $('input[name="field_' + $i + '[option_' + $j + ']"]').val();
                        if (op) {
                            t += '<option value="' + op + '">' + op + '</option>';
                        }
                    }
                } else {
                    $.each(options, function(key, val) {
                        t += '<option value="' + val + '">' + val + '</option>';
                    });
                }
                t += '</select>';
            } else if (question_type === 'ShortAnswer') {
                t += '<input type="text" class="form-control" id="Input_field_' + $i + '" placeholder="' + question_text + question_required + '" ';
                t += '>';
            }

            if (t !== '') {
                $('#preview_filed_' + $i).html(t);
            } else {
                $('#preview_filed_' + $i).html(t);
            }
        }
    }
    validate_custom_field();

    function validate_custom_field() {
        // $(".InputQuestion_text").blur(function() {
        //     var nam = $(this).attr('name');
        //     var vall = $(this).val();
        //     var $_this = $(this);
        //     $(".InputQuestion_text").each(function() {

        //         if (nam != $(this).attr('name')) {
        //             if ($.trim($(this).val()).toLowerCase() == $.trim(vall).toLowerCase()) {
        //                 $_this.parent().find('.error').remove();
        //                 $_this.parent().find('.bg-white').after('<span id="' + nam + '-error" class="error invalid-feedback" style="display:block">Field is repeating - Please change it</span>');
        //             } else {
        //                 $_this.parent().find('.error').remove();
        //             }
        //         }
        //     })
        // });
    }

    // updateformpreview();
    $('.PageFormStyle').on('input', function() {
        updateformpreviewtext();
    });

    function getVideoId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url?.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    function getUrlParams(urlOrQueryString) {
        if ((i = urlOrQueryString.indexOf('?')) >= 0) {
            const queryString = urlOrQueryString.substring(i + 1);
            if (queryString) {
                return _mapUrlParams(queryString);
            }
        }
        return {};
    }

    function _mapUrlParams(queryString) {
        return queryString
            .split('&')
            .map(function(keyValueString) {
                return keyValueString.split('=')
            })
            .reduce(function(urlParams, [key, value]) {
                if (Number.isInteger(parseInt(value)) && parseInt(value) == value) {
                    urlParams[key] = parseInt(value);
                } else {
                    urlParams[key] = decodeURI(value);
                }
                return urlParams;
            }, {});
    }
    $("#TargetCountryInput").on('change', function() {

        if ($(this).val() == "") {
            $("#TargetCountryInput").css("font-size", "16px");
        } else {
            $("#TargetCountryInput").css("font-size", "20px");
        }
    });

    $(".add_video").click(function() {
        if ($(this).hasClass('disabled')) {

        } else {
            var vid = $(this).data('id');
            $(".youtube_video").attr('data-video', vid);
            $(".youtube_video").val('');

            $("#exampleModal").modal("show");
        }
    });

    $(".save_youtube").click(function() {

        var youtube_url = $(".youtube_video").val();
        var vidd = $(".youtube_video").attr('data-video');
        $('.video_error').remove();
        if (youtube_url !== '') {
            var vid = '';
            var str2 = 'https://www.youtube.com/watch?v=';
            var str3 = 'https://www.youtube.com/embed/';




            var y_url = validateYouTubeUrl(youtube_url);

            if (y_url !== "") {

                $(".video_" + vidd).find('label').hide();
                $(".video_" + vidd).addClass("disabled");

                var html = '<div class="youtube_iframe"><ul><li><span class="edit_video" data-id="' + vidd + '"><i class="fas fa-edit text-success"></i></span></li><li><span class="remove_video" data-id="' + vidd + '"> <i class="fas fa-times-circle"></i></span></li></ul><iframe src="' + y_url + '" frameborder="0" allowfullscreen></iframe></div>';
                $(".video_" + vidd).find('.youtube_iframe').remove();
                $(".video_" + vidd).find('label').after(html);
                $("#Youtube_" + vidd).find('input').val(y_url);
                custom_edit_vide();
                CampaignAutoSave();
                $("#exampleModal").modal("hide");
                setTimeout(function() {
                    $('body').addClass('modal-open');
                    updateformpreview();
                }, 500);
            } else {
                $(".youtube_video").after('<p class="video_error" style="color:red;">Fill a valid youtube url to embed in the following formats only eg.""https://www.youtube.com/embed/VPRTIMer5xM OR <br/>https://www.youtube.com/watch?v=VPRTIMer5xM</p>');
            }
        } else {
            $(".youtube_video").after('<p class="video_error" style="color:red;"> Field is required</p>');
        }
    });

    $(".close_youtube").click(function() {
        $("#exampleModal").modal("hide");
        setTimeout(function() {
            $('body').addClass('modal-open');
        }, 500);
    });

    function custom_edit_vide() {
        $(".edit_video").unbind().click(function() {
            var iddd = $(this).data('id');
            $(".video_" + iddd).removeClass("disabled");
            var src = $(".video_" + iddd).find("iframe").attr('src');


            $(".video_" + iddd).trigger("click");
            setTimeout(function() {
                $(".youtube_video").val(src);
                updateformpreview();
            }, 500);
            return false;
        });

        $(".remove_video").unbind().click(function() {
            var iddd = $(this).data('id');

            ///if(confirm('Do you really want to remove this video?')){
            $(".video_" + iddd).find(".youtube_iframe").remove();
            $(".video_" + iddd).removeClass('disabled');
            $("#Youtube_" + iddd).find('input').val('');
            updateformpreview();
            return false;
            //}

        });

    }

    function validateYouTubeUrl(url) {

        if (url != undefined || url != '') {
            if (validateYouTubeUrl2(url)) {
                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
                var match = url.match(regExp);
                if (match && match[2].length == 11) {

                    return 'https://www.youtube.com/embed/' + match[2];
                } else {
                    return url;
                }
            } else {

                return '';
            }


        }

    }


    function validateYouTubeUrl2(url) {
        if (url) {
            var regExp = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
            if (url.match(regExp)) {

                return true;
            } else {

                return false;
            }
        }
        return false;
    }


    function ValidURLnew(str) {
        var regex = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$(?:www\.)?/
        if (!regex.test(str)) {

        } else {
            $("#website_url").removeClass("is-invalid");
        }
    }

    makeinoputcharateruppercase();

    function makeinoputcharateruppercase() {

        $(".leftForm").find("input").on('keypress', function(e) {

            $(this).val(capitalizeFirstLetter($(this).val()));
        });

        $("#company_name_Input").on('keypress', function(e) {

            $(this).val(capitalizeFirstLetter($(this).val()));

        });


        $(".rightForm").find("input").on('keypress', function(e) {

            $(this).val(capitalizeFirstLetter($(this).val()));

        });
    }


    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }


    $('body').on('click', '.duplicatecampaign, .editcampaign', function(e) {
        e.preventDefault();
        reset_campaign_create_form();
        $('#campaign_createModalLabel').html('Edit Campaign');

        //var validator = $( "#campaign_form" ).validate();
        //validator.resetForm();
        $("#campaign_form").find('.has-error').removeClass("has-error");
        $("#campaign_form").find('.has-success').removeClass("has-success");
        $('#campaign_form').find('.form-control-feedback').remove();
        $('#campaign_form').find('input').removeClass('is-invalid');

        $("#campaign_create_modal").attr("data-status", 'edit');

        campaign_create_modal.modal('show');
        var campaign_id = $(this).attr('data-id');
        var tyrpp = $(this).data('type');
        var sttaus = $(this).data('status');
        // var url = '{{ route("advertiser.campaigns.edit", ":campaign_id") }}';
        // url = url.replace(':campaign_id', campaign_id);
        // url =  "/advertiser/campaigns/edit/"+ campaign_id;
        var url = $(this).attr('href');
        $.get(url, function(data) {
            if (tyrpp == "edit") {
                $('#input_campaign_id').val(campaign_id);
                $("input[name='campaign_name']").val(data.name);
                $("input[name='form_name']").val(data.form_name);
                $("#submit").text('Save Camapign');
                $("#campaign_form").find(".btn--primary").text('Save Camapign');
                if (data.approve == 1) {
                    $("#campaign_name_Input").prop('readonly', true);
                    $("#form_name").prop('readonly', true);
                    $(".leftForm").find('input').prop('readonly', true);
                    $(".rightForm").find('input').prop('readonly', true);
                } else {
                    $("#campaign_name_Input").prop('readonly', false);
                    $("#form_name").prop('readonly', false);
                    $(".leftForm").find('input').prop('readonly', false);
                    $(".rightForm").find('input').prop('readonly', false);
                }
            } else {
                $("input[name='campaign_name']").val(data.name + ' (Copy)');
                $("input[name='form_name']").val(data.form_name + ' (Copy)');
                $("#campaign_name_Input").prop('readonly', false);
                $("#form_name").prop('readonly', false);
                $(".leftForm").find('input').prop('readonly', false);
                $(".rightForm").find('input').prop('readonly', false);
            }
            validate_form_data();


            $("input[name='start_date']").val(data.start_date);
            $("input[name='end_date']").val(data.end_date);
            if (data.end_date !== null) {
                $('#SelectEndDateSelect').val("SetEndDate").change();
            } else {
                $('#SelectEndDateSelect').val("NoEndDate").change();
            }

            if(data.form_id_existing){

                $("input[name='SelectFormType'][value=UseExistingForm]").prop('checked', true);
                $("input[name='form_id_existing'][value="+data.form_id_existing+"]").prop('checked', true);
                $("input[name='SelectFormType']:not(:checked)").attr('disabled', true);
                $("#UseExistingForm").show();

            }else{
                $("input[name='SelectFormType'][value=CreateNewForm]").prop('checked', true);
                $("#CreateNewForm").show();
            }

            $("input[name='daily_budget']").val(data.daily_budget);
            $("input[name='target_cost']").val(data.target_cost);
            $("#TargetCountryInput").val(data.target_country).change();

            $("#TargetingTypeInput").val(data.target_type).change();
            if (data.company_logo != null) {
                $("#company_logo_preview").show();

                $("#company_logo_img").attr('src', "{{ url('/')}}/assets/images/campaign_forms/" + data.company_logo);
            }
            if ((data.company_logo == null) || (data.company_name == null)) {
                $(".logo_comapny").val(1);
            } else {
                $(".logo_comapny").val(0);
            }
            $("#company_logo_img").show();
            $("input[name='form_punchline']").val(data.punchline);

            $.each(JSON.parse(data.title), function(idx, val) {
                if (val != null) {
                    $("#form_title_" + idx).show();
                    $("#form_title_" + idx).prev().find(".fa-plus-circle").hide();

                    $("#form_title_" + idx).find('input').val(val);
                }
            });
            var vqty = '';
            if (data.youtube_1 != null) {
                var html = '<div class="youtube_iframe"><ul><li><span class="edit_video" data-id="1"><i class="fas fa-edit text-success"></i></span></li><li><span class="remove_video" data-id="1"> <i class="fas fa-times-circle"></i></span></li></ul><iframe src="' + validateYouTubeUrl(data.youtube_1) + '" frameborder="0" allowfullscreen></iframe></div>';
                $(".video_1").find('.youtube_iframe').remove();
                $(".video_1").find('label').after(html);
                vqty = 1;
                $("#Youtube_URL_1_Input").val(data.youtube_1);
            }
            if (data.youtube_2 != null) {
                var html = '<div class="youtube_iframe"><ul><li><span class="edit_video" data-id="2"><i class="fas fa-edit text-success"></i></span></li><li><span class="remove_video" data-id="2"> <i class="fas fa-times-circle"></i></span></li></ul><iframe src="' + validateYouTubeUrl(data.youtube_2) + '" frameborder="0" allowfullscreen></iframe></div>';
                $(".video_2").find('.youtube_iframe').remove();
                $(".video_2").find('label').after(html);
                vqty = 1;
                $("#Youtube_URL_2_Input").val(data.youtube_2);
            }

            if (data.youtube_3 != null) {
                var html = '<div class="youtube_iframe"><ul><li><span class="edit_video" data-id="3"><i class="fas fa-edit text-success"></i></span></li><li><span class="remove_video" data-id="3"> <i class="fas fa-times-circle"></i></span></li></ul><iframe src="' + validateYouTubeUrl(data.youtube_3) + '" frameborder="0" allowfullscreen></iframe></div>';
                $(".video_3").find('.youtube_iframe').remove();
                $(".video_3").find('label').after(html);
                vqty = 1;
                $("#Youtube_URL_3_Input").val(data.youtube_3);
            }
            if (data.image_1 != null) {
                $("#upload_image_1").find(".img_preview_box").show();
                $("#upload_image_3").find(".img_preview_box").find("img").show();
                $("#image_1_img").attr('src', "{{ url('/')}}/assets/images/campaign_forms/" + data.image_1);
                vqty = 1;
            }
            if (data.image_2 != null) {
                $("#upload_image_2").find(".img_preview_box").show();
                $("#upload_image_3").find(".img_preview_box").find("img").show();
                $("#image_2_img").attr('src', "{{ url('/')}}/assets/images/campaign_forms/" + data.image_2);
                vqty = 1;
            }
            if (data.image_3 != null) {
                $("#upload_image_3").find(".img_preview_box").show();
                $("#upload_image_3").find(".img_preview_box").find("img").show();
                $("#image_3_img").attr('src', "{{ url('/')}}/assets/images/campaign_forms/" + data.image_3);
                vqty = 1;
            }

            $(".create_qty").val(vqty);
            $.each(JSON.parse(data.form_desc), function(idx, val) {
                if (val != null) {
                    $("#FormDescription_" + idx).show();
                    $("#FormDescription_" + idx).find('input').val(val);
                    $("#FormDescription_" + idx).prev().find(".fa-plus-circle").hide();
                }

            });


            var field_count = 0;

            if (data.field_1 != null) {
                field_count = field_count + 1;
                var field1 = JSON.parse(data.field_1);
                if (field1.question_type == "ShortAnswer") {
                    add_form_field_2(1, 'single');
                } else {
                    add_form_field_2(1, 'multiple');
                    if (field1.option_1 != null) {
                        $(".row_1").find('.option:nth-child(1)').find('input').val(field1.option_1);
                    }
                    if (field1.option_2 != null) {
                        $(".row_1").find('.option:nth-child(2)').find('input').val(field1.option_2);
                    }
                    if (field1.option_3 != null) {
                        $(".row_1").find('.option:nth-child(3)').find('input').val(field1.option_3);
                    }
                    if (field1.option_4 != null) {
                        $(".row_1").find('.option:nth-child(4)').find('input').val(field1.option_4);
                    }
                    if (field1.option_5 != null) {
                        //$(".row_4").find(".btn-add-option").triggr('click');
                        $(".row_1").find('.option:nth-child(5)').find('input').val(field1.option_5);
                    }
                    if (field1.option_6 != null) {
                        // $(".row_4").find(".btn-add-option").triggr('click');
                        $(".row_1").find('.option:nth-child(6)').find('input').val(field1.option_6);
                    }

                }



                if (field1.required == "on") {
                    $(".row_1").find("input[type=checkbox]").prop('checked', true);
                } else {
                    $(".row_1").find("input[type=checkbox]").prop('checked', false);
                }
                $(".row_1").find(".sort").val(field1.sort);
                $(".row_1").find(".InputQuestionType").val(field1.question_type);
                $(".row_1").find(".InputQuestion_text").val(field1.question_text);
            }

            if (data.field_2 != null) {

                field_count = field_count + 1;
                var field2 = JSON.parse(data.field_2);


                if (field2.question_type == "ShortAnswer") {
                    add_form_field_2(2, 'single');
                } else {

                    add_form_field_2(2, 'multiple');
                    if (field2.option_1 != null) {
                        $(".row_2").find('.option:nth-child(1)').find('input').val(field2.option_1);
                    }
                    if (field2.option_2 != null) {
                        $(".row_2").find('.option:nth-child(2)').find('input').val(field2.option_2);
                    }
                    if (field2.option_3 != null) {
                        $(".row_2").find('.option:nth-child(3)').find('input').val(field2.option_3);
                    }
                    if (field2.option_4 != null) {
                        $(".row_2").find('.option:nth-child(4)').find('input').val(field2.option_4);
                    }
                    if (field2.option_5 != null) {
                        //$(".row_4").find(".btn-add-option").triggr('click');
                        $(".row_2").find('.option:nth-child(5)').find('input').val(field2.option_5);
                    }
                    if (field2.option_6 != null) {
                        // $(".row_4").find(".btn-add-option").triggr('click');
                        $(".row_2").find('.option:nth-child(6)').find('input').val(field2.option_6);
                    }

                }




                if (field2.required == "on") {
                    $(".row_2").find("input[type=checkbox]").prop('checked', true);
                } else {
                    $(".row_2").find("input[type=checkbox]").prop('checked', false);
                }
                $(".row_2").find(".sort").val(field2.sort);
                $(".row_2").find(".InputQuestionType").val(field2.question_type);

                $(".row_2").find(".InputQuestion_text").val(field2.question_text);
            }

            if (data.field_3 != null) {
                field_count = field_count + 1;

                var field3 = JSON.parse(data.field_3);


                if (field3.question_type == "ShortAnswer") {
                    add_form_field_2(3, 'single');
                } else {
                    add_form_field_2(3, 'multiple');
                    if (field3.option_1 != null) {
                        $(".row_3").find('.option:nth-child(1)').find('input').val(field3.option_1);
                    }
                    if (field3.option_2 != null) {
                        $(".row_3").find('.option:nth-child(2)').find('input').val(field3.option_2);
                    }
                    if (field3.option_3 != null) {
                        $(".row_3").find('.option:nth-child(3)').find('input').val(field3.option_3);
                    }
                    if (field3.option_4 != null) {
                        $(".row_3").find('.option:nth-child(4)').find('input').val(field3.option_4);
                    }
                    if (field3.option_5 != null) {
                        //$(".row_4").find(".btn-add-option").triggr('click');
                        $(".row_3").find('.option:nth-child(5)').find('input').val(field3.option_5);
                    }
                    if (field3.option_6 != null) {
                        // $(".row_4").find(".btn-add-option").triggr('click');
                        $(".row_3").find('.option:nth-child(6)').find('input').val(field3.option_6);
                    }

                }

                if (field3.required == "on") {
                    $(".row_3").find("input[type=checkbox]").prop('checked', true);
                } else {
                    $(".row_3").find("input[type=checkbox]").prop('checked', false);
                }
                $(".row_3").find(".sort").val(field3.sort);
                $(".row_3").find(".InputQuestionType").val(field3.question_type);
                $(".row_3").find(".InputQuestion_text").val(field3.question_text);
            }
            $(".row_4").remove();
            if (data.field_4 != null) {

                field_count = field_count + 1;
                var field4 = JSON.parse(data.field_4);

                if (field4.question_type == "ShortAnswer") {
                    add_form_field('single');
                } else {
                    add_form_field('multiple');
                    if (field4.option_1 != null) {
                        $(".row_4").find('.option:nth-child(1)').find('input').val(field4.option_1);
                    }
                    if (field4.option_2 != null) {
                        $(".row_4").find('.option:nth-child(2)').find('input').val(field4.option_2);
                    }
                    if (field4.option_3 != null) {
                        $(".row_4").find('.option:nth-child(3)').find('input').val(field4.option_3);
                    }
                    if (field4.option_4 != null) {
                        $(".row_4").find('.option:nth-child(4)').find('input').val(field4.option_4);
                    }
                    if (field4.option_5 != null) {
                        //$(".row_4").find(".btn-add-option").triggr('click');
                        $(".row_4").find('.option:nth-child(5)').find('input').val(field4.option_5);
                    }
                    if (field4.option_6 != null) {
                        // $(".row_4").find(".btn-add-option").triggr('click');
                        $(".row_4").find('.option:nth-child(6)').find('input').val(field4.option_6);
                    }

                }

                if (field4.required == "on") {
                    $(".row_4").find("input[type=checkbox]").prop('checked', true);
                } else {
                    $(".row_4").find("input[type=checkbox]").prop('checked', false);
                }
                $(".row_4").find(".sort").val(field4.sort);

                $(".row_4").find(".InputQuestionType").val(field4.question_type);
                $(".row_4").find(".InputQuestion_text").val(field4.question_text);
            }
            $(".row_5").remove();
            if (data.field_5 != null) {

                field_count = field_count + 1;
                var field5 = JSON.parse(data.field_5);

                if (field5.question_type == "ShortAnswer") {
                    add_form_field('single');
                } else {
                    add_form_field('multiple');
                    if (field5.option_1 != null) {
                        $(".row_5").find('.option:nth-child(1)').find('input').val(field5.option_1);
                    }
                    if (field5.option_2 != null) {
                        $(".row_5").find('.option:nth-child(2)').find('input').val(field5.option_2);
                    }
                    if (field5.option_3 != null) {
                        $(".row_5").find('.option:nth-child(3)').find('input').val(field5.option_3);
                    }
                    if (field5.option_4 != null) {
                        $(".row_5").find('.option:nth-child(4)').find('input').val(field5.option_4);
                    }
                    if (field5.option_5 != null) {
                        //$(".row_5").find(".btn-add-option").triggr('click');
                        $(".row_5").find('.option:nth-child(5)').find('input').val(field5.option_5);
                    }
                    if (field5.option_6 != null) {
                        //  $(".row_5").find(".btn-add-option").triggr('click');
                        $(".row_5").find('.option:nth-child(6)').find('input').val(field5.option_6);
                    }

                }


                if (field5.required == "on") {
                    $(".row_5").find("input[type=checkbox]").prop('checked', true);
                } else {
                    $(".row_5").find("input[type=checkbox]").prop('checked', false);
                }
                $(".row_5").find(".sort").val(field5.sort);
                $(".row_5").find(".InputQuestionType").val(field5.question_type);
                $(".row_5").find(".InputQuestion_text").val(field5.question_text);
            }
            $("#sortable").attr('data-row', field_count);
            custom_edit_vide();

            $("input[name='service_sell_buy']").val(data.service_sell_buy);
            $("input[name='company_name']").val(data.company_name);
            $("input[name='social_media_page']").val(data.social_media_page);
            //$("input[name=form_id][value=" + data.form_id + "]").prop('checked', true);
            //$("input[name=form_id][value=" + data.form_id + "]").trigger('click');
            setTimeout(function() {
                updateformpreview();
                updateformpreviewtext();
            }, 1500);
            /// target_placements_Input
            $.each(data.target_placements, function(idx, val) {
                $("select#target_placements_Input option[value='" + val + "']").prop("selected", true);
            });
            $.each(data.target_categories, function(idx, val) {
                $("select#target_categories_Input option[value='" + val + "']").prop("selected", true);
            });
        })
    });

    $("body").on("click", ".delete_campaign", function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        if (confirm(' Do you really want to delete the campaign?')) {
            $.get(url, function(data) {
                if (data.code == 200) {
                    location.reload();
                }
            });
        }
    });


    $('input[type=radio][name=SelectFormType]').change(function() { if (this.value == 'CreateNewForm') {  $("input[name=form_id_existing]:checked").prop("checked",false); } });

    function CampaignAutoSave() {
        var Form_Status = $("#campaign_create_modal").attr("data-status");
        var campaign_name_Input = $("#campaign_name_Input").val();
        if(Form_Status == "create"){ $("#campaign_name_Input").attr("readonly", false);  }
        if ((campaign_name_Input != '') && (Form_Status == "create")) {
            var campaign_id = $("#input_campaign_id").val();
            var form_id = '#form_'+campaign_id;
            var form_data = new FormData($('form#campaign_form')[0]);
            var PostURL = "{{route('advertiser.campaigns.save_draft')}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: PostURL,
                data: form_data,
                dataType: 'json',
                type: 'POST',
                contentType: false,
                processData: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function ( data ) {
                    if(data.campaign_id){
                        $("#input_campaign_id").val(data.campaign_id);
                        if($("input[name=form_id]").is(":checked")){
                            $("#draft_form_id").val(data.form_id);
                        }else{
                            $("#draft_form_id").val(data.form_id);
                            $("input[name=form_id]:checked").prop("checked",false)
                        }
                    }
                    Toast('green', 'Campaign Saving!');
                }
            });
        }
    }

    $("body").on("blur", "#campaign_create_modal input, #campaign_create_modal select", function() { CampaignAutoSave(); });

    $(".custon_nav").find('.nav-link').click(function() {
        var tab_name = $(this).data('bs-target');
        $(".tab-pane").hide();
        $(tab_name).show();
        $(".custon_nav").find('.nav-link').removeClass('active');
        $(this).addClass('active');
    });
</script>
@php

if(isset($_GET['action'])){
if($_GET['action']=="create_campiagin"){
@endphp
<script>
    $(".create-campaign-btn").trigger("click");
</script>
@php
}
}
@endphp
}
@endpush




@push('style')

<style>
    .formBlock {
        margin-right: 90px
    }

    .formBlock.UseExistingCol {
        margin-right: 600px
    }

    .leftForm {
        width: 416px;
        min-width: 416px;
        max-width: 416px;
    }

    .rightForm {}

    .rightForm .padding {
        padding: 25px 35px 0 35px;
    }

    .icon-Aa {
        background-image: url("data:image/svg+xml,%3Csvg id='Layer_1' data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 50 50'%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill:%23231f20;%7D%3C/style%3E%3C/defs%3E%3Cpath class='cls-1' d='M8.58,31.22l-3.64,11H.25L12.17,7.17h5.47l12,35.09H24.77L21,31.22Zm11.51-3.54-3.44-10.1c-.78-2.29-1.3-4.37-1.82-6.4h-.11c-.52,2.08-1.09,4.22-1.77,6.35L9.52,27.68Z'/%3E%3Cpath class='cls-1' d='M49.33,36.22a34.76,34.76,0,0,0,.42,6H45.58l-.36-3.18h-.16a9.37,9.37,0,0,1-7.7,3.75c-5.1,0-7.71-3.59-7.71-7.24,0-6.09,5.42-9.42,15.15-9.37V25.7c0-2.08-.57-5.83-5.73-5.83a12.49,12.49,0,0,0-6.55,1.88l-1.05-3a15.62,15.62,0,0,1,8.28-2.24c7.71,0,9.58,5.26,9.58,10.31ZM44.9,29.4c-5-.11-10.67.78-10.67,5.67a4.05,4.05,0,0,0,4.32,4.37,6.28,6.28,0,0,0,6.1-4.21,5,5,0,0,0,.25-1.46Z'/%3E%3C/svg%3E");
    }

    .icon-Aa:before {
        opacity: 0;
    }

    .fbox {
        background-color: #f4f4f4;
        margin: 0 -14px 0px -15px;
        padding: 0 15px 15px;
        position: relative;
    }

    .fbox .gray_title {
        background: #5a97bb;
        padding: 10px;
        color: #fff;
        margin: 0 -14px 15px -15px;
    }

    .fbox.bg-blue .gray_title {
        border-bottom: 2px solid #113399;
        margin-top: -8px;
        background-color: #5a97bb;
        color: #fff;
    }

    /*    .fbox label.col-form-label{ color: #fff!important; font-size: 14px!important; }*/

    .fbox label.col-form-label {
        color: #23231b !important;
    }

    #campaign_create_modal .small,
    #campaign_create_modal small {
        font-size: 80% !important;
    }

    .btn--primary {
        background-color: #1361b2 !important;
    }

    .btn--primary:hover {
        background-color: #093463 !important;
    }

    .small,
    small {
        font-size: 90%;
    }

    table.dataTable thead tr {
        background-color: #1A273A;
    }

    .dataTables_paginate .pagination .page-item.active .page-link {
        background-color: #1361b2;
        border-color: #1361b2;
        box-shadow: 0px 3px 5px rgb(0, 0, 0, 0.125);
    }

    #UseExistingForm label {
        font-size: 16px
    }

    #UseExistingForm .form-check {
        margin-bottom: 10px;
    }

    .btn--primary.create-campaign-btn {
        background-color: #4500dd !important;
        border-radius: 0;
    }

    #campaign_list td {
        font-size: 16px;
        color: #1a273a;
        vertical-align: top;
    }

    #campaign_list td:nth-child(3) {
        font-size: 14px;
    }

    #campaign_list a.create-campaign-btn {
        font-size: 12px !important;
    }

    #campaign_list_wrapper .dataTables_paginate .pagination .page-item .page-link,
    #campaign_list_wrapper .dataTables_length select,
    #campaign_list_wrapper .dataTables_filter input {
        border-radius: 0 !important;
    }

    table.dataTable tbody tr td {
        font-size: 16px;
        color: #1a273a;
        font-weight: normal;
    }

    .page-wrapper.default-version,
    table td,
    tfoot tr {
        font-weight: normal;
    }

    #campaign_list_wrapper {
        overflow-x: scroll;
    }

    .img_preview_box {
        position: relative;
        display: none;
    }

    .img_preview_box .del-preview {
        position: absolute;
        right: 0;
        top: 0px;
        background: #fff;
        display: inline-block;
        padding: 0;
        border-radius: 20px;
        z-index: 1;
    }

    .img_preview_box .del-preview i {
        display: block;
    }

    #company_logo_img,
    #image_1_img,
    #image_2_img,
    #image_3_img {
        max-height: 54px;
        width: auto;
        max-width: 160px;
        padding: 0 5px;
    }

    .bg-ddd {
        background-color: #ddd !important;
    }

    .invalid-feedback {
        font-size: 90% !important;
    }

    .input-col .invalid-feedback {
        width: 100%;
        color: #ff0000 !important;
    }

    #campaign_create_modal .campaign_create_close {
        position: absolute;
        top: 0;
        left: -30px;
        width: 30px;
        height: 30px;
        background: #fff;
        opacity: 1;
        cursor: pointer;
    }

    #campaign_create_modal .PageFormStyle .form-control,
    #campaign_create_modal .PageFormStyle .custom-select {
        border-radius: 0;
        background-color: #fff;
        /*        font-size: 19px!important;*/
        /*        font-weight: 300!important;*/
        color: #212529 !important;
        border-radius: 0 !important;
        vertical-align: middle !important;
        border: 1px solid #94a1b5 !important;
        outline: none !important;
        padding: 10px 18px !important;
        min-height: 52px;
        height: auto;
    }

    #campaign_create_modal .PageFormStyle .form-control {
        font-size: 20px !important;
    }

    #campaign_create_modal .PageFormStyle .custom-select {
        font-size: 16px;
    }

    #campaign_create_modal .modal-header .btn {
        background-color: #1361b2;
        color: #fff;
    }

    #campaign_create_modal .btn-xl {
        border-radius: 0;
        font-size: 20px !important;
        border-radius: 0 !important;
        padding: 10px 18px !important;
        font-weight: bold;
        text-transform: uppercase;
    }

    #campaign_create_modal .modal-header {
        background: #f4f4f4 !important
    }

    #campaign_create_modal .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    #campaign_create_modal .inputfile-1+label {
        color: #004664;
        background-color: #ddf5ff;
        max-width: 100%;
        font-size: 1.15rem;
        font-weight: 400;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        padding: 0.8rem 1.25rem;
        margin: 0 !important;
        border: 1px solid #94a1b5 !important;
    }

    #campaign_create_modal .inputfile-1+label:hover {
        background-color: #75a4b8;
    }

    /* #campaign_create_modal .upload-box.grey .inputfile-1 + label { background-color: #535353; color: #fff!important; width: 100% }
    #campaign_create_modal .upload-box.grey .inputfile-1 + label:hover { background-color: #000; color: #fff!important; } */

    #campaign_create_modal .upload-box.grey .inputfile-1+label {
        width: 100%
    }


    #campaign_create_modal .upload-box.grey.image {
        min-width: 213px;
    }

    #campaign_create_modal .input-group .input-col.d-flex {
        flex: 1 0 0;
    }

    #campaign_create_modal .inputfile-1+label svg {
        width: 1em;
        height: 1em;
        vertical-align: middle;
        fill: currentColor;
        margin-top: -0.25em;
        margin-right: 0.25em;
    }

    #campaign_create_modal .card,
    #campaign_create_modal .card-header {
        border-radius: 0 !important;
        overflow: visible;
    }

    #campaign_create_modal .card-header {
        font-weight: 500 !important;
        font-size: 1.2rem;
    }

    #campaign_create_modal .card-header.bg-primary {
        background-color: #5b97bb !important;
        color: #fff !important;
        border-bottom: 2px solid #113399;
    }

    #campaign_create_modal .card-header.bg-primary label {
        font-size: 14px;
        font-weight: 400;
        color: #fff !important;
        padding-top: 0;
    }

    #campaign_create_modal .company_row {
        background-color: #5b97bb !important;
        background-image: url("{{url('/')}}/assets/images/rainbow-advertiser.png");
        background-position: center -93px;
        background-size: cover;
        border-bottom: 1px solid #113399;
    }



    #campaign_create_modal table th {
        font-weight: 500;
    }

    table th:last-child {
        text-align: left;
    }

    .input-group-append.bg-white .input-group-text {
        background-color: transparent !important;
        border: 0px !important;
        padding: 0 0 0 9px;
        font-size: 1.4rem;
    }

    .input-group.option .input-group-text {
        background-color: transparent !important;
        border: 0px !important;
        padding: 0 0 0 9px;
        font-size: 1.4rem;
    }

    .bg-none {
        background-color: transparent !important;
    }

    .input-group-append.bg-none .input-group-text {
        background-color: transparent !important;
        border: none !important;
        font-size: 1.4rem;
    }

    #campaign_create_modal .input-group-text {
        width: 35px;
    }

    #formPreview {
        width: 336px;
        max-width: 336px;
    }

    #formPreview .formPreview_title {
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
    }
</style>
<style>
    .card.sidbar_preview {
        border: 5px solid #000;
        padding: 5px !important;
    }

    th.required_field {
        width: 8%;
    }

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

    tr.sortable-group td:nth-child(2) {
        text-align: center !important;
    }

    tr.sortable-group .input-group-text {
        width: 35px;
    }

    /* tr.sortable-group.row_1 .del-row, tr.sortable-group.row_2 .del-row{ display: none!important; } */
    tr.sortable-group .small_info {
        float: right;
        padding: 0 35px 0 0;
        border: 0;
        text-align: right;
        cursor: unset;
    }

    tr.sortable-group .small_info:focus {
        box-shadow: none;
    }

    .toggle-group .btn {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        top: -3px;
    }

    .toggle.btn-sm {
        min-width: 40px;
        min-height: 21px;
        height: 21px;
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

    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
        max-width: 104.5rem !important;
    }

    .modal-header span {
        color: #000 !important;
        font-weight: 400;
    }

    .modal-header .error.invalid-feedback,
    .bg-primary .error.invalid-feedback {
        color: #ff0000 !important;
        font-size: 13px !important;
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

    #preview_media>div .owl-item,
    #preview_media>div .owl-item .item {
        min-height: 150px;
        line-height: 150px;
        justify-content: center;
        display: flex;
        align-items: center;

    }

    #preview_media .owl-carousel .owl-stage {
        margin: auto;
        min-width: 300px;
    }

    #preview_media>div .owl-item iframe {
        min-width: 300px !important;
    }

    #preview_media>div .owl-item {
        margin-right: 0 !important;
    }

    #preview_media>div .owl-item.active {
        background: #fff;
        z-index: 1;
    }

    #preview_media>div {
        /*background: #fff;*/
        min-height: 150px;
        line-height: 150px;
        /*display: flex;
            align-items: center;*/
    }

    .bootstrap-tagsinput {
        width: 100% !important;
        padding: 8px 6px !important;
        box-shadow: none !important;
        border: 1px solid #ced4da !important;
    }

    .green {
        color: green;
    }

    .orange {
        color: #ff5722;
    }

    .container {
        width: 300px;
        margin: 10px auto;
    }

    .custom_after_text:after {
        content: 'Creative will appear here';
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 0;
        transform: translate(-50%, -50%);
        width: 100%;
        text-align: center;
        font-size: 15px;
    }

    .video {
        margin-bottom: 5px;
        padding: 0 5px;
        height: 100%;
        position: relative;
        overflow: hidden;
        min-height: 150px;
    }

    #preview_media .video img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #preview_media .video,
    #preview_media .video iframe {
        position: relative;
        z-index: 999999;
    }

    #formPreviewBLock .container .nav-btn {
        font-family: cursive;
    }

    /*.video iframe {
      border: 1px solid #000;
    }*/

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

    #loadData>* {
        padding: 0 11px !important;
    }

    #loadData~.form-row {
        margin-top: 8px !important;
    }

    #loadData .form-row input,
    #loadData .form-row select {
        margin: 4px 0;
        height: 40px;
    }

    .form-row {
        width: 100% !important;
        padding: 0 11px !important;
        margin: 0 !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important;
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
        letter-spacing: 0px;
    }

    .logo {
        text-align: center;
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 12px;
        display: flex;
        align-content: center;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start !important;
        gap: 5px;
    }

    #preview_company_logo img {
        width: unset;
        height: 100%;
        max-height: 36px;
        max-width: 150px;
        display: inline-block;
    }

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
        color: #808080 !important;
        font-size: 16px;
        opacity: 1;
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: #808080 !important;
        font-size: 16px;
        font-weight: 200;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        font-size: 16px;
        font-weight: 200;
        color: #808080 !important;
    }

    ::placeholder {
        /* Most modern browsers support this now. */
        color: gray !important;
        font-size: 16px;
        font-weight: 200;
    }

    .card.sidbar_preview {
        border: 5px solid #000;
        padding: 5px !important;
    }

    #campaign_create_modal .PageFormStyle .us_doller input[aria-invalid="false"],
    #campaign_create_modal form input[aria-invalid="false"] {
        font-weight: 400 !important;
    }

    .SelectFormType label,
    .large-check label {
        font-size: 20px;
    }

    .SelectFormType input[type="radio"],
    .large-check input[type="radio"] {
        transform: scale(1.3);
        margin-top: 0.5rem;
    }

    #campaign_create_modal .PageFormStyle .us_doller input {
        padding-left: 90px !important;
    }

    .us_doller:after {
        content: 'US$';
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: rgb(33 37 41 / 80%);
        left: 0;
        background: #f1f1f2;
        font-size: 19px;
        height: 100%;
        border: 1px solid #94a1b5;
        padding: 10px 20px;
    }

    .us_doller {
        position: relative;
    }

    .custom_image_upload .input-group .input-col .upload-box.grey.image {
        min-width: unset !important;
    }

    .custom_image_video .upload-box {
        min-width: unset !important;
        position: relative;
    }

    .custom_image_video .upload-box .youtube_iframe iframe {
        width: 100%;
        height: 100%;
        border-radius: 5px;
    }

    .custom_image_video .upload-box .youtube_iframe ul {
        position: absolute;
        display: flex;
        justify-content: space-between;
        width: 100%;
        z-index: 999999;
    }

    .custom_image_video .upload-box .youtube_iframe {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 5px;
    }

    .custom_image_video .upload-box .youtube_iframe ul span,
    .custom_image_video .upload-box .youtube_iframe ul span i {
        color: #000;
        font-weight: 600;
        font-size: 12px;
    }

    .remove_video i {
        color: #dc3545 !important;
        margin-right: 5px;
    }

    .remove_video,
    .edit_video {
        cursor: pointer;
    }

    .custom_after_text ul {
        position: relative;
        z-index: 1;
        height: 100%;
        /*    display: flex;*/
        width: 100%;
        /*  justify-content: center;
        align-items: center;
        flex-wrap: wrap;*/
    }

    .custom_after_text ul li img {
        max-height: 160px;
        object-fit: cover;
        width: 100%;
    }

    .custom_image_video .upload-box .youtube_iframe ul span.edit_video {
        width: 18px;
        height: 18px;
        margin-left: 5px;
        line-height: 18px;
        display: block;
        border-radius: 50px;
        cursor: pointer;
    }

    .custom_image_video .upload-box .youtube_iframe ul span {
        z-index: 999999;
    }

    .custom_image_video .upload-box label svg {
        width: 18px;
        height: 18px;
        vertical-align: middle;
        fill: currentColor;
        margin-top: -0.25em;
        margin-right: 0.25em;
    }

    .custom_image_video .upload-box label {
        height: 100%;
        min-height: 100px;
        border-radius: 5px;
        display: flex !important;
        justify-content: center;
        align-items: center;
        padding: 0.8rem 1.25rem;
        background-color: #ddf5ff;
        flex-direction: column;
        cursor: pointer;
        border: 1px solid #94a1b5 !important;
    }

    .custom_image_video .upload-box label span {
        font-size: 14px;
        white-space: nowrap;
        font-weight: 300;
    }

    .custom_image_upload .input-group .input-col,
    .custom_image_video .input-group .input-col {
        width: 100% !important;
        position: relative;
    }

    .custom_image_upload .input-group,
    .custom_image_video .input-group {
        flex: 0 0 30%;
        width: 30%;
    }

    .custom_image_upload,
    .custom_image_video {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    /*#upload_image_2, #upload_image_1 {
        margin-right: 10px;
    }*/
    .custom_image_upload .input-group .input-col .upload-box.grey.image label {
        height: 100%;
        min-height: 100px;
        border-radius: 5px;
        display: flex !important;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .custom_image_upload .input-group .input-col .upload-box.grey.image label span {
        font-size: 14px;
    }

    .custom_image_upload .input-group .input-col .img_preview_box img {
        padding: 10px !important;
        max-width: 100% !important;
        max-height: 100% !important;
        margin: 0 auto !important;
        text-align: center;
        object-fit: contain;
        border-radius: 0px 0px 4px 4px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .custom_image_upload .input-group .input-col .img_preview_box {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        /*    bottom: 0;*/
        height: 100%;
        max-height: 100px;
        background: #ddf5ff;
        border-radius: 5px;
        width: 100%;
    }

    #campaign_create_modal form input {
        font-size: 14px !important;
    }

    #campaign_create_modal .title-small {
        font-size: 14px !important;
        display: block;
    }

    .title-small2 {
        font-size: 14px !important;

    }

    .create-campaign-btn {
        font-size: 18px;
    }

    table.dataTable thead tr th {
        border-right: 1px solid #ffffff36;
        font-size: 17px;
    }

    #campaign_list_length {
        /*width: 30%;
    float: left;*/
        padding: 5px 0px 0px 5px;
    }

    #campaign_list_info {
        width: 35%;
        float: left;
        text-align: right;
    }

    #MyPayments_paginate {
        width: 35%;
        float: right;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin: 2px 0;
        white-space: nowrap;
        justify-content: flex-start !important;
        padding-left: 24px;
    }

    /*div#campaign_list_paginate {
    width: 35%;
    text-align: left;
}*/
    #campaign_list_wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    #campaign_list_info {
        flex: auto;
        text-align: right;
    }

    .ar-14 {
        font-size: 14px !important;
    }

    .ar-16 {
        font-size: 16px !important;
    }

    .cuxtom_pt_5 {
        padding-top: 5px;
    }

    /* #text_white {
    color: #fff !important;
 }*/
    .custom_image_video .upload-box label:hover {
        background-color: #75a4b8;
    }

    table.dataTable thead tr th.sorting:before,
    table.dataTable thead tr th.sorting_asc:before,
    table.dataTable thead tr th.sorting_desc:before,
    table.dataTable thead tr th.sorting_asc_disabled:before,
    table.dataTable thead tr th.sorting_desc_disabled:before,
    table.dataTable thead tr th.sorting:before,
    table.dataTable thead tr th.sorting_asc:before,
    table.dataTable thead tr th.sorting_desc:before,
    table.dataTable thead tr th.sorting_asc_disabled:before,
    table.dataTable thead tr th.sorting_desc_disabled:before {
        bottom: 50% !important;
        content: "▲" !important;
    }

    /* table.dataTable thead tr th.sorting:before,
    table.dataTable thead tr th.sorting:after,
    table.dataTable thead tr th.sorting_asc:before,
    table.dataTable thead tr th.sorting_asc:after,
    table.dataTable thead tr th.sorting_desc:before,
    table.dataTable thead tr th.sorting_desc:after,
    table.dataTable thead tr th.sorting_asc_disabled:before,
    table.dataTable thead tr th.sorting_asc_disabled:after,
    table.dataTable thead tr th.sorting_desc_disabled:before,
    table.dataTable thead tr th.sorting_desc_disabled:after,
    ttable.dataTable thead tr th.sorting:before,
    table.dataTable thead tr th.sorting:after,
    table.dataTable thead tr th.sorting_asc:before,
    table.dataTable thead tr th.sorting_asc:after,
    table.dataTable thead tr th.sorting_desc:before,
    table.dataTable thead tr th.sorting_desc:after,
    table.dataTable thead tr th.sorting_asc_disabled:before,
    table.dataTable thead tr th.sorting_asc_disabled:after,
    table.dataTable thead tr th.sorting_desc_disabled:before,
    table.dataTable thead tr th.sorting_desc_disabled:after {
        position: absolute !important;
        display: block !important;
        opacity: .125 !important;
        right: 10px !important;
        line-height: 9px !important;
        font-size: .8em !important;
    } */


    table.dataTable thead tr th.sorting:after,
    table.dataTable thead tr th.sorting_asc:after,
    table.dataTable thead tr th.sorting_desc:after,
    table.dataTable thead tr th.sorting_asc_disabled:after,
    table.dataTable thead tr th.sorting_desc_disabled:after,
    table.dataTable thead tr th.sorting:after,
    table.dataTable thead tr th.sorting_asc:after,
    table.dataTable thead tr th.sorting_desc:after,
    table.dataTable thead tr th.sorting_asc_disabled:after,
    table.dataTable thead tr th.sorting_desc_disabled:after {
        top: 50% !important;
        content: "▼" !important;
    }

    #formPreviewBLock .container {
        width: 100%;
        margin: 10px auto;
        background-color: #f4f4f4;
        max-width: 330px;
        height: 606px;
        overflow-y: auto;
        border: 3px solid #113399;
        /*    padding-left: 10px;
    padding-right: 10px;*/
        padding-top: 10px;
        padding-bottom: 2px;
        display: flex;
        padding: 0;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 6px 11px #45535a52;
    }

    .modal-open .modal.show {
        background: rgb(0 0 0 / 50%);
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }

    .modal-open #exampleModal .modal-dialog {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        margin: 0;
    }

    .modal-open #exampleModal .modal-dialog .form-group label {
        font-size: 16px;
        font-weight: 600;
    }

    #preview_media {
        max-width: 300px;
        width: 100%;
        padding: 0 !important;
    }

    #preview_media .owl-carousel .owl-item img {
        max-width: unset;
        max-height: 150px;
        margin: auto;
        object-fit: contain;
    }

    #preview_media>div .owl-item .item iframe {
        border-bottom: 1px solid #ced4da;
    }

    #preview_media .owl-theme .owl-nav {
        font-size: 18px;
        line-height: 1;
        font-family: 'Poppins';
        font-weight: 500;
        margin-top: 0;
    }

    #preview_media .prev-slide:after {
        content: "<";
    }

    #preview_media .next-slide:after {
        content: ">";
    }

    #preview_media .owl-carousel .owl-stage {
        margin: auto;
    }

    #preview_media .owl-theme .owl-nav button {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        background: #fff;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0 0 7px #00000038;
    }

    #preview_media .owl-theme .owl-nav .owl-next {
        right: 0;
        left: unset;
        color: #000;
    }

    #preview_media .owl-theme .owl-nav button:hover {
        color: #000;
    }

    .dataTables_wrapper .dataTables_filter {
        width: 100%;
    }

    .create_qty {
        min-height: 0 !important;
        visibility: hidden;
        padding: 0 !important;
        height: 0 !important;
        position: absolute !important;
    }

    #formPreviewBLock .container {
        /*    overflow: hidden;*/
        padding: 0 !important;
        margin: 10px auto !important;

    }

    #formPreviewBLock .video {
        margin: 0 !important;
    }

    #formPreviewBLock .form-row input:-moz-placeholder {
        font-weight: 400;
    }

    #formPreviewBLock .form-row input::-moz-placeholder {
        font-weight: 400;
    }

    #formPreviewBLock .form-row input:-ms-input-placeholder {
        font-weight: 400;
    }

    #formPreviewBLock .form-row input::-ms-input-placeholder {
        font-weight: 400;
    }

    #formPreviewBLock .form-row input::placeholder {
        font-weight: 400;
    }

    .ls-mt-2 {
        margin-top: 2px;
    }

    #preview_company_logo {
        margin-bottom: 3px;
        margin-top: 3px;
        margin-left: 5px;
        height: 100%;
        max-height: 36px;
    }

    #preview_media>div .owl-item .item .image-wapperr img {
        width: unset;
    }

    #preview_media>div .owl-item .item .image-wapperr {
        width: 300px;
        min-width: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #preview_form_title.form-title {
        margin-top: 7px !important;
    }

    .btn-success {
        background-color: #11b6f3 !important;
    }

    #formPreviewBLock .container div {
        width: 100%;
    }

    #formPreviewBLock .video {
        padding: 0 !important;
        width: auto !important;
    }

    #campaign_create_modal {
        padding-right: 0 !important;
    }

    .lp-dark {
        color: #23231b !important;
    }

    #CreateNewForm .lp-border {
        border: 3px solid #113399;
    }

    .lp-border-right {
        border-right: 2px solid #113399;
    }

    #campaign_form .modal-content .modal-body {
        background: #f4f4f4;
    }

    #campaign_form .modal-content {
        border-radius: 0;
    }

    #form_name-error {
        color: #ffcbcb !important;
        font-size: 18px !important;
    }

    .privcy-polcy {
        color: #666;
    }

    #formPreviewBLock .policy {
        margin-top: 2px !important;
    }

    #CreateNewForm .fbox,
    #CreateNewForm .fbox .gray_title {
        margin: 0 -15px 0px -15px;
    }

    #campaigns_date_table #campaign_list_filter {
        position: relative;
        text-align: right;
    }

    #campaigns_date_table .paymentt_tab {
        position: absolute;
        right: 15px;
        top: 0px;
    }

    .paymentt_tab input {
        border-radius: 0;
        height: calc(1rem + 1rem + 2px);
        font-size: 15px !important;
        border: 1px solid #ced4da;
    }


    .tab_heading  {
        font-size: 1.125rem;
        color: #34495e;
        display: inline-block;
        font-weight: 500;
    }

    .bodywrapper__inner .row.align-items-center.mb-15.justify-content-between {
        display: none;
    }

    table tfoot tr th {
        border-right: 1px solid #ffffff36 !important;
        font-size: 17px !important;
        color: #fff;
        border-left: none !important;
        border-bottom: none !important;
        border-top: none !important;
    }

    table tfoot tr {
        background-color: #1A273A;
    }

    #formPreviewBLock .container {
        justify-content: flex-start !important;
    }

    #form_name,
    #campaign_form .modal-header input {
        text-transform: capitalize;
    }

    #campaign_form input,
    .form-punchline,
    .form-subtitle,
    .form-title,
    #preview_company_name {
        /* text-transform: capitalize;*/
    }

    #UseExistingForm {
        border: 3px solid #113399;
    }

    .UseExistingCol #UseExistingForm .border {
        border: none !important;
    }

    #campaign_list tbody tr td:nth-child(4),
    #campaign_list tbody tr td:nth-child(4) a {
        font-size: 15px;
    }

    .logo_comapny {
        min-height: 0 !important;
        visibility: hidden;
        padding: 0 !important;
        height: 0 !important;
        position: absolute !important;
    }

    #formPreviewBLock .form-punchline {
        margin: 0 0 2px 0 !important;
    }

    .InputQuestion_text[readonly],
    .fbox input[readonly] {
        background: #ccc !important;
    }

    #campaign_list td.edit_btns a {
        font-size: 12px !important;
    }

    tr.delete_row {
        background-color: #ccc !important;
    }

    .delete_row td:first-child {
        pointer-events: none;
    }

    .delete_row td:first-child .toggle {
        display: none;
    }

    div.dataTables_wrapper div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        text-align: left;

    }

    .draft td {
        background: #FDEFB2;
    }

    #campaigns_date_table img {
        width: 13px;
        margin-right: 4px;
    }

    #campaigns_date_table .nav {
        margin-bottom: 25px;
    }

    #campaigns_date_table .nav .nav-item {
        background: #fff;
        margin-right: 12px;
        box-shadow: 0 0 3px #0000003d;
        font-size: 13px;
    }

    #campaigns_date_table .nav .nav-item .nav-link {
        color: #1a273a;
        padding: 5px 15px;
    }

    #campaigns_date_table .nav .nav-item .active {
        background: #4500dd;
        color: #fff;
    }

    .dataTables_filter input {
        border-radius: 0 !important;
    }

    .dataTables_filter {
        position: relative;
    }

    .dataTables_wrapper  {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        position: relative;
    }

    .dataTables_filter:after {
        position: absolute;
        left: 0;
        font-size: 1.125rem;
        color: #34495e;
        display: inline-block;
        font-weight: 500;
    }

   #campaign_list_live_filter:after { content: 'Live Campaigns'; }
   #campaign_list_pending_filter:after {  content: 'Pending Approval'; }
   #campaign_list_draft_filter:after {  content: 'Draft'; }
   #campaign_list_trash_filter:after {  content: 'Deleted'; }

    @media (min-width:769px) {
        .paymentt_tab input {
            position: absolute;
            right: 0;
            top: 55px;
            z-index: 999;
        }
        .dataTables_wrapper .dataTables_filter {
            width: calc(100% - 250px);
        }
    }
</style>
@endpush
