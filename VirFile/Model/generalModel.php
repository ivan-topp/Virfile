<?php
	require_once('./Db/db.php');
	require_once('./Model/userModel.php');
	class general_Model extends userModel{
		private $insert_admin="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,1)";
		private $insert_user="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,0)";
		private $insert_enterprise="INSERT INTO enterprise(Name) VALUES (:enterprise)";
		#private $delete_enterprise="DELETE ";
		private $get_id_enterprise="SELECT ID_E FROM enterprise WHERE Name=:enterprise";

		private $list_Users = "SELECT * FROM user WHERE ID_User!=:user";
		private $list_Enterprise = "SELECT * FROM enterprise WHERE 1";
		private $delete_us = "DELETE FROM USER WHERE ID_User = :us;";
		private $daleteEnt = "DELETE FROM Enterprise WHERE ID_E=:enterprise";
		private $sql =  "DELETE FROM USER WHERE ID_E = :ep;";
		private $db;

		function __construct(){
			parent::__construct();
			$this->conn_id = ftp_connect('127.0.0.1');
			$this->login = ftp_login($this->conn_id, 'VirFile', 'admin');
			$this->db = Database::Connect();
		}


		function List_Enterprise(){
			$query = $this -> db -> prepare($this -> list_Enterprise);
			$query->execute();
			$rows=$query->fetchAll(PDO::FETCH_ASSOC);
			if($query->rowCount()>0){
				return $rows;
			}
			else{
				return False;
			}
		}

		function Delete_User($id, $name, $empresa){ 
			$query = $this -> db -> prepare($this -> delete_us);
			if($query->execute(array(':us'=>$id))){
				if($this->ftpRemoveDirectory($empresa.'/'.$name)!=false) return True; 
				else return false;
			}
			else{
				return False;
			}	
		}

		function List_Users(){
			
			//function login_access($User,$Pass){
			$query = $this -> db -> prepare($this -> list_Users);
			$query->execute(array(':user'=>$_SESSION['ID']));
			$rows=$query->fetchAll(PDO::FETCH_ASSOC);//(PDO::FETCHALL);
			if($query->rowCount()>0){
				return $rows;
			}
			else{
				return False;
			}
		}

		function createNewFolder($dir){
			if($this->login && $this->conn_id){
				$res = false;
				set_error_handler(function(){}, E_WARNING);
				if(ftp_mkdir($this->conn_id, ftp_pwd($this->conn_id).$dir)){
					$res = true;
				}
				restore_error_handler();
				ftp_close($this->conn_id);
				return $res;
			}else{
				return false;
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
			if($query->execute(array(':user'=>$User,':enterprise'=>$Enterprise,':name'=>$Name , ':mail'=>$Mail, ':pass'=>$Pass))){
				if($this->createNewFolder($Enterprise.'/'.$User)) return True;
				else return false;
			}
			else{
				return False;
			}
		}

		function get_register_User($User,$Enterprise,$Name,$Mail,$Pass){
			$query = $this -> db -> prepare($this -> insert_user);
			if($query->execute(array(':user'=>$User,':enterprise'=>$Enterprise,':name'=>$Name , ':mail'=>$Mail, ':pass'=>$Pass))){
				if($this->createNewFolder($Enterprise.'/'.$User)) return True;
				else return false;
			}
			else{
				return False;
			}
		}

		function delete_Enterprise($id){
			$query = $this -> db -> prepare($this->sql);
			if($query->execute(array(':ep'=>$id))){				
				$query = $this -> db -> prepare($this -> daleteEnt);
				if($query->execute(array(':enterprise'=>$id))){
					if($this->ftpRemoveDirectory($id)!=false) return True; 
					else return false;
				}
				else{
					return False;
				}
			}
			else{
				return False;
			}
		}
		
	}
?>