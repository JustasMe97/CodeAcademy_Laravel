@extends('layouts.admin.main')

@section('title', 'Category review')

@section('content')
    <input type="text"
           name="name"
           placeholder="Name"
           value="{{$category?->name}}"><br>
    <input type="text"
           name="slug"
           placeholder="Slug"
           value="{{$category?->slug}}"><br>
    <input type="text"
           name="description"
           placeholder="Description"
           value="{{$category?->description}}"><br>
    <input type="text"
           name="image"
           placeholder="Image"
           value="{{$category?->image}}"><br>
    <input type="text"
           name="status_id"
           placeholder="Status ID"
           value="{{$category?->status_id}}"><br>
    <input type="text"
           name="parent_id"
           placeholder="Parent ID"
           value="{{$category?->parent_id}}"><br>
    <input type="text"
           name="sort_order"
           placeholder="Sort Order"
           value="{{$category?->sort_order}}"><br>
    <x-forms.buttons.action :model="$category" mainRoute="categories"/>
@endsection
