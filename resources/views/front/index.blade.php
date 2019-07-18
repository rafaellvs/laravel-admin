@extends('layouts.master')
    
@section('content')

<!-- CAROUSEL BANNERS -->
<section class="container-fluid">
    <div class="row banners">
        <div class="col-10 text-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($banners as $banner)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" @if($loop->first) class="active" @endif></li>
                    @endforeach
                </ol>

                <div class="carousel-inner">
                    @foreach ($banners as $banner)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img src="{{ asset($banner->image) }}">
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- POSTS -->
<section  class="container-fluid">
    <div class="row posts">
        <div class="col-12 text-center">
            <h1>Posts</h1>

            <div class="row justify-content-center">
                @if( $posts->isEmpty() )
                    <div class="col-8 text-center">
                        <p>No posts to show.</p>
                    </div>
                @else
                    @foreach ($posts as $post)
                        <div class="col-4 post">
                            <img src="{{ $post->image }}">
                            <h4>{{ $post->title }}</h4>
                            <p class="post-body">{{ $post->body }}</p>

                            <a href="/view-post/{{ $post->id }}" class="post-link">
                                <button type="button" class="btn-default">more...</button>
                            </a>
                        </div>
                    @endforeach    
                @endif
            </div>
        </div>
    </div>
</section>

@stop