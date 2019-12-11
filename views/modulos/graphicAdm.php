<?php
/* 
  // REPASAR ACCESO A DATOS PDO
  $user = 'root'; $pass = '****'; 
  $host = 'localhost'; 
  $db = 'db'; 
  $config = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
  try
  {
      $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass, $config);
  }
  catch(PDOException $e)
  {
      echo $e -> getMessage();
  }
    
  // realizamos la consulta para obtener el mayor id insertado
  $sql = "SELECT campo_id, campo_name FROM tabla ORDER BY campo_id DESC LIMIT 5";
  $query = $conn->prepare($sql);
  $query->execute();
  $row = $query->fetch();
  
  // imprimimos los 5 valores obtenidos
  do {
    echo $row['campo_id'].' - '.$row['campo_name'].'<br>';
  } while ($rows = $query->fetch());
*/

		//$tabla = "cuenta";
			$item = "Id_Usuario";
			$valor = '1';
			$grap = Controlador_graphics::ctr_graphics($item, $valor);			
			$conectar = Conexion::conectar();
			$sql = "";  //ORDER BY campo_id DESC LIMIT 5";
			$query = $conectar->prepare($sql);
			$query->execute();
			$row = $query->fetch();			
			do {
				//echo $grap['nombre_Cuenta'].' - '.$grap['perfil'].'<br>';
				$nombre=$grap['nombre_Cuenta'];
			  } while ($grap = $query->fetch());
//------------------------------------------------
			$item11 = null;
			$valor11 = null;
			$grap11 = Controlador_graphics::ctr_graphics1($item11, $valor11);
			do {
				$c_tot = (int)$grap11["cantiperfil"]; //['cantiperfil'].'<br>';
				//$nombre=$grap1['nombre_Cuenta'];
			} while ($grap11 = $query->fetch());
			//echo $c_tot;

//------------------------------------------------
			$item1 = "perfil";
			$valor1 = "Administracion";
			$grap1 = Controlador_graphics::ctr_graphics1($item1, $valor1);
			do {
				$c_adm = (int)$grap1["cantiperfil"];//['cantiperfil'].'<br>';
				//$nombre=$grap1['nombre_Cuenta'];
			} while ($grap1 = $query->fetch());
			//echo $c_adm;
//-------------------------------------------------
			$valor2 = "Recepcion";
			$grap2 = Controlador_graphics::ctr_graphics1($item1, $valor2);
			do {
				$c_rec = (int)$grap2["cantiperfil"];//['cantiperfil'].'<br>';
				//$nombre=$grap1['nombre_Cuenta'];
			} while ($grap2 = $query->fetch());
			//echo $c_rec;
//-------------------------------------------------
			$valor3 = "Ventas";
			$grap3 = Controlador_graphics::ctr_graphics1($item1, $valor3);
			do {
				$c_ven = (int)$grap3["cantiperfil"];//['cantiperfil'].'<br>';
				//$nombre=$grap1['nombre_Cuenta'];
			} while ($grap3 = $query->fetch());
			//echo $c_ven;

			

?>
<!-- <hr>  -->


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="views/modulos/code/highcharts.js"></script>
<script src="views/modulos/code/exporting.js"></script>
<script src="views/modulos/code/export-data.js"></script>

<link rel="stylesheet" href="views/modulos/admincss/bootstrap_adm.css">
	<div class="container container-content">
	<div class="col-md-12 col-xs-12 no_right">
		<div class="row">
		<div class="col-md-6 col-xs-12">

			<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

			<script type="text/javascript">
			tot = "<?php echo $c_tot; ?>";
			aa = <?php echo $c_adm; ?>;
			bb = <?php echo $c_rec; ?>;
			cc = <?php echo $c_ven; ?>;
			aaa = (aa * 100)/tot;
			bbb = (bb * 100)/tot;
			ccc = (cc * 100)/tot;
			
			// Build the chart
			Highcharts.chart('container', {
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'PORCENTAJE DE EMPLEADOS POR AREA, 2019'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false
						},
						showInLegend: true
					}
				},
				series: [{
					name: 'Empleados',
					colorByPoint: true,
					data: [{
						color: 'rgba(0, 139, 139, 1)',
						name: 'Administración',
						//y: 61.41,
						y: aaa,
						sliced: true,
						selected: true
					}, {
						color: 'rgba(220, 20, 60, 1)',
						name: 'Recepción',
						//y: 11.84
						y: bbb
					}, {
						color: 'rgba(70, 130, 180, 1)',
						name: 'Ventas',
						//y: 10.85
						y: ccc
					}  /*, {
						name: 'Edge',
						y: 4.67
					}, {
						name: 'Safari',
						y: 4.18
					}, {
						name: 'Other',
						y: 7.05
					} */]
				}]
			});
			</script>

		</div>

		<div class="col-md-6 col-xs-12 no_right">
		
		<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

			<script type="text/javascript">

			nom="<?php echo $nombre; ?>";
			a = <?php echo $c_adm; ?>;
			b = <?php echo $c_rec; ?>;
			c = <?php echo $c_ven; ?>;

			Highcharts.chart('container1', {
				chart: {
					type: 'areaspline'
				},
				title: {
					text: 'CANTIDAD DE EMPLEADOS POR AREA'
				},
				legend: {
					layout: 'vertical',
					align: 'left',
					verticalAlign: 'top',
					x: 150,
					y: 100,
					floating: true,
					borderWidth: 1,
					backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
				},
				xAxis: {
					categories: 
					[
						'Administracion',
						'Recepcion',
						'Ventas'	
					],
					
					plotBands: [{ // visualize the weekend
						from: 4.5,
						to: 6.5,
						color: 'rgba(68, 170, 213, .2)'
					}]
				},
				yAxis: {
					title: {
						text: 'E M P L E A D O S'
					}
				},
				tooltip: {
					shared: true,
					valueSuffix: '  Empleados'
				},
				credits: {
					enabled: false
				},
				plotOptions: {
					areaspline: {

						color: 'rgba(218, 165, 32, 1)',
						fillOpacity: 0.4
					}
				},
				series: [{
					name: "", //'John',
					data: [a, b, c]
				}/*, {
					name: 'Jane',
					data: [1, 3, 4]
				}*/]
			});
			</script>
	
		
		</div>		
		
	</div>
  </div>
</div>


