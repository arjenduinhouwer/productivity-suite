@extends('layout')
@section('title', 'Index')

@section('content')
    <div class="col-md-12">

        <h1>Bekijk alle {{count($issues)}} issues</h1>

        <table class="table">
            <tr>
                <th>Issue ID</th>
                <th>Repository</th>
                <th>Title</th>
                <th>Body</th>
                <th>Labels</th>
                <th>View</th>
            </tr>

            @foreach($issues as $issue)
                <tr>
                    <td><a href="{{$issue->html_url}}" target="_blank">{{$issue->number}}</a></td>
                    <td>{{$issue->repository->name}}</td>
                    <td><strong>{{$issue->title}}</strong> <span class="text-muted"><br>assigned by <a target="_blank" href="{{$issue->user->html_url}}">{{$issue->user->login}}</a> || {{$issue->comments}} comment(s)</span></td>
                    <td>{{substr($issue->body, 0, 150)}}</td>
                    <td>@if(count($issue->labels) > 0)
                            @foreach($issue->labels as $label)
                                <span class="label" style="background: #{{$label->color}}">{{$label->name}}</span>
                            @endforeach
                        @endif
                    </td>
                    <td><a href="/issues/view?owner={{$issue->repository->owner->login}}&repo={{$issue->repository->name}}&issue_nr={{$issue->number}}">view</a></td>
                 <tr>
            @endforeach
        </table>
    </div>
@stop