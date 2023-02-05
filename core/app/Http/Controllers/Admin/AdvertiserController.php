<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Deposit;
use App\Advertiser;
use App\CreateAd;
use App\Transaction;
use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publisher;
use Stripe\ApiOperations\Create;

class AdvertiserController extends Controller
{
    public function allAdvertiser()
    {
        $page_title = 'All advertiser';
        $empty_message = 'No advertiser';
        $advertisers = Advertiser::latest();
        $publishers_admin = Publisher::where('role', 1)->select('id', 'name')->get();
        $activeCampaign =DB:: table('advertisers')->whereRaw('(SELECT COUNT(campaigns.id) FROM campaigns WHERE advertisers.id = campaigns.advertiser_id and campaigns.status = 1 ) > 0 AND advertisers.status = 1 AND advertisers.ev != 0 '); 
        $active =DB:: table('advertisers')->whereRaw('(SELECT COUNT(campaigns.id) FROM campaigns WHERE advertisers.id = campaigns.advertiser_id and campaigns.status = 0 ) >0 AND advertisers.status = 1 AND advertisers.ev != 0 '); 
        $pending = Advertiser::where('status', 0)->where('ev','!=' , 0);
        $email_unverify = Advertiser::where('ev', 0)->where('status','!=' , 2);
        $banned = Advertiser::where('status', 3);
        $rejected = Advertiser::where('status', 2);


        $companies = DB::table('advertisers')
        ->where('advertisers.company_name','!=','')
        ->groupBy('advertisers.company_name')
        ->get();
        

        if (isset($_GET['advertiser'])){
            $advertiserid = $_GET['advertiser'];

            $advertisers->where('advertisers.id','=',$advertiserid);
            $activeCampaign->where('advertisers.id','=',$advertiserid);
            $active->where('advertisers.id','=',$advertiserid);
            $pending->where('advertisers.id','=',$advertiserid);
            $email_unverify->where('advertisers.id','=',$advertiserid);
            $banned->where('advertisers.id','=',$advertiserid);
            $rejected->where('advertisers.id','=',$advertiserid);
        }  
        $advertisers =$advertisers->get();
        $activeCampaign =$activeCampaign->select('advertisers.*')->get();
        $active =$active->select('advertisers.*')->get();
        $pending =$pending->get();
        $email_unverify =$email_unverify->get();
        $banned =$banned->get();
        $rejected =$rejected->get();

        return view('admin.advertiser.all', compact('page_title', 'empty_message', 'advertisers','companies', 'publishers_admin','activeCampaign', 'active', 'pending', 'email_unverify', 'banned','rejected'));
    }
    public function allActiveAdvertiser()
    {
        $page_title = 'All active advertiser';
        $empty_message = 'No advertiser';
        $advertisers = Advertiser::latest()->whereStatus(1)->get();
        $publishers_admin = Publisher::where('role', 1)->select('id', 'name')->get();




        return view('admin.advertiser.all', compact('page_title', 'empty_message', 'advertisers', 'publishers_admin'));
    }

    public function advertiserDetails($id)
    {
        $page_title = 'Advertiser details';
        $advr = Advertiser::findOrFail($id);
        $totalDeposit = Deposit::where('user_id', $advr->id)->where('status', 1)->sum('amount');
        $totalTransaction = Transaction::where('user_id', $advr->id)->count();
        $totalAd = CreateAd::where('advertiser_id', $advr->id)->where('status', 1)->count();
        return view('admin.advertiser.details', compact('advr', 'page_title', 'totalDeposit', 'totalTransaction', 'totalAd'));
    }

    public function loginHistory($id)
    {
        $user = Advertiser::findOrFail($id);
        $page_title = 'Advertiser Login History - ' . $user->username;
        $empty_message = 'No users login found.';
        $login_logs = $user->login_logs()->latest()->get();
        return view('admin.advertiser.logins', compact('page_title', 'empty_message', 'login_logs'));
    }

    public function advertiserAds($id)
    {
        $ads = CreateAd::where('advertiser_id', $id)->get();
        $empty_message = "No ads";
        $advr = Advertiser::findOrFail($id);
        $page_title = "Ads of  $advr->name";
        return view('admin.reports.ads', compact('ads', 'page_title', 'empty_message'));
    }

