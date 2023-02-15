@extends('layouts.admin.main')

@section('title', 'Editing payment type')

@section('content')
    <h1>Editing </h1>
    <span>Payment type editing form:</span>
    <form action="{{route('paymentTypes.update', $paymentType->id)}}" method="post">
        @method('PUT')
        @csrf
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name') ?? $paymentType->name}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Update">
    </form>
@endsection

