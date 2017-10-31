<?php
	require_once('./Model/loginModel.php');
	class loginController{
		function __construct($user, $pass){
			$this->User = $user;
			$this->Pass = $pass;
			$this->Model = new login_Model();
		}
		function Login(){
			$status = $this->Model->login_access($this->User, $this->Pass);
			if($status == true){
				header("Location: ./Perico.php");
			}else{
				header("Location: ./View/error.php?error=Error de autenticacion.");
			}
		}
	}
?>