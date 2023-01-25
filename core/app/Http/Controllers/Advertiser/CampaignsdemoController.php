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
    public function index(Request $request, $style = 3)
    {
        $forms = campaign_forms::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->get();
        $campaigns=campaigns::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->with('campaign_forms:id,form_name')->where('approve',1)->orderBy('id', 'DESC')->get();
         $campaignspending = campaigns::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->with('campaign_forms:id,form_name')->where('approve',0)->where('status','!=',0)->orderBy('id', 'DESC')->get();

        $campaignstrash = campaigns::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->with('campaign_forms:id,form_name')->where('approve',0)->where('status',0)->orderBy('id', 'DESC')->get();

		$campaignsval=campaigns::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->with('campaign_forms:id,form_name')->orderBy('id', 'DESC')->get();

        $last_campaign = campaigns::orderBy('id', 'desc')->first();
        if($last_campaign){
            $last_campaign = $last_campaign->id;
        }else{
            $last_campaign = 0;
        }

        $next_campaign =  'LGen_Campaign_'.($last_campaign+1);

        $countries = Country::all();
        $page_title = 'All Campaigns';
        $empty_message = "No Campaigns";



        return view(activeTemplate() . 'advertiser.campaigns.index'.$style, compact('campaigns','campaignspending', 'next_campaign', 'forms', 'countries', 'page_title', 'empty_message','campaignsval','campaignstrash'));
    }


    public function store(Request $request)
    {
        $user = Auth::guard('advertiser')->user()->id;
        $request->validate([ ]);

        $validator = Validator::make(
            $request->all(), [
                'campaign_name' => 'required',

                'company_logo' => 'mimes:jpeg,jpg,png,gif,svg,webp,tiff,eps|max:2048'
            ]
        );
        $validator->validate();
        if($request->form_id){
            $form_id =$request->form_id;
        }else{
            $campaign_forms = new campaign_forms();
            $campaign_forms->advertiser_id = $user;
            $campaign_forms->form_name     = $request->campaign_name.'-'. $request->company_name;
            $campaign_forms->company_name  = $request->company_name;
            $campaign_forms->company_logo  = $request->company_logo;
            $campaign_forms->form_name    = $request->form_name;

            $campaign_forms->title    = array_unique($request->form_title);
            $campaign_forms->form_desc    = array_unique($request->form_desc);

            if(isset($request->form_title[1])){
                $campaign_forms->form_title    = $request->form_title[1];
            }
            if(isset($request->form_title[1])){
            $campaign_forms->offer_desc    = $request->form_desc[1];
            }
            $campaign_forms->punchline    = $request->form_punchline;
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

			if(isset($request->statusr)){
                $campaign_forms->status = 2;
            }

            if($campaign_forms->save())
            {
                $form_id = $campaign_forms->id;
            }
            else{
                $form_id = false;
                $notify[] = ['success', 'Try After Sometime'];
            }
        }
        // ===================================
        if($form_id){
            if($request->campaign_id){
                $campaign = campaigns::findOrFail( $request->campaign_id);
            }else{
                $campaign = new campaigns();
                $campaign->status = 1;
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
              if(isset($request->statusr)){
                 $campaign->delivery = 2;
            }
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

    public function save_draft(Request $request)
    {

        $user = Auth::guard('advertiser')->user()->id;
        $request->validate([ ]);

        if($request->form_id){
            if( $request->draft_form_id &&  $request->draft_form_id  != 0 ){ campaign_forms::find($request->draft_form_id)->delete(); }
            $form_id = $request->form_id;
            $campaign_forms = campaign_forms::findOrFail( $form_id );
            $save_form = false;
        }elseif( $request->draft_form_id  != 0){
            $form_id = $request->draft_form_id;
            $campaign_forms = campaign_forms::findOrFail( $form_id );
            $save_form = true;
        }else{
            $campaign_forms = new campaign_forms();
            $save_form = true;
        }
        if($save_form){
            $campaign_forms->advertiser_id = $user;
            $campaign_forms->company_name  = $request->company_name;
            $campaign_forms->company_logo  = $request->company_logo;
            if($request->form_name){
                $campaign_forms->form_name    = $request->form_name;
            }else{
                $campaign_forms->form_name     = $request->company_name?$request->campaign_name.'-'.$request->company_name:$request->campaign_name;
            }
            if($request->form_title){
                $campaign_forms->title    = array_unique($request->form_title);
            }
            if($request->form_desc){
                $campaign_forms->form_desc    = array_unique($request->form_desc);
            }

            if(isset($request->form_title[1])){
                $campaign_forms->form_title    = $request->form_title[1];
            }
            if(isset($request->form_title[1])){
            $campaign_forms->offer_desc    = $request->form_desc[1];
            }

            $campaign_forms->punchline    = $request->form_punchline;
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

			if(isset($request->statusr)){
                $campaign_forms->status = 2;
            }


            if($campaign_forms->save())
            {
                $form_id = $campaign_forms->id;
            }
        }

        // ===================================
        if($form_id){
            if($request->campaign_id){
                $campaign = campaigns::findOrFail( $request->campaign_id);
            }else{
                $campaign = new campaigns();
                $campaign->status = 1;
                $campaign->approve =  0;
                $campaign->delivery = 0;
            }

            $campaign->advertiser_id = $user;
            $campaign->name = $request->campaign_name;
            $campaign->leads_criteria = $request->leads_criteria;
            $campaign->daily_budget = $request->daily_budget?$request->daily_budget:0;
            $campaign->target_cost = $request->target_cost;
            $campaign->target_country = $request->target_country;
            $campaign->website_url = $request->website_url;
            $campaign->social_media_page = $request->social_media_page;
            $campaign->form_id = $form_id;
              if(isset($request->statusr)){
                 $campaign->delivery = 2;
            }
            if($request->campaign_id){
                $campaign_id =  $request->campaign_id;
                $campaign->update();
                $notify[] = ['success', 'Campaign Updated successfully'];
            }else{

                $campaign->save();
                $campaign_id = $campaign->id;
                $notify[] = ['success', 'Campaign created successfully'];
            }
        }

        return response()->json(['success'=>true, 'campaign_id'=>$campaign_id, 'form_id'=> $save_form?$form_id:'0']);
    }

    public function getform(Request $request)
    {
        $form = campaign_forms::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->where('id', $request->form_id)->get();
        if( $form ){
            return response()->json(['success'=>true, 'form'=>$form]);
        }else{
            return response()->json(['success'=>false, 'form'=>false]);
        }
    }
}
