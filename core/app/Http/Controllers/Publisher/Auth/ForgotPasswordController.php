<?php

namespace App\Http\Controllers\Publisher\Auth;

use App\Admin;
use App\AdminPasswordReset;
use App\Http\Controllers\Controller;
use App\Publisher;
use App\PublisherPasswordReset;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
        |--------------------------------------------------------------------------
        | Password Reset Controller
        |--------------------------------------------------------------------------
        |
        | This controller is responsible for handling password reset emails and
        | includes a trait which assists in sending these notifications from
        | your application to your users. Feel free to explore this trait.
        |
        */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('publisher.guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        $page_title = 'Account Recovery';
        return view(activeTemplate().'publisher.auth.passwords.email', compact('page_title'));
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('publishers');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);



        $user = Publisher::where('email', $request->email)->first();
        if ($user == null) {
            return back()->withErrors(['Email Not Available']);
        }

        $code = verificationCode(6);

        PublisherPasswordReset::create([
            'email' => $user->email,
            'token' => $code,
            'status' => 0,
            'created_at' => date("Y-m-d h:i:s")
        ]);

        $userAgent = getIpInfo();
        $os = osBrowser();
        send_email($user, 'PASS_RESET_CODE', [
            'code' => $code,
            'operating_system' => $os['os_platform'],
            'browser' => $os['browser'],
            'ip' => $userAgent['ip'],
            'time' => $userAgent['time']
        ]);

        $email = $user->email;
        $page_title = 'Account Recovery';
        $notify[] = ['success', 'Password reset email sent successfully'];
        return view(activeTemplate().'publisher.auth.passwords.code_verify', compact('page_title', 'notify','email'));
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['code.*' => 'required']);
        $notify[] = ['success', 'You can change your password.'];

        $code =  str_replace(',','',implode(',',$request->code));

        return redirect()->route('publisher.password.change-link', $code)->withNotify($notify);
    }
}