    public function advertiserUpdate(Request $request, $id)
    {
        $advr = Advertiser::findOrFail($id);
        $request->validate([
            'name' => 'required|max:60',
            'email' => 'required|email|max:160|unique:advertisers,email,' . $advr->id,
            'phone' => 'required|unique:advertisers,mobile,' . $advr->id,
            'city' => 'required',
            'country' => 'required'
        ]);

        $advr->update([
            'mobile' => $request->phone,
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'country' => $request->country,
            'status' => $request->status ? 1 : 0,
            'ev' => $request->ev ? 1 : 0,
            'sv' => $request->sv ? 1 : 0,
            'ts' => $request->ts ? 1 : 0,
            'tv' => $request->tv ? 1 : 0,

        ]);

        $notify[] = ['success', 'Advertiser detail has been updated'];
        return redirect()->back()->withNotify($notify);
    }
    public function addSubBalance(Request $request, $id)
    {
        $request->validate(['amount' => 'required|numeric|gt:0']);

        $advr = Advertiser::findOrFail($id);
        $amount = getAmount($request->amount);
        $general = GeneralSetting::first(['cur_text', 'cur_sym']);
        $trx = getTrx();

        if ($request->act) {
            $advr->balance +=  $amount;
            $advr->save();
            $notify[] = ['success', $general->cur_sym . $amount . ' has been added to ' . $advr->username . ' balance'];


            $transaction = new Transaction();
            $transaction->user_id = $advr->id;
            $transaction->amount = $amount;
            $transaction->post_balance = getAmount($advr->balance);
            $transaction->charge = 0;
            $transaction->trx_type = '+';
            $transaction->details = 'Added Balance Via Admin';
            $transaction->trx =  $trx;
            $transaction->save();


            notify($advr, 'BAL_ADD', [
                'trx' => $trx,
                'amount' => $amount,
                'currency' => $general->cur_text,
                'post_balance' => getAmount($advr->balance),
            ]);
        } else {
            if ($amount > $advr->balance) {
                $notify[] = ['error', $advr->username . ' has insufficient balance.'];
                return back()->withNotify($notify);
            }
            $advr->balance = bcsub($advr->balance, $amount);
            $advr->save();



            $transaction = new Transaction();
            $transaction->user_id = $advr->id;
            $transaction->amount = $amount;
            $transaction->post_balance = getAmount($advr->balance);
            $transaction->charge = 0;
            $transaction->trx_type = '-';
            $transaction->details = 'Subtract Balance Via Admin';
            $transaction->trx =  $trx;
            $transaction->save();


            notify($advr, 'BAL_SUB', [
                'trx' => $trx,
                'amount' => $amount,
                'currency' => $general->cur_text,
                'post_balance' => getAmount($advr->balance)
            ]);
            $notify[] = ['success', $general->cur_sym . $amount . ' has been subtracted from ' . $advr->username . ' balance'];
        }
        return back()->withNotify($notify);
    }

    public function emailUnverified()
    {
        $page_title = 'Email Unverified Users';
        $empty_message = 'No email unverified user found';
        $advertisers = Advertiser::emailUnverified()->latest()->get();
        return view('admin.advertiser.emailUnverified', compact('page_title', 'empty_message', 'advertisers'));
    }

    public function smsUnverified()
    {
        $page_title = 'SMS Unverified Users';
        $empty_message = 'No sms unverified user found';
        $advertisers = Advertiser::smsUnverified()->latest()->get();
        return view('admin.advertiser.smsUnverified', compact('page_title', 'empty_message', 'advertisers'));
    }


    public function advertiserBanned($id)
    {
        $Adv = Advertiser::findOrFail($id);
        $Adv->status = 2;
        $Adv->update();
        $notify[] = ['success', 'Advertiser has been banned'];
        return redirect()->back()->withNotify($notify);
    }

