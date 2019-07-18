@extends('layouts.admin')

@section('content')

<section class="container-fluid">
    <div class="row posts">
        <div class="col-12" style="padding: 0;">
            <h2>Posts</h2>

            @if(session('created'))
                <p style="color: green; margin: 0;">Post successfully created.</p>
            @elseif(session('updated'))
                <p style="color: green; margin: 0;">Post successfully updated.</p>
            @elseif(session('deleted'))
                <p style="color: red; margin: 0;">Post successfully deleted.</p>
            @endif

            <div style="width: 150px;">
                <a href="/admin/posts/create">
                    <button type="button" class="btn-default">create</button>
                </a>
            </div>
        </div>
        @if($posts->isEmpty())
            <div class="col-12" style="padding: 0;">
                <p>No posts on database.</p>
            </div>
        @else
            @foreach ($posts as $post)
                <div class="col-8 post">
                    <div class="post-title">
                        {{ $post->title }}
                    </div>

                    <div class="post-body">
                        {{ $post->body }}
                    </div>

                    <div class="post-image">
                        <img src="{{ asset($post->image) }}" class="post-image" />
                    </div>
            
                    <div class="btns">
                        <a href="/admin/posts/{{ $post->id }}">
                            <button type="button" class="bttn show">show</button>
                        </a>
                        
                        <a href="/admin/posts/{{ $post->id }}/edit">
                            <button type="button" class="bttn edit">edit</button>
                        </a>
    
                        <form action="/admin/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bttn delete">delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

@stop