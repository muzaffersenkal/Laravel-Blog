@extends('main')

@section('title',"$tag->name Edit")

@section('content')

    {{ Form::model($tag,['route' => ['tags.update',$tag->id],'method' =>'PUT']) }}
        {{ Form::label('name','Name') }}
        {{Form::text('name',null,['class'=>'form-control'])}}

        {{ Form::submit('Save Changes') }}

    {{ Form::close() }}
    @endsection