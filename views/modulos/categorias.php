<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Administrar Cursos
      <small> Informacion de cursos</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Cursos</li>

    </ol>

  </section>


  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarCurso">
          Agregar Curso
        </button>
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th>#</th>
              <th> Foto </th>
              <th>Nombre_Curso</th>
              <th>Nom_Instructor</th>
              <th>Cant_Cupos</th>
              <th>Inicio <br> de_Clases</th>
              <th>Certificacion</th>
              <th>Costo</th>
              <th>Ubicacion</th>
              <th>Horario</th>
              <th>Acciones</th>
            </tr>

          </thead>
          <tbody>
            <?php

            $item = null;
            $valor = null;
            $aux = 0;
            $cursos = ControladorCursos::ctrMostrarCursos($item, $valor);
            foreach ($cursos as $key => $value) {
              $aux = $value["Cod_Curso"];
              echo '<tr>
          <td>' . ($key + 1) . '</td>';
              if ($value["fotoC"] != " ") {
                echo '<td><img src="' . $value["fotoC"] . '" class="img-thumbnail" width="100px"></td>';
              } else {
                echo '<td><img src="Views/img/cursos/defaultc/curso.jpg class="img-thumbnail" width="100px"></td>';
              }

              echo '<td>' . $value["Nombre_Curso"] . '</td>
          <td>' . $value["Id_Instructor"] . '</td>
          <td>' . $value["Cant_Cupos"] . '</td>
          <td>' . $value["Inicio_Fin_Clases"] . '</td>
          <td>' . $value["Certificacion"] . '</td>
          <td><button class="btn btn-success btn-xs ">' . $value["Costo"] . '</button></td>
          <td>' . $value["Ubicacion"] . '</td>
          <td>' . $value["Id_Horario"] . '</td> 
         
          <td>
                  <div class="btn-group">     
     <button class="btn btn-warning btneditarcurso" codcurso="' . $value["Cod_Curso"] . '" data-toggle="modal" data-target="#ModalEditarcurso"> <i class="fa fa-pencil"></i></button>
    <button class="btn btn-danger  btneliminarcurso" codcursos="' . $value["Cod_Curso"] . '" curso="' . $value["Nombre_Curso"] . '"   fotocurso="' . $value["fotoC"] . '"> <i class="fa fa-times"></i></button>
    <button class="btn btn-info btnagregar" codcurso="' . $value["Cod_Curso"] . '" data-toggle="modal" data-target="#Modalagregar"> <i class="fa fa-plus">AGREGAR</i></button>
                        
                  </div> 
              </td>
          </tr>';
            }

            ?>

          </tbody>
        </table>
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


