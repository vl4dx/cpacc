@extends('plantilla.index')

@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">INICIO</a></li>
    <li class="breadcrumb-item active" aria-current="page">TIPO DE CPACC</li>
  </ol>
</nav> 

@endsection

@section('content')


<!-- Page Heading -->

<div class="row">
    <div class=" col-md-3"></div>
    <div class=" col-md-6">

          <div class="list-group">

            @foreach ($cpaccs as $cpacc)



            <a href="/cpacc/{{$cpacc->id}}" class="text-uppercase  d-flex list-group-item list-group-item-action justify-content-between align-items-center"><strong>ESTACIONES {{$cpacc->nombre}}</strong><h4> <span class="badge badge-primary">{{$cpacc->caracteristicascpacc->count()}}</span></h4> </a>


            @endforeach

          </div>

    </div>

    <div class=" col-md-3"></div>
</div>


@endsection