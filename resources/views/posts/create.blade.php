@extends('main')

@section('title')
    Create Posts
    @endsection

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    @endsection

@section('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({
        selector:'textarea',
        plugins: 'link code',
            menubar:false
        });</script>


    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
    </script>
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>

            {!! Form::open(['route' => 'posts.store','files' => true])     // javascript validation için  'data-parsley-validate' => '' !!}

                {{ Form::label("title","Title:") }}
                {{ Form::text("title",null,array("class"=>"form-control",'required'=>'')) }}

            {{ Form::label("slug","Slug:") }}
            {{ Form::text("slug",null,array("class"=>"form-control",'required'=>'')) }}

            {{ Form::label("category","Category:") }}
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
            </select>

            {{ Form::label("tag","Tag:") }}
            <select name="tags[]" class="form-control js-example-basic-multiple" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>

                {{ Form::label('featured_image','Image : ') }}
                {{ Form::file('featured_image') }}


                {{ Form::label("body","Post Body:") }}
                {{ Form::textarea("body",null,array("class"=>"form-control")) }}

                {{ Form::submit("Create Post",array("class"=>"btn btn-success btn-lg btn-block")) }}

            {!! Form::close() !!}
        </div>
    </div>

    @endsection