<?php
require_once "conexion.php";
include 'Reporte.php';

function actual_date()  
{  
	date_default_timezone_set("America/La_Paz");
	$week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
	$months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
	$year_now = date ("Y");  
	$month_now = date ("n");  
	$day_now = date ("j");  
	$week_day_now = date ("w");  
	$date = $week_days[$week_day_now] . ",     " . $day_now . "     de     " . $months[$month_now] . "     de     " . $year_now;   
	return $date;    
}  
	
/*-------------------------------------------------------------------------------------------------------------------
	//Obtenemos la variable carnet por session 
	session_start();
	$carnet=$_SESSION["carnet"];
	
	$conect = new mysqli($serv,$user,$pw,$bd);
	if (!$conect) 
	{      die("Conección fallida " . mysqli_connect_error());}
	//else
    //     echo "Conección con la Base de datos";
	//$query="SELECT * FROM estudiantes";
	$query="SELECT Ap , Nom, Ci, Pro FROM estudiantes where Ci =".$carnet;
	$resultado = mysqli_query($conect, $query);
	
	$query0="SELECT p.programa, p.version, p.costo 
	FROM estudiantes e, programa p
	where  e.Codpro = p.codigo AND e.Ci=".$carnet;
	$resultado0 = mysqli_query($conect, $query0);

	$query1 = "SELECT gestion, nro, concepto, monto, fec, fecpag, factura
	FROM pagos 
	where cod=".$carnet;
	$resultado1=mysqli_query($conect,$query1);
		
	$query2="SELECT count(factura) as cantidad 
	FROM pagos
	where  (cod=".$carnet.") AND (factura != 0)";
	$resultado2 = mysqli_query($conect, $query2);
	$row = $resultado2->fetch_assoc();
	$cant_pagos = $row['cantidad'];
	
	$query3="SELECT sum(monto) as sumatoria
	FROM pagos
	where  (cod=".$carnet.") AND (factura != 0)";
	$resultado3 = mysqli_query($conect, $query3);
	$row = $resultado3->fetch_assoc();
	$monto_pagado = $row['sumatoria'];
	
*/

$stmt = Conexion::conectar()->prepare("SELECT * FROM cuenta ");
            $stmt->execute();
            $reportee = $stmt -> fetchAll();

// DEFINIMOS EL TAMAÑO DE LA HOJA Y LOS MÁRGENES IZQUIERDO Y SUPERIOR
$pdf = new PDF('P','mm','Letter');
//$pdf = new PDF('P','mm',array(100,150));  //Tamaño Personalizado
//$pdf=new PDF(); //por defecto A4

//La siguiente linea establece los márgenes izquierdo y superior
$pdf->SetMargins(20,10);
$pdf->SetRightMargin(15);

$pdf->AliasNbPages();
$pdf->AddPage();

/*
$pdf->Setfont('Times','',20);
//$pdf->SetFillColor(232,232,232);
$pdf->Cell(190, 6,'DIPLOMADOS Y MAESTRIAS',0,0,'C',0);
//$pdf->Cell(20,6,$carnet,0,0,'C',0);
$pdf->Ln(10);
*/

$pdf->Cell(25);
$pdf->Setfont('Times','',22);

/*
while($row=$resultado0->fetch_assoc()){
	//$pdf->Cell(40, 6,'PROGRAMA: ',0,0,'L',0);
	$pdf->Cell(145,6,$row['programa'],0,0,'L');	
	//$pdf->Cell(5, 6,'VER:  ',0,0,'L',0);
	$pdf->Cell(5,6,$row['version'],0,0,'L');
	$precio=$row['costo'];
	$pdf->Ln(20);
}
*/


$pdf->Line(20,56,200,56);
$pdf->Ln(5);
//$pdf->Line(20,70,200,70);

$pdf->Ln(5);
$pdf->SetFillColor(232,232,232);
$pdf->Setfont('Times','',12);

$pdf->Cell(15, 6,'ID',1,0,'C',1);
$pdf->Cell(40, 6,'CUENTA',1,0,'C',1);
$pdf->Cell(50, 6,'E-MAIL',1,0,'C',1);
$pdf->Cell(15, 6,'EST',1,0,'C',1);
//$pdf->Ln(15);
$pdf->Cell(45, 6,'ULTIMO INGRESO',1,0,'C',1);
$pdf->Cell(15, 6,'ID PER',1,0,'C',1);

$pdf->Ln(10);

//	$pdf->Cell(20,6,'hola',0,0,'L');
$pdf->Setfont('Times','',10);


foreach ($reportee as $row => $value) {

	$pdf->Cell(15,6,$value['Id_Usuario'],1,0,'C');
	$pdf->Cell(40,6,$value['nombre_Cuenta'],1,0,'C');	
	//$pdf->Cell(110);
	//$pdf->SetXY(120,($pdf->GetY()-6));
	$pdf->Cell(50,6,$value['email'],1,0,'C');
	$pdf->Cell(15,6,$value['estado'],1,0,'C');
	$pdf->Cell(45,6,$value['ultimo_login'],1,0,'C');
	$pdf->Cell(15,6,$value['Id_persona'],1,0,'C');
	$pdf->Ln();
}






/*
while($row=$reportee->fetch_assoc())
{
	$pdf->Cell(10,6,$row['Id_Usuario'],1,0,'C');
	$pdf->Cell(30,6,$row['nombre_Cuenta'],1,0,'C');	
	//$pdf->Cell(110);
	//$pdf->SetXY(120,($pdf->GetY()-6));
	$pdf->Cell(25,6,$row['email'],1,0,'L');
	$pdf->Cell(10,6,$row['estado'],1,0,'C');
	//$pdf->Cell(27,6,$row['foto'],1,0,'C');
	$pdf->Cell(20,6,$row['Id_persona'],1,0,'C');
	$pdf->Ln();
}





	//$pdf->Cell(0,6,'-----------------------------------------------------------------------oOo-----------------------------------------------------------------',0,0,'C');
	$pdf->Setfont('Helvetica','',10);
	$pdf->Ln(6);	
	$pdf->Cell(80);
	$pdf->Cell(50,6,'Costo Total del Programa  :  '.$precio,0,2,'L');
	$pdf->Cell(50,6,'Cuotas Pagadas  :  '.$cant_pagos,0,2,'L');
	$pdf->Cell(50,6,'Total Pagado  :  '.$monto_pagado,0,2,'L');
	$pdf->Cell(50,6,'Saldo por Pagar  :  '.($precio-$monto_pagado),0,2,'L');	

*/	
	$pdf->Setfont('Times','',10);
	$pdf->Ln(10);	
	$fecha = actual_date();  //strftime("%A, %d de %B de %Y");		
	$pdf->Cell(0,6,$fecha,0,0,'R');

$pdf->Output();
//$pdf->Output('F','Reporte.pdf');

?>