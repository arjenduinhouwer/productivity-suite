@extends('layouts.app')
@section('title', 'Editor')

@section('content')

    <script src="/ckeditor/ckeditor.js"></script>

    {!! Form::open(['url' => '/editor']) !!}
    <textarea name="editor" id="editor" cols="30" rows="10"></textarea>

    {!! Form::submit('Save' , ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    <script>
        CKEDITOR.replace('editor');
    </script>
@stop