    public function update_status(Request $request)
    {
        $request->validate(['status' => 'required', 'id' => 'required']);
        $id = $request->id;
        $Adv = Advertiser::findOrFail($id);
        if ($Adv) {

            //  if( $Adv->email_activated == 0){
            //     send_email_adv_activated($Adv, 'EVER_CODE',$Adv->name);
            // }

            $Adv->status = $request->status;
            //$Adv->email_activated = 1;
            $Adv->update();
            if ($request->status == 1) {
                send_email_adv_activated($Adv, 'EVER_CODE', $Adv->name);
                return response()->json(['success' => true, 'message' => 'Advertiser has been activated']);
                // $notify[] = ['success', 'Advertiser has been activated'];
                // return redirect()->back()->withNotify($notify);
            } else {
                return response()->json(['success' => false, 'message' => 'Advertiser has been deactivated']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Somthing Worng please try again']);
        }
    }

    public function update_approval_rejection(Request $request)
    {
        $request->validate(['approval' => 'required', 'advertiser_id' => 'required', 'remarks' => 'required']);
        $advertiser = Advertiser::findOrFail($request->advertiser_id);
        if ($advertiser) {
            $advertiser->status = $request->approval;
            $advertiser->rejection_remarks = $request->remarks;
            $advertiser->update();
            return response()->json(['success' => false, 'message' => 'Advertiser successfully rejected']);
        } else {
            return response()->json(['success' => false, 'message' => 'Somthing Worng please try again']);
        }
    }




    public function assign_publisher(Request $request)
    {
        $request->validate(['advertiser_id' => 'required']);
        $advertiser = Advertiser::findOrFail($request->advertiser_id);
        if ($advertiser) {
            $advertiser->assign_publisher = $request->assign_publisher ? array_unique($request->assign_publisher) : [];
            $advertiser->update();
            return response()->json(['success' => true, 'message' => 'Successfully  Updated','output'=>array_unique($request->assign_publisher)]);
        } else {
            return response()->json(['success' => false, 'message' => 'Someting wrong try again!']);
        }
    }

    public function assign_advertiser(Request $request)
    {
        $request->validate(['advertiser_id' => 'required']);
        $request->validate(['publisher_id' => 'required']);
        $request->validate(['type' => 'required']);
        $advertiser = Advertiser::findOrFail($request->advertiser_id);
        if ($advertiser) {
            $newarray =    $advertiser->assign_publisher;
            if (($key = array_search($request->publisher_id, $newarray)) !== false) {           
                unset($newarray[$key]);
                $newarray = array_values( $newarray);
            }
             
            if($request->type == 1){
                array_push($newarray,$request->publisher_id);
            }
            $advertiser->assign_publisher = $newarray ? (array)$newarray : [];
            $advertiser->update();
            return response()->json(['success' => true, 'message' => 'Successfully  Updated','output'=> array_unique($newarray)]);
        } else {
            return response()->json(['success' => false, 'message' => 'Someting wrong try again!']);
        }
    }


    public function advertiserActive($id)
    {
        $Adv = Advertiser::findOrFail($id);
        $Adv->status = 1;
        $Adv->update();
        $notify[] = ['success', 'Advertiser has been activated'];
        return redirect()->back()->withNotify($notify);
    }

    public function allBannedAdvertiser()
    {
        $page_title = 'All banned Advertisers';
        $empty_message = 'No data';
        $advertisers = Advertiser::latest()->whereStatus(2)->get();
        return view('admin.advertiser.banned', compact('page_title', 'empty_message', 'advertisers'));
    }

    public function showEmailAllForm()
    {
        $page_title = 'Send Email To All Advertiser';
        return view('admin.advertiser.email_all', compact('page_title'));
    }


    public function sendEmailAll(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        foreach (Advertiser::where('status', 1)->cursor() as $user) {
            send_general_email($user->email, $request->subject, $request->message, $user->username);
        }

        $notify[] = ['success', 'All advertiser will receive an email shortly.'];
        return back()->withNotify($notify);
    }


    public function search(Request $request)
    {
        $search = $request->search;
        $users = Advertiser::where(function ($user) use ($search) {
            $user->where('username', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
        });

        $advertisers = $users->paginate(getPaginate());
        $page_title = 'User Search - ' . $search;
        $empty_message = 'No search result found';
        $publishers_admin = Publisher::where('role', 1)->select('id', 'name')->get();
        return view('admin.advertiser.all', compact('page_title', 'empty_message', 'advertisers', 'publishers_admin'));
    }

    public function advertiser_complete_delete($id)
    {
        Advertiser::where('id', $id)->delete();
        $notify[] = ['success', 'Advertiser deleted successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function advertiser_delete($id)
    {
        Advertiser::where('id', $id)->update(['status' => 3]);

        $notify[] = ['success', 'Advertiser banned Successfully'];
        return back()->withNotify($notify);
    }
}
