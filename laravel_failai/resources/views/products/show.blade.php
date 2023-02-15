@extends('layouts.admin.main')

@section('title', 'Product review')

@section('content')
    <div class="row">
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="{{$product->image}}" alt="produktas">
                    <span class="card-title">{{ $product->name }}</span>
                </div>
                <div class="card-content">
                    <div>ID: {{$product->id}}</div>
                    <p>Price: {{ $product->price }}</p>
                    <p>Description: {{ $product->description }}</p>
                    <p>Categories: {{ $product->category->name }}</p>
                    <p>Creation date: {{ $product->created_at }}</p>
                    <p>Last updated: {{ $product->updated_at }}</p>
                </div>
                <div class="card-action">
                    <a href="{{ route('products.edit', $product->id) }}"
                       data-tooltip="Redaguoti"
                       class="tooltipped waves-effect waves-light btn-small blue darken-4">
                        <i class="tiny material-icons">edit</i>
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" data-tooltip="Delete"
                                class="tooltipped waves-effect waves-light btn-small blue darken-4">
                            <i class="tiny material-icons">delete</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
