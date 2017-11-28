<?php
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level'])){
		header("Location: ./index.php");
	}else{
		if(isset($_SESSION['Level'])){
			if($_SESSION['Level'] != 0){
				header("Location: ./index.php");
			}
		}
	}
?>
<?php include('./View/header.php');?>
	<title>VirFile</title>
</head>
<body>
	<?php include('./View/nav.php');?>
	<div class="container-fluid">
		<?php include('./View/subirModal.html');?>
		<?php include('./View/newFolderModal.html');?>
		<?php include('./View/editNombreModal.html');?>
		<?php include('./View/downloadModal.html');?>
		<div class="row">
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
	<?php include('./View/footer.php');?>
	<script src="./Resources/Jquery/jquery-3.2.1.min.js"></script>
	<script src="./Resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="./Resources/App/js/Logged.js"></script>
</body>
</html>