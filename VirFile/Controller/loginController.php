<?php
	require_once('./Model/loginModel.php');
	require_once('./Controller/userController.php');
	class loginController{
		function __construct($user, $pass){
			$this->User = $user;
			$this->Pass = $pass;
			$this->Model = new login_Model();
		}
		function Login(){
			$data = $this->Model->login_access($this->User, $this->Pass);
			if($data != false){
				$_SESSION['ID'] = $data['ID_User']; $_SESSION['Level'] = $data['User_Level']; $_SESSION["UserData"] = $data;
				header("Location: ./Perico.php");
			}else{
				header("Location: ./View/error.php?error=Error de autenticacion.");
			}
		}
		function logout(){
			$this->Model -> logout();
		}
	}
?>