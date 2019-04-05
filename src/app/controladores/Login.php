<?php
// Controlador Login
class Login extends Controlador{

	// Metodo default (Muestra formulario de login) 
	public function index(){
		$this->vista('inc/header');
		$this->vista('inc/navegacion');
		$this->vista('paginas/login');
		$this->vista('inc/footer');
	}

	// Valida login (Regresa true o mensaje de error)
	public function validar(){
		// Crea instancia de libreria Validacion
		require_once RUTA_APP .'/librerias/Validacion_login.php';
		$validacion = new Validacion_login;

		// Regresa TRUE o arreglo con errores
		$estado_login = $validacion->validar_login();

		// Caso login exitoso
		if($estado_login === TRUE){
			echo "true";
		}

		// Caso login fallido
		else{
			echo (json_encode($estado_login));
		}
	}
}