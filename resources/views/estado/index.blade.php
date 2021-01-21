@extends('plantilla.index')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">INICIO</a></li>
    <li class="breadcrumb-item active" aria-current="page">ESTADO</li>
  </ol>
</nav> 

@endsection

@section('content')


<!-- Page Heading -->

{{--@foreach ($estados as $estado)

          <div class="row">
            <div class=" col-md-3"></div>
            <div class=" col-md-6">
              <div class="card border-left-{{$estado->color}}  shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Estaciones {{$estado->nombre}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      {{$estado->numero}}
                      
                        </div>
                    </div>
                    <a href="/estado/{{$estado->id}}" class="col-auto">
                      <i class="fas fa-clipboard-list fa-3x text-{{$estado->color}}"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class=" col-md-3"></div>
          </div>
          <br>
@endforeach--}}


<div class="row">
    <div class=" col-md-3"></div>
    <div class=" col-md-6">

          <div class="list-group">

            @foreach ($estados as $estado)



            <a href="/estado/{{$estado->id}}" class="text-uppercase  d-flex list-group-item list-group-item-action justify-content-between align-items-center"><strong>ESTACIONES {{$estado->nombre}}</strong><h4> <span class="badge badge-{{$estado->color}}">{{$estado->numero}}</span></h4> </a>


            @endforeach

          </div>

    </div>

    <div class=" col-md-3"></div>
</div>



@endsection