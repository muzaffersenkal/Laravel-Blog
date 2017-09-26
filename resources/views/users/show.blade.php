@extends('main')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <p>{{ $user->name }}</p>
            <p>{{ $user->email }}</p>
        </div>
    </div>

    @endsection