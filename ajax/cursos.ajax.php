<?php

require_once "../controlers/categorias.controlador.php";
require_once "../models/categorias.modelo.php";


/*=============================================
EDITAR CURSO
=============================================*/
class AjaxCursos{

	/*=============================================
	EDITAR CURSO
	=============================================*/	

	public $codcurso;

	public function ajaxeditarcurso(){
		$item = "Cod_Curso";
		$valor = $this->codcurso;
		$respuesta = ControladorCursos::ctrMostrarCursos($item, $valor);
		echo json_encode($respuesta);
	}
}


if(isset($_POST["codcurso"])){

	$editar1 = new AjaxCursos();
	$editar1 -> codcurso = $_POST["codcurso"];
	$editar1 -> ajaxeditarcurso();
}