<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function get() {
        return view('admin.posts');
    }

    public function create(Request $r) {
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
        ]);
        
        dd($r->image);
        return redirect('/admin/posts')->with('created', true);
    }
}
