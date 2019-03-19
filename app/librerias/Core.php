<?php
/*	
	Sanitiza y mapea URL
	Llama al metodo del controlador
	Controlador/Metodo/Parametro1/Parametro2/...
	Ejemplo: articulos/actualizar/4/50
*/

class Core{
	// Atributos con valores por default
	private $controladorActual = 'Inicio'; // Instancia
	private $metodoActual      = 'index';   // Nombre
	private $parametros        = [];        // Arreglo

	// Sanitiza URL, mapea URL y llama al metodo del controlador
	public function __construct(){
		// Arreglo con valores de la URL sanitizada
		$url = $this->getUrl();


		// *************************** Controlador ****************************
		// Verifica que la URL contenga un controlador
		if(isset($url[0])){
			// Verifica que el archivo del controlador exista
			if(file_exists('../app/controladores/'.ucwords($url[0]).'.php')){
				// Establece controlador como controladorActual
				$this->controladorActual = ucwords($url[0]);
				unset($url[0]);
			}
		}

		// Crea una instancia del controlador
		require_once '../app/controladores/'.$this->controladorActual.'.php';
		$this->controladorActual = new $this->controladorActual();


		// ***************************** Metodo *******************************
		// Verifica que la URL contenga un metodo
		if(isset($url[1])){
			// Verifica que el metodo exista dentro del controlador
			if(method_exists($this->controladorActual, $url[1])){
				// Establece metodo como metodoActual
				$this->metodoActual = $url[1];
				unset($url[1]);
			}
		}


		// *************************** Parametros *****************************
		// Guarda parametros de la URL o arreglo vacio en caso de no existir
		$this->parametros = $url? array_values($url): [];


		// ************************* Llamada metodo ***************************
		// Llama al metodo del controlador con los parametros
		call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
	}

	// Sanitiza URL y regresa arreglo con valores [controlador/metodo/parametro1/parametro2/...]
	public function getUrl(){
		// Verificamos que URL contenga valores
		if(isset($_GET['url'])){
			// Sanitiza URL
			$url = rtrim($_GET['url'], '/');              // Elimina diagonales al final
			$url = filter_var($url, FILTER_SANITIZE_URL); // Elimina caracteres especiales

			// Separa valores de controlador, metodo y parametro (delimitados por /)
			$url = explode('/', $url);
			return $url;
		}
	}
}