<?php

namespace App\Http\Controllers\Admin;

use App\DomainVerifcation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function pending()
    {
        $pendings = DomainVerifcation::whereStatus(2)->latest()->paginate(15);
        $page_title = 'Pending Domain';
        $empty_message  = "No data";
        return view('admin.domain.pending',compact('pendings','page_title','empty_message'));
    }
    public function approved()
    {
        $approves = DomainVerifcation::whereStatus(1)->latest()->paginate(15);
        $page_title = 'Approved Domain';
        $empty_message  = "No data";
        return view('admin.domain.approved',compact('approves','page_title','empty_message'));
    }

    public function approve($id)
    {
       $approve =  DomainVerifcation::findOrFail($id);
       $approve->status = 1;
       $approve->update();
       $notify[]=['success','Domain Has been Approved'];
       return back()->withNotify($notify);
    }
    public function remove($id)
    {
       $approve =  DomainVerifcation::findOrFail($id);
       $approve->delete();
       $notify[]=['success','Domain Has been Removed'];
       return back()->withNotify($notify);
    }

    public function search(Request $request)
    {
       $result =  DomainVerifcation::where('tracker','like',"%$request->search%")->first();
       $page_title = "Result of $request->search";
       $empty_message = 'No result found';
       return view('admin.domain.search',compact('result','page_title','empty_message'));
    }

    public function unapprove($id)
    {
       $unapprove =  DomainVerifcation::findOrFail($id);
       $unapprove->status = 2;
       $unapprove->update();
       $notify[]=['success','Domain Has been unapproved'];
       return back()->withNotify($notify);
    }
}
