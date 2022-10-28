<?php
namespace App\Http\Controllers\Admin;

use App\Advertiser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publisher;

class ManageUsersController extends Controller
{
   

    public function showEmailSingleForm($id,$flag)
    {
        $user=null;
        $role = null;
        if($flag=='publisher'){
            $user = Publisher::findOrFail($id);
            $role=1;
        } else{
            $user = Advertiser::findOrFail($id);
            $role = 0;
        }
        $page_title = 'Send Email To: ' . $user->username;
       
        return view('admin.users.email_single', compact('page_title', 'user','role'));
    }

    public function sendEmailSingle(Request $request, $id,$role)
    {
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        $user = null;
        if($role==1){
            $user = Publisher::findOrFail($id);
        } else{
            $user = Advertiser::findOrFail($id);
        }
        send_general_email($user->email, $request->subject, $request->message, $user->username);
        $notify[] = ['success', $user->username . ' will receive an email shortly.'];
        return back()->withNotify($notify);
    }

    public function transactions(Request $request, $id)
    {
        $user = Advertiser::findOrFail($id);
        if ($request->search) {
            $search = $request->search;
            $page_title = 'Search User Transactions : ' . $user->username;
            $transactions = $user->transactions()->where('trx', $search)->with('user')->latest()->paginate(getPaginate());
            $empty_message = 'No transactions';
            return view('admin.reports.transactions', compact('page_title', 'search', 'user', 'transactions', 'empty_message'));
        }
        $page_title = 'Advertiser Transactions : ' . $user->username;
        $transactions = $user->transactions()->with('user')->latest()->paginate(getPaginate());
        $empty_message = 'No transactions';
    
        return view('admin.reports.advertiserTransaction', compact('page_title', 'user', 'transactions', 'empty_message'));
    }
  
    public function publisherTransactions(Request $request, $id)
    {
        $user = Publisher::findOrFail($id);
        if ($request->search) {
            $search = $request->search;
            $page_title = 'Search Publisher Transactions : ' . $user->username;
            $transactions = $user->transactions()->where('trx', $search)->with('publisher')->latest()->paginate(getPaginate());
            $empty_message = 'No transactions';
            return view('admin.reports.transactions', compact('page_title', 'search', 'user', 'transactions', 'empty_message'));
        }
        $page_title = 'Publisher Transactions : ' . $user->username;
        $transactions = $user->transactions()->with('publisher')->latest()->paginate(getPaginate());
        $empty_message = 'No transactions';
       
        return view('admin.reports.publisherTransaction', compact('page_title', 'user', 'transactions', 'empty_message'));
    }

    public function deposits(Request $request, $id)
    {
        $user = Advertiser::findOrFail($id);
        if ($request->search) {
            $search = $request->search;
            $page_title = 'Search User Deposits : ' . $user->username;
            $deposits = $user->deposits()->where('trx', $search)->latest()->paginate(getPaginate());
            $empty_message = 'No deposits';
            return view('admin.deposit.log', compact('page_title', 'search', 'user', 'deposits', 'empty_message'));
        }

        $page_title = 'Advertiser Deposit : ' . $user->username;
        $deposits = $user->deposits()->latest()->paginate(getPaginate());
        $empty_message = 'No deposits';
        return view('admin.deposit.log', compact('page_title', 'user', 'deposits', 'empty_message'));
    }
    public function withdrawals(Request $request, $id)
    {
        $user = Publisher::findOrFail($id);
        if ($request->search) {
            $search = $request->search;
            $page_title = 'Search Publisher Withdrawals : ' . $user->username;
            $withdrawals = $user->withdrawals()->where('trx', 'like',"%$search%")->latest()->paginate(getPaginate());
            $empty_message = 'No withdrawals';
            return view('admin.withdraw.withdrawals', compact('page_title', 'user', 'search', 'withdrawals', 'empty_message'));
        }
        $page_title = 'Publisher Withdrawals : ' . $user->username;
        $withdrawals = $user->withdrawals()->latest()->paginate(getPaginate());
        $empty_message = 'No withdrawals';
        return view('admin.withdraw.withdrawals', compact('page_title', 'user', 'withdrawals', 'empty_message'));
    }

   
}
