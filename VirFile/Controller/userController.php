<?php
	require_once('./Model/userModel.php');
	class userController{
		function __contruct($id, $uname, $company, $stock, $name, $mail, $pass, $level){
			$this->id = $id;
			$this->uname = $uname;
			$this->company = $company;
			$this->stock = $stock;
			$this->name = $name;
			$this->mail = $mail;
			$this->pass = $pass;
			$this->level = $level;
			$this->Model = new userModel($this);
		}

	}
?>