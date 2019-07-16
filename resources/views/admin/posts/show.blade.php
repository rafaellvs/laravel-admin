@extends('layouts.admin')

@section('content')

    <h1>View post</h1>

    <div class="col-4 post-show">
        <img src="{{ asset($post->image) }}">
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->body }}</p>
    </div>

    <div class="btns-show">
        <a href="/admin/posts/{{ $post->id }}/edit">
            <button type="button" class="btn edit">edit</button>
        </a>

        <form action="/admin/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn delete">delete</button>
        </form>
    </div>

@stop