<!-- EDITAR CURSO  -->
<div class="modal modal-info fade" id="ModalEditarcurso" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Editar Curso</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">
            <!-- perfil -->
            <!-- Subir foto de curso-->
            <h4 class="modal-title">Subir Foto De Curso</h4>
            <h4></h4>
            <div class="form-group">

              <input type="file" class="nuevafoto" name="editarfotoc">
              <p class="help-block">Peso maximo de una Foto es de 2MB</p>
              <img src="Views/img/cursos/defaultc/curso.jpg" class="img-thumbnail previsualizar" width="100px">
              <input type="hidden" name="fotoActual1" id="fotoActual1">

            </div>

            <!-- inicio de clases  -->
            <div class="form-group">
              <div class="input-group">
                <h4 class="modal-title"> Inicio-Fin de Clases </h4>

                <span class="input-group-addon"><i class="fa fa-calendar"> </i></span>
                <input type="text" id="editardaterange" name="editardaterange" value="01/01/2018 - 01/15/2018" style=" background: #00c0ef" />
              </div>
            </div>

            <!-- horario -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-child"> </i></span>

                <select class="form-control input-lg" name="editarhorario" id="editarhorario" style="color: black">

                  <option value="" id="editarhorario">Seleccionar un Turno</option>
                  <?php
                  include("conexionmysqli.php");
                  $query = "SELECT * FROM horarios ";
                  $resultado1 = $conexion->query($query);
                  while ($row = $resultado1->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['Id_Horario']; ?>"><?php echo $row['Turno']; ?> </option>
                  <?php
                  } ?>
                </select>
              </div>
            </div>


            <script>
              $('input[nombre="daterange"]').daterangepicker();
            </script>
            <script>
              $(function() {
                $('input[name="daterange"]').daterangepicker({
                  opens: 'left'
                }, function(start, end, label) {
                  console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
              });
            </script>

            <!-- nombre-de curso -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-up"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" value="" name="editarcurso" id="editarcurso" readonly>
              </div>
            </div>
            <!-- ubicacion -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="editarubi" id="editarubi" value="" required>
              </div>
            </div>
            <!-- nombre- de instructor -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                <select class="form-control input-lg" id="editarpersonai" name="editarpersonai" style="color: black">
                  <?php

                  include("conexionmysqli.php");
                  $query = "SELECT * FROM instructor i, persona p WHERE i.Id_Instructor = p.Cod_Cliente";

                  $resultado = $conexion->query($query);

                  while ($row = $resultado->fetch_assoc()) {

                    ?>

                    <option value="<?php echo $row['Cod_Cliente']; ?>" id="editarinstructor"><?php echo $row['Nombre'] . " " . $row['Ap_Paterno'] . " " . $row['Nro_Cel']; ?> </option>

                  <?php
                  } ?>
                </select>


              </div>
            </div>
            <!-- Cant Cupos -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="editarcupos" id="editarcupos" value="" required>
              </div>
            </div>



            <!-- certificacion  -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clipboard"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="editarcertificacion" id="editarcertificacion" value="" required>
              </div>
            </div>
            <!-- costo  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="editarcosto" id="editarcosto" value="" required>
              </div>
            </div>
          </div>
        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                        btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Guardar Cambios</button>

        </div>
        <?php
        $editarCurso = new ControladorCursos();
        $editarCurso->Ctreditarcurso();
        ?>
      </form>

    </div>
  </div>

</div>



<!-- CLASE MODAL -->
<div class="modal modal-info fade" id="modalAgregarCurso">
  <div class="modal-dialog">

    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar Curso</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">
            <!-- perfil -->


            <!-- Subir foto de curso-->
            <h4 class="modal-title">Subir Foto De Curso</h4>
            <h4></h4>
            <div class="form-group">

              <input type="file" class="nuevafotoc" name="nuevafotoc">
              <p class="help-block">Peso maximo de una Foto es de 2MB</p>
              <img src="Views/img/cursos/defaultc/curso.jpg" class="img-thumbnail previsualizar" width="100px">

            </div>

            <!-- inicio de clases  -->
            <div class="form-group">
              <div class="input-group">
                <h4 class="modal-title"> Inicio-Fin de Clases </h4>

                <span class="input-group-addon"><i class="fa fa-calendar"> </i></span>
                <input type="text" id="daterange" name="daterange" value="01/01/2018 - 01/15/2018" style=" background: #00c0ef" />
              </div>
            </div>

            <!-- horario -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-child"> </i></span>

                <select class="form-control input-lg" name="Nuevohorario" tyle="color: black">

                  <option value=" Seleccionar un Turno ">Seleccionar un Turno</option>
                  <?php
                  include("conexionmysqli.php");
                  $query = "SELECT * FROM horarios ";
                  $resultado1 = $conexion->query($query);
                  while ($row = $resultado1->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['Id_Horario']; ?>"><?php echo $row['Turno']; ?> </option>
                  <?php
                  } ?>
                </select>
              </div>
            </div>


            <script>
              $('input[nombre="daterange"]').daterangepicker();
            </script>
            <script>
              $(function() {
                $('input[name="daterange"]').daterangepicker({
                  opens: 'left'
                }, function(start, end, label) {
                  console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
              });
            </script>

            <!-- nombre-de curso -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-up"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar Nombre de Curso" name="nuevocurso" id="nuevocurso" required>
              </div>
            </div>
            <!-- ubicacion -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="Ubicacion" placeholder="Ingresar Ubicacion" required>
              </div>
            </div>
            <!-- nombre- de instructor -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                <select class="form-control input-lg" id="nuevapersonai" name="nuevapersonai" style="color: black">
                  <?php

                  include("conexionmysqli.php");
                  $query = "SELECT * FROM instructor i, persona p WHERE i.Id_Instructor = p.Cod_Cliente";

                  $resultado = $conexion->query($query);

                  while ($row = $resultado->fetch_assoc()) {

                    ?>

                    <option value="<?php echo $row['Cod_Cliente']; ?>"><?php echo $row['Nombre'] . " " . $row['Ap_Paterno'] . " " . $row['Nro_Cel']; ?> </option>

                  <?php
                  } ?>
                </select>


              </div>
            </div>
            <!-- Cant Cupos -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="Cupos" placeholder="Ingresar Cantidad de Cupos" required>
              </div>
            </div>



            <!-- certificacion  -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clipboard"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="Certificacion" placeholder="Ingresar certificacion" required>
              </div>
            </div>
            <!-- costo  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="Costo" placeholder="Ingresar costo" required>
              </div>
            </div>
          </div>
        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                        btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Guardar Curso</button>

        </div>
        <?php
        $crearCurso = new ControladorCursos();
        $crearCurso->CtrCrearcurso();
        ?>
      </form>

    </div>
  </div>

</div>





<!-- CLASE MODAL AGREGAR -->
<div class="modal modal-info fade" id="Modalagregar">
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

          <div class="box-body" >
            <!-- perfil -->
            <div   style=" justify-content: space-around; display: flex;">

            
            <div class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAgregara">
              Agregar Antiguo
            </div>

            <div class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalAgregarn">
              Agregar Nuevo
            </div>

            </div>

          </div>
        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                        btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline">Buenos dias</button>
        </div>
        <?php
        $crearCurso = new ControladorCursos();
        $crearCurso->CtrCrearcurso();
        ?>
      </form>

    </div>
  </div>

</div>

<!-- CLASE MODAL AGREGAR NUEVO-->
<div class="modal modal-info fade" id="modalAgregarn" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title"> NUEVO </h4>

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
<!-- costo  ingreso -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon select-editable"><i class="fa fa-money"> </i></span>
                <select class="form-control input-lg" name="costo_Ing" onchange="this.nextElementSibling.value=this.value">
                  <option value=" ">Costo</option>
                  <option value=" 40">NORMAL </option>
                  <option value=" 30">DESCUENTO </option>
                  <option value=" 20">EMPLEADO </option>
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


<!-- CLASE MODAL AGREGAR ANTIGUO-->
<div class="modal modal-info fade" id="modalAgregara" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title"> NUEVO </h4>

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
<!-- costo  ingreso -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon select-editable"><i class="fa fa-money"> </i></span>
                <select class="form-control input-lg" name="costo_Ing" onchange="this.nextElementSibling.value=this.value">
                  <option value=" ">Costo</option>
                  <option value=" 40">NORMAL </option>
                  <option value=" 30">DESCUENTO </option>
                  <option value=" 20">EMPLEADO </option>
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

<?php
$borrarcurso = new ControladorCursos();
$borrarcurso->ctrborrarcurso();
?>