<?php
require_once "conexion.php";
class Controladorid
{
    public static function traerid($tabla,$id)
    {
           /* $item = null;
            $valor = null;
            //$tabla = "persona";
            if($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                $respuesta = $stmt -> fetch();
                }else{
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
                    $stmt->execute();
                    $respuesta= $stmt -> fetchAll();
                }
                $stmt = null;
                $usuarios = $respuesta;
          foreach ($usuarios as $key => $value) {
                 // $data=$value["Cod_Cliente"];
                  $clave=$value[$id];
           }
           $clave."";*/


           $sql = "select max($id) maximo from persona";

           $stmt1 = Conexion::conectar()->prepare($sql);
           $resultado=$stmt1->execute();

           if($filas = $stmt1->fetch(PDO::FETCH_ASSOC)){
            $clave=$filas['maximo']."";
           }
    
           
           return $clave;
  }
    //http://localhost/proyecto/models/probando.php
   // $id="Cod_Cliente";
  //  $tabla ="persona";
  //  $clave =(string) Controladorid::traerid($tabla,$id);
    
  //  echo $clave;
  public static function traerestado($id)
  {
    
         $sql = "SELECT `Estado` FROM `casillero` WHERE Cod_casillero = $id";

         $stmt1 = Conexion::conectar()->prepare($sql);
         $resultado=$stmt1->execute();

         if($filas = $stmt1->fetch(PDO::FETCH_ASSOC)){
            $clave=$filas['Estado']."";
         }
         return $clave;
  }
  
  public static function traerids($tabla,$ids)
  {

         $sql = "select max($ids) maximo from stock";

         $stmt1 = Conexion::conectar()->prepare($sql);
         $resultado=$stmt1->execute();

         if($filas = $stmt1->fetch(PDO::FETCH_ASSOC)){
          $clave=$filas['maximo']."";
         }
         return $clave;
}
  

public static function traerid1($tabla,$id)
{
       $sql = "select max($id) maximo from $tabla";

       $stmt1 = Conexion::conectar()->prepare($sql);
       $resultado=$stmt1->execute();

       if($filas = $stmt1->fetch(PDO::FETCH_ASSOC)){
        $clave=$filas['maximo']."";
       }
       return $clave;
}



 //http://localhost/proyecto/models/probando.php
  // $id="17";
  //$tabla ="persona";
  //$clave =(string) Controladorid::traerid($tabla,$id);
   //echo $clave;
 }         

 

