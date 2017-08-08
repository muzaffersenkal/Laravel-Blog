@extends('main')

@section('title')

    All Posts

    @endsection
@section('content')

     <div class="row">
         <div class="col-md-10">

             <h1>All Posts</h1>


         </div>
        <div class="col-md-2">
                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-block btn-lg">Create New Post</a>
        </div>
         <hr>
     </div>

     <div class="row">
         <div class="col-md-12">
                <table class="table">
                      <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th></th>
                      </thead>

                    <tbody>
                            @foreach($posts as $post)

                                <tr>
                                    <th>{{$post->id}}</th>
                                    <th>{{$post->title}}</th>
                                    <th>{{ substr($post->body,0,50)}} {{ strlen($post->body) >50 ?".." :"" }}</th>
                                    <th>{{  date('M j, Y' ,  strtotime($post->created_at)) }}</th>
                                    <th>{{ date('M j, Y', strtotime($post->updated_at)) }}</th>
                                    <th><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default">View</a> <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-default">Edit</a</th>
                                </tr>

                                @endforeach
                    </tbody>
                </table>
             <div class="text-center"> {{ $posts->links()  }}</div>
         </div>
     </div>
    @stop