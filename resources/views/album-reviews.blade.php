@extends('main-layout') 
@section('title', 'Artists') 
@section('content') @foreach($reviews as $review)
<div>
    <h2>{{$review->title}}</h2>
    <p>{{$review->body}}</p>
</div>
@endforeach
<a href="/albums/{{$id}}/reviews/new">Write a Review</a>
@endsection