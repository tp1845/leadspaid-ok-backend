<?php

namespace App\Http\Controllers\Publisher;

use App\AdType;
use App\CreateAd;
use App\PublisherAd;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdvertiseController extends Controller
{
    public function advertises()
    {       
        $ads = AdType::all();
        $page_title = 'Advertise Types';
        $empty_message = 'No Advertise available';
        return view(activeTemplate().'publisher.advertises.advertises',compact('ads','page_title','empty_message'));
    }

    public function publishedAd()
    {
       $user = Auth::guard('publisher')->user();
       $page_title = 'Published Ads';
       $empty_message="No Published Ad";
       return view(activeTemplate().'publisher.advertises.published',compact('page_title','empty_message','user'));
    }

    public function details($id)
    {
        $page_title = 'Published Ad Details';
        $user = Auth::guard('publisher')->user();
        $advertise = CreateAd::findOrFail($id);
        $count = PublisherAd::where('publisher_id',$user->id)->where('create_ad_id',$advertise->id)->first();
        if($count==null){
            $notify[]=['error','Sorry Ad couldn\'t found'];
            return back()->withNotify($notify);
        }
        return view(activeTemplate().'publisher.advertises.details',compact('advertise','page_title','count'));
    }

}
