<link rel="stylesheet" href="/css/bootstrap-datepicker3.min.css">
<script src="/js/bootstrap-datepicker.min.js"></script>

<div class="form-group">
    {!! Form::label('name','Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control mb2']) !!}
</div>


<div class="form-row align-items-center">

    <div class="col-auto">
        <div class="form-group mb2">
            {!! Form::label('due','Due')!!}
            {!! Form::text('due', null, ['class' => 'form-control mb2']) !!}
        </div>
    </div>

    <div class="col-auto">
        <div class="form-group mb2">
            {!! Form::label('priority','Priority') !!}
            {!! Form::select('priority', ['1' => 'Normal', '2' => 'Urgent'], null, ['class' => 'form-control mb2']) !!}
        </div>
    </div>

    <div class="col-auto">
        <div class="form-check mb2">
            {!! Form::checkbox('solved', '1', false, ['class' => 'form-check-input']) !!}
            {!! Form::label('solved','Solved', ['class' => 'form-check-label']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::submit('Save' , ['class' => 'btn btn-primary']) !!}
</div>

<script>
    $('#due').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        todayBtn: "linked"
    });
</script>