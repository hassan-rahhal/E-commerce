<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function logout(){
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged Out Successfully');
    }

    function login(Request $request){
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($fields)){
            return redirect()->route('home')->with('success', 'Logged In Successfully');;
        } else {
            return redirect()->route('login')->with('error', 'Wrong Email or Password');;
        }
    }

    function loginPage(){
        return view('login');
    }



    function registerPage(){
        return view('register');
    }

    function register(Request $request){
        $fields = $request->validate([
            'email' => ['required', 'email', 'unique:users', 'max:255', 'min:5'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'password' => ['required', 'min:8', 'max: 32', 'confirmed'],
            'privacy' => 'required'
        ]);

        $user = User::create($fields);

        Auth::login($user);
        return redirect()->route('home')->with('success', 'Account Created Successfully');;
    }
}
