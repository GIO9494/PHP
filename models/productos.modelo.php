<?php
require_once "conexion.php";
require_once "probando.php";

class Modeloproducto 
{


    public static function mdlIngresarcomidatotal($tabla,$datos,$tabla1,$datos1,$tabla2,$datos2)
    {

        $stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(Cantidad, Proveedor ,Fecha_Compraul) VALUES (:Cantidad ,:Proveedor, :Fecha_Compraul)");                                                 
         
       
       $stmt2->bindParam(":Cantidad", $datos2["Cantidad"], PDO::PARAM_STR);
       $stmt2->bindParam(":Proveedor", $datos2["Proveedor"], PDO::PARAM_STR);
       $stmt2->bindParam(":Fecha_Compraul", $datos2["Fecha_Compraul"], PDO::PARAM_STR);

       if ($stmt2->execute()) {$v= "ok";} else {$v="error";}

      
       $ids="Id_Stock";
    
       $claves = Controladorid::traerids($tabla2,$ids);
                   
         $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nom_Prod,id_Stock,Precio_Compra,Precio_Venta,Tipo)
          VALUES ( :Nom_Prod, :id_Stock, :Precio_Compra, :Precio_Venta, :Tipo)");
        
           $stmt->bindParam(":Nom_Prod"    , $datos["Nom_Prod"], PDO::PARAM_STR);
           $stmt->bindParam(":id_Stock", $claves, PDO::PARAM_STR);
           $stmt->bindParam(":Precio_Compra", $datos["Precio_Compra"], PDO::PARAM_STR);
           $stmt->bindParam(":Precio_Venta"        ,   $datos["Precio_Venta"], PDO::PARAM_STR);
           $stmt->bindParam(":Tipo"    , $datos["Tipo"], PDO::PARAM_STR);
           
          
          if ($stmt->execute()) {$v= "ok";} else {$v="error";}
          
         $id="Cod_producto";
    
         $clave = Controladorid::traerid1($tabla,$id);           

          $stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla1( Cod_producto, Ingredientes ,FotoCo) VALUES (:Cod_producto ,:Ingredientes, :FotoCo)");                                                 
         
          $stmt1->bindParam(":Cod_producto", $clave, PDO::PARAM_STR);
         $stmt1->bindParam(":Ingredientes", $datos1["Ingredientes"], PDO::PARAM_STR);
         $stmt1->bindParam(":FotoCo", $datos1["FotoCo"], PDO::PARAM_STR);
        
   
        if ($stmt1->execute()) {return "ok";} else {return "error";}

