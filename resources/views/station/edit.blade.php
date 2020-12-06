@extends('plantilla.index')



@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">EDITAR</li>
  </ol>
</nav> 

@endsection

@section('content')
    <style>
      #map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }


    </style>

<form  action="{{url('station')}}/{{$localidad->id}}" method="POST" files="true" enctype="multipart/form-data">

	@method('PATCH')
   @csrf

<div class="row">
	<div class="col-lg-6 col-mb-6" > 

		<div class="card">
			<div class="card-header">

				<div class="row">
					<div class="col-lg-6 col-mb-6"><h6 class="m-0 font-weight-bold text-primary">Datos</h6></div>
					<div class="col-lg-6 col-mb-6"><a href="/photo/{{$localidad->id}}/edit"  class="btn btn-block btn-sm btn-info">Subir foto</a></div>
				</div>

			</div>

			<div class="card-body">

				<div class="row">
					<div class="col-lg-6 col-mb-6" >


						  <div class="form-group row  ">
						    <label for="region" class="col-4 col-form-label"><strong>Region</strong> </label>
						    <div class="col-8">
						      <input type="text" class="form-control " name="region" value="{{$localidad->region}}">
						    </div>
						  </div>

						  <div class="form-group row ">
						    <label for="distrito" class="col-4 col-form-label"><strong>Distrito</strong> </label>
						    <div class="col-8">
						      <input type="text" class="form-control " name="distrito" value="{{$localidad->distrito}}">
						    </div>
						  </div>

					</div>


					<div class="col-lg-6 col-mb-6" > 

						  <div class="form-group row">
						    <label for="provincia" class="col-4 col-form-label"><strong>Provincia</strong> </label>
						    <div class="col-8">
						      <input type="text" class="form-control " name="provincia" value="{{$localidad->provincia}}">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="localidad" class="col-4 col-form-label"><strong>Localidad</strong> </label>
						    <div class="col-8">
						      <input type="text" class="form-control " name="localidad" value="{{$localidad->localidad}}">
						    </div>
						  </div>
					</div>

				</div>
			</div>
    	</div>


    	<br>

		<div class="card ">
			<div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Estado</h6></div>

			<div class="card-body">

				<div class="row">

					<div class="col-lg-6 col-mb-6" >

						  <div class="form-group row">
						    <label for="estado" class="col-4 col-form-label"><strong>Estado</strong> </label>
						    <div class="col-8">

								<select class="form-control  " name="estado" >

								@foreach ($estados as $estado)
								<option  value="{{ $estado->id }}" {{$localidad->estado_id==$estado->id ? 'selected': ''}} >{{ $estado->nombre }}</option>
								@endforeach

								</select>
						    
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="tv_canal" class="col-4 col-form-label"><strong>Canal TV</strong> </label>
						    <div class="col-8">
						      <input type="text" class="form-control " name="tv_canal" value="{{$localidad->channeltv_id}}">
						    </div>
						  </div>


					</div>

					<div class="col-lg-6 col-mb-6" > 

						  <div class="form-group row">
						    <label for="cpacc" class="col-4 col-form-label"><strong>Radio - TV</strong> </label>
						    <div class="col-8">

			                  <select class="form-control" name="cpacc" >

			                    @foreach ($cpaccs as $cpacc)
			                      <option  value="{{ $cpacc->id }}" {{$localidad->cpacc_id==$cpacc->id ? 'selected': ''}} >{{ $cpacc->nombre }}</option>
			                    @endforeach

			                    {{-- <option  value="operativo" {{$localidad->estado=='OPERATIVO'? 'selected': ''}}>OPERATIVO</option>
			                                                                    <option value="inoperativo" {{$localidad->estado=='INOPERATIVO'? 'selected': ''}}>INOPERATIVO</option> --}}
			                  </select>
						    
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="fm_frecuencia" class="col-4 col-form-label"><strong>FM</strong> </label>
						    <div class="col-8">
						      <input type="text" class="form-control " name="fm_frecuencia" value="{{$localidad->frecuencyfm_id}}">
						    </div>
						  </div>


					</div>

				</div>




				


			</div>
    	</div>

    	

		{{--<div class="card">
			<div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Fecha {{ $localidad->fecha}}</h6></div>

			<div class="card-body">

				<div class="form-group form-control-sm row">
					<label class="control-label col-sm-4" for="date">Ultima fecha de visita a la localidad</label>
					<div class="col-sm-8"> 
						<input class="form-control"  value="{{\Carbon\Carbon::parse($localidad->fecha)->format('Y-m-d')}}" type="date" name="date" placeholder="ingrese fecha">
					</div>
				</div>

 				
			</div>
    	</div>--}}

    	<br>

		<div class="card">
			<div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Observaciones</h6></div>

			<div class="card-body">
				<textarea name="observacion" class="form-control" rows="5">{{$localidad->observacion}}</textarea>
			</div>
    	</div>

    	<br>




			

	</div>

	<div class="col-lg-6 col-mb-6" > 
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-lg-6 col-mb-6"><h6 class="m-0 font-weight-bold text-primary">Coordenadas</h6></div>
					<div class="col-lg-6 col-mb-6"><a href="/map/{{$localidad->id}}/edit"  class="btn btn-block btn-sm btn-success">Actualizar datos de Gps</a></div>
				</div>
				
			</div>
			<div class="card-body">
					<table class="table table-bordered text-xs table-sm">

					<tbody>
					  <tr>
					    <td>Latitud</td>
					    <td align="right">{{$localidad->latitud}}</td>
					  </tr>
					  <tr>
					    <td>Longitud</td>
					    <td align="right">{{$localidad->longitud}}</td>
					  </tr>
					  <tr>
					    <td>Altitud</td>
					    <td align="right">{{$localidad->altitud}} msnm</td>
					  </tr>
					</tbody>
					</table>

				</div>

		</div>

		<br>

		<div class="card">
			<div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Encargado</h6></div>

			<div class="card-body">

						  <div class="form-group row">
						    <label for="encargado" class="col-4 col-form-label"><strong>Nombre</strong> </label>
						    <div class="col-8">
						      <input type="text" class="form-control " name="encargado" value="{{$localidad->encargado}}" placeholder="Ingresar Nombre del encargado">
						    </div>
						  </div>


						  <div class="form-group row">
						    <label for="celular" class="col-4 col-form-label"><strong>Celular</strong> </label>
						    <div class="col-8">
						      <input type="text" class="form-control " name="celular" value="{{$localidad->celular}}" placeholder="Ingresar  celular del encargado">
						    </div>
						  </div>
			</div>
		</div>

		<br>

		<div class="card">
			<div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Requerimiento</h6></div>

			<div class="card-body">
	              <div class="form-group  form-control-sm row">
	                  
	                  <div class="col-sm-12"> 
	                    <input type="text"  id='requerimiento' class="form-control form-control-sm" name="requerimiento" placeholder="Ingresar Requerimiento" value="{{$localidad->requerimiento}}">
	                  </div>
	              </div>
	        </div>
		</div>

		<br>

		<div class="form-group row " align="center"> 
		<div class="col-sm-12">
		
              <div class="btn btn-primary btn-lg btn-block">
              	<button type="submit" class="btn btn-primary btn-lg btn-block">GUARDAR</button>
                
              </div>

		</div>
		</div>


	</div>

</div>


</form>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxnHk5EmsN-MnL5w10U08A0iP4qPM2tmQ&callback=initMap">
    </script>
@endsection