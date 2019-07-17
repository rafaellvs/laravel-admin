@extends('layouts.admin')

@section('content')

<h3>Create post</h3>

<form action="/admin/posts" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Title">
    <textarea name="body" placeholder="Body"></textarea>
    <img id="post-image" src=""  style="margin-top: 1rem;"/>
    <input type="file" name="post-image" accept=".jpg, .jpeg, .png" 
    onchange="$('#post-image').attr('src', window.URL.createObjectURL(this.files[0]))">
    <input type="submit" value="create">
</form>

@stop