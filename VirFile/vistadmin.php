<?php
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
<?php //include('./createModal.php');?>
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

	<?php include("./View/registerUserModal.html");?>
	<?php include("./View/editUserModal.html");?>

	<div class="container-fluid">
		
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
						<button style="margin-top: 10px;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['User_Data']["User_Name"]; ?>
							<ul class="dropdown-menu">
								<li><a href="#">Mi cuenta</a></li>
								<li><a href="#">Cambiar Imagen</a></li>
								<li><a href="#">Salir</a></li>
							</ul>
						</button>
						<input style="margin-top: 10px;" type="submit" name="Logout" id="Logout" value="Logout" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" value="Salir"></input>
						<input id="btnlist1" value="Listar User" name="btnlist" class="btn btn-warning" style="width:110px; padding-left: -10px; margin-top: 10px;" type="submit"></input>

						

						<button id="btnnew" name="btnnew" type="button" class="btn btn btn-success" data-toggle="modal" data-target="#modalRegisterUser" style="width:80px; padding-left: -10px; margin-top: 10px;">Add User</button>

						
						


						<input type="hidden" name="empre" value= <?php echo $_SESSION['Enterprise']; ?> >
					</form>
			  	</div>
			</nav>

		</div>
		<?php include('./View/subirModal.html');?>
		<?php include('./View/newFolderModal.html');?>
		<?php include('./View/editNombreModal.html');?>
		<?php include('./View/downloadModal.html');?>
		<!--DIV CARPETAS-->
		<div class="row"> <!--- INICIO DIV CONTROL DE USUARIOS -->
			<div id="Files">
				<div class="col-md-9 col-xs-12 mar0">
					<div id="navFile"></div>
				</div>
				<div class="col-md-3 col-xs-12 mar0">
					<div class="options">
						<h1>Opciones</h1>
						<button type="button" id="List" class="btn btn-default btn-block"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
						<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#modalSubir"><span class="glyphicon glyphicon-cloud-upload"></span> Subir Archivos</button>
						<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#modalLinkDonwload" id="download"><span class="glyphicon glyphicon-cloud-download"></span> Descargar Archivos</button>
						<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#modalNewFolder"><span class="glyphicon glyphicon-folder-open"></span> Nueva Carpeta</button>
						<button type="button" id="openFolder" class="btn btn-default btn-block"><span class="glyphicon glyphicon-folder-open"></span> Abrir Carpeta</button>
						<button type="button" class="btn btn-default btn-block" id="Back"><span class="glyphicon glyphicon-arrow-left"></span> Carpeta Anterior</button>
						<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#modalEditName"><span class="glyphicon glyphicon-pencil"></span> Editar Nombre</button>
						<button type="button" id="remove" class="btn btn-default btn-block"><span class="glyphicon glyphicon-remove"></span> Eliminar Seleccionados</button>
						<button type="button" class="btn btn-default btn-block" id="Logout"><span class="glyphicon glyphicon-log-out"></span> Logout</button>
					</div>
				</div>
			</div>
		</div>
				
		<div class="row">
			<div id="Lista" class="hidden">
				<table id="ListUsers" class="table table-responsive" border="1">
										
				</table>
				<input type="button" class="btn btn btn-danger" id='btndelete1' value="ELIMINAR SELECCIONADOS"></input>
				<button id="btnedit" name="btnedit" type="button" class="btn btn btn-success" data-toggle="modal" data-target="#modalEditUser" style="width:80px; padding-left: -10px; ">Edit User</button>

			</div>
		</div>

	</div><!--Container-->

	<script src="./Resources/Jquery/jquery-3.2.1.min.js"></script>
	<script src="./Resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="./Resources/App/js/crud_users.js"></script>
	<script src="./Resources/App/js/logged.js"></script>
	<script src="./Resources/App/js/action.js"></script>


</body>
</html>
