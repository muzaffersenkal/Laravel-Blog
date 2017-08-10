@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title',"| $titleTag")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>

            <hr>
            <p> {{ $post->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="comments-title"> <span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</h2>
            @foreach($post->comments as $comment)

                <div class="comment">
                    <div class="author-info">

                        <img src="" class="author-image" />
                        <div class="author-name">
                            <h4>{{ $comment->name }} </h4>
                            <p class="author-time">{{ $comment->created_at }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        o
                        {{ $comment->comment }}
                    </div>

                </div>

                @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
            {{ Form::open(['route'=>['comments.store',$post->id],'method'=>'POST']) }}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name','Name') }}
                    {{ Form::text('name',null,['class'=> 'form-control']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('email','Email') }}
                    {{ Form::text('email',null,['class'=> 'form-control']) }}
                </div>

                <div class="col-md-12">
                    {{ Form::label('comment','Name') }}
                    {{ Form::textarea('comment',null,['class'=> 'form-control','rows'=>'5']) }}
                </div>
                {{ Form::submit('Add Comment',['class'=> 'btn btn-success btn-block']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>

@endsection
