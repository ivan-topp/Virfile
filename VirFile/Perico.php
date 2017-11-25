<?php
	session_start();
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level']) and !isset($User)){
		header("Location: ./index.php");
	}
?>
<?php include('./View/header.php');?>
	<title>Hola</title>
</head>
<body>
	<h1>Hi!!</h1>
	<form action="./index.php" method="POST" enctype="multipart/form-data" id="UploadFile">
		<label for="upload">Selecciona un Archivo a subir: </label>
		<input name="upload" type="file" multiple="true" id="arch" /><br>
		<input type="submit" name="submit" value="Enviar" />
	</form>
	<form action="" method="POST">
		<input type="submit" name="Logout" id="Logout" value="Logout">
	</form>
	<button type="button" id="List">ListDir</button>
	<button type="button" id="Back">Volver</button>
	<input type="text" id="nameDir">
	<button type="button" id="mkdir">Crear Carpeta</button>
	<div id="lista"></div>
	<script src="./Resources/Jquery/jquery-3.2.1.min.js"></script>
	<script src="./Resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="./Resources/App/js/Logged.js"></script>
</body>
</html>