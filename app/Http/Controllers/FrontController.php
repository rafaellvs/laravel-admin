<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Banner;

class FrontController extends Controller
{
    public function index() {
        $posts = Post::all();
        $banners = Banner::all();
        
        return view('front.index', [
            'posts' => $posts,
            'banners' => $banners
        ]);
    }
}
