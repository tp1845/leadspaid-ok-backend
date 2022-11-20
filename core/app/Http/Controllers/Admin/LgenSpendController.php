<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LgenSpendExport;
use App\Http\Controllers\Controller;
use App\Imports\LgenSpendImport;
use App\lgen_spend;
use App\campaigns;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LgenSpendController extends Controller
{
    public function index()
    {
        $page_title    = 'All Spend';
        $empty_message = 'No Spend';
        $lgen_spend         = lgen_spend::all();

        return view('admin.campaigns.lgenspend', compact('page_title', 'empty_message', 'lgen_spend'));
    }
    public function export($cid, $aid, $fid)
    {
        $campaign_id = $cid;
        $campaign = campaigns::where('id', $campaign_id )->with('campaign_forms')->first();
        if($campaign){
        $campaign_name =  $campaign['name'] ;
        }
        return Excel::download(new LgenSpendExport($campaign_id, $campaign_name), 'LgenSpend.xlsx');
    }



    public function import(Request $request, $cid, $aid, $fid){
        $request->validate(['file' => 'required|mimes:xlsx, xls' ]);
        $campaign_id = $cid;
        $advertiser_id = $aid;
        $form_id = $fid;
        $LgenSpendImportReturn = new LgenSpendImport($campaign_id,$advertiser_id, $form_id, false );
        $LgenSpendImportReturn->import( $request->file('file')->store('files'));
        $LeadsValidationErrors = $LgenSpendImportReturn->getErrors();
        $LgenSpendData = $LgenSpendImportReturn->getSpendData();
        if($LgenSpendData){
            return response()->json(['success'=>true, 'data'=> $LgenSpendData]);
        }else{
            return response()->json(['success'=>false, 'data'=> $LeadsValidationErrors]);
        }
    }

    public function importPreview(Request $request, $cid, $aid, $fid){
        $request->validate(['file' => 'required|mimes:xlsx, xls' ]);
        $campaign_id = $cid;
        $advertiser_id = $aid;
        $form_id = $fid;
        $LgenSpendImportReturn = new LgenSpendImport($campaign_id,$advertiser_id, $form_id, true );
        $LgenSpendImportReturn->import( $request->file('file')->store('files'));
        // getErrors on LeadsImportReturn class:
        $LeadsValidationErrors = $LgenSpendImportReturn->getErrors();
        $LgenSpendData = $LgenSpendImportReturn->getSpendData();
        if($LgenSpendData){
            return response()->json(['success'=>true, 'data'=> $LgenSpendData]);
        }else{
            return response()->json(['success'=>false, 'data'=> $LeadsValidationErrors]);
        }
    }


}
