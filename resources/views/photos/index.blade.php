@extends('layouts.master') 
@section('content')
<div class="bg-grey-light w-full">

    @foreach ($photos as $photo)
    <a href="/photos/{{ $photo->id }}">
                 <img src="{{ $photo->getFirstMedia()->getUrl('300') }}">
            </a> @endforeach
</div>
@endsection