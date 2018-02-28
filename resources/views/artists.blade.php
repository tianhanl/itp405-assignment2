@extends('main-layout') 
@section('title', 'Artists') 
@section('content')
<ul>
    @foreach($artists as $artist)
    <li>
        <a href="/artists/{{$artist->ArtistId}}">
                {{$artist->Name}}
            </a>
        <a href="/artists/{{$artist->ArtistId}}/albums">
                Albums
            </a>
    </li>
    @endforeach
</ul>
@endsection