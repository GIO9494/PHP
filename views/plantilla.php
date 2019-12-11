<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta http-equiv="X-UA-Compatible">
  
  <title>POOL SYSTEM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="icon" href="views/img/plantilla/logote.png">
   <!-- Plugins Plugins de ccs-->
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
   
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins. -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  
  <!-- date ranguer picker 
  <link rel="stylesheet" href="views/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
-->

  
  <!-- Plugins ***************Plugins de java script********-->
  <!-- jQuery 3 -->
     <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
     <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="views/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="views/dist/js/adminlte.min.js"></script>
    <script src="../../dist/js/demo.js"></script>

    <script src="views/modulos/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datep+icker -->
      <script src="views/modulos/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- DataTables -->
    <script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!-- date ranger picker-->
  <script src="views/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- 
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
-->

  
      

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

     

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
     
  <!-- SweetAlert 2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>

</head>
 <!-- CUERPO DEL DOCUMENTO -->
<body class="hold-transition  skin-yellow-light jean1 sidebar-mini  index-page sidebar-collapse margin" >
<!-- Site wrapper-->

<?php
if (isset ($_SESSION["iniciarSesion"])&& $_SESSION["iniciarSesion"]== "ok") 
{             
	echo '<div class="wrapper">';
	/*cabezote */
	include "modulos/cabezote.php";
	/*menu */
	if($_SESSION["perfil"] == "Administracion")
	{
		include "modulos/menu.php";
		//include "modulos/inicio.php";
	}
	if($_SESSION["perfil"] == "Recepcion")
	{
		include "modulos/menu2.php";
		//include "modulos/inicio.php";
	}
	if($_SESSION["perfil"] == "Ventas")
	{
		include "modulos/menu3.php";
		//include "modulos/inicio.php";
	}
	//include "modulos/menu.php";
	/*contenido  $_GET["ruta"]== "menu"||
			$_GET["ruta"]== "menu2"||
			$_GET["ruta"]== "menu3"||*/ 		  
	if (isset ($_GET["ruta"])) 
	{
		if (
			$_GET["ruta"]== "inicio"||
			$_GET["ruta"]== "inicio2"||
			$_GET["ruta"]== "inicio3"||
			$_GET["ruta"]== "usuarios"||
			$_GET["ruta"]== "categorias"|| 
			$_GET["ruta"]== "instructores"|| 
			$_GET["ruta"]== "clientes"|| 
			$_GET["ruta"]== "ventas"|| 
			$_GET["ruta"]== "Crear_venta"|| 
			$_GET["ruta"]== "reportes" ||
			$_GET["ruta"]== "productos" ||
			$_GET["ruta"]== "salir") 
		{
			
			if($_SESSION["perfil"] == "Administracion")
			{
				include "modulos/menu.php";
				//include "modulos/inicio.php";
			}
			if($_SESSION["perfil"] == "Recepcion")
			{
				include "modulos/menu2.php";
				//include "modulos/inicio.php";
			}
			if($_SESSION["perfil"] == "Ventas")
			{
				include "modulos/menu3.php";
				//include "modulos/inicio.php";
			}
			//echo $_SESSION["Id_Usuario"];
			//include "modulos/menu.php";
			include "modulos/".$_GET["ruta"].".php";
		}
		
		else 
		{			
			if($_SESSION["perfil"] == "Administracion")
			{
				//include "modulos/menu.php";
				include "modulos/inicio.php";
			}
			if($_SESSION["perfil"] == "Recepcion")
			{
				//include "modulos/menu2.php";
				include "modulos/inicio2.php";
			}
			if($_SESSION["perfil"] == "Ventas")
			{
				//include "modulos/menu3.php";
				include "modulos/inicio3.php";
			}
		} 
	}
	include "modulos/footer.php";
	echo  '</div>';
}
else
{
	include_once "modulos/login.php";
}
  ?>
<!-- ./wrapper -->
<script src="views/js/plantilla.js">  </script> 
<script src="views/js/usuarios.js">  </script>
<script src="views/js/cursos.js">  </script> 
<script src="views/js/instructor.js">  </script> 
<script src="views/js/objeto.js">  </script> 
<script src="views/js/productos.js">  </script> 
<script>
  var t=0;
  function aumentar(con,p,i,t){
    var cant =(parseFloat($('#'+con).text())+1);
    t= cant*p;
    $('#'+con).text(cant);
    $('#'+i).text(t);
    calcular_costo();
  }
  
  function disminuir(con,p){
    if (parseFloat($('#'+con).text()) > 0 ) {
      var cant =(parseFloat($('#'+con).text())-1);
      t= cant*p;
      $('#'+con).text(cant);
      $('#'+p).text(t);
    }
  }

  function total(con,p){
    $('#'+con).text((parseFloat($('#'+con).text())+1)*p);
  }

  function calcular_costo(){
    var aux =0;
    for(var i =51;i<=55;i++){
      aux = aux + parseFloat($('#'+i).text());
    }
    $('#total_costos').text(aux);
  }
  
</script>

</body>
</html>
