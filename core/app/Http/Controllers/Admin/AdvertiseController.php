<?php

namespace App\Http\Controllers\Admin;

use App\AdType;
use App\Country;
use App\Keyword;
use App\CreateAd;
use App\PricePlan;
use App\GeneralSetting;
use App\IpChart;
use App\IpLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertiseController extends Controller
{
    public function allAdvertise()
    {
        $advertises = CreateAd::with('advertiser')->latest()->paginate(15,['id','advertiser_id','ad_name','ad_title','ad_type','status','clicked','impression']);
        $page_title = 'All Advertises';
        $empty_message="No advertises";
        return view('admin.advertises.allAdvertises',compact('advertises','page_title','empty_message'));
    }
    public function advertiseDetails($id)
    {
        $advertise = CreateAd::findOrFail($id);
        $page_title='Advertise Details';
        return view('admin.advertises.details',compact('advertise','page_title'));
    }

    //Price Plan operations
    public function pricePlan()
    {
        $page_title = 'Ad Price-plans';
        $empty_message = 'No data';
        $plans = PricePlan::all();
        return view('admin.advertises.pricePlan',compact('page_title','empty_message','plans'));
    }

    public function addPricePlan(Request $request)
    {
        $plan = new PricePlan ();
        $this->savePricePlan( $plan,$request);
        $notify[]=['success','Price plan added successfully'];
        return back()->withNotify($notify);
    }

    public function updatePricePlan(Request $request,$id)
    {
        $plan = PricePlan::findOrFail($id);
        $this->savePricePlan($plan,$request);
        $notify[]=['success','Price plan updated successfully'];
        return back()->withNotify($notify);
    }

    public function savePricePlan($plan,Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'type' => 'required|in:click,impression',
            'price'=>'required|numeric|min:1',
            'credit' =>'required|numeric|min:1',
        ]);
        $plan->name = $request->name;
        $plan->type = $request->type;
        $plan->price = $request->price;
        $plan->credit = $request->credit;
        isset($request->status) ? $plan->status = 1 : $plan->status = 0;
        $plan->save();
    }


    //AdType operations
    public function type()
    {
        $page_title = 'Ad types';
        $empty_message = 'No data';
        $types = AdType::all();
        return view('admin.advertises.adTypes',compact('page_title','empty_message','types'));
    }

    public function addType(Request $request)
    {
        if(AdType::where('slug',$request->width.'x'.$request->height)->first()){
             $notify[]=['error','Slug has already been taken'];
            return back()->withNotify($notify);
        }
        $adType = new AdType ();
        $this->saveType($adType ,$request);
        $notify[]=['success','Type added successfully'];
        return back()->withNotify($notify);
    }

    public function updateType(Request $request,$id)
    {
        $adType = AdType::findOrFail($id);
        
        $request->validate([
            'adName'=> 'required',
            'adType' => 'required',
            'width'=>'required|integer|gt:0',
            'height' =>'required|integer|gt:0',
            'slug'=>'required|unique:ad_types,slug,'.$adType->id,
        ]);
        
       
    
        $adType->adName = $request->adName;
        $adType->type = $request->adType;
        $adType->width = $request->width;
        $adType->height = $request->height;
        $adType->slug = $request->width.'x'.$request->height;
        $adType->status = isset($request->status) ? 1 : 0;
        $adType->save();
        
        $notify[]=['success','Type updated successfully'];
        return back()->withNotify($notify);
    }

    public function saveType($adType, $request)
    {
        $request->validate([
            'adName'=> 'required',
            'adType' => 'required',
            'width'=>'required|integer|gt:0',
            'height' =>'required|integer|gt:0',
            'slug'=>'required|unique:ad_types',
        ]);
        
        $adType->adName = $request->adName;
        $adType->type = $request->adType;
        $adType->width = $request->width;
        $adType->height = $request->height;
        $adType->slug = $request->width.'x'.$request->height;
        $adType->status = isset($request->status) ? 1 : 0;
        $adType->save();
    }

   
    public function updateAd(Request $request,$id)
    {
       
        $request->validate([
            'url' => 'required|url',
            'country.*' =>'required'

        ]);
        $ad = CreateAd::findOrFail($id);
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
       
        $ad->redirect_url = $request->url;
        isset($request->status) ? $ad->status = 1 : $ad->status = 0;
        $ad->update();
        $notify[]=['success','Ad updated successfully'];
        return back()->withNotify($notify);
    }

    public function perCost()
    {
        $page_title='Cost per click & Cost per impression';
        return view('admin.advertises.perCost',compact('page_title'));
    }
    public function perCostUpdate(Request $request)
    {
        $request->validate([
            'cpc' => 'required|numeric|min:0',
            'cpm' => 'required|numeric|min:0'
        ]);
        $general = GeneralSetting::first();
        $general->cpc = $request->cpc;
        $general->cpm = $request->cpm;
        $general->update();
        $notify[]=['success','Cost Updated successfully'];
        return back()->withNotify($notify);
    }


    public function keywords()
    {
        $page_title = 'Keywords';
        $empty_message = 'No Keywords found';
        $keywords = Keyword::latest()->paginate(15);
        return view('admin.keywords.keywords',compact('keywords','page_title','empty_message'));
    }

    public function addKeyword(Request $request)
    {
        $request->validate([
            'keywords' => 'required',
        ]);

        $text = str_replace('"','',json_encode($request->keywords));
        $keywords = explode("\\r\\n",$text);
        foreach($keywords as $keyword){
            Keyword::create([
                'keywords'=>$keyword
            ]);
        }
        $notify[]=['success','Keywords added successfully'];
        return back()->withNotify($notify);
    }

    public function upateKeyword(Request $request,$id)
    {
        $request->validate([
            'keyword' => 'required',
        ]);

        $keyword = Keyword::findOrFail($id);
        $keyword->keywords = $request->keyword;
        $keyword->update();
        $notify[]=['success','Keyword updated successfully'];
        return back()->withNotify($notify);
    }

    public function removeKeyword($id)
    {
        Keyword::findOrFail($id)->delete();
        $notify[]=['success','Keyword has been removed'];
        return back()->withNotify($notify);
    }

    public function ipLog(Request $request)
    {
        $search = $request->search;
        if($search){
            $page_title = "Search results of $search";
            $logs = IpLog::where('ip','like',"%$search%")->latest()->whereHas('ad')->whereHas('ip',function($ip){
                $ip->where('blocked',0);
            })->paginate(15);
        } else{

            $page_title = 'Advertise Ip Logs';
            $logs = IpLog::latest()->whereHas('ad')->whereHas('ip',function($ip){
                $ip->where('blocked',0);
            })->with(['ad','ip'])->paginate(15);
        }
        $empty_message = "No logs";
        return view('admin.advertises.ip_logs',compact('page_title','logs','empty_message','search'));
    }
    public function blockedIpLog(Request $request)
    {
        $search = $request->search;
        if($search){
            $page_title = "Search results of $search";
            $logs = IpChart::where('blocked',1)->where('ip','like',"%$search%")->latest()->paginate(15);
        } else{

            $page_title = 'Blocked Ip Logs';
            $logs = IpChart::where('blocked',1)->latest()->paginate(15);
        }
        $empty_message = "No logs";
        return view('admin.advertises.blocked_ip_logs',compact('page_title','logs','empty_message','search'));
    }
    
    public function blockIp($id)
    {
       
        $block = IpChart::findOrFail($id);
        $block->blocked = 1;
        $block->save();
        $notify[]=['success','Ip has been blocked successfully'];
        return back()->withNotify($notify);
    }
    public function unBlockIp($id)
    {
        $unblockIp = IpChart::findOrFail($id);
        $unblockIp->blocked = 0;
        $unblockIp->update();
        $notify[]=['success','Ip has been unblocked successfully'];
        return back()->withNotify($notify);
    }



}
