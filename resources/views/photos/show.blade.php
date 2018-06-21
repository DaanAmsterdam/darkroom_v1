@extends('layouts.master') 
@section('content')

<?php // var_dump( $photo ); ?>

<div class="bg-grey-light w-full">

    <h2>{{ $photo->title }}</h2>

    <p>{{ $photo->created_at->diffForHumans() }} by {{ $photo->user->name }}</p>

    <p>{{ $photo->body }}</p>

    <p>{{ $photo->camera }}</p>
    <p>{{ $photo->lens }}</p>
    <p>{{ $photo->shot_at }}</p>
    <p>{{ $photo->shutter_speed }}</p>
    <p>{{ $photo->aperture }}</p>
    <p>{{ $photo->iso }}</p>
    <p>{{ $photo->focallength }}</p>
    <p>{{ $photo->nd }}</p>
    <p>{{ $photo->tripod }}</p>
    <p>{{ $photo->gps }}</p>

    <img src="{{ $photo->getFirstMedia()->getUrl('300') }}">
    <a href="{{ $photo->getFirstMedia()->getUrl('1200') }}">1200</a>
    <a href="{{ $photo->getFirstMedia()->getUrl('1600') }}">1600</a>
    <a href="{{ $photo->getFirstMediaUrl() }}">1920</a>

    <h1>My responsive images</h1>
    {{ $photo->getFirstMedia() }}


</div>
@endsection