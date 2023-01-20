<?php

namespace App\Http\Controllers\Admin;

use App\EarningLogs;
use App\Publisher;
use App\Transaction;
use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PublisherAd;
use Illuminate\Support\Facades\Hash;
use App\Country;
use App\Admin;

class PublisherController extends Controller
{
    public function allPublisher()
    {
        $page_title = 'All publishers';
        $empty_message = 'No data';
        $publishers = Publisher::latest()->paginate(15);
        return view('admin.publisher.all',compact('page_title','empty_message','publishers'));
    }
    public function allActivePublisher()
    {
        $page_title = 'All active advertiser';
        $empty_message = 'No advertiser';
        $publishers = Publisher::whereStatus(1)->latest()->paginate(15);
        return view('admin.publisher.all',compact('page_title','empty_message','publishers'));
    }
    public function publisherDetails($id)
    {
        $page_title = 'Publisher details';
        $publisher = Publisher::findOrFail($id);
        $earningLog = EarningLogs::wherePublisherId($id)->sum('amount');
        $ads = PublisherAd::wherePublisherId($id)->get();
        $totalTransaction = Transaction::where('publisher_id',$publisher->id)->sum('amount');
        return view('admin.publisher.details',compact('publisher','page_title','totalTransaction','earningLog','ads'));
    }


    public function loginHistory($id)
    {
        $user = Publisher::findOrFail($id);
        $page_title = 'Publisher Login History - ' . $user->username;
        $empty_message = 'No users login found.';
        $login_logs = $user->login_logs()->latest()->paginate(getPaginate());
        return view('admin.publisher.logins', compact('page_title', 'empty_message', 'login_logs'));
    }

    public function publisherUpdate(Request $request,$id)
    {
        $publr = Publisher::findOrFail($id);
        $request->validate([
            'name' => 'required|max:60',
            'email' => 'required|email|max:160|unique:publishers,email,' . $publr->id,
            'phone' => 'required|max:30|unique:publishers,phone,' . $publr->id,
            'city' => 'required',
            'country' => 'required'
        ]);

        $publr->update([
            'phone' => $request->phone,
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'country' => $request->country,
            'status' => $request->status ? 1 : 0,
            'ev' => $request->ev ? 1 : 0,
            'sv' => $request->sv ? 1 : 0,
            'ts' => $request->ts ? 1 : 0,
            'tv' => $request->tv ? 1 : 0,
        ]);

        $notify[] = ['success', 'Publisher detail has been updated'];
        return redirect()->back()->withNotify($notify);
    }

    public function emailUnverified()
    {
        $page_title = 'Email Unverified Users';
        $empty_message = 'No email unverified user found';
        $publishers = Publisher::emailUnverified()->latest()->paginate(getPaginate());
        return view('admin.publisher.emailUnverified', compact('page_title', 'empty_message', 'publishers'));
    }

    public function smsUnverified()
    {
        $page_title = 'SMS Unverified Users';
        $empty_message = 'No sms unverified user found';
        $publishers = Publisher::smsUnverified()->latest()->paginate(getPaginate());
        return view('admin.publisher.smsUnverified', compact('page_title', 'empty_message', 'publishers'));
    }

    public function publisherBanned($id)
    {
        $pub = Publisher::findOrFail($id);
        $pub->status = 2;
        $pub->update();
        $notify[] = ['success', 'Publisher has been banned'];
        return redirect()->back()->withNotify($notify);
    }
    public function publisherActive($id)
    {
        $pub = Publisher::findOrFail($id);
        $pub->status = 1;
        $pub->update();
        $notify[] = ['success', 'Publisher has been active'];
        return redirect()->back()->withNotify($notify);
    }
    public function allBannedPublisher()
    {
        $page_title = 'All banned publishers';
        $empty_message = 'No data';
        $publishers = Publisher::latest()->whereStatus(2)->paginate(15);
        return view('admin.publisher.banned',compact('page_title','empty_message','publishers'));
    }

    public function allAdminPublisher()
    {
        $page_title = 'All Admin publishers';
        $empty_message = 'No data';
        $publishers = Publisher::where('role', 1)->get();
        return view('admin.publisher.admin',compact('page_title','empty_message','publishers'));
    }

