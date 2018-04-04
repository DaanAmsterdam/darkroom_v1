@extends('layouts.master')

@section('content')

<h2>{{ $photo->title }}</h2>

<p>{{ $photo->created_at->diffForHumans() }} by {{ $photo->user->name }}</p>

<p>{{ $photo->body }}</p>

@endsection
