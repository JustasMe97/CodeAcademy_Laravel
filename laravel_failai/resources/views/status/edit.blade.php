@extends('layouts.admin.main')

@section('title', 'Editing status')

@section('content')
    <h1>Editing </h1>
    <span>Status editing form:</span>
    <form action="{{route('statuses.update', $status->id)}}" method="post">
        @method('PUT')
        @csrf
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name') ?? $status->name}}"><br>
        <input type="text"
               name="type"
               placeholder="Type"
               class="@error('type') is-invalid @enderror"
               value="{{old('type') ?? $status->type}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Update">
    </form>
@endsection

