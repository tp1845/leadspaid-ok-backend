<?php

namespace App\Http\Controllers\Publisher\Auth;


use App\UserLogin;
use App\GeneralSetting;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Publisher;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{

    protected $redirectTo = 'publisher/dashboard';

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
        return view($this->activeTemplate . 'publisher.auth.register', compact('reference', 'page_title','country_code'));
    }

    public function showRegistrationForm()
    {
        $page_title = "Publisher Sign Up";
        $info = json_decode(json_encode(getIpInfo()), true);
        $country_code = @implode(',', $info['code']);
        $countries = Country::all();
        $type = 'Publisher';
        return view($this->activeTemplate . 'register', compact('page_title','country_code','countries','type'));
    }


    public function register(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|unique:publishers|min:6',
            'email' => 'required|string|email|max:160|unique:publishers',
            'username' => 'required|unique:publishers',
            'password' => 'required|string|min:6|confirmed'
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


    public function checkValidCode_pub($user, $code, $add_min = 10000)
    {
        if (!$code) return false;
        if (!$user->ver_code_send_at) return false;
        if ($user->ver_code_send_at->addMinutes($add_min) < Carbon::now()) return false;
        if ($user->ver_code !== $code) return false;
        return true;
    }

    public function varify_pub(Request $request){
        $data=$this->decode_arr($request->code_verifiyed);
        $user = Publisher::findOrFail($data['userid']);
        if (!$this->checkValidCode_pub($user, $user->ver_code)) {
            // First Time
            $page_title = "User Activation";
            $title='Thank you for verifying your account.';
            $sub_title='Your account is pending approval. <br> You will receive an email once it is activated.';
            $user->ver_code = $data['code'];
            $user->ver_code_send_at = Carbon::now();
            if($user->ev == 0){
                $user->ev = 1;
                $user->status = 0;
                $user->save();
            }
           send_email_publisher($user, 'EVER_CODE', 0, 'admin_on_publisher_registered');
            return view($this->activeTemplate . 'email-verifyed', compact('page_title', 'title', 'sub_title'));
        } else {
            $page_title = "User Already Activated";
            $title='Your email is already verified.';
            $sub_title='Your account is pending approval. <br>You will receive an email once it is activated.';
            return view($this->activeTemplate . 'email-verifyed', compact('page_title', 'title', 'sub_title'));
        }
    }

    public function encode_arr($data) {
        return base64_encode(serialize($data));
    }

    public  function decode_arr($data) {
        return unserialize(base64_decode($data));
    }

    public function resend_verification_code(Request $request){
        $user = Publisher::findOrFail($request['id']);
        if(!$user){ return response()->json(['success'=>false]); }
        $code=[ 'code' =>verificationCode(6), 'userid'=>$user->id ];
        $useremail=$user->email;
        $urll= url('');
        $link=$urll.'/publisher/register-veryfy/?code_verifiyed='.$this->encode_arr($code);
        // custom code email send
        send_email_publisher($user, 'EVER_CODE',$link, 'verify');
        return response()->json(['success'=>true]);
    }

    public function register_publisher(Request $request){

        $request->validate([
            'email' => 'required|string|email|max:160|unique:publishers',
            'password' => 'required|string|min:6|confirmed',
          ], [
            'email.required' => 'A email is required',
            'email.email' => 'Please specify a real email',
            'email.unique' => 'An Publisher with email id ('.$request->email.') already exist.<br/> Please <a href ="https://leadspaid.com/login-publisher"><u> Click here</u></a> to login or use a different email address to register.',
            'password.required' => 'Password is required.',
          ]);


        event(new Registered($user = $this->create_pub($request->all())));
        // $this->guard()->login($user);
        $code=[
            'code' =>verificationCode(6),
            'userid'=>$user->id
        ];
        $useremail=$user->email;
        $urll= url('');
        $link=$urll.'/publisher/register-veryfy/?code_verifiyed='.$this->encode_arr($code);
        // custom code email send
        send_email_publisher($user, 'EVER_CODE',$link, 'verify');
        $page_title = "Thanks email";
        return view($this->activeTemplate . 'thanks-email', compact('page_title','useremail'));
    }

    protected function create_pub(array $data)
    {
        $gnl = GeneralSetting::first();
        $pub = new Publisher ();
        $pub->name = $data['name'];
        $pub->email = $data['email'];
        $username=strstr($data['email'],'@',true);
        $pub->username = $username;
        $pub->country = $data['country'];
        $pub->company_name = $data['company_name'];
        $mobile = preg_replace('/\D/', '', $data['country_code'].$data['phone']);
        $pub->phone = $mobile;
        $pub->app_methods = $data['app_methods'];
        $pub->Website = $data['website'];
        $pub->apps = $data['apps'];
        $pub->country_code = $data['country_code'];
        $pub->password = Hash::make($data['password']);
        $pub->status = 0;
        $pub->ev = 0;
       // $pub->sv = 0;
        // $pub->ev = $gnl->ev==0 ? 1 : 0;
        $pub->sv = $gnl->sv==0 ? 1 : 0;
        $pub->ts = 0;
        $pub->tv = 0;
        $pub->save();
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
        return $pub;
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

        $pub = new Publisher ();
        $pub->name = $data['name'];
        $pub->email = $data['email'];
        $pub->username = $data['username'];
        $pub->country = $data['country'];
        $pub->city = $data['city'];
        $pub->company_name = $data['company_name'];
        $pub->postal_code = $data['postal_code'];
        $pub->phone = $data['country_code'].$data['phone'];
        $pub->country_code = $data['country_code'];
        $pub->password = Hash::make($data['password']);

        $pub->status = 1;
        $pub->ev = $gnl->ev==0 ? 1 : 0;
        $pub->sv = $gnl->sv==0 ? 1 : 0;
        $pub->ts = 0;
        $pub->tv = 1;
        $pub->save();


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
        $userLogin->publisher_id = $pub->id;
        $userLogin->user_ip =  $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();


        return $pub;
    }

    public function registered()
    {
        return redirect()->route('publisher.dashboard');
    }

    protected function guard()
    {
        return Auth::guard('publisher');
    }

}
