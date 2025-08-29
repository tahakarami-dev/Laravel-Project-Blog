<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::query()
            ->with('user:id,name','category:id,title')
            ->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::getCategories();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image_name = $request->image->hashName();
        $request->image->storeAs('images/articles/', $image_name, 'public');

        Article::query()->create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $image_name,
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'مقاله با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::getCategories();
        $article = Article::query()->findOrFail($id);
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::query()->findOrFail($id);

        if(isset($request->image)){
            $image_name = $request->image->hashName();
            $request->image->storeAs('images/articles/', $image_name, 'public');
        }


        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image ? $image_name : $article->image,
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'مقاله با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);
        return response()->json(['success' => 'مقاله حذف شد']);
    }

    public function ckeditorImage(Request $request)
    {
        if($request->hasFile('upload')) {
            $image_name = $request->upload->hashName();
            $request->upload->storeAs('images/articles/', $image_name, 'public');
        }
          $url = url('images/articles/' . $image_name);
        return response()->json(['url'=>$url]);

    }
}
