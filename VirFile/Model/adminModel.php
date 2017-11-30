<?php
	require_once('./Model/userModel.php');
	require_once('./Db/db.php');
	class adminModel extends userModel{
		private $sqlUpdate = "UPDATE user SET Stock = :Stock WHERE ID_User = :User"; //Maximo = 209715200 Bytes
		private $sqlGetStock = "SELECT Stock FROM user WHERE ID_User = :User LIMIT 1";
		private $sqlGetentreprise = "SELECT ID_E FROM users WHERE ID_User = :User LIMIT 1";
		//private $sql  = "SELECT * FROM USER WHERE Enterprise = :ep;";

		private $sql =  "SELECT user.ID_User, user.User_Name, user.Mail, user.Name, user.Stock, user.User_Level, enterprise.Name AS empresa
					    FROM Enterprise
						INNER JOIN user
						on enterprise.ID_E = user.ID_E
						WHERE user.ID_E = :ep AND user.ID_User != :user";

		
		private $sqlUpdate2 = "UPDATE user SET ";//User_Name = :nus, Name=:nm, Mail=:mail, Password =:psw, User_Level =:uslv WHERE ID_User = :User";
		private $insert_admin="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,1)";
		private $insert_user="INSERT INTO user(User_Name, ID_E, Stock, Name, Mail, Password, User_Level) VALUES (:user,:enterprise,0,:name,:mail,:pass,:level)";

		private $sql1 = "DELETE FROM USER WHERE ID_User = :us;";
		private $db;
		function __construct(){
			$this->conn_id = ftp_connect('127.0.0.1');
			$this->login = ftp_login($this->conn_id, 'VirFile', 'admin');
			parent::__construct();
			$this->db = Database::Connect();
		}

		function Edit($id, $uN = '', $N = '', $M = '', $Psw = '', $Lvl = ''){
			$values = array();
			if($uN != ''){
				$this->sqlUpdate2 = $this->sqlUpdate2 . 'User_Name = :nus ';
				$values[':nus'] = $uN;
			}
			if($N != ''){
				$this->sqlUpdate2 = $this->sqlUpdate2 . 'Name=:nm ';
				$values[':nm'] = $N;
			}
			if($M != ''){
				$this->sqlUpdate2 = $this->sqlUpdate2 . 'Mail=:mail ';
				$values[':mail'] = $M;
			}
			if($Psw != ''){
				$this->sqlUpdate2 = $this->sqlUpdate2 . 'Password =:psw ';
				$values[':psw'] = $Psw;
			}
			if($Lvl != ''){
				$this->sqlUpdate2 = $this->sqlUpdate2 . 'User_Level =:uslv ';
				$values[':uslv'] = intval($Lvl);
			}
			$this->sqlUpdate2 = $this->sqlUpdate2.'WHERE ID_User = :User';
			$values[':User']=$id;
			$query = $this -> db -> prepare($this -> sqlUpdate2);
			if($query->execute($values))
			{
				return True;
			}
			else{ 
				return False;
			}	
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
 
		function User_List(){
			$query = $this -> db -> prepare($this -> sql);
			$query->execute(array(':ep'=>$_SESSION['Enterprise'], ':user'=>$_SESSION['ID']));
			$rows=$query->fetchAll();//(PDO::FETCHALL);
			if($query->rowCount()>0){
				return $rows;
			}
			else{
				return False;
			}
		}

		function User_Delete($id, $name){ 
			$query = $this -> db -> prepare($this -> sql1);
			if($query->execute(array(':us'=>$id))){
				if($this->ftpRemoveDirectory($_SESSION['Enterprise'].'/'.$name)!=false) return True; 
				else return false;
			}
			else{
				return False;
			}	
		}

		

	}
?>
