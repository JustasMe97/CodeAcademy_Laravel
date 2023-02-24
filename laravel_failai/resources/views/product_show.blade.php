{{--@extends('layouts.admin.main')--}}
{{--@section('content')--}}
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{$product->image}}" alt="produktas">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <div class="card-content">
            <div>ID: {{$product->id}}</div>
            <p>Price: {{ $product->price }}</p>
            <p>Description: {{ $product->description }}</p>
            <p>Categories: {{ $product->category->name }}</p>
            <p>Creation date: {{ $product->created_at }}</p>
            <p>Last updated: {{ $product->updated_at }}</p>
        </div>
        <div class="card-action">
            <form action="{{route('product.add_to_cart')}}" method="POST">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type=number name="quantity" value="1">
                <button type="submit" class="btn btn-dark mr-1 ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    Add to cart
                </button>
                @csrf
            </form>
        </div>
    </div>
</div>
{{--@endsection--}}
