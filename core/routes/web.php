<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Gateway')->prefix('ipn')->name('ipn.')->group(function () {
    Route::post('paypal', 'paypal\ProcessController@ipn')->name('paypal');
    Route::get('paypal_sdk', 'paypal_sdk\ProcessController@ipn')->name('paypal_sdk');
    Route::post('perfect_money', 'perfect_money\ProcessController@ipn')->name('perfect_money');
    Route::post('stripe', 'stripe\ProcessController@ipn')->name('stripe');
    Route::post('stripe_js', 'stripe_js\ProcessController@ipn')->name('stripe_js');
    Route::post('stripe_v3', 'stripe_v3\ProcessController@ipn')->name('stripe_v3');
    Route::post('skrill', 'skrill\ProcessController@ipn')->name('skrill');
    Route::post('paytm', 'paytm\ProcessController@ipn')->name('paytm');
    Route::post('payeer', 'payeer\ProcessController@ipn')->name('payeer');
    Route::post('paystack', 'paystack\ProcessController@ipn')->name('paystack');
    Route::post('voguepay', 'voguepay\ProcessController@ipn')->name('voguepay');
    Route::get('flutterwave/{trx}/{type}', 'flutterwave\ProcessController@ipn')->name('flutterwave');
    Route::post('razorpay', 'razorpay\ProcessController@ipn')->name('razorpay');
    Route::post('instamojo', 'instamojo\ProcessController@ipn')->name('instamojo');
    Route::get('blockchain', 'blockchain\ProcessController@ipn')->name('blockchain');
    Route::get('blockio', 'blockio\ProcessController@ipn')->name('blockio');
    Route::post('coinpayments', 'coinpayments\ProcessController@ipn')->name('coinpayments');
    Route::post('coinpayments_fiat', 'coinpayments_fiat\ProcessController@ipn')->name('coinpayments_fiat');
    Route::post('coingate', 'coingate\ProcessController@ipn')->name('coingate');
    Route::post('coinbase_commerce', 'coinbase_commerce\ProcessController@ipn')->name('coinbase_commerce');
    Route::get('mollie', 'mollie\ProcessController@ipn')->name('mollie');
    Route::post('cashmaal', 'cashmaal\ProcessController@ipn')->name('cashmaal');
    Route::post('advertiser/charge', 'stripe_v3\ProcessController@charge')->name('advertiser_charge');
    Route::post('advertiser/current/charge', 'stripe_v3\ProcessController@charge_current')->name('current_advertiser_charge');
});

