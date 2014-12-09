
<?php
	include('scripts/conexion.php');
	$nro_vuelo = $_REQUEST['codigo'];
	session_start();
	$_SESSION['nro_vuelo'] = $nro_vuelo;
	$consulta = "select * from vista_vuelos where nro_vuelo = '{$_SESSION['nro_vuelo']}'";
	$resultado = sqlsrv_query($conexion,$consulta);
	while ($linea = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
		$cod_vuelo = $linea['cod_vuelo'];
		$nro_vuelo = $linea['nro_vuelo'];
		$horario_partida = $linea['horario_partida'];
		$horario_llegada = $linea['horario_llegada'];
		$ciudad_origen = $linea['ciudad_origen'];
		$ciudad_destino = $linea['ciudad_destino'];

	}
?>
<!DOCTYPE html>
<html lang="es">
		<head>
		<title>Reservas</title>
		<meta charset="utf-8"> 
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/starter-template.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
<style>
     .footer{
    background: #000000;
  }

		td,th,tr,table{
		text-align: left;
		border: none;
	}

	table{
		margin: 10px;
	}

	.botones{
		padding: 10px;
		margin: 10px;
	}

	td{
		padding: 5px;
	}
</style> 
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="img/logo.png" width="70" height="30" alt=""></a>
          <a class="navbar-brand" href="#">Agencia de viajes</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
 
            <li><a href="ayuda.php">Ayuda</a></li>
          </ul>
           <ul class="nav navbar-nav navbar-right">
              <li><a href="">Iniciar sesion</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list"><b class="caret"></b></a>
              <ul class="dropdown-menu">
              </ul>
              </li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<div class="cabecera">
		<img class="logo" src="img/logo.png" width="250" height="130" alt="">
 
  </div>
	<div class="separacion"></div>
	<div class="cuerpo">
		<h1>Reservar Pasaje</h1>
			<form action="detalles_reserva.php" method="GET">
				<table width=800px>
					<tr>
						<td>
							<strong>Código del Vuelo : </strong> 	
						</td>	
						<td>
							<?php echo $cod_vuelo ?>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Número del vuelo : </strong> 

						</td>
						<td>
							<?php echo $nro_vuelo ?>	
						</td>
					</tr>
					<tr>
						<td>
							<strong>Horario de Partida : </strong>
						</td>
						<td>
							 <?php echo $horario_partida?>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Horario de Llegada : </strong> 
						</td>
						<td>
							<?php echo $horario_llegada?>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Ciudad de Origen : </strong>
						</td>
						<td>
							 <?php echo $ciudad_origen?>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Ciudad de Destino : </strong> 
						</td>
						<td>
							<?php echo $ciudad_destino; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label for="nro_pasajes">Número de Pasajeros : </label>
						</td>
					</tr>
					<tr>
						<td>
							<input class="btn btn-primary" type="button" value="Regresar">
							<input class="btn btn-primary" type="submit" value="Siguiente">
							 
						</td>
					</tr>	
				</table>
			</form>
						</div>
			<footer class="footer"><div class="container"><p class=" ">Derechos reservados - 2014</p></div></footer>
	</body>
</html>

