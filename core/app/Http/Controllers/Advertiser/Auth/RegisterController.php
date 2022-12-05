<?php

namespace App\Http\Controllers\Advertiser\Auth;

use Carbon\Carbon;
use App\UserLogin;
use App\Advertiser;
use App\Country;
use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'advertiser/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('regStatus')->except('registrationNotAllowed');

        $this->activeTemplate = activeTemplate();
    }

    public function referralRegister($reference)
    {
        $page_title = "Sign Up";
        session()->put('reference', $reference);
        $info = json_decode(json_encode(getIpInfo()), true);
        $country_code = @implode(',', $info['code']);
        return view($this->activeTemplate . 'advertiser.auth.register', compact('reference', 'page_title','country_code'));
    }

    public function showRegistrationForm()
    {
        $page_title = "Advertiser Sign Up";
        $info = json_decode(json_encode(getIpInfo()), true);
        $country_code = @implode(',', $info['code']);
        $countries = Country::all();
        $type = 'Advertiser';
        return view($this->activeTemplate. 'register', compact('page_title','country_code', 'countries','type'));
    }


    public function register(Request $request)
    {
 
        $request->validate([
            'mobile' => 'required|string|unique:advertisers|min:6',
            'email' => 'required|string|email|max:160|unique:advertisers',
            'username' => 'required|unique:advertisers|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if (isset($request->captcha)) {
            if (!captchaVerify($request->captcha, $request->captcha_secret)) {
                $notify[] = ['error', "Invalid Captcha"];
                return back()->withNotify($notify)->withInput();
            }
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    public function varify_adv(Request $request){
        
        $data=$this->decode_arr($request->code_verifiyed);
        $user =UserLogin::findOrFail($data['userid']);
        //$user = $this->guard()->user()->find($data['userid']);

            $user['ver_code'] = $data['code'];
            $user['ver_code_send_at'] = Carbon::now();
            $user['status'] = 0;
            DB::update('update advertisers set ver_code = ?,ver_code_send_at=?,status=? where id = ?',[$user['ver_code'],$user['ver_code_send_at'],$user['status'],$data['userid']]);
            send_email_adv_admin($user, 'EVER_CODE',$user['username']);
            $page_title = "user activate";
            return view($this->activeTemplate . 'email-verifyed', compact('page_title'));
       
    
    public function encode_arr($data) {
        return base64_encode(serialize($data));
    }
    
    public  function decode_arr($data) {
        return unserialize(base64_decode($data));
    }

    public function register_advertiser(Request $request){ 

        event(new Registered($user = $this->create_adv($request->all())));
        $this->guard()->login($user);
        $code=[
            'code' =>verificationCode(6),
            'userid'=>$user->id
        ];
        $urll= url('');
        $link=$urll.'/advertiser/register-veryfy/?code_verifiyed='.$this->encode_arr($code);
        // custom code email send
        send_email_adv($user, 'EVER_CODE',$link);
        $page_title = "Thanks email";
        return view($this->activeTemplate . 'thanks-email', compact('page_title'));
    }

    protected function create_adv(array $data)
    {

        $gnl = GeneralSetting::first();

        $adv = new Advertiser ();
        $adv->name = $data['name'];
        
        $adv->email = $data['email'];
        $username=strstr($data['email'],'@',true);
        $adv->username = $username;
        $adv->country = $data['country'];
        
        $adv->company_name = $data['company_name'];
        
        
        $mobile = preg_replace('/\D/', '', $data['country_code'].$data['phone']);
        $adv->mobile = $mobile;
        $adv->product_services = $data['product_services'];
        $adv->Website = $data['Website'];
        $adv->Social = $data['Social'];
        $adv->country_code = $data['country_code'];
        $adv->password = Hash::make($data['password']);
        $adv->status = 0;
        $adv->ev = $gnl->ev==0 ? 1 : 0;
        $adv->sv = $gnl->sv==0 ? 1 : 0;
        $adv->ts = 0;
        $adv->tv = 1;
        $adv->save();
        $ip = $_SERVER["REMOTE_ADDR"];
        $exist = UserLogin::where('user_ip',$ip)->first();
        $userLogin = new UserLogin();
        if ($exist) {
            $userLogin->longitude =  $exist->longitude;
            $userLogin->latitude =  $exist->latitude;
            $userLogin->location =  $exist->location;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country =  $exist->country;
        }else{
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude =  @implode(',',$info['long']);
            $userLogin->latitude =  @implode(',',$info['lat']);
            $userLogin->location =  @implode(',',$info['city']) . (" - ". @implode(',',$info['area']) ."- ") . @implode(',',$info['country']) . (" - ". @implode(',',$info['code']) . " ");
            $userLogin->country_code = @implode(',',$info['code']);
            $userLogin->country =  @implode(',', $info['country']);
        }

        /*$userAgent = osBrowser();
        $userLogin->advertiser_id = $adv->id;
        $userLogin->user_ip =  $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save(); */

        return $adv;
    }

    public function user_varify(Request $request)
    {




    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $gnl = GeneralSetting::first();

        $adv = new Advertiser ();
        $adv->name = $data['name'];
        
        $adv->email = $data['email'];
        $adv->username = $data['username'];
        $adv->country = $data['country'];
        $adv->city = $data['city'];
        $adv->company_name = $data['company_name'];
        $adv->billed_to = $data['billed_to'];
        $adv->postal_code = $data['postal_code'];
        $mobile = preg_replace('/\D/', '', $data['country_code'].$data['mobile']);
        $adv->mobile = $mobile;
        $adv->country_code = $data['country_code'];
        $adv->password = Hash::make($data['password']);

        $adv->status = 1;
        $adv->ev = $gnl->ev==0 ? 1 : 0;
        $adv->sv = $gnl->sv==0 ? 1 : 0;
        $adv->ts = 0;
        $adv->tv = 1;
        $adv->save();


        $ip = $_SERVER["REMOTE_ADDR"];
        $exist = UserLogin::where('user_ip',$ip)->first();
        $userLogin = new UserLogin();
        if ($exist) {
            $userLogin->longitude =  $exist->longitude;
            $userLogin->latitude =  $exist->latitude;
            $userLogin->location =  $exist->location;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country =  $exist->country;
        }else{
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude =  @implode(',',$info['long']);
            $userLogin->latitude =  @implode(',',$info['lat']);
            $userLogin->location =  @implode(',',$info['city']) . (" - ". @implode(',',$info['area']) ."- ") . @implode(',',$info['country']) . (" - ". @implode(',',$info['code']) . " ");
            $userLogin->country_code = @implode(',',$info['code']);
            $userLogin->country =  @implode(',', $info['country']);
        }

        $userAgent = osBrowser();
        $userLogin->advertiser_id = $adv->id;
        $userLogin->user_ip =  $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();

        return $adv;
    }

    public function registered()
    {


        return redirect()->route('advertiser.dashboard');
    }

    protected function guard()
    {
        return Auth::guard('advertiser');
    }

}
