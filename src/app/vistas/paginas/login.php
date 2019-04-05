		<!---------------------------- Formulario  ----------------------------->
		<main class="formulario_registro">
		    <div class="cotainer">
		        <div class="row justify-content-center">
		            <div class="col-md-8 col-lg-6">
		                <div class="card">
	                        <div class="card-header text-center">Accede a tu perfil</div>
	                        <div class="card-body">
	                            <form action="#" onsubmit="validar_login()" class="needs-validation" style="padding-top: 3%;">

	                                <div class="form-group row" style="padding-bottom: 1%;">
	                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
	                                    <div class="col-md-6">
	                                        <input type="email" id="email" class="form-control" required>
	                                         <div id="error-email" class="mensaje-error"></div>
	                                    </div>
	                                </div>

	                                <div class="form-group row" style="padding-bottom: 1%;">
	                                    <label for="contrasena" class="col-md-4 col-form-label text-md-right">Contraseña</label>
	                                    <div class="col-md-6">
	                                        <input type="password" id="contrasena" class="form-control" required>
	                                         <div id="error-contrasena" class="mensaje-error"></div>
	                                    </div>
	                                </div>

	                                <div class="col-md-6 offset-md-4">
	                                	<button class="btn btn-primary btn-block" type="submit">Entrar</button>
	                                </div>

	                        	</form>

	                        	<br>
	                        	<div class="form-group row" align="center">
                                    <div class="col-md-6 offset-md-4">
                                    	<p>¿No tienes una cuenta? ¡Regístrate ahora!</p>
                                    	<a href="<?php echo RUTA_URL .'/usuario/registrar';?>">Regístrate</a>
                                    </div>
                                </div>

	                    	</div>
		                </div>
		            </div>
		        </div>
		    </div>
		</main>

		<br>