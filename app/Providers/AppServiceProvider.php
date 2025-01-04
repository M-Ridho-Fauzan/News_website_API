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
        View::composer('home', function ($view) {
            $data = $this->prepareHomePageData();
            $view->with($data);
        });

        View::composer('content.all-posts', function ($view) {
            $posts = $this->prepareAllPostData();
            $view->with('posts', $posts);
        });
    }

    private function prepareHomePageData()
    {
        $postsService = app(PostsService::class);

        return [
            'trends' => $postsService->getPosts('', '', '', 3, 3),
            'popular' => $postsService->getPosts('', '', '', 2, 2),
            'posts' => $postsService->getPosts('', '', '', 6, 6),
        ];
    }

    private function prepareAllPostData()
    {
        $postsService = app(PostsService::class);

        // Ambil parameter dari request
        $search = request('search', ''); // Default ke string kosong jika tidak ada
        $filter = request('filter', ''); // Default ke string kosong jika tidak ada

        $posts = $postsService->getPosts($search, $filter, '', 20, 6);

        $posts->appends(request()->except('page'));

        // // Tambahkan query parameter ke pagination URL
        // $posts->appends(array_filter([
        //     'search' => $search,
        //     'filter' => $filter,
        // ]));

        return $posts;
    }
}
