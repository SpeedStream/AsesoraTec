<?php
// Controlador principal (regresa instancia del modelo y carga archivo vista)
class Controlador{

	// Regresa instancia del modelo
	public function modelo($modelo){
		// Verifica que el archivo del modelo exista
		if(file_exists('../app/modelos/'.$modelo.'.php')){
			require_once('../app/modelos/'.$modelo.'.php');
			return new $modelo();
		}
		else{
			die('El modelo no existe');
		}
	}

	// Carga archivo vista
	public function vista($vista, $datos = []){
		// Verifica que el archivo de la vista exista
		if(file_exists('../app/vistas/'.$vista.'.php')){
			require_once('../app/vistas/'.$vista.'.php');
		}
		else{
			die('La vista no existe');
		}
	}
}