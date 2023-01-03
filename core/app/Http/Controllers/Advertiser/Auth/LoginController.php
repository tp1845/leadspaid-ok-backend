<?php
namespace App\Http\Controllers\Advertiser\Auth;

use App\Advertiser;
use App\UserLogin;
use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = 'advertiser/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('advertiser.guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $page_title = "Advertiser Login";
        return view('templates.basic.advertiser.auth.login', compact('page_title'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('advertiser');
    }

    public function username()
    {
         $field = (filter_var(request()->username, FILTER_VALIDATE_EMAIL) || !request()->username) ? 'email' : 'username';
        request()->merge([$field => request()->username]);
        return $field;
    }

    public function login(Request $request)
    {
        $user = Advertiser::whereUsername($request->username)->first();
        $this->validateLogin($request);
        if(isset($user)&&$user->status == 2){
             $notify[]=['error','Sorry! You have\'ve been banned by Admin'];
             return back()->withNotify($notify);
        }
        $lv = getLatestVersion();
        $gnl = GeneralSetting::first();
        if (systemDetails()['version'] < @json_decode($lv)->version) {
            $gnl->sys_version = $lv;
        } else {
            $gnl->sys_version = null;
        }
        $gnl->save();

        if(isset($request->captcha)){
            if(!captchaVerify($request->captcha, $request->captcha_secret)){
                $notify[] = ['error',"Invalid Captcha"];
                return back()->withNotify($notify)->withInput();
            }
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $customRecaptcha = \App\Extension::where('act', 'custom-captcha')->where('status', 1)->first();
        $validation_rule = [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ];

        if ($customRecaptcha) {
            $validation_rule['captcha'] = 'required';
        }

        $request->validate($validation_rule);

    }


    public function logout(Request $request)
    {
        $this->guard('advertiser')->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/login-advertiser');
    }

    public function resetPassword()
    {
        $page_title = 'Account Recovery';
        return view('templates.basic.advertiser.auth.reset', compact('page_title'));
    }

    public function authenticated()
    {

        $user = auth()->guard('advertiser')->user();

        if ($user->ev == 0) {
            $this->guard()->logout();
            // return redirect()->route('login_advertiser')->withErrors(['Please Verify Your Account']);
            $page_title = 'verify Email';
            return view('templates.basic.advertiser.auth.login-verify', compact('page_title', 'user' ));
        }

        if ($user->status == 0) {
            $this->guard()->logout();
            return redirect()->route('advertiser.login')->withErrors(['Your account has been banned by admin']);
        }

        $user->tv = $user->ts == 1 ? 0 : 1;
        $user->save();


        $user->tv = $user->ts == 1 ? 0 : 1;
        $user->save();
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
        $userLogin->advertiser_id = $user->id;
        $userLogin->user_ip =  $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();

         return redirect('/advertiser/campaigns');
    }

}
