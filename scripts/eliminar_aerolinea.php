<?php	
	include("conexion.php");
	$ruc = $_GET['RUC'];
	$consulta = "DELETE FROM aerolinea WHERE RUC='{$ruc}'";
	sqlsrv_query($conexion,$consulta) or 
				die('No se pudo ejecutar la consulta');
	header('Location:../aerolineas.php');
?>