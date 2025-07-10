<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    static $rules = [
        'name' => ['required', 'alpha:ascii', 'max:20', 'min:3']
    ];

    static $error_messages = [
        'name.required' => 'Nama kategori wajib diisi',
        'name.alpha' => 'Nama kategori hanya boleh huruf',
        'name.max' => 'Panjang nama kategori maximal 20 huruf',
        'name.min' => 'Panjang nama kategori minimal 3 huruf'
    ];

    public function index()
    {

        $categories = Category::paginate(4);
        return view('dashboard.categories.categories', [
            'titlePage' => 'Categories',
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'titlePage' => 'Categories Form'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoryData = $request->validate(self::$rules, self::$error_messages);
        $categoryData['user_id'] = Auth::user()->id;

        if (Category::create($categoryData)) {
            return $this->successFlashData('categories', 'Kategori berhasil ditambahkan');
        } else {
            return $this->failedFlashData('categories', 'Kategori gagal ditambahkan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'titlePage' => 'Edit Form',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $UpdatedCategoryData = $request->validate(self::$rules, self::$error_messages);
        if ($category->update($UpdatedCategoryData)) {
            return $this->successFlashData('categories', 'Kategori berhasil diupdate');
        } else {
            return $this->failedFlashData('categories', 'Kategori gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->successFlashData('categories', 'Kategori telah dihapus');
    }
}
