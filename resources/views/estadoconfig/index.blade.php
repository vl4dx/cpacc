@extends('plantilla.index')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">LISTADO DE ESTADOS</li>
  </ol>
</nav> 

@endsection

@section('content')

	@if (count($estados) === 0)
		<div class="box-header with-border"><h3 class="box-title">no hay registros</h3></div>
	@else

<div class="row">

	<div class="col-md-3"></div>
	<div class="col-md-6">

	    <div class="card shadow mb-4">

	        <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">ESTADOS</h6></div>

	        <div class="card-body ">

	        	@foreach ($estados as $estado)
	        	<div class="row m-2">

	        		<div class="col-md-10 ">
	        			<div class="btn btn-block  btn-{{$estado->color}}">{{$estado->nombre}}</div>
	        		</div>

	        		<div class="col-md-2">
						<a  href="/estadoconfig/{{$estado->id}}/edit"  class="btn btn-warning btn-block">
						<i class="fas fa-edit"></i></a>					
			        </div>

	          	</div>
	          	@endforeach
	          	<br>
	          	<div class="row">
	          		<div class="col-md-5"></div>
	          		<div class="col-md-2">
	          			<a  href="/estadoconfig/create"  class="btn btn-secondary btn-block">
						<i class="fas fa-plus-circle"></i></a>
	          		</div>
	          		<div class="col-md-5"></div>
	          		
	          	</div>

	        </div>

	    </div>
    </div>
    <div class="col-md-3"></div>
</div>

@endif
@endsection
