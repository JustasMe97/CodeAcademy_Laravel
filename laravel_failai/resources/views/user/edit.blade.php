
@extends('layouts.admin.main')

@section('title', 'Editing User')

@section('content')
    <h1>Editing</h1>
    <span>Editing {{$user->name}}</span>
    <form action="{{route('users.update', $user)}}" method="post">
        @method('PUT')
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name') ?? $user->name}}"><br>
        <input type="text"
               name="email"
               placeholder="Email"
               class="@error('email') is-invalid @enderror"
               value="{{old('email') ?? $user->email}}"><br>
{{--        <input type="password"--}}
{{--               name="password"--}}
{{--               placeholder="Password"--}}
{{--               class="@error('password') is-invalid @enderror"--}}
{{--               value="{{old('password') ?? $user->password}}"><br>--}}
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Update">
        @csrf
    </form>
@endsection
