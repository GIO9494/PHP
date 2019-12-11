<?php
require_once "conexion.php";
class ModeloUsuarios
{	
    //motrar usuarios
    public static function MdlMostrarUsuarios($tabla, $item, $valor)
    {
        if($item != null) 
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt -> fetch();
        }else
		{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
            $stmt->execute();
            return $stmt -> fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
	
	public static function Mdlpermiso($tablap, $id_persona)
    {
        if($id_persona != null) 
		{
			$stmt = Conexion::conectar()->prepare("SELECT tcp_id FROM $tablap WHERE Id_persona = :Id_persona");
			$stmt -> bindParam(":Id_persona", $id_persona, PDO::PARAM_STR);			
			$stmt->execute();
			return $stmt -> fetch();
			//echo implode( $stmt -> fetch());
        }
        $stmt->close();
        $stmt = null;
    }
    //registro usuarios
    public static function mdlIngresarUsuario($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_Cuenta,perfil,passwords,email,foto) VALUES ( :nombre_Cuenta, :perfil, :passwords, :email, :foto)");
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_Cuenta", $datos["nombre_Cuenta"], PDO::PARAM_STR);
        $stmt->bindParam(":passwords", $datos["passwords"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        if ($stmt->execute()) {return "ok";} else {return "error";}
        $stmt->close();
        $stmt = null;
    } 
   
    /*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos)
	{		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET perfil = :perfil, nombre_Cuenta = :nombre_Cuenta, passwords = :passwords,email = :email, foto = :foto WHERE nombre_Cuenta = :nombre_Cuenta");
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_Cuenta", $datos["nombre_Cuenta"], PDO::PARAM_STR);
        $stmt->bindParam(":passwords", $datos["passwords"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		if($stmt -> execute())
		{
			return "ok";		
		}else
		{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/
	
	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		if($stmt -> execute())
		{
			return "ok";		
		}
		else
		{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	BORRAR USUARIO
=============================================*/


	static public function mdlBorrarUsuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Usuario = :Id_Usuario");
		$stmt -> bindParam(":Id_Usuario", $datos, PDO::PARAM_INT);
		if($stmt -> execute())
		{
			return "ok";		
		}
		else
		{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
}