// User Support Ticket
Route::prefix('ticket')->group(function () {
    Route::get('/', 'TicketController@supportTicket')->name('ticket');
    Route::get('/new', 'TicketController@openSupportTicket')->name('ticket.open');
    Route::post('/create', 'TicketController@storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'TicketController@viewTicket')->name('ticket.view');
    Route::post('/reply/{ticket}', 'TicketController@replyTicket')->name('ticket.reply');
    Route::get('/download/{ticket}', 'TicketController@ticketDownload')->name('ticket.download');
});


/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');



        // Users Manager
        Route::get('user/email/{id}/{flag}', 'ManageUsersController@showEmailSingleForm')->name('users.email.single');
        Route::post('user/send-email/{id}/{role}', 'ManageUsersController@sendEmailSingle')->name('users.send.email.single');

        Route::get('advertiser/transactions/{id}', 'ManageUsersController@transactions')->name('users.transactions');
        Route::get('publisher/transactions/{id}', 'ManageUsersController@publisherTransactions')->name('publisher.transactions');
        Route::get('advertiser/deposits/{id}', 'ManageUsersController@deposits')->name('users.deposits');
        Route::get('publisher/withdrawals/{id}', 'ManageUsersController@withdrawals')->name('users.withdrawals');

        // Login History
        Route::get('users/login/ipHistory/{ip}', 'ReportController@loginIpHistory')->name('users.login.ipHistory');
        Route::get('report/login/history', 'ReportController@loginHistory')->name('report.login.history');

        // Report
        Route::get('report/publishers/earning-logs', 'ReportController@publisherEarningLogs')->name('earnings.publisher');
        Route::get('report/transaction/advertisers', 'ReportController@advertiserTransaction')->name('transaction.advertiser');


        //Advertises
        Route::get('/advertise/all', 'AdvertiseController@allAdvertise')->name('advertise.all');
        Route::get('/advertise/details/{id}', 'AdvertiseController@advertiseDetails')->name('advertise.details');
        Route::get('/advertise/cpc&cpm/', 'AdvertiseController@perCost')->name('advertise.perCost');
        Route::post('/advertise/cpc&cpm/update', 'AdvertiseController@perCostUpdate')->name('advertise.perCost.update');
        #price-plan
        Route::get('/advertise/price-plan', 'AdvertiseController@pricePlan')->name('advertise.price-plan');
        Route::post('/advertise/add/price-plan', 'AdvertiseController@addPricePlan')->name('advertise.add.price-plan');
        Route::post('/advertise/update/price-plan/{id}', 'AdvertiseController@updatePricePlan')->name('advertise.update.price-plan');
        Route::post('/advertise/price-plan/remove/{id}', 'AdvertiseController@removePricePlan')->name('advertise.priceplan.remove');
        #type
        Route::get('/advertise/type', 'AdvertiseController@type')->name('advertise.type');
        Route::post('/advertise/add/type', 'AdvertiseController@addType')->name('advertise.add.type');
        Route::post('/advertise/update/type/{id}', 'AdvertiseController@updateType')->name('advertise.update.type');
        Route::post('/advertise/update/{id}', 'AdvertiseController@updateAd')->name('advertise.update');

        Route::get('/advertise/ip-log', 'AdvertiseController@ipLog')->name('advertise.iplog');
        Route::get('/advertise/blocked/ip-log', 'AdvertiseController@blockedIpLog')->name('advertise.blockedip');
        Route::post('/advertise/ip/block/{id}', 'AdvertiseController@blockIp')->name('advertise.ip.block');
        Route::post('/advertise/ip/unblock/{id}', 'AdvertiseController@unBlockIp')->name('advertise.ip.unblock');

        // keywords
        Route::get('keywords', 'AdvertiseController@keywords')->name('keywords');
        Route::post('add/keywords', 'AdvertiseController@addKeyword')->name('add.keywords');
        Route::post('update/keyword/{id}', 'AdvertiseController@upateKeyword')->name('update.keywords');
        Route::post('remove/keyword/{id}', 'AdvertiseController@removeKeyword')->name('remove.keyword');

        //Manage Advertiser
        Route::get('/advertiser/all','AdvertiserController@allAdvertiser')->name('advertiser.all');
        Route::get('/advertiser/active/all','AdvertiserController@allActiveAdvertiser')->name('advertiser.active.all');
        Route::get('/advertiser/details/{id}','AdvertiserController@advertiserDetails')->name('advertiser.details');
        Route::post('/advertiser/update/{id}','AdvertiserController@advertiserUpdate')->name('advertiser.update');
        Route::post('/advertiser/ads/details/{id}','AdvertiserController@advertiserAdsDetails')->name('advertiser.ads.details');
        Route::post('advertiser/add-sub-balance/{id}', 'AdvertiserController@addSubBalance')->name('advertiser.addSubBalance');
        Route::get('/advertiser/banned/all','AdvertiserController@allBannedAdvertiser')->name('advertiser.banned.all');
        Route::get('/advertiser/banned/{id}','AdvertiserController@advertiserBanned')->name('advertiser.banned');
        Route::get('/advertiser/active/{id}','AdvertiserController@advertiserActive')->name('advertiser.active');
        Route::get('/advertiser/email-unverified','AdvertiserController@emailUnverified')->name('advertiser.email.unverified');
        Route::get('/advertiser/sms-unverified','AdvertiserController@smsUnverified')->name('advertiser.sms.unverified');

        Route::get('advertiser/login/history/{id}', 'AdvertiserController@loginHistory')->name('advertiser.login.history.single');
        Route::get('advertiser/ads/{id}', 'AdvertiserController@advertiserAds')->name('advertiser.ads');

        Route::get('advertiser/send-email', 'AdvertiserController@showEmailAllForm')->name('advertiser.email.all');
        Route::post('advertiser/send-email', 'AdvertiserController@sendEmailAll')->name('advertiser.email.send');
        Route::get('advertiser/search', 'AdvertiserController@search')->name('advertiser.search');
        Route::get('advertiser/update_status/', 'AdvertiserController@update_status')->name('advertiser.update_status');

        //Manage Campaigns
        Route::get('/campaigns/all','CampaignsController@index')->name('campaigns.all');
        Route::get('/campaigns/leads/export/{cid}/{aid}/{fid}','CampaignsController@export')->name('leads.export');
        Route::post('/campaigns/leads/importpreview/{cid}/{aid}/{fid}','CampaignsController@importpreview')->name('leads.importpreview');
        Route::post('/campaigns/leads/import/{cid}/{aid}/{fid}','CampaignsController@import')->name('leads.import');
        // Route::get('/campaigns/leads/export','CampaignsFormsController@export')->name('leads.export');
        // Route::post('/campaigns/leads/import','CampaignsFormsController@import')->name('leads.import');
        Route::get('/campaigns/leads','CampaignsFormsController@AllLeads')->name('leads.all');
        Route::get('/campaigns/approval/', 'CampaignsController@update_approval')->name('campaigns.approval');

        Route::get('/campaigns/lgenspend','LgenSpendController@index')->name('campaigns.lgenspend');
        Route::get('/campaigns/lgenspend/export/{cid}/{aid}/{fid}','LgenSpendController@export')->name('campaigns.lgenspend.export');
        Route::post('/campaigns/lgenspend/import/{cid}/{aid}/{fid}','LgenSpendController@import')->name('campaigns.lgenspend.import');
        Route::post('/campaigns/lgenspend/importpreview/{cid}/{aid}/{fid}','LgenSpendController@importpreview')->name('campaigns.lgenspend.importpreview');


        //Manage publisher
        Route::get('/publisher/all','PublisherController@allPublisher')->name('publisher.all');
        Route::get('/publisher/active/all','PublisherController@allActivePublisher')->name('publisher.active.all');
        Route::get('/publisher/details/{id}','PublisherController@publisherDetails')->name('publisher.details');
        Route::post('/publisher/update/{id}','PublisherController@publisherUpdate')->name('publisher.update');
        Route::get('/publisher/banned/all','PublisherController@allBannedPublisher')->name('publisher.banned.all');
        Route::get('/publisher/banned/{id}','PublisherController@publisherBanned')->name('publisher.banned');
        Route::get('/publisher/active/{id}','PublisherController@publisherActive')->name('publisher.active');
        Route::get('/publisher/email-unverified','PublisherController@emailUnverified')->name('publisher.email.unverified');
        Route::get('/publisher/sms-unverified','PublisherController@smsUnverified')->name('publisher.sms.unverified');

        Route::post('/publisher/ads/{slug}/{id}','PublisherController@publisherAds')->name('publisher.ads');
        Route::post('/publisher/ads/details/{id}','PublisherController@publisherAdsDetails')->name('publisher.ads.details');
        Route::post('publisher/add-sub-balance/{id}', 'PublisherController@addSubBalance')->name('publisher.addSubBalance');
        Route::get('publisher/login/history/{id}', 'PublisherController@loginHistory')->name('publisher.login.history.single');

        Route::get('publisher/send-email', 'PublisherController@showEmailAllForm')->name('publisher.email.all');
        Route::post('publisher/send-email', 'PublisherController@sendEmailAll')->name('publisher.email.send');
        Route::get('publisher/search', 'PublisherController@search')->name('publisher.search');
        Route::get('publisher/role/', 'PublisherController@update_role')->name('publisher.role');
        Route::get('/publisher/admin/all','PublisherController@allAdminPublisher')->name('publisher.admin.all');

        //domain manage
        Route::get('/domain/pending','DomainController@pending')->name('domain.pending');
        Route::get('/domain/approved/','DomainController@approved')->name('domain.approved');
        Route::get('/domain/approve/{id}','DomainController@approve')->name('domain.approve');
        Route::get('/domain/unapprove/{id}','DomainController@unapprove')->name('domain.unapprove');

        Route::post('/domain/remove/{id}','DomainController@remove')->name('domain.remove');
        Route::get('/domain/search/','DomainController@search')->name('domain.search');

        // Deposit Gateway
        Route::name('gateway.')->prefix('gateway')->group(function(){
            // Automatic Gateway
            Route::get('automatic', 'GatewayController@index')->name('automatic.index');
            Route::get('automatic/edit/{alias}', 'GatewayController@edit')->name('automatic.edit');
            Route::post('automatic/update/{code}', 'GatewayController@update')->name('automatic.update');
            Route::post('automatic/remove/{code}', 'GatewayController@remove')->name('automatic.remove');
            Route::post('automatic/activate', 'GatewayController@activate')->name('automatic.activate');
            Route::post('automatic/deactivate', 'GatewayController@deactivate')->name('automatic.deactivate');



            // Manual Methods
            Route::get('manual', 'ManualGatewayController@index')->name('manual.index');
            Route::get('manual/new', 'ManualGatewayController@create')->name('manual.create');
            Route::post('manual/new', 'ManualGatewayController@store')->name('manual.store');
            Route::get('manual/edit/{alias}', 'ManualGatewayController@edit')->name('manual.edit');
            Route::post('manual/update/{id}', 'ManualGatewayController@update')->name('manual.update');
            Route::post('manual/activate', 'ManualGatewayController@activate')->name('manual.activate');
            Route::post('manual/deactivate', 'ManualGatewayController@deactivate')->name('manual.deactivate');
        });


        // DEPOSIT SYSTEM
        Route::name('deposit.')->prefix('deposit')->group(function(){
            Route::get('/', 'DepositController@deposit')->name('list');
            Route::get('pending', 'DepositController@pending')->name('pending');
            Route::get('rejected', 'DepositController@rejected')->name('rejected');
            Route::get('approved', 'DepositController@approved')->name('approved');
            Route::get('successful', 'DepositController@successful')->name('successful');
            Route::get('details/{id}', 'DepositController@details')->name('details');

            Route::post('reject', 'DepositController@reject')->name('reject');
            Route::post('approve', 'DepositController@approve')->name('approve');
            Route::get('via/{method}/{type?}', 'DepositController@depViaMethod')->name('method');
            Route::get('/{scope}/search', 'DepositController@search')->name('search');
            Route::get('date-search/{scope}', 'DepositController@dateSearch')->name('dateSearch');

        });


        // WITHDRAW SYSTEM
        Route::name('withdraw.')->prefix('withdraw')->group(function(){
            Route::get('pending', 'WithdrawalController@pending')->name('pending');
            Route::get('approved', 'WithdrawalController@approved')->name('approved');
            Route::get('rejected', 'WithdrawalController@rejected')->name('rejected');
            Route::get('log', 'WithdrawalController@log')->name('log');
            Route::get('via/{method_id}/{type?}', 'WithdrawalController@logViaMethod')->name('method');
            Route::get('{scope}/search', 'WithdrawalController@search')->name('search');
            Route::get('date-search/{scope}', 'WithdrawalController@dateSearch')->name('dateSearch');
            Route::get('details/{id}', 'WithdrawalController@details')->name('details');
            Route::post('approve', 'WithdrawalController@approve')->name('approve');
            Route::post('reject', 'WithdrawalController@reject')->name('reject');


            // Withdraw Method
            Route::get('method/', 'WithdrawMethodController@methods')->name('method.index');
            Route::get('method/create', 'WithdrawMethodController@create')->name('method.create');
            Route::post('method/create', 'WithdrawMethodController@store')->name('method.store');
            Route::get('method/edit/{id}', 'WithdrawMethodController@edit')->name('method.edit');
            Route::post('method/edit/{id}', 'WithdrawMethodController@update')->name('method.update');
            Route::post('method/activate', 'WithdrawMethodController@activate')->name('method.activate');
            Route::post('method/deactivate', 'WithdrawMethodController@deactivate')->name('method.deactivate');
        });



        // Admin Support ticket
        Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
        Route::get('tickets/pending', 'SupportTicketController@pendingTicket')->name('ticket.pending');
        Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
        Route::get('tickets/answered', 'SupportTicketController@answeredTicket')->name('ticket.answered');
        Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
        Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');


        // Language Manager
        Route::get('/language', 'LanguageController@langManage')->name('language.manage');
        Route::post('/language', 'LanguageController@langStore')->name('language.manage.store');
        Route::post('/language/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
        Route::post('/language/update/{id}', 'LanguageController@langUpdatepp')->name('language.manage.update');
        Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language.key');
        Route::post('/language/import', 'LanguageController@langImport')->name('language.import_lang');



        Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
        Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
        Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');



        // General Setting
        Route::get('general-setting', 'GeneralSettingController@index')->name('setting.index');
        Route::post('general-setting', 'GeneralSettingController@update')->name('setting.update');

        // Logo-Icon
        Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo_icon');
        Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo_icon');

        // Plugin
        Route::get('extensions', 'ExtensionController@index')->name('extensions.index');
        Route::post('extensions/update/{id}', 'ExtensionController@update')->name('extensions.update');
        Route::post('extensions/activate', 'ExtensionController@activate')->name('extensions.activate');
        Route::post('extensions/deactivate', 'ExtensionController@deactivate')->name('extensions.deactivate');


        // Email Setting
        Route::get('email-template/global', 'EmailTemplateController@emailTemplate')->name('email.template.global');
        Route::post('email-template/global', 'EmailTemplateController@emailTemplateUpdate')->name('email.template.global');
        Route::get('email-template/setting', 'EmailTemplateController@emailSetting')->name('email.template.setting');
        Route::post('email-template/setting', 'EmailTemplateController@emailSettingUpdate')->name('email.template.setting');
        Route::get('email-template/index', 'EmailTemplateController@index')->name('email.template.index');
        Route::get('email-template/{id}/edit', 'EmailTemplateController@edit')->name('email.template.edit');
        Route::post('email-template/{id}/update', 'EmailTemplateController@update')->name('email.template.update');
        Route::post('email-template/send-test-mail', 'EmailTemplateController@sendTestMail')->name('email.template.sendTestMail');


        // SMS Setting
        Route::get('sms-template/global', 'SmsTemplateController@smsSetting')->name('sms.template.global');
        Route::post('sms-template/global', 'SmsTemplateController@smsSettingUpdate')->name('sms.template.global');
        Route::get('sms-template/index', 'SmsTemplateController@index')->name('sms.template.index');
        Route::get('sms-template/edit/{id}', 'SmsTemplateController@edit')->name('sms.template.edit');
        Route::post('sms-template/update/{id}', 'SmsTemplateController@update')->name('sms.template.update');
        Route::post('email-template/send-test-sms', 'SmsTemplateController@sendTestSMS')->name('sms.template.sendTestSMS');

        // SEO
        Route::get('seo', 'FrontendController@seoEdit')->name('seo');


        // Frontend
        Route::name('frontend.')->prefix('frontend')->group(function () {


            Route::get('templates', 'FrontendController@templates')->name('templates');
            Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');


            Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
            Route::post('remove', 'FrontendController@remove')->name('remove');

            // Page Builder
            Route::get('manage-pages', 'PageBuilderController@managePages')->name('manage.pages');
            Route::post('manage-pages', 'PageBuilderController@managePagesSave')->name('manage.pages.save');
            Route::post('manage-pages/update', 'PageBuilderController@managePagesUpdate')->name('manage.pages.update');
            Route::post('manage-pages/delete', 'PageBuilderController@managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'PageBuilderController@manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'PageBuilderController@manageSectionUpdate')->name('manage.section.update');
        });
    });

});

