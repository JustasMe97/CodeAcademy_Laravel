@extends('layouts.admin.main')

@section('title', 'New address')

@section('content')
    <h1>Creating new address</h1>
    <span>Address creating form:</span>
    <form action="{{route('addresses.store')}}" method="post">
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name')}}"><br>
        <input type="text"
               name="country"
               placeholder="Country"
               class="@error('country') is-invalid @enderror"
               value="{{old('country')}}"><br>
        <input type="text"
               name="city"
               placeholder="City"
               class="@error('city') is-invalid @enderror"
               value="{{old('city')}}"><br>
        <input type="text"
               name="zip"
               placeholder="Zip code"
               class="@error('zip') is-invalid @enderror"
               value="{{old('zip')}}"><br>
        <input type="text"
               name="street"
               placeholder="Street"
               class="@error('street') is-invalid @enderror"
               value="{{old('street')}}"><br>
        <input type="text"
               name="house_number"
               placeholder="House number"
               class="@error('house_number') is-invalid @enderror"
               value="{{old('house_number')}}"><br>
        <input type="text"
               name="state"
               placeholder="State"
               class="@error('state') is-invalid @enderror"
               value="{{old('state')}}"><br>
        <input type="text"
               name="type"
               placeholder="Type"
               class="@error('type') is-invalid @enderror"
               value="{{old('type')}}"><br>
        <input type="text"
               name="additional_info"
               placeholder="Additional info"
               class="@error('additional_info') is-invalid @enderror"
               value="{{old('additional_info')}}"><br>
        <input type="text"
               name="user_id"
               placeholder="User ID"
               class="@error('user_id') is-invalid @enderror"
               value="{{old('user_id')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Create">
        @csrf
    </form>
@endsection

