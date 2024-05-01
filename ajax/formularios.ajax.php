<?php
require_once "../controladores/formularios.controlador.php";
require_once "../modelos/formularios.modelo.php";

/*---Clase de AJAX ---*/
class AjaxFormularios{
	public $validarEmail;
	public function ajaxValidarEmail(){
		$item = "email";
		$valor = $this->validarEmail;
		//Uso CONTROLADORFORMULARIOS Pq necesito q chequee en todas las listas si el mail existe
		$respuesta = ControladorFormularios::ctrSeleccionarUsuarios($item, $valor);
		echo json_encode($respuesta);
	}
}

/* ---Objeto de AJAX que recibe la variable POST -----*/
if(isset($_POST["validarEmail"])){
	$valEmail = new AjaxFormularios();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();
}