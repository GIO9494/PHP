
<?php
  mysql_connect('localhost',"root","12345678");
  mysql_select_db(piscinas);

$Accion = $_REQUEST['Accion'];
    if (is_callable($Accion)) {
          $Accion();
    } 

    function Getpersona(){
    header('Content-Type: application/json');
    $persona =array();
        $consulta=mysql_query("SELECT Nombre,Ap_Paterno,Ap_Materno,Nro_Cel,Cod_Cliente FROM persona");
       while($Fila =mysql_fetch_assoc($consulta))
       {
         $persona[]=$Fila;

       }
       echo json_encode($persona);
    }

    function Getinstructor(){

      header('Content-Type: application/json');
      $instructor =array();
          $consulta =mysql_query("SELECT Especialidades,Id_Instructor FROM instructor WHERE Id_Instructor = ".$_REQUEST['Cod_Cliente']);
         while($Fila =mysql_fetch_assoc($consulta))
         {
           $instructor[]=$Fila;
  
         }
         echo json_encode($instructor);
    }
?>