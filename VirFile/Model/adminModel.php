<?php
	require_once('./Db/db.php');
	class adminModel{

		private $sql  = "SELECT * FROM USER WHERE Enterprise = :ep;";
		private $sql1 = "DELETE FROM USER WHERE ID_User = :us;";
		//SELECT * FROM `user` WHERE Enterprise="Empresa" AND User_Level=1
		private $db;

		function __construct($controller){
			$this->controller = $controller;
		}

		function User_List(){
			$this->db = Database::Connect();
			//function login_access($User,$Pass){
			$query = $this -> db -> prepare($this -> sql);
			$query->execute(array(':ep'=>$_SESSION['Enterprise']));
			$rows=$query->fetchAll();//(PDO::FETCHALL);
			if($query->rowCount()>0){
				return $rows;
			}
			else{
				return False;
			}
		}

		function User_Delete($id){
			$this->db = Database::Connect();
			$query = $this -> db -> prepare($this -> sql1);
			if($query->execute(array(':us'=>$id))){
				return True;
			}
			else{
				return False;
			}	
		}
	}
?>
