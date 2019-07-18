@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 view-post">
                <h1>{{ $post->title }}</h1>
                <h6>created at: {{ $post->created_at->format('d/m/Y H:i') }}</h6>
                
                <img src="{{ $post->image }}" />

                <p>{{ $post->body }}</p>
            </div>
        </div>
    </div>
    
@stop