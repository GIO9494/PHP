<?php
require_once "conexion.php";
class Modelocursos
{     
    
    //registro curso
    public static function mdlIngresarcurso($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre_Curso,Costo,Cant_Cupos,Certificacion,Id_instructor,Id_Horario,Inicio_Fin_Clases,Ubicacion,fotoC) 
        VALUES (:Nombre_Curso, :Costo, :Cant_Cupos, :Certificacion, :Id_instructor, :Id_Horario, :Inicio_Fin_Clases,:Ubicacion ,:fotoC)");

        $stmt->bindParam(":Nombre_Curso", $datos["Nombre_Curso"], PDO::PARAM_STR);
        $stmt->bindParam(":Costo", $datos["Costo"], PDO::PARAM_STR);
        $stmt->bindParam(":Cant_Cupos", $datos["Cant_Cupos"], PDO::PARAM_STR);
        $stmt->bindParam(":Certificacion", $datos["Certificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Id_instructor", $datos["Id_instructor"], PDO::PARAM_STR);
        $stmt->bindParam(":Id_Horario", $datos["Id_Horario"], PDO::PARAM_STR);
        $stmt->bindParam(":Inicio_Fin_Clases", $datos["Inicio_Fin_Clases"], PDO::PARAM_STR);
        $stmt->bindParam(":Ubicacion", $datos["Ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fotoC", $datos["fotoC"], PDO::PARAM_STR);

        if ($stmt->execute()) {return "ok";} else {return "error";}

        $stmt->close();
        $stmt = null;

    } 
    public static function MdlMostrarCursos($tabla, $item, $valor)
    {
          if($item != null) {
           $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
           $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
          $stmt->execute();
          return $stmt -> fetch();
        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
            $stmt->execute();
            return $stmt -> fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }


    static public function mdleditarcurso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Cant_Cupos = :Cant_Cupos, Nombre_Curso = :Nombre_Curso, Ubicacion = :Ubicacion,Certificacion = :Certificacion, Id_Horario = :Id_Horario,Id_Instructor = :Id_Instructor, fotoC = :fotoC WHERE Nombre_Curso = :Nombre_Curso");

        $stmt->bindParam(":Cant_Cupos", $datos["Cant_Cupos"], PDO::PARAM_STR);
        $stmt->bindParam(":Nombre_Curso", $datos["Nombre_Curso"], PDO::PARAM_STR);
        $stmt->bindParam(":Ubicacion", $datos["Ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Certificacion", $datos["Certificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":Id_Horario", $datos["Id_Horario"], PDO::PARAM_STR);
        $stmt->bindParam(":Id_Instructor", $datos["Id_Instructor"], PDO::PARAM_STR);
        $stmt->bindParam(":fotoC", $datos["fotoC"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

    }
    


    /*=============================================
    borrar curso  DELETE FROM $tabla WHERE Cod_Curso = :Cod_Curso"
    
     ?
=============================================*/

	static public function mdlborrarcurso($tabla, $datos){
        
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Cod_Curso = :Cod_Curso");

		$stmt -> bindParam(":Cod_Curso",$datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


    }
    
    


}

 

