@extends('plantilla.index')

@section('css')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaWBQzuGfzG-hkLPaLCkA-KdOhF8dhvpU"></script>
        <script type="text/javascript">
        function initialize() {
            // Creating map object
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 12,
                center: new google.maps.LatLng({{$station->longitud}}, {{$station->latitud}}),
                mapTypeId: 'hybrid'
            });

            // creates a draggable marker to the given coords
            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng({{$station->longitud}}, {{$station->latitud}}),
                draggable: true
            });

            // adds a listener to the marker
            // gets the coords when drag event ends
            // then updates the input with the new coords
            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));

                map.panTo(evt.latLng);
            });

            // centers the map on markers coords
            map.setCenter(vMarker.position);

            // adds the marker on the map
            vMarker.setMap(map);
        }
    </script>
@endsection

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">INICIO</a></li>
    <li class="breadcrumb-item"><a href="/station">CPACC</a></li>
    <li class="breadcrumb-item"><a href="/station/{{$station->id}}">{{$station->localidad}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">EDITAR</li>
  </ol>
</nav> 

@endsection

@section('content')



<body   onload="initialize();">

<form  class="mt-2" action="{{url('map')}}/{{$station->id}}" method="POST">

    @method('PATCH')
    @csrf

<div class="row">
    
    <div class="col-md-5">
        <div class="row col-sm-12"><strong> LOCALIDAD DE {{$station->localidad}} </strong></div>
        <br>

            <div class="form-group row">
                <label class="col-form-label col-4" for="latitude"><strong>LATITUD</strong></label>
                <div class="col-8">
                <input class="form-control form-control-sm" name="latitud" id="txtLat" type="text" value="{{$station->longitud}}" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-4" for="longitude"><strong>LONGITUD</strong></label>
                <div class="col-8">
                <input class="form-control form-control-sm" name="longitud" id="txtLng" type="text" value="{{$station->latitud}}" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-4" for="altitude"><strong>ALTITUD</strong></label>
                <div class="col-8">
                <input class="form-control form-control-sm" name="altitude"  type="text" value="{{$station->altitud}}" />
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary btn-sm ">GUARDAR</button>
    </div>

    <div class="col-md-7">
        <div id="map_canvas" style="width: auto; height: 75vh;"></div>
    </div>

</div>

</form>

</body>


@endsection
