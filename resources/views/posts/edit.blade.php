@extends('main')

@section('title')
    Edit Post
    @endsection
@section('stylesheets')


    {!! Html::style('css/select2.min.css') !!}
@endsection


@section('content')

    <div class="wrap">
        {!!  Form::model($post,['route'=>['posts.update',$post->id],'method'=> 'PUT']) !!}
        <div class="col-md-8">
            {{ Form::label('title','Title:') }}
            {{ Form ::text('title',null,['class'=>'form-control input-lg']) }}

            {{ Form::label('slug','Slug:') }}
            {{ Form ::text('slug',null,['class'=>'form-control input-lg']) }}

            {{ Form::label('category','Category') }}
            {{ Form::select('category_id',$categories,null,['class'=>'form-control']) }}

            {{ Form::label('tags','Tag') }}
            {{ Form::select('tags[]',$tags,null,['class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) }}


            {{ Form::label('body','Body:') }}
            {{ Form::textarea('body',null,['class'=>'form-control'])  }}

        </div>

        <div class="col-md-4">
            <div class="well">
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

                        {!!  Html::linkRoute('posts.show','Cancel',array($post->id),array('class' =>'btn btn-primary btn-block btn-danger')) !!}

                    </div>
                    <div class="col-sm-6">

                        {{ Form::submit('Save Changes',['class' =>'btn btn-primary btn-block btn-success']) }}

                    </div>
                </div>
            </div>
        </div>
        {!!  Form::close()  !!}
    </div>

@endsection

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
        $(".js-example-basic-multiple").select2().val({!!   json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection