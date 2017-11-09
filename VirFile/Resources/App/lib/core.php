<?php
	session_start();
	$Login;
	$_SESSION["ID"];
	$_SESSION["Level"];
	function init_global(){
		$Login = null;
		$_SESSION["ID"] = null;
		$_SESSION["Level"] = null;
	}
	function get_Login(){
		return $Login;
	}
	function get_Id(){
		return $_SESSION["ID"];
	}
	function get_Level(){
		return $_SESSION["Level"];
	}
?>