@extends('layout')
@section('title', 'Projects')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1 class="page-header">Edit {{$project->name}}</h1>
        <a href="/projects">Back</a>

        {!! Form::model($project, ['url' => '/projects/update', 'method' => 'PUT']) !!}
            @include('projects.form')
        {!! Form::close() !!}
    </div>
@stop