<?php

namespace App\Http\Controllers\Advertiser\Auth;

use App\UserLogin;
use App\Advertiser;
use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;


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
        return view($this->activeTemplate . 'advertiser.auth.register', compact('page_title','country_code'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validate = Validator::make($data, [
            'company_name' => 'nullable|string|max:60',
            'name' => 'sometimes|required|string|max:60',
            'mobile' => 'required|string|unique:advertisers',
            'billed_to' => 'sometimes|required|string|max:60',
            'email' => 'required|string|email|max:160|unique:advertisers',
            'city' => 'required|string|max:160',
            'country' => 'required|string|max:160',
            'postal_code' => 'required|string|max:160',
            'username' => 'required|alpha_num|unique:advertisers|min:6',
            'password' => 'required|string|min:6|confirmed',
            'captcha' => 'sometimes|required'
        ]);

        return $validate;
    }

    public function register(Request $request)
    {
        $this->validator($request->all());
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

        $adv = new Advertiser ();
        $adv->name = $data['name'];
        $adv->email = $data['email'];
        $adv->username = $data['username'];
        $adv->country = $data['country'];
        $adv->city = $data['city'];
        $adv->company_name = $data['company_name'];
        $adv->billed_to = $data['billed_to'];
        $adv->postal_code = $data['postal_code'];
        $adv->mobile = $data['country_code'].$data['mobile'];
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
