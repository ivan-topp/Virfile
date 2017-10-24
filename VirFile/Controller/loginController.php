<?php
	require_once('../Model/loginModel.php');
	if(isset($_POST['Envio'])){
		$uc = $_POST['User'];
		$p  = $_POST['Pass'];
		session_start();
		$resp = Logear($uc, $p);

		if ($resp <> 'Error'){
			header("Location: ../Perico.php");
		}else{
			echo "Error";
		}
	}
?>