    public function addSubBalance(Request $request, $id)
    {
        $request->validate(['amount' => 'required|numeric|gt:0']);

        $publr = Publisher::findOrFail($id);
        $amount = getAmount($request->amount);
        $general = GeneralSetting::first(['cur_text','cur_sym']);
        $trx = getTrx();
        if ($request->act) {

            $publr->earnings += $amount;
            $publr->save();
            $notify[] = ['success', $general->cur_sym . $amount . ' has been added to ' . $publr->username . ' balance'];


            $transaction = new Transaction();
            $transaction->publisher_id = $publr->id;
            $transaction->amount = $amount;
            $transaction->post_balance = getAmount($publr->earnings);
            $transaction->charge = 0;
            $transaction->trx_ty = '+';
            $transaction->details = 'Added Balance Via Admin';
            $transaction->trx =  $trx;
            $transaction->save();


            notify($publr, 'BAL_ADD', [
                'trx' => $trx,
                'amount' => $amount,
                'currency' => $general->cur_text,
                'post_balance' => getAmount($publr->earnings),
            ]);

        } else {
            if ($amount > $publr->earnings) {
                $notify[] = ['error', $publr->username . ' has insufficient balance.'];
                return back()->withNotify($notify);
            }
            $publr->earnings = bcsub($publr->earnings, $amount);
            $publr->save();



            $transaction = new Transaction();
            $transaction->user_id = $publr->id;
            $transaction->amount = $amount;
            $transaction->post_balance = getAmount($publr->earnings);
            $transaction->charge = 0;
            $transaction->trx_type = '-';
            $transaction->details = 'Subtract Balance Via Admin';
            $transaction->trx =  $trx;
            $transaction->save();


            notify($publr, 'BAL_SUB', [
                'trx' => $trx,
                'amount' => $amount,
                'currency' => $general->cur_text,
                'post_balance' => getAmount($publr->earnings)
            ]);
            $notify[] = ['success', $general->cur_sym . $amount . ' has been subtracted from ' . $publr->username . ' balance'];
        }
        return back()->withNotify($notify);
    }


    public function showEmailAllForm()
    {
        $page_title = 'Send Email To All Publisher';
        return view('admin.publisher.email_all', compact('page_title'));
    }


