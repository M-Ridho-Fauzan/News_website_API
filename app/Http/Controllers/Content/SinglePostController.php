<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;

class SinglePostController extends Controller
{
private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

public function index(string $id)
    {
        $merged = "/$id";
        $post = $this->postService->getPost($merged);

        if ($post->isEmpty()) {
            abort(404, 'Post not found');
        }

        // dd($post);

        return view('content.single-post', ['post' => $post->first()]);
    }
}
