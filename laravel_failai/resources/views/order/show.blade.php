@extends('layouts.admin.main')

@section('title', 'Order review')

@section('content')
    <input type="text"
           name="user_id"
           placeholder="User ID"
           value="{{$order?->user_id}}"><br>
    <input type="text"
           name="shipping_address_id"
           placeholder="Shipping address ID"
           value="{{$order?->shipping_address_id}}"><br>
    <input type="text"
           name="billing_address_id"
           placeholder="Billing address ID"
           value="{{$order?->billing_address_id}}"><br>
    <input type="text"
           name="status_id"
           placeholder="Status ID"
           value="{{$order?->status_id}}"><br>
@endsection
