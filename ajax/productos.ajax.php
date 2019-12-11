<?php

require_once "../controlers/productos.controlador.php";
require_once "../models/productos.modelo.php";

class AjaxProductos{

	/*=============================================
	EDITAR PRODUCTOS
	=============================================*/	

	public $Cod_producto;

	public function ajaxEditarProductos(){

		$item = "Cod_producto";
		$valor = $this->Cod_producto;

		$respuesta = Controladorproducto::ctrMostrarcomida($item, $valor);
		echo json_encode($respuesta);

	




	}

}


/*=============================================
EDITAR PRODUCTOS
=============================================*/
if(isset($_POST["Cod_producto"])){
	$edita = new AjaxProductos();
	$edita -> Cod_producto = $_POST["Cod_producto"];
	$edita -> ajaxEditarProductos();
}


