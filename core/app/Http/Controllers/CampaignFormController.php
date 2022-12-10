<?php

namespace App\Http\Controllers;

use App\campaign_forms_leads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\campaigns;
use App\DomainVerifcation;
use Carbon\Carbon;

class CampaignFormController extends Controller
{
    public function campaign_form_view ($publisher_id, $style, $campaign_id=false){
        $page_title ='';
        $style = $style>4?1:$style;
        return view(activeTemplate() . 'campaign_form.Style'.$style.'View', compact('publisher_id',  'campaign_id',  'page_title' ));
    }
    public function campaign_form_save(Request $request){
        $request->validate([
            'capf_id' => 'required',
            // 'field_1' => 'required',
            // 'field_2' => 'required',
            // 'field_3' => 'required',
            // 'field_4' => 'required',
            // 'field_5' => 'required'
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
            $lead->lgen_date = Carbon::now();
            $lead->lgen_source =  $request->utm_source;
            $lead->lgen_medium =  $request->utm_medium;
            $lead->lgen_campaign =  $request->utm_campaign;
            $lead->form_id = $form_id;
            $lead->field_1 = $request->field_1;
            $lead->field_2 = $request->field_2;
            $lead->field_3 = $request->field_3;
            $lead->field_4 = $request->field_4;
            $lead->field_5 = $request->field_5;
            $lead->save();
            return response()->json(['success'=>true, 'form'=>'Form Submit Successfully'   ]);;
        }else{
           return response()->json(['success'=>false, 'form'=>'Something went wrong. please contact the administrator' ]);;
        }
    }
    public function campaign_form_find ($website, $publisher_id){
        $campaign_by_website = false;
        $campaign_by_keywords = false;
        $campaign_by_category = false;
        if($website){
               // $campaign_by_website = campaigns::where('target_placements', 'like', '%'.$website.'%' )->with('campaign_forms')->inRandomOrder()->first();
                $campaign_by_website = campaigns::whereJsonContains('target_placements',  $website  )->with('campaign_forms')->inRandomOrder()->first();
        }
        if($campaign_by_website){
            $campaign_by_website->campaign_forms->campaign_id = $campaign_by_website->id;
            return response()->json(['success'=>true,'type'=>'campaign_by_website', 'form'=>$campaign_by_website->campaign_forms   ]);;
        }

        //  Find By Keyword
        if($website && $publisher_id && !$campaign_by_website){
            //get publisher domain keyword
            $domain_data = DomainVerifcation::where('publisher_id', $publisher_id )->where('domain_name', $website )->first();
            if($domain_data) {
            $publisher_keywords = $domain_data->keywords;
            $query = campaigns::whereRaw("find_in_set('".$publisher_keywords[0]."',keywords)");
            if(is_array($publisher_keywords)){
                foreach($publisher_keywords as $keyword){
                    $query->orWhereRaw("find_in_set('".$keyword."',keywords)");
                }
            }
            $campaign_by_keywords = $query->with('campaign_forms')->inRandomOrder()->first();
            if($campaign_by_keywords){
                $campaign_by_keywords->campaign_forms->campaign_id = $campaign_by_keywords->id;
                return response()->json(['success'=>true, 'type'=>'campaign_by_keywords', 'form'=>$campaign_by_keywords->campaign_forms ]);
            }
        }
    }
        //Find By Category
        if($website && $publisher_id && !$campaign_by_website && !$campaign_by_keywords){
            //get publisher domain keyword
            $domain_data = DomainVerifcation::where('publisher_id', $publisher_id )->where('domain_name', $website)->first();
            if($domain_data){
            $publisher_category = (explode(",",$domain_data->category));

            $query = campaigns::whereJsonContains('target_categories',  $publisher_category[0]  );
            // $query = campaigns::whereRaw("find_in_set('".$publisher_category[0]."',service_sell_buy)");
            foreach($publisher_category as $category){
                $query->orwhereJsonContains('target_categories',  $category  );
               // $query->orWhereRaw("find_in_set('".$category."',service_sell_buy)");
            }
            $campaign_by_category = $query->with('campaign_forms')->inRandomOrder()->first();
            if($campaign_by_category){
                $campaign_by_category->campaign_forms->campaign_id = $campaign_by_category->id;
                return response()->json(['success'=>true, 'type'=>'campaign_by_category', 'form'=>$campaign_by_category->campaign_forms ]);
            }
        }
    }
        $campaign = campaigns::inRandomOrder()->first();
        $campaign->campaign_forms->campaign_id = $campaign->id;
        if($campaign){
            return response()->json(['success'=>true, 'type'=>'anyRandom', 'form'=>$campaign->campaign_forms]);
        }else{
            return response()->json(['success'=>false, 'form'=>'Something went wrong. please contact the administrator' ]);;
        }
    }

    public function by_campaign_id_form ($campaign_id, $publisher_id){
        $campaign = campaigns::where('id',  $campaign_id )->with('campaign_forms')->inRandomOrder()->first();
        $campaign->campaign_forms->campaign_id = $campaign->id;
        return response()->json(['success'=>true,'type'=>'By_campaign_id', 'form'=>$campaign->campaign_forms ]);
    }
}
