@extends('plantilla.index')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">LISTADO DE ESTACIONES CPACC</li>
  </ol>
</nav> 

@endsection

@section('content')

@if (count($stations) === 0)
	<div class="box-header with-border"><h3 class="box-title">no hay registros</h3></div>
@else


<div class="row ">	
	<div class="col-md-1">
		
	</div>
	<div class="col-md-10">
		<input class="globalInputSearch form-control mb-2" type="text" placeholder="Buscar Localidad">
	</div>
	<div class="col-md-1">
		
	</div>
	
</div>	


<div class="row ">	
	<div class="col-md-1"></div>
	<div class="col-md-10">




		<div class="d-none d-md-block ">{{--Ocultar en mobile--}}
			<div class="card mb-2" >
				<div class="card-body py-2">

					<div class="row">
						<div class="col-md-2">Localidad</div>
						<div class="col-md-2">Distrito</div>
						<div class="col-md-2">Provincia</div>
						<div class="col-md-2">Estado</div>
						<div class="col-md-1">Tipo</div>
						<div class="col-md-1">Obs</div>
						<div class="col-md-1">Edit</div>
					</div>

				</div>
			</div>
		</div>{{--Ocultar en mobile--}}

		@foreach ($stations as $station)

		
<ul class="globalTargetList" style="margin: 0; padding: 0;">
    <li style="list-style-type:none; margin: 0; padding: 0;">
			<div class="card mb-2 ">

		  		<div class="card-body py-2 ">


					<div   class="row ">

						
						<div class="col-md-2 p-0">
							<a href="/station/{{$station->id}}" class="btn btn-sm btn-block btn-secondary text-left" >
								<span class="badge badge-dark">{{ $station->id }}</span> -
								@php
								$len=strlen($station->localidad);
								if($len>=15){echo '<small>'.$station->localidad.'</small>';}
								else {echo $station->localidad;}
								@endphp
							</a>

						</div>
							<div class="col-md-2">
									{{$station->distrito}}
							</div>
							<div class="col-md-2 ">
								{{$station->provincia}}
							</div>



							<div class="col-md-2">
								<a href="/station/{{$station->id}}" class="btn mb-1 btn-block  btn-sm btn-{{$station->estadoModel->color}}">
											{{$station->estadoModel->nombre}}
										</a>
							</div>
							<div class="col-md-1">
								<div  class="btn mb-1 btn-sm btn-block btn-info">{{$station->cpaccModel->nombre}}</div>
							</div>
							<div class="col-md-1">

						<button type="button" class="btn mb-1 btn-block btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$station->id}}">
						  <i class="fas fa-search-plus"></i>
						</button>
						<div class="modal fade" id="exampleModal{{$station->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel"><strong>Localidad de {{$station->localidad}}</strong></h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">

						      				
				<textarea readonly name="observacion" class="form-control" rows="5">{{$station->observacion}}</textarea>
			</div>

						        
						      
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>

							</div>
							<div class="col-md-1">
								
					@if (Auth::user()->cargo == 'admin' || Auth::user()->cargo == 'editor')
					<td><a  href="/station/{{$station->id}}/edit"  class="btn btn-sm btn-warning btn-block"><i class="fas fa-edit"></i></a></td>
					@else

					@endif

							</div>
					</div>

				</div>
			</div>
		
    </li>
  </ul>
		@endforeach


		</div>
	<div class="col-md-1"></div>
	
</div>	


@endif



@endsection

@section('js')
<script type="text/javascript">
$('.globalSearchResultNoFoundFeedback').hide()
  $(".globalInputSearch").keyup(function() {

    // Retrieve the input field text and reset the count to zero
    var filter = $(this).val(),
      count = 0;
      
       if (count == 0) {
          $('.globalSearchResultNoFoundFeedback').hide()
       }
        

    // Loop through the comment list
    $('.globalTargetList li').each(function() {
      // If the list item does not contain the text phrase fade it out

      if ($(this).text().search(new RegExp(filter, "i")) < 0) {
        $(this).hide(); // MY CHANGE
        if (count == 0) {
          $('.globalSearchResultNoFoundFeedback').show()
        } else {
          $('.globalSearchResultNoFoundFeedback').hide()
        }
        // Show the list item if the phrase matches and increase the count by 1
      } else {
        $(this).show(); // MY CHANGE
        count++;

      }

    });

});
</script>
@endsection