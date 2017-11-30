<?php
	require_once('./Controller/userController.php');
	require_once('./Model/generalModel.php');
	class general_Controller extends userController{
		function __construct()
		{
			$this->Model = new general_Model();
		}

		function id($Enterprise){
			$data = $this->Model->get_id($Enterprise);
			if($data !=False){
				return $data;
			}
			else{
				return array ('Error'=>'Error De Autenticacion');
			}
		}
		function ListarEmpresas(){
			return $this->Model->List_Enterprise();
		}

		function EliminarUsuario($id, $name, $empresa){
			return $this->Model->Delete_User($id, $name, $empresa);
		}
		function ListarUsuarios(){
			return $this->Model->List_Users();
		}

		function register_Enterprise($Enterprise){
			$data = $this->Model->get_register_Enterprise($Enterprise);
			if($data != False){
				return array ('Fine' => "True");
			}
			else{
				return array ('Error'=>'Error de Autenticacion'); 
			}
		}

		function register_Admin($User,$Enterprise,$Name,$Mail,$Pass){
			$data = $this->Model->get_register_Admin($User,$Enterprise,$Name,$Mail,$Pass);
			if($data != False){
				return array ('Fine' => "True");
			}
			else{
				return array ('Error'=>'Error de Autenticacion'); 
			}
		}

		function register_User($User,$Enterprise,$Name,$Mail,$Pass){
			$data = $this->Model->get_register_User($User,$Enterprise,$Name,$Mail,$Pass);
			if($data != False){
				return array ('Fine' => "True");
			}
			else{
				return array ('Error'=>'Error de Autenticacion'); 
			}
		}
		function deleteEnterprise($id){
			return $this->Model->delete_Enterprise($id);
		}

	}
?>