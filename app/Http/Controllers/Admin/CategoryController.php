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
        $categories = Category::query()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::getCategories();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        Category::query()->create([
            'title' => $request->title,
            'parent_id' => $request->parent_id,
            'slug' => make_slug($request->title),
        ]);
        return redirect()->route('categories.index')
            ->with('success','دسته بندی با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::getCategories();
        $category = Category::query()->find($id);
        return view('admin.categories.edit', compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $category = Category::query()->find($id);
        $category->update([
            'title' => $request->title,
            'parent_id' => $request->parent_id,
            'slug' => make_slug($request->title),
        ]);
        return redirect()->route('categories.index')
            ->with('success','دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        Category::destroy($id);
//        return redirect()->route('categories.index')
//            ->with('success','دسته بندی با موفقیت حذف شد');
        return response()->json(['success'=>'حذف انجام شد']);
    }
}
