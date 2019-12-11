<div class="content-wrapper">
    <section class="content-header">
      <h1>
          Registro de Productos
      <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Productos - Objetos de Piscina</li>
                      <!-- Trigger the modal with a button -->
      </ol>

        </section>

                  <!-- Main content -->
          <section class="content">

                    <!-- Default box -->
              <div class="box">
              <div class="box-header with-border">

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">PRODUCTOS</a>
  </li>
<li class="nav-item">
<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">OBJETOS DE LA PISCINA</a>
                          </li>
                          <li class="nav-item">
                        
                          </li>

                        </ul>


                        <div class="tab-content" id="pills-tabContent">

                          <!-- Default box -->

                          <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" style="background: skyblue ">
                            <br>
                           
                            <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarProducto">
                              Agregar Producto
                            </button>
                            <br>
                            <div class="box-body">
                              <table class="table table-bordered table-striped dt-responsive tablas">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Fecha_Compraul</th>
                                    <th>Proveedor</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Tipo</th>
                                    <th>Ingredientes </th>
                                    <th>Acciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $item = null;
                                  $valor = null;
                                  
                                 

                                  $comida = Controladorproducto::ctrMostrarcomida($item, $valor);
                                  foreach ($comida as $key => $value) {

                                    echo '<tr>
                                    <td>' .($key+1). '</td>';
                                    if ($value["FotoCo"] != " ") {
                                      echo '<td><img src="' . $value["FotoCo"] . '" class="img-thumbnail" width="100px"></td>';
                                    } else {
                                      echo '<td><img src="Views/img/productos/defaultp/anonymous.png class="img-thumbnail" width="100px"></td>';
                                    }
      echo '<td>' . $value["Nom_Prod"] . '</td>
            <td>' . $value["Cantidad"] . '</td>
            <td>' . $value["Fecha_Compraul"] . '</td>
            <td>' . $value["Proveedor"] . '</td>
            <td>' . $value["Precio_Compra"] . '</td>
            <td>' . $value["Precio_Venta"] . '</td>
            <td>' . $value["Tipo"] . '</td>
            <td>' . $value["Ingredientes"] . '</td>
            <td>
               <div class="btn-group">
              <button class="btn btn-warning btnEditarProducto" data-toggle="modal" Cod_producto="'.$value["Cod_producto"].'" data-target="#modalEditarProducto" Cod_producto="'.$value["Cod_producto"].'">Editar <i class="fa fa-pencil"></i></button>

              <button class="btn btn-danger btnEliminarProducto" Cod_producto="'.$value["Cod_producto"].'" FotoCo="'.$value["FotoCo"].'" Nom_Prod="'.$value["Nom_Prod"].'"> Eliminar <i class="fa fa-times"></i></button>
                          </div>
                      </td>
                  </tr>';
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>


                          <!--  PRODUCTOS  DE OBJETOS PISCINA -->
                          <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" style="background: skyblue">
                            <!--  PRODUCTOS  DE OBJETOS PISCINA-->
                            <br>
                            <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAgregarObjeto">
                              Agregar Objetos-Piscina
                            </button>
                            <br>
                            <div class="box-body">
                              <table class="table table-bordered table-striped dt-responsive tablas">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Fecha_Compraul</th>
                                    <th>Proveedor</th>
                                    <th>Precio_Venta</th>
                                    <th>Precio_Flete</th>
                                    <th>Precio_De_Reposicion</th>
                                    <th>Talla</th>
                                    <th>Color</th>
                                    <th>Estado</th>
                                    <th>Marca</th>
                                    <th>Acciones</th>
                                  </tr>
                                </thead>
<tbody>
  <?php
  $item = null;
  $valor = null;
  $objeto = Controladorproducto::ctrMostrarobjeto($item, $valor);
  foreach ($objeto as $key => $value) {
    echo '<tr>
          <td>' . ($key+1). '</td>';
   if ($value["FotoO"] != " ") {
       echo '<td><img src="' . $value["FotoO"] . '" class="img-thumbnail" width="100px"></td>';
      } else {
     echo '<td><img src="Views/img/objetos_piscina/defaulto/product.png class="img-thumbnail" width="100px"></td>';
                                    }
          echo '<td>' . $value["Nom_Prod"] . '</td>
                <td>' . $value["Cantidad"] . '</td>
                <td>' . $value["Fecha_Compraul"] . '</td>
                <td>' . $value["Proveedor"] . '</td>
                <td>' . $value["Precio_Venta"] . '</td>
                <td>' . $value["Costo_Flete"] . '</td>
                <td>' . $value["Costo_Reposicion"] . '</td>
                <td>' . $value["Talla"] . '</td>
                <td>' . $value["Color"] . '</td>
                <td>' . $value["Estado"] . '</td> 
                <td>' . $value["Marca"] . '</td> 
                <td>
<div class="btn-group">
  <button class="btn btn-warning btnEditarobjeto" id ="btnEditarobjeto" data-toggle="modal" data-target="#ModalEditarUsuario">Editar <i class="fa fa-pencil"></i></button>

  <button class="btn btn-danger btnEliminarObjeto" Cod_producto="'.$value["Cod_producto"].'" FotoO="'.$value["FotoO"].'" Nom_Prod="'.$value["Nom_Prod"].'"> <i class="fa fa-times">Eliminar </i></button>
                          </div>
                      </td>
                  </tr>';
                                  }
                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>


                          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" style="background: skin-purple">que haces
                            <!--  PRODUCTOS  DE OBJETOS PISCINA-->
                          </div>
                          <!--------------------->
                        </div>
                        <!--------------------->
                      </div>
                  </section>
                </div>


<!-- CLASE MODAL AGREGAR PRODUCTO COMIDA-->
<div class="modal modal-info fade" id="modalAgregarProducto" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar Producto</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">
    
<!-- Subir foto de producto-->
<h4 class="modal-title">Subir Foto De Producto</h4>
            <h4></h4>
           <div class="form-group">  
              <input type="file" class="nuevafotoP" name="nuevafotoP">
              <p class="help-block">Peso maximo de una Foto es de 2MB</p>
              <img src="Views/img/productos/defaultp/anonymous.png" class="img-thumbnail previsualizar1" width="100px" >
                </div> 
<!-- nombre -->
<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="nombreprod"  placeholder="Ingresar Nombre producto" required>
              </div>
            </div>
            
<!-- Stock cantidad-->           
<div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-slack"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="Cantidad" placeholder="Ingresar Cantidad de Unidades Total" required>
                          </div>
                        </div>
<!-- Proveedor-->                                                                      
<div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-truck"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="Proveedor" placeholder="Ingresar proveedor" required>
                          </div>
                        </div>

 <!-- Fecha_ultima compra -->       
 <div class="form-group">  
                      <div class="input-group">
                          <h4 class="modal-title">  Ultima Compra  </h4>                                           
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"> </i></span>

                    <input type="text" class="form-control "  id="ultimacom" name="ultimacom" value="2019-03-21" data-datepicker-color="primary" >
                
                    </div>   
                </div>
                 <!-- PRECIO compra-->           
 <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-usd"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="precioC" placeholder="Ingresar Precio Compra" required>
                          </div>
                        </div>

 <!-- PRECIO venta-->           
 <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-usd"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="precio" placeholder="Ingresar Precio Venta" required>
                          </div>
                        </div>



<!-- Tipo  -->
<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa  fa-text-width"> </i></span>
                <select class="form-control input-lg" name="Nuevotipo">
                  <option value=" Seleccionar un Tipo ">Seleccionar un Tipo</option>
                  <option value=" Bebidas">Bebidas</option>
                  <option value=" Sandwiches">Sandwiches</option>
                  <option value=" Sopas ">Sopas</option>
                  <option value=" Comidas ">Comidas</option>
                  <option value=" Paste les y Tortas ">Pasteles y Tortas</option>
                </select>`
              </div>
            </div>
           
<!-- carateristicas e ingredientes  -->
                <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-folder"> </i></span>
                                <textarea type="text" class="form-control input-lg" name="ingredientes" style="color: black" rows="3" placeholder="Ingrese ingredientes y proteinas con caracteriticas"></textarea>
                            </div>
                  </div>
          </div>

        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline" name='enviar'>Guardar Producto</button>

        </div>
        <?php
    $crearproducto = new Controladorproducto();
    $crearproducto ->CtrCrearcomida();
     ?>
      </form>
    </div>
  </div>
  <!-- /.modal-dialog -->
</div>


<!-- CLASE MODAL AGREGAR OBJETO PISCINA-->
<div class="modal modal-info fade" id="modalAgregarObjeto" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Agregar Objeto_Piscina</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">
    
<!-- Subir foto de Objetop-->
<h4 class="modal-title">Subir Foto De Objeto_Piscina</h4>
            <h4></h4>
           <div class="form-group">  

              <input type="file" class="nuevafotoO" name="nuevafotoO">
              <p class="help-block">Peso maximo de una Foto es de 2MB</p>
              <img src="Views/img/objetos_piscina/defaulto/product.png" class="img-thumbnail previsualizar" width="100px" >
      
                </div> 

                <!-- nombre  -->
                <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-archive"> </i></span>
                                <input type="text" class="form-control input-lg" style="color: black" name="nombreo" placeholder="Ingresar Nombre_Objeto" required>
                            </div>
                  </div>


<!-- Tipo  -->
<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa  fa-text-width"> </i></span>
                <select class="form-control input-lg" name="NuevotipoO">
                  <option value=" Seleccionar un Tipo ">Seleccionar un Tipo</option>
                  <option value=" Flotadores">Flotadores</option>
                  <option value=" Pelotas">Pelotas</option>
                  <option value=" Trajes de Baño">Trajes de Baño</option>
                  <option value=" Toallas">Toallas</option>
                  <option value=" Otros">Otros</option>
                </select>
              </div>
            </div>

                <!-- Stock cantidad-->           
<div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-slack"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="CantidadO" placeholder="Ingresar Cantidad de Unidades Total" required>
                          </div>
                        </div>
<!-- Proveedor-->           
<div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-truck"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="ProveedorO" placeholder="Ingresar Proveedor" required>
                          </div>
                        </div>

 <!-- Fecha_ultima compra -->       
 <div class="form-group">  
                      <div class="input-group">
                          <h4 class="modal-title">  Ultima Compra  </h4>                                           
                    <span class="input-group-addon"><i class="fa  fa-calendar-check-o"> </i></span>

                    <input type="text" class="form-control "  id="ultimacomO" name="ultimacomO" value="2019-03-21" data-datepicker-color="primary" >
                
                    </div>   
                </div>
                  <!-- precio Venta-->           
            <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="PrecioVenta" placeholder="Ingresar Precio Venta" required>
                          </div>
                        </div>
                         <!-- precio Compra-->           
            <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="PrecioCompra" placeholder="Ingresar Precio de Compra" required>
                          </div>
                        </div>
                               <!-- precio Flete-->           
            <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="PrecioFlete" placeholder="Ingresar Precio Flete" required>
                          </div>
                        </div>
                               <!-- precio Reposicion-->           
            <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="Precio_De_Reposicion" placeholder="Ingresar Precio de Reposicion" required>
                          </div>
                        </div>
        <!-- talla  -->
                      <div class="form-group">
                        <div class="input-group">
                          <P>  <i class="fa fa-object-group">  <input type="text"  class="input-lg" style="color: black" placeholder="Ing Talla" name="talla" id="talla" size="40"  required >  </i> </p>           
                        </div>
                      </div>

          <!--color  -->
          <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-paypal"> </i></span>
                                <input type="text" class="form-control input-lg" style="color: black" name="color" placeholder="Ingresar Color" required>
                            </div>
                  </div>

<!-- estado -->
<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"> </i></span>
                <select class="form-control input-lg" name="EstadoO">
                  <option value=" Seleccionar un Tipo ">Seleccionar Estado</option>
                  <option value=" Exelente">Exelente</option>
                  <option value=" Normal">Normal</option>
                  <option value=" Sin ningun Daño ">Sin ningun Daño</option>
                  <option value=" Dañado ">Dañado</option>
                  <option value=" En Reparacion">En Reparacion</option>
                </select>
              </div>
            </div>

        <!-- Marca--> 
        <div class="form-group">
             <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-maxcdn"> </i></span>
                   <input type="text" class="form-control input-lg" style="color: black" name="marca" placeholder="Ingresar Marca" required>
                </div>
               </div>

          </div>

        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline" name='enviar'>Guardar Objeto</button>

        </div>
        <?php
              $crearobjeto = new Controladorproducto();
              $crearobjeto ->CtrCrearobjeto();
                       ?>
      </form>
    </div>
  </div>
  <!-- /.modal-dialog -->
</div>



<!-- CLASE MODAL EDITAR PRODUCTO COMIDA-->
<div class="modal modal-info fade" id="modalEditarProducto" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!-- cabeza del modal-->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title"> Producto</h4>

        </div>
        <!-- cuerpo del modal -->
        <div class="modal-body">

          <div class="box-body">
    
<!-- Subir foto de producto-->
<h4 class="modal-title">Subir Foto De Producto</h4>
            <h4></h4>
           <div class="form-group">  
              <input type="file" class="nuevafotoP" >
              <p class="help-block">Peso maximo de una Foto es de 2MB</p>
              <img src="Views/img/productos/defaultp/anonymous.png" class="img-thumbnail previsualizar1" width="100px" 
              name="editarfotoP" id="editarfotoP"
                </div> 
<!-- nombre -->
<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"> </i></span>
                <input type="text" class="form-control input-lg" style="color: black" name="editarnombreprod" id="editarnombreprod"  required>
                <input type="hidden" name="Cod_productoA" id="Cod_productoA">

              </div>
            </div>
            
<!-- Stock cantidad-->           
<div class="form-group">  
 <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-slack"> </i></span>
 <input type="text" class="form-control input-lg"  style="color: black" name="editarCantidad" id="editarCantidad" required>
   </div>
</div>
<!-- Proveedor-->                                                                     
<div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-truck"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="editarProveedor" id="editarProveedor" value="Ingresar proveedor" required>
                            <input type="hidden" name="Id_StockA" id="Id_StockA">
                          </div>
                        </div>

 <!-- Fecha_ultima compra -->       
 <div class="form-group">  
                      <div class="input-group">
                          <h4 class="modal-title">  Ultima Compra  </h4>                                           
                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"> </i></span>

                    <input type="text" class="form-control "  id="editarultimacom" name="editarultimacom" value="2019-03-21" data-datepicker-color="primary" >
                
                    </div>   
                </div>
                 <!-- PRECIO compra-->           
 <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-usd"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="editarprecioC" id="editarprecioC" value="Ingresar Precio Compra" required>
                          </div>
                        </div>

 <!-- PRECIO venta-->           
 <div class="form-group">  
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-usd"> </i></span>
                            <input type="text" class="form-control input-lg"  style="color: black" name="editarprecio" id="editarprecio" value="Ingresar Precio Venta" required>
                          </div>
                        </div>



<!-- Tipo  -->
<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa  fa-text-width"> </i></span>
                <select class="form-control input-lg" name="Nuevotipo"
                id="Nuevotipo">
                  <option value=" Seleccionar un Tipo ">Seleccionar un Tipo</option>
                  <option value=" Bebidas">Bebidas</option>
                  <option value=" Sandwiches">Sandwiches</option>
                  <option value=" Sopas ">Sopas</option>
                  <option value=" Comidas ">Comidas</option>
                  <option value=" Paste les y Tortas ">Pasteles y Tortas</option>
                </select>`
              </div>
            </div>
           
<!-- carateristicas e ingredientes  -->
                <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-folder"> </i></span>
                                <textarea type="text" class="form-control input-lg" name="editaringredientes" id="editaringredientes" style="color: black" rows="3" placeholder="Ingrese ingredientes y proteinas con caracteriticas"></textarea>
                            </div>
                  </div>
          </div>

        </div>
        <!-- /.pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn 
                            btn-outline pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-outline" name='enviar'>Modificar Producto</button>
        </div>
        <?php
         $borrarproducto = new Controladorproducto();
         $borrarproducto -> ctrBorrarProducto();

         $borrarobjeto = new Controladorproducto();
         $borrarproducto -> ctrBorrarObjeto();

         $editarproducto = new Controladorproducto();
         $editarproducto -> ctrEditarProducto();
        ?>
      </form>
    </div>
  </div>
  <!-- /.modal-dialog -->
</div>

