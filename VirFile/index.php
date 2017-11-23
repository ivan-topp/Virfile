<?php
	session_start();
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level']) and !isset($userController)){
		include('./View/home.php');
	}else{
		if($_SESSION['Level']==0){
			header("Location: ./Perico.php");
		}
		if($_SESSION['Level']==1){
			header("Location: ./vistadmin.php");
		}
	}
?>
