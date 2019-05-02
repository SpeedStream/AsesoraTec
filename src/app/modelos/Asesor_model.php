<?php

class Asesor_model{

	// Atributos
	private $conexion;
	
	// Constructor
	public function __construct(){
		// Carga libreria BD
		require_once RUTA_APP .'/librerias/Database.php';

		// Crea conexion a la BD
		$this->conexion = new Database;
	}// Fin constrcutor


	// Devuelve todos los asesores
	public function get_all(){
		try{
			$query = $this->conexion->prepare("SELECT Usuarios.ID, Usuarios.Nombre,
			DetallesAsesores.Resumen, DetallesAsesores.Municipio, DetallesAsesores.Estado
			FROM Usuarios
			INNER JOIN DetallesAsesores ON Usuarios.ID = DetallesAsesores.IDUsuario");
			$query->execute();
			$this->conexion->cerrar();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo $e;
		}
	}

	// Devuelve asesores que den materia recibida
	public function get_by_materia($materia){
		try{
			$query = $this->conexion->prepare("SELECT Usuarios.ID, Usuarios.Nombre,
			DetallesAsesores.Resumen, DetallesAsesores.Municipio, DetallesAsesores.Estado
			FROM Usuarios
			INNER JOIN DetallesAsesores ON Usuarios.ID = DetallesAsesores.IDUsuario
			WHERE DetallesAsesores.AreaConocimiento = ? OR
			DetallesAsesores.Especialidad = ?");
			$query->bindParam(1, $materia, PDO::PARAM_STR);
			$query->bindParam(2, $materia, PDO::PARAM_STR);
			$query->execute();
			$this->conexion->cerrar();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo $e;
		}
	}

	// Devuelve asesor segun id
	public function get_by_id($id){
		try{
			$query = $this->conexion->prepare("SELECT Usuarios.Nombre,
			DetallesAsesores.Resumen, DetallesAsesores.AreaConocimiento, DetallesAsesores.Especialidad,
			DetallesAsesores.Municipio, DetallesAsesores.Estado, DetallesAsesores.FormasPago
			FROM Usuarios
			INNER JOIN DetallesAsesores ON Usuarios.ID = DetallesAsesores.IDUsuario
			WHERE DetallesAsesores.IDUsuario = ?");
			$query->bindParam(1, $id, PDO::PARAM_STR);
			$query->execute();
			$this->conexion->cerrar();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo $e;
		}
	}
}