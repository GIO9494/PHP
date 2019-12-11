
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Estadisticas de Productos</title>

		<style type="text/css">

		</style>
	</head>
	<body>
<script src="../modulos/High/code/highcharts.js"></script>
<script src="../modulos/High/code/modules/exporting.js"></script>
<script src="../modulos/High/code/modules/export-data.js"></script>

<div id="container" style="min-width: 100px; height: 300px; margin: 10 auto">

		<script type="text/javascript">

<?php
require 'conexion.php';
?>
Highcharts.chart('container', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Tabla Estadistica'
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
        categories: [
        <?php require 'conexion.php';
        $sql="SELECT p.Nom_Prod,s.Cantidad from producto p,stock s
            where p.id_Stock=s.Id_Stock";
        $resultado=mysqli_query($con,$sql);
        while($registro=mysqli_fetch_array($resultado)){ 
        ?>
           '<?php echo utf8_decode($registro["Nom_Prod"])?>',  
        <?php
        }
        ?> 
        ],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
            color: 'rgba(68, 170, 213, .2)'
        }]
    },
    yAxis: {
        title: {
            text: 'Cantidad de productos'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' units'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'Stock',
        data: [
        <?php require 'conexion.php';
        $sql="SELECT p.Nom_Prod,s.Cantidad from producto p,stock s
            where p.id_Stock=s.Id_Stock";
        $resultado=mysqli_query($con,$sql);
        while($registro=mysqli_fetch_array($resultado)){ 
        ?>
           <?php echo $registro["Cantidad"]?>,  
        <?php
        }
        ?>]
    }]
}); 
		</script>
        </div>
	</body>
</html>
