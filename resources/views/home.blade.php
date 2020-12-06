@extends('plantilla.index')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">PAGINA PRINCIPAL</li>
  </ol>
</nav> 

@endsection

@section('content')
            <div class="row">
                <div class=" col-md-12">
                   <center> <img class="img-fluid" src="/img/escritorio.png"></center>
                    
            	</div>
            </div>
<br>
<div class="row">

    <div class=" col-md-4">
    	<div class="card shadow mb-4">
			
			<div class="card-body">
				<div class="list-group">


			          <a href="/estado" class="py-4  d-flex list-group-item list-group-item-action justify-content-between align-items-center list-group-item-success"><strong>VER ESTADOS</strong></a>

			  	</div>
			</div>
        </div>
    </div>


    <div class=" col-md-4">

    	<div class="card shadow mb-4">
			
			<div class="card-body">

		      	<div class="list-group">

						<a href="/cpacc" class="py-4  d-flex list-group-item list-group-item-action justify-content-between align-items-center list-group-item-info"><strong>VER TIPO DE CPACC</strong></a>

		      	</div>
		    </div>
		</div>

    </div>

    <div class=" col-md-4">
    	<div class="card shadow mb-4">
			
			<div class="card-body">
			          <div class="list-group">

							<a href="/channeltv" class="py-4  d-flex list-group-item list-group-item-action justify-content-between align-items-center list-group-item-warning"><strong>CANALES</strong></a>

			          </div>
			</div>
		</div>
    </div>


</div>


@endsection