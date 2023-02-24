@extends('layouts.admin.main')

@section('title', 'Home page')

@section('content')
    <section class="d-flex">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <div class="h1 text-light my-3"> Welcome to <span class="text-dark">our new</span> E-Shop</div>
        </div>
        <div class="col-6">
            <img class="img-fluid my-3 rounded-circle" src="/img/shop.jpg" alt="shop">
        </div>
    </section>



    <div class="">
        <div class="text-light my-3 d-flex justify-content-center"><h1><b>Latest Products</b></h1></div>
        <div class="row">

            @foreach($products as $product)
                <div class="col-auto m-1">
                    <div class="card m-3 bg-dark text-light" style="width: 18rem;">
                        <div class="m-2"><img class="img-fluid rounded" src="{{$product->image}}" alt="produktas"></div>
                        <div class="card-body">

                            <h3 class="card-title text-center mx-1">{{ $product->name }}</h3>
                            <div class="card-content">
                                <p>Category: {{$product->category->name}}</p>
                                <p>Price: {{ $product->price }}</p>
                                <p>Description: {{ $product->description }}</p>
                            </div>

                            <div class="card-action d-flex justify-content-center">
                                <form action="{{route('product.add_to_cart')}}" method="POST">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type=hidden name="quantity" value="1">
                                    <button type="submit" class="btn btn-light m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        Add to cart
                                    </button>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
