@extends('plantilla.index')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">LISTADO DE ESTACIONES CPACC</li>
  </ol>
</nav> 

@endsection

@section('content')

          <div class="card shadow mb-4">

            <div class="card-body ">
             
                <table class="table table-bordered  " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr >
                    	<th class="text-primary">Id</th>
						<th class="text-primary">Region</th> 
						<th class="text-primary">Provincia</th> 
						<th class="text-primary">Distrito</th> 
						<th ><input  class="form-control" id="myInput" type="text" placeholder="LOCALIDAD"></th> 
						<th class="text-primary">Estado</th>
						<th class="text-primary">TIPO</th>
						@if (Auth::user()->cargo == 'admin' || Auth::user()->cargo == 'editor')
							<th class="text-primary">Editar</th>
						@else
						    
						@endif
						
                    </tr>
                  </thead>

                  <tbody id="myTable">
		@foreach ($Estaciones->caracteristicascpacc as $station)

		<tr>
		 <td class="warning">{{ $station->id }}</th> 
		<td><small>{{ $station->region }}</small></td> 
		<td><small>{{ $station->provincia }}</small></td> 
		<td><small>{{ $station->distrito }}</small></td> 
		<td><a href="/station/{{$station->id}}" class="btn btn-light btn-sm " >{{ $station->localidad }}</a>

		<td><div  class="btn btn-block  btn-sm btn-{{$station->estadoModel->color}}">{{$station->estadoModel->nombre}} </div></td>




		{{--<td style="background: {{ $station->estadoModel->color}};"><a  class="btn btn-block btn-danger">{{$station->estadoModel->nombre}}</a>--}}
		
		
 		

 		<td><div  class="btn btn-block btn-sm  btn-info">{{$station->cpaccModel->nombre}}</div></td>



		
		{{--<td>{{$station->cpaccModel->nombre}}</td>
		<td>{{$station->cpacc_id}}</Td>--}}

		

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

    



@endsection