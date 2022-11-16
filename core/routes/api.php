<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/campaign_form/find/{website}/{publisher_id}','CampaignFormController@campaign_form_find')->name('front_campaign_form.find');
Route::post('/campaign_form','CampaignFormController@campaign_form_save')->name('front_campaign_form.save');
