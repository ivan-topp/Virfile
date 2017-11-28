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
		    		$name = $_POST["curDir"].'/'.$_FILES['upload']['name'];
					$temp = $_FILES["upload"]["tmp_name"];
					if($_SESSION['Level']==0){
						$userController = new userController();
						$res = $userController->uploadFile($name, $temp, $_FILES["upload"]['size']);
					}
					else if($_SESSION['Level']==1){
						$adminController = new adminController();
						$res = $adminController->uploadFile($name, $temp, $_FILES["upload"]['size']);
					}
					echo json_encode($res);
		    	}
		    	break;
		    case "ListDir":
		    	if(isset($_SESSION["User_Data"])){
		    		if($_SESSION['Level']==0){
						$userController = new userController();
						$res = $userController->ListDirectory($_POST['Directory']);
		    		}
		    		else if($_SESSION['Level']==1){
		    			$adminController = new adminController();
						$res = $adminController->ListDirectory($_POST['Directory']);
		    		}
					echo json_encode($res);
		    	}
		    	break;
		    case "getUserId":
		    	if(isset($_SESSION['ID'])){
		    		if($_SESSION['Level'] == 0) echo $_SESSION['Enterprise'].'/'.$_SESSION['User_Data']['User_Name'];
		    		else echo $_SESSION['Enterprise'];
		    	} 
		    	break;
		    case "CreateDir":
		    	if(isset($_SESSION['ID'])){
		    		if($_SESSION['Level']==0){
		    			$userController =  new userController();
		    			$res = $userController->createDir($_POST["DirectoryName"]);
		    		}
		    		else if($_SESSION['Level']==1) { 
		    			$adminController =  new adminController();
		    			$res = $adminController->createDir($_POST["DirectoryName"]);
		    		}
		    		echo json_encode($res);
		    		//echo $_POST["DirectoryName"];
		    	}
		    	break;
		    case "Remove":
		    	if(isset($_SESSION['ID'])){
		    		if($_SESSION['Level']==0){
						$userController = new userController();
			    		$res = $userController->remove($_POST['Content'], $_POST['type']);
		    		}
		    		else if($_SESSION['Level']==1){
		    			$adminController = new adminController();
			    		$res = $adminController->remove($_POST['Content'], $_POST['type']);
		    		}
		    		echo json_encode($res);
		    	}
		    	break;
		    case "ChangeName":
		    	if(isset($_SESSION['ID'])){
		    		if($_SESSION['Level']==0){
		    			$userController = new userController();
			    		$res = $userController->changeName($_POST['OldName'], $_POST['NewName']);
		    		}
		    		else if($_SESSION['Level']==1){
						$adminController = new adminController();
			    		$res = $adminController->changeName($_POST['OldName'], $_POST['NewName']);
		    		}	
		    		echo json_encode($res);
		    	}
		    	break;
		    case "Download":
		    	if(isset($_SESSION['ID'])){
		    		if($_SESSION['Level']==0){
		    			$userController = new userController();
			    		$res = $userController->download($_POST['Name'], $_POST['Path']);
		    		}
		    		else if($_SESSION['Level']==1){
		    			$adminController = new adminController();
			    		$res = $adminController->download($_POST['Name'], $_POST['Path']);
		    		}	
		    		echo json_encode($res);
		    	}
		    	//echo "Descargando: ".$_POST["Name"]." En la Ruta: ".$_POST["Path"];
		    	break;
		    case "list":
		    	$adm=new adminController();
				$res = $adm->Listar();
				if($res != false){
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