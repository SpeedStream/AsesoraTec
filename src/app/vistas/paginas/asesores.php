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
		<TD WIDTH="25%">
			<center>
				<!---------------------------- Categorias recomendadas ---------------------------->
				<a href="<?php echo RUTA_URL .'/asesores';?>" class="btn btn-secondary btn-lg btn-block">Todo</a>
				<a href="<?php echo RUTA_URL .'/asesores/buscar/matematicas';?>" class="btn btn-secondary btn-lg btn-block">Matemáticas</a>
				<a href="<?php echo RUTA_URL .'/asesores/buscar/fisica';?>" class="btn btn-secondary btn-lg btn-block">Física</a>
				<a href="<?php echo RUTA_URL .'/asesores/buscar/informatica';?>" class="btn btn-secondary btn-lg btn-block">Informática</a>
				<a href="<?php echo RUTA_URL .'/asesores/buscar/arte';?>" class="btn btn-secondary btn-lg btn-block">Arte</a>
				<a href="<?php echo RUTA_URL .'/asesores/buscar/finanzas';?>" class="btn btn-secondary btn-lg btn-block">Finanzas</a>
				<a href="<?php echo RUTA_URL .'/asesores/buscar/idiomas';?>" class="btn btn-secondary btn-lg btn-block">Idiomas</a>

			</center>
		</TD>
		<TD WIDTH="75%">
			<center>
				<h1>Resultados búsqueda</h1>

				<?php foreach ($datos['asesores'] as $asesor):?>

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
									<TD WIDTH="75%">
										<center>
											<div class="card-body">
												<h5 class="card-title"><?php echo $asesor['Municipio'] .", ". $asesor['Estado'];?></h5>
												<p class="card-text"><?php echo $asesor['Resumen'];?></p>
												<a href="<?php echo RUTA_URL .'/asesores/detalles/'. $asesor['ID'];?>" class="btn btn-primary">Detalles</a>
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

