@extends('main-layout') 
@section('title', 'Albums') 
@section('content')
<ul>
    @foreach($albums as $album)
    <li>
        {{$album->Title}}
        <a href="/albums/{{$album->AlbumId}}/reviews">
                reviews
        </a>
    </li>
    @endforeach
</ul>
@endsection