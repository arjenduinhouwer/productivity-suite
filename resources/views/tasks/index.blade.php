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

                @foreach($dates as $date => $tasks)

                    <tr @if(\Carbon\Carbon::parse($date) < \Carbon\Carbon::today()) style="background: #e56e6e"; @endif>
                        <th>{{\Carbon\Carbon::parse($date)->format('l, d  F')}}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                    @foreach($tasks as $task)
                        <tr @if($task->priority > 1) class="alert alert-danger" @endif>
                            <td><a href="/tasks/edit/{{$task->id}}">{{$task->name}}</a></td>
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

                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@stop