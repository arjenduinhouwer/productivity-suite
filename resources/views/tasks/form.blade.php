<div class="form-group">
    {!! Form::label('name','Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('due','Due') !!}
    {!! Form::text('due', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('priority','Priority') !!}
    {!! Form::select('priority', ['1' => 'Normal', '2' => 'Urgent'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('solved', '1', false, ['class' => 'form-check-input']) !!}
    {!! Form::label('solved','Solved') !!}
</div>

<div class="form-group">
    {!! Form::submit('Save' , ['class' => 'btn btn-primary']) !!}
</div>