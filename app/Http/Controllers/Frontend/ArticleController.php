<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\CommentStatus;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles(Category $category)
    {
       // $category = Category::query()->where('slug', $category_slug)->firstOrFail();
        $articles = Article::query()
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(6);
        return view('frontend.articles', compact('articles'));
    }

    public function article(Article $article)
    {
        $article->load([
            'comments'=> function ($query) {
                $query->where('status',CommentStatus::Accepted->value);
            },
            'user','category']);

        $subcategories = Category::query()
            ->select('slug', 'title')
            ->withCount('articles')
            ->where('parent_id','!=',0)
            ->get();

        $last_articles = Article::query()
            ->select('id', 'title')
            ->orderBy('created_at', 'desc')->take(4)->get();
//        $comments = Comment::query()
//            ->where('article_id',$article->id)
//            ->where('status',CommentStatus::Accepted->value)
//            ->get();
        return view('frontend.single_article',
            compact('article','subcategories','last_articles'));
    }

    public function editArticle(User $user ,Article $article)
    {
        $article->load([
            'comments'=> function ($query) {
                $query->where('status',CommentStatus::Accepted->value);
            },
            'user','category']);

        $subcategories = Category::query()
            ->select('slug', 'title')
            ->withCount('articles')
            ->where('parent_id','!=',0)
            ->get();

        $last_articles = Article::query()
            ->select('id', 'title')
            ->orderBy('created_at', 'desc')->take(4)->get();
//        $comments = Comment::query()
//            ->where('article_id',$article->id)
//            ->where('status',CommentStatus::Accepted->value)
//            ->get();
        return view('frontend.single_article',
            compact('article','subcategories','last_articles'));
    }

}
