<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private static $rules = [
        'name' => ['required', 'alpha:ascii', 'max:75', 'min:1'],
        'email' => ['required', 'email:rfc,dns', 'max:50', 'min:2'],
        'username' => ['required', 'max:50', 'min:2'],
        'password' => ['required', 'confirmed:confirmPassword'],
        'confirmPassword' => ['required']
    ];

    private static $error_messages = [
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
        'confirmPassword.required' => 'Konfirmasi password wajib diisi'
    ];
    public function index()
    {
        $userData = User::paginate(4);
        return view('dashboard.users.users', [
            'titlePage' => 'Users',
            'users' => $userData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'titlePage' => 'Add Users Form'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userData = $request->validate(self::$rules, self::$error_messages);
        $userData['password'] = Hash::make($userData['password']);
        unset($userData['confirmPassword']);

        if (User::create($userData)) {
            return $this->successFlashData('users', 'User baru berhasil dibuat');
        } else {
            return $this->failedFlashData('users', 'User baru gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'titlePage' => 'Edit User Form',
            'user' =>  $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $updateRules = self::$rules;
        $updateErrorMessages = self::$error_messages;

        unset($updateRules['confirmPassword'], $updateErrorMessages['confirmPassword.required']);

        if ($request->cekEditPassword == 'ok') {
            $updateUserData = $request->validate($updateRules, $updateErrorMessages);
            $updateUserData['password'] = Hash::make($updateUserData['password']);
        } else {
            unset($updateRules['password']);
            unset($updateErrorMessages['password.required'], $updateErrorMessages['password.confirmed']);
            $updateUserData = $request->validate($updateRules, $updateErrorMessages);
        }

        if ($user->update($updateUserData)) {
            return $this->successFlashData('users', 'Update user berhasil');
        } else {
            return $this->failedFlashData('users', 'Update user gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->successFlashData('users', 'User berhasil dihapus');
    }
}
