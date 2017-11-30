<?php
	require_once('./Controller/userController.php');
	require_once('./Model/adminModel.php');
	class adminController extends userController{
		function __construct(){
			$this->Model = new adminModel();
		}

		function Listar(){
			return $this->Model->User_List();
		}
		function Eliminar($id, $name){
			return $this->Model->User_Delete($id, $name);
		}
		function Editar($id,$uN,$N,$M,$Psw,$Lvl){
			return $this->Model->Edit($id,$uN,$N,$M,$Psw,$Lvl);
		}
		function register_Admin($User,$Enterprise,$Name,$Mail,$Pass){
			return $this->Model->register_Admin($id,$uN,$N,$M,$Psw,$Lvl);
		}
		function register_User($User,$Enterprise,$Name,$Mail,$Pass,$Level){
			return $this->Model->register_User($User,$Enterprise,$Name,$Mail,$Pass,$Level);
		}

	}
?>
