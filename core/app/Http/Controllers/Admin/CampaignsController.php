<?php

namespace App\Http\Controllers\Admin;

use App\campaigns;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    public function index()
    {
        $page_title = 'All Campaigns';
        $empty_message = 'No Campaigns';
        $campaigns = campaigns::all();
        return view('admin.campaigns.index',compact('page_title','empty_message','campaigns'));
    }
}
