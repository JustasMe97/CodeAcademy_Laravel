@extends('layouts.admin.main')

@section('title', 'Orders')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Orders </h1>
            <a href="{{route('orders.create')}}" class="btn blue darken-4 mr-1">Create new</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Shipping address ID</th>
                    <th>Billing address ID</th>
                    <th>Status ID</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user_id}}</td>
                        <td>{{$order->shipping_address_id}}</td>
                        <td>{{$order->billing_address_id}}</td>
                        <td>{{$order->status_id}}</td>
                        <td>
                            <a href="{{route('orders.edit', $order->id)}}" class="btn blue darken-4 me-5">Edit</a>
                            <form action="{{route('orders.destroy', $order->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn blue darken-4 mr-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
