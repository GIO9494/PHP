<?php
require_once "conexion.php";
require_once "probando.php";

class Modelocliente
{
    
    //registro instructor
    public static function mdlIngresarpersona($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Ci,Nombre,Ap_Paterno,Ap_Materno,Genero,Correo_Electronico,Nro_Cel,Fecha_Nac) VALUES ( :Ci, :Nombre, :Ap_Paterno, :Ap_Materno, :Genero, :Correo_Electronico, :Nro_Cel,:Fecha_Nac)");

        $stmt->bindParam(":Nombre"    , $datos["Nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":Ap_Paterno", $datos["Ap_Paterno"], PDO::PARAM_STR);
        $stmt->bindParam(":Ap_Materno", $datos["Ap_Materno"], PDO::PARAM_STR);
        $stmt->bindParam(":Ci"        ,   $datos["Ci"], PDO::PARAM_STR);
        $stmt->bindParam(":Genero"    , $datos["Genero"], PDO::PARAM_STR);
        $stmt->bindParam(":Correo_Electronico", $datos["Correo_Electronico"], PDO::PARAM_STR);
        $stmt->bindParam(":Nro_Cel", $datos["Nro_Cel"], PDO::PARAM_STR);
        $stmt->bindParam(":Fecha_Nac", $datos["Fecha_Nac"], PDO::PARAM_STR);

        if ($stmt->execute()) {return "ok";} else {return "error";}
        $stmt->close();
        $stmt = null;
    } 

    public static function mdlIngresarcliente($tabla1, $datos1)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1( Cod_Cliente , Grado_Cliente ,Cod_Casillero, Codigo_C) 
        VALUES (:Cod_Cliente ,:Grado_Cliente, :Cod_Casillero, :Codigo_C)");  

        $stmt->bindParam(":Cod_Cliente", $clave, PDO::PARAM_INT);
        $stmt->bindParam(":Grado_Cliente", $datos1["Grado_Cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":Cod_Casillero", $datos1["Cod_Casillero"], PDO::PARAM_STR);
        $stmt->bindParam(":Codigo_C", $datos1["Codigo_C"], PDO::PARAM_STR);

        if ($stmt->execute()) {return "ok";} else {return "error";}

        $stmt->close();
        $stmt = null;
    } 
    
    public static function mdlIngresarclientetotal($tabla,$datos,$tabla1,$datos1)
    {
         $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Ci,Nombre,Ap_Paterno,Ap_Materno,Genero,Correo_Electronico,Nro_Cel,Fecha_Nac)
          VALUES ( :Ci, :Nombre, :Ap_Paterno, :Ap_Materno, :Genero, :Correo_Electronico, :Nro_Cel,:Fecha_Nac)");
        
           $stmt->bindParam(":Nombre"    , $datos["Nombre"], PDO::PARAM_STR);
           $stmt->bindParam(":Ap_Paterno", $datos["Ap_Paterno"], PDO::PARAM_STR);
           $stmt->bindParam(":Ap_Materno", $datos["Ap_Materno"], PDO::PARAM_STR);
           $stmt->bindParam(":Ci"        ,   $datos["Ci"], PDO::PARAM_STR);
           $stmt->bindParam(":Genero"    , $datos["Genero"], PDO::PARAM_STR);
           $stmt->bindParam(":Correo_Electronico", $datos["Correo_Electronico"], PDO::PARAM_STR);
           $stmt->bindParam(":Nro_Cel", $datos["Nro_Cel"], PDO::PARAM_STR);
           $stmt->bindParam(":Fecha_Nac", $datos["Fecha_Nac"], PDO::PARAM_STR);
          
          if ($stmt->execute()) {$v= "ok";} else {$v="error";}
          
         $id="Cod_Cliente";
    
         $clave = Controladorid::traerid($tabla,$id);
        
          $stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla1( Cod_Cliente, Grado_Cliente ,Cod_Casillero, Codigo_C,Costo_ing) VALUES (:Cod_Cliente ,:Grado_Cliente, :Cod_Casillero, :Codigo_C,:Costo_ing)");                                                 
         $asig=$datos1["Cod_Casillero"];
        $stmt1->bindParam(":Cod_Cliente", $clave, PDO::PARAM_STR);
        $stmt1->bindParam(":Grado_Cliente", $datos1["Grado_Cliente"], PDO::PARAM_STR);
        $stmt1->bindParam(":Cod_Casillero", $datos1["Cod_Casillero"], PDO::PARAM_STR);
        $stmt1->bindParam(":Codigo_C", $datos1["Codigo_C"], PDO::PARAM_STR);
        $stmt1->bindParam(":Costo_ing", $datos1["Costo_ing"], PDO::PARAM_STR);
   
        $clave1 = Controladorid::traerestado($asig);
        //if ($clave1 != "ocupado") {
        $stmt2 = Conexion::conectar()->prepare("UPDATE `casillero` SET `Estado`= 'Ocupado' WHERE Cod_casillero = $asig");   
       
        if ($stmt2->execute()) {$v1= "ok";} else {$v1="error";}

        if ($stmt1->execute()) {return "ok";} else {return "error";}

        $stmt1->close();
       // $stmt = null;
       $stmt->close();
          $stmt = null;
        $stmt1 = null;
    }
    public static function MdlMostrarcliente($tabla,$tabla1, $item, $valor)
    {
              if($item != null) {
               $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla , $tabla1 WHERE $item = :$item");
               $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
              $stmt->execute();
              return $stmt -> fetch();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM persona p, cliente c  WHERE p.Cod_Cliente=c.Cod_Cliente");
                $stmt->execute();
                return $stmt -> fetchAll();
            }
            $stmt->close();
            $stmt = null;
           
     }
}
