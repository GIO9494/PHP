

  <script>
  $( function() {
    $( "#fecha_naci" ).datepicker();
  } );
  </script>

<div class="content-wrapper">
  <section class="content-header">

    <h1>
      Registro de Instructores y Horarios
      <small>Panel de Control</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Instructores y Horarios</li>


      <!-- Trigger the modal with a button -->

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarInstructor" >
          Agregar Instructores
        </button>
        
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Foto</th>
              <th>Nombre</th>
              <th>Ap_Paterno</th>
              <th>Ap_materno</th>
              <th>Ci</th>
              <th>Genero</th>
              <th>Correo_Electronico</th>
              <th>Nro_Cel</th>
              <th>Fecha_Nac</th>
              <th>Nro de Meritos</th>
              <th>Especialidades</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
          <?php
$item = null;
$valor = null;

$personas = ControladorInstructor::ctrMostrarinstructor($item, $valor);


foreach ($personas as $key => $value) {

  echo '<tr>
          <td>'.($key+1).'</td>';
          if ($value["fotoI"] != " ") {
            echo '<td><img src="'.$value["fotoI"].'" class="img-thumbnail" width="100px"></td>';
          }else{                                
            echo '<td><img src="Views/img/Instructores/defaultI/doc.png class="img-thumbnail" width="100px"></td>';
          }
          
          echo '<td>'.$value["Nombre"].'</td>
          <td>'.$value["Ap_Paterno"].'</td>
          <td>'.$value["Ap_Materno"].'</td>
          <td>'.$value["Ci"].'</td>
          <td>'.$value["Genero"].'</td>
          <td>'.$value["Correo_Electronico"].'</td>
          <td>'.$value["Nro_Cel"].'</td>
          <td>'.$value["Fecha_Nac"].'</td>
          <td>'.$value["Nro_de_Meritos"].'</td>
          <td>'.$value["Especialidades"].'</td>
          
          
          <td>
                  <div class="btn-group">
                <button class="btn btn-warning btnEditarInstructor" idInstructor="'.$value["Id_Instructor"].'" data-toggle="modal" data-target="#modalEditarUsuario"> <i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btnEliminarInstructor" idInstructor="'.$value["Id_Instructor"].'" fotoI="'.$value["fotoI"].'"   Nombre="'.$value["Nombre"].'"> <i class="fa fa-times"></i></button>
                  </div>
              </td>
          </tr>';
            }

           ?>
            
          </tbody>
        </table>

        <a href="../reference/uri-url.html">GENERAR LISTADO DE INSTRUCTORES</a>   


        <div class="box-header with-border">
        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarHorarios">
          Agregar Horario
        </button>
        </div>
  

        <div class="box-body">

<table class="table table-bordered table-striped dt-responsive tablas">
  <thead>
    <tr>
      <th style="width: 10px">#</th>
      <th>turno</th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <td>1</td>
      <td>mañana 9-11</td>
    </tr>
  </tbody>
</table>
        
      </div>
    </div>
  </section>
</div>

<!-- CLASE MODAL AGREGAR INSTRUCTOR-->
<div class="modal modal-info fade" id="modalAgregarInstructor" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar INSTRUCTOR</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">
    
<!-- Subir foto de instructor-->
<h4 class="modal-title">Subir Foto De Instructor</h4>
            <h4></h4>
           <div class="form-group">  

              <input type="file" class="nuevafotoI" name="nuevafotoI">
              <p class="help-block">Peso maximo de una Foto es de 2MB</p>
              <img src="Views/img/Instructores/defaultI/doc.jpg" class="img-thumbnail previsualizar" width="100px" >
              
                </div> 

          
<!-- nombre -->
            <div class="form-group">
            <div class="input-group">
               <p>
                <i class="fa fa-commenting"> 

                <input type="text" class="input-lg" style="color: black" placeholder="Nombre" name="nombre" id="nombre" size="50" required >            
                 </i>
                </p>
               </div>
             </div>
<!-- apellidos -->
             <div class="form-group">
               <div class="input-group">
                     <p>
                       <i class="fa fa-commenting-o"> 
               <input type="text" class="input-lg" style="color: black" placeholder="Ap Paterno" name="ApPaterno" id="ApPaterno" size="22"  required >            
                <input type="text" class="input-lg" style="color: black" placeholder="Ap Materno" name="ApMaterno" id="ApMaterno" size="22"  required >   
                       </i>
                     </p>
                  </div>
             </div>
<!-- CI  -->
             <div class="form-group">
               <div class="input-group">
                <P>  <i class="fa fa-unlock-alt">  <input type="text"  class="input-lg" style="color: black" placeholder=" CI " name="Ci" id="Ci" size="40"  required >  </i> </p>           
                </div>
             </div>
 <!-- GENERO  -->
            <div class="form-group">
                 <div class="input-group">
                <p> <h4>     Genero: </h4> 
                             <input type="radio" name="genero" value="Masculino"> Hombre
                             <input type="radio" name="genero" value="Femenino"> Mujer
                             <input  type="radio" name="genero" value="Otro"> Otro
                </p>
                </div>
             </div>             
<!-- email  -->
                <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-500px"> </i></span>
                                <input type="text" class="form-control input-lg" style="color: black" name="emaild" placeholder="Ingresar Email" required>
                            </div>
                  </div>

