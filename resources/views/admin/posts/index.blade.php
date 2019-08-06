@extends('layouts.admin')

@section('content')

<section class="container-fluid">
    <div class="row resources">
        <div class="col-12 no-padding">
            <h2>Posts</h2>

            @if(session('created'))
                <p class="success">Post successfully created.</p>
            @elseif(session('updated'))
                <p class="success">Post successfully updated.</p>
            @elseif(session('deleted'))
                <p class="error">Post successfully deleted.</p>
            @endif

            <div>
                <a href="/admin/posts/create">
                    <button type="button" class="btn-default">create</button>
                </a>
            </div>
        </div>

        @if($posts->isEmpty())
            <div class="col-12 no-padding">
                <p>No posts on database.</p>
            </div>
        @else
            @foreach ($posts as $post)
                <div class="col-12 resource">
                    <div class="title">
                        {{ $post->title }}
                    </div>

                    <div class="body">
                        {{ $post->body }}
                    </div>

                    <div>
                        <img src="{{ asset($post->image) }}" class="image" />
                    </div>

                    <div class="author">
                        <h6>{{ $post->user_name }}</h6>
                    </div>
                    
                    <div class="btns">
                        <a href="/admin/posts/{{ $post->id }}">
                            <button type="button" class="bttn show">show</button>
                        </a>
                        
                        @can('edit', $post)
                            <a href="/admin/posts/{{ $post->id }}/edit">
                                <button type="button" class="bttn edit">edit</button>
                            </a>    
                        @endcan
                        
                        @can('delete', $post)
                            <form action="/admin/posts/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="bttn delete">delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

@stop