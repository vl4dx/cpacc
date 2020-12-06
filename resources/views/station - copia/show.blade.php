@extends('template.layout')

@section('css')
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
@endsection

@section('tittle','LOCALIDAD DE '. $station->localidad )

@section('content')


<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<style type="text/css">
	#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<div class="row">
	<div class="col-lg-12 col-mb-12"  >

	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-lg-10 col-mb-10">Datos</div>
				<div class="col-lg-2 col-mb-2"><a href="/station/{{$station->id}}/edit"  class="btn btn-block btn-sm btn-success">EDITAR</a></div>
			</div>
		</div>
	<div class="card-body">
	<div class="row">
		<div class="col-lg-4 col-mb-4"  > 
			<table class="table table-bordered text-xs table-sm">

			<tbody>
			  <tr>
			    <td><strong>Region</strong></td>
			    <td align="right">{{$station->region}}</td>
			  </tr>
			  <tr>
			    <td><strong>Provincia</strong></td>
			    <td align="right">{{$station->provincia}}</td>
			  </tr>
			  <tr>
			    <td><strong>Distrito</strong></td>
			    <td align="right">{{$station->distrito}}</td>
			  </tr>
			  <tr>
			    <td><strong>localidad</strong></td>
			    <td align="right">{{$station->localidad}}</td>
			  </tr>
			  <tr>
			    <td><strong>Foto</strong></td>
			    <td align="center">				<figure align="center" >
			<img id="myImg" src="{{url('stations/')}}/{{ $station->id }}/main2.png" class="figure-img img-fluid rounded " alt="Foto de la estacion de {{$station->localidad}}">
			<figcaption  class="figure-caption">Foto de la estacion de {{$station->localidad}}</figcaption>
		</figure></td>
			  </tr>
			</tbody>
			</table>



		</div>
		<div class="col-lg-4 col-mb-4"  > 
				<table class="table table-bordered text-xs table-sm">

					<tbody>
					  <tr>
					    <td><strong>Estado</strong></td>
					    <td align="right">{{ $station->estadoModel->nombre }}</td>
					  </tr>
					  <tr>
					    <td><strong>Tipo</strong></td>
					    <td align="right">{{ $station->cpaccModel->nombre }}</td>
					  </tr>
					  <tr>
					    <td><strong>Canal de TV</strong></td>
					    <td align="right">{{$station->channeltv_id}}</td>
					  </tr>
					  <tr>
					    <td><strong>Frecuencia FM</strong></td>
					    <td align="right">{{$station->frecuencyfm_id}}</td>
					  </tr>
					  <tr>
					  	<td><strong>Encargado</strong></td>

					  	<td align="left">

					  	<div class="row">
					  		<div class="col-md-8">
						  		@isset($station->listaEncargadosModel->last()->nombre)
								    {{$station->listaEncargadosModel->last()->nombre}}
								@endisset
					  			
					  		</div>
					  		<div class="col-md-2"> <a href="/encargado/{{$station->id}}"  class="btn  text-xs btn-sm btn-warning">VER</a></div>
					  		<div class="col-md-2"></div>
					  	</div>
					    
					  
						</td>
					  </tr>
					  <tr>
					    <td><strong>Celular</strong></td>
					    <td align="right">{{$station->celular}}</td>
					  </tr>
					  <tr>
					    <td><strong>Observaciones</strong></td>
					    <td align="justify">
					    	<textarea readonly name="observacion" class="form-control text-xs" rows="5">{{$station->observacion}}</textarea>
						</td>
					  </tr>

					  <tr>
					    <td><strong>Requerimiento</strong></td>
					    <td align="right">{{$station->requerimiento}}</td>
					  </tr>

					</tbody>
				</table>


{{--$station->listaEncargadosModel->last()->nombre--}}
				<table class="table table-bordered text-xs table-sm">

					<tbody>

@foreach ($station->listaEncargadosModel as $lista)




					  <tr>
					    <td><strong>{{$lista->nombre}}</strong></td>
					    <td align="right">{{ $lista->celular }}</td>
					  </tr>
@endforeach
					</tbody>
				</table>

		</div>
		<div class="col-lg-4 col-mb-4"  > 




					<table class="table table-bordered text-xs table-sm">

					<tbody>
					  <tr>
					    <td>Latitud</td>
					    <td align="right">{{$station->latitud}}</td>
					  </tr>
					  <tr>
					    <td>Longitud</td>
					    <td align="right">{{$station->longitud}}</td>
					  </tr>
					  <tr>
					    <td>Altitud</td>
					    <td align="right">{{$station->altitud}} msnm</td>
					  </tr>
					</tbody>
					</table>


				
		


				<div id="mapid" style="width: 100%; height: 400px;"></div>
					<script>

				var mymap = L.map('mapid').setView([{{$station->longitud}}, {{ $station->latitud }}], 7);

				L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
					maxZoom: 18,
					attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
						'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
						'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
					id: 'mapbox/streets-v11',
					tileSize: 512,
					zoomOffset: -1
				}).addTo(mymap);

				L.marker([{{$station->longitud}}, {{ $station->latitud }}]).addTo(mymap);

			</script>





		</div>





	</div>
	</div>


	</div>
</div>
</div>
<br>


            


<script type="text/javascript">
	// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>


@endsection