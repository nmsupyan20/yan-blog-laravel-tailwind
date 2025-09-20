<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index', [
            'latests' => Post::latest()->take(3)->get(),
            'posts' => Post::all()
        ]);
    }
}
