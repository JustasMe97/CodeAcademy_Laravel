@extends('layouts.admin.main')

@section('title', 'Category review')

@section('content')
    <input type="text"
           name="name"
           placeholder="Name"
           value="{{$address->name}}"><br>
    <input type="text"
           name="country"
           placeholder="Country"
           value="{{$address->country}}"><br>
    <input type="text"
           name="city"
           placeholder="City"
           value="{{$address->city}}"><br>
    <input type="text"
           name="zip"
           placeholder="Zip code"
           value="{{$address->zip}}"><br>
    <input type="text"
           name="house_number"
           placeholder="House number"
           value="{{$address->house_number}}"><br>
    <input type="text"
           name="state"
           placeholder="State"
           value="{{$address->state}}"><br>
    <input type="text"
           name="type"
           placeholder="Type"
           value="{{$address->type}}"><br>
    <input type="text"
           name="additional_info"
           placeholder="Additional info"
           value="{{$address->additional_info}}"><br>
    <input type="text"
           name="user_id"
           placeholder="User ID"
           value="{{$address->user_id}}"><br>
    <hr>
@endsection