/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('advertiser')->name('advertiser.')->middleware(['advertiser','checkStatus:advertiser'])->group(function () {
    Route::get('campaigns/formleads/exportxlsx/{id}','CampaignsFormsController@campaignsformleads')->name('campaignsformleads.export');
    Route::get('campaigns/formleads/exportcsv/{id}','CampaignsFormsController@campaignsformleadscsv')->name('campaignsformleads.exportcsv');
    Route::get('form/exportxlsx/{id}','CampaignsFormsController@formleadsxlsx')->name('formleads.exportxlsx');
    Route::get('form/exportcsv/{id}','CampaignsFormsController@formleadscsv')->name('formleads.exportcsv');

    Route::get('campaigns/googlesheet/{id}','CampaignsFormsController@googlesheet')->name('campaignsleads.googlesheet');
});


Route::namespace('Advertiser')->prefix('advertiser')->name('advertiser.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');

        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register')->name('signup')->middleware(['regStatus']);
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware(['advertiser','checkStatus:advertiser'])->group(function () {

        Route::get('dashboard', 'AdvertiserController@dashboard')->name('dashboard');

        Route::get('profile', 'AdvertiserController@profile')->name('profile');
        Route::post('profile', 'AdvertiserController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdvertiserController@password')->name('password');
        Route::post('password', 'AdvertiserController@passwordUpdate')->name('password.update');

        Route::get('day-to-day/spent/logs', 'AdvertiserController@perDay')->name('day.logs');
        Route::get('day-to-day/spent/logs/search', 'AdvertiserController@perDaySearch')->name('day.search');
        Route::get('date-to-date/spent/logs/search', 'AdvertiserController@perDateSearch')->name('date.search');

        Route::get('transaction/logs', 'AdvertiserController@trxLogs')->name('trx.logs');
        Route::get('transaction/search', 'AdvertiserController@trxSearch')->name('trx.search');

        //advertise
        Route::get('/ad/all', 'AdController@index')->name('ad.all');
        Route::get('/ad/create', 'AdController@create')->name('ad.create');

        Route::post('/ad/store', 'AdController@store')->name('ad.store');
        Route::post('/ad/update/{id}', 'AdController@update')->name('ad.update');
        Route::get('/ad/details/{id}', 'AdController@adDetails')->name('ad.details');
        Route::post('/ad/remove/{id}', 'AdController@remove')->name('ad.remove');
        Route::get('/ad/report/', 'AdController@report')->name('ad.report');
        Route::get('/ad/report/search', 'AdController@reportSearch')->name('report.search');
        Route::get('/ad/search', 'AdController@adSearch')->name('ad.search');

        //Campaigns
        Route::get('/campaigns', 'CampaignsController@index')->name('campaigns.index');
		Route::get('/campaigns2', 'CampaignsController@index2')->name('campaigns.index2');
        Route::get('/campaigns/edit/{id}', 'CampaignsController@edit')->name('campaigns.edit');
        Route::post('/campaigns/create', 'CampaignsController@store')->name('campaigns.store');
        Route::get('/campaigns/status/', 'CampaignsController@changeStatus')->name('campaigns.status');
        //Campaigns Forms
        Route::get('/forms', 'FormsController@index')->name('forms.index');
        Route::post('/forms/create', 'FormsController@store')->name('forms.store');

        Route::get('/campaigns/demo', 'CampaignsdemoController@index')->name('campaigns.demo');
        Route::post('/campaigns/demo/create', 'CampaignsdemoController@store')->name('campaigns.store.demo');

        //price plans
        Route::get('/ad/price-plans', 'AdController@pricePlans')->name('price.plan');
        Route::get('/purchase/price-plans/{id}', 'AdController@purchasePlans')->name('purchase.plan');
        Route::post('/purchase/price-plans/', 'AdController@purchasePlansConfirm')->name('purchase.plan.confirm');

        //2FA
        Route::get('twofactor', 'AdvertiserController@show2faForm')->name('twofactor');
        Route::post('twofactor/enable', 'AdvertiserController@create2fa')->name('twofactor.enable');
        Route::post('twofactor/disable', 'AdvertiserController@disable2fa')->name('twofactor.disable');


        //Payments
        Route::get('payments', 'AdvertiserController@showPayments')->name('payments');
        Route::post('/payments/update', 'AdvertiserController@PaymentsUpdate')->name('payments.update');
        Route::get('/payments/createsession', 'AdvertiserController@PaymentsCreateSession')->name('payments.createsession');
        Route::get('/payments/success', 'AdvertiserController@PaymentsSuccessSession')->name('payments.success');
    /// invoice

	Route::get('invoices/{id}','AdvertiserController@showinvoices')->name('showinvoices');
    });
});

