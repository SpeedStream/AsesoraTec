<?php
// Clase para conectarse a la BD
class Database extends PDO{

	// atributos
	private $servername = DB_HOST;
    private $dbname     = DB_NOMBRE;
    private $username   = DB_USUARIO;
    private $password   = DB_PASSWORD;
    private $dbh;

    // constructor
	public function __construct(){
		try{
			$this->dbh = parent::__construct(
				"mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password,
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES  UTF8"));
		}
		catch(PDOException $e){
			$this->dbh = null;
		}
	}// fin constrcutor

	// cierra conexion BD
	public function cerrar(){
		$this->dbh = null;
	}// fin cerrar_conexion
}