<?php

class Modeloconector{
    
public static function mdlid($tabla1)
    {
        include("conexionmysqli.php");
        $query ="SELECT max('Cod_Cliente') FROM $tabla1";
        $resultado = $conexion->query($query);
        return $query;
    } 
}
?>
