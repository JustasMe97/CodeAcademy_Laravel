@extends('layouts.admin.main')

@section('title', 'Addresses')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Addresses </h1>
            <a href="{{route('addresses.create')}}" class="btn blue darken-4 mr-1">Create new</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Zip</th>
                    <th>Street</th>
                    <th>House number</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($addresses as $address)
                    <tr>
                        <td>{{$address->id}}</td>
                        <td>{{$address->name}}</td>
                        <td>{{$address->country}}</td>
                        <td>{{$address->city}}</td>
                        <td>{{$address->zip}}</td>
                        <td>{{$address->street}}</td>
                        <td>{{$address->house_number}}</td>
                        <td>
                            <a href="{{route('addresses.edit', $address->id)}}" class="btn blue darken-4 me-5">Edit</a>
                            <form action="{{route('addresses.destroy', $address->id)}}" method="post">
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
