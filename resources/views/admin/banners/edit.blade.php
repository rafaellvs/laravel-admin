@extends('layouts.admin')

@section('content')

    <h1>Edit banner</h1>

    <form action="/admin/banners/{{ $banner->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <input type="text" name="title" value="{{ $banner->title }}">
        @error('title') <p class="error">{{ $message }}</p> @enderror

        <img id="banner-image" src="{{ asset($banner->image) }}" class="banner-image">

        <input type="file" name="banner-image" accept=".jpg, .jpeg, .png" 
        onchange="$('#banner-image').attr('src', window.URL.createObjectURL(this.files[0]))">
        @error('banner-image') <p class="error">{{ $message }}</p> @enderror

        <input type="submit" value="edit" class="btn-default">
    </form>

@stop