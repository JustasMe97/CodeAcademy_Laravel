@extends('layouts.admin.main')

@section('title', 'Editing Order')

@section('content')
    <h1>Editing </h1>
    <span>Order editing form:</span>
    <form action="{{route('orders.update', $order->id)}}" method="post">
        @method('PUT')
        @csrf
        <input type="text"
               name="user_id"
               placeholder="User ID"
               class="@error('user_id') is-invalid @enderror"
               value="{{old('user_id') ?? $order->user_id}}"><br>
        <input type="text"
               name="shipping_address_id"
               placeholder="Shipping address ID"
               class="@error('shipping_address_id') is-invalid @enderror"
               value="{{old('shipping_address_id') ?? $order->shipping_address_id}}"><br>
        <input type="text"
               name="billing_address_id"
               placeholder="Billing address ID"
               class="@error('billing_address_id') is-invalid @enderror"
               value="{{old('billing_address_id') ?? $order->billing_address_id}}"><br>
        <input type="text"
               name="status_id"
               placeholder="Status ID"
               class="@error('status_id') is-invalid @enderror"
               value="{{old('status_id') ?? $order->status_id}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Update">
    </form>
@endsection

