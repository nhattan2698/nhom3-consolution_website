<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request) {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $is_home = true;
        return view('posts.index', compact('posts', 'is_home'));
    }

    public function show(Request $request, $id) {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