//advertiser deposit
Route::name('user.')->prefix('advertiser')->group(function () {
    Route::middleware(['checkStatus:advertiser','advertiser'])->group(function () {
        // Deposit
        Route::any('/deposit', 'Gateway\PaymentController@deposit')->name('deposit');
        Route::post('deposit/insert', 'Gateway\PaymentController@depositInsert')->name('deposit.insert');
        Route::get('deposit/preview', 'Gateway\PaymentController@depositPreview')->name('deposit.preview');
        Route::get('deposit/confirm', 'Gateway\PaymentController@depositConfirm')->name('deposit.confirm');
        Route::get('deposit/manual', 'Gateway\PaymentController@manualDepositConfirm')->name('deposit.manual.confirm');
        Route::post('deposit/manual', 'Gateway\PaymentController@manualDepositUpdate')->name('deposit.manual.update');
        Route::get('deposit/history', 'Advertiser\AdvertiserController@depositHistory')->name('deposit.history');

        Route::any('/payment/{id?}', 'Gateway\PaymentController@deposit')->name('payment');
        Route::post('price-plan/payment/insert', 'Gateway\PaymentController@depositInsert')->name('payment.insert');
        Route::get('price-plan/payment/preview', 'Gateway\PaymentController@depositPreview')->name('payment.preview');
        Route::get('price-plan/payment/confirmation', 'Gateway\PaymentController@depositConfirm')->name('payment.confirm');
        Route::get('price-plan/payment/manual', 'Gateway\PaymentController@manualDepositConfirm')->name('payment.manual.confirm');
        Route::post('price-plan/payment/manual', 'Gateway\PaymentController@manualDepositUpdate')->name('payment.manual.update');
        Route::get('price-plan/payment/history', 'Advertiser\AdvertiserController@depositHistory')->name('payment.history');

    });
});



