@extends('main')

@section('title'," $tag->name show tag")

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} posts</small></h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary btn-block pull-right">Edit</a>
        </div>
        <div class="col-md-2">
            {{ Form::open(['route' => ['tags.destroy',$tag->id],'method' => 'DELETE']) }}
            {{ Form::submit('Delete',['class' => 'btn btn-block btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>

                </thead>
                @foreach($tag->posts as  $post)
                    <tbody>
                        <tr>
                            <th>{{$post->id}}</th>
                        <td>{{ $post->title }}</td>
                            <td>@foreach($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                            @endforeach
                            </td>
                            <td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default btn-xs">View</a></td>

                        </tr>
                    </tbody>
                    @endforeach
            </table>
        </div>
    </div>

    @endsection