        $stmt1->close();
         $stmt2->close();
        $stmt->close();
          $stmt = null;
        $stmt1 = null;
        $stmt2 = null;
    }

    
    public static function MdlMostrarcomida($tabla,$tabla1,$tabla2, $item, $valor){
                  if($item != null) {
              $stmt = Conexion::conectar()->prepare("SELECT * FROM producto p, comida c ,stock s WHERE p.Cod_producto = c.Cod_producto and p.id_Stock = s.Id_Stock and p.Cod_producto=:Cod_producto");
              $stmt -> bindParam(":Cod_producto",$valor,PDO::PARAM_INT);
                $stmt->execute();
                return $stmt -> fetch();
            }else{                                 
                $stmt = Conexion::conectar()->prepare("SELECT * FROM producto p, comida c ,stock s WHERE p.Cod_producto = c.Cod_producto and p.id_Stock = s.Id_Stock");
                $stmt->execute();
                return $stmt -> fetchAll();
            }
            $stmt->close();
            $stmt = null;
           
     }


     public static function mdlIngresarobjetototal($tabla,$datos,$tabla1,$datos1,$tabla2,$datos2)
     {
 
         $stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(Cantidad, Proveedor ,Fecha_Compraul) VALUES (:Cantidad ,:Proveedor, :Fecha_Compraul)");                                                 
          
        
        $stmt2->bindParam(":Cantidad", $datos2["Cantidad"], PDO::PARAM_STR);
        $stmt2->bindParam(":Proveedor", $datos2["Proveedor"], PDO::PARAM_STR);
        $stmt2->bindParam(":Fecha_Compraul", $datos2["Fecha_Compraul"], PDO::PARAM_STR);
 
        if ($stmt2->execute()) {$v= "ok";} else {$v="error";}
 
       
        $ids="Id_Stock";
     
        $claves = Controladorid::traerids($tabla2,$ids);
                    
          $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nom_Prod,id_Stock,Precio_Compra,Precio_Venta,Tipo)
           VALUES ( :Nom_Prod, :id_Stock, :Precio_Compra, :Precio_Venta, :Tipo)");
         
            $stmt->bindParam(":Nom_Prod"    , $datos["Nom_Prod"], PDO::PARAM_STR);
            $stmt->bindParam(":id_Stock", $claves, PDO::PARAM_STR);
            $stmt->bindParam(":Precio_Compra", $datos["Precio_Compra"], PDO::PARAM_STR);
            $stmt->bindParam(":Precio_Venta" ,  $datos["Precio_Venta"], PDO::PARAM_STR);
            $stmt->bindParam(":Tipo"    , $datos["Tipo"], PDO::PARAM_STR);
            
           
           if ($stmt->execute()) {$v= "ok";} else {$v="error";}
           
          $id="Cod_producto";
     
          $clave = Controladorid::traerid1($tabla,$id);           

 
           $stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla1( Cod_producto, Talla ,Color,Marca,Estado,Costo_Reposicion,Costo_Flete,FotoO) VALUES (:Cod_producto ,:Talla,:Color,:Marca,:Estado,:Costo_Reposicion,:Costo_Flete,:FotoO)");                                                 
          
           $stmt1->bindParam(":Cod_producto", $clave, PDO::PARAM_STR);
          $stmt1->bindParam(":Talla", $datos1["Talla"], PDO::PARAM_STR);
          $stmt1->bindParam(":Color", $datos1["Color"], PDO::PARAM_STR);
          $stmt1->bindParam(":Marca", $datos1["Marca"], PDO::PARAM_STR);
          $stmt1->bindParam(":Estado", $datos1["Estado"], PDO::PARAM_STR);
          $stmt1->bindParam(":Costo_Reposicion", $datos1["Costo_Reposicion"], PDO::PARAM_STR);
          $stmt1->bindParam(":Costo_Flete", $datos1["Costo_Flete"], PDO::PARAM_STR);
          $stmt1->bindParam(":FotoO", $datos1["FotoO"], PDO::PARAM_STR);
         if ($stmt1->execute()) {return "ok";} else {return "error";}
 
         $stmt1->close();
          $stmt2->close();
         $stmt->close();
           $stmt = null;
         $stmt1 = null;
         $stmt2 = null;
     }
     public static function MdlMostrarobjeto($tabla,$tabla1,$tabla2, $item, $valor)
    {
              if($item != null) {
               $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla , $tabla1 WHERE $item = :$item");
               $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
              $stmt->execute();
              return $stmt -> fetch();
            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM producto p, objeto_piscina o ,stock s WHERE p.Cod_producto = o.Cod_producto and p.id_Stock = s.Id_Stock");
                $stmt->execute();
                return $stmt -> fetchAll();
            }
            $stmt->close();
            $stmt = null;
            
     }
     /*===================
     BORRAR PRODUCTO
     ====================*/
     static public function mdlBorrarProducto($tabla1,$tabla2,$datos){
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla2 WHERE Cod_producto = :Cod_producto");
      $stmt -> bindParam(":Cod_producto",$datos,PDO::PARAM_INT);

      $stmt1 = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE Cod_producto = :Cod_producto");
      $stmt1 -> bindParam(":Cod_producto",$datos,PDO::PARAM_INT);

      if($stmt -> execute() && $stmt1 -> execute()){
         return "ok";
      }
      else{
        return "error";
      }
      $stmt ->close();
      $stmt = null;
      $stmt1 ->close();
      $stmt1 = null;
     }

      static public function mdlBorrarObjeto($tabla1,$tabla2,$datos){
      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla2 WHERE Cod_producto = :Cod_producto");
      $stmt -> bindParam(":Cod_producto",$datos,PDO::PARAM_INT);
      
      $stmt1 = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE Cod_producto = :Cod_producto");
      $stmt1 -> bindParam(":Cod_producto",$datos,PDO::PARAM_INT);

      if($stmt -> execute() && $stmt1 -> execute()){
         return "ok";
      }
      else{
        return "error";
      }
      $stmt ->close();
      $stmt = null;
      $stmt1 ->close();
      $stmt1 = null;
     }


}
