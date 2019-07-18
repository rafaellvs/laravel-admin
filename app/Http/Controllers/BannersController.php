<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannersController extends Controller
{
    public function index() {
        $banners = Banner::all()->reverse();

        return view('admin.banners.index', [
            'banners' => $banners
        ]);
    }

    public function store() {
        request()->validate([
            'title' => 'required',
            'banner-image' => 'required | image'
        ]);
        
        Banner::create([
            'title' => request('title'),
            'image' => '/storage/'.request()->file('banner-image')->store('banner-images')
        ]);
    
        return redirect('/admin/banners')->with('created', true);
    }

    public function create() {
        return view('admin.banners.create');
    }

    public function show(Banner $banner) {
        return view('admin.banners.show', [
            'banner' => $banner
        ]);
    }

    public function edit(Banner $banner) {
        return view('admin.banners.edit', [
            'banner' => $banner
        ]);
    }

    public function update(Banner $banner) {
        $banner->update(
            request()->validate([
                'title' => 'required',
                'banner-image' => 'image'
            ])
        );  

        if(request()->has('banner-image')) {
            $banner->image = '/storage/'.request()->file('banner-image')->store('banner-images');
            $banner->save();
        }
        
        return redirect('/admin/banners')->with('updated', true);
    }

    public function destroy(Banner $banner) {
        $banner->delete();

        return redirect('/admin/banners')->with('deleted', true);
    }
}
