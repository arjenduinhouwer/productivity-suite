@extends('layout')
@section('title', 'Projects')

@section('content')
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
    <div class="col-md-6 col-md-offset-3">

        <h1 class="page-header">Projects</h1>

        <div id="timeline" style="height: 180px;"></div>

        <a class="btn btn-primary" href="/projects/create">Create</a>

        <hr>

        @foreach($projects as $project)
            <div class="col-md-12" style="border: 1px solid #e2e2e2; margin-bottom: 10px; padding-bottom: 5px;">
                <div class="col-md-6">
                    <h3>{{$project->name}}</h3>
                </div>
                <div class="col-md-6">
                    <p>&nbsp;</p>
                    <p>From: {{Carbon\Carbon::parse($project->start)->format('d M Y')}} until: {{Carbon\Carbon::parse($project->end)->format('d M Y')}}
                        <br>
                        Hours: {{$project->hours}}
                    </p>
                </div>

                <div class="col-md-12 text-right">
                    <a href="/projects/edit/{{$project->id}}">Edit</a> | <a href="/projects/delete/{{$project->id}}">Delete</a>
                </div>
            </div>
        @endforeach
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['timeline']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var container = document.getElementById('timeline');
            var chart = new google.visualization.Timeline(container);
            var dataTable = new google.visualization.DataTable();

            dataTable.addColumn({ type: 'string', id: 'President' });
            dataTable.addColumn({ type: 'date', id: 'Start' });
            dataTable.addColumn({ type: 'date', id: 'End' });

            dates = [];

            @foreach($projects as $p)

                    <?php $start = \Carbon\Carbon::parse($p->start); ?>
                    <?php $end = \Carbon\Carbon::parse($p->end); ?>
                    dates.push(['{{$p->name}}', new Date({{$start->year}}, {{$start->month}}, {{$start->day}}), new Date({{$end->year}}, {{$end->month}}, {{$end->day}})]);
            @endforeach

            dataTable.addRows(dates);

            chart.draw(dataTable);
        }
    </script>
@stop