@extends('layout')
@section('title', 'Tasks')

@section('content')

    <div class="row justify-content-md-center">

        <div class="col-md-6">
            <h1 class="page-header">Create new Task</h1>

            {!! Form::open(['url' => '/tasks/store']) !!}
                @include('tasks.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop