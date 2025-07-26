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
 public function store(Request $request)
{
    // الفالديشن
  $request->validate([
    'name' => ['required', 'string', 'max:255', 'regex:/[a-zA-Zأ-ي]/'],
], [
    'name.required' => 'يرجى إدخال اسم التصنيف',
    'name.string' => 'اسم التصنيف يجب أن يكون نصًا',
  'name.regex' => 'اسم التصنيف يجب أن يحتوي على أحرف وليس أرقام فقط',  
]);

    // حفظ التصنيف
    Category::create([
        'name' => $request->name,
    ]);

    // الرجوع لصفحة التصنيفات
    return redirect()->route('admin.category.index')->with('success', 'تم إنشاء التصنيف بنجاح');
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
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category->update([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.category.index')->with('success', 'تم تعديل التصنيف بنجاح');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
      
        return redirect()->route('admin.category.index')->with('success', 'Category Deleted Successfully');
    }
}
