<?php
	require_once('./Model/loginModel.php');
	class loginController{
		function __construct(){
			$this->Model = new login_Model();
		}
		function Login($user, $pass){
			$data = $this->Model->login_access($user, $pass);
			if($data != false){
				$_SESSION['ID'] = $data['ID_User']; $_SESSION['Level'] = $data['User_Level'];
				return $data;
			}else{
				return array ('Error'=>'Error de Autenticacion');
			}
		}
		function Logout(){
			unset($_SESSION["ID"]);
			unset($_SESSION["Level"]);
			$this->Model -> logout();
		}
	}
?>