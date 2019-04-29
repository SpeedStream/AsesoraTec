<?php
// Controlador default
class Asesores extends Controlador{
	
	// Constructor
	public function __construct(){
	}

	// Metodo por default (Muestra pagina index)
	public function index(){
		$this->vista('inc/header');
		$this->vista('inc/navegacion');
		$this->vista('paginas/asesores');
		$this->vista('inc/footer');
	}
}