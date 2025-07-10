<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    private static $registerRules = [
        'name' => ['required', 'alpha:ascii', 'max:75', 'min:1'],
        'email' => ['required', 'email:rfc,dns', 'max:50', 'min:2'],
        'username' => ['required', 'max:50', 'min:2'],
        'password' => ['required', 'confirmed:confirmPassword', 'max:16', 'min:6'],
        'confirmPassword' => ['required']
    ];

    private static $registerErrorMessages = [
        'name.required' => 'Nama wajib diisi',
        'name.alpha' => 'Nama hanya boleh menggunakan huruf',
        'name.max' => 'Panjang nama maksimal 75 huruf',
        'name.min' => 'Panjang nama minimal 1 huruf',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.max' => 'Panjang email maksimal 50 karakter',
        'email.min' => 'Panjang email minimal 2 karakter',
        'username.required' => 'Username wajib diisi',
        'username.max' => 'Panjang username maksimal 50 karakter',
        'username.min' => 'Panjang username minimal 2 karakter',
        'password.required' => 'Password wajib diisi',
        'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
        'password.max' => 'Panjang password maksimal 16 karakter',
        'password.min' => 'Panjang password minimal 6 karakter',
        'confirmPassword.required' => 'Konfirmasi password wajib diisi'
    ];

    private static $loginRules = [
        'username' => ['required', 'max:50', 'min:2'],
        'password' => ['required', 'max:16', 'min:6']
    ];

    private static $loginErrorMessages = [
        'username.required' => 'Username wajib diisi',
        'username.max' => 'Panjang username maksimal 50 karakter',
        'username.min' => 'Panjang username minimal 2 karakter',
        'password.required' => 'Password wajib diisi',
        'password.max' => 'Panjang password maksimal 16 karakter',
        'password.min' => 'Panjang password minimal 6 karakter'
    ];

    public function login()
    {
        return view('auth.login', [
            'titlePage' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(self::$loginRules, self::$loginErrorMessages);

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

    public function store(Request $request)
    {
        $userData = $request->validate(self::$registerRules, self::$registerErrorMessages);
        $userData['password'] = Hash::make($userData['password']);
        unset($userData['confirmPassword']);

        if (User::create($userData)) {
            return $this->successFlashData('login', 'Akun berhasil didaftarkan');
        } else {
            return $this->failedFlashData('login', 'Akun gagal didaftarkan');
        }
    }
}
