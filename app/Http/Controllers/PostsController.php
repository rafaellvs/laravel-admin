<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{   
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $posts = Post::all()->reverse();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function store() {
        $attributes['user_id'] = auth()->id();
        $attributes['user_name'] = auth()->user()->name;
        
        if(request()->has('post-image')) {
            $attributes += request()->validate([
                'title' => 'required',
                'body' => 'required',
                'post-image' => 'image'
            ]);

            $attributes['image'] = '/storage/'.request()->file('post-image')->store('post-images');
            
            Post::create($attributes);
            
        } else {
            $attributes += request()->validate([
                'title' => 'required',
                'body' => 'required',
            ]);

            Post::create($attributes);
        }
            
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
        $this->authorize('edit', $post);
        
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post) {
        if(request()->has('remove-img')) {
            $post->update(['image' => '']);
        }
        
        $post->update(
            request()->validate([
                'title' => 'required',
                'body' => 'required',
                'post-image' => 'image'
            ])
        );

        if(request()->has('post-image')) {
            $post->image = '/storage/'.request()->file('post-image')->store('post-images');
            $post->save();
        }
        
        return redirect('/admin/posts')->with('updated', true);
    }

    public function destroy(Post $post) {
        $this->authorize('edit', $post);
        
        $post->delete();

        return redirect('/admin/posts')->with('deleted', true);
    }
}
