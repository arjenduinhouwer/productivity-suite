@extends('layout')
@section('title', 'Projects')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1 class="page-header">Create new Project</h1>

        {!! Form::open(['url' => '/projects/store']) !!}
            @include('projects.form')
        {!! Form::close() !!}
    </div>
@stop