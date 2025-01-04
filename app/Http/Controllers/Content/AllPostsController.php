<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllPostsController extends Controller
{
    public function index()
    {
        return view('content.all-posts');
    }
}
