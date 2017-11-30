<?php
	require_once('./Model/userModel.php');
	require_once('./Db/db.php');
	class adminModel extends userModel{
		private $sqlUpdate = "UPDATE user SET Stock = :Stock WHERE ID_User = :User"; //Maximo = 209715200 Bytes
		private $sqlGetStock = "SELECT Stock FROM user WHERE ID_User = :User LIMIT 1";
		//private $sql  = "SELECT * FROM USER WHERE Enterprise = :ep;";

		private $sql =  "SELECT user.ID_User, user.User_Name, user.Mail, user.Name, user.Stock, user.User_Level, enterprise.Name AS empresa
					    FROM Enterprise
						INNER JOIN user
						on enterprise.ID_E = user.ID_E
						WHERE user.ID_E = :ep AND user.ID_User != :user";

		
		private $sqlUpdate2 = "UPDATE user SET ";//User_Name = :nus, Name=:nm, Mail=:mail, Password =:psw, User_Level =:uslv WHERE ID_User = :User";


		private $sql1 = "DELETE FROM USER WHERE ID_User = :us;";
		private $db;
		function __construct(){
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

		function User_List(){
			
			//function login_access($User,$Pass){
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
