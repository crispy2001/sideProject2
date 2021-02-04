<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use SoftDeletes;

class UserController extends Controller
{
    public function getSignup($isAdmin)
    {
        return view('user.signup', ['isAdmin' => $isAdmin]);
    }

    public function postSignup(Request $request, $isAdmin)
    {
        $this->validate($request, [
            'userName' => 'required|min:1',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'userName' => $request->input('userName'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'isAdmin' => $isAdmin
        ]);
        $user->save();

        Auth::login($user);

        return redirect()->route('main.index');
    }


    public function getSignin()
    {
        return view('user.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'userName' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('main.index');
        }
        return redirect()->back();
    }

    public function getProfile()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }


    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('main.index');
    }

    public function getAccountController()
    {
        $users = DB::table('users')->where('email', '!=', Auth::user()->email)->get();
        return view('user.controllAccount', ['users' => $users]);
    }
    public function postDRAccount($id)
    {
        //$user = DB::table('users')->where('id', '=', $id)->get();
        $user = User::find($id);
        if($user != null){
            $user->delete();
        }
        else{
            $user = User::onlyTrashed()->where('id', '=', $id)->restore();
        }
        $users = DB::table('users')->get();
        return view('user.controllAccount', ['users' => $users]);
    }
}
