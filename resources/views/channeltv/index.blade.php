@extends('plantilla.index')



@section('tittle')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">LISTADO DE CANALES ESTACIONES CPACC</li>
  </ol>
</nav> 

@endsection


@section('content')



<div class="row">
    <div class=" col-md-3"></div>
    <div class=" col-md-6">

          <div class="list-group">

            @foreach ($channels as $channel)

            @if ($channel->numero >= 1)

            <a href="/channeltv/{{$channel->id}}" class=" py-1 d-flex list-group-item list-group-item-action justify-content-between align-items-center"><strong>CANAL {{$channel->canal}}</strong><h4> <span class="badge badge-primary">{{$channel->numero}}</span></h4> </a>

            @else
    
            @endif

            @endforeach

          </div>

    </div>

    <div class=" col-md-3"></div>
</div>

<br>



@endsection