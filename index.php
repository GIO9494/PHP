<?php

require_once "controlers/plantilla.controlador.php";
require_once "controlers/usuarios.controlador.php";
require_once "controlers/categorias.controlador.php";
require_once "controlers/productos.controlador.php";
require_once "controlers/clientes.controlador.php";
require_once "controlers/ventas.controlador.php";
require_once "controlers/instructores.controlador.php";

require_once "models/usuarios.modelo.php";
require_once "models/categorias.modelo.php";
require_once "models/productos.modelo.php";
require_once "models/clientes.modelo.php";
require_once "models/ventas.modelo.php";
require_once "models/instructores.modelo.php";
require_once "models/probando.php";
require_once "models/pruba2.php";

$plantilla =new ControladorPlantilla();
$plantilla -> ctrPlantilla();


