@extends('layouts.admin.main')

@section('title', 'Payment type review')

@section('content')
    <input type="text"
           name="name"
           placeholder="Name"
           value="{{$paymentType?->name}}"><br>
@endsection
