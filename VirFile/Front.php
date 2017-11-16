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
		    /*case 2:
		        echo "i es igual a 2";
		        break;*/
		}
		
	}
?>