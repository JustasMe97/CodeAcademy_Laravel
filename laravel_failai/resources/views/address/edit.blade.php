@extends('layouts.admin.main')

@section('title', 'Editing address')

@section('content')
    <h1>Editing </h1>
    <span>Category editing form:</span>
    <form action="{{route('addresses.update', $address->id)}}" method="post">
        @method('PUT')
        @csrf
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name') ?? $address->name}}"><br>
        <input type="text"
               name="country"
               placeholder="Country"
               class="@error('country') is-invalid @enderror"
               value="{{old('country') ?? $address->country}}"><br>
        <input type="text"
               name="city"
               placeholder="City"
               class="@error('city') is-invalid @enderror"
               value="{{old('city') ?? $address->city}}"><br>
        <input type="text"
               name="zip"
               placeholder="Zip code"
               class="@error('zip') is-invalid @enderror"
               value="{{old('zip') ?? $address->zip}}"><br>
        <input type="text"
               name="street"
               placeholder="Street"
               class="@error('street') is-invalid @enderror"
               value="{{old('street') ?? $address->street}}"><br>
        <input type="text"
               name="house_number"
               placeholder="House number"
               class="@error('house_number') is-invalid @enderror"
               value="{{old('house_number') ?? $address->house_number}}"><br>
        <input type="text"
               name="state"
               placeholder="State"
               class="@error('state') is-invalid @enderror"
               value="{{old('state') ?? $address->state}}"><br>
        <input type="text"
               name="type"
               placeholder="Type"
               class="@error('type') is-invalid @enderror"
               value="{{old('type') ?? $address->type}}"><br>
        <input type="text"
               name="additional_info"
               placeholder="Additional info"
               class="@error('additional_info') is-invalid @enderror"
               value="{{old('additional_info') ?? $address->additional_info}}"><br>
        <input type="text"
               name="user_id"
               placeholder="User ID"
               class="@error('user_id') is-invalid @enderror"
               value="{{old('user_id') ?? $address->user_id}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Update">
    </form>
@endsection

