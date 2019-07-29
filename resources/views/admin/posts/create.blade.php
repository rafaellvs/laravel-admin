@extends('layouts.admin')

@section('content')

<h3>Create post</h3>

<form action="/admin/posts" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Title">
    @error('title') <p class="error">{{ $message }}</p> @enderror

    <textarea name="body" placeholder="Body"></textarea>
    @error('body') <p class="error">{{ $message }}</p> @enderror

    <div class="preview-image">
        <img id="post-image" src="" style="margin-top: 1rem;"/>
        <button type="button" class="btn-remove d-none">x</button>
    </div>
    
    <input id="file-upload" type="file" name="post-image" accept=".jpg, .jpeg, .png">
    @error('post-image') <p class="error">{{ $message }}</p> @enderror

    <input type="submit" value="create" class="btn-default">
</form>

@stop

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.btn-remove').on('click', function(){
                $('#post-image').attr('src', '')
                $('#file-upload').val("")
                $(this).addClass('d-none')
            })

            $('#file-upload').on('change', function() {
                $('#post-image').attr('src', window.URL.createObjectURL(this.files[0]))
                $('.btn-remove').removeClass('d-none')
            })
        })
    </script>
@endpush