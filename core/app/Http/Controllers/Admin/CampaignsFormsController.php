<?php

namespace App\Http\Controllers\Admin;

use App\campaign_forms_leads;
use App\campaigns;
use App\Exports\LeadsExport;
use App\Http\Controllers\Controller;
use App\Imports\LeadsImport;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class CampaignsFormsController extends Controller
{
    public function AllLeads()
    {
        $page_title = 'All Leads';
        $empty_message = 'No Leads';
        $leads = campaign_forms_leads::all();
        return view('admin.campaigns.leads',compact('page_title','empty_message','leads'));
    }

    public function export()  { return Excel::download(new LeadsExport, 'leads.xlsx');  }

    public function import(Request $request){
        $request->validate([
            'file'=> 'required|mimes:xlsx, xls'
        ]);
        Excel::import(new LeadsImport, $request->file('file')->store('files'));
        return redirect()->back();
    }
}

