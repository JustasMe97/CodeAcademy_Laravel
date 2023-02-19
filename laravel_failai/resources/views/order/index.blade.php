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
                            <div class="d-flex flex-row">
                                <a role="button" class="btn btn-dark mr-1 ml-1" href="{{route('orders.edit', $order->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-pen" viewBox="0 0 16 16">
                                        <path
                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
                                    </svg>
                                    Edit
                                </a>
                                {{--                            <a href="{{route('orders.edit', $order->id)}}" class="btn blue darken-4 me-5">Edit</a>--}}
                                <form action="{{route('orders.destroy', $order->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    {{--                                <button type="submit" class="btn blue darken-4 mr-1">Delete</button>--}}
                                    <button type="submit" class="btn btn-danger mr-1 ml-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                            <path fill-rule="evenodd"
                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                                <a role="button" class="btn btn-secondary mr-1 ml-1" href="{{route('orders.show', $order->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                    </svg>
                                    Review
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
