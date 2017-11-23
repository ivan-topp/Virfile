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
		        	$_SESSION["User_Data"] = $data;
		    	}
				echo json_encode($data);
		        break;
		    case "Logout":
		    	$Login->Logout();
		        echo true;
		        break;
		    case "Up":
		    	if(isset($_SESSION["User_Data"])){
		    		$userController = new userController();
		    		$name = $_FILES['upload']['name'];
					$temp = $_FILES["upload"]["tmp_name"];
					$res = $userController->uploadFile($name, $temp);
					echo $res['Result'];
		    	}
		    	break;
		    case "ListDir":
		    	if(isset($_SESSION["User_Data"])){
		    		$userController = new userController();
					$res = $userController->ListDirectory($_POST['Directory']);
					echo json_encode($res);
		    	}
		    	break;
		    case "getUserId":
		    	if(isset($_SESSION['ID'])) echo $_SESSION['ID'];
		    	break;
		    /*case 2:
		        echo "i es igual a 2";
		        break;*/
		}
		
	}
?>