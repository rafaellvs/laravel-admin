@extends('layouts.admin')

@section('content')

<h3>Create banner</h3>

<form action="/admin/banners" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Title">
    @error('title') <p class="error">{{ $message }}</p> @enderror

    <img id="banner-image" src="" style="margin-top: 1rem;" />

    <input type="file" name="banner-image" accept=".jpg, .jpeg, .png" onchange="$('#banner-image').attr('src', window.URL.createObjectURL(this.files[0]))">
    @error('banner-image') <p class="error">{{ $message }}</p> @enderror

    <input type="submit" value="create" class="btn-default">
</form>

@stop