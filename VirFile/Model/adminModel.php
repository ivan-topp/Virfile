<?php
	require_once('./Model/userModel.php');
	require_once('./Db/db.php');
	class adminModel extends userModel{
		private $sqlUpdate = "UPDATE user SET Stock = :Stock WHERE ID_User = :User"; //Maximo = 209715200 Bytes
		private $sqlGetStock = "SELECT Stock FROM user WHERE ID_User = :User LIMIT 1";
		private $sql =  "SELECT user.ID_User, user.User_Name, user.Mail
					    FROM Enterprise
						INNER JOIN user
						on enterprise.ID_E = user.ID_E
						WHERE user.ID_E = :ep; AND user.ID_User!=:user";
		private $sqlUpdate2 = "UPDATE user SET User_Name = :nus, Name=:nm, Mail=:mail, Password =:psw, User_Level =:uslv WHERE ID_User = :User";
		private $sql1 = "DELETE FROM USER WHERE ID_User = :us;";

		private $insert_admin="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,1)";
		private $insert_user="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,:level)";

		private $db;

		function __construct(){
			parent::__construct();
			$this->db = Database::Connect();
		}


		function register_Admin($User,$Enterprise,$Name,$Mail,$Pass){
			$this->db = Database::Connect();
			$query = $this -> db -> prepare($this -> insert_admin);
			if($query->execute(array(':user'=>$User, ':enterprise'=>$Enterprise, ':name'=>$Name, ':mail'=>$Pass,':pass'=>$Mail)))
			{
				return True;
			}
			else{
				return False;
			}
		}

		function register_User($User,$Enterprise,$Name,$Mail,$Pass,$Level){
			$this->db = Database::Connect();
			$query = $this -> db -> prepare($this -> insert_user);
			if($query->execute(array(':user'=>$User, ':enterprise'=>$Enterprise, ':name'=>$Name, ':mail'=>$Pass,':pass'=>$Mail,':level'=>$Level)))
			{
				return True;
			}
			else{
				return False;
			}
		}

		function Edit($id,$uN,$N,$M,$Psw,$Lvl){
			$this->db = Database::Connect();
			$query = $this -> db -> prepare($this -> sqlUpdate2);
			if($query->execute(array(':nus'=>$uN, ':nm'=>$N, ':mail'=>$M, ':psw'=>$Psw, ':uslv'=>$Lvl, ':User'=>$id)))
			{
				return True;
			}
			else{
				return False;
			}	
		}

		function User_List(){
			$query = $this -> db -> prepare($this -> sql);
			$query->execute(array(':user'=>$_SESSION['ID'],':ep'=>$_SESSION['Enterprise']));
			$rows=$query->fetchAll();
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
