@extends('plantilla.index')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">LISTADO DE USUARIOS</li>
  </ol>
</nav> 

@endsection

@section('content')
      <form class="form-horizontal" action="{{url('users')}}" method="POST">
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
                                <input  type="text"  class="form-control form-control-sm" name="email" placeholder="Ingresar Region" >
                              </div>
                        </div>

                        <div class="form-group form-control-sm row">
                              <label class="col-form-label col-sm-4" for="nombre"><strong>Nombre</strong> </label>
                              <div class="col-sm-8">
                                <input  type="text" class="form-control form-control-sm" name="nombre" placeholder="Ingresar Nombre" \>
                              </div>
                        </div>
        



                        <div class="form-group form-control-sm row">
                            <label  class="control-label col-sm-4" for="password"><strong>Contraseña</strong></label>
                            <div class="col-sm-8">
                                <input required type="text" class="form-control form-control-sm" name="password" placeholder="Ingresar su nueva contraseña">
                            </div>
                        </div>
                    
        
        
        
              
                <button type="submit" class="btn btn-primary btn-lg btn-block">GUARDAR</button>
                
              

        
        

            </div>
        </div>

    </div> 

    <div class="col-lg-2 col-mb-2" >    </div>


</div>

</form>
    @endsection