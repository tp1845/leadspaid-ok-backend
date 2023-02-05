<?php

namespace App\Http\Controllers\Admin;

use App\AdType;
use App\Deposit;
use App\Gateway;
use App\campaigns;
use App\CreateAd;
use App\PricePlan;
use App\Publisher;
use App\Admin;
use App\UserLogin;
use Carbon\Carbon;
use App\Advertiser;
use App\DomainVerifcation;
use App\Withdrawal;
use App\Transaction;
use App\WithdrawMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

  public function dashboard()
    {
        $page_title = 'Admin Dashboard';
        $empty_message = 'No Data';

        // Advertiser
        $advertiser['active']= Advertiser::where('status', 1)->where('ev','!=' , 0)->get()->count();
        $advertiser['pending']= Advertiser::where('status', 0)->where('ev','!=' , 0)->get()->count();
        $advertiser['unverified']=Advertiser::where('ev', 0)->where('status','!=' , 2)->get()->count();
        $advertiser['all']=Advertiser::count();
        $activeCampaign =DB:: table('advertisers')->whereRaw('(SELECT COUNT(campaigns.id) FROM campaigns WHERE advertisers.id = campaigns.advertiser_id and campaigns.status = 1 ) > 0 AND advertisers.status = 1 AND advertisers.ev != 0 ')->select('advertisers.*')->get();; 
       
        //Campaigns
        $campaign['approved']=  campaigns::with('advertiser')->with('campaign_forms')->where('approve', 1)->where('status', '!=', 2)->orderBy('id', 'DESC')->get()->count();
        $campaign['pending']=campaigns::with('advertiser')->with('campaign_forms')->where('status', '!=', 2)->where('approve', 0)->orderBy('id', 'DESC')->get()->count();
        $campaign['rejected']=campaigns::with('advertiser')->with('campaign_forms')->where('approve', 2)->where('status', '!=', 2)->orderBy('id', 'DESC')->get()->count();
        $campaign['all']=campaigns::count();

        //Users
        $widget['total_admin_publisher'] = Publisher::where('role',1)->where('status','=',1)->get()->count();
        $widget['total_campaign_manager'] = Publisher::where('role',2)->where('status','=',1)->get()->count();
        $widget['total_campaign_executive'] = Publisher::where('role',3)->where('status','=',1)->get()->count();
        $widget['total_admin'] = Admin::where('status','=',1)->get()->count();
        $widget['total_pending_login'] = Admin::where('status',3)->get()->count() + Publisher::where('status',3)->get()->count();
        $widget['total_all_active'] = Admin::where('status',1)->get()->count() + Publisher::where('status',1)->get()->count();


        // User Info
        $widget['total_users'] = Advertiser::count();
        $widget['total_publisher'] = Publisher::count();
        $widget['total_ads'] = CreateAd::where('status', 1)->count();
        $widget['ad_type'] = AdType::where('status', 1)->count();


        // Monthly Deposit & Withdraw Report Graph
        $report['months'] = collect([]);
        $report['deposit_month_amount'] = collect([]);
        $report['withdraw_month_amount'] = collect([]);

        $depositsMonth = Deposit::whereYear('created_at', '>=', Carbon::now()->subYear())
            ->selectRaw("SUM( CASE WHEN status = 1 THEN amount END) as depositAmount")
            ->selectRaw("DATE_FORMAT(created_at,'%M') as months")
            ->orderBy('created_at')
            ->groupBy(DB::Raw("MONTH(created_at)"))->get();

        $depositsMonth->map(function ($aaa) use ($report) {
            $report['months']->push($aaa->months);
            $report['deposit_month_amount']->push(getAmount($aaa->depositAmount));
        });

        $withdrawalMonth = Withdrawal::whereYear('created_at', '>=', Carbon::now()->subYear())->where('status', 1)
            ->selectRaw("SUM( CASE WHEN status = 1 THEN amount END) as withdrawAmount")
            ->selectRaw("DATE_FORMAT(created_at,'%M') as months")
            ->orderBy('created_at')
            ->groupBy(DB::Raw("MONTH(created_at)"))->get();
        $withdrawalMonth->map(function ($bb) use ($report){
            $report['withdraw_month_amount']->push(getAmount($bb->withdrawAmount));
        });


        // Withdraw Graph
        $withdrawal = Withdrawal::where('created_at', '>=', \Carbon\Carbon::now()->subDays(30))->where('status', 1)
            ->select(array(DB::Raw('sum(amount)   as totalAmount'), DB::Raw('DATE(created_at) day')))
            ->groupBy('day')->get();
        $withdrawals['per_day'] = collect([]);
        $withdrawals['per_day_amount'] = collect([]);
        $withdrawal->map(function ($a) use ($withdrawals) {
            $withdrawals['per_day']->push(date('d M', strtotime($a->day)));
            $withdrawals['per_day_amount']->push($a->totalAmount + 0);
        });


        // user Browsing, Country, Operating Log
        $user_login_data = UserLogin::whereDate('created_at', '>=', \Carbon\Carbon::now()->subDay(30))->get(['browser', 'os', 'country']);

        $chart['user_browser_counter'] = $user_login_data->groupBy('browser')->map(function ($item, $key) {
            return collect($item)->count();
        });
        $chart['user_os_counter'] = $user_login_data->groupBy('os')->map(function ($item, $key) {
            return collect($item)->count();
        });
        $chart['user_country_counter'] = $user_login_data->groupBy('country')->map(function ($item, $key) {
            return collect($item)->count();
        })->sort()->reverse()->take(5);


        $payment['payment_method'] = Gateway::count();
        $payment['total_deposit_amount'] = Deposit::where('status',1)->sum('amount');
        $payment['total_deposit_charge'] = Deposit::where('status',1)->sum('charge');
        $payment['total_deposit_pending'] = Deposit::where('status',2)->count();
        $payment['total_plan'] = PricePlan::count();

        $paymentWithdraw['withdraw_method'] = WithdrawMethod::count();
        $paymentWithdraw['total_withdraw_amount'] = Withdrawal::where('status',1)->sum('amount');
        $paymentWithdraw['total_withdraw_charge'] = Withdrawal::where('status',1)->sum('charge');
        $paymentWithdraw['total_withdraw_pending'] = Withdrawal::where('status',2)->count();
        $paymentWithdraw['total_withdraw_approved'] = Withdrawal::where('status',1)->count();


        $transactions = Transaction::latest()->limit(6)->get();

        $approvedDomain = DomainVerifcation::where('status',1)->count();
        $pendingDomain = DomainVerifcation::where('status',2)->count();
        $total_click = \App\CreateAd::sum('clicked');
        $total_imp = \App\CreateAd::sum('impression');
        $pendingTicket =  \App\SupportTicket::whereIN('status', [0,2])->count();

        return view('admin.dashboard', compact('page_title', 'widget', 'report', 'withdrawals',
            'chart','payment','paymentWithdraw','transactions','empty_message','approvedDomain',
            'total_click','total_imp','pendingTicket','pendingDomain', 'depositsMonth', 'withdrawalMonth','advertiser','activeCampaign','campaign'));
    }


    public function profile()
    {
        $page_title = 'Profile';
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('page_title', 'admin'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $user = Auth::guard('admin')->user();

        if ($request->hasFile('image')) {
            try {
                $old = $user->image ? : null;
                $user->image = uploadImage($request->image, imagePath()['profile']['admin']['path'], imagePath()['profile']['admin']['size'], $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $notify[] = ['success', 'Your profile has been updated.'];
        return redirect()->route('admin.profile')->withNotify($notify);
    }


    public function password()
    {
        $page_title = 'Password Setting';
        $admin = Auth::guard('admin')->user();
        return view('admin.password', compact('page_title', 'admin'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = Auth::guard('admin')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'Password Do not match !!'];
            return back()->withErrors(['Invalid old password.']);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $notify[] = ['success', 'Password Changed Successfully.'];
        return redirect()->route('admin.password')->withNotify($notify);
    }


}
