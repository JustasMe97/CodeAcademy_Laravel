
@extends('layouts.admin.main')

@section('title', 'Editing person')

@section('content')
    <h1>Editing</h1>
    <span>Editing {{$person->name}}</span>
    <form action="{{route('persons.update', $person)}}" method="post">
        @method('PUT')
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name') ?? $person->name}}"><br>
        <input type="text"
               name="surname"
               placeholder="Surname"
               class="@error('surname') is-invalid @enderror"
               value="{{old('surname') ?? $person->surname}}"><br>
        <input type="text"
               name="personal_code"
               placeholder="Asmens kodas"
               class="@error('personal_code') is-invalid @enderror"
               value="{{old('personal_code') ?? $person->personal_code}}"><br>
        <input type="text"
               name="email"
               placeholder="E. paštas"
               class="@error('email') is-invalid @enderror"
               value="{{old('email') ?? $person->email}}"><br>
        <input type="text"
               name="phone"
               placeholder="Tel. nr."
               class="@error('phone') is-invalid @enderror"
               value="{{old('phone') ?? $person->phone}}"><br>
        <hr>
        <input type="text"
               name="user_id"
               placeholder="User ID"
               class="@error('user_id') is-invalid @enderror"
               value="{{old('user_id') ?? $person->user_id}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Update">
        @csrf
    </form>
@endsection
