@extends('layouts.admin.main')

@section('title', 'Products')

@section('content')
    <h1>Editing </h1>
    <span>Product editing form:</span>
    <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="text"
               name="name"
               placeholder="Name"
               class="@error('name') is-invalid @enderror"
               value="{{old('name') ?? $product->name}}"><br>
        <input type="text"
               name="slug"
               placeholder="Slug"
               class="@error('slug') is-invalid @enderror"
               value="{{old('slug') ?? $product->slug}}"><br>
        <input type="text"
               name="description"
               placeholder="Description"
               class="@error('description') is-invalid @enderror"
               value="{{old('description') ?? $product->description}}"><br>
        <input type="file"
               name="image"
               placeholder="Image"
               class="@error('image') is-invalid @enderror"
               value="{{old('image') ?? $product->image}}"><br>
        <input type="text"
               name="category_id"
               placeholder="Category ID"
               class="@error('category_id') is-invalid @enderror"
               value="{{old('category_id') ?? $product->category_id}}"><br>
        <input type="text"
               name="color"
               placeholder="Color"
               class="@error('color') is-invalid @enderror"
               value="{{old('color') ?? $product->color}}"><br>
        <input type="text"
               name="size"
               placeholder="Size"
               class="@error('size') is-invalid @enderror"
               value="{{old('size') ?? $product->size}}"><br>
        <input type="text"
               name="price"
               placeholder="Price"
               class="@error('price') is-invalid @enderror"
               value="{{old('price') ?? $product->price}}"><br>
        <input type="text"
               name="status_id"
               placeholder="Status ID"
               class="@error('status_id') is-invalid @enderror"
               value="{{old('status_id') ?? $product->status_id}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Update">
    </form>
@endsection
