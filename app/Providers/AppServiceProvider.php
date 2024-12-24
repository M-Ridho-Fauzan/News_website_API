<?php

namespace App\Providers;

use App\Services\PostsService;
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
        // View::composer('*', function ($view) {
        //     $postsService = app(PostsService::class);
        //     $posts = $postsService->getPosts('search-query', 'kategori', 'author', 10);
        //     $view->with('posts', $posts);
        // });
    }
}
