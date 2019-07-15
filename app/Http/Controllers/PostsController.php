<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function get() {
        $posts = Post::all();

        return view('admin.posts', [
            'posts' => $posts
        ]);
    }

    public function create(Request $r) {
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'image' => '/storage/'.request()->file('post-image')->store('post-images')
        ]);

        return redirect('/admin/posts')->with('created', true);
    }
}