    public function sendEmailAll(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        foreach (Publisher::where('status', 1)->cursor() as $user) {
            send_general_email($user->email, $request->subject, $request->message, $user->username);
        }

        $notify[] = ['success', 'All publishers will receive an email shortly.'];
        return back()->withNotify($notify);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $users = Publisher::where(function ($user) use ($search) {
            $user->where('username', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
        });

        $publishers = $users->paginate(getPaginate());
        $page_title = 'User Search - ' . $search;
        $empty_message = 'No search result found';
        return view('admin.publisher.all', compact('page_title', 'search', 'empty_message', 'publishers'));
    }

    public function update_role(Request $request){
        $request->validate(['role' => 'required', 'publisher_id' => 'required' ]);
        $user = Publisher::findOrFail( $request->publisher_id);
        if($user){
            $user->role =  $request->role;
            $user->update();
            if( $request->role  == 1){
                return response()->json(['success'=>true, 'message'=> 'User is publisher admin']);
            }else{
                return response()->json(['success'=>false, 'message'=> 'User is normal publisher']);
            }
        }else{
            return response()->json(['success'=>false, 'message'=> 'Somthing Worng please try again']);
        }
    }
	
	
	public function create_user(){
     $countries = Country::all();
        $page_title = 'Create User'  ;
        $empty_message = 'No search result found';
        return view('admin.users.create', compact('page_title', 'empty_message','countries'));
   }
   
   
  
  public function manage_user(){
     $publisher_admin = Publisher::where('role',1)->where('status','=',1)->get();
     $campaign_manager=Publisher::where('role',2)->where('status','=',1)->get();
     $Campaign_executive=Publisher::where('role',3)->where('status','=',1)->get();
     $admin=Admin::where('status','=',1)->get();

    $adminpending=Admin::where('status',3)->get();
    $user_pending=Publisher::where('status',3)->get();
     
     $adminapprove=Admin::where('status',1)->get();
     $userapprove=Publisher::where('status',1)->get();

       $user_trash=Publisher::where('status',0)->get();
     $admin_trash=Admin::where('status',0)->get();


      $page_title = 'Users List'  ;
        $empty_message = 'No search result found';
        return view('admin.users.index', compact('page_title', 'empty_message','publisher_admin','campaign_manager','Campaign_executive','admin','user_trash','admin_trash','adminpending','user_pending','adminapprove','userapprove'));
   }  

  public function save_user(Request $request){
    if($request->role==4){
        $admin=new Admin();
         $admin_count=Admin::where('email',$request->email)->count();
         
         if($admin_count == 0 ){
        $password='A13579@1';
         $admin->name=$request->name;
         $admin->role=1;
         $admin->email=$request->email;
         $admin->username=$request->email;
         $admin->country=$request->country;
         $admin->company_name=$request->company_name;
         $admin->country_code=$request->country_code;
         $admin->phone=$request->mobile;
         $admin->password=Hash::make($password);
         $admin->status=3;
          $admin->save();
       $subject="Account Create";
       $insertedId = $admin->id;
         $url =url('/').'/admin/password/re-set/'.$insertedId;
       $message='<p>Your Admin Account has been created.</p>';
        $message .='<p>Your onetime password is : '.$password.'</p>';
        $message .='<p><a href="'.$url.'">Click here to login.</a></p>';
        $receiver_name=$request->name;

         send_general_email($request->email, $subject, $message, $receiver_name);

           }else{
            $notify[] = ['error', 'Email already  Exists'];
            return back()->withNotify($notify);
           }


    }else{      

      $Publisher = new Publisher();
         
         $p_count=Publisher::where('email',$request->email)->count();
        if($p_count == 0){
			$password='A13579@1';
         $Publisher->name=$request->name;
         $Publisher->role=$request->role;
         $Publisher->email=$request->email;
         $Publisher->username=$request->email;
         $Publisher->country=$request->country;
         $Publisher->company_name=$request->company_name;
         $Publisher->country_code=$request->country_code;
          $Publisher->phone=$request->mobile;
          $Publisher->password=Hash::make($password);
          $Publisher->status=3;
		  $Publisher->ev=1;
          $Publisher->sv=1;
          $Publisher->tv=1;
		  
		  
		  
           $Publisher->save();

           $insertedId = $Publisher->id;


           $rol_name="";
           if($request->role==1){
            $rol_name='Publisher_Admin';
           }elseif($request->role==2){
             $rol_name='Campaign Manager';
           }elseif($request->role==3){
            $rol_name='Campaign executive';
           }elseif($request->role==0){
            $rol_name='Normal Publisher ';
           }

           $subject="Account Create";
            $url =url('/').'/publisher/password/re-set/'.$insertedId;
       $message='<p>Your '.$rol_name.' Account has been created.</p>';
        $message .='<p>Your onetime password is : '.$password.'</p>';
        $message .='<p><a href="'.$url.'">Click here to login.</a></p>';
        $receiver_name=$request->name;

         send_general_email($request->email, $subject, $message, $receiver_name);


         }else{
            $notify[] = ['error', 'Email already  Exists'];
            return back()->withNotify($notify);
         }

       }
       $notify[] = ['success', 'New user create successfully'];
        $url=route('admin.users');
        return redirect($url)->withNotify($notify);

   }
   
   
   
    public function user_status($id,$status){
         if($status==5){
           Publisher::where('id',$id)->delete();
        }else{
           Publisher::where('id',$id)->update(['status'=>$status]);
        }
        return response()->json(['success'=>true, 'message'=> 'User move to trash successfully']);

    }
    
    public function admin_status($id,$status){
      if($status==5){
          Admin::where('id',$id)->delete();
        }else{
           Admin::where('id',$id)->update(['status'=>$status]);
        }
       return response()->json(['success'=>true, 'message'=> 'User move to trash successfully']);
    }

   public function checkmail(Request $request){
        $role= $request->role;
        $email=$request->email;
       if($role==4){
         $p_count=Admin::where('email',$request->email)->count();
       }else{
         $p_count=Publisher::where('email',$request->email)->count();
       }
     return response()->json(['success'=>true, 'message'=> 'User move to trash successfully','code'=>$p_count]);
    }

}
