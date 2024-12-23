<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GuardianApiRepository;
use App\Services\PostsService;

class HomeController extends Controller
{
    private $postsServices;

    public function __construct(PostsService $postsServices)
    {
        $this->postsServices = $postsServices;
    }

    public function index()
    {
        $query = '12 years a slave';
        $kategori = 'film';
        $isi = 2;

        $results = $this->postsServices->getPosts($query, $kategori, $isi);

        dd($results);

        return view('home', [
            'results' => $results,
        ]);
    }
}
