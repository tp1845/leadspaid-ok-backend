<?php

namespace App\Http\Controllers\Advertiser;

use App\campaign_forms;
use App\campaigns;
use App\Country;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CampaignsdemoController extends Controller
{
    public function index($style)
    {
        $forms = campaign_forms::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->get();
        $campaigns = campaigns::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->with('campaign_forms:id,form_name')->get();
        $last_campaign = campaigns::orderBy('id', 'desc')->first()->id;
        $next_campaign =  'LGen_Campaign_'.$last_campaign+1;

        $countries = Country::all();
        $page_title = 'All Campaigns';
        $empty_message = "No Campaigns";
        return view(activeTemplate() . 'advertiser.campaigns.index'.$style, compact('campaigns', 'next_campaign', 'forms', 'countries', 'page_title', 'empty_message'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('advertiser')->user()->id;
        $request->validate([

        ]);

        $validator = Validator::make(
            $request->all(), [
                'campaign_name' => 'required',
                'daily_budget' => 'required',
                'company_logo' => 'mimes:jpeg,jpg,png,gif|max:2048'
            ]
        );
        $validator->validate();
        $campaign_forms = new campaign_forms();
        $campaign_forms->advertiser_id = $user;
        $campaign_forms->form_name     = $request->campaign_name.'-'. $request->company_name;
        $campaign_forms->company_name  = $request->company_name;
        $campaign_forms->company_logo  = $request->company_logo;
        $campaign_forms->form_title    = $request->company_name;
        $campaign_forms->offer_desc    = $request->company_name;
        $campaign_forms->youtube_1     = $request->youtube_1;
        $campaign_forms->youtube_2     = $request->youtube_2;
        $campaign_forms->youtube_3     = $request->youtube_3;
        $campaign_forms->image_1 = $request->image_1;
        $campaign_forms->image_2 = $request->image_2;
        $campaign_forms->image_3 = $request->image_3;
        $campaign_forms->field_1 = $request->field_1;
        $campaign_forms->field_2 = $request->field_2;
        $campaign_forms->field_3 = $request->field_3;
        $campaign_forms->field_4 = $request->field_4;
        $campaign_forms->field_5 = $request->field_5;

        $path = 'assets/images/campaign_forms';
        if($request->file('company_logo'))
        {
            $campaign_forms->company_logo = uploadImage($request->company_logo, $path);
        }
        if($request->file('image_1'))
        {
            $campaign_forms->image_1 = uploadImage($request->image_1, $path);
        }
        if($request->file('image_2'))
        {
            $campaign_forms->image_2 = uploadImage($request->image_2, $path);
        }
        if($request->file('image_3'))
        {
            $campaign_forms->image_3 = uploadImage($request->image_3, $path);
        }

        if($campaign_forms->save())
        {
            $form_id = $campaign_forms->id;
        }
        else{
            $form_id = false;
            $notify[] = ['success', 'Try After Sometime'];
        }

        // ===================================
        if($form_id){
            if($request->campaign_id){
                $campaign = campaigns::findOrFail( $request->campaign_id);
            }else{
                $campaign = new campaigns();
                $campaign->status = 0;
                $campaign->approve =  0;
                $campaign->delivery = 0;
            }

            $campaign->advertiser_id = $user;
            $campaign->name = $request->campaign_name;
            $campaign->leads_criteria = $request->leads_criteria;
            $campaign->daily_budget = $request->daily_budget;
            $campaign->target_cost = $request->target_cost;
            $campaign->target_country = $request->target_country;
            $campaign->website_url = $request->website_url;
            $campaign->social_media_page = $request->social_media_page;
            $campaign->form_id = $form_id;

            if($request->campaign_id){
                $campaign->update();
                $notify[] = ['success', 'Campaign Updated successfully'];
            }else{
                $campaign->save();
                $notify[] = ['success', 'Campaign created successfully'];
            }
        }
        return back()->withNotify($notify);
    }
}
