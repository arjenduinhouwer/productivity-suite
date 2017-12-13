@extends('layout')

@section('title', '#' .$issue->number . ' ' . $issue->title)

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>{{$issue->number}} - {{$issue->title}}</h1>

        <div>

            <a class="btn btn-primary" target="_blank" href="{{$issue->html_url}}"><i class="fa fa-github"></i> View on GH</a>

            @foreach($issue->labels as $label) <span class="btn" style="background: #{{$label->color}}; color: #fff; margin-left: 10px; float-right;">{{$label->name}} </span> @endforeach

        </div>

        <div>
            <br>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title"><strong>{{$issue->user->login}}</strong></span>
                <span class="text-muted text"> on {{Carbon\Carbon::parse($issue->created_at)->format('F d Y')}}</span>
            </div>
            <div class="panel-body">
                {!! nl2br($issue->body) !!}
            </div>
        </div>

        <hr>

        @if($issue->comments != 0)
            @foreach($issue->comments as $comment)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="panel-title"><strong>{{$comment->user->login}}</strong></span>
                        <span class="text-muted"> on {{Carbon\Carbon::parse($comment->created_at)->format('F d Y')}}</span>
                    </div>
                    <div class="panel-body">
                        {!! nl2br($comment->body) !!}
                    </div>
                </div>

            @endforeach
        @endif
    </div>
@stop