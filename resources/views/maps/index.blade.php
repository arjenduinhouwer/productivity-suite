@extends('layouts.app')
@section('title', 'Map')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>

    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>

    <div id="map" style="height:600px">

    </div>


    <script>


        var myMap = L.map('map');

        var osmUrl = 'http://c.tile.openstreetmap.org/${z}/${x}/${y}.png';
        var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
        var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 12, attribution: osmAttrib});

        myMap.setView([51.505, -0.09], 13);
        myMap.addLayer(osm);

    </script>
@stop