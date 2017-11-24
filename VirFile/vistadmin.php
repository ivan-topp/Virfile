<?php
	session_start();
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level']) and !isset($User)){
		header("Location: ./index.php");
	}
	echo "TU USER : ".$_SESSION['ID']."<br>";
	echo "TU LEVEL: ".$_SESSION['Level']."<br>";
	echo "TU LEVEL: ".$_SESSION['Enterprise'];
?>
<?php include('./View/header.php');?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>VIRFILE</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>

	<div class="container">

		<div style="margin-top: -3px;" class="row">
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="index.html">Virfile</a>
			    </div>
				<div class="col-md-8">
			    <ul class="nav navbar-nav">			    	
				    	<li class="active"><a href="index.html">Inicio</a></li>
				      	<li><a href="gallery.html">Que ofrecemos</a></li>
				      	<li><a href="menu.html">Contacto</a></li>			      	
				</div>
			      	<div class="col-md-2" style="margin-top: 8px; margin-left: 130px; ">

			      		<div class="dropdown">
							

							<form action="index.php" method="POST">

				      		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Perico
							  <span class="glyphicon glyphicon-user"></span>
							  <ul class="dropdown-menu">
							    <li><a href="#">Mi cuenta</a></li>
							    <li><a href="#">Cambiar Imagen</a></li>
							    <li><a href="#">Salir</a></li>
							  </ul>
							</button>
							<input type="submit" name="Logout" id="Logout" value="Logout" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" value="Salir"></input>
							</form>
						<div>

			      	</div>		      
			    </ul>
			  </div>
			</nav>
		</div>
		
		<!--DIV CARPETAS-->
		<div class="col-md-10 back" style="height: 800px;">

			<!--URL-->
			<div class="row">

				<div class="row url-search"><span style="margin-top: 2px;" class="glyphicon glyphicon-map-marker" style="margin-right: 2px;"></span> Perico:/</div>

			</div>
			<div class="row" style="height: 740px;margin-left: 30px;margin-right: 3px;margin-top: 20px; display: none"> <!--CARPETAS!-->
				
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
				<!--ARCHIVO O CARPETA-->
				<div class="col-md-1 icon" "><div class="row folder-ico"></div><div class="row" style="height: 25%">Title</div></div>
			</div><!--CIERRE DE CARPETAS!-->
			<div class="row" style="height: 740px;margin-left: 30px;margin-right: 3px;margin-top: 20px; display: block;"> <!--- INICIO DIV CONTROL DE USUARIOS -->
				<input type="button" name="add_user" value="Agregar Usuarios">
				<input type="button" name="delete_user" value="Eliminar Usuarios">
				<br><br>
				<table>
					<tr>
						<td>
							Nombre de Usuario <input type="text" id="" name="" value=""><br>
		
							Nombre <input type="text" id="" name="" value=""><br>
			
							Mail <input type="text" id="" name="" value=""><br>
				
							Contraseña <input type="text" id="" name="" value=""><br>	
						</td>
					</tr>
					
				</table>

			</div> <!--- CIERRE DIV CONTROL DE USUARIOS -->

			<div style="margin-left: 3px;margin-right: 3px;margin-top: -30px;" class="row"><!--BARRA DE PROGRESO!-->
				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="70"
				  aria-valuemin="0" aria-valuemax="100" style="width:70%">
				    70%
				  </div>
				</div>
			</div><!--BARRA DE PROGRESO!-->

		</div><!--CIERRE DE DIV CARPETAS-->

		



		<div class="col-md-2 backright" >
		
			<form action="./index.php" method="POST" enctype="multipart/form-data" id="UploadFile">
			<center>
			<!--<input class="btn" style="width:110px; margin-top: 20px; margin-bottom: 8px;" type="submit" name="submit" value="Cargar"><span class="glyphicon glyphicon-floppy-open"></span></input>-->

			<form action="./index.php" method="POST" enctype="multipart/form-data" id="UploadFile">
				<input  name="upload" type="file" id="arch" /><br>
			

				<button class="btn" style="width:110px; margin-bottom: 8px;" type=""><span class="glyphicon glyphicon-floppy-save"></span>  Descargar</button>
				<button class="btn" style="width:110px; margin-bottom: 8px;" type=""><span class="glyphicon glyphicon-floppy-remove"></span>  Eliminar</button>
				<button class="btn" style="width:110px; margin-bottom: 8px;" type=""><span class="glyphicon glyphicon-search"></span>  Buscar</button>
				
				<input style="width:110px; margin-bottom: 8px;" class="btn" type="submit" name="submit" value="Cargar" />
				<input style="width:110px; margin-bottom: 8px;" class="btn" type="submit" name="Usuarios" value="Usuarios" />
				</center>
			</form>

			
			</form>
		</div><!--DIV BOTONES-->


	


	<div style="height: 30px; background: green;" class="col-md-12">
		<h1> bajada</h1>
		
	</div>

	</div><!--Container-->

	<script src="./Resources/Jquery/jquery-3.2.1.min.js"></script>
	<script src="./Resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="./Resources/App/js/Logged.js"></script>

</body>
</html>