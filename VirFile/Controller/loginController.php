<?php
	require_once('../Model/loginModel.php');
	if(isset($_POST['Submit'])){
		session_start();
		$Status= new login_Model;
		if($Status->login_access($_POST["User"],$_POST["Pass"])==True){
			header("Location: ../Perico.php");
		}
		else{
			echo "Error";
		}
	}
?>