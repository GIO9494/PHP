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
        
      <button class="btn btn-info btn-lg"  data-toggle="modal" data-target="#modalAgregarUsuario">
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
          <tr>
             <td>1</td>
             <td>Usuario Administrador</td>
             <td>Admin</td>
             <td><img src="views/img/usuarios/default/user1.png" class="img-thumbnail" width="40px"></td>
             <td>Administrador</td>
             <td><button class="btn btn-success btn-xs">Activado</button></td>
             <td>2019-12-11 12:45:31</td>
             <td>
                      <div class="btn-group">

                    <button class="btn btn-warning "> <i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger "> <i class="fa fa-times"></i></button>

                      </div>

             </td>

          </tr>

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

<!-- CLASE MODAL -->
<div class="modal modal-info fade" id="modalAgregarUsuario">
          <div class="modal-dialog">
            
            <div class="modal-content">
                          <form  role="form" method="POST" enctype="multipart/form-data">
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
                                <select  class="form-control input-lg" name="Nuevo Perfil"  >
                  <option value=" Seleccionar un Perfil ">Seleccionar un Perfil</option>
                    <option value=" Administrador">Administrador</option>
                    <option value=" Especial">Especial</option>
                    <option value=" Administrador de Ventas "> Administrador de Ventas</option>
                    
                                  </select>
                      </div>
                    </div>
            <!-- nombre-cuenta  -->
                            <div class="form-group">  
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                                <input type="text" name="Nuevo usuario" placeholder="Ingresar usuario" required>
                              </div>
                            </div>
            

            <!-- password -->
                            <div class="form-group">  
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"> </i></span>
                                <input type="password" name="Nuevo password" placeholder="Ingresar Contraseña" required>
                              </div>
                            </div>

            <!-- email  -->
            <div class="form-group">  
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-area-chart"> </i></span>
                                <input type="text" name="Email" placeholder="Ingresar Email" required>
                              </div>
                            </div>

            <!-- Subir foto -->
            <h4 class="modal-title">Subir Foto De Perfil</h4>
            <h4></h4>
            <div class="form-group">  

                  <input type="file"  id="Nueva foto" name="Nueva Foto">
                    <p class="help-block" >Peso maximo de una Foto es    de 2MB</p>
                <img src="Views/img/usuarios/default/usn.png" class="img-thumbnail" width="100px" >

                
                    </div>   
                    <!-- /.pie del modal-->



                          <div class="modal-footer">

                            <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>

                            <button type="submit" class="btn btn-outline">Guardar Usuario</button>

                          </div>

                          </form>

            </div>
            
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->