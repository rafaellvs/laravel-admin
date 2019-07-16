<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function store() {
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'image' => '/storage/'.request()->file('post-image')->store('post-images')
        ]);

        return redirect('/admin/posts')->with('created', true);
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function show(Post $post) {
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post) {
        $post->update(request(['title', 'body']));

        return redirect('/admin/posts')->with('updated', true);
    }

    public function destroy(Post $post) {
        $post->delete();

        return redirect('/admin/posts')->with('deleted', true);
    }
}
