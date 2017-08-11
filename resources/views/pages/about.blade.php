
@extends('main')
@section('title')
    About
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12" id="app">
            <h1>@{{message}}</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis aspernatur quas quibusdam veniam sunt animi, est quos optio explicabo deleniti inventore unde minus, tempore enim ratione praesentium, cumque, dolores nesciunt?</p>
        </div>
    </div>


    <script>
        var app = new Vue({
           el:'#app',
            data: {
               message: 'Hello Vue.js'
            }
        });
    </script>
@endsection
