<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admins.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->except("_token", 'image');
        $data['image'] = uploadImage($request->file('image'), 'categories');

        Category::create($data);

        return redirect()->route('admin.category.index')->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admins.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admins.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->except("_token", 'image');
        $oldImage = '';
        if ($request->hasFile('image')) {
            $oldImage = $category->image;
            $data['image'] = uploadImage($request->file('image'), 'categories');
        }

        $category->update($data);

        if ($oldImage) {
            deleteImage($oldImage, 'categories');
        }

        return redirect()->route('admin.category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        deleteImage($category->image, 'categories'); // delete image
        return redirect()->route('admin.category.index')->with('success', 'Category Deleted Successfully');
    }
}
