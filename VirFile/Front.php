<?php
	require_once('./Controller/loginController.php');
	require_once('./Controller/userController.php');
	require_once('./Controller/adminController.php');
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
		    		$name = $_POST["curDir"].'/'.$_FILES['upload']['name'];
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
		    	if(isset($_SESSION['ID'])) echo $_SESSION['Enterprise'].'/'.$_SESSION['ID'];
		    	break;
		    case "CreateDir":
		    	if(isset($_SESSION['ID'])){
		    		$userController =  new userController();
		    		$res = $userController->createDir($_POST["DirectoryName"]);
		    		echo json_encode($res);
		    		//echo $_POST["DirectoryName"];
		    	}
		    	break;
		    case "Remove":
		    	if(isset($_SESSION['ID'])){
		    		$userController = new userController();
		    		$res = $userController->remove($_POST['Content'], $_POST['type']);
		    		echo json_encode($res);
		    	}
		    	break;
		    case "ChangeName":
		    	if(isset($_SESSION['ID'])){
		    		$userController = new userController();
		    		$res = $userController->changeName($_POST['OldName'], $_POST['NewName']);
		    		echo json_encode($res);
		    	}
		    	break;
		    case "Download":
		    	if(isset($_SESSION['ID'])){
		    		$userController = new userController();
		    		$res = $userController->download($_POST['Name'], $_POST['Path']);
		    		echo json_encode($res);
		    	}
		    	//echo "Descargando: ".$_POST["Name"]." En la Ruta: ".$_POST["Path"];
		    	break;
		    case "list":
		    	$adm=new adminController();
				$res = $adm->Listar();
				if($res != false){
					/*for ($i=0; $i <$res.count(); $i++) { 
						$res
					}*/
					echo json_encode($res);
				}else echo json_encode(array('Error'=>'ashdkahs'));
				break;

			case "delete":
				$adm=new adminController();
				$res = $adm->Eliminar($_POST['ID']);
				if($res != false){
					/*for ($i=0; $i <$res.count(); $i++) { 
						$res
					}*/
					echo json_encode($res);
				}else echo json_encode(array('Error'=>'ashdkahs'));
				break;


		    /*case 2:
		        echo "i es igual a 2";
		        break;*/
		}
		
	}
?>