<?php

// Libreria con metodos para validar registro
class Validacion_login{

	// Descripcion Errores
	private $error01 = 'El formato del correo no es correcto';
	private $error02 = 'La longitud del email debe ser de 3 a 320 caracteres';
	private $error03 = 'El email o contraseña no son correctos';


	// Valida datos de registro
	public function validar_login(){
		// Guarda datos recibidos
		$email      = isset($_POST['email']) ? $_POST['email'] : "";
		$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "";

		// Arreglo con errores por campo
		$errores = [];

		// Validacion campos
		array_push($errores, $this->validar_congruencia_email($email));
		array_push($errores, $this->validar_cuenta($email, $contrasena));

		// Regresa TRUE o arreglo con errores
		if($errores[0] == NULL && $errores[1] == NULL)
			return TRUE;

		return $errores;
	}

	// Valida email
	public function validar_congruencia_email($email){
		// Valida formato
		if( ! filter_var($email, FILTER_VALIDATE_EMAIL))
			return $this->error01;

		// Valida longitud
		if(strlen($email) < 3 || strlen($email) > 320)
			return $this->error02;

		return NULL;
	}

	// Valida que email y contrasena coincidan con una cuenta
	public function validar_cuenta($email, $contrasena){
		// Valida que exista una cuenta registrada con el email
		if( ! $this->validar_email_existente($email))
			return $this->error03;

		// Valida que email y contrasena hagan match
		if( ! $this->validar_contrasena($email, $contrasena))
			return $this->error03;

		// Caso en que no exista error
		return NULL;
	}

	// Valida si existe una cuenta registrada con el email
	public function validar_email_existente($email){
		require_once RUTA_APP .'/modelos/Usuario_model.php';
		$usuario_model = new Usuario_model;
		return $usuario_model->verificar_exitencia_email($email);
	}

	// Valida que email y conotrasena hagan match
	public function validar_contrasena($email, $contrasena){
		require_once RUTA_APP .'/modelos/Usuario_model.php';
		$usuario_model = new Usuario_model;
		return $usuario_model->validar_contrasena($email, $contrasena);
	}

}