<?php
	require_once('./Model/adminModel.php');
	class adminController{
		function __construct(/*$id, $uname, $company, $stock, $name, $mail, $pass, $level*/){
			/*$this->id      = $id;
			$this->uname   = $uname;
			$this->company = $company;
			$this->stock   = $stock;
			$this->name    = $name;
			$this->mail    = $mail;
			$this->pass    = $pass;
			$this->level   = $level;*/
			$this->Model   = new adminModel($this);
		}

		function Listar(){
			return $this->Model->User_List();
		}
		function Eliminar(){
			return $this->Model->User_Delete();
		}
	}
?>
