@extends('layouts.admin')

@section('content')

<h3>Create post</h3>

@if(session('created'))
    <p style="color: green; margin: 0;">Post successfully created.</p>
@endif

<form action="/admin/createpost" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Title">
    <textarea name="body" placeholder="Body"></textarea>
    <input type="file" name="post-image" accept=".jpg, .jpeg, .png">
    <input type="submit" value="create">
</form>

@stop