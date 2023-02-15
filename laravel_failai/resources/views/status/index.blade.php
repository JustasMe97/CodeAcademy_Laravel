@extends('layouts.admin.main')

@section('title', 'Statuses')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Status </h1>
            <a href="{{route('statuses.create')}}" class="btn blue darken-4 mr-1">Create new</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($statuses as $status)
                    <tr>
                        <td>{{$status->id}}</td>
                        <td>{{$status->name}}</td>
                        <td>{{$status->type}}</td>
                        <td>
                            <a href="{{route('statuses.edit', $status->id)}}" class="btn blue darken-4 me-5">Edit</a>
                            <form action="{{route('statuses.destroy', $status->id)}}" method="post">
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
