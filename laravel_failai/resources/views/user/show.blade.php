@extends('layouts.admin.main')

@section('title', 'Person review')

@section('content')
    <input type="text" name="id" placeholder="ID" value="{{$user?->id}}"><br>
    <input type="text" name="name" placeholder="Name" value="{{$user?->name}}"><br>
    <input type="text" name="email" placeholder="Email" value="{{$user?->email}}"><br>
    <input type="text" name="role" placeholder="Role" value="{{$user?->role}}"><br>
@endsection
