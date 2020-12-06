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



@section('content')



<body  onload="initialize();">

<form  class="mt-2" action="{{url('map')}}/{{$station->id}}" method="POST">

  @method('PATCH')
   @csrf

    <label for="latitude">
        Localidad de <strong>{{$station->localidad}}</strong>, Latitude:
    </label>
    <input name="latitud" id="txtLat" type="text" style="color:red" value="{{$station->longitud}}" />
    <label for="longitude">
        Longitude:
    </label>
    <input name="longitud" id="txtLng" type="text" style="color:red" value="{{$station->latitud}}" />
    <button type="submit" class="btn btn-primary btn-sm ">GUARDAR</button>
    <br>
    <div id="map_canvas" style="width: auto; height: 600px;">
    </div>


</form>

</body>

<div  class="row col-md-12">
    
</div>



@endsection
