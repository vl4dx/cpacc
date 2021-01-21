<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
    <script src="https://kit.fontawesome.com/5d3aa3cd42.js" crossorigin="anonymous"></script>


    @yield('css')


    <title>Telecomunicaciones</title>
  </head>

  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home">
          <img src="/img/drtc.png" alt="">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mr-auto">

          <li class="nav-item  dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-broadcast-tower mr-2 fa-fw text-gray-400"></i>Estaciones Cpacc</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{url('station')}}">Ver Todas</a>
              <a class="dropdown-item" href="{{url('station/create')}}">Crear</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-signal mr-2 fa-fw"></i>Estado</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="{{url('estado')}}">Estado</a>
              <a class="dropdown-item" href="{{url('channeltv')}}">Canales</a>
              <a class="dropdown-item" href="{{url('cpacc')}}">Cpacc</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe-americas mr-2"></i>Mapa</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item"href="{{url('map')}}">Mapa</a>
              
            </div>
          </li>

          @if (Auth::user()->cargo == 'admin')

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog mr-2"></i>Configurar</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="{{url('users')}}">Usuarios</a>
              <a class="dropdown-item"href="{{url('estadoconfig')}}">Estados</a>
            </div>
          </li>
               @else

      @endif

                

      
 


      </ul>




          <ul class="navbar-nav ml-auto">

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  @auth
                  {{ Auth::user()->name }}
                  @endauth
                </span>
                <i class="fas fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="/user/2/edit">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuracion
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" 
                href="{{route('logout')}}"
                data-toggle="modal" data-target="#logoutModal" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                  </form>
              </div>
            </li>

          </ul>


    </div>
  </div>
</nav>

@yield('tittle')

            

<!-- Page Content -->
<div class="container-fluid ">

@yield('content')

</div>

    
    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js" ></script>
    @yield('js')
  </body>
</html>