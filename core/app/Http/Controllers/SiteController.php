<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Keyword;
use App\Frontend;
use App\Country;
use App\Language;
use Carbon\Carbon;
use App\SupportTicket;
use App\SupportMessage;
use App\SupportAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function index()
    {
        $count = Page::where('tempname', $this->activeTemplate)->where('slug', 'home')->count();
        if($count == 0)
        {
            $page           = new Page();
            $page->tempname = $this->activeTemplate;
            $page->name     = 'HOME';
            $page->slug     = 'home';
            $page->save();
        }

        $data['page_title'] = 'Home';
        $data['sections']   = Page::where('tempname', $this->activeTemplate)->where('slug', 'home')->firstOrFail();

        return view($this->activeTemplate . 'home-leadpaid', $data);
    }

    public function pages($slug)
    {
        $page               = Page::where('tempname', $this->activeTemplate)->where('slug', $slug)->firstOrFail();
        $data['page_title'] = $page->name;
        $data['sections']   = $page;

        return view($this->activeTemplate . 'pages', $data);
    }

    public function contactPage()
    {
        $page_title = 'Contact';
        return view($this->activeTemplate . 'sections.contact-us', compact('page_title'));
    }

    public function contactSubmit(Request $request)
    {
         if($request->email)
         {
            $name    = $request->name;
            $email   = $request->email;
            $company   = $request->company;
            $phone     = $request->country_code . '-' . $request->phone;
            $message     = $request->message;
            send_email_contact_admin($name,'EVER_CODE',$email,$company,$phone,$message);
            $page_title = "Thanks email";
            $useremail = $request->email;
            return view($this->activeTemplate . 'thanks-email-contact', compact('page_title','useremail'));
         }
    }

    public function viewTicket($ticket)
    {
        $page_title = "Support Tickets";
        $my_ticket  = SupportTicket::where('ticket', $ticket)->latest()->first();
        $messages   = SupportMessage::where('supportticket_id', $my_ticket->id)->latest()->get();
        if(auth()->guard('advertiser')->user() != null)
        {
            $user = auth()->guard('advertiser')->user();
            $view = 'advertiser';
        }
        else
        {
            $user = auth()->guard('publisher')->user();
            $view = 'publisher';
        }

        return view($this->activeTemplate . 'user.support.view', compact('my_ticket', 'messages', 'page_title', 'user'));

    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if(!$language)
        {
            $lang = 'en';
        }
        session()->put('lang', $lang);

        return redirect()->back();
    }

    public function blogs()
    {
        $page_title = 'Blogs';
        $blogs      = Frontend::where('data_keys', 'blog.element')->latest()->paginate(15);

        return view($this->activeTemplate . 'blog', compact('blogs', 'page_title'));
    }

    public function showLoginForm()
    {
        $page_title = 'Login';

        return view($this->activeTemplate . 'login', compact('page_title'));
    }

    public function showRegisterForm()
    {
        $page_title   = "Sign Up";
        $info         = json_decode(json_encode(getIpInfo()), true);
        $country_code = @implode(',', $info['code']);
        $countries    = Country::all();
        return view($this->activeTemplate . 'register', compact('page_title', 'country_code', 'countries'));
    }

    public function keywords()
    {
        $keywords = Keyword::all();
        $key      = [];
        foreach($keywords as $keyword)
        {
            $key[] = $keyword->keywords;
        }

        return response()->json($key);
    }

    public function categorys($id)
    {
        $id        = explode(',', $id);
        $categorys = [
            'test 1',
            'test 2',
            'test 3',
            'test 4',
            'test 5',
        ];

        $value = [];
        foreach($id as $k => $category)
        {
            $cat     = trim($category);
            $value[] = $cat;
        }

        $key = [];
        foreach($categorys as $k => $category)
        {
            if(!in_array($category, $value))
            {
                $key[] = $category;
            }

        }

        return response()->json($key);
    }

    public function countries()
    {
        $countries = \App\Country::all();
        $key       = [];
        foreach($countries as $country)
        {
            $key[] = $country->country_name;
        }

        return response()->json($key);

    }

    public function blogDetails($id, $slug)
    {
        $blog        = Frontend::findOrFail($id);
        $recentPosts = Frontend::where('data_keys', 'blog.element')->where('id', '!=', $id)->latest()->take(10)->get();
        $stat        = Frontend::where('data_keys', 'overview.content')->first();
        $page_title  = $blog->data_values->title;

        return view($this->activeTemplate . 'blogDetails', compact('blog', 'recentPosts', 'page_title', 'stat'));
    }


    public function placeholderImage($size = null)
    {
        if($size != 'undefined')
        {
            $size      = $size;
            $imgWidth  = explode('x', $size)[0];
            $imgHeight = explode('x', $size)[1];
            $text      = $imgWidth . '×' . $imgHeight;
        }
        else
        {
            $imgWidth  = 150;
            $imgHeight = 150;
            $text      = 'Undefined Size';
        }
        $fontFile = realpath('assets/font') . DIRECTORY_SEPARATOR . 'RobotoMono-Regular.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if($fontSize <= 9)
        {
            $fontSize = 9;
        }
        if($imgHeight < 100 && $fontSize > 30)
        {
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox    = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    public function policy($id)
    {
        $policy     = Frontend::findOrFail($id);
        $page_title = $policy->data_values->heading;
        return view($this->activeTemplate . 'sections.policy', compact('policy', 'page_title'));
    }

    public function privacy_policy()
    {
        $id = 137;
        $policy     = Frontend::findOrFail($id);
        $page_title = $policy->data_values->heading;
        return view($this->activeTemplate . 'sections.policy', compact('policy', 'page_title'));
    }
    public function privacy_policy_old()
    {
        $id = 127;
        $policy     = Frontend::findOrFail($id);
        $page_title = $policy->data_values->heading;
        return view($this->activeTemplate . 'sections.policy', compact('policy', 'page_title'));
    }

   public function register_advertiser(){
        $user = Auth::guard('advertiser')->user();
        if($user){  $notify[] = ['success', 'Your are already registered.'];  return redirect()->route('advertiser.dashboard')->withNotify($notify); }
        $data['page_title'] = 'Home';
        $page_title="Sign Up";
        $info         = json_decode(json_encode(getIpInfo()), true);
        $country_code = @implode(',', $info['code']);
        $countries    = Country::all();
        return view($this->activeTemplate . 'advertiser/register-advertiser',compact('data','page_title','country_code','countries'));
   }

   public function login_advertiser(){
        $user = Auth::guard('advertiser')->user();
        if($user){  $notify[] = ['success', 'Your are already login.'];  return redirect()->route('advertiser.dashboard')->withNotify($notify); }
        $data['page_title'] = 'Home';
        $page_title="Login";
        return view($this->activeTemplate . 'advertiser/login-advertiser',compact('data','page_title'));
   }

   public function home2()
    {
        $data['page_title'] = 'New Home';
        return view($this->activeTemplate . 'home-leadpaid2', $data);
    }

    public function home3()
    {
        $data['page_title'] = 'New Home 3';
        return view($this->activeTemplate . 'home-leadpaid3', $data);
    }

    public function home4()
    {
        $data['page_title'] = 'New Home 4';
        return view($this->activeTemplate . 'home-leadpaid4', $data);
    }
    public function home5()
    {
        $data['page_title'] = 'New Home 5';
        return view($this->activeTemplate . 'home-leadpaid5', $data);
    }
    public function home6()
    {
        $data['page_title'] = 'New Home 6';
        return view($this->activeTemplate . 'home-leadpaid6', $data);
    }
    public function homelive()
    {
        $data['page_title'] = 'New Home 6';
        return view($this->activeTemplate . 'home-leadpaid-live', $data);
    }
}
