@extends('layouts.admin.main')

@section('title', 'New PaymentType')

@section('content')
    <h1>Creating new payment type</h1>
    <span>Payment type creating form:</span>
    <form action="{{route('paymentTypes.store')}}" method="post">
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Create">
        @csrf
    </form>
@endsection

