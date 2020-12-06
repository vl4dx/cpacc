@extends('plantilla.index')


@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">EDITAR USUARIO</li>
  </ol>
</nav> 

@endsection

@section('content')

<form  action="{{url('users')}}/{{$user->id}}" method="POST" files="true" enctype="multipart/form-data">

	@method('PATCH')
   @csrf

<div class="row">
	<div class="col-lg-2 col-mb-2" > </div>
	<div class="col-lg-8 col-mb-8" > 

		<div class="card">
			<div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Datos</h6></div>

			<div class="card-body">



						<div class="form-group form-control-sm row">
			                  <label class="col-form-label col-sm-4" for="region"><strong>Email</strong> </label>
			                  <div class="col-sm-8">
			                    <input  type="text" disabled class="form-control form-control-sm" name="region" placeholder="Ingresar Region" value="{{$user->email}}">
			                  </div>
						</div>

						<div class="form-group form-control-sm row">
			                  <label class="col-form-label col-sm-4" for="nombre"><strong>Nombre</strong> </label>
			                  <div class="col-sm-8">
			                    <input  type="text" disabled class="form-control form-control-sm" name="nombre" placeholder="Ingresar Nombre" value="{{$user->name}}">
			                  </div>
						</div>
		



				
					<div class="form-group  form-control-sm row">
						<label class="control-label col-sm-4" for="estado2">Rol</label>
						<div class="col-sm-8"> 

							<select class="js-example-basic-single form-control form-control-sm " name="estado" >

							
							<option  value="1" {{$user->cargo=='admin' ? 'selected': ''}} >Admin</option>
							<option  value="2" {{$user->cargo=='user' ? 'selected': ''}} >User</option>
							<option  value="3" {{$user->cargo=='editor' ? 'selected': ''}} >Editor</option>

							

							</select>
						</div>
					</div>
				
					
		
		
		
              
              	<button type="submit" class="btn btn-primary btn-lg btn-block">ACTUALIZAR</button>
                
              

		
		

    		</div>

	</div> 

	<div class="col-lg-2 col-mb-2" > 	</div>


</div>


</form>

@endsection