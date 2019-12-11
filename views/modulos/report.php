<?php  	
	if(isset($_POST["boton"]))
	{
		$VBoton=$_POST["boton"];		 
		if($VBoton=="GENERAR REPORTE EMPLEADOS")
		{
			//$rep = new Controlador_report();
			//$rep->Ctr_report();
			
	/*		
			$item = null;
            $valor = null;

            $usuarios = Controlador_report::ctr_report($item, $valor);
			
var valor1 = "Mauricio123";
var valor2= "Lopez245";
windows.open("nuevaPagina.php?varA='" + valor1 + "'&varB='"+ valor2 +"' "); 
*/

			
		echo  
		<<< HTML
		
		<script>window.open("http://localhost/piscina/views/modulos/reportt.php");location.href= "report";</script>
		
HTML;
			
			
            /*foreach ($usuarios as $key => $value) {

              echo '<tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["nombre_Cuenta"].'</td>
                      <td>'.$value["perfil"].'</td>';

                      if ($value["foto"] != " ") {

                        echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                      }else{
                        
                        echo '<td><img src="views/img/usuarios/default/usn.png class="img-thumbnail" width="100px"></td>';
                      }
                     echo '<td>'.$value["email"].'</td>';
                      if ($value["estado"] != 0){
                      
                      echo '<td><button class="btn btn-success btn-xs  btnActivar" idUsuario="'.$value["Id_Usuario"].'" estadoUsuario="0">Activado</button></td>';
                      }else{
                        echo '<td><button class="btn btn-danger btn-xs  btnActivar" idUsuario="'.$value["Id_Usuario"].'" estadoUsuario="1">Desactivado</button></td>';
                      }
                      echo '<td>'.$value["ultimo_login"].'</td>
                      <td>
                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditarUsuario" idusuario="'.$value["Id_Usuario"].'" data-toggle="modal" data-target="#ModalEditarUsuario"> <i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger  btnEliminarUsuario" usuario="'.$value["nombre_Cuenta"].'"  idUsuario="'.$value["Id_Usuario"].'" fotoUsuario="'.$value["foto"].'"> <i class="fa fa-times"></i></button>

                          </div>

                      </td>
                    </tr>';
            }	*/
            
			
		}		
	}
	
?>

<div class="content-wrapper">
  <section class="content-header">
   <center><h2><font color = "#125A6F">Area de: <?php echo $_SESSION["perfil"]; ?></font></h2></center> 
    
    <h1>      
      REPORTES     
      <small>PISCINAS OCEANO</small>    
    </h1>

    <ol class="breadcrumb">      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      
      <li class="active">Tablero</li>    
    </ol>

  </section>
    
 
		
  
  
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      
        <center><h4><strong><font color = "#127490">Elija el Reporte que quiere ver</font></strong></h4></center>
      
    </div>
	<br>
	<br>
	
<form method="post">

	<!-- /.col -->
	<div class="col-xs-6">
		<center><input type="submit" class="btn btn-primary" name="boton" value="GENERAR REPORTE EMPLEADOS" /> </center>
	</div>
	<div class="col-xs-6">  
	<!--	<center><input type="submit" class="btn btn-primary" name="boton" value="GENERAR REPORTE CLIENTES" /> </center>-->
	</div>
	<!--<input type="submit" class="btn btn-primary" name="boton" value="Eliminar" /> -->
	  
	<!-- /.col -->

</form>			
	
	
    <!-- /.box -->	
	
	
  </section>
  
  
  
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
