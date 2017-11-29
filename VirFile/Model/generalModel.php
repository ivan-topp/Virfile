<?php
	require_once('./Db/db.php');
	class general_Model{
		private $insert_admin="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,1)";
		private $insert_user="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,0)";
		private $insert_enterprise="INSERT INTO enterprise(Name) VALUES (:enterprise)";
		#private $delete_enterprise="DELETE ";
		private $get_id_enterprise="SELECT ID_E FROM enterprise WHERE Name=:enterprise";
		private $db;

		function __construct(){
			$this->db = Database::Connect();
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