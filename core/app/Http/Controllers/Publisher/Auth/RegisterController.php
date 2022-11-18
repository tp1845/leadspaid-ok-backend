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
        $customMessages = [
            'name.required' => 'Fill your full name',
            'company_name.min' => 'Fill your Company name in full. Otherwise leave it blank if you want to use your individual name',
            'city.min' => 'Fill city',
        ];
        $request->validate([
            'company_name' => 'nullable|string|max:60|min:3',
            'name' => 'sometimes|required|string|max:60|min:3|regex:/^[a-z A-Z]+$/u',
            'phone' => 'required|string|unique:publishers|min:6',
            'email' => 'required|string|email|max:160|unique:publishers',
            'city' => 'required|string|max:160|min:2',
            'country' => 'required|string|max:160',
            'postal_code' => 'required|string|max:160',
            'username' => 'required|alpha_num|unique:publishers|min:6',
            'password' => 'required|string|min:6|confirmed',
            'captcha' => 'sometimes|required'
        ], $customMessages);
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
