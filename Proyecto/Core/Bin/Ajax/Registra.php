<?php
	$db = new Conexion();

	$user = $db -> real_escape_string($_POST["usuario"]);
	$name = $db -> real_escape_string($_POST["nombre"]);
	$email = $db -> real_escape_string($_POST["email"]);
	$password = Encrypt($_POST["password"]);
	$sql = $db -> query("SELECT UserName FROM USUARIOS WHERE UserName = '$user' OR Email = '$email' LIMIT 1;");
	if($db -> rows($sql) == 0){
		$db -> query("INSERT INTO USUARIOS (UserName, Nombre, Email, Contraseña) VALUES ('$user','$name','$email','$password');");
		$mostrar = 1;
	}else{
		$dato = $db -> recorrer($sql)[0];
		if(strtolower($user)==strtolower($dato)){
			$mostrar = "<div class='alert alert-dismissible alert-danger'>
			  <button type='button' class='close' data-dismiss='alert'>x</button>
			  <strong>Error: </strong> El Nombre de Usuario ya se encuentra registrado.
			</div>";
		}else{
			$mostrar = "<div class='alert alert-dismissible alert-danger'>
			  <button type='button' class='close' data-dismiss='alert'>x</button>
			  <strong>Error: </strong> El Correo Electronico ya se encuentra registrado.
			</div>";
		}
	}
	$db -> liberar($sql);
	$db -> close();
	echo $mostrar;
?>