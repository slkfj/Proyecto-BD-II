<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reservas disponibles</title>
 
	   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
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
          <a class="navbar-brand" href="#">Agencia de viajes</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index1.php">Inicio</a></li>
 
            <li><a href="ayuda.php">Ayuda</a></li>
          </ul>
           <ul class="nav navbar-nav navbar-right">
 
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
	<div class="buscador">
	<form action="busqueda_vuelo.php" method="POST">
		<div class="datos">
			<label for="">Ciudad de origen:</label><br>
			<label for="">Ciudad de destino:</label><br>
			<label for="">Fecha de partida :</label>
		</div>
		<div class="datos_vuelo">
			<input type="text" name="ciudado">	<br>
			<input type="text" name="ciudadd"><br>
			<input type="date" name="fecha">
		</div>
		<input class="button" type="submit" value="Buscar">
	 </form>
	 </div>
</body>
<footer>Derechos reservados - 2014s</footer>
</html>