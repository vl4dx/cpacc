@extends('template.layout')

@section('tittle','ESTACION DE '.$station->localidad)

@section('content')

@if (count($station->listaEncargadosModel) === 0)
	<div class="box-header with-border"><h3 class="box-title">no hay registros</h3></div>
@else

	<div class="row">

		<div class="col-md-2"></div>

		<div class="col-md-8">

		    <div class="card shadow mb-4">

		        <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Lista de Encargados</h6></div>

		        <div class="card-body ">

		        	<div class="row m-2">

		        		<div class="col-md-4">
		        			<div class="p-2 bg-gray-300"><strong>Nombre</strong></div>
		        		</div>

		        		<div class="col-md-3">
		        			<div class="p-2 bg-gray-300"><strong>Cargo</strong></div>
		        		</div>

		        		<div class="col-md-3 ">
		        			<div class="p-2 bg-gray-300">Celular</div>
		        		</div>

		        		<div class="col-md-2">
							<div class="p-2 bg-gray-300">Edit</div>
						</div>					
				    </div>


		        	@foreach ($station->listaEncargadosModel as $lista)
		        	<div class="row m-2">

		        		<div class="col-md-4">
		        			<div class="btn btn-block text-left">{{$lista->nombre}}</div>
		        		</div>

		        		<div class="col-md-3 ">
		        			<div class="btn btn-block">{{$lista->cargo}}</div>
		        		</div>

		        		<div class="col-md-3 ">
		        			<div class="btn btn-block">{{$lista->celular}}</div>
		        		</div>

		        		<div class="col-md-2">
							<a  href="/estadoconfig/{{$station->id}}/edit"  class="btn btn-warning btn-block">
							<i class="fas fa-edit"></i></a>					
				    </div>

		          	</div>
		          	@endforeach

		          	<br>
		          	{{-- Boton --}}
		          	<div class="row">
		          		<div class="col-md-5"></div>
		          		<div class="col-md-2">
		          			<a  href="/encargado/create/6"  class="btn btn-secondary btn-block">
							<i class="fas fa-plus-circle"></i></a>
		          		</div>
		          		<div class="col-md-5"></div>
		          		
		          	</div>

		        </div>

		    </div>

	    </div>

	    <div class="col-md-2"></div>
	</div>

@endif


@endsection



