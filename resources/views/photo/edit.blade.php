
@extends('plantilla.index')



@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">SUBIR FOTO</li>
  </ol>
</nav> 

@endsection

@section('content')

<div class="row">
	
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<form action="{{ url('photo') }}/{{$id}}" method="post" enctype="multipart/form-data">
		   	@method('PATCH')
		   	@csrf
		    <div class="form-group">
		        <label for="exampleInputFile">Foto </label>
		        <input type="file" name="profile_image" id="exampleInputFile">
		    </div>
		    {{ csrf_field() }}
		    <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<div class="col-md-4"></div>
</div>
@endsection