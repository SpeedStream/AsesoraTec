<?php
// Carga configuraciones globales
require_once '../app/config/configurar.php';

// Carga librerias elementales RUTA_APP
require_once '../app/librerias/Core.php';
require_once '../app/librerias/Controlador.php';

// Instancia clase Core (Mapea URL y llama al metodo del controlador)
$inciar = new Core();