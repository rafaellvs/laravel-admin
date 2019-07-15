<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannersController extends Controller
{
    public function get() {
        return view('admin.banners');
    }

    public function create(Request $r) {
        Banner::create([
            'title' => request('title'),
            'image' => '/storage/'.request()->file('banner-image')->store('banner-images')
        ]);

        return redirect('/admin/banners')->with('created', true);
    }
}
