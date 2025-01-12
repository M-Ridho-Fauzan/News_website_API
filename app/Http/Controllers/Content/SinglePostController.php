<?php

namespace App\Http\Controllers\Content;

use App\Models\AppHistory;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        // dd($post['headline']);

        $data = $post->first();

        AppHistory::create([
            'type_history' => 'post',
            'request_type' => 'post',
            'param_post' => $data['headline'],
            'id_post' => $data['id'],
            'param_kategori' => $data['section-name'],
            'id_kategori' => $data['section-id'],
            'user_id' => Auth::user()->id ?? null,
        ]);

        // dd($post);

        return view('content.single-post', ['post' => $post->first()]);
    }
}
