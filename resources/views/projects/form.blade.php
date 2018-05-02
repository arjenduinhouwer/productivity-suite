<div class="form-group">
    {!! Form::label('name','Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('start','Start Date') !!}
    {!! Form::text('start', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('end','End Date') !!}
    {!! Form::text('end', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('hours','Estimated hours') !!}
    {!! Form::text('hours', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save' , ['class' => 'btn btn-primary']) !!}
</div>