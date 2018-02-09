@extends('layouts.app')
@section('title', 'Page')

@section('content')
    <h1 class="page-header">{{$page->title}}</h1>
    {!! $page->content !!}
@stop