<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;

class LoginController extends Controller
{
    // LOGIN AREA
    public function index() {
        return view('login');
    }

    public function processLogin(Request $request) {
        $msg = [
            'email.required' => "Email tidak boleh kosong",
            'password.required' => "Password tidak boleh kosong",
        ];

        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ], $msg);

        // CHECK JIKA ROLE BERTIPE USER 
        // MAKA USER/DASHBOARD
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => "USER",
        ])) {
            $request->session()->regenerate();

            return redirect()->intended('/user');
        } elseif (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => "ADMIN",
        ])) {
            // SELAIN ROLE BERTIPE USER 
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    // REGISTER AREA
    public function register() {
        if (Auth::user()) {
            return redirect('/');
        } else {
            return view('register');
        }
    }

    public function processRegister(Request $request) {
        $msg = [
            'email.required' => "Email tidak boleh kosong",
            'password.required' => "Password tidak boleh kosong",
        ];

        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ], $msg);
        
        $user = new User;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        return back()->with('message', 'Berhasil Membuat Akun');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
