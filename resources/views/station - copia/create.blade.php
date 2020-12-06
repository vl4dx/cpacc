@extends('template.layout')

@section('tittle','AGREGAR DE ESTADION DE RADIO Y TV')

@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Datos</h6>
	</div>

	<div class="card-body">
	  <form class="form-horizontal" action="{{url('station')}}" method="POST">
	     @csrf
	    <div class="form-group row">
	        <label class="control-label col-sm-2" for="region">Region</label>
	        <div class="col-sm-8"> 
	          <input type="text" class="form-control" name="region" placeholder="Ingresar Distrito">
	        </div>
	    </div>

	    <div class="form-group row">
	        <label class="control-label col-sm-2" for="provincia">Provincia</label>
	        <div class="col-sm-8"> 
	          <input type="text" class="form-control" name="provincia" placeholder="Ingresar Distrito">
	        </div>
	    </div>

	    <div class="form-group row">
	        <label class="control-label col-sm-2" for="distrito">Distrito</label>
	        <div class="col-sm-8"> 
	          <input type="text" class="form-control" name="distrito" placeholder="Ingresar Distrito">
	        </div>
	    </div>

	    <div class="form-group row">
	        <label class="control-label col-sm-2" for="localidad">Localidad</label>
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
@endsection