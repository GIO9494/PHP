<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar clientes</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarcliente" >
          Agregar clientes 
        </button>
        
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Ap_Paterno</th>
              <th>Ap_materno</th>
              <th>Ci</th>
              <th>Genero</th>
              <th>Cor_Elec.</th>
              <th>Nro_Cel</th>
              <th>Fecha_Nac</th>
              <th>Grado</th>
              <th>Costo_Ing</th>
              <th>Casillero</th>
              <th>Codigo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
          <?php
$item = null;
$valor = null;
$clientes = Controladorcliente::ctrMostrarclientes($item, $valor);

foreach ($clientes as $key => $value) {
  echo '<tr>
          <td>'.($key+1).'</td>
          <td>'.$value["Nombre"].'</td>
          <td>'.$value["Ap_Paterno"].'</td>
          <td>'.$value["Ap_Materno"].'</td>
          <td>'.$value["Ci"].'</td>
          <td>'.$value["Genero"].'</td>
          <td>'.$value["Correo_Electronico"].'</td>
          <td>'.$value["Nro_Cel"].'</td>
          <td>'.$value["Fecha_Nac"].'</td>
          <td>'.$value["Grado_Cliente"].'</td>
          <td>'.$value["Costo_ing"].'</td>
          <td>'.$value["Cod_Casillero"].'</td> 
          <td>'.$value["Codigo_C"].'</td> 
          <td>
                  <div class="btn-group">
                <button class="btn btn-warning btnEditarcliente" data-toggle="modal" data-target="#ModalEditarUsuario"> <i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger "> <i class="fa fa-times"></i></button>
                  </div>
              </td>
          </tr>';
            }

           ?>

          </tbody>
        </table>

        <div class="box-body">


    </div>
  </section>
</div>

<!-- CLASE MODAL AGREGAR CLIENTE-->
<div class="modal modal-info fade" id="modalAgregarcliente" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar Cliente</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">
    
<!-- nombre -->
            <div class="form-group">
            <div class="input-group">
               <p>
                <i class="fa fa-commenting"> 

                <input type="text" class="input-lg" style="color: black" placeholder="Nombre" name="nombrec" id="nombrec" size="50" required >            
                 </i>
                </p>
               </div>
             </div>
<!-- apellidos -->
             <div class="form-group">
               <div class="input-group">
                     <p>
                       <i class="fa fa-commenting-o"> 
               <input type="text" class="input-lg" style="color: black" placeholder="Ap Paterno" name="ApPaternoc" id="ApPaternoc" size="22"  required >            
                <input type="text" class="input-lg" style="color: black" placeholder="Ap Materno" name="ApMaternoc" id="ApMaternoc" size="22"  required >   
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
 <!-- GENERO  -->
            <div class="form-group">
                 <div class="input-group">
                <p> <h4>     Genero: </h4> 
                <h4>  
                             <input type="radio" name="generoc" value="Masculino">Hombre
                             <input type="radio" name="generoc" value="Femenino">Mujer
                             <input  type="radio" name="generoc" value="Otro">Otro
                             </h4> 
                </p>
                </div>
             </div>             
<!-- email  -->
                <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-500px"> </i></span>
                                <input type="text" class="form-control input-lg" style="color: black" name="emailc" placeholder="Ingresar Email" required>
                            </div>
                  </div>

<!-- Nro cel-->           
            <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone-square"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="nrocelc" placeholder="Ingresar Numero de cel:" required>
                          </div>
                        </div>
  <!-- fecha de nacimiento -->       
  <div class="form-group">  
                      <div class="input-group">
                          <h4 class="modal-title">  Fecha_Nac  </h4>                                           
                    <span class="input-group-addon"><i class="fa  fa-heartbeat"> </i></span>

                    <input type="text" class="form-control "  id="fechanacc" name="fechanacc" value="1996-09-22" data-datepicker-color="primary" >
                
                    </div>   
                </div>
<!-- grado  -->
<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"> </i></span>
                <select class="form-control input-lg" name="grado">
                  <option value=" Seleccionar Grado">Seleccionar una Categoria</option>
                  <option value=" Vip">Vip precio 40</option>
                  <option value=" Normal">Normal precio 30</option>
                  <option value=" Empleado">Empleado precio 20</option>
                  <option value=" Otro">Otro </option>
                </select>
              </div>
            </div>
<!-- costo  ingreso -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon select-editable"><i class="fa fa-money"> </i></span>
                <select class="form-control input-lg" name="costo_Ing" onchange="this.nextElementSibling.value=this.value">
                  <option value=" ">Seleccionar un Costo</option>
                  <option value=" 40">Vip </option>
                  <option value=" 30">Normal </option>
                  <option value=" 20">Empleado </option>
                  <option > <input type="text"  class="input-lg" style="color: black" placeholder=" ingresa Otro Monto " name="costo_Ing"  size="15"  required>   </option>
                </select>
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
