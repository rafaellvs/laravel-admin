@extends('layouts.admin')

@section('content')

<section class="container-fluid">
    <div class="row posts">
        <div class="col-12" style="padding: 0;">
            <h2>Banners</h2>

            @if(session('created'))
                <p style="color: green; margin: 0;">Banner successfully created.</p>
            @elseif(session('updated'))
                <p style="color: green; margin: 0;">Banner successfully updated.</p>
            @elseif(session('deleted'))
                <p style="color: red; margin: 0;">Banner successfully deleted.</p>
            @endif

            <div style="width: 150px;">
                <a href="/admin/banners/create">
                    <button type="button" class="btn-default">create</button>
                </a>
            </div>
        </div>
        @if($banners->isEmpty())
            <div class="col-12">
                <p>No banners on database.</p>
            </div>
        @else
            @foreach ($banners as $banner)
                <div class="col-8 post">
                    <div class="post-title">
                        {{ $banner->title }}
                    </div>

                    <div>
                        <img src="{{ asset($banner->image) }}" class="banner-image" />
                    </div>
            
                    <div class="btns">
                        <a href="/admin/banners/{{ $banner->id }}">
                            <button type="button" class="bttn show">show</button>
                        </a>
                        
                        <a href="/admin/banners/{{ $banner->id }}/edit">
                            <button type="button" class="bttn edit">edit</button>
                        </a>
    
                        <form action="/admin/banners/{{ $banner->id }}" method="POST">
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