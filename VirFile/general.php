<?php
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level']) and !isset($User) or $_SESSION['Level']!=2){
		header("Location: ./index.php");
	}
?>
<?php include('./View/header.php');?>
	<title>Hola</title>
</head>
<body>
	<?php include('./View/nav.php');?>
	<div class="container-fluid">

		<?php include('./View/registerEnterpriseModal.html');?>
		<?php include('./View/listEnterpriseModal.html');?>
		<?php include('./View/registerUserModal.html');?>
		<?php include('./View/listUserModal.html');?>
		<div class="row">
			<div class="col-md-9 col-xs-12 mar0">
				<div id="navFile"></div>
			</div>
			<div class="col-md-3 col-xs-12 mar0">
				<div class="options">
					<h1>Opciones</h1>
					<button type="button" id="listUser" class="btn btn-default btn-block"><span class="glyphicon glyphicon-stats"></span>Gestionar Empresas</button>
					<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#listEnterprise"><span class="glyphicon glyphicon-stats"></span>Listar Empresas</button>

					<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#modalRegisterEnterprise"><span class="glyphicon glyphicon-paste"></span>Registrar Empresa</button>

					<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#modalRegisterUser"><span class="glyphicon glyphicon-user"></span>Registrar Usuarios</button>

					<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#listUsers"><span class="glyphicon glyphicon-user"></span>Listar Usuarios</button>



					<button type="button" id="openFolder" class="btn btn-default btn-block"><span class="glyphicon glyphicon-wrench"></span>Configuracion</button>
					<button type="button" class="btn btn-default btn-block" id="Logout"><span class="glyphicon glyphicon-log-out"></span>Logout</button>
				</div>
			</div>	
		</div>
	</div>
	<?php include('./View/footer.php');?>
	<script src="./Resources/Jquery/jquery-3.2.1.min.js"></script>
	<script src="./Resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="./Resources/App/js/general.js"></script>
</body>
</html>