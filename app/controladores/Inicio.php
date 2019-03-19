<?php
// Controlador default
class Inicio extends Controlador{
	
	// Constructor
	public function __construct(){
	}

	// Metodo por default (Muestra pagina index)
	public function index(){
		$this->vista('inc/header');
		$this->vista('inc/navegacion');
		$this->vista('paginas/inicio');
		$this->vista('inc/footer');
	}
}