@extends('layouts.master')
    
@section('content')

<!-- HEADER -->
<section class="container-fluid">
    <div class="row header">
        <div class="col-9">
            <h1>HEADER</h1>
        </div>
        
        <div class="col-3">
            @if(session('loginFailed'))
                <p style="color: red; font-weight: bold; margin: 0;">Dados incorretos.</p>
            @endif
            
            <form action="/admin" method="POST">
                {{ csrf_field() }}

                <input type="email" name="email" placeholder="E-mail">

                <input type="password" name="password" placeholder="Password">

                <button type="submit">login</button>
            </form>
        </div>
    </div>
</section>

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
                            <img src="{{ asset($post->image) }}">
                            <h4>{{ $post->title }}</h4>
                            <p>{{ $post->body }}</p>
                        </div>
                    @endforeach    
                @endif
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<section class="container-fluid">
    <div class="row footer">
        <div class="col-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint blanditiis voluptate ad, provident aspernatur natus corporis asperiores omnis dignissimos quibusdam suscipit accusantium praesentium ea laboriosam rerum quisquam hic earum debitis.
        </div>

        <div class="col-2">
            <a href="#" target="_blank">Facebook</a>
            <a href="#" target="_blank">Twister</a>
            <a href="#" target="_blank">Linkedin</a>
            <a href="#" target="_blank">Jansen</a>
            <a href="#" target="_blank">Insta</a>
        </div>
    </div>
</section>

@stop