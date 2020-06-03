<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class Log extends Controller



{
    public function showLoginForm()
    {
         
        return view('auth.login');
    }

    public function login(Request $request)
    {
         
        $validator = $request->validate([
            'phone'     => 'required',
            'password'  => 'required|min:6'
        ]);

        if (Auth::attempt($validator)) {
            return redirect('/');
        }else{
            return view('auth.login')->with(['msg' => 'Oppes! vos identifiants n\'ont pu être validés, merci de les saisir correctement']);

        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return back();
    }
    
}
