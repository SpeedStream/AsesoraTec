<?php
// Controlador usuario
class Usuario extends Controlador{
	
	// Constructor
	public function __construct(){
	}

	// Muestra pagina de registro segun perfil seleccionado
	public function registrar($perfil_usuario = NULL){

		// Vista si no se ha seleccionado un perfil
		if( ! $perfil_usuario){
			$this->vista('inc/header');
			$this->vista('inc/navegacion');
			$this->vista('paginas/filtro_registro');
			$this->vista('inc/footer');
		}

		// Vista si se ha seleccionado un perfil (Alumno o Asesor)
		if($perfil_usuario === "alumno" OR $perfil_usuario === "asesor"){

			// Arreglo con datos que se pasan a la vista
			$datos = ['perfil' => $perfil_usuario];

			$this->vista('inc/header');
			$this->vista('inc/navegacion');
			$this->vista('paginas/registro', $datos);
			$this->vista('inc/footer');
		}
	}


	// Registra nuevo usuario en la BD o devuelve mensaje de error
	public function guardar_registro(){
		// Valida datos de registro
		$estado_registro = $this->_validar_registro();

		// Si los datos son validos,se guardan en la BD
		if($estado_registro === TRUE){

			// Crea instancia de Usuario_model
			require_once RUTA_APP .'/modelos/Usuario_model.php';
			$usuario_model = new Usuario_model;

			// Guarda registro en la BD
			$usuario_model->crear_registro();
			echo "true";
		}

		// Si los datos no son validos, regresa mensaje con errores
		else{
			$valor = json_encode($estado_registro);
			echo $valor;
		}// fin else
	}

	// Valida datos de registro
	private function _validar_registro(){
		// Crea instancia de libreria Validacion
		require_once RUTA_APP .'/librerias/Validacion_registro.php';
		$validacion = new Validacion_registro;

		// Regresa TRUE o arreglo con errores
		return $validacion->validar_registro();
	}
}