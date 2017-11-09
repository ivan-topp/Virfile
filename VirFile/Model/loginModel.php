<?php
	require_once('./Db/db.php');
	class login_Model{
		private $sql = "SELECT * FROM USER WHERE (User_Name = :user1 OR Mail = :user2) AND Password = :pass LIMIT 1;";
		private $db;

		function __construct(){
			$this->db = Database::Connect();
		}

		function login_access($User,$Pass){
			$query = $this -> db -> prepare($this -> sql);
			$query->execute(array(':user1'=>$User,':user2'=>$User,':pass'=>$Pass));
			$rows=$query->fetch(PDO::FETCH_ASSOC);
			if($query->rowCount()>0){
				return $rows;
			}
			else{
				return False;
			}
		}
		function logout(){
			$this->db -> free();
		}
	}
?>