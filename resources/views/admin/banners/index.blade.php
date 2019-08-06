@extends('layouts.admin')

@section('content')

<section class="container-fluid">
    <div class="row resources">
        <div class="col-12 no-padding">
            <h2>Banners</h2>

            @if(session('created'))
                <p class="success">Banner successfully created.</p>
            @elseif(session('updated'))
                <p class="success">Banner successfully updated.</p>
            @elseif(session('deleted'))
                <p class="error">Banner successfully deleted.</p>
            @endif

            <div>
                <a href="/admin/banners/create">
                    <button type="button" class="btn-default">create</button>
                </a>
            </div>
        </div>

        @if($banners->isEmpty())
            <div class="col-12 no-padding">
                <p>No banners on database.</p>
            </div>
        @else
            @foreach ($banners as $banner)
                <div class="col-8 resource">
                    <div class="title">
                        {{ $banner->title }}
                    </div>

                    <div>
                        <img src="{{ asset($banner->image) }}" class="image banner" />
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