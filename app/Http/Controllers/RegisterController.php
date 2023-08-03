<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    
    public function store(Request $request)
    {
       $input = $request->all();
       $file = $input['avatar'];
       $fileName = 'avatar.'.time() . '.' . $file->getClientOriginalExtension();
       $filePath = $file->storeAs('image', $fileName, 'public');
       $imageUrl = Storage::url($filePath);
       User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'address' => $input['address'],
        'avatar' => $imageUrl 

       ]);
       return redirect()->route('login')->with('success', 'Login with your new account');
        
    }

    public function index()
    {
        return view('register');
    }

}