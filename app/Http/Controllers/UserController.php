<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

    public function postSignup(Request $request){
        $this->validate($request, [
            'userName' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4',
            'isAdmin' => '0'
        ]);
            
        $user = new User([
            'userName' => $request->input('userName'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        
        Auth::login($user);

        return redirect()->route('main.index');
    }


    public function getSignin(){
        return view('user.signin');
    }
    
    public function postSignin(Request $request){
        $this->validate($request, [
            'userName' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect()->route('main.index');
        }
        return redirect()->back();
    }

    public function getUserName(){
        $user = Auth::user();
        return view('main.index', $user);
    }

    public function getProfile(){
        return view('main.index');
    }
    
    
    public function getLogout(){
        Auth::logout();
        return redirect()->back();
    }
}
