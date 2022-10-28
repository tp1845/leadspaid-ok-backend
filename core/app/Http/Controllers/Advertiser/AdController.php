<?php

namespace App\Http\Controllers\Advertiser;

use App\AdType;
use App\CreateAd;
use App\PricePlan;
use App\Advertiser;
use App\AdvertiserPlan;
use App\Analytic;
use App\Country;
use App\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Keyword;
use App\PublisherAd;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    public function index()
    {
        $advertises = CreateAd::with('advertiser')->whereAdvertiserId(Auth()->guard('advertiser')->id())->latest()->paginate(15, ['id', 'advertiser_id', 'ad_name', 'ad_title', 'ad_type', 'status', 'resolution', 'image']);
        $page_title = 'All Advertises';
        $empty_message = "No Advertises";
        return view(activeTemplate() . 'advertiser.ads.all', compact('advertises', 'page_title', 'empty_message'));
    }


    public function report()
    {
        $reports = Analytic::whereAdvertiserId(Auth::guard('advertiser')->user()->id)->latest()->paginate(15);
        $page_title = 'Advertise Reports';
        $empty_message = 'No data';
        return view(activeTemplate() . 'advertiser.ads.report', compact('reports', 'page_title', 'empty_message'));
    }

    public function pricePlans()
    {
        $plans = PricePlan::all();
        $page_title = 'Price plans';
        $empty_message = "No data";
        return view(activeTemplate() . 'advertiser.ads.plans', compact('page_title', 'empty_message', 'plans'));
    }

    public function purchasePlans($id)
    {
        $plan = PricePlan::findOrFail($id);
        if ($plan->price > Auth::guard('advertiser')->user()->balance) {
            $notify[] = ['error', 'Insufficient balance'];
            return back()->withNotify($notify);
        }
        $page_title = "Purchase Preview";
        return view(activeTemplate() . 'advertiser.ads.purchasePreview', compact('page_title', 'plan'));

    }

    public function purchasePlansConfirm(Request $request)
    {
        $plan = PricePlan::findOrFail($request->planid);

        if (isset($plan)) {
            $advertiser = Advertiser::findOrFail(Auth::guard('advertiser')->user()->id);

            if ($plan->price <= $advertiser->balance) {
                $advertiser->balance -= $plan->price;
                if ($plan->type === 'impression') {
                    $advertiser->impression_credit += $plan->credit;
                } else {
                    $advertiser->click_credit += $plan->credit;
                }

                $advertiser->update();

                $advPlans['advertiser_id'] = $advertiser->id;
                $advPlans['price_plan_id'] = $plan->id;
                $advPlans['plan_type'] = $plan->type;
                AdvertiserPlan::updateOrCreate($advPlans);

                $trx['user_id'] = $advertiser->id;
                $trx['amount'] = $plan->price;
                $trx['charge'] = 0;
                $trx['post_balance'] = $advertiser->balance;
                $trx['trx_type'] = '-';
                $trx['details'] = $plan->name . ' ' . 'Plan Purchased';
                $trx['trx'] = Str::random(12);
                Transaction::create($trx);

                $notify[] = ['success', 'Plan Purchased successfully'];
                return redirect(route('advertiser.price.plan'))->withNotify($notify);
            } else {
                $notify[] = ['error', 'Insufficient balance'];
                return redirect(route('advertiser.price.plan'))->withNotify($notify);
            }

        }
    }


    public function create()
    {
        $page_title = 'Create Advertisement';
        $types = AdType::where('status',1)->get();
        return view(activeTemplate() . 'advertiser.ads.createAd', compact('page_title', 'types'));
    }

    public function store(Request $request)
    {

        $user = Auth::guard('advertiser')->user();
        $request->validate([
            'title' => 'required',
            'type' => 'required|in:click,impression',
            'url' => 'required|url',
            'country' => 'sometimes|required',
            'country.*' => 'sometimes|required',
            'file' => 'required|mimes:jpeg,jpg,png,gif|max:1024'
        ]);

        $ad = new CreateAd ();
        $ad->advertiser_id = $request->advertiser;
        $ad->ad_title = $request->title;
        $ad->ad_name = $request->adName;
        $ad->redirect_url = $request->url;
        if ($request->type == 'click' && $user->click_credit <= 0 || $request->type == 'impression' && $user->impression_credit <= 0) {
            $notify[] = ['error', 'Please purchase' . ' ' . ucfirst($request->type) . ' ' . 'plan first'];
            return back()->withNotify($notify);
        }
        $ad->ad_type = $request->type;
        $ad->ad_type_id = $request->typeId;
        $ad->keywords = $request->keywords;
        if ($request->global == 'on') {
            $ad->global = 1;
            $country = Country::all();
            $c_name = [];
            foreach ($country as $cr) {
                $c_name [] = $cr->country_name;
            }
            $ad->t_country = $c_name;
        } else {
            $ad->t_country = null;
        }

        isset($request->country) ? $ad->t_country = $request->country : null;
        $ad->track_id = Str::random(12);

        $ad->status = isset($request->status) ? 1 : 0;

        if ($request->file('file')) {
            $width = Image::make($request->file)->width();
            $height = Image::make($request->file)->height();

            $ad->resolution = $width . 'x' . $height;
            $addType = AdType::findOrFail($request->typeId);

            if ($addType->width != $width || $addType->height != $height) {
                $notify[] = ['error', 'Image resolution must be ' . $addType->width . 'x' . $addType->height . 'px'];
                return back()->withNotify($notify);
            } else {
                $path = 'assets/images/adImage';
                $ad->image = uploadImage($request->file, $path);
            }

        }
        $ad->save();
        $notify[] = ['success', 'Ad created successfully'];
        return back()->withNotify($notify);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'url' => 'required|url',
            'country' => 'required',
            'title' => 'required'
        ]);
        $ad = CreateAd::findOrFail($id);
        $ad->redirect_url = $request->url;
        $ad->ad_title = $request->title;
        if (isset($request->global)) {
            $ad->global = 1;
            $country = Country::all();
            $c_name = [];
            foreach ($country as $cr) {
                $c_name [] = $cr->country_name;
            }
            $ad->t_country = $c_name;
        } else {
            $ad->t_country = $request->country;
            $ad->global = 0;
        }
        if (isset($request->status)) {

            if ($ad->ad_type == 'click' && $ad->advertiser->click_credit > 0) {
                $ad->status = 1;
            } else if ($ad->ad_type == 'impression' && $ad->advertiser->impression_credit > 0) {
                $ad->status = 1;
            } else {
                $notify[] = ['error', 'You must purchase a plan to active this ad'];
                return back()->withNotify($notify);
            }
            $ad->update();
            $notify[] = ['success', 'Ad updated successfully'];
            return back()->withNotify($notify);

        }
        $ad->status = 0;
        $ad->keywords = $request->keywords;
        $ad->update();
        $notify[] = ['success', 'Ad updated successfully'];
        return back()->withNotify($notify);

    }

    public function adDetails($id)
    {
        $page_title = 'Advertise Details';
        $advertise = CreateAd::findOrFail($id);
        if ($advertise->advertiser_id != auth()->guard('advertiser')->id()) {
            $notify[] = ['error', 'Sorry Ad details not found'];
            return back()->withNotify($notify);
        }
        return view(activeTemplate() . 'advertiser.ads.details', compact('advertise', 'page_title'));
    }

    public function remove($id)
    {
        $ad = CreateAd::findOrFail($id);
        PublisherAd::where('create_ad_id', $ad->id)->delete();
        removeFile('assets/images/adImage/' . $ad->image);
        $ad->delete();
        $notify[] = ['success', 'Ad has been removed'];
        return back()->withNotify($notify);
    }


    public function reportSearch(Request $request)
    {
        $page_title = 'Ad report Searched Results';
        $empty_message = 'No result found';
        $query = $request->search;
        $reports = Analytic::whereAdvertiserId(Auth::guard('advertiser')->user()->id)->where('country', 'like', "%$request->search%")->orWhere('ad_title', 'like', "%$request->search%")->paginate(15);
        return view(activeTemplate() . 'advertiser.ads.report', compact('reports', 'page_title', 'empty_message', 'query'));
    }

    public function adSearch(Request $request)
    {
        $page_title = 'Searched Results';
        $empty_message = 'No result found';
        $query = $request->search;
        $advertises = CreateAd::whereAdvertiserId(Auth::guard('advertiser')->user()->id)->where('ad_title', 'like', "%$request->search%")->orWhere('resolution', 'like', "%$request->search%")->paginate(15);
        return view(activeTemplate() . 'advertiser.ads.all', compact('advertises', 'page_title', 'empty_message', 'query'));
    }
}
