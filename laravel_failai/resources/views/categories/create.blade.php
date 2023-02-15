@extends('layouts.admin.main')

@section('title', 'New Category')

@section('content')
    <h1>Creating new category</h1>
    <span>Category creating form:</span>
    <form action="{{route('categories.store')}}" method="post">
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
        <input type="text"
               name="image"
               placeholder="Image"
               class="@error('image') is-invalid @enderror"
               value="{{old('image')}}"><br>
        <input type="text"
               name="status_id"
               placeholder="Status ID"
               class="@error('status_id') is-invalid @enderror"
               value="{{old('status_id')}}"><br>
        <input type="text"
               name="parent_id"
               placeholder="Parent ID"
               class="@error('parent_id') is-invalid @enderror"
               value="{{old('parent_id')}}"><br>
        <input type="text"
               name="sort_order"
               placeholder="Sort Order"
               class="@error('sort_order') is-invalid @enderror"
               value="{{old('sort_order')}}"><br>
        <hr>
        <input type="submit" class="waves-effect waves-light btn blue darken-4" value="Create">
        @csrf
    </form>
@endsection

