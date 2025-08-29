<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $last_articles = Article::query()->orderBy('created_at', 'desc')->take(4)->get();
        $most_viewed_articles = Article::query()->orderBy('viewed', 'desc')->take(6)->get();
        return view('frontend.home', compact('last_articles','most_viewed_articles'));
    }
}
