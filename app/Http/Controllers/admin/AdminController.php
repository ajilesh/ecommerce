<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\Forgotpassword;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Hash;
use Auth;
use DB;
use Carbon\Carbon; 
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function login()
    {
        return view('admin.login')->with('title','Admin Login');
    }
    // public function register()
    // {
    //     //echo Hash::make('ajilesh');
    //     //return view('admin.register')->with('title','Admin Register');
    // }
    public function loginCheck(REQUEST $request)
    {
        //dd($request);
        $request->validate([
            'username' => 'required|email',
            'password' => 'required|min:5|max:20',
        ],[
            'username.required' => 'Username Field Required'
        ]);
        //dd($request);
        $check = $request->only('username','password');
        //echo Hash::make('ajilesh');
       // echo Auth::guard('admin')->attempt($check);
        //dd($check);
        if(Auth::guard('admin')->attempt($check))
        {
            //return "test";
            return redirect()->route('admin.dashboard')->with('success','Welcome To dashboard');
        }
        {
            return redirect()->back()->with('fail','Failed Your Login');
        }

    }
    
    //forgot password
    public function forgotpassword()
    {
        return view('admin.forgotpassword');
    }
    //chech 
    public function checkforgotpassword(REQUEST $request)
    {
        //echo "test";
        $request->validate([
            'email' => 'required|email'
        ],[
            'email.required' => 'Email Field Required !!!'
        ]);
        $query = DB::table('admins')->where('username',$request->email)->get();
        //echo count($query);
        //exit();
        if(count($query) >= 1)
        {
            $token = str::random(64);
            DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            // try{
                // Mail::send('admin.mailtemplate', ['token' => $token,'email'=>$request->email], function ($message) {
                //     $message->from('meetech@gmail.com', 'meemtech');
                //     $message->sender('meeerp@gmail.com', 'meem tech');
                //     $message->to('ajileshpp@gmail.com', 'ajileshpp');
                //     // $message->cc('john@johndoe.com', 'John Doe');
                //     // $message->bcc('john@johndoe.com', 'John Doe');
                //     // $message->replyTo('john@johndoe.com', 'John Doe');
                //     $message->subject('reset password');
                //     // $message->priority(3);
                //     // $message->attach('pathToFile');
                // });
                $details = [
                    'title' => 'Reset Password',
                    'url' => url('admin/resetpassword/'.$token.'/'.$request->email),
                    'token' => $token,
                    'email' => $request->email
                ];
                //$myEmail = $request->email;
          
                Mail::to($details['email'])->send(new Forgotpassword($details));
            // }
            // catch(\Exception $e)
            // {
            //     echo "ajilesh";
            // }
            
            return redirect()->back()->with('success','please check email');
        }
        else{
            return redirect()->back()->with('error','Sorry Your Email Is Not In Database');
        }
        //dd($request->all());
    }
    //reset password
    public function resetpassword($token,$email)
    {
        return view('admin.resetpassword')->with(['token'=>$token,'email'=>$email]);
    }
    //update password
    public function updatepassword(REQUEST $request)
    {
        $request->validate([
            'npassword' => 'required|min:5',
            'cpassword' => 'required|same:npassword'
        ],
    [
        'npassword.required' => 'Enter New Password',
        'npassword.min' => 'Password Must Has 5 Char',
        'cpassword.required' => 'Enter Confirm Password',
        'cpassword.same' => 'Password Must Be Same'
    ]);
    
    $update = DB::table('password_resets')->where('email',$request->email)->where('token',$request->token)->get();
    if($update)
    {
        Admin::where('username', $request->email)->update(['password'=>Hash::make($request->cpassword)]);
        DB::table('password_resets')->where('email',$request->email)->delete();
        return redirect()->route('admin.login');
    }
    
    }
    //logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