Route::namespace('Publisher')->prefix('publisher')->name('publisher.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');

        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register')->name('signup')->middleware('regStatus');
        // Publisher Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware(['publisher','checkStatus:publisher'])->group(function () {
        Route::get('dashboard', 'PublisherController@dashboard')->name('dashboard');
        Route::get('report/day-to-day', 'PublisherController@perDay')->name('report.perDay');
        Route::get('ad/report/', 'PublisherController@adReport')->name('report.ad');
        Route::get('ad/report/search', 'PublisherController@adReportSearch')->name('report.date.search');

        Route::get('report/date/search', 'PublisherController@dateSearch')->name('date.search');

        Route::get('advertisements', 'AdvertiseController@advertises')->name('advertises');

        Route::get('/published/ads', 'AdvertiseController@publishedAd')->name('published.ad');
        Route::get('/published/ads/details/{id}', 'AdvertiseController@details')->name('published.ad.details');
        Route::get('transaction/search', 'PublisherController@trxSearch')->name('trx.search');

        Route::get('/domain', 'PublisherController@domainVerification')->name('domain.verify');
        Route::post('/domain/remove/{tracker}', 'PublisherController@domainRemove')->name('domain.remove');
        Route::post('/domain/update/{tracker}','PublisherController@updateDomainKeyword')->name('domain.update');
        Route::post('/domain/add', 'PublisherController@domainVerify')->name('domain.verify.update');
        Route::get('/domain/{tracker}/verification', 'PublisherController@domainVerifyAct')->name('domain.verify.action');
        Route::get('/domain/check/{tracker}', 'PublisherController@domainCheck')->name('domain.check');

        Route::get('profile', 'PublisherController@profile')->name('profile');
        Route::post('profile', 'PublisherController@profileUpdate')->name('profile.update');
        Route::get('password', 'PublisherController@password')->name('password');
        Route::post('password', 'PublisherController@passwordUpdate')->name('password.update');

        //2FA
        Route::get('twofactor', 'PublisherController@show2faForm')->name('twofactor');
        Route::post('twofactor/enable', 'PublisherController@create2fa')->name('twofactor.enable');
        Route::post('twofactor/disable', 'PublisherController@disable2fa')->name('twofactor.disable');

    });
    //  if publisher Admin
    Route::middleware(['publisher','checkStatus:publisher','publisherAdmin:publisher'])->group(function () {
        //Manage Campaigns for publiser admin
        Route::get('/campaigns/all','CampaignsController@index')->name('campaigns.all');
        Route::get('/campaigns/leads/export/{cid}/{aid}/{fid}','CampaignsController@export')->name('leads.export');
        Route::post('/campaigns/leads/importpreview/{cid}/{aid}/{fid}','CampaignsController@importpreview')->name('leads.importpreview');
        Route::post('/campaigns/leads/import/{cid}/{aid}/{fid}','CampaignsController@import')->name('leads.import');

        Route::get('/campaigns/lgenspend/export/{cid}/{aid}/{fid}','LgenSpendController@export')->name('campaigns.lgenspend.export');
        Route::post('/campaigns/lgenspend/import/{cid}/{aid}/{fid}','LgenSpendController@import')->name('campaigns.lgenspend.import');
        Route::post('/campaigns/lgenspend/importpreview/{cid}/{aid}/{fid}','LgenSpendController@importpreview')->name('campaigns.lgenspend.importpreview');
   });
});


