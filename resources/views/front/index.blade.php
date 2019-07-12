@extends('layouts.master')
    
@section('content')

<!-- HEADER -->
<section class="container-fluid">
    <div class="row header">
        <div class="col-9">
            <h1>HEADER</h1>
        </div>
        
        <div class="col-3">
            @if(isset($loginFailed))
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
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>

                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('images/banner-1.png') }}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/banner-2.png') }}" alt="Second slide">
                  </div>
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
    <div class="row">
        <div class="col-12 text-center">
            <h1>Posts</h1>

            <div class="row posts">
                @foreach ($posts as $post)
                    <div class="col-4 post">
                        <h4>{{ $post->title }}</h4>
                        <p>{{ $post->body }}</p>
                    </div>
                @endforeach    
            </div>
        </div>
    </div>
</section>

@stop