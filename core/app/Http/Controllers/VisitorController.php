<?php

namespace App\Http\Controllers;

use App\IpLog;
use App\AdType;
use App\IpChart;
use App\Analytic;
use App\CreateAd;
use App\BlockedIp;
use App\Extension;
use App\Publisher;
use Carbon\Carbon;
use App\Advertiser;
use App\EarningLogs;
use App\PublisherAd;
use App\Transaction;
use App\AdvertiserPlan;
use App\GeneralSetting;
use App\DomainVerifcation;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;

class VisitorController extends Controller
{

    protected function defaultAd($slug, $width, $height, $title)
    {

        $logo = route('placeholderImage', $slug);
        return "<a href='" . url('/') . "' target='_blank'><img src='" . $logo . "' width='" . $width . "' height='" . $height . "'/></a><strong style='background-color:#e6e6e6;position:absolute;right:0;top:0;font-size: 10px;color: #666666; padding:4px; margin-right:15px;'>Ads by " . $title . "</strong><span onclick='hideAdverTiseMent(this)' style='position:absolute;right:0;top:0;width:15px;height:20px;background-color:#f00;font-size: 15px;color: #fff;border-radius: 1px;cursor: pointer;'>x</span>";
    }

    public function randomAd($redirectUrl, $adImage, $width, $height, $sitename)
    {
        return "<a href='" . $redirectUrl . "' target='_blank'><img src='" . $adImage . "' width='" . $width . "' height='" . $height . "'/></a><strong style='background-color:#e6e6e6;position:absolute;right:0;top:0;font-size: 10px;color: #666666; padding:4px; margin-right:15px;'>Ads by " . $sitename . "</strong><span onclick='hideAdverTiseMent(this)' style='position:absolute;right:0;top:0;width:15px;height:20px;background-color:#f00;font-size: 15px;color: #fff;border-radius: 1px;cursor: pointer;'>x</span>";
    }


    public function getIp()
    {
        if (Request::server('HTTP_CLIENT_IP')) {
            return Request::server('HTTP_CLIENT_IP');
        } elseif (Request::server('HTTP_X_FORWARDED_FOR')) {
            return Request::server('HTTP_X_FORWARDED_FOR');
        } else {
            return Request::server('REMOTE_ADDR') ? Request::server('REMOTE_ADDR') : '';
        }
    }

    public function getAdvertise($pubId, $slug, $currentUrl)
    {
        header("Access-Control-Allow-Origin: *");

        $publisherId = Crypt::decryptString($pubId);
        $adType = AdType::whereSlug($slug)->where('status', 1)->first();
        $setting = GeneralSetting::first();
        $existingIp = IpChart::where('ip', $this->getIp())->first();
        if ($existingIp) {
            if ($existingIp->blocked == 1) {
                return $this->defaultAd($slug, $adType->width, $adType->height, $setting->sitename);
            }
        } else {
            $existingIp = new IpChart();
            $existingIp->ip = $this->getIp();
            $existingIp->save();
        }
        $domain = DomainVerifcation::where('domain_name', $currentUrl)->where('publisher_id', $publisherId)->whereStatus(1)->first();
        if (!$domain) {
            info("Domain not found or unverified");
            return $this->defaultAd($slug, $adType->width, $adType->height, $setting->sitename);
        }

        $query = json_decode(file_get_contents('http://api.ipstack.com/' . $this->getIp() . '?access_key=' . $setting->location_api));
        if (@$query->error) {
            info("IP tracking  error", [
                'error' => @$query->error
            ]);
            return $this->defaultAd($slug, $adType->width, $adType->height, $setting->sitename);
        };

        $general = GeneralSetting::first();
        if (isset($adType)) {
            $queryAd = CreateAd::where('ad_type_id', $adType->id)->whereStatus(1);
            if ($general->check_country && $query->country_name) {
                $queryAd->whereJsonContains('t_country', $query->country_name);
            }
            if ($general->check_domain_keyword) {
                $queryAd->where(function ($q) use ($domain) {
                    foreach ($domain->keywords as $keyword) {
                        $q->orWhere('keywords', 'LIKE', "%$keyword%");
                    }
                });
            }
            $ads = $queryAd->inRandomOrder()->first();
            $existIpLog = $existingIp->iplogs->where('ad_id', $ads->id)->where('time', '>=', Carbon::now()->subMinutes($setting->intervals))->first();
            if (isset($ads)) {

                $publisher = Publisher::findOrFail($publisherId);
                $publisherAd = PublisherAd::firstOrNew(['create_ad_id' => $ads->id, 'publisher_id' => $publisher->id, 'date' => Carbon::now()->toDateString()]);
                $publisherAd->advertiser_id = $ads->advertiser_id;
                $publisherAd->imp_count += 1;
                $publisherAd->save();

                if ($ads->ad_type == 'impression') {

                    $advertiser = Advertiser::findOrFail($ads->advertiser_id);
                    if (!$existIpLog) {
                        $ipLog = new IpLog();
                        $ipLog->ip_id = $existingIp->id;
                        $ipLog->country = $query->country_name;
                        $ipLog->ad_id = $ads->id;
                        $ipLog->ad_type = $ads->ad_type;
                        $ipLog->time = Carbon::now()->toTimeString();
                        $ipLog->save();

                        if ($advertiser->impression_credit > 0) {
                            $advertiser->impression_credit -= 1;
                            $advertiser->update();
                        } else {
                            $ads->status = 0;
                            $ads->update();
                            AdvertiserPlan::where('advertiser_id', $advertiser->id)->where('plan_type', 'impression')->delete();
                        }
                        if (isset($publisher)) {
                            $publisher->earnings += $setting->cpm;
                            $publisher->update();

                            $earningLog = EarningLogs::firstOrNew(['publisher_id' => $publisher->id, 'ad_id' => $ads->id, 'date' => Carbon::now()->toDateString()]);
                            $earningLog->amount += $setting->cpc;
                            $earningLog->ad_type = $ads->ad_type;
                            $earningLog->save();
                        }
                    }
                }

                $redirectUrl = route('adClicked', [encrypt($publisherId), $ads->track_id, $existingIp]);
                $adImage = asset('assets/images/adImage') . '/' . $ads->image;

                $ads->impression += 1;
                $ads->update();

                $analytic = Analytic::firstOrNew(['country' => @$query->country_name, 'advertiser_id' => $ads->advertiser_id, 'ad_id' => $ads->id]);
                $analytic->ad_title = $ads->ad_title;
                $analytic->imp_count += 1;
                $analytic->save();
            } else {
                info("Ad not found. ad type: " . $adType->slug);
                return $this->defaultAd($slug, $adType->width, $adType->height, $setting->sitename);
            }
        } else {
            info("Ad type not found. ad type: request ad type slug: " . $slug);
            return $this->defaultAd($slug, $adType->width, $adType->height, $setting->sitename);
        }

        return $this->randomAd($redirectUrl, $adImage, $adType->width, $adType->height, $setting->sitename);
    }

