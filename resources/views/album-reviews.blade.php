@extends('main-layout') 
@section('title', 'Artists') 
@section('content')
<ul>
    @foreach($reviews as $review)
    <div>
        <h2>{{$review->title}}</h2>
        <p>{{$review->body}}</p>
    </div>
    @endforeach
</ul>
@endsection