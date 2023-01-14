<?php

namespace App\Http\Controllers\Publisher;

use App\Advertiser;
use App\campaign_publisher;
use App\campaigns;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeadsExport;
use App\Imports\LeadsImport;
use App\Publisher;
use App\publisher_advertiser;

class AdvertiserController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }
    public function index()
    {
        $page_title = 'All Advertiser';
        $empty_message = 'No Advertiser';
        $user = auth()->guard('publisher')->user();
        $assign_campaign = $user->assign_campaign;
        $advertisers = Advertiser::whereJsonContains('assign_publisher',  (string) $user->id)->with('publisher_advertiser')->get();
        $publishers = Publisher::select('id', 'name', 'role')->get();
        return view($this->activeTemplate .'publisher.advertiser.index',compact('page_title','empty_message','advertisers', 'publishers'));
    }
    public function advertisers_detail($id)
    {
        $page_title = 'Advertiser Details';
        $empty_message = 'No Advertiser';
        $advertiser = Advertiser::where('id',  $id)->select('id', 'name', 'company_name')->first();
        return view($this->activeTemplate .'publisher.campaigns.advertiser',compact('page_title','empty_message','campaigns'));
    }
    public function ad_network_save(Request $request){
        $advertiser_id = $request->advertiser_id;
        $publisher_id = $request->publisher_id;
       // $publisher_advertiser = publisher_advertiser::firstOrNew([ 'advertiser_id' => $advertiser_id,  'publisher_id' => $publisher_id ]);
        $publisher_advertiser = publisher_advertiser::firstOrNew([ 'advertiser_id' => $advertiser_id ]);
        if($request->ad_network){
            $publisher_advertiser->publisher_id =  $request->publisher_id;
            $publisher_advertiser->ad_network =  $request->ad_network;
            $publisher_advertiser->save();
        } else{
            $publisher_advertiser->delete();
        }
        return response()->json(['success'=>true, 'message'=> $request->ad_network]);
    }

}
