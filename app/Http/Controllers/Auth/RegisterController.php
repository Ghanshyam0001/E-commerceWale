<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
   public function create()
   {
      return view('admin-panel.register');
   }

     public function register(Request $request)
   {

      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);
    
     $user = new User();
     $user->name = $request->name;
     $user->email = $request->email;
     $user->password = $request->password;
     $user->role = 2;

      $user->save();

      return redirect()->route('login')
                     ->with('success', 'Account created successfully!');
    
   }

    public function login()
    {
        return view('admin-panel.auth.login');
    }

    public function loginPost(Request $request)
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
}
