@extends('layouts.admin.main')

@section('title', 'Creating Person')

@section('content')
    <h1>Creating person</h1>
    <span>Creating</span>
    <form action="{{route('persons.store')}}" method="post">
        @csrf
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name')}}"><br>
        <input type="text"
               name="surname"
               placeholder="Surname"
               class="@error('surname') is-invalid @enderror"
               value="{{old('surname')}}"><br>
        <input type="text"
               name="personal_code"
               placeholder="Asmens kodas"
               class="@error('personal_code') is-invalid @enderror"
               value="{{old('personal_code')}}"><br>
        <input type="text"
               name="email"
               placeholder="E. paštas"
               class="@error('email') is-invalid @enderror"
               value="{{old('email')}}"><br>
        <input type="text"
               name="phone"
               placeholder="Tel. nr."
               class="@error('phone') is-invalid @enderror"
               value="{{old('phone')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Create">
    </form>
@endsection
