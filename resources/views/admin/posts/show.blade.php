@extends('layouts.admin')

@section('content')

    <h1>View post</h1>

    <div class="col-4 resource-show">
        <img src="{{ $post->image }}">
        <h4>{{ $post->title }}</h4>
        <p style="margin-bottom: 1rem;">{{ $post->body }}</p>
        <p><strong>author:</strong> {{ $post->user_name }}</p>
        <p><strong>created at:</strong> {{ $post->created_at->format('d/m/Y H\hi') }}</p>
    </div>

    <div class="col-4 btns-show">
        <a href="/admin/posts/{{ $post->id }}/edit">
            <button type="button" class="bttn edit">edit</button>
        </a>

        <form action="/admin/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="bttn delete">delete</button>
        </form>
    </div>

@stop