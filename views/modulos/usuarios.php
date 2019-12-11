
<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Administrar usuarios
      <small>Panel de Control</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar usuarios</li>


      <!-- Trigger the modal with a button -->

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar Usuario
        </button>


      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Usuarios</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Ultimo login</th>
              <th>Acciones</th>

            </tr>

          </thead>
          <tbody>


            <?php

            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
            foreach ($usuarios as $key => $value) {

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
            }
            ?>


          </tbody>
        </table>

      </div>
    </div>

    <!-- /.box -->

  </section>
  <!-- /.content -->

</div>

<!-- CLASE MODAL AGREGAR USUARIO-->
<div class="modal modal-info fade" id="modalAgregarUsuario" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar Usuarios</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">

            <!-- perfil -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"> </i></span>
				<label>Tipo de Cuenta:</label>	
                <select class="form-control input-lg" name="NuevoPerfil">
                  <option value="Administracion">Administracion</option>
                  <option value="Recepcion">Recepcion</option>
                  <option value="Ventas" selected>Ventas</option>
                </select>
              </div>
            </div>
            <!-- nombre-cuenta  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" placeholder="Ingresar usuario" name="nuevoUsuario" id="nuevoUsuario" required>
              </div>
            </div>


            <!-- password -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"> </i></span>
                <input type="password" class="form-control input-lg" style="color: black" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
              </div>
            </div>

            <!-- email  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-area-chart"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="Email" placeholder="Ingresar Email" required>
              </div>
            </div>

            <!-- Subir foto -->
            <h4 class="modal-title">Subir Foto De Perfil</h4>
            <h4></h4>
            <div class="form-group">

              <input type="file" class="nuevafoto" name="nuevafoto">
              <p class="help-block">Peso maximo de una Foto es de 2MB</p>
              <img src="Views/img/usuarios/default/usn.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>
        <!-- /.pie del modal-->

        <div class="modal-footer">

          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Guardar Usuario</button>

        </div>
        <?php
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->CtrCrearUsuario();
        ?>

      </form>

    </div>

  </div>

  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!-- CLASE MODAL Editar  USUARIO-->
<div class="modal modal-info fade" id="ModalEditarUsuario" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Editar Usuario</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">

            <!-- perfil -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"> </i></span>
				<label>Tipo de Cuenta:</label>								
                <select class="form-control input-lg" name="editarPerfil">
                  <option value="Administracion">Administracion</option>
                  <option value="Recepcion">Recepcion</option>
                  <option value="Ventas" selected>Ventas</option>

                </select>
              </div>
            </div>
            <!-- nombre-cuenta  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"> </i></span>         
                <input type="text" class="form-control input-lg" style="color: black" value="" name="editarUsuario" id="editarUsuario" readonly>
              </div>
            </div>


            <!-- password -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"> </i></span>
                <input type="password" class="form-control input-lg" style="color: black" placeholder="Ingresar nueva contraseña" id="editarPassword" name="editarPassword"  required>
                <input type="hidden" id="passwordActual" name="passwordActual" >
              
              </div>
            </div>

            <!-- email  -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-area-chart"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black"  value=""  name="editarEmail" id="editarEmail" required>
              </div>
            </div>                                                                            

            <!-- Subir foto -->
            <h4 class="modal-title">Subir Foto De Perfil</h4>
            <h4></h4>
            <div class="form-group">
            
              <input type="file" class="nuevafoto" name="editarfoto">
              <p class="help-block">Peso maximo de una Foto es de 2MB</p>
              <img src="Views/img/usuarios/default/usn.png" class="img-thumbnail previsualizar" width="100px">
              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>
        <!-- /.pie del modal-->

        <div class="modal-footer">

          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-outline">Modificar Cambios</button>

        </div>
        <?php
        $editarUsuario = new ControladorUsuarios();
        $editarUsuario->ctreditarUsuario();
        
        ?>


      </form>

    </div>

  </div>

  <!-- /.modal-dialog -->
</div>
<!-- /.borrar usuario -->
<?php
        $borrarUsuario = new ControladorUsuarios();
        $borrarUsuario->ctrBorrarUsuario();
        
        ?>