@extends('layouts.admin')

@section('content')

    <h1>View banner</h1>

    <div class="col-4 post-show">
        <img src="{{ asset($banner->image) }}">
        <h4>{{ $banner->title }}</h4>
    </div>

    <div class="btns-show">
        <a href="/admin/banners/{{ $banner->id }}/edit">
            <button type="button" class="bttn edit">edit</button>
        </a>

        <form action="/admin/banners/{{ $banner->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="bttn delete">delete</button>
        </form>
    </div>

@stop