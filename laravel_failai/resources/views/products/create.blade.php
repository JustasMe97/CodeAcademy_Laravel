@extends('layouts.admin.main')

@section('title', 'New Product')

@section('content')
    <h1>Creating new product</h1>
    <span>Product creating form:</span>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    <input type="text"
           name="name"
           placeholder="Name"
           class="@error('name') is-invalid @enderror"
           value="{{old('name')}}"><br>
    <input type="text"
           name="slug"
           placeholder="Slug"
           class="@error('slug') is-invalid @enderror"
           value="{{old('slug')}}"><br>
    <input type="text"
           name="description"
           placeholder="Description"
           class="@error('slug') is-invalid @enderror"
           value="{{old('slug')}}"><br>
    <input type="file"
           name="image"
           placeholder="Image"
           class="@error('image') is-invalid @enderror"
           value="{{old('image')}}"><br>
    <input type="text"
           name="category_id"
           placeholder="Category ID"
           class="@error('category_id') is-invalid @enderror"
           value="{{old('category_id')}}"><br>
    <input type="text"
           name="color"
           placeholder="Color"
           class="@error('color') is-invalid @enderror"
           value="{{old('color')}}"><br>
    <input type="text"
           name="size"
           placeholder="Size"
           class="@error('size') is-invalid @enderror"
           value="{{old('size')}}"><br>
    <input type="text"
           name="price"
           placeholder="Price"
           class="@error('price') is-invalid @enderror"
           value="{{old('price')}}"><br>
    <input type="text"
           name="status_id"
           placeholder="Status ID"
           class="@error('status_id') is-invalid @enderror"
           value="{{old('status_id')}}"><br>
    <hr>
    <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Create">
    @csrf
    </form>
@endsection
