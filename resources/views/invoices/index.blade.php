@extends('layout')
@section('title', 'Invoices')

@section('content')    
    
    
    <div class="col-md-5">
        {!! Form::open(['url' => '/invoices/upload', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::file('file', ['class' => 'fom-control']) !!}
        
        {!! Form::submit('Save' , ['class' => 'btn btn-primary']) !!}
    </div>
@stop    