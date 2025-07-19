<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.index', [
            'titlePage' => 'Settings Form',
        ]);
    }
}
