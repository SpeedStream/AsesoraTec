<?php
	
class Validacion{

	private $nombre;
	private $email;
	private $celular;
	private $contrasena;
	private $confirmacion_contrasena;

	function __construct($nombre, $email, $celular, $contrasena, $confirmacion_contrasena){
		$this->nombre = $nombre;
		$this->email = $email;
		$this->celular = $celular;
		$this->contrasena = $contrasena;
		$this->confirmacion_contrasena = $confirmacion_contrasena;
	}

	function validarNombre(){
		$error01 = 'La longitud debe de estar entre 2 a 127';

		$res = (strlen($this->nombre) < 2 || strlen($this->nombre) > 127) ? $error01 : 1;
		return $res;
	}

	function validarEmail(){
		$error02 = 'La longitud del email debe estar entre 3 a 320';

		$res = (strlen($this->email) < 3 || strlen($this->email) > 320) ? $error02 : 1;
		return $res;
	}

	function validarCelular(){
		$error03 = 'La longitud debe ser de 10 digitos';
		$error04 = 'El número de celular solo pueden ser digitos del 0 al 9';

		if(strlen($this->celular) == 10){
			$res = (preg_match("/['0'1'2'3'4'5'6'7'8''9']{10}/", $this->celular)) ? 1 : $error04;
			return $res;

		}else{ return $error03; }
	}

	function validarContrasena(){
		$error05 = 'Las contraseñas no coinciden';
		$error06 = 'La longitud debe de estar entre 8 a 16';

		if($this->contrasena == $this->confirmacion_contrasena){
			$res = (strlen($this->contrasena)< 8 || strlen($this->contrasena) > 16) ? $error06 : 1;
			return $res;
		}
		else{ return $error05; }
	}
}

/*Prueba Validación*/
$prueba_validacion = new Validacion("bernardo","bernardo@itesm.mx","0123456789","bernardo13","bernardo12");
echo("nom: ".$prueba_validacion->validarNombre()."<br>");
echo("mail: ".$prueba_validacion->validarEmail()."<br>");
echo("cel: ".$prueba_validacion->validarCelular()."<br>");
echo("cont: ".$prueba_validacion->validarContrasena()."<br>");

/*Recibir Datos de Ajax*/
/*
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$contrasena = $_POST['contrasena'];
$confirmacion_contrasena = $_POST['confirmacion_contrasena'];
*/

/*VALIDAR TEXTO Y ENVIAR RESPUESTA*/
/*if todo salio bien = true, else = false*/
//echo("false");

?>