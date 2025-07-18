<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view ( 'login');
    }
    public function login(Request $request){
        $credentials = $request->only('email','password');
        if (auth::attempt($credentials)) {
               $request->session()->regenerate();
               return redirect( )->intended('/dashboard');
        }
        else{
            return back()->withErrors(['email'=> ' Las credenciales son invalidas ']);
        }
    }
    
    public function register(Request $request)
    {
        $request->validate( [
            'email'=> 'required|email|unique:users',
            'name'=> 'required|string|max:255',
            'password'=> 'required|confirmed|min:6'
            ] );

        $users = User::create(  [
            'email'=> $request->email,
            'name'=> $request->name,
            'password'=> Hash::make($request->password),
        ] );

        auth()->login($users);
        return redirect('/dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
