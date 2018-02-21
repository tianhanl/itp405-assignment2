@extends('main-layout') 
@section('title', 'Settings') 
@section('content')
<form method="post" action="/settings/maintenance">
    {{ csrf_field() }}
    <label for="maintenance">Maintenance</label>
    <input type="checkbox" name="maintenance" value="maintenance" checked="{{$status->value == 1?'true':'false'}}">
    <input type="submit" value="Submit" class="btn btn-primary">
</form>
@endsection