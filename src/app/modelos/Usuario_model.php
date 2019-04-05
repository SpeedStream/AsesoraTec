<?php

class Usuario_model{

	// Atributos
	private $conexion;
	
	// Constructor
	public function __construct(){
		// Carga libreria BD
		require_once RUTA_APP .'/librerias/Database.php';

		// Crea conexion a la BD
		$this->conexion = new Database;
	}// Fin constrcutor

	// Crea registro en la BD
	public function crear_registro(){
		try{
			// realiza consulta y cierra conexion
			$query = $this->conexion->prepare("INSERT INTO Usuarios (Perfil, Nombre, Email, Celular, Password)
				                               VALUES (?,?,?,?,?)");

				$query->bindParam(1, $_POST['perfil'], PDO::PARAM_STR);
				$query->bindParam(2, $_POST['nombre'], PDO::PARAM_STR);
            	$query->bindParam(3, $_POST['email'], PDO::PARAM_STR);
            	$query->bindParam(4, $_POST['celular'], PDO::PARAM_STR);

            	// Crea hash de la contrasena (ncluye salt)
				$hash_contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
            	$query->bindParam(5, $hash_contrasena, PDO::PARAM_STR);

			$query->execute();
			$this->conexion->cerrar();
		}
		catch(PDOException $e){
			// echo $e;
		}
	}// Fin get_barreras

	// Verifica si un email ya ha sido registrado
	public function verificar_exitencia_email($email){
		try{
			// realiza consulta y cierra conexion
			$query = $this->conexion->prepare("SELECT COUNT(*) AS apariciones FROM Usuarios WHERE Email = ?");
            $query->bindParam(1, $email, PDO::PARAM_STR);
			$query->execute();
			$this->conexion->cerrar();

			$query = $query->fetch(PDO::FETCH_OBJ);
			$apariciones = $query->apariciones;

			if($apariciones == 0)
				return FALSE;

			else
				return TRUE;
		}
		catch(PDOException $e){
			// echo $e;
		}
	}

	// Valida match usuario - contrasena
	public function validar_contrasena($email, $contrasena){
		// Alamcena hash de la contrasena
		$hash_contrasena = "";

		try{
			// obtiene hash del registro segun email
			$query = $this->conexion->prepare("SELECT Password FROM Usuarios WHERE Email = ? LIMIT 1");
            $query->bindParam(1, $email, PDO::PARAM_STR);
			$query->execute();
			$this->conexion->cerrar();
			$query = $query->fetch(PDO::FETCH_OBJ);

			$hash_contrasena = $query ->Password;
		}
		catch(PDOException $e){
			// echo $e;
			return FALSE;
		}

		// Valida hash con contrasena ingresada
		if (password_verify($contrasena, $hash_contrasena))
			return TRUE;
		
		else
			return FALSE;
	}
}