{{-- //  campaigns Status
// Draft = 0,  Active = 1, Pending Approval = 2, Rejected = 3, Deleted = 4; --}}
<tr class="@if(($campaign->status==4)) delete_row @endif   @if($campaign->status == 0 ) draft @endif  ">
    <td>{{$campaign->id}}</td>
    <td>
        @if($campaign->status!=3 && $campaign->status!=4)
            <input type="checkbox" name="status" @if($campaign->status) checked @endif data-toggle="toggle" data-size="small" data-onstyle="success" data-style="ios" class="toggle-status" data-id="{{$campaign->id}}">
        @endif
    </td>
    <td class="edit_btns">{{ $campaign->name }} <br>
        @if($campaign->status!=3 && $campaign->status!=4)
        <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-status="@if($campaign->status)1 @else 0 @endif" data-type="edit" class="editcampaign create-campaign-btn2">Edit</a>
        | <a href="{{ route("advertiser.campaigns.edit",  $campaign->id ) }}" data-id="{{ $campaign->id }}" data-type="duplicate" class="duplicatecampaign create-campaign-btn2">Duplicate</a>
        | <a href="{{ route("advertiser.campaigns.delete-camp",  $campaign->id ) }}" data-id="{{ $campaign->id }}" class="btn-danger1 delete_campaign">Delete</a>
        @endif
    </td>
    <td>
        @if($campaign->status == 0 )
            <span class="yellow">Draft</span>
        @elseif($campaign->status == 1 )
            <span class="green">Active </span>
        @elseif($campaign->status == 2 )
            <span class="orange">Pending<br />Approval</span>
        @elseif($campaign->status == 3 )
            <span class="orange">Rejected</span>
        @elseif(($campaign->status == 4))
            Deleted
        @else
            <span class="orange">--</span>
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
