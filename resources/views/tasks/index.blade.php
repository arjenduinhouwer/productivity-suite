@extends('layout')
@section('title', 'Tasks')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">

            <h1 class="page-header">Tasks</h1>

            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-primary" href="/tasks/create">Create</a>
            </div>

            <table class="table">
                <tr>
                    <th>Task</th>
                    <th>Due</th>
                    <th>Priority</th>
                    <th>Actions</th>
                </tr>

                @foreach($dates as $date => $tasks)

                    <tr @if(\Carbon\Carbon::parse($date) < \Carbon\Carbon::today()) style="background: #e56e6e"; @endif>
                        <th>
                            @if(\Carbon\Carbon::today() == Carbon\Carbon::parse($date))
                                Today
                            @else
                                {{\Carbon\Carbon::parse($date)->format('l, d  F')}}
                            @endif
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                    @foreach($tasks as $task)
                        <tr @if($task->priority > 1) class="alert alert-info" @endif>
                            <td><a href="/tasks/edit/{{$task->id}}">{{$task->name}}</a></td>
                            <td>
                                @if(\Carbon\Carbon::today() == Carbon\Carbon::parse($task->due))
                                    Today
                                @else
                                    {{\Carbon\Carbon::today()->diffInDays(Carbon\Carbon::parse($task->due))}} days <small class="text-muted">{{\Carbon\Carbon::parse($task->due)->format('d F')}}</small>
                                @endif
                            </td>
                            <td>{{$task->getPriority()}}</td>
                            {{--<td><a href="/tasks/solve/{{$task->id}}">Solved</a></td>--}}
                            <td>
                                <div class="btn-group">
                                    <a href="/tasks/solve/{{$task->id}}" type="" class="">Solved</a>
                                    <a type="" class="dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="/tasks/{{$task->id}}/shift">Shift 1 day</a>
                                        <a class="dropdown-item" href="/tasks/delete/{{$task->id}}">Delete</a>
                                    </div>
                                </div>
                            </td>
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