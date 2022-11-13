<?php

namespace App\Http\Controllers\Admin;

use App\campaign_forms;
use App\campaign_forms_leads;
use App\campaigns;
use App\Exports\LeadsExport;
use App\Exports\Form_LeadsExport;
use App\Http\Controllers\Controller;
use App\Imports\LeadsImport;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class CampaignsFormsController extends Controller
{
    public function AllLeads()
    {
        $page_title    = 'All Leads';
        $empty_message = 'No Leads';
        $leads         = campaign_forms_leads::all();

        return view('admin.campaigns.leads', compact('page_title', 'empty_message', 'leads'));
    }


    public function campaignsformleads($id)
    {
        $campaigns = campaign_forms_leads::where('campaign_id', $id)->get();

        if(count($campaigns) > 0)
        {
            $campaign [] = array(
                'lead_id',
                'created_time',
                'campaign_id',
                'campaign_name',
                'form_id',
                'form_name',
                'your_name',
                'your_email',
                'phone_number',
                'length of stay',
                'relationship',
            );

            foreach($campaigns as $k => $campaign)
            {
                $campaign1[$k] = [
                    'lead_id' => $campaign->id,
                    'created_time' => date('Y-d-m H:m:i', strtotime($campaign->created_at)),
                    'campaign_id' => $campaign->campaign_id,
                    'campaign_name' => $campaign->campaigns['name'],
                    'form_id' => $campaign->form_id,
                    'form_name' => $campaign->campaign_forms['form_name'],
                    'your_name' => $campaign->field_1,
                    'your_email' => $campaign->field_2,
                    'phone_number' => $campaign->field_3,
                    'length of stay' => $campaign->field_4,
                    'relationship' => $campaign->field_5,
                ];
            }

            return Excel::download(new Form_LeadsExport($campaign1), 'leads.xlsx');
        }
        else
        {
            $notify[] = ['error', 'Data Not Found!'];
            return redirect()->back()->withNotify($notify);
        }

    }

    public function import(Request $request)
    {
        $request->validate(
            [
                'file' => 'required|mimes:xlsx, xls',
            ]
        );
        Excel::import(new LeadsImport, $request->file('file')->store('files'));

        return redirect()->back();
    }
}

