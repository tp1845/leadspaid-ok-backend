<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\lgen_spend;
use Illuminate\Http\Request;

class LgenSpendController extends Controller
{
    public function index()
    {
        $page_title    = 'All Spend';
        $empty_message = 'No Spend';
        $lgen_spend         = lgen_spend::all();

        return view('admin.campaigns.lgenspend', compact('page_title', 'empty_message', 'lgen_spend'));
    }
}
