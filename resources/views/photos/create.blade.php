@extends('layouts.master') 
@section('content')
    @include('layouts.errors')

<h2>Publish a photo</h2><br>
<form method="POST" action="/photos" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div>
        <label for="photo">File Upload</label>
        <input type="file" id="photo" name="photo" required>
        <button type="submit">Publish</button>
    </div>
</form>
@endsection