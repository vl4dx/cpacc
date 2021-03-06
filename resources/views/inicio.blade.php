<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" >

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

      <ul class="navbar-nav ml-auto">

      <li class="nav-item  dropdown">

      	@auth

        <li class="nav-item">
          <a class="nav-link" href="{{ url('/home') }}">DASHBOARD</a>
        </li>

        @else

        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">INICIAR SESION</a>
        </li>

        	            @if (Route::has('register'))
        	            <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">REGISTRAR</a>
                         </li>
                        @endif
        @endauth

      </ul>


    </div>
  </div>
</nav>

            
<br>

<!-- Page Content -->
<div class="container-fluid ">
  <br>
  <br>
  <br>
  
                          <div class="row">

                  	<div class="col-md-3"></div>
                  	<div class="col-md-6">
                      <center>
                  		<img  class="img-fluid" src="/img/logo2.jpg">
                      </center>
                  	</div>
                      
                        
                   	<div class="col-md-3"></div>	
                        
                  </div>


</div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>