    public function adClicked($publisherId, $trackId)
    {
        $ad = CreateAd::where('track_id', $trackId)->first();
        $setting = GeneralSetting::first();
        $query = json_decode(file_get_contents('http://api.ipstack.com/' . $this->getIp() . '?access_key=' . $setting->location_api));
        if (@$query->error) {
            return redirect(url('/'));
        };

        $existingIp = IpChart::where('ip', $this->getIp())->first();
        $publisher = Publisher::findOrFail(decrypt($publisherId));
        $advertiser = Advertiser::findOrFail($ad->advertiser_id);
        $existIpLog = $existingIp->iplogs->where('ad_id', $ad->id)->where('time', '>=', Carbon::now()->subMinutes($setting->intervals))->first();

        if (isset($ad)) {
            $publisherAd = PublisherAd::firstOrNew(['create_ad_id' => $ad->id, 'publisher_id' => $publisher->id, 'date' => Carbon::now()->toDateString()]);
            $publisherAd->advertiser_id = $ad->advertiser_id;
            $publisherAd->click_count += 1;
            $publisherAd->save();

            if ($ad->ad_type === 'click') {
                if (!$existIpLog) {
                    $ipLog = new IpLog();
                    $ipLog->ip_id = $existingIp->id;
                    $ipLog->country = $query->country_name;
                    $ipLog->ad_id = $ad->id;
                    $ipLog->ad_type = $ad->ad_type;
                    $ipLog->time = Carbon::now()->toTimeString();
                    $ipLog->save();
                    if ($advertiser->click_credit > 0) {
                        $advertiser->click_credit -= 1;
                        $advertiser->update();
                    } else {
                        $ad->status = 0;
                        $ad->update();
                        AdvertiserPlan::where('advertiser_id', $advertiser->id)->where('plan_type', 'click')->delete();
                    }
                    if (isset($publisher)) {
                        $publisher->earnings += $setting->cpc;
                        $publisher->update();

                        $earningLog = EarningLogs::firstOrNew(['publisher_id' => $publisher->id, 'ad_id' => $ad->id, 'date' => Carbon::now()->toDateString()]);
                        $earningLog->amount += $setting->cpc;
                        $earningLog->ad_type = $ad->ad_type;
                        $earningLog->save();
                    }
                }
            }

            $ad->clicked += 1;
            $ad->update();


            $analytic = Analytic::firstOrNew(['country' => @$query->country_name, 'advertiser_id' => $ad->advertiser_id, 'ad_id' => $ad->id]);
            $analytic->ad_title = $ad->ad_title;
            $analytic->click_count += 1;
            $analytic->save();


            return redirect($ad->redirect_url);
        } else {
            return redirect(url('/'));
        }
    }

    public function setErrorLog($message, $errors = [])
    {
        info($message, $errors);
    }
}
