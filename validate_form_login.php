<?php
	
class Validacion{

	private $email;
	private $contrasena;

	function __construct($email, $contrasena){
		$this->email = $email;
		$this->contrasena = $contrasena;
	}

	function validarEmail(){
		$error00 = 'El formato del correo no es correcto';
		$error02 = 'La longitud del email no es correcta. Debe estar entre 3 a 320';
		if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			$res = (strlen($this->email) < 3 || strlen($this->email) > 320) ? $error02 : 1;
			return $res;
		}else{ return $error00; }
	}

	function validarContrasena(){
		$error05 = 'Las contraseñas no coinciden';
		$error06 = 'La longitud de las contraseña no es correcta. Debe de estar entre 8 a 16';
		if(isset($this->contrasena)){
			$res = (strlen($this->contrasena)< 8 || strlen($this->contrasena) > 16) ? $error06 : 1;
			return $res;
		}
		else{ return $error05; }
	}
}

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

$prueba_validacion = new Validacion($email, $contrasena);

if($prueba_validacion->validarEmail() != 1){
	echo($prueba_validacion->validarEmail());

}elseif($prueba_validacion->validarContrasena() != 1) {
	echo($prueba_validacion->validarContrasena());

}else{
	echo("true");
}
?>