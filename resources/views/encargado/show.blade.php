@extends('plantilla.index')

@section('tittle')



<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">INICIO</a></li>
    <li class="breadcrumb-item"><a href="/station">LISTA DE ESTACIONES CPACC</a></li>
    <li class="breadcrumb-item"><a href="/station/{{$station->id}}">LOCALIDAD DE {{$station->localidad}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">ENCARGADOS</li>
  </ol>
</nav> 

@endsection


@section('content')

<div class="col-mb-12">
  @if(session()->get('success'))
    <div class="alert alert-success " role="alert">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

	<div class="row">

		<div class="col-md-2"></div>

		<div class="col-md-8">

		<div class="d-none d-md-block ">{{--Ocultar en mobile--}}
			<div class="card mb-2" >
				<div class="card-body py-2">

					<div class="row">
						<div class="col-md-1"><strong>ID</strong></div>
						<div class="col-md-3"><strong>Nombre</strong></div>
						<div class="col-md-3"><strong>Cargo</strong></div>
						<div class="col-md-3"><strong>Celular</strong></div>
						<div class="col-md-2"><strong>Editar</strong></div>

					</div>

				</div>
			</div>
		</div>{{--Ocultar en mobile--}}

@if (count($station->listaEncargadosModel) === 0)

	<div class="card mb-2" >
		<div class="card-body py-2">

			<div class="row">
				<div class="col-md-12">no hay registros</div>
			</div>

		</div>
	</div>

@else

		@foreach ($station->listaEncargadosModel as $lista)

			<div class="card mb-2 " >
				<div class="card-body py-2">

					<div class="row">
						<div class="col-md-1 d-none d-md-block">
							{{$lista->id}}

							
						</div>

						<div class="col-md-3 text-uppercase">
							
									{{$lista->nombre}}
	
						</div>

						<div class="col-md-3 text-uppercase mb-1 ">
							{{$lista->cargo}}
							
						</div>

						<div class="col-md-3 mb-1">
							<a class="btn btn-sm btn-block btn-outline-success " href="tel:{{$lista->celular}}" >
							   <i class="fas fa-phone-square-alt"></i> {{$lista->celular}}
							</a>

						</div>
						<div class="col-md-2">
			
									<a  href="/encargado/{{$lista->id}}/edit"  class="btn btn-sm btn-warning btn-block">
																<i class="fas fa-edit"></i></a>	
				
							
						</div>

					</div>

				</div>
			</div>
		@endforeach
@endif

		          	
		          	{{-- Boton --}}
		          	<div class="row">
		          		<div class="col-md-5"></div>
		          		<div class="col-md-2">

							<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal{{$station->id}}">
							  <i class="fas fa-plus"></i>
							</button>


							<form  action="{{url('encargado')}}/crear/{{$station->id}}" method="POST">
							
							@csrf

								<div class="modal fade" id="exampleModal{{$station->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">

								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel"><strong>Agregar Encargado - {{$station->localidad}}</strong></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>

								      <div class="modal-body">

										<div class="form-group form-control-sm row">
							                  <label class="col-form-label col-sm-4" for="region"><strong>Nombre</strong> </label>
							                  <div class="col-sm-8">
							                    <input  type="text"  class="form-control form-control-sm" name="nombre"  required="required" pattern="[A-Za-z0-9]{1,20}" placeholder="Ingresar Nombre" >
							                  </div>
										</div>

										<div class="form-group form-control-sm row">
							                  <label class="col-form-label col-sm-4" for="nombre"><strong>Cargo</strong> </label>
							                  <div class="col-sm-8">
							                    <input  type="text" class="form-control form-control-sm" name="cargo"  required="required" pattern="[A-Za-z0-9]{1,20}"  placeholder="Ingresar Cargo">
							                  </div>
										</div>

										<div class="form-group form-control-sm row">
							                  <label class="col-form-label col-sm-4" for="nombre"><strong>Celular</strong> </label>
							                  <div class="col-sm-8">
							                    <input  type="text" class="form-control form-control-sm" name="celular"  required="required" pattern="[A-Za-z0-9]{1,20}" placeholder="Ingresar Celular">
							                  </div>
										</div>

								      <div class="modal-footer">
								      	<button type="submit" class="btn btn-primary btn-lg btn-block">GUARDAR</button>
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								      </div>

								    </div>
								  </div>
								</div>

							</div>

							</form>

		          		</div>
		          		
		          		<div class="col-md-5"></div>
		          		
		          	</div>

	    </div>

	    <div class="col-md-2"></div>
	</div>



@endsection



