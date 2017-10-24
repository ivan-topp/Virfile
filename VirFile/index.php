<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perico</title>
</head>
<body>
	<form action="./Controller/loginController.php" method="POST">
		<label for="User"></label>
		<input type="text" name="User" placeholder="Usuario o Correo" required>
		<label for="Pass"></label>
		<input type="password" name="Pass" placeholder="Contraseña" required>
		<input type="submit" name="Envio">
	</form>
</body>
</html>