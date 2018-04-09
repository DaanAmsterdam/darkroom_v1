@extends('layouts.master')

@section('content')

    @include('layouts.errors')

    <h2>Upload a Photo</h2>
    <form method="POST" action="/photos/create" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div>
            <label for="title">File Upload</label>
            <input type="file" id="photo" name="photo" required>
        </div>

        <div>
            <button type="submit">Uploaden!</button>
        </div>
    </form>
    
@endsection
