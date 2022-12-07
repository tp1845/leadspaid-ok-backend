<?php

namespace App\Http\Controllers\Publisher;

use App\campaign_publisher;
use App\campaigns;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeadsExport;
use App\Imports\LeadsImport;


class CampaignsController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }
    public function index()
    {
        $page_title = 'All Campaigns';
        $empty_message = 'No Campaigns';
        $campaigns = campaigns::with('advertiser')->with('campaign_forms')->with('campaign_publisher')->get();
        return view($this->activeTemplate .'publisher.campaigns.index',compact('page_title','empty_message','campaigns'));
    }

    public function export($cid, $aid, $fid)  {
        $campaign_id = $cid;
        $advertiser_id = $aid;
        $campaign = campaigns::where('id', $campaign_id )->with('campaign_forms')->first();
        if($campaign){
        $campaign_name =  $campaign['name'] ;
        $campaign_form = $campaign['campaign_forms'];
        return Excel::download(new LeadsExport($campaign_id, $advertiser_id, $campaign_name, $campaign_form), 'leads.xlsx');
        }
    }

    public function import(Request $request, $cid, $aid, $fid){
        $request->validate(['file' => 'required|mimes:xlsx, xls' ]);
        $campaign_id = $cid;
        $advertiser_id = $aid;
        $form_id = $fid;
        $LeadsImportReturn = new LeadsImport($campaign_id,$advertiser_id, $form_id, false );
        $LeadsImportReturn->import( $request->file('file')->store('files'));
        $LeadsValidationErrors = $LeadsImportReturn->getErrors();
        $LeadsData = $LeadsImportReturn->getLeadsData();
        if($LeadsData){
            return response()->json(['success'=>true, 'data'=> $LeadsData]);
        }else{
            return response()->json(['success'=>false, 'data'=> $LeadsValidationErrors]);
        }
    }

    public function importPreview(Request $request, $cid, $aid, $fid){
        $request->validate(['file' => 'required|mimes:xlsx, xls' ]);
        $campaign_id = $cid;
        $advertiser_id = $aid;
        $form_id = $fid;
        $LeadsImportReturn = new LeadsImport($campaign_id,$advertiser_id, $form_id, true );
        $LeadsImportReturn->import( $request->file('file')->store('files'));
        // getErrors on LeadsImportReturn class:
        $LeadsValidationErrors = $LeadsImportReturn->getErrors();
        $LeadsData = $LeadsImportReturn->getLeadsData();
        if($LeadsData){
            return response()->json(['success'=>true, 'data'=> $LeadsData]);
        }else{
            return response()->json(['success'=>false, 'data'=> $LeadsValidationErrors]);
        }
    }
    public function update_approval(Request $request){
        $request->validate(['approval' => 'required', 'campaign_id' => 'required' ]);
        $campaign = campaigns::findOrFail( $request->campaign_id);
        if($campaign){
            $campaign->approve =  $request->approval;
            $campaign->delivery = $request->approval;
            $campaign->update();
        if( $request->approval  == 1){
            return response()->json(['success'=>true, 'message'=> 'Campaign successfully approve']);
        }else{
            return response()->json(['success'=>false, 'message'=> 'Campaign successfully unapprove']);
        }
        }else{
            return response()->json(['success'=>false, 'message'=> 'Somthing Worng please try again']);
        }
    }

    public function url_save(Request $request){
        $campaign_id = $request->campaign_id;
        $publisher_id = $request->publisher_id;
        $campaign = campaign_publisher::firstOrNew([ 'campaign_id' => $campaign_id,  'publisher_id' => $publisher_id ]);
       /// $campaign = campaign_publisher::where('campaign_id', $campaign_id )->where('publisher_id', $publisher_id)->first();
        if($request->url){
            $campaign->url =  $request->url;
            $campaign->save();
        } else{
            $campaign->delete();
        }
        return response()->json(['success'=>true, 'message'=> $request->url]);
    }

}
