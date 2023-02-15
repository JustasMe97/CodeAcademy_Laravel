@extends('layouts.admin.main')

@section('title', 'Categories')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Payment Types </h1>
            <a href="{{route('paymentTypes.create')}}" class="btn blue darken-4 mr-1">Create new</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paymentTypes as $paymentType)
                    <tr>
                        <td>{{$paymentType->id}}</td>
                        <td>{{$paymentType->name}}</td>
                        <td>
                            <a href="{{route('paymentTypes.edit', $paymentType->id)}}" class="btn blue darken-4 me-5">Edit</a>
                            <form action="{{route('paymentTypes.destroy', $paymentType->id)}}" method="post">
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
