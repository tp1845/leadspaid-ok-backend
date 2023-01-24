<?php

namespace App\Http\Controllers\Admin;

use App\Advertiser;
use App\campaigns;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeadsExport;
use App\Imports\LeadsImport;
use Carbon\Carbon;


class CampaignsController extends Controller
{
    public function index()
    {
        $page_title = 'All Campaigns';
        $empty_message = 'No Campaigns';
        $campaigns = campaigns::with('advertiser')->with('campaign_forms')->orderBy('id', 'DESC')->get();
        
		$pending = campaigns::with('advertiser')->with('campaign_forms')->where('status',0)->orderBy('id', 'DESC')->get();
         $active = campaigns::with('advertiser')->with('campaign_forms')->where('status',1)->orderBy('id', 'DESC')->get();
		return view('admin.campaigns.index',compact('page_title','empty_message','campaigns','pending','active'));
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
            $campaign->start_date = Carbon::now();
            $campaign->update();
        if( $request->approval  == 1){
            $user = Advertiser::select('name','email')->findOrFail($campaign->advertiser_id);
            $data = array(
                'campaign_name' => $campaign->name,
                'advertiser_name' => $user->name,
                'advertiser_email' => $user->email,
                'campaign_url' =>  route('advertiser.campaigns.index')
            );
            send_email_campaign_approval($user,'EVER_CODE',$data);
            return response()->json(['success'=>true, 'message'=> 'Campaign successfully approve']);
        }else{
            return response()->json(['success'=>false, 'message'=> 'Campaign successfully unapprove']);
        }
        }else{
            return response()->json(['success'=>false, 'message'=> 'Somthing Worng please try again']);
        }
    }

}
