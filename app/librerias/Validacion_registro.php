<?php

// Libreria con metodos para vlidar registro
class Validacion_registro{

	// Descripcion Errores
	private $error00 = 'La longitud del nombre debe ser de 2 a 127 caracteres';
	private $error01 = 'El formato del correo no es correcto';
	private $error02 = 'La longitud del email debe ser de 3 a 320 caracteres';
	private $error03 = 'La longitud del celular debe ser de 10 dígitos';
	private $error04 = 'El número celular solo puede contener dígitos (0-9)';
	private $error05 = 'Las contraseñas no coinciden';
	private $error06 = 'La longitud de la contraseña debe ser de 8 a 16 caracteres';
	private $error07 = "El perfil debe ser 'alumno' o 'asesor'";
	private $error08 = "Ya existe una cuenta registrada con este email";


	// Valida datos de registro
	public function validar_registro(){
		// Guarda datos recibidos
		$perfil                  = isset($_POST['perfil']) ? $_POST['perfil'] : "";
		$nombre                  = isset($_POST['nombre']) ? $_POST['nombre'] : "";
		$email                   = isset($_POST['email']) ? $_POST['email'] : "";
		$celular                 = isset($_POST['celular']) ? $_POST['celular'] : "";
		$contrasena              = isset($_POST['contrasena']) ? $_POST['contrasena'] : "";
		$confirmacion_contrasena = isset($_POST['confirmacion_contrasena']) ? $_POST['confirmacion_contrasena'] : "";


		// Arreglo con errores por campo
		$errores = [];

		// Valida campos
		array_push($errores, $this->validar_perfil($perfil));
		array_push($errores, $this->validar_nombre($nombre));
		array_push($errores, $this->validar_email($email));
		array_push($errores, $this->validar_celular($celular));
		array_push($errores, $this->validar_contrasena($contrasena, $confirmacion_contrasena));

		// Regresa TRUE o arreglo con errores
		if($errores[0] != NULL OR $errores[1] != NULL OR $errores[2] != NULL OR $errores[3] != NULL OR $errores[4] != NULL)
			return $errores;

		return TRUE;
	}

	// Valida perfil
	public function validar_perfil($perfil){
		return ($perfil !== 'alumno' && $perfil !== 'asesor') ? $this->error07 : NULL;
	}

	// Valida nombre
	public function validar_nombre($nombre){
		return (strlen($nombre) < 2 || strlen($nombre) > 127) ? $this->error00 : NULL;
	}

	// Valida email
	public function validar_email($email){
		// Valida formato
		if( ! filter_var($email, FILTER_VALIDATE_EMAIL))
			return $this->error01;

		// Valida longitud
		if(strlen($email) < 3 || strlen($email) > 320)
			return $this->error02;

		// Valida que no existe cuenta registrada con ese email
		require_once RUTA_APP .'/modelos/Usuario_model.php';
		$usuario_model = new Usuario_model;
		if($usuario_model->verificar_exitencia_email($email))
			return $this->error08;

		return NULL;
	}

	// Valida numero celular
	public function validar_celular($celular){
		// Valida longitud
		if(strlen($celular) != 10)
			return $this->error03;

		// Valida que solo contenga numeros
		if( ! preg_match("/['0'1'2'3'4'5'6'7'8''9']{10}/", $celular))
			return $this->error04;

		return NULL;
	}

	// Valida contrasena
	public function validar_contrasena($contrasena, $confirmacion_contrasena){
		// Valida longitud
		if(strlen($contrasena)< 8 || strlen($contrasena) > 16)
			return $this->error06;

		// Valida relacion con contrasena de confirmacion
		if($contrasena != $confirmacion_contrasena)
			return $this->error05;

		return NULL;
	}
}