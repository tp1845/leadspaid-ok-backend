<?php

namespace App\Http\Controllers\Advertiser;

use App\campaigns;
use App\Country;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignsController extends Controller
{
    public function index(Request $request)
    {

        $campaigns = campaigns::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->get();
        $countries = Country::all();
        $page_title = 'All Campaigns';
        $empty_message = "No Campaigns";
        return view(activeTemplate() . 'advertiser.campaigns.index', compact('campaigns', 'countries', 'page_title', 'empty_message'));
    }

    public function edit(Request $request, $id)
    {

        $campaign = campaigns::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->where('id', $id)->first();

        $campaign->target_placements = unserialize($campaign->target_placements);
        return response()->json($campaign );
    }


    public function store(Request $request)
    {
        $user = Auth::guard('advertiser')->user()->id;
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'form_id' => 'required',
            'daily_budget' => 'required'
        ]);
        if($request->campaign_id){
            $campaign = campaigns::findOrFail( $request->campaign_id);
        }else{
            $campaign = new campaigns();
        }

        //$campaign->advertiser_id = $request->advertiser_id;
        $campaign->advertiser_id = $user;
        $campaign->name = $request->name;
        $campaign->start_date =  Carbon::parse($request->start_date);
        if($request->end_date_select ==="NoEndDate"){
            $campaign->end_date =  NULL;
        }else{
            $campaign->end_date = $campaign->end_date?Carbon::parse($request->end_date):NULL;
        }

        $campaign->daily_budget = $request->daily_budget;
        $campaign->target_country = $request->target_country;
        $campaign->target_city = $request->target_city;
        $campaign->target_type = $request->target_type;
        $campaign->target_placements = serialize($request->target_placements);
        $campaign->service_sell_buy = $request->service_sell_buy;
        $campaign->keywords = $request->keywords;
        $campaign->form_id = $request->form_id;
        $campaign->website_url = $request->website_url;
        $campaign->social_media_page = $request->social_media_page;
        $campaign->delivery = $request->delivery;
        $campaign->apporve =  0;
        $campaign->delivery = 0;
        $campaign->status = 0;
        if($request->campaign_id){
            $campaign->update();
            $notify[] = ['success', 'Campaign Updated successfully'];
        }else{
            $campaign->save();
            $notify[] = ['success', 'Campaign created successfully'];
        }

        return back()->withNotify($notify);
    }

    public function changeStatus(Request $request )
    {
        $user = Auth::guard('advertiser')->user()->id;
        $campaign = campaigns::findOrFail( $request->campaign_id);
        $campaign->status = $request->status;
        $campaign->update();
        if( $request->status  == 1){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
        //return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'form_id' => 'required',
            'daily_budget' => 'required'
        ]);
        $campaign = campaigns::findOrFail( $request->campaign_id);
        $campaign->status = 0;
        $campaign->update();
        $notify[] = ['success', 'Ad updated successfully'];
        return back()->withNotify($notify);
    }

}
