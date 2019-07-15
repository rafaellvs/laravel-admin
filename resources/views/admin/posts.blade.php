@extends('layouts.admin')

@section('content')

<section class="container-fluid">
    <div class="row posts">
        <div class="col-12" style="padding: 0;">
            <h2>Posts</h2>
        </div>

        @if($posts->isEmpty())
            <div class="col-12">
                <p>No posts on database.</p>
            </div>
        @else
            @foreach ($posts as $post)
                <div class="col-8 post">
                    <div class="post-title">{{ $post->title }}</div>

                    <div class="post-body">{{ $post->body }}</div>

                    <img src="{{ asset($post->image) }}" class="post-image" />

                    <div class="btns">
                        <a href="#">
                            <button type="button" class="btn">edit</button>
                        </a>
    
                        <a href="#">
                            <button type="button" class="btn">delete</button>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

@stop