<?php
	class register_Model{
		private $sql = "INSERT INTO user(User_Name, Enterprise, Stock, Name, Mail, Password, User_Level) VALUES (, :Name_User, :Enterprise, 0, :Name, :Mail, :Pass, 0);";
		private $db;

		function __construct(){
			$this->db = Database::Connect();
		}

		function register_action($name_user,$enterprise,$name,$mail,$pass){
			$query = $this -> db -> prepare($this -> sql);
			$query->execute(array(':Name_User'=>$name_user,':Enterprise'=>$enterprise,':Name'=>$name,':Mail'=>$mail,':Pass'=>$pass));
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