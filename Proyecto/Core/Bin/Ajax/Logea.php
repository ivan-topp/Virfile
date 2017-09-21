<?php
	if(!empty($_POST['usuario']) AND !empty($_POST['password'])){
		$db = new Conexion();

		$data = $db -> real_escape_string($_POST["usuario"]);
		$password = Encrypt($_POST["password"]);
		$sql = $db -> query("SELECT ID FROM USUARIOS WHERE (UserName = '$data' OR Email = '$data') AND Contraseña = '$password' LIMIT 1;");
		if($db -> rows($sql) > 0){
			$_SESSION["app_id"] = $db -> recorrer($sql)[0];
			echo 1;
		}else{
			echo "<div class='alert alert-dismissible alert-danger'>
				  <button type='button' class='close' data-dismiss='alert'>x</button>
				  <strong>Error: </strong> Credenciales incorrectas. Por favor asegurate de ingresar bien los datos.
				</div>";
		}
		$db -> liberar($sql);
		$db -> close();
	}else{
		echo "<div class='alert alert-dismissible alert-danger'>
				  <button type='button' class='close' data-dismiss='alert'>x</button>
				  <strong>Error: </strong> Todos Los Datos Deben Estar Complatados.
				</div>";
	}
?>