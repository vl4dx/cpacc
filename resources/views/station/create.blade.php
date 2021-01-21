@extends('plantilla.index')

@section('tittle')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">INICIO</a></li>
    <li class="breadcrumb-item"><a href="/station">ESTACIONES CPACC</a></li>
    <li class="breadcrumb-item active" aria-current="page">CREAR</li>
  </ol>
</nav> 

@endsection
@endsection

@section('content')

<div class="row">

	<div class="col-md-3">
		
	</div>

	<div class="col-md-6">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">CREAR NUEVO CPACC</h6>
			</div>

			<div class="card-body">
			  <form class="form-horizontal" action="{{url('station')}}" method="POST">
			     @csrf
			    <div class="form-group row">
			        <label class="control-label col-sm-4" for="region">Region</label>
			        <div class="col-sm-8"> 
			          <input type="text" class="form-control" name="region" placeholder="Ingresar Distrito">
			        </div>
			    </div>

			    <div class="form-group row">
			        <label class="control-label col-sm-4" for="provincia">Provincia</label>
			        <div class="col-sm-8"> 
			          <input type="text" class="form-control" name="provincia" placeholder="Ingresar Distrito">
			        </div>
			    </div>

			    <div class="form-group row">
			        <label class="control-label col-sm-4" for="distrito">Distrito</label>
			        <div class="col-sm-8"> 
			          <input type="text" class="form-control" name="distrito" placeholder="Ingresar Distrito">
			        </div>
			    </div>

			    <div class="form-group row">
			        <label class="control-label col-sm-4" for="localidad">Localidad</label>
			        <div class="col-sm-8"> 
			          <input type="text" class="form-control" name="localidad" placeholder="Ingresar Localidad">
			        </div>
			    </div>


			    <div class="form-group row"> 
			        <div class="col-sm-8"></div>
			        <div class="col-sm-4"><button type="submit" class="btn btn-primary mb-2">GUARDAR LOCALIDAD</button></div>
			        
			    </div>
			  </form>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		
	</div>
</div>




@endsection