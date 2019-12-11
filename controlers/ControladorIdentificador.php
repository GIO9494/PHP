<?php

$id = $_POST['ingUsuario'];
$password = $_POST['ingPassword'];

$usuario = "root";
$contrasena = "";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
$servidor = "localhost";
$basededatos = "piscinas";

$conexion = mysqli_connect( $servidor, $usuario, $contrasena );
$db = mysqli_select_db( $conexion, $basededatos );
$consulta = "SELECT * FROM persona" ;
$resultado = mysqli_query( $conexion, $consulta );


header("Location: http://localhost/proyecto/views/mivista.php");
//include "../views/plantilla.php";


class ControladorIdentificador{

  public Function ctrPlantilla(){

      include "views/plantilla.php";

  }
}