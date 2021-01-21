@extends('plantilla.index')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">LISTADO DE USUARIOS</li>
  </ol>
</nav> 

@endsection

@section('content')

	@if (count($users) === 0)

		<div class="box-header with-border"><h3 class="box-title">no hay registros</h3></div>
	
	@else

    <div class="card shadow mb-4">
        <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Listado</h6></div>

        <div class="card-body ">
         
            <table class="table table-bordered  " id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr >
					<th class="text-primary "><input  class="form-control" id="myInput" type="text" placeholder="Nombre"></th> </th> 
					<th class="text-primary">Correo</th> 
					<th class="text-primary">cargo</th> 

					<th class="text-primary">creado</th>

					@if (Auth::user()->cargo == 'admin')
						<th class="text-primary">Editar Rol</th>
					@else
					    
					@endif
					
                </tr>
              </thead>

              <tbody id="myTable">
	@foreach ($users as $user)

	<tr>
	{{-- <td class="warning">{{ $station->id }}</th>  --}}
	<td>{{ $user->name }}</td> 
	<td>{{ $user->email }}</td> 
	<td>{{ $user->cargo }}</td> 
	<td>{{ $user->created_at }}</td> 


	@if (Auth::user()->cargo == 'admin')
	<td><a  href="/users/{{$user->id}}/edit"  class="btn btn-warning btn-block"><i class="fas fa-edit"></i></a></td>
	@else

	@endif

	
	</tr>

	@endforeach

              </tbody>
            </table>
          

          	          	<div class="row">
	          		<div class="col-md-5"></div>
	          		<div class="col-md-2">
	          			<a  href="/users/create"  class="btn btn-secondary btn-block">
						<i class="fas fa-plus-circle"></i></a>
	          		</div>
	          		<div class="col-md-5"></div>
	          		
	          	</div>

        </div>
      </div>

	@endif



@endsection
