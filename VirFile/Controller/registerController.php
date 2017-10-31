<?php
	require_once('../Model/registerModel.php');
	require_once('../Db/db.php');
	
	if(isset($_POST['Submit'])){
		$Status= new login_Model;
		if($Status->login_access($_POST["User"],$_POST["Pass"])==True){
			header("Location: ../Perico.php");
		}
		else{
			echo "Error";
		}
	}
?>