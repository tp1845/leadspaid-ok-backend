<?php

namespace App\Http\Controllers;

use App\campaign_forms_leads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\campaigns;

class CampaignFormController extends Controller
{
    public function campaign_form_view ($campaign_id, $publisher_id){
        $campaign = campaigns::where('id', $campaign_id )->with('campaign_forms')->first();
        $page_title ='';
        return view(activeTemplate() . 'CampaignFormView', compact('campaign',  'page_title' ));
    }
    public function campaign_form_save(Request $request){
        $request->validate([
            'capf_id' => 'required',
            'field_1' => 'required',
            'field_2' => 'required',
            'field_3' => 'required',
            'field_4' => 'required',
            'field_5' => 'required'
        ],[
            'capf_id.required' => 'All fields are required.',
            'field_1.required' => 'All fields are required.',
            'field_2.required' => 'All fields are required.',
            'field_3.required' => 'All fields are required.',
            'field_4.required' => 'All fields are required.',
            'field_5.required' => 'All fields are required.'
        ]);
        $ids =  explode(",",$request->capf_id) ;

        $campaign_id = isset($ids[0])?$ids[0]:false;
        $advertiser_id = isset($ids[1])?$ids[1]:false;
        $publisher_id = isset($ids[2])?$ids[2]:false;
        $form_id = isset($ids[3])?$ids[3]:false;
        if($campaign_id && $advertiser_id && $publisher_id && $form_id ) {
            $lead = new campaign_forms_leads();
            $lead->campaign_id = $campaign_id;
            $lead->advertiser_id = $advertiser_id;
            $lead->publisher_id = $publisher_id;
            $lead->form_id = $form_id;
            $lead->field_1 = $request->field_1;
            $lead->field_2 = $request->field_2;
            $lead->field_3 = $request->field_3;
            $lead->field_4 = $request->field_4;
            $lead->field_5 = $request->field_5;
            $lead->save();
            $notify[] = ['success', 'Form Submit Successfully'];
        }else{
            $notify[] = ['error', 'Try After Sometime!'];
        }
        return back()->withNotify($notify);
    }
}
