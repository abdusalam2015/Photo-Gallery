@extends('layouts.app')

@section('content')
<h3>Upload Photo</h3>
  {!! Form::open(['action' => 'PhotosController@store','method'=>'POST' , 'enctype' => 'multipart/form-data'])!!}
  {{Form::text('title','',['placeholder' => 'photo title'])}}
  {{Form::textarea('description','',['placeholder' => 'photo Description'])}}
  {{Form::hidden('album_id', $album_id)}}
  {{Form::file('photo')}}
  {{ Form::submit('Submit' , ['class' => 'btn btn-primary']) }}

  {!! Form::close() !!}

@endsection
