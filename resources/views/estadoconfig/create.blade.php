@extends('plantilla.index')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">AGREGAR NUEVO ESTADO</li>
  </ol>
</nav> 

@endsection

@section('content')

<div class="row">
	<div class="col-md-3"></div>
<div class="col-md-6">
<div class="card shadow mb-4">
	<div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Datos</h6></div>

	<div class="card-body">

		    <form class="form-horizontal" action="{{url('estadoconfig')}}" method="POST">
		    @csrf
		    	<div class="row">
		    		<div class="col-md-8">
					    <div class="form-group row">
					        <label class="control-label col-sm-4" for="nombre">Nombre</label>
					        <div class="col-sm-8"> 
					          <input type="text" class="form-control" name="nombre" placeholder="Ingresar Distrito">
					        </div>
					    </div>

				    </div>
				  	<div  class="col-md-4">

				  		@foreach ($colors as $color)

						<input type="radio" id="{{$color->nombre}}" name="color" value="{{$color->nombre}}">
						<label for="{{$color->nombre}}">
							<div class="btn bg-{{$color->nombre}} text-white btn-block">{{$color->nombre}}</div>
						</label>
						<br>

						@endforeach
					</div>
				</div>

									    <div class="form-group row"> 
					        <div class="col-md-4"></div>
					        <div class="col-md-4"><button type="submit" class="btn btn-primary btn-block mb-2">GUARDAR</button></div>
					        <div class="col-md-4"></div>
					        
					    </div>
		  </form>
	</div>


	
</div>
		<div class="col-md-3"></div>

		</div>
</div>

@endsection