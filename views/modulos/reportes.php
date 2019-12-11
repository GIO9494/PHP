<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Reportes de ventas
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Reportes de ventas</li>
    </ol>
  </section>
  <!-- Main content -->
  <div class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Title</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">

        <body class="hold-transition skin-blue sidebar-mini">
          <div class="wrapper">

            <!-- Main content -->
            <div class="row">
              <div class="col-md-3">                          
                <form id="registroVentas" method="POST" action="index.php?ruta=crearventa&idProductos="+idProductos+"&cantProductos="+cantProductos;" onsubmit="return terminarCompra()" >

                  <!-- Profile Image -->
                  <div class="box box-primary">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="views/img/usuarios/evy/106.jpg" alt="User profile picture">

                      <h3 class="profile-username text-center">Ana Pereira Gomez</h3>

                      <p class="text-muted text-center">Cliente</p>

                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                          <b>Cuenta</b> <a class="pull-right">1</a>
                        </li>
                        <li class="list-group-item">

                        </li>
                        <li class="list-group-item">
                          <b>Total Productos</b> <a class="pull-right">6</a>
                        </li>
                        <li class="list-group-item">
                          <b>Total:</b> <a class="pull-right" id="total_costos">0</a>
                        </li>
                      </ul>                                     
                      <input type="text" id="idProductos" name="idProductos" value="idProductos" hidden>
                      <input type="text" id="cantProductos" name="cantProductos" value="cantProductos" hidden>
                      

                      <input type="submit" class="btn btn-primary btn-block">
                    </div>
                    <!-- /.box-body -->
                  </div>
                </form>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Carrito de Compras</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Venta</strong>

                    <p class="text-muted">
                      Los productos en venta son :
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicacion</strong>

                    <p class="text-muted">La Paz Prado</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Productos</strong>

                    <p>
                      <span class="label label-danger">Bebidas</span>
                      <span class="label label-success">sandwiches</span>
                      <span class="label label-info">Pasteles</span>
                      <span class="label label-warning">Comidas</span>
                      <span class="label label-primary">Sopas</span>


                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Piscina</strong>

                    <p>El Dorado sin agua no hay divercion :3</p>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>



              <!-- /.col -->
              <div class="col-md-9">
                <div class="nav-tabs-custom">

                  <ul class="nav nav-pills " id="pills-tab" role="tablist">
                    <li class="nav-item  active">
                      <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">PRODUCTOS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">OBJETOS DE LA PISCINA</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <!-- /.post -----------------------------------------------------------------                               - -->
                    <div class="tab-pane active in" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" style="background: #3c8dbc ">

                      <marquee behavior="" direction="pull-right"> PRODUCTOS </marquee>

                      <div class="box-body">
                        <?php
                        $item = null;

                        $valor = null;
                        $comida = Controladorproducto::ctrMostrarcomida($item, $valor);


                        $sql = "select Nombre, Ap_pterno,Ap_Materno, Ci maximo from stock";

                        $stmt1 = Conexion::conectar()->prepare($sql);
                        $resultado = $stmt1->execute();

                        $i = 51;
                        foreach ($comida as $key => $value) {

                          ?>
                          <section class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card" style="background: skyblue">
                              <?php
                                if ($value["FotoCo"] != " ") {
                                  ?>
                                <div class="view overlay"> <img class="card-img-top img-responsive img-rounded" src="<?php echo $value["FotoCo"]; ?>" alt="Card image cap"></div> ;
                              <?php
                                } else {
                                  ?>
                                <div class="view overlay"><img src="views/img/productos/defaultp/anonymous.png class=" img-thumbnail" width="100px"></div>
                              <?php
                                }
                                ?>

                              <div class="card-body">

                                <h1 class="font-weight-bold card-title"><i class="fa fa-cutlery"></i><span class="label label-success"><?php echo $value["Nom_Prod"]; ?></span></h1>
                                <table>
                                  <h1 class="font-weight-bold card-title">
                                    <tr>
                                      <td>
                                        <h4><span class="label label-info"> CANTIDAD :</h4></span>
                                      </td>
                                      <td>
                                        <h4>
                                          <center><b> <?php echo $value["Cantidad"]; ?></b></center>
                                        </h4>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h4> <span class="label label-primary"> PRECIO <br> DE VENTA :</span></h4>
                                      </td>
                                      <td>
                                        <h4>
                                          <center><b><?php echo $value["Precio_Venta"]; ?></b></center>
                                        </h4>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h4><span class="label label-warning"> INGREDIENTES Y <br> CARACTERISTICAS :</h4></span>
                                      </td>
                                      <td>
                                        <h4>
                                          <center><b> <?php echo $value["Ingredientes"] ?></b></center>
                                        </h4>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <center>

                                          <button onclick="disminuir(<?php echo  $value['Cod_producto']; ?>,<?php echo $value['Precio_Venta']; ?>,<?php echo $i; ?>)">-</button>
                                          <button onclick="aumentar(<?php echo  $value['Cod_producto']; ?>,<?php echo $value['Precio_Venta']; ?>,<?php echo $i; ?>)">+</button>



                                          <p id="<?php echo  $value['Cod_producto']; ?>">0</p>

                                          <p id="<?php echo $i; ?>">0</p>
                                          <?php
                                            $i++;
                                            ?>


                                        </center>
                                      </td>
                                    </tr>


                                  </h1>
                                </table>
                              </div>
                            </div>
                          </section>
                        <?php

                        }
                        ?>
                      </div>

                    </div>
                    <!-- /.tab-content -->


                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" style="background: skyblue">

                      <marquee behavior="" direction="pull-right"> OBJETOS PISCINAS </marquee>

                      <div class="box-body">
                        <?php
                        $item = null;
                        $valor = null;
                        $codigo = null;
                        $objeto = Controladorproducto::ctrMostrarobjeto($item, $valor);
                        foreach ($objeto as $key => $value) {
                          ?>
                          <section class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card" style="background: #FFFFFF">
                              <?php
                                if ($value["FotoO"] != " ") {
                                  ?>
                                <div class="view overlay"> <img class="card-img-top img-responsive img-rounded" src="<?php echo $value["FotoO"]; ?>" alt="Card image cap"></div> ;
                              <?php
                                } else {
                                  ?>
                                <div class="view overlay"><img src="Views/img/objetos_piscina/defaulto/product.png class=" img-thumbnail" width="100px"></div>
                              <?php
                                }
                                ?>



                              <div class="card-body">
                                <h1 class="font-weight-bold card-title"><i class="fa fa-tags"></i><span class="label label-danger"> <?php echo $value["Nom_Prod"]; ?></span></h1>
                                <table>

                                  <h4 class="font-weight-bold card-title">
                                    <tr>
                                      <td>
                                        <h4> <span class="label label-warning">CANTIDAD :</span></h4>
                                      </td>
                                      <td>
                                        <center> <?php echo $value["Cantidad"]; ?></center>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <h4><span class="label label-info"> PRECIO <br> DE VENTA :</span></h4>
                                      </td>
                                      <td>
                                        <center>
                                          <h4><?php echo $value["Precio_Venta"]; ?></h4>
                                        </center>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h4><span class="label label-primary"> PRECIO <br> DE FLETE :</span></h4>
                                      </td>
                                      <td>
                                        <center>
                                          <h4><?php echo $value["Costo_Flete"]; ?></h4>
                                        </center>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h4><span class="label label-info">TALLA :</span></h4>
                                      </td>
                                      <td>
                                        <center>
                                          <h4><?php echo  $value["Talla"]; ?></h4>
                                        </center>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h4> <span class="label label-primary">COLOR :</span></h4>
                                      </td>
                                      <td>
                                        <center>
                                          <h4><?php echo  $value["Color"]; ?></h4>
                                        </center>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h4><span class="label label-info"> MARCA :</span></h4>
                                      </td>
                                      <td>
                                        <center>
                                          <h4><?php echo $value["Marca"] ?></h4>
                                        </center>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <center>


                                          <button onclick="aumentar(<?php echo  $value['Cod_producto']; ?>)">+</button>
                                          <button onclick="disminuir(<?php echo  $value['Cod_producto']; ?>)">-</button>

                                          <p id="<?php echo  $value['Cod_producto']; ?>">0 </p>



                                        </center>
                                      </td>
                                    </tr>

                                  </h4>

                                </table>
                              </div>
                            </div>
                          </section>
                        <?php
                        }
                        ?>


                      </div>

                    </div>
                  </div>
                  <!-- /.col -->
                </div>
              </div>
              <!-- /.content -->
            </div>
            <!-- ./wrapper -->
          </div>
      </div>
    </div>