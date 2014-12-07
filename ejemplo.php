	
<?php
	require('scripts/fpdf.php');


	class PDF extends FPDF
	{
		// Cabecera de página
		function Header()
		{
		    // Logo
		    $this->Image('img/logo.png',10,8,33);
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Movernos a la derecha
		    $this->Cell(80);
		    // Título
		    $this->Cell(30,10,'Registro de pasajeros',0,1,'C');
		    // Salto de línea
		    $this->Ln(20);
		}

	 
	 

		// Tabla simple
		function BasicTable($header, $data)
		{
		    // Cabecera
		    foreach($header as $col)
		        $this->Cell(40,7,$col,1);
		    $this->Ln();

		    while ($linea=sqlsrv_fetch_array($data,SQLSRV_FETCH_NUMERIC)) {
		    	foreach ($linea as $row) {     		
			    	$this->Cell(40,6,$row,1);
		    	}
				$this->Ln();
		    }
		}


		// Una tabla más completa
		function ImprovedTable($header, $data)
		{
		    // Anchuras de las columnas
		    $w = array(25, 25, 30, 30,30,20,20);
		    // Cabeceras
		    for($i=0;$i<count($header);$i++)
		        $this->Cell($w[$i],7,$header[$i],1,0,'C');
		    $this->Ln();
		    // Datos
		    while($linea=sqlsrv_fetch_array($data,SQLSRV_FETCH_NUMERIC))
		    {
		    	 
			        $this->Cell($w[0],6,$linea[0],'LR');
			        $this->Cell($w[1],6,$linea[1],'LR');
			        $this->Cell($w[2],6,$linea[2],'LR',0,'R');
			        $this->Cell($w[3],6,$linea[3],'LR',0,'R');
			        $this->Cell($w[4],6,$linea[4],'LR');
			        $this->Cell($w[5],6,$linea[5],'LR');
			        $this->Cell($w[6],6,$linea[6],'LR');
	 
			        $this->Ln();
			     
		    }
			    
		    // Línea de cierre
		    $this->Cell(array_sum($w),0,'','T');
		}

		// Tabla coloreada
		function FancyTable($header, $data)
		{
		    // Colores, ancho de línea y fuente en negrita
		    $this->SetFillColor(25,67,0);
		    $this->SetTextColor(255);
		    $this->SetDrawColor(75,0,0);
		    $this->SetLineWidth(.1);
		    $this->SetFont('','B','10');
		    // Cabecera
		    $w = array(25, 25, 30, 30,20,40,20);
		    for($i=0;$i<count($header);$i++)
		        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		    $this->Ln();
		    // Restauración de colores y fuentes
		    $this->SetFillColor(224,235,255);
		    $this->SetTextColor(0);
		    $this->SetFont('');
		    // Datos
		    $fill = false;
	 

		    while($linea=sqlsrv_fetch_array($data,SQLSRV_FETCH_NUMERIC))
		    {
		    	 
			        $this->Cell($w[0],6,$linea[0],'LR',0,'C',$fill);
			        $this->Cell($w[1],6,$linea[1],'LR',0,'C',$fill);
			        $this->Cell($w[2],6,$linea[2],'LR',0,'C',$fill);
			        $this->Cell($w[3],6,$linea[3],'LR',0,'C',$fill);
			        $this->Cell($w[4],6,$linea[4],'LR',0,'C',$fill);
			        $this->Cell($w[5],6,$linea[5],'LR',0,'C',$fill);
			        $this->Cell($w[6],6,$linea[6],'LR',0,'C',$fill);
			        $this->Ln();
		    }
			    
		    // Línea de cierre
		    $this->Cell(array_sum($w),0,'','T');
		}

		// Pie de página
		function Footer()
		{
		    // Posición: a 1,5 cm del final
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Número de página
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}

	include("scripts/conexion.php");

	$query = "SELECT * FROM registro_pasajero";

	$resultado = sqlsrv_query($conexion,$query);


	$pdf = new PDF();
	// Títulos de las columnas
	$header = array('Codigo', 'Nombre', 'Apellido P.', 'Apellido M.','Edad','Email','Sexo	');
	 
	$pdf->AliasNbPages();
	$pdf->SetFont('Arial','',12);
	$pdf->AddPage();
	$pdf->FancyTable($header,$resultado);
	$pdf->Output();
?>