<!---------------------------- Formulario ---------------------------->
<section class="text-white text-center">
    <div class="container">
      	<div class="row">
        	<div class="col-xl-9 mx-auto">
          		<h1>Búsqueda por materia</h1>
          		<br>
        	</div>
        	<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          		<form action="<?php echo RUTA_URL .'/asesores';?>" method="post">
            		<div class="form-row">
              			<div class="col-12 col-md-9 mb-2 mb-md-0">
                			<input type="text" name="materia" class="form-control form-control-lg" placeholder="¿De qué materia necesitas asesoría?">
              			</div>
              			<div class="col-12 col-md-3">
               				<button type="submit" class="btn btn-block btn-lg btn-primary">Buscar</button>
             			</div>
            		</div>
          		</form>
        	</div>
      	</div>
    </div>
</section>
<br><br>

<!---------------------------- Resultados de asesores ---------------------------->
<TABLE WIDTH="100%">
	<TR>
		<TD WIDTH="100%">
			<center>
				<h1>Detalles asesor</h1>

				<?php foreach ($datos['asesor'] as $asesor):?>

					<!---------------------------- Tarjeta asesor ---------------------------->
					<div class="card">
						<h5 class="card-header"><?php echo $asesor['Nombre'];?></h5>
						<div class="card-body">
						<TABLE WIDTH="100%">
								<TR>
									<TD WIDTH="25%">
										<center>
										<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
												<div class="features-icons-icon d-flex">
													<i class="fas fa-user-tie"></i>
												</div>
										</div>
										<span class="glyphicon glyphicon-star"></span>
										</center>
									</TD>

									<TD WIDTH="50%">
										<center>
											<div class="card-body">
												<h5 class="card-title"><?php echo $asesor['Municipio'] .", ". $asesor['Estado'];?></h5>
												<br>
												<strong>Área conocimiento: </strong>
												<p class="card-text"><?php echo $asesor['AreaConocimiento'];?></p>
												<strong>Especialidad: </strong>
												<p class="card-text"><?php echo $asesor['Especialidad'];?></p>
												<strong>Resumen: </strong>
												<p class="card-text"><?php echo $asesor['Resumen'];?></p>
												<strong>Formas de pago: </strong>
												<p class="card-text"><?php echo $asesor['FormasPago'];?></p>
												<a href="<?php echo RUTA_URL .'/asesores/detalles/'. $asesor['ID'];?>" class="btn btn-primary">Contactar</a>
											</div>
										</center>
									</TD>

								</TR>
							</TABLE>
						</div>
					</div>
					<br>
				<?php endforeach;?>

			</center>
		</TD>
	</TR>
</TABLE>

