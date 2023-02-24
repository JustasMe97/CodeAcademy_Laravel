@extends('layouts.admin.main')

@section('title', 'Cart Summary')

@section('content')
    <div class="row d-flex justify-content-between mt-2">
        <div class="col-8 bg-light my-1  rounded-left cart">
            <div class="d-flex flex-column">
                <h1>Cart</h1>
            </div>
            <table class="table">
                <thead>
                <tr>

                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total:</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $cartItem)
                    <tr>
                        <td>{{$cartItem->product_name}}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <form action="{{route('product.add_to_cart')}}" method="POST">
                                        <input type="hidden" name="product_id" value="{{ $cartItem->product_id }}">
                                        <input type=hidden name="quantity" value="1">
                                        <input type=hidden name="action" value="subtract">

                                        <button type="submit" class="btn btn-light d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                            </svg>
                                        </button>

                                        @csrf
                                    </form>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="{{route('product.add_to_cart')}}" method="POST">
                                        <input type="hidden" name="product_id" value="{{ $cartItem->product_id }}">
                                        <input type="number" name="quantity" value="{{$cartItem->quantity}}">
                                        <input type=hidden name="action" value="change">
                                        @csrf
                                    </form>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="{{route('product.add_to_cart')}}" method="POST">
                                        <input type="hidden" name="product_id" value="{{ $cartItem->product_id }}">
                                        <input type=hidden name="quantity" value="1">
                                        <input type=hidden name="action" value="add">
                                        <button type="submit" class="btn btn-light d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </button>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{$cartItem->price}}</td>
                        <td>{{$cartItem->total}}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <form action="{{route('cart.destroy', $cartItem)}}" method="post">
                                    @csrf
                                    @method('DELETE')
{{--                                    <input type="hidden" name="cartItem" value="{{ $cartItem }}">--}}
                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                            <path fill-rule="evenodd"
                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-4 bg-dark my-1 summary rounded-right text-light">
            <div class="my-2"><h5><b>Summary</b></h5></div>
            <hr class="bg-light">
            <div class="row">
                <div class="col">ITEMS: {{$itemCount}}</div>
                <div class="col text-right">&euro; {{$totalPriceBeforeTaxes}}</div>
            </div>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">Taxes 21%:</div>
                <div class="col text-right">&euro; {{$taxes}}</div>
            </div>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; {{$totalPrice}}</div>
            </div>
            <div class="d-flex my-2 justify-content-end">
                <button class="btn btn-light">CHECKOUT</button>
            </div>
        </div>
    </div>
@endsection