//Publisher Widthdraw
Route::name('user.')->prefix('publisher')->group(function () {
    Route::middleware(['checkStatus:publisher','publisher'])->group(function () {

        // Withdraw
        Route::get('/withdraw', 'Publisher\PublisherController@withdrawMoney')->name('withdraw.methods');
        Route::post('/withdraw', 'Publisher\PublisherController@withdrawStore')->name('withdraw.money');
        Route::get('/withdraw/preview', 'Publisher\PublisherController@withdrawPreview')->name('withdraw.preview');
        Route::post('/withdraw/preview', 'Publisher\PublisherController@withdrawSubmit')->name('withdraw.submit');
        Route::get('/withdraw/history', 'Publisher\PublisherController@withdrawLog')->name('withdraw.history');

    });
});

Route::get('user/authorization/{guard}', 'AuthorizationController@authorizeForm')->name('authorization');
Route::get('resend-verify/{guard}', 'AuthorizationController@sendVerifyCode')->name('send_verify_code');
Route::post('verify-email/{guard}', 'AuthorizationController@emailVerification')->name('verify_email');
Route::post('verify-sms/{guard}', 'AuthorizationController@smsVerification')->name('verify_sms');
Route::post('verify-g2fa/{guard}', 'AuthorizationController@g2faVerification')->name('go2fa.verify');

