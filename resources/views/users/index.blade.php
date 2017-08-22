@extends('main')


@section('content')
<h1> User List</h1>


    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <th>Name</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                    <th>{{ $user->created_at->toFormattedDateString() }}</th>
                    <th><a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a></th>
                </tr>

                @endforeach
        </tbody>
    </table>
    @endsection


