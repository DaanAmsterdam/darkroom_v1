@extends('layouts.master')

@section('content')

    <ul>
    @foreach ($photos as $photo)
    <li>
        <a href="/photos/{{ $photo->id }}">
            {{ $photo->title }}<br>
        </a>
    </li>
    @endforeach
    </ul>
    
@endsection
