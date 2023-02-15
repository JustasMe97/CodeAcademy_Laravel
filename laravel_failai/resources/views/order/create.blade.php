@extends('layouts.admin.main')

@section('title', 'New Order')

@section('content')
    <h1>Creating new order</h1>
    <span>Order creating form:</span>
    <form action="{{route('orders.store')}}" method="post">
        <input type="text"
               name="user_id"
               placeholder="User ID"
               class="@error('user_id') is-invalid @enderror"
               value="{{old('user_id')}}"><br>
        <input type="text"
               name="shipping_address_id"
               placeholder="Shipping address ID"
               class="@error('shipping_address_id') is-invalid @enderror"
               value="{{old('shipping_address_id')}}"><br>
        <input type="text"
               name="billing_address_id"
               placeholder="Billing address ID"
               class="@error('billing_address_id') is-invalid @enderror"
               value="{{old('billing_address_id')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Create">
        @csrf
    </form>
@endsection

