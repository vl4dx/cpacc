@extends('plantilla.index')


@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">INICIO</a></li>
    <li class="breadcrumb-item"><a href="/station">LISTA DE ESTACIONES CPACC</a></li>
    <li class="breadcrumb-item"><a href="/station/{{$encargado->cpacc_id}}">LOCALIDAD</a></li>
    <li class="breadcrumb-item"><a href="/encargado/{{$encargado->cpacc_id}}">ENCARGADOS</a></li>
    <li class="breadcrumb-item active" aria-current="page">EDITAR</li>
  </ol>
</nav> 

@endsection

@section('content')

<form  action="{{url('encargado')}}/{{$encargado->id}}" method="POST" files="true" enctype="multipart/form-data">
@method('PATCH')
@csrf

<div class="row">
	<div class="col-lg-2 col-mb-2" > </div>
	<div class="col-lg-8 col-mb-8" > 

		<div class="card">
			<div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Datos</h6></div>

			<div class="card-body">

	
              
										<div class="form-group row">
							                  <label class="col-form-label col-4" for="region"><strong>Nombre</strong> </label>
							                  <div class="col-sm-8">
							                    <input  type="text"  class="form-control form-control-sm" name="nombre"  required="required" pattern="[A-Za-z0-9]{1,20}" value="{{$encargado->nombre}}" >
							                  </div>
										</div>

										<div class="form-group  row">
							                  <label class="col-form-label col-4" for="nombre"><strong>Cargo</strong> </label>
							                  <div class="col-sm-8">
							                    <input  type="text" class="form-control form-control-sm" name="cargo"  required="required" pattern="[A-Za-z0-9]{1,20}"  value="{{$encargado->cargo}}">
							                  </div>
										</div>

										<div class="form-group  row">
							                  <label class="col-form-label col-sm-4" for="nombre"><strong>Celular</strong> </label>
							                  <div class="col-sm-8">
							                    <input  type="text" class="form-control form-control-sm" name="celular"  required="required" pattern="[A-Za-z0-9]{1,20}" value="{{$encargado->celular}}">
							                  </div>
										</div>

								      <div class="modal-footer">
								      	<button type="submit" class="btn btn-primary btn-lg btn-block">ACTUALIZAR</button>
								        
<br>
<br>


								      </div>
              	
                
              

		
		

    		</div>

	</div> 

	<div class="col-lg-2 col-mb-2" > 	</div>


</div>


</form>

								      	<form action="{{ url('encargado')}}/{{$encargado->id}}" method="post">
					                  @csrf
					                  @method('DELETE')
					                  <button onclick="return confirm('Esta seguro de borrar?')" class="btn btn-sm btn-danger btn-block" type="submit">Delete</button>
					                </form>

@endsection