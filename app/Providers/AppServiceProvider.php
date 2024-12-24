<?php

namespace App\Providers;

use App\Services\PostsService;
use Illuminate\Support\Facades\Log;
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
        View::composer('home', function ($view) {
            $postsService = app(PostsService::class);

            // try {
            $posts = $postsService
                ->getPosts('', 'film', '', 10);

            // dd($postsService);
            // dd($posts);
            // } catch (\Exception $e) {
            //     $posts = collect([]); // Jika gagal, fallback ke collection kosong
            //     Log::error('Gagal memuat data: ' . $e->getMessage());
            // }

            $view->with('posts', $posts);
        });
    }
}
