<?php
	require_once('../Db/db.php');

	class login_Model{
		private $sql = "SELECT * FROM USUARIO WHERE (NombreUsuario = :user1 OR Correo = :user2) AND Contrasena = :pass LIMIT 1;";
		private $db;

		function __construct(){
			$this->db = Database::Connect();
		}

		function login_access($User,$Pass){
			$query = $this -> db -> prepare($this -> sql);
			$query->execute(array(':user1'=>$User,':user2'=>$User,':pass'=>$Pass));
			$rows=$query->fetch(PDO::FETCH_ASSOC);
			if($query->rowCount()>0){
				return True;
			}
			else{
				return False;
			}
		}
	}
?>