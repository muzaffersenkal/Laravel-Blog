@extends('main')
@section('title')
    Home
@endsection


@section('header')


@endsection

@section('content')

    <router-link to="/">Home</router-link>
    <router-link to="/about">About</router-link>


    <router-view></router-view>

    <!-- end of header .row -->

    <div class="row">


        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{  substr(strip_tags($post->body),0,300) }}.</p>
                <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More    </a>
            </div>
        @endforeach

            <hr>
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>

@endsection

@section('scripts')


  @endsection
