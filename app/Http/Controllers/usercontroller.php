<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
class usercontroller extends Controller
{
    function login() {
       return view("dashboard.login");
    }
    function postlogin(Request $request){
        $val = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        $user_data = $request->only("email","password");
        if(Auth::attempt($user_data,$remember)){
            return redirect("home");
        }else {
            return redirect("login");
        }
      
        
    }
    function register(){
       return view("dashboard.register");
    }
    function postregister(Request $request){
        
        $val = $request->validate([
            "username" => "required",
            "email" => "required|email",
            "password" => "required|confirmed"
        ]);
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        if($user->save()){
            Session::flash('message', 'User Created Succuessfully'); 
            
        };
        return redirect('/register');
    }
    function logout() {
        Auth::logout();
    }
}
