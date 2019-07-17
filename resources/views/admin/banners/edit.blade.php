@extends('layouts.admin')

@section('content')

    <h1>Edit banner</h1>

    <form action="/admin/banners/{{ $banner->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <input type="text" name="title" value="{{ $banner->title }}">
        <img id="banner-image" src="{{ asset($banner->image) }}" style="margin-top: 1rem;">
        <input type="file" name="banner-image" accept=".jpg, .jpeg, .png" onchange="$('#banner-image').attr('src', window.URL.createObjectURL(this.files[0]))">
        <input type="submit" value="edit">
    </form>

@stop