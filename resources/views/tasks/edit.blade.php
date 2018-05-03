@extends('layout')
@section('title', 'Tasks')

@section('content')
    <div class="row justify-content-md-center">

        <div class="col-md-6">
            <h1 class="page-header">Edit {{$task->name}}</h1>
            <a href="/tasks">Back</a>

            {!! Form::model($task, ['url' => '/tasks/update/' . $task->id, 'method' => 'PUT']) !!}
                @include('tasks.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop