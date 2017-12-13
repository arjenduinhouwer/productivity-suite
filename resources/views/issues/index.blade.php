@extends('layout')
@section('title', 'All Issues')

@section('content')
    <div class="col-md-12">
        <h2>Github issues</h2>

        <div style="display: block; margin-bottom: 15px;">
            <div class="btn-group" role="group" aria-label="...">
                @for($i = count($pagination)-1; $i >= 0; $i--)
                    <a class="btn btn-default" href="/issues/{{$pagination[$i]['url']}}">{{$pagination[$i]['title']}}</a>
                @endfor
            </div>
        </div>

        <table class="table">
            <tr>
                <th>Issue ID</th>
                <th>Repository</th>
                <th>Title</th>
                <th>Body</th>
                <th>Labels</th>
                <th>Ops</th>
            </tr>

            @foreach($issues as $issue)
                <tr>
                    <td><a href="{{$issue->html_url}}" target="_blank">{{$issue->number}}</a></td>
                    <td>{{$issue->repository->name}}</td>
                    <td><strong>{{$issue->title}}</strong> <span class="text-muted"><br>assigned by <a target="_blank" href="{{$issue->user->html_url}}">{{$issue->user->login}}</a> @ <span class="text-muted">{{\Carbon\Carbon::parse($issue->created_at)->format('M d')}}</span> || {{$issue->comments}} comment(s)</span></td>
                    <td>{{substr($issue->body, 0, 150)}}</td>
                    <td>@if(count($issue->labels) > 0)
                            @foreach($issue->labels as $label)
                                <span class="label" style="background: #{{$label->color}}; color: white;">{{$label->name}}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a target="_blank" href="/issues/view?owner={{$issue->repository->owner->login}}&repo={{$issue->repository->name}}&issue_nr={{$issue->number}}">view</a>
                        <a class="close-issue" href="/issues/close?owner={{$issue->repository->owner->login}}&repo={{$issue->repository->name}}&issue_nr={{$issue->number}}">close</a>
                    </td>
                 <tr>
            @endforeach
        </table>
    </div>

    <script>
        $(function(){
            $('.close-issue').click(function(e){
                e.preventDefault();

                console.log(e);

                if(confirm('This will close the issue, are you sure?'))
                {
                    window.location = e.target.href
                }
            });
        });
    </script>
@stop