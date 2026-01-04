<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginform()
    {
        return view('admin-panel.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 2,
        ])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }


        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
