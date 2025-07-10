<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private static $rules = [
        'title' => ['required', 'max:50', 'min:5'],
        'image' => ['file', 'image', 'max:2050', 'extensions:jpg,png,jpeg'],
        'category_id' => ['required'],
        'content' => ['required']
    ];

    public function index()
    {
        $posts = Post::paginate(5);
        return view('dashboard.posts.posts', [
            'titlePage' => 'Posts',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', [
            'titlePage' => 'Add Post Form',
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $postData = $request->validate(self::$rules);
        $postData['user_id'] = Auth::id();
        $postData['content'] = Purifier::clean($postData['content']);

        if ($request->hasFile('image')) {
            $postData['image'] = $request->file('image')->store('posts');
        } else {
            $postData['image'] = null;
        }

        if (Post::create($postData)) {
            return $this->successFlashData('posts', 'Post baru berhasil dibuat');
        } else {
            return $this->failedFlashData('posts', 'Post baru gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'titlePage' => 'Show Post',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
