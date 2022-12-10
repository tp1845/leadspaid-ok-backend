<?php

namespace App\Providers;

use App\GeneralSetting;
use App\Language;
use App\Page;
use App\Extension;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        $activeTemplate = activeTemplate();

        $viewShare['general'] = GeneralSetting::first();
        $viewShare['activeTemplate'] = $activeTemplate;
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        $viewShare['language'] = Language::all();
        $viewShare['pages'] = Page::where('tempname',$activeTemplate)->where('slug','!=','home')->get();
        view()->share($viewShare);


        view()->composer('admin.partials.sidenav', function ($view) {
            $view->with([


                'pending_ticket_count'         => \App\SupportTicket::whereIN('status', [0,2])->count(),
                'pending_deposits_count'    => \App\Deposit::pending()->count(),
                'pending_withdraw_count'    => \App\Withdrawal::pending()->count(),
                'pending_domain'               => \App\DomainVerifcation::pending()->count(),

                'banned_advertiser_count'      => \App\Advertiser::banned()->count(),
                'banned_publisher_count'       => \App\Publisher::banned()->count(),

                'email_unverified_advertiser'  => \App\Advertiser::emailUnverified()->count(),
                'sms_unverified_advertiser'    => \App\Advertiser::smsUnverified()->count(),

                'email_unverified_publisher' => \App\Publisher::emailUnverified()->count(),
                'sms_unverified_publisher'   => \App\Publisher::smsUnverified()->count(),
            ]);
        });

        view()->composer('partials.seo', function ($view) {
            $seo = \App\Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });

        view()->composer([$activeTemplate.'sections.overview',$activeTemplate.'blogDetails',$activeTemplate.'partials.footer'], function ($view) {

            $view->with([
                'total_users' => \App\Advertiser::count(),
                'total_publisher' => \App\Publisher::count(),
                'total_click' => \App\CreateAd::sum('clicked'),
                'total_imp' => \App\CreateAd::sum('impression'),
                'total_ad' => \App\CreateAd::count()
            ]);
        });

    }
}
