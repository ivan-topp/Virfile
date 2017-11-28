<?php
	session_start();
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level']) and !isset($User)){
		header("Location: ./index.php");
	}
	/*
	echo "TU USER : ".$_SESSION['ID']."<br>";
	echo "TU LEVEL: ".$_SESSION['Level']."<br>";
	echo "TU EMPRESA: ".$_SESSION['Enterprise']."<br>";
	echo "TU NOMBRE : ".$_SESSION['User_Name'];*/
?>
<?php include('./View/header.php');?>
<?php include('./createModal.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>VIRFILE</title>
	<link rel="stylesheet" href="./Resources/Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./Resources/App/css/styles.css">

</head>
<body>

	<div class="container">

		<div style="margin-top: -3px;" class="row">
			<form action="index.php" method="post">
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
				      	<li><a id="modal" href='#' data-toggle='modal' data-target='#modal'>LISTAR USUARIO</a></li>
				</ul>
				</form>						      	
				</div>	

				
				<div class="dropdown">
					<form action="index.php" method="POST">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["User_Name"]; ?>
							<ul class="dropdown-menu">
								<li><a href="#">Mi cuenta</a></li>
								<li><a href="#">Cambiar Imagen</a></li>
								<li><a href="#">Salir</a></li>
							</ul>
						</button>
						<input type="submit" name="Logout" id="Logout" value="Logout" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" value="Salir"></input>
						<input id="btnlist1" value="Listar Usuarios" name="btnlist" class="btn" style="width:110px; margin-bottom: 8px;" type="submit"></input>
						<input type="hidden" name="empre" value= <?php echo $_SESSION['Enterprise']; ?> >
					</form>
			  	</div>
			</nav>

		</div>
		
		<!--DIV CARPETAS-->
		<div class="col-md-10 back" style="height: 800px;">

			<!--URL-->
			<div class="row">

				<div class="row url-search"><span style="margin-top: 2px;" class="glyphicon glyphicon-map-marker" style="margin-right: 2px;"></span> Perico:/</div>

			</div>	
			<div class="row" style="height: 740px;margin-left: 30px;margin-right: 3px;margin-top: 20px; display: block;"> <!--- INICIO DIV CONTROL DE USUARIOS -->
				<div id="Files">
					
				</div>				
				<div id="Lista" class="hidden">
					<table id="ListUsers" class="table table-responsive" border="1">
					
					
					</table>
					<input type="button" id='btndelete1' value="ELIMINAR SELECCIONADOS"></input>

				</div>
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
				
				<input style="width:110px; margin-bottom: 8px;" class="btn" type="submit" name="submit" id="" value="Cargar" />
				<input style="width:110px; margin-bottom: 8px;" class="btn" type="submit" name="archivos" id="" value="archivos" />
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
	<script src="./Resources/App/js/crud_users.js"></script>
	<script src="./action.js"></script>


</body>
</html>
