<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index()
    {
        $forms = array();
       $page_title = 'All Forms';
        $empty_message = "No Forms";
         return view(activeTemplate() . 'advertiser.forms.index', compact('forms', 'page_title', 'empty_message'));
    }
}
