@extends('layouts.admin.main')

@section('title', 'Creating User')

@section('content')
    <h1>Creating User</h1>
    <span>Creating</span>
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name')}}"><br>
        <input type="text"
               name="email"
               placeholder="E. paštas"
               class="@error('email') is-invalid @enderror"
               value="{{old('email')}}"><br>
        <input type="password"
               name="password"
               placeholder="Password"
               class="@error('password') is-invalid @enderror"
               value="{{old('password')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Create">
    </form>
@endsection
