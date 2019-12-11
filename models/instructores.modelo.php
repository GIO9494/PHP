<?php
require_once "conexion.php";
require_once "probando.php";
class Modeloinstructor
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

    public static function mdlIngresarinstructor($tabla1, $datos1)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(Nro_de_Meritos,Especialidades,fotoI) VALUES (:Nro_de_Meritos, :Especialidades, :fotoI)");

        $stmt->bindParam(":Nro_de_Meritos", $datos1["Nro_de_Meritos"], PDO::PARAM_STR);
        $stmt->bindParam(":Especialidades", $datos1["Especialidades"], PDO::PARAM_STR);
        $stmt->bindParam(":fotoI", $datos1["fotoI"], PDO::PARAM_STR);

        if ($stmt->execute()) {return "ok";} else {return "error";}

        $stmt->close();
        $stmt = null;
        
    } 

    public static function mdlIngresarinstructortotal($tabla,$datos,$tabla1,$datos1)
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
          
          if ($stmt->execute()) {$v= "ok";} else {$v="error";}
          
         $id="Cod_Cliente";
        
              $clave = Controladorid::traerid($tabla,$id);
          print_r($clave);
          $stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla1( Id_Instructor, Nro_de_Meritos , Especialidades, fotoI)VALUES (:Id_Instructor,:Nro_de_Meritos, :Especialidades, :fotoI)");
        //$stmt1->bindParam(":".$clave, $clave, PDO::PARAM_STR);
        $stmt1->bindParam(":Id_Instructor", $clave, PDO::PARAM_STR);
        $stmt1->bindParam(":Nro_de_Meritos", $datos1["Nro_de_Meritos"], PDO::PARAM_STR);
        $stmt1->bindParam(":Especialidades", $datos1["Especialidades"], PDO::PARAM_STR);
        $stmt1->bindParam(":fotoI", $datos1["fotoI"], PDO::PARAM_STR);
        
        if ($stmt1->execute()) {return "ok";} else {return "error";}

        $stmt1->close();
       // $stmt = null;
       $stmt->close();
       $stmt = null;
        $stmt1 = null;

    }
     public static function MdlMostrarinstructor($tabla,$tabla1, $item, $valor)
    {
              if($item != null) {
               $stmt = Conexion::conectar()->prepare("SELECT * FROM persona p, instructor i  WHERE i.Id_Instructor = p.Cod_Cliente and i.Id_Instructor = :idInstructor");
               $stmt->bindParam(":idInstructor", $valor, PDO::PARAM_STR);
              $stmt->execute();
              return $stmt -> fetch();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM persona p, instructor i  WHERE i.Id_Instructor = p.Cod_Cliente");
                $stmt->execute();
                
                return $stmt -> fetchAll();
            }
            $stmt->close();
            $stmt = null;
           
     }

    /*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarInstructor($tabla, $datos,$tabla1, $datos1)
	{		
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre= :Nombre,Ap_Paterno= :Ap_Paterno,Ap_Materno= :Ap_Materno,Genero= :Genero,Correo_Electronico= :Correo_Electronico,Nro_Cel= :Nro_Cel,Fecha_Nac= :Fecha_Nac WHERE Ci = :Ci");
        

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
       print_r($clave);
       print_r($datos1["Id_Instructor"]);
       
       $stmt1 = Conexion::conectar()->prepare("UPDATE $tabla1 SET  Nro_de_Meritos= :Nro_de_Meritos , Especialidades= :Especialidades , fotoI= :fotoI WHERE Id_Instructor = :Id_Instructor");
     //$stmt1->bindParam(":".$clave, $clave, PDO::PARAM_STR);
     $stmt1->bindParam(":Id_Instructor", $clave["Id_Instructor"], PDO::PARAM_STR);
     $stmt1->bindParam(":Nro_de_Meritos", $datos1["Nro_de_Meritos"], PDO::PARAM_STR);
     $stmt1->bindParam(":Especialidades", $datos1["Especialidades"], PDO::PARAM_STR);
     $stmt1->bindParam(":fotoI", $datos1["fotoI"], PDO::PARAM_STR);
     
     if ($stmt1->execute()) {return "ok";} else {return "error";}

     $stmt1->close();
    // $stmt = null;
    $stmt->close();
    $stmt = null;
     $stmt1 = null;

    }

    
	/*=============================================
	BORRAR USUARIO
    =============================================*/


	static public function mdlBorrarInstructor($tabla, $datos,$tabla1)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla  WHERE Cod_Cliente= :idInstructor");
		$stmt -> bindParam(":idInstructor", $datos, PDO::PARAM_INT);
		
        


        $stmt1 = Conexion::conectar()->prepare("DELETE FROM $tabla1  WHERE Id_Instructor= :idInstructor");
		$stmt1 -> bindParam(":idInstructor", $datos, PDO::PARAM_INT);
		if($stmt1 -> execute()&&$stmt -> execute())
		{
			return "ok";		
		}
		else
		{
			return "error";	
        }
        
		$stmt -> close();
		$stmt = null;
        $stmt1 -> close();
		$stmt1 = null;
	
    }
}




