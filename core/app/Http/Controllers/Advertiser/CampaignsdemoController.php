<?php

namespace App\Http\Controllers\Advertiser;

use App\campaign_forms;
use App\campaigns;
use App\Country;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignsdemoController extends Controller
{
    public function index(Request $request)
    {
        $forms = campaign_forms::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->get();
        $campaigns = array();

        $countries = Country::all();
        $page_title = 'All Campaigns';
        $empty_message = "No Campaigns";
        return view(activeTemplate() . 'advertiser.campaigns.index-demo', compact('campaigns','forms', 'countries', 'page_title', 'empty_message'));
    }




}
