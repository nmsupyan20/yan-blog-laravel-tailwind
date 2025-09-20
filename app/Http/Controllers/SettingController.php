<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    private $id;
    private $userdata;

    public function __construct()
    {
        $this->id = Auth::id();
        $this->userdata = User::find($this->id);
    }

    public function index()
    {
        return view('dashboard.settings.index', [
            'titlePage' => 'Profile Settings',
            'user' => $this->userdata
        ]);
    }

    public function edit()
    {
        return view('dashboard.settings.edit', [
            'titlePage' => 'Settings Form',
            'user' => $this->userdata
        ]);
    }

    public function update()
    {
        //
    }
}
