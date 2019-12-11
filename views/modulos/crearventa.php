<div class="content-wrapper">



<?php
$idProductos = preg_split("/[\s,]+/", $_POST['idProductos']);
for ($i = 0; $i < count($idProductos) ; $i++) {
  echo $idProductos[$i].'<br>';
}
$cantProductos = $_POST['cantProductos'];
echo 'Los cant productos son: '.$cantProductos;

?>

  <section class="content-header">
    <h1>
      Crear ventanas 
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear venta</li>
    
    </ol>

  </section>
     
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">

      <div class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalpdf">
              generar PDF
            </div>
     <a href="views/modulos/informe.php"><i class="fa fa-dashboard"></i> pdf</a></li>


        <h3 class="box-title">Title</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        Start creating your amazing application!
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- CLASE MODAL AGREGAR ANTIGUO-->
<div class="modal modal-info fade" id="modalpdf" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title"> PDF </h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">
<!-- nombre -->
            <div class="form-group">
            <div class="input-group">
               <p>
                <i class="fa fa-commenting"> 

                <input type="text" class="input-lg" style="color: black" placeholder="Nombre" name="nombrec" id="nombrec" size="50" required>            
                 </i>
                </p>
               </div>
             </div>
<!-- apellidos -->
             <div class="form-group">
               <div class="input-group">
                     <p>
                       <i class="fa fa-commenting-o"> 
               <input type="text" class="input-lg" style="color: black" placeholder="Ap Paterno" name="ApPaternoc" id="ApPaternoc" size="22"  required>            
                <input type="text" class="input-lg" style="color: black" placeholder="Ap Materno" name="ApMaternoc" id="ApMaternoc" size="22"  required>   
                       </i>

                     </p>
                  </div>
             </div>
<!-- CI  -->
             <div class="form-group">
               <div class="input-group">
                <P>  <i class="fa fa-unlock-alt">  <input type="text"  class="input-lg" style="color: black" placeholder=" CI " name="Cic" id="Cic" size="40"  required >  </i> </p>           
                </div>
               
             </div>

<!-- nro de casillero-->
<div class="form-group">  
                          <div class="input-group" >
                            <span class="input-group-addon" ><i class="fa fa-archive"> </i></span>
                            <select  class="form-control input-lg" id="nuevocasillero" name="nuevocasillero" style="color: black">
                           <?php
                            
                            include("conexionmysqli.php");
                          $query ="SELECT * FROM casillero";

                          $resultado = $conexion->query($query);
                        
                         while($row = $resultado -> fetch_assoc()) {
                          ?>
                           <option value="<?php echo $row['Cod_casillero']; ?>"><?php  echo $row['Cod_casillero']." ".$row['Estado']." ".$row['Color']; ?>  </option>
                
                           <?php
                           }?>
                            </select>
                          </div>
</div> 

<!-- pdf -->
<div class="form-group">  
                          <div class="input-group" >
                            <span class="input-group-addon" ><i class="fa fa-archive"> </i></span>
                            <select  class="form-control input-lg" id="nuevocasillero" name="nuevocasillero" style="color: black">
                           <?php
                            
                            include("informe.php");
                          
                          $query ="SELECT * FROM casillero";

                          $resultado = $conexion->query($query);
                        
                         while($row = $resultado -> fetch_assoc()) {
                          ?>
                           <option value="<?php echo $row['Cod_casillero']; ?>"><?php  echo $row['Cod_casillero']." ".$row['Estado']." ".$row['Color']; ?>  </option>
                
                           <?php
                           }?>
                            </select>
                          </div>
</div> 
<!-- codigo  -->
<div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-credit-card"> </i></span>
                                <input type="text" class="form-control input-lg" style="color: black" name="codigo" placeholder="Ingresar el codigo personal" required>
                            </div>
                  </div>
          </div>

        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline">Guardar cliente</button>

        </div>
        <?php
                      $crearcliente = new Controladorcliente();
                      $crearcliente ->CtrCrearcliente();
                       ?>
      </form>
    </div>
  </div>
  <!-- /.modal-dialog -->
</div>