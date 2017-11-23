<?php
	require_once('./Controller/loginController.php');
	require_once('./Controller/userController.php');
	header('Access-Control-Allow-Origin: *');
	session_start();
	$Login = new loginController();
	if(isset($_POST['Action'])){
		switch ($_POST['Action']) {
		    case "Login":
		        $data = $Login->Login($_POST['User'], $_POST['Pass']);
		        if(!isset($data['Error'])){
		        	$userController = new userController($data['ID_User'], $data['User_Name'], $data['Enterprise'], $data['Stock'], $data['Name'], $data['Mail'], $data['Password'], $data['User_Level']);
		    	}
				echo json_encode($data);
		        break;
		    case "Logout":
		    	if(isset($userController)) unset($userController);
		    	$Login->Logout();
		        echo true;
		        break;
		    case "Up":
		    	$conn_id = ftp_connect('127.0.0.1');
				$login = ftp_login($conn_id, 'VirFile', 'admin');
				if($login && $conn_id){
					$name = $_FILES['upload']['name'];
					$temp = $_FILES["upload"]["tmp_name"];
					if(ftp_put($conn_id, $_SESSION['ID'].'/'.$name, $temp,FTP_BINARY))
						echo "Fichero subido correctamente";
					else
						echo "No ha sido posible subir el fichero";
					ftp_close($conn_id);
				}else{
					echo "Error al conectar";
				}	
		    	break;
		    /*case 2:
		        echo "i es igual a 2";
		        break;*/
		}
		
	}
?>