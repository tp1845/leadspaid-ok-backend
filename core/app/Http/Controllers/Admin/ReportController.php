<?php

namespace App\Http\Controllers\Admin;

use App\Publisher;
use App\UserLogin;
use Carbon\Carbon;
use App\Advertiser;
use App\EarningLogs;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
   
    public function publisherEarningLogs(Request $request)
    {
      
        $page_title = 'Publisher Earning Logs';
        $empty_message = 'No Earning Logs.';
      
        $search = $request->search;
        if($request->date){
            
            $date = explode(' - ',$request->date);
            $notify[]=['error','Invalid Date'];
            if(!(@strtotime($date[0]))){
                return back()->withNotify($notify);
            }
            if(isset($date[1]) && !strtotime($date[1])){
                return back()->withNotify($notify);
            }
            if(count($date) == 1){
                $firstDate = Carbon::create($date[0])->format('Y-m-d');
                $earningLogs = EarningLogs::where('date','like',"%$firstDate%")->paginate(15);
            } else{
                $firstDate = Carbon::create($date[0])->format('Y-m-d');
                $secondDate = Carbon::create($date[1])->format('Y-m-d');
                $earningLogs = EarningLogs::whereBetween('date',[$firstDate,$secondDate])->paginate(15);
              
            }
        } elseif($request->search) {
            $earningLogs = EarningLogs::whereHas('publisher', function ($user) use ($search) {
                $user->where('username', 'like',"%$search%");
            })->paginate(15);
        } else {
            $earningLogs = EarningLogs::latest()->paginate(15);
        }
        return view('admin.reports.publisherEarnings', compact('page_title', 'earningLogs', 'empty_message','search'));

    }
   
    public function advertiserTransaction(Request $request)
    {
        $page_title = 'Advertiser Transaction Logs';
        $search = $request->search;
       
        if($request->search){
            $page_title = 'Search Result of '.$search;
            $transactions = Transaction::with('user')->whereHas('user', function ($user) use ($search) {
                $user->where('username', 'like',"%$search%");
            })->orWhere('trx', $search)->paginate(getPaginate());
        } else {

            $transactions = Transaction::where('user_id','!=',null)->latest()->paginate(15);
        }
       
        $empty_message = 'No transactions.';
        return view('admin.reports.advertiserTransaction', compact('page_title', 'transactions', 'empty_message','search'));
    }


    public function loginHistory(Request $request)
    {
        if ($request->search) {
            $search = $request->search;
            $page_title = 'User Login History Search - ' . $search;
            $empty_message = 'No search result found.';
            $login_logs = UserLogin::whereHas('advertiser', function ($query) use ($search) {
                $query->where('username', $search);
            })->orWhereHas('publisher', function ($query) use ($search) {
                $query->where('username', $search);
            })->orderBy('id','desc')->paginate(getPaginate());
            return view('admin.reports.logins', compact('page_title', 'empty_message', 'search', 'login_logs'));
        }
        $page_title = 'User Login History';
        $empty_message = 'No users login found.';
        $login_logs = UserLogin::orderBy('id','desc')->paginate(getPaginate());
        return view('admin.reports.logins', compact('page_title', 'empty_message', 'login_logs'));
    }

    
    public function loginIpHistory($ip)
    {
        $page_title = 'Login By - ' . $ip;
        $login_logs = UserLogin::where('user_ip',$ip)->latest()->paginate(getPaginate());
        $empty_message = 'No users login found.';
        return view('admin.iplogins', compact('page_title', 'empty_message', 'login_logs'));

    }

}
