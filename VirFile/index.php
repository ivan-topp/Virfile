<?php
	session_start();
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level']) and !isset($userController)){
		include('./View/home.php');
	}else{
		header("Location: ./Perico.php");
	}
?>