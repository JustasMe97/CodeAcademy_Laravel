@extends('layouts.admin.main')

@section('title', 'Persons')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>People </h1>
            <a href="{{route('persons.create')}}" class="btn blue darken-4 mr-1">Create new</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Personal Code</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>User ID</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($persons as $person)
                    <tr>
                        <td>{{$person->id}}</td>
                        <td>{{$person->name}}</td>
                        <td>{{$person->surname}}</td>
                        <td>{{$person->personal_code}}</td>
                        <td>{{$person->email}}</td>
                        <td>{{$person->phone}}</td>
                        <td>{{$person->user_id}}</td>

                        <td>
                            <a href="{{route('persons.edit', $person->id)}}" class="btn blue darken-4 me-5">Edit</a>
                            <form action="{{route('persons.destroy', $person->id)}}" method="post">
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
