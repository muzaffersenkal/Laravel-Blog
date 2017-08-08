@extends('main')
@section('title')
    Show Page
    @endsection
@section('content'),


        <div class="wrap">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <p class="lead">{{ $post->body }}</p>
                <hr>

                @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                    @endforeach
            </div>

    <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Url:</dt>
                    <dd><a href="{{ route('blog.single',$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <dd><p>{{ $post->category->name }}</p></dd>
                </dl>


                  <dl class="dl-horizontal">
                        <dt>Created At:</dt>
                         <dd>{{ date('M j, Y H:i',strtotime($post->created_at)) }}</dd>
                  </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y H:i',strtotime($post->updated_at)) }}</dd>
                </dl>
                
                <hr>
                <div class="row">
                    <div class="col-sm-6">

                        {!!  Html::linkRoute('posts.edit','Edit',array($post->id),array('class' =>'btn btn-primary btn-block')) !!}

                    </div>
                    <div class="col-sm-6">
                        {{  Form::open(['route' => ['posts.destroy',$post->id], 'method' => 'DELETE']) }}
         

                       {{   Form::submit('Delete',['class'=>'btn btn-primary btn-block']) }}
                       {{  Form::close() }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                            {{ Html::linkRoute('posts.index','<< See All Posts',[], array('class'=>'btn btn-default btn-block ')) }}
                    </div>
                </div>
            </div>
    </div>
        </div>

    @endsection