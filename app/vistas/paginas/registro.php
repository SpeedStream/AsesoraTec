		<!---------------------------- Formulario  ----------------------------->
		<main class="formulario_registrar">
		    <div class="cotainer">
		        <div class="row justify-content-center">
		            <div class="col-md-8 col-lg-6">
		                <div class="card">
	                        <div class="card-header text-center">registrar</div>
	                        <div class="card-body">
	                            <form action="" onsubmit="registrar_usuario()" class="needs-validation">

	                      			<input type="hidden" id="perfil" value="<?php echo $datos['perfil'];?>" />
	                      			<div id="error-perfil" class="mensaje-error"></div>

	                                <div class="form-group row">
	                                    <label for="nombre_completo" class="col-md-4 col-form-label text-md-right">Nombre completo</label>
	                                    <div class="col-md-6">
	                                        <input type="text" id="nombre_completo" class="form-control" required>
	                                        <div id="error-nombre_completo" class="mensaje-error"></div>
	                                    </div>
	                                </div>
	                                <div class="form-group row">
	                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
	                                    <div class="col-md-6">
	                                        <input type="email" id="email" class="form-control" required>
	                                        <div id="error-email" class="mensaje-error"></div>
	                                    </div>
	                                </div>

	                                <div class="form-group row">
	                                    <label for="celular" class="col-md-4 col-form-label text-md-right">No. Celular</label>
	                                    <div class="col-md-6">
	                                        <input type="text" id="celular" class="form-control" required>
	                                        <div id="error-celular" class="mensaje-error"></div>
	                                    </div>
	                                </div>

	                                <div class="form-group row">
	                                    <label for="contrasena" class="col-md-4 col-form-label text-md-right">Contraseña</label>
	                                    <div class="col-md-6">
	                                        <input type="password" id="contrasena" class="form-control" required>
	                                        <div id="error-contrasena" class="mensaje-error"></div>
	                                    </div>
	                                </div>

	                                <div class="form-group row">
	                                    <label for="confirmacion_contrasena" class="col-md-4 col-form-label text-md-right">Confirmar contraseña</label>
	                                    <div class="col-md-6">
	                                        <input type="password" id="confirmacion_contrasena" class="form-control" required>
	                                        <div id="error-confirmacion_contrasena" class="mensaje-error"></div>
	                                    </div>
	                                </div>

									<div class="col-md-8 offset-md-4">
								    	<a href="<?php echo RUTA_URL .'/usuario/registrar';?>" class="btn btn-danger">Cancelar</a>
								    	<button class="btn btn-primary" type="submit">Registrar</button>
									</div>

	                        	</form>
	                    	</div>
		                </div>
		            </div>
		        </div>
		    </div>
		</main>

		<br>