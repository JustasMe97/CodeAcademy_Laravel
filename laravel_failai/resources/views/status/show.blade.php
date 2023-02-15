@extends('layouts.admin.main')

@section('title', 'Status review')

@section('content')
    <input type="text"
           name="name"
           placeholder="Name"
           value="{{$status->name}}"><br>
    <input type="text"
           name="type"
           placeholder="Type"
           value="{{$status->type}}"><br>
    <hr>
@endsection
