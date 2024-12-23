<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;

class SinglePostController extends Controller
{
    private $postServices;

    public function __construct(PostService $postServices)
    {
        $this->postServices = $postServices;
    }

    public function index()
    {
        $id = "/sport/2022/oct/07/cricket-jos-buttler-primed-for-england-comeback-while-phil-salt-stays-focused";

        $results = $this->postServices->getPost($id);

        dd($results);

        return view('content.single-post', compact('results'));
    }
}
