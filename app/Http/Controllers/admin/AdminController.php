<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;

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

}
