<link rel="stylesheet" href="/css/bootstrap-datepicker3.min.css">
<script src="/js/bootstrap-datepicker.min.js"></script>

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

<script>
    $('#start, #end').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        todayBtn: "linked"
    });
</script>