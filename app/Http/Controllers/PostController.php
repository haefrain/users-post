<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($userId) {
        $posts = Post::getPostsByUserId($userId);
        return view('post', compact('posts'));
    }
}
