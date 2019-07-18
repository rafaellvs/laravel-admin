@extends('layouts.admin')

@section('content')

    <h1>Edit post</h1>

    <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <input type="text" name="title" value="{{ $post->title }}">
        @error('title') <p style="color: red;">{{ $message }}</p> @enderror

        <textarea name="body">{{ $post->body }}</textarea>
        @error('body') <p style="color: red;">{{ $message }}</p> @enderror

        <div class="preview-image">
            <img id="post-image" src="{{ $post->image }}" style="margin-top: 1rem;">

            <button type="button" class="btn-remove">x</button>

            <input type="checkbox" id="remove-img" name="remove-img" style="width: 1px;">
        </div>

        <input type="file" id="image-uploader" name="post-image" accept=".jpg, .jpeg, .png">
        @error('post-image') <p style="color: red;">{{ $message }}</p> @enderror

        <input type="submit" value="edit">
    </form>

@stop

@push('scripts')
    <script>
        $(document).ready(function(){
            if($('#post-image').attr('src') == '') {
                $('.btn-remove').css('display', 'none')
            }
            
            $('.btn-remove').on('click', function(){
                $('#remove-img').attr('checked', true)
                $('#post-image').attr('src', '')
                $('.btn-remove').css('display', 'none')
            })

            $('#image-uploader').on('change', function(){
                $('#remove-img').attr('checked', false)
                $('#post-image').attr('src', window.URL.createObjectURL(this.files[0]))
                $('.btn-remove').css('display', 'block')
            })
        })
    </script>
@endpush