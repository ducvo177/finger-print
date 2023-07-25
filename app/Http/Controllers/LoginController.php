<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    public function check(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard', ['email' => $request->email])->with('success', 'Login successful! Welcome back!');
        }
        
        return redirect()->route('login')->with('error', 'Wrong info, try again');
    }

    public function index()
    {
        return view('login');
    }
}
