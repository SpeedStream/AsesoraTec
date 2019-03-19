<!------------------------ Barra de navegacion ----------------------->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
	<div class="container">
    	<a class="navbar-brand" href="<?php echo RUTA_URL;?>">
        	<img src="<?php echo RUTA_URL .'/img/logo.png';?>" width="auto" height="60" alt="Logo">
        </a>

    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
        </button>

    	<div class="collapse navbar-collapse" id="navbarResponsive">
      		<ul class="navbar-nav ml-auto">
		        <li class="nav-item"> <a class="nav-link" href="#">Ayuda</a> </li>
		        <li class="nav-item"> <a class="nav-link" href="#">Iniciar sesión</a> </li>
		        <li class="nav-item"> <a class="nav-link" href="<?php echo RUTA_URL .'/usuario/registrar';?>">Regístrate</a> </li>
      		</ul>
    	</div>

  	</div>
</nav>