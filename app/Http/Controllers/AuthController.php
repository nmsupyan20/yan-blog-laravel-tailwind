<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'titlePage' => 'Login'
        ]);
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('categories');
        } else {
            return $this->failedFlashData('login', 'Maaf, username atau password tidak sesuai');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function register()
    {
        return view('auth.register', [
            'titlePage' => 'Register'
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $userData = $request->validated();
        $userData['password'] = Hash::make($userData['password']);
        unset($userData['confirmPassword']);

        if (User::create($userData)) {
            return $this->successFlashData('login', 'Akun berhasil didaftarkan');
        } else {
            return $this->failedFlashData('login', 'Akun gagal didaftarkan');
        }
    }
}
