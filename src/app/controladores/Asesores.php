<?php
// Controlador asesores
class Asesores extends Controlador{
	
	// Constructor
	public function __construct(){
	}

	// Metodo por default (Muestra pagina index)
	public function index(){
		// Guarda datos recibidos
		$materia = isset($_POST['materia']) ? $_POST['materia'] : "";

		// Busca asesores por materia
		$this->buscar($materia);
	}

	// Busca asesores segun materia recibida
	public function buscar($materia = NULL){
		// Crea instancia de Asesor_model
		require_once RUTA_APP .'/modelos/Asesor_model.php';
		$asesor_model = new Asesor_model;

		// Si no se ingreso materia, carga todos los asesores
		if( ! $materia)
			$datos = ['asesores' => $asesor_model->get_all()];

		// Si se ingreso materia, carga asesores que den la materia
		else
			$datos = ['asesores' => $asesor_model->get_by_materia($materia)];

		// Carga vista
		$this->vista('inc/header');
		$this->vista('inc/navegacion');
		$this->vista('paginas/asesores', $datos);
		$this->vista('inc/footer');
	}

	public function detalles($id){
		// Crea instancia de Asesor_model
		require_once RUTA_APP .'/modelos/Asesor_model.php';
		$asesor_model = new Asesor_model;

		// carga datos asesor segun id
		$datos = ['asesor' => $asesor_model->get_by_id($id)];
		
		// Carga vista
		$this->vista('inc/header');
		$this->vista('inc/navegacion');
		$this->vista('paginas/detalles_asesor', $datos);
		$this->vista('inc/footer');
	}
}