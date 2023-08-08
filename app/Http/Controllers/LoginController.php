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
            return redirect()->route('dashboard')->with('success', 'Dăng nhập thành công, chào mừng trở lại');
        }

        return redirect()->route('login')->with('error', 'Thông tin nhân viên không chính xác');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất thành công');
    }

    public function index()
    {
        return view('login');
    }
}
