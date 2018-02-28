@extends('main-layout') 
@section('title', 'Make a Review') 
@section('content')
<h1>Make a Reviewt</h1>
@if ($errors->isNotEmpty())
<div class="alert alert-danger" role="alert">
    @foreach($errors->all() as $message) {{$message}} @endforeach
</div>
@endif
<form action="/albums/{{$id}}/reviews" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" value="{{old('title')}}" id="title" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="body">Title</label>
        <input type="text" value="{{old('body')}}" id="body" name="body" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection