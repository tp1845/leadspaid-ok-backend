<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    public function index()
    {
        $campaigns = array();
       $page_title = 'All Campaigns';
        $empty_message = "No Campaigns";
         return view(activeTemplate() . 'advertiser.campaigns.index', compact('campaigns', 'page_title', 'empty_message'));
    }
}
