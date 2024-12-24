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
        return view('home');
    }
}
