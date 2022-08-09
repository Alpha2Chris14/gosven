<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }
    //This Displays The Login Form
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    //This Is The Login Function
    public function login(Request $request){
        //Validate Form Data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //Attempt Admin Login
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            //If Successful Redirect To Intended Location
            return redirect()->intended(route('admin.dashboard'));
        }
        //If Unsuccessful, Redirect Back To Login Page With Form Data
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
