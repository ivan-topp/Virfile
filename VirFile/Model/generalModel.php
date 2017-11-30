<?php
	require_once('./Db/db.php');
	class general_Model{
		private $insert_admin="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,1)";
		private $insert_user="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,0)";
		private $insert_enterprise="INSERT INTO enterprise(Name) VALUES (:enterprise)";
		#private $delete_enterprise="DELETE ";
		private $get_id_enterprise="SELECT ID_E FROM enterprise WHERE Name=:enterprise";

		private $list_Users = "SELECT * FROM user WHERE ID_User!=:user";
		private $list_Enterprise = "SELECT ID_E, enterprise.Name FROM enterprise WHERE 1";
		private $delete_us = "DELETE FROM USER WHERE ID_User = :us;";
		private $db;

		function __construct(){
			$this->db = Database::Connect();
		}


		function List_Enterprise(){
			$query = $this -> db -> prepare($this -> list_Enterprise);
			$rows=$query->fetchAll();
			if($query->rowCount()>0){
				return $rows;
			}
			else{
				return False;
			}
		}

		function Delete_User($id){
			$this->db = Database::Connect();
			$query = $this -> db -> prepare($this -> delete_us);
			if($query->execute(array(':us'=>$id))){
				return True;
			}
			else{
				return False;
			}	
		}

		function List_Users(){
			
			//function login_access($User,$Pass){
			$query = $this -> db -> prepare($this -> list_Users);
			$query->execute(array(':user'=>$_SESSION['ID']));
			$rows=$query->fetchAll();//(PDO::FETCHALL);
			if($query->rowCount()>0){
				return $rows;
			}
			else{
				return False;
			}
		}


		function get_id($Enterprise){
			$query = $this -> db -> prepare($this -> get_id_enterprise);
			if($query->execute(array(':enterprise'=>$Enterprise))){
				$rows=$query->fetch(PDO::FETCH_ASSOC);

				return $rows;
			}
			else{
				return False;
			}
		}

		function get_register_Enterprise($Enterprise){
			$query = $this -> db -> prepare($this -> insert_enterprise);
			if($query->execute(array(':enterprise'=>$Enterprise))){
				return True;
			}
			else{
				return False;
			}
		}

		function get_register_Admin($User,$Enterprise,$Name,$Mail,$Pass){
			$query = $this -> db -> prepare($this -> insert_admin);
			if($query->execute(array(':user'=>$User,':enterprise'=>$Enterprise,':name'=>$Name , ':mail'=>$User, ':pass'=>$Pass))){
				return True;
			}
			else{
				return False;
			}
		}

		function get_register_User($User,$Enterprise,$Name,$Mail,$Pass){
			$query = $this -> db -> prepare($this -> insert_user);
			if($query->execute(array(':user'=>$User,':enterprise'=>$Enterprise,':name'=>$Name , ':mail'=>$User, ':pass'=>$Pass))){
				return True;
			}
			else{
				return False;
			}
		}

		function get_delete_Enterprise($id){
			$query = $this -> db -> prepare($this -> insert_admin);
			if($query->execute(array(':user'=>$User,':enterprise'=>$Enterprise,':name'=>$Name , ':mail'=>$User, ':pass'=>$Pass))){
				return True;
			}
			else{
				return False;
			}
		}
		
	}
?>