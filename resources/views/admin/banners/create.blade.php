@extends('layouts.admin')

@section('content')

<h3>Create banner</h3>

@if(session('created'))
    <p style="color: green; margin: 0;">Banner successfully created.</p>
@endif

<form action="/admin/banners" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Title">
    <img id="banner-image" src="" />
    <input type="file" name="banner-image" accept=".jpg, .jpeg, .png" onchange="$('#banner-image').attr('src', window.URL.createObjectURL(this.files[0]))">
    <input type="submit" value="create">
</form>

@stop