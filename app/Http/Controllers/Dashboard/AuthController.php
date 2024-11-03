<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $loginEmail = Auth::attempt(['email' => $request->username, 'password' => $request->password], $request->remember);
        $loginPhone = Auth::attempt(['phone' => $request->username, 'password' => $request->password], $request->remember);
        if ($loginEmail||$loginPhone) {
            return redirect('/')->with('success', 'Login Success');
        }
        return back()->with('error', 'Email or Password Invalid');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }

}
