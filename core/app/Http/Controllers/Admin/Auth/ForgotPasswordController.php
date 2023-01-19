<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\AdminPasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

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
        $this->middleware('admin.guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        $page_title = 'Account Recovery';
        return view('admin.auth.passwords.email', compact('page_title'));
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);



        $user = Admin::where('email', $request->email)->first();
        if ($user == null) {
            return back()->withErrors(['Email Not Available']);
        }

        $code = verificationCode(6);
        $adminPasswordReset = new AdminPasswordReset();
        $adminPasswordReset->email = $user->email;
        $adminPasswordReset->token = $code;
        $adminPasswordReset->status = 0;
        $adminPasswordReset->created_at = date("Y-m-d h:i:s");
        $adminPasswordReset->save();

        $userIpInfo = getIpInfo();
        $userBrowser = osBrowser();
        send_email($user, 'PASS_RESET_CODE', [
            'code' => $code,
            'operating_system' => $userBrowser['os_platform'],
            'browser' => $userBrowser['browser'],
            'ip' => $userIpInfo['ip'],
            'time' => $userIpInfo['time']
        ]);

        $page_title = 'Account Recovery';
        $notify[] = ['success', 'Password reset email sent successfully'];
        return view('admin.auth.passwords.code_verify', compact('page_title', 'notify'));
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['code.*' => 'required']);
        $notify[] = ['success', 'You can change your password.'];

        $code =  str_replace(',','',implode(',',$request->code));

        return redirect()->route('admin.password.change-link', $code)->withNotify($notify);
    }
	
	public function resetpassword($id){
     $admin = Admin::where('id', '=', $id)->first();
     if( $admin->status==3){
      return view('admin.auth.passwords.new-resetpassword',compact('id') );
      }else{
        $notify[] = ['success', 'Account is activated already'];
        $url=url('/').'/admin';
          return redirect($url)->withNotify($notify);
      } 
   }
    
  public function updatepassword(Request $request){

       
        $admin = Admin::where('id', '=', $request->id)->first();

       if(Hash::check($request->old_password, $admin->password)){

          Admin::where('id',$request->id)->update(['password'=>Hash::make($request->new_password),'status'=>1]);
          $notify[] = ['success', 'Password update successfully '];
          $url=url('/').'/admin';
          return redirect($url)->withNotify($notify);
       }else{
          $notify[] = ['error', 'Old password is invalid'];
          return back()->withNotify($notify);
       }

  }
	
	
	
}
