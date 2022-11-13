<?php

namespace App\Http\Controllers\Admin;

use App\campaigns;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeadsExport;
use App\Imports\LeadsImport;


class CampaignsController extends Controller
{
    public function index()
    {
        $page_title = 'All Campaigns';
        $empty_message = 'No Campaigns';
        $campaigns = campaigns::all();
        return view('admin.campaigns.index',compact('page_title','empty_message','campaigns'));
    }

    public function export($cid, $aid, $fid)  {
        $campaign_id = $cid;
        $advertiser_id = $aid;
        $campaign = campaigns::where('id', $campaign_id )->select('name')->first();
        if($campaign){
        $campaign_name =  $campaign['name'] ;
        return Excel::download(new LeadsExport($campaign_id, $advertiser_id, $campaign_name), 'leads.xlsx');
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

}
