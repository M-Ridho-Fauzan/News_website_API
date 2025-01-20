<?php

namespace App\Providers;

use App\Models\AppHistory;
use App\Services\PostsService;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/';
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('isAdmin', function () {
            return new IsAdmin();
        });
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

        Blade::directive('queryUrl', function ($expression) {
            // Buat fungsi buildQueryUrl untuk digunakan di directive
            return "<?php echo buildQueryUrl({$expression}[0], {$expression}[1]); ?>";
        });
    }

    private function prepareHomePageData()
    {
        $postsService = app(PostsService::class);

        return [
            'trends' => $postsService->getPosts('trends', '', '', '', 20, 6),
            'popular' => $postsService->getPosts('popular', '', '', '', 20, 6),
            'posts' => $postsService->getPosts('news', '', '', '', 20, 6),
        ];
    }

    private function prepareAllPostData()
    {
        $postsService = app(PostsService::class);

        // Ambil parameter dari request
        $search = request('search', '');
        $filter = request('filter', '');
        $kategori = request('kategori', '');

        // dd($kategori);

        // Buat array parameter dan hilangkan parameter yang kosong
        $queryParams = array_filter([
            'search' => $search,
            'filter' => $filter,
            'kategori' => $kategori,
        ], fn($value) => !is_null($value) && $value !== '');

        AppHistory::create([
            'type_history' => 'request',
            'request_type' => $search ? 'search' : ($kategori ? 'kategori' : 'unknown'),
            'param_post' => $search ?: 'No Search Query',
            'id_post' => null,
            'param_kategori' => $kategori ?: 'No Category',
            'id_kategori' => $kategori ?: 'No Id Category',
            'user_id' => Auth::user()->id ?? null,
        ]);

        // Ambil data dari service
        $posts = $postsService->getPosts(
            $queryParams['search'] ?? '',
            $queryParams['kategori'] ?? '',
            $queryParams['filter'] ?? '',
            '',
            20,
            6
        );

        // Tambahkan query parameter ke pagination URL
        $posts->appends($queryParams);

        // dd($posts);

        return $posts;
    }
}
