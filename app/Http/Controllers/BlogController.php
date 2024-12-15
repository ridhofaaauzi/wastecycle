<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('user.artikel.blog', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('user.artikel.detailBlog', compact('post'));
    }
}