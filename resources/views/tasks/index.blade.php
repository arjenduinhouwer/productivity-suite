@extends('layout')
@section('title', 'Tasks')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">

            <h1 class="page-header">Tasks</h1>

            <a class="btn btn-primary" href="/tasks/create">Create</a>

            <table class="table">
                <tr>
                    <th>Task</th>
                    <th>Due</th>
                    <th>Priority</th>
                    <th>Solved</th>
                </tr>

                @foreach($tasks as $task)

                    @if(\Carbon\Carbon::today() < $task->due)
                        <tr>
                            <th>Later</th>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    @endif

                    <tr @if($task->priority > 1) class="alert alert-danger" @endif>
                        <td>{{$task->name}}</td>
                        <td>
                            @if(\Carbon\Carbon::today() == Carbon\Carbon::parse($task->due))
                                Today
                            @else
                                {{\Carbon\Carbon::today()->diffInDays(Carbon\Carbon::parse($task->due))}} days <small class="text-muted">{{\Carbon\Carbon::parse($task->due)->format('d F')}}</small>
                            @endif
                        </td>
                        <td>{{$task->getPriority()}}</td>
                        <td><a href="/tasks/solve/{{$task->id}}">Solved</a></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@stop