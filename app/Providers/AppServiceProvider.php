<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $mainCategories = Cache::remember('main-categories', 60*60*24*7, function () {
            return Category::query()->with('childCategory')
                ->where('parent_id', 0)->get();
        });

        View::share([
            'mainCategories' => $mainCategories,
        ]);

        Paginator::useBootstrap();

        Model::preventLazyLoading(! $this->app->isProduction());
    }
}
