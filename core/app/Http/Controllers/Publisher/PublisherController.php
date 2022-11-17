<?php

namespace App\Http\Controllers\Publisher;

use Carbon\Carbon;
use App\Withdrawal;
use App\PublisherAd;
use App\Transaction;
use App\GeneralSetting;
use App\WithdrawMethod;
use App\DomainVerifcation;
use App\EarningLogs;
use Illuminate\Http\Request;
use App\Lib\GoogleAuthenticator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PublisherController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function dashboard()
    {

        $page_title = 'Publisher Dashboard';

        $report['trx_months'] = collect([]);
        $report['trx_month_amount'] = collect([]);
        $user =  auth()->guard('publisher')->user()->id;
        $wdata['date'] = collect([]);
        $wdata['amount'] = collect([]);

        $transaction = EarningLogs::whereYear('created_at', '>=', Carbon::now()->subYear())
                                  ->selectRaw("SUM(CASE WHEN publisher_id = $user THEN amount END) as amount")
                                  ->selectRaw("DATE_FORMAT(created_at,'%M') as months")
                                  ->orderBy('created_at')
                                  ->groupBy(DB::Raw("MONTH(created_at)"))->get();

        $w = Withdrawal::whereYear('created_at', '>=', Carbon::now()->subYear())->where('status', 1)->where('user_id', $user)
                       ->orderBy('created_at')
                       ->selectRaw("SUM(CASE WHEN user_id = $user THEN amount END) as amount")
                       ->selectRaw("DATE_FORMAT(created_at,'%M') as months")
                       ->groupBy(DB::Raw("MONTH(created_at)"))
                       ->get();

        $w->map(function ($item) use ($wdata) {
            $wdata['date']->push($item->months);
            $wdata['amount']->push($item->amount);
        });

        $transaction->map(function ($aaa) use ($report) {
            $report['trx_months']->push($aaa->months);
            $report['trx_month_amount']->push(getAmount($aaa->amount));
        });

        $perDay = EarningLogs::where('publisher_id', $user)->where('date', Carbon::now()->toDateString())->first();

        $publisher = Auth::guard('publisher')->user();
        $totalWidthdraw = Withdrawal::whereUserId($publisher->id)->whereStatus(1)->sum('amount');
        $publisherAd = PublisherAd::where('publisher_id', $publisher->id)->get();
        $todayReport = $publisherAd->where('date', Carbon::now()->toDateString());
        return view($this->activeTemplate . 'publisher.dashboard', compact('page_title', 'todayReport', 'publisherAd', 'publisher', 'totalWidthdraw', 'report', 'wdata', 'perDay'));
    }


    public function profile()
    {
        $page_title = 'Profile';
        $publisher = Auth::guard('publisher')->user();
        return view($this->activeTemplate . 'publisher.profile', compact('page_title', 'publisher'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $user = Auth::guard('publisher')->user();

        if ($request->hasFile('image')) {
            try {
                $old = $user->image ?: null;
                $user->image = uploadImage($request->image, 'assets/publisher/images/profile/', '400X400', $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $user->name = $request->name;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->update();
        $notify[] = ['success', 'Your profile has been updated.'];
        return redirect()->route('publisher.profile')->withNotify($notify);
    }


    public function password()
    {
        $page_title = 'Password Setting';
        $publisher = Auth::guard('publisher')->user();
        return view($this->activeTemplate . 'publisher.password', compact('page_title', 'publisher'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = Auth::guard('publisher')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'Password Do not match !!'];
            return back()->withErrors(['Invalid old password.']);
        }
        $user->update([
                          'password' => bcrypt($request->password)
                      ]);
        $notify[] = ['success', 'Password Changed Successfully.'];
        return redirect()->route('publisher.password')->withNotify($notify);
    }


    public function domainVerification()
    {
        $page_title = "All Domains";
        $empty_message = 'No domains';
        $domainVerifications = DomainVerifcation::where('publisher_id', auth()->guard('publisher')->user()->id)->orderBy('id', 'DESC')->paginate(3);
        return view($this->activeTemplate . 'publisher.domain.domainVerify', compact('domainVerifications', 'page_title', 'empty_message'));
    }

    public function domainVerify(Request $request)
    {
        $keyword = $request->keywords[0];
        $keywords= preg_split("/[,]/",$keyword);

        $request->validate(
            [
                'domain_name' => [
                    'required',
                    'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
                ],
                'keywords' => 'required',
                'keywords.*' => 'required',
                'category' => 'required',
                'category.*' => 'required',

            ], [
                'keywords.*.required' => 'The Keywords field is required',
                'domain_name.url' => 'Please Enter a valid Url',
                'category.*.required' => 'Please selected category',
            ]
        );

        $path = parse_url($request->domain_name);
        $url = str_replace("www.", "", $path);
        $url = str_replace("WWW.", "", $url);

        $domainVerifcations = DomainVerifcation::where('domain_name', $url)->get();
        $domainVerifcation = "";
        foreach($domainVerifcations as $k => $data)
        {
            $domainVerifcation = $data->domain_name;
        }

        if(!empty($url['path'] == $domainVerifcation))
        {
            $domain = DomainVerifcation::where('domain_name',$domainVerifcation)->first();
            $domain->tracker = getTrx(8) . rand(0, 100);
            $domain->domain_name =urlToDomain($request->domain_name);
            $domain->publisher_id = Auth::guard('publisher')->user()->id;
            $domain->verify_code = getTrx(32);
            $domain->keywords = implode(' , ',$keywords);
            $domain->category = implode(' , ',$request->category);
            $domain->status = 0;
            $domain->save();
            $notify[] = ['success', 'Domain submitted'];
            return back()->withNotify($notify);
        }
        else
        {
            $domainVerify = new DomainVerifcation();
            $domainVerify->tracker = getTrx(8) . rand(0, 100);
            $domainVerify->domain_name =urlToDomain($request->domain_name);
            $domainVerify->publisher_id = Auth::guard('publisher')->user()->id;
            $domainVerify->verify_code = getTrx(32);
            $domainVerify->keywords = implode(' , ',$keywords);
            $domainVerify->category = implode(' , ',$request->category);
            $domainVerify->status = 0;
            $domainVerify->save();
            $notify[] = ['success', 'Domain submitted'];
            return back()->withNotify($notify);
        }
    }

    public function domainVerifyAct($tracker)
    {
        $general = GeneralSetting::first();
        $page_title = "Verify the Domain";
        $domain = DomainVerifcation::whereTracker($tracker)->first();
        if (!$domain) {
            $notify[] = ['error', 'Sorry domain couldn\'t found'];
            return back()->withNotify($notify);
        }
        $fileName = strtolower(str_replace(' ', '_', $general->sitename)) . '.txt';
        $fileURL = 'https://' . $domain->domain_name . '/' . strtolower(str_replace(' ', '_', $general->sitename)) . '.txt';
        return view($this->activeTemplate . 'publisher.domain.verifyPage', compact('page_title', 'domain', 'fileURL', 'fileName'));
    }

    public function updateDomainKeyword(Request $request, $tracker)
    {
        $request->validate([
                               'keywords' => 'required'
                           ]);
        $domain = DomainVerifcation::whereTracker($tracker)->first();
        $domain->keywords = $request->keywords;
        $domain->update();
        $notify[] = ['success', 'Domain Updated'];
        return back()->withNotify($notify);
    }



    public function domainCheck($tracker)
    {

        $general = GeneralSetting::first();
        $domain = DomainVerifcation::whereTracker($tracker)->first();

        $fileURL = 'https://' . $domain->domain_name . '/' . strtolower(str_replace(' ', '_', $general->sitename)) . '.txt';

        if (Auth::guard('publisher')->user()->id == $domain->publisher_id) {
            $verification = file_get_contents($fileURL);
            if ($domain->verify_code == $verification) {
                $general->domain_approval == 1 ? $domain->status = 2 : $domain->status = 1;
                $domain->save();
                $general->domain_approval == 1 ? $notify[] = ['info', 'Your domain has been submitted for approval'] : $notify[] = ['success', 'Your domain has been verified'];
                return back()->withNotify($notify);
            }
        }
        $notify[] = ['error', 'We couldn\'t verify your domain. Please try again'];
        return back()->withNotify($notify);
    }

    public function domainRemove($tracker)
    {
        $domain = DomainVerifcation::whereTracker($tracker)->first();
        $domain->delete();
        $notify[] = ['success', 'domain removed successfully'];
        return back()->withNotify($notify);
    }

    public function perDay()
    {
        $page_title = "Day to day earnings";
        $empty_message = "No data";
        $logs = EarningLogs::where('publisher_id', auth()->guard('publisher')->id())->latest()->paginate(15);
        return view($this->activeTemplate . 'publisher.reports.dayToday', compact('page_title', 'empty_message', 'logs'));
    }

    public function daySearch(Request $request)
    {
        $page_title = 'Searched Results';
        $empty_message = 'No data';
        $logs = EarningLogs::where('date', 'like', "%$request->search%")->paginate(15);
        return view($this->activeTemplate . 'publisher.reports.daySearch', compact('logs', 'page_title', 'empty_message'));
    }
    public function dateSearch(Request $request)
    {


        $empty_message = "No result";

        $date = explode(' - ', $request->date);
        $notify[] = ['error', 'Invalid Date'];
        if (!(@strtotime($date[0]))) {
            return back()->withNotify($notify);
        }
        if (isset($date[1]) && !strtotime($date[1])) {
            return back()->withNotify($notify);
        }
        if (count($date) == 1) {
            $firstDate = Carbon::create($date[0])->format('Y-m-d');
            $page_title = "Search Result - $firstDate";
            $logs = EarningLogs::wherePublisherId(auth()->guard('publisher')->id())->where('date', 'like', "%$firstDate%")->paginate(15);
        } else {
            $firstDate = Carbon::create($date[0])->format('Y-m-d');
            $secondDate = Carbon::create($date[1])->format('Y-m-d');
            $page_title = "Search Result #  $firstDate  to  $secondDate";
            $logs = EarningLogs::wherePublisherId(auth()->guard('publisher')->id())->whereBetween('date', [$firstDate, $secondDate])->paginate(15);
        }

        return view($this->activeTemplate . 'publisher.reports.dayToday', compact('logs', 'page_title', 'empty_message'));
    }


    public function show2faForm()
    {
        $gnl = GeneralSetting::first();
        $ga = new GoogleAuthenticator();
        $user = auth()->guard('publisher')->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $secret);
        $prevcode = $user->tsc;
        $prevqr = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $prevcode);
        $page_title = 'Two Factor';
        return view($this->activeTemplate . 'publisher.twofactor', compact('page_title', 'secret', 'qrCodeUrl', 'prevcode', 'prevqr'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->guard('publisher')->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);

        $ga = new GoogleAuthenticator();
        $secret = $request->key;
        $oneCode = $ga->getCode($secret);

        if ($oneCode === $request->code) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->tv = 1;
            $user->save();


            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            send_email($user, '2FA_ENABLE', [
                'operating_system' => $osBrowser['os_platform'],
                'browser' => $osBrowser['browser'],
                'ip' => $userAgent['ip'],
                'time' => $userAgent['time']
            ]);
            send_sms($user, '2FA_ENABLE', [
                'operating_system' => $osBrowser['os_platform'],
                'browser' => $osBrowser['browser'],
                'ip' => $userAgent['ip'],
                'time' => $userAgent['time']
            ]);


            $notify[] = ['success', 'Google Authenticator Enabled Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->withNotify($notify);
        }
    }

    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->guard('publisher')->user();
        $ga = new GoogleAuthenticator();

        $secret = $user->tsc;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {

            $user->tsc = null;
            $user->ts = 0;
            $user->tv = 1;
            $user->save();


            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            send_email($user, '2FA_DISABLE', [
                'operating_system' => $osBrowser['os_platform'],
                'browser' => $osBrowser['browser'],
                'ip' => $userAgent['ip'],
                'time' => $userAgent['time']
            ]);
            send_sms($user, '2FA_DISABLE', [
                'operating_system' => $userAgent['os_platform'],
                'browser' => $userAgent['browser'],
                'ip' => $userAgent['ip'],
                'time' => $userAgent['time']
            ]);


            $notify[] = ['success', 'Two Factor Authenticator Disable Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->with($notify);
        }
    }


    //publisher withdraw

    public function withdrawMoney()
    {
        $data['withdrawMethod'] = WithdrawMethod::whereStatus(1)->get();
        $data['page_title'] = "Withdraw Money";
        return view($this->activeTemplate . 'user.withdraw.methods', $data);
    }

    public function withdrawStore(Request $request)
    {
        $this->validate($request, [
            'method_code' => 'required',
            'amount' => 'required|numeric'
        ]);
        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->firstOrFail();
        $user = auth()->guard('publisher')->user();
        if ($request->amount < $method->min_limit) {
            $notify[] = ['error', 'Your Requested Amount is Smaller Than Minimum Amount.'];
            return back()->withNotify($notify);
        }
        if ($request->amount > $method->max_limit) {
            $notify[] = ['error', 'Your Requested Amount is Larger Than Maximum Amount.'];
            return back()->withNotify($notify);
        }

        if ($request->amount > $user->earnings) {
            $notify[] = ['error', 'Your do not have Sufficient Balance For Withdraw.'];
            return back()->withNotify($notify);
        }


        $charge = $method->fixed_charge + ($request->amount * $method->percent_charge / 100);
        $afterCharge = $request->amount - $charge;
        $finalAmount = getAmount($afterCharge * $method->rate);

        $w['method_id'] = $method->id; // wallet method ID
        $w['user_id'] = $user->id;
        $w['amount'] = getAmount($request->amount);
        $w['currency'] = $method->currency;
        $w['rate'] = $method->rate;
        $w['charge'] = $charge;
        $w['final_amount'] = $finalAmount;
        $w['after_charge'] = $afterCharge;
        $w['trx'] = getTrx();
        $result = Withdrawal::create($w);
        session()->put('wtrx', $result->trx);
        return redirect()->route('user.withdraw.preview');
    }

    public function withdrawPreview()
    {
        $data['withdraw'] = Withdrawal::with('method', 'publisher')->where('trx', session()->get('wtrx'))->where('status', 0)->latest()->firstOrFail();
        $data['page_title'] = "Withdraw Preview";
        return view($this->activeTemplate . 'user.withdraw.preview', $data);
    }


    public function withdrawSubmit(Request $request)
    {
        $general = GeneralSetting::first();
        $withdraw = Withdrawal::with('method', 'publisher')->where('trx', session()->get('wtrx'))->where('status', 0)->latest()->firstOrFail();
        $rules = [];
        $inputField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($withdraw->method->user_data as $key => $cus) {
                $rules[$key] = [$cus->validation];
                if ($cus->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], 'mimes:jpeg,jpg,png');
                    array_push($rules[$key], 'max:2048');
                }
                if ($cus->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($cus->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }
        $this->validate($request, $rules);
        $user = auth()->guard('publisher')->user();

        if (getAmount($withdraw->amount) > $user->earnings) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Your Current Balance.'];
            return back()->withNotify($notify);
        }

        $directory = date("Y") . "/" . date("m") . "/" . date("d");
        $path = imagePath()['verify']['withdraw']['path'] . '/' . $directory;

        $collection = collect($request);
        $reqField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($collection as $k => $v) {
                foreach ($withdraw->method->user_data as $inKey => $inVal) {
                    if ($k != $inKey) {
                        continue;
                    } else {
                        if ($inVal->type == 'file') {
                            if ($request->hasFile($inKey)) {
                                try {
                                    $reqField[$inKey] = [
                                        'field_name' => $directory . '/' . uploadImage($request[$inKey], $path),
                                        'type' => $inVal->type,
                                    ];
                                } catch (\Exception $exp) {
                                    $notify[] = ['error', 'Could not upload your ' . $request[$inKey]];
                                    return back()->withNotify($notify)->withInput();
                                }
                            }
                        } else {
                            $reqField[$inKey] = $v;
                            $reqField[$inKey] = [
                                'field_name' => $v,
                                'type' => $inVal->type,
                            ];
                        }
                    }
                }
            }
            $withdraw['withdraw_information'] = $reqField;
        } else {
            $withdraw['withdraw_information'] = null;
        }


        $withdraw->status = 2;
        $withdraw->save();
        $user->earnings  -=  $withdraw->amount;
        $user->update();



        $transaction = new Transaction();
        $transaction->publisher_id = $withdraw->user_id;
        $transaction->amount = getAmount($withdraw->amount);
        $transaction->post_balance = getAmount($user->earnings);
        $transaction->charge = getAmount($withdraw->charge);
        $transaction->trx_type = '-';
        $transaction->details = getAmount($withdraw->final_amount) . ' ' . $withdraw->currency . ' Withdraw Via ' . $withdraw->method->name;
        $transaction->trx =  $withdraw->trx;
        $transaction->save();

        notify($user, 'WITHDRAW_REQUEST', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => getAmount($withdraw->final_amount),
            'amount' => getAmount($withdraw->amount),
            'charge' => getAmount($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => getAmount($withdraw->rate),
            'trx' => $withdraw->trx,
            'post_balance' => getAmount($user->earnings),
            'delay' => $withdraw->method->delay
        ]);

        $notify[] = ['success', 'Withdraw Request Successfully Send'];
        return redirect()->route('user.withdraw.history')->withNotify($notify);
    }

    public function withdrawLog(Request $request)
    {
        $data['page_title'] = "Withdraw Log";

        $search = $request->search;
        if ($request->search) {
            $data['page_title'] = "Search Result of $search";
            $data['withdraws'] = Withdrawal::where('user_id', Auth::guard('publisher')->user()->id)->where('status', '!=', 0)->where('trx', 'like', "%$search%")->with('method')->latest()->paginate(15);
        } else {

            $data['withdraws'] = Withdrawal::where('user_id', Auth::guard('publisher')->user()->id)->where('status', '!=', 0)->with('method')->latest()->paginate(15);
        }

        $data['empty_message'] = "No Data Found!";
        return view($this->activeTemplate . 'user.withdraw.log', $data);
    }

    public function adReport()
    {
        $page_title = 'Per day ad report';
        $empty_message = 'No data';
        $reports = PublisherAd::where('publisher_id', auth()->guard('publisher')->id())->latest()->paginate(15);
        return view($this->activeTemplate . 'publisher.reports.adReport', compact('page_title', 'reports', 'empty_message'));
    }

    public function adReportSearch(Request $request)
    {
        $page_title = "Search Result";
        $empty_message = "No result";
        if ($request->date) {

            $date = explode(' - ', $request->date);
            $notify[] = ['error', 'Invalid Date'];
            if (!(@strtotime($date[0]))) {
                return back()->withNotify($notify);
            }
            if (isset($date[1]) && !strtotime($date[1])) {
                return back()->withNotify($notify);
            }

            if (count($date) == 1) {
                $firstDate = Carbon::create($date[0])->format('Y-m-d');
                $reports = PublisherAd::wherePublisherId(auth()->guard('publisher')->id())->where('date', 'like', "%$firstDate%")->paginate(15);
            } else {
                $firstDate = Carbon::create($date[0])->format('Y-m-d');
                $secondDate = Carbon::create($date[1])->format('Y-m-d');
                $reports = PublisherAd::wherePublisherId(auth()->guard('publisher')->id())->whereBetween('date', [$firstDate, $secondDate])->paginate(15);
            }
        } elseif ($request->search) {
            $reports = PublisherAd::wherePublisherId(auth()->guard('publisher')->id())->whereHas('advertise', function ($q) use ($request) {
                $q->where('ad_title', 'like', "%$request->search%");
            })->paginate(15);
        } else {
            $notify[] = ['error', 'Sorry invalid search request'];
            return back()->withNotify($notify);
        }


        return view($this->activeTemplate . 'publisher.reports.adReport', compact('page_title', 'reports', 'empty_message'));
    }
}
