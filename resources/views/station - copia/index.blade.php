@extends('template.layout')

@section('tittle','LISTADO DE ESTACIONES CPACC')

@section('content')

@if (count($stations) === 0)
	<div class="box-header with-border"><h3 class="box-title">no hay registros</h3></div>
@else

<div class="card shadow mb-4">

	<div class="card-body ">

		<table class="table table-bordered table-sm  " id="dataTable" width="100%" cellspacing="0">

			<thead>
				<tr >
					<th class="text-primary">Id</th>
					<th class="text-primary ">Region</th> 
					<th class="text-primary">Provincia</th> 
					<th class="text-primary">Distrito</th> 
					<th ><input  class="form-control" id="myInput" type="text" placeholder="LOCALIDAD"></th> 
					<th class="text-primary">Estado</th>
					<th class="text-primary">Tipo</th>
					<th class="text-primary">Obs.</th>
					@if (Auth::user()->cargo == 'admin' || Auth::user()->cargo == 'editor')
					<th class="text-primary">Editar</th>
					@else
					@endif
				</tr>
			</thead>

			<tbody id="myTable">

				@foreach ($stations as $station)

				<tr>
					<td class="text-primary">{{ $station->id }}</td>
					<td ><small>{{ $station->region }}</small></td> 

					@php
						$len= strlen($station->provincia);
						if($len>=15){ echo '<td class="text-xs"><small>'.$station->provincia.'</small></td>';}
						else{echo '<td ><small>'.$station->provincia.'</small></td>' ;}
					@endphp

					@php
						$len= strlen($station->distrito);
						if($len>=10){echo '<td class="text-xs"><small>'.$station->distrito.'</small></td>';}
						else{echo '<td ><small>'.$station->distrito.'</small></td>';}
					@endphp


					@php
					$len= strlen($station->localidad);
					if($len>=15){echo '<td><a href="/station/'.$station->id.'" class="btn btn-light btn-sm text-xs " >'.$station->localidad.'</a></td>';}
					else {echo '<td><a href="/station/'.$station->id.'" class="btn btn-light btn-sm " >'.$station->localidad.'</a></td>';}
					@endphp

					<td>
						<div class="btn btn-block  btn-sm btn-{{$station->estadoModel->color}}">
							{{$station->estadoModel->nombre}}
						</div>
					</td>
					<td>
						<div  class="btn  btn-sm btn-block btn-info">{{$station->cpaccModel->nombre}}</div>
					</td>

					<td>
						{{--<a  href="/station/{{$station->id}}/edit"  class="btn btn-sm btn-secondary btn-block"><i class="fas fa-search-plus"></i></a>--}}
						{{--$station->observacion--}}

						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$station->id}}">
						  <i class="fas fa-search-plus"></i>
						</button>
						<div class="modal fade" id="exampleModal{{$station->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel"><strong>Localidad de {{$station->localidad}}</strong></h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">

						      				
				<textarea readonly name="observacion" class="form-control" rows="5">{{$station->observacion}}</textarea>
			</div>

						        
						      
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>

					</td>

					@if (Auth::user()->cargo == 'admin' || Auth::user()->cargo == 'editor')
					<td><a  href="/station/{{$station->id}}/edit"  class="btn btn-sm btn-warning btn-block"><i class="fas fa-edit"></i></a></td>
					@else

					@endif


				</tr>

				@endforeach

			</tbody>
		</table>

	</div>
</div>

@endif



@endsection