<?php

require_once "../controlers/instructores.controlador.php";
require_once "../models/instructores.modelo.php";

/*=============================================
EDITAR USUARIO
=============================================*/

class AjaxInstructores{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idInstructor;

	public function ajaxEditarInstructor(){

		$item = "Id_Instructor";
		$valor = $this->idInstructor;

		$respuesta = ControladorInstructor::ctrMostrarinstructor($item,$valor);;

		echo json_encode($respuesta); 

	}
}

if(isset($_POST["idInstructor"])){ 

	$editar = new AjaxInstructores();
	$editar -> idInstructor = $_POST["idInstructor"];
	$editar -> ajaxEditarInstructor();

}
