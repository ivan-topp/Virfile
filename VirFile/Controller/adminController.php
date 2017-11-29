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
		function Eliminar($id){
			return $this->Model->User_Delete($id);
		}
		function Editar($id,$uN,$N,$M,$Psw,$Lvl){
			return $this->Model->Edit($id,$uN,$N,$M,$Psw,$Lvl);
		}

	}
?>
