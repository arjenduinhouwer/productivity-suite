@extends('layout')
@section('title', 'Messages')

@section('content')
    {!! Form::open(['url' => '/messages/store']) !!}
    
    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
    {!! Form::submit('Send' , ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop