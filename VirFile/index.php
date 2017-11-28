<?php
	session_start();
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level']) and !isset($userController)){
		include('./View/home.php');
	}else{
		if($_SESSION['Level']==0){
			include('./user.php');
			//header("Location: ./user.php");
		}
		if($_SESSION['Level']==1){
			include('./vistadmin.php');
			//header("Location: ./vistadmin.php");
		}
	}
?>
