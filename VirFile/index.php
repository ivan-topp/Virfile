<?php
	require_once('./Controller/loginController.php');
	session_start();
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level']) and !isset($User)){
		if(isset($Login)){
			$Login->Model -> logout();
			unset($Login);
		}
		include('./View/home.php');
		if(isset($_POST['Submit'])){
			$Login = new loginController($_POST['User'], $_POST['Pass']);
			$Login->Login();
		}
	}else{
		header("Location: ./Perico.php");
	}
	
?>