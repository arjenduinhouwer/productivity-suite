@extends('layout')
@section('title', 'Projects')

@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1 class="page-header">Edit {{$project->name}}</h1>
            <a href="/projects">Back</a>

            {!! Form::model($project, ['url' => '/projects/update/' . $project->id, 'method' => 'PUT']) !!}
                @include('projects.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop