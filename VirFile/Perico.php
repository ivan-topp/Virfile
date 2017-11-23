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
		<input name="upload" type="file" id="arch" /><br>
		<input type="submit" name="submit" value="Enviar" />
	</form>
	<form action="" method="POST">
		<input type="submit" name="Logout" id="Logout" value="Logout">
	</form>

	<script src="./Resources/Jquery/jquery-3.2.1.min.js"></script>
	<script src="./Resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="./Resources/App/js/Logged.js"></script>
</body>
</html>