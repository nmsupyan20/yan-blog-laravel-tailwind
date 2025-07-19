<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function store(PostRequest $request)
    {
        $postData = $request->validated();
        $postData['user_id'] = Auth::id();
        $postData['content'] = Purifier::clean($postData['content']);

        $file = $request->file('image');

        $imageName = $file->hashName();
        $postData['image'] = $imageName;

        if (Post::create($postData)) {
            $file->storeAs('posts', $imageName);
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
        $categories = Category::all();
        return view('dashboard.posts.edit', [
            'titlePage' => 'Edit Post',
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $updatePost = $request->validated();
        $updatePost['content'] = Purifier::clean($updatePost['content']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $updatePost['image'] = $filename;
            $file->storeAs('posts', $filename);

            if (Storage::exists('posts/' . $post->image)) {
                Storage::delete('posts/' . $post->image);
            }
        }

        if ($post->update($updatePost)) {
            return $this->successFlashData('posts', 'Postingan berhasil diupdate');
        } else {
            return $this->failedFlashData('posts', 'Postingan gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $filepath = 'posts/' . $post->image;

        if (Storage::exists($filepath)) {
            Storage::delete($filepath);
        }

        $post->delete();
        return $this->successFlashData('posts', 'Postingan berhasil dihapus');
    }
}
