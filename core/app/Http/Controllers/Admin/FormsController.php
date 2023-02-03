<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\campaign_forms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
class FormsController extends Controller
{
    public function index()
    {
        $advertiserid = '';
        $searchtype = '!=';
        if (isset($_GET['advertiser'])){
            $searchtype = '=';
            $advertiserid = $_GET['advertiser'];
        }
        $forms = DB::table('campaign_forms')
            ->where('campaign_forms.status','1')
            ->leftJoin('advertisers', 'campaign_forms.advertiser_id', '=', 'advertisers.id')
            ->where('campaign_forms.advertiser_id', $searchtype,$advertiserid)
            ->select('campaign_forms.*', 'advertisers.name as aname')
            ->get();
        $companies = DB::table('campaign_forms')
            ->leftJoin('advertisers', 'campaign_forms.advertiser_id', '=', 'advertisers.id')
            ->where('advertisers.company_name','!=','')
            ->groupBy('advertisers.company_name')
            ->get();
            
        $page_title = 'All Active Forms';
        $empty_message = "No Forms";
         return view('admin.forms.index', compact('forms', 'page_title', 'empty_message','companies'));
    }
    public function store(Request $request)
    {
        $user = Auth::guard('advertiser')->user()->id;
        $request->validate(
            [

            ]
        );

        $validator = Validator::make(
            $request->all(), [
                               'form_name' => 'required',
                               'form_title' => 'required',
                               'company_logo' => 'mimes:jpeg,jpg,png,gif|max:2048',
                               'video_1' => 'mimes:mp4,mov,ogg,qt | max:20000',
                               'video_2' => 'mimes:mp4,mov,ogg,qt | max:20000',
                               'video_3' => 'mimes:mp4,mov,ogg,qt | max:20000',
                               'image_1' => 'mimes:jpeg,jpg,png,gif|max:2048',
                               'image_2' => 'mimes:jpeg,jpg,png,gif|max:2048',
                               'image_3' => 'mimes:jpeg,jpg,png,gif|max:2048',
                           ]
        );

        if($validator->fails())
        {
            return response()->json(
                [
                    'success' => false,
                    'form_id' => false,
                    'form_name' => $data['error'] = $validator->errors()->first(),
                ]
            );;
        }
        else
        {
            $campaign_forms                = new campaign_forms();
            $campaign_forms->advertiser_id = $user;
            $campaign_forms->form_name     = $request->form_name;
            $campaign_forms->company_name  = $request->company_name;
            $campaign_forms->company_logo  = $request->company_logo;
            $campaign_forms->form_title    = $request->form_title;
            $campaign_forms->offer_desc    = $request->offer_desc;
            $campaign_forms->youtube_1     = $request->youtube_1;
            $campaign_forms->youtube_2     = $request->youtube_2;
            $campaign_forms->youtube_3     = $request->youtube_3;
            $campaign_forms->image_1 = $request->image_1;
            $campaign_forms->image_2 = $request->image_2;
            $campaign_forms->image_3 = $request->image_3;
            $campaign_forms->field_1 = $request->field_1;
            $campaign_forms->field_2 = $request->field_2;
            $campaign_forms->field_3 = $request->field_3;
            $campaign_forms->field_4 = $request->field_4;
            $campaign_forms->field_5 = $request->field_5;

            $path = 'assets/images/campaign_forms';
            if($request->file('company_logo'))
            {
                $campaign_forms->company_logo = uploadImage($request->company_logo, $path);
            }
            if($request->file('image_1'))
            {
                $campaign_forms->image_1 = uploadImage($request->image_1, $path);
            }
            if($request->file('image_2'))
            {
                $campaign_forms->image_2 = uploadImage($request->image_2, $path);
            }
            if($request->file('image_3'))
            {
                $campaign_forms->image_3 = uploadImage($request->image_3, $path);
            }

            $video_path = 'assets\images\campaign_forms\videos';
            if($request->file('video_1'))
            {
                $campaign_forms->video_1 = uploadVideo($request->video_1, $video_path);
            }
            if($request->file('video_2'))
            {
                $campaign_forms->video_2 = uploadVideo($request->video_2, $video_path);
            }
            if($request->file('video_3'))
            {
                $campaign_forms->video_3 = uploadVideo($request->video_3, $video_path);
            }

            if($campaign_forms->save())
            {
                return response()->json(
                    [
                        'success' => true,
                        'form_id' => $campaign_forms->id,
                        'form_name' => $campaign_forms->form_name,
                    ]
                );;
            }
            else
            {
                return response()->json(
                    [
                        'success' => false,
                        'form_id' => false,
                        'form_name' => 'Try Again!',
                    ]
                );;
            }
        }
    }
    public function form_complete_delete($id)
    {
        campaign_forms::where('id', $id)->delete();
        $notify[] = ['success', 'Form deleted successfully'];
        return redirect()->back()->withNotify($notify);
    }
}
