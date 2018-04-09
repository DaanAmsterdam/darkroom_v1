@extends('layouts.master')

@section('content')

    @include('layouts.errors')

    <h2>Publish a photo</h2>
    <form method="POST" action="/photos" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div>
            <label for="body">Body</label>
            <textarea id="body" name="body"></textarea>
        </div>

        <div>
            <label for="photo">File Upload</label>
            <input type="file" id="photo" name="photo" required>
        </div>

        <div>
            <button type="submit">Publish</button>
        </div>
    </form>
    
@endsection