<!-- Nro cel-->           
            <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone-square"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="nrocel" placeholder="Ingresar Numero de cel:" required>
                          </div>
                        </div>
  <!-- fecha de nacimiento -->       
  <div class="form-group">  
                      <div class="input-group">
                          <h4 class="modal-title">  Fecha_Nac  </h4>                                           
                    <span class="input-group-addon"><i class="fa  fa-heartbeat"> </i></span>
                    <input type="text" class="form-control "  id="fechanaci" name="fechanac" value="1996-09-22" data-datepicker-color="primary" >
                
                    </div>   
                </div>

      <!-- Nro de Meritos-->           
      <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-slack"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="meritos" placeholder="Ingresar Nro de Meritos" required>
                          </div>
                        </div>
        <!-- Especialidades--> 
        <div class="form-group">
             <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-institution"> </i></span>
                   <input type="text" class="form-control input-lg" style="color: black" name="especialidades" placeholder="Ingresar Especialidades" required>
                </div>
               </div>

          </div>

        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline" name='enviar'>Guardar Instructor</button>

        </div>
        <?php
                      $crearinstructor = new ControladorInstructor();
                      $crearinstructor ->CtrCrearInstructor();
                      
                       ?>
      </form>
    </div>
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- CLASE MODAL AGREGAR  HORARIO-->
<div class="modal modal-info fade" id="modalAgregarHorarios" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar Horario</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">

            <!-- nuevo horario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar Horario (ejemplo mañana 10-12)" name="turno" id="turno" required>
              </div>
            </div>
          </div>
        </div>
        <!-- /.pie del modal-->

        <div class="modal-footer">

          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Guardar Horario</button>

        </div>
        

      </form>

    </div>

  </div>

  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- CLASE MODAL EDITAR INSTRUCTOR-->
<div class="modal modal-info fade" id="modalEditarUsuario" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">EDITAR INSTRUCTOR</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">
    
<!-- Subir foto de instructor-->
<h4 class="modal-title">Subir Foto De Instructor</h4>
            <h4></h4>
           <div class="form-group">  
           <input type="file" class="nuevafotoI" name="editarfoto">
              <input type="hidden" name="fotoActual" id="fotoActual">
              <p class="help-block">Peso maximo de una Foto es de 2MB</p>
              <img src="Views/img/Instructores/defaultI/doc.jpg" class="img-thumbnail previsualizar" width="100px" >
              
                </div> 

          
<!-- nombre -->
            <div class="form-group">
            <div class="input-group">
               <p>
                <i class="fa fa-commenting"> 

                <input type="text" class="input-lg" style="color: black" value="" name="editarnombre" id="editarnombre" size="50" required >            
                 </i>
                </p>
               </div>
             </div>
<!-- apellidos -->
             <div class="form-group">
               <div class="input-group">
                     <p>
                       <i class="fa fa-commenting-o"> 
               <input type="text" class="input-lg" style="color: black" value="" name="editarappaterno" id="editarappaterno" size="22"  required >            
                <input type="text" class="input-lg" style="color: black" value="" name="editarapmaterno" id="editarapmaterno" size="22"  required >   
                       </i>
                     </p>
                  </div>
             </div>
<!-- CI  -->
             <div class="form-group">
               <div class="input-group">
                <P>  <i class="fa fa-unlock-alt">  <input type="text"  class="input-lg" style="color: black" value="" name="editarci" id="editarci" size="40"  required >  </i> </p>           
                </div>
             </div>
 <!-- GENERO  -->
            <div class="form-group">
                 <div class="input-group">
                <p> <h4>     Genero: </h4> 
                             <input type="radio" name="g1" id="g1" value="" checked> Hombre
                             <input type="radio" name="g2" id="g2" value=""> Mujer
                             <input  type="radio" name="g3" id="g3" value=""> Otro
                </p>
                </div>
             </div>             
<!-- email  -->
                <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-500px"> </i></span>
                                <input type="text" class="form-control input-lg" style="color: black" name="editaremail" id="editaremail" value="" required>
                            </div>
                  </div>

<!-- Nro cel-->           
            <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone-square"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="editarnrocel" id="editarnrocel" value="" required>
                          </div>
                        </div>
  <!-- fecha de nacimiento -->       
  <div class="form-group">  
                      <div class="input-group">
                          <h4 class="modal-title">  Fecha Nac:  </h4>                                           
                    <span class="input-group-addon"><i class="fa  fa-heartbeat"> </i></span>
                    <input type="text" class="form-control "   name="editarfechanac" id="editarfechanac" value="" >
                
                    </div>   
                </div>

      <!-- Nro de Meritos-->           
      <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-slack"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="editarmeritos" id="editarmeritos" value="" required>
                          </div>
                        </div>
        <!-- Especialidades--> 
        <div class="form-group">
             <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-institution"> </i></span>
                   <input type="text" class="form-control input-lg" style="color: black" id="editarespecialidades" name="editarespecialidades" value="" required>
                </div>
               </div>

          </div>

        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline" name='enviar'>Modificar Instructor</button>

        </div>
      <?php
                      $editarInstructor = new ControladorInstructor();
                      $editarInstructor -> ctreditarInstructor();
                      
                       ?> 
      </form>
    </div>
  </div> 
  <!-- /.modal-dialog -->
</div>

<?php 

            $borrarInstructor = new ControladorInstructor();
            $borrarInstructor -> ctrBorrarInstructor();

?>
 
