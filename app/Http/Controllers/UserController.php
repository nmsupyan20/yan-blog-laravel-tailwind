<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
    public function store(UserRequest $request)
    {
        $userData = $request->validated();
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
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'titlePage' => 'User Profile',
            'user' => $user
        ]);
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
    public function update(UpdateUserRequest $request, User $user)
    {
        $updateUserData = $request->validated();
        if ($user->update($updateUserData)) {
            return $this->successFlashData('users', 'Update user berhasil');
        } else {
            return $this->failedFlashData('users', 'Update user gagal');
        }
    }

    public function editPassword(User $user)
    {
        return view('dashboard.users.edit-password', [
            'titlePage' => 'Edit Password',
            'user' => $user
        ]);
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        $updatePassword = $request->validated();
        $updatePassword['password'] = Hash::make($updatePassword['password']);
        unset($updatePassword['confirmPassword']);

        if ($user->update($updatePassword)) {
            return $this->successFlashData('users', 'Password user berhasil diupdate');
        } else {
            return $this->failedFlashData('users', 'Password user gagal diupdate');
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
