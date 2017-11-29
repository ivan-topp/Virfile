<?php
	require_once('./Model/userModel.php');
	require_once('./Db/db.php');
	class adminModel extends userModel{
		private $sqlUpdate = "UPDATE user SET Stock = :Stock WHERE ID_User = :User"; //Maximo = 209715200 Bytes
		private $sqlGetStock = "SELECT Stock FROM user WHERE ID_User = :User LIMIT 1";
		//private $sql  = "SELECT * FROM USER WHERE Enterprise = :ep;";

		private $sql =  "SELECT user.ID_User, user.User_Name, user.Mail
					    FROM Enterprise
						INNER JOIN user
						on enterprise.ID_E = user.ID_E
						WHERE user.ID_E = :ep;";

		private $sql1 = "DELETE FROM USER WHERE ID_User = :us;";
		private $db;
		function __construct(){
			parent::__construct();
			$this->db = Database::Connect();
		}


		function User_List(){
			
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
