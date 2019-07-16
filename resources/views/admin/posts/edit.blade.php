@extends('layouts.admin')

@section('content')

    <h1>Edit post</h1>

    <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <input type="text" name="title" value="{{ $post->title }}">
        <textarea name="body">{{ $post->body }}</textarea>
        <img src="{{ asset($post->image) }}" style="margin-top: 1rem;">
        <input type="file" name="post-image" accept=".jpg, .jpeg, .png">
        <input type="submit" value="edit">
    </form>

@stop