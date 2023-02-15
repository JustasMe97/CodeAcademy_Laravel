@extends('layouts.admin.main')

@section('title', 'New Status')

@section('content')
    <h1>Creating new status</h1>
    <span>Status creating form:</span>
    <form action="{{route('statuses.store')}}" method="post">
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name')}}"><br>
        <input type="text"
               name="type"
               placeholder="Type"
               class="@error('type') is-invalid @enderror"
               value="{{old('type')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Create">
        @csrf
    </form>
@endsection