Route::get('/contact', 'SiteController@contactPage')->name('home.contact');
Route::post('/contact', 'SiteController@contactSubmit')->name('contact.send');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');
Route::get('keywords', 'SiteController@keywords')->name('keywords');
Route::get('categorys/{id}', 'SiteController@categorys')->name('categorys');
Route::get('countries', 'SiteController@countries')->name('countries');

Route::get('/login','SiteController@showLoginForm')->name('login');
Route::get('/register','SiteController@showRegisterForm')->name('register');
Route::get('register-advertiser','SiteController@register_advertiser')->name('register_advertiser');
Route::get('/blog', 'SiteController@blogs')->name('blog');
Route::get('blog/{id}/{slug}', 'SiteController@blogDetails')->name('blog.details');

Route::get('/ads/{publisher}/{type}/{current}', 'VisitorController@getAdvertise')->name('adsUrl');
Route::get('/ad-clicked/{publisher}/{track_id}', 'VisitorController@adClicked')->name('adClicked');
Route::get('company/plicy/{id}/{slug}', 'SiteController@policy')->name('policy');
Route::get('privacy-policy', 'SiteController@privacy_policy')->name('privacy_policy');
Route::get('terms-condition', 'SiteController@terms_condition')->name('terms_condition');

Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholderImage');
Route::get('new-home', 'SiteController@home2')->name('new-home');
Route::get('/old-home', 'SiteController@index')->name('old-home');
Route::get('/{slug}', 'SiteController@pages')->name('pages');
Route::get('/', 'SiteController@home2')->name('home');

Route::get('/campaign_form/{publisher_id}/{style}','CampaignFormController@campaign_form_view')->name('front_campaign_form.view');
