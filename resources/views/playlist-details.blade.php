@extends('main-layout') 
@section('title','Playlist: '.$playlist->Name) 
@section('content')
<h1>
    {{$playlist->Name}}
</h1>
<h2>
    Tracks
</h2>
<ul>
    @foreach($tracks as $track)
    <li>
        {{$track->Name}}
    </li>
    @endforeach
</ul>
@endsection