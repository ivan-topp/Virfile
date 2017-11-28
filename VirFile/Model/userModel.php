<?php
	require_once('./Db/db.php');
	class userModel{
		private $sqlUpdate = "UPDATE user SET Stock = :Stock WHERE ID_User = :User"; //Maximo = 209715200 Bytes
		private $sqlGetStock = "SELECT Stock FROM user WHERE ID_User = :User LIMIT 1";
		private $db;
		function __construct(){
			$this->conn_id = ftp_connect('127.0.0.1');
			$this->login = ftp_login($this->conn_id, 'VirFile', 'admin');
			$this->db = Database::Connect();
		}
		public function getStock(){
			$query = $this -> db -> prepare($this -> sqlGetStock);
			$query->execute(array(':User'=>$_SESSION['ID']));
			$rows=$query->fetch(PDO::FETCH_ASSOC);
			if($query->rowCount()>0){
				return $rows['Stock'];
			}
			else{
				return False;
			}
		}
		public function updateStock($newStock){
			try{
				$query = $this -> db -> prepare($this -> sqlUpdate);
				$query->execute(array(':Stock'=> $newStock, ':User'=>$_SESSION['ID']));
				return true;
			}
			catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
			
		}

		public function upFile($name, $temp, $size){
			$res = false;
			if($this->login && $this->conn_id){
				$userStock = $this->getStock();
				if(($userStock + $size) < 209715200){
					if($this->updateStock($userStock + $size)){
						if(ftp_put($this->conn_id, $name, $temp,FTP_BINARY)) $res = true;
					}
				}else $res = "Error de Capacidad";
				$this->ftpFree();
				return $res;
			}else{
				return false;
			}
		}

		public function ftpListDir($dir){
			if($this->login && $this->conn_id){
				$res = array();
				$buff = ftp_nlist($this->conn_id, ftp_pwd($this->conn_id).$dir.'/');
				$this->ftpFree();
				if($buff != false){
					sort($buff);
					foreach ($buff as $c) {
						$info = new SplFileInfo($c);
						if($info->getExtension() != '') array_push($res, $c.',File');
						else array_push($res, $c.',Dire');
					}
				}
				if(sizeof($res)==0){
					$res = array('Error'=>'Este directorio esta vacio.');
				}
				return $res;
			}else{
				return false;
			}
		}

		public function ftpCreateDir($dir){
			$res = array();
			if($this->login && $this->conn_id){
				set_error_handler(function(){}, E_WARNING);
				if(ftp_mkdir($this->conn_id, ftp_pwd($this->conn_id).$dir)){
					$res = array('Result'=>'Carpeta creada satisfactoriamente.');
				}else{
					$this->ftpFree();
					return false;
				}
				restore_error_handler();
				$this->ftpFree();
				return $res;
			}else{
				return false;
			}
		}

		public function ftpRemoveFile($name){
			if($this->login && $this->conn_id){
				$size = ftp_size($this->conn_id, $name);
				$userSize = $this->getStock();
				if($this->updateStock($userSize - $size)){
					if (ftp_delete($this->conn_id, $name)) {
						return array('Result'=>'Archivo eliminado Satisfactoriamente.');
					} else {
						return false;
					}
				}else{
					return false;
				}
			}
			else{
				$this->conn_id = ftp_connect('127.0.0.1');
				$this->login = ftp_login($this->conn_id, 'VirFile', 'admin');
				$this->ftpRemoveFile($name);
			}		
		}
		public function ftpRemoveDirectory($name){
			if($this->login && $this->conn_id){
				$buff = ftp_nlist($this->conn_id, ftp_pwd($this->conn_id).$name.'/');
				if($buff != false){
					sort($buff);
					foreach ($buff as $c=>$v) {
						$info = new SplFileInfo($v);
						if($info->getExtension() != ''){
							$res = $this->ftpRemoveFile($v);
							if($res == false){							
								return false;
							}
						}
						else{
							$res = $this->ftpRemoveDirectory($v);
							if($res == false){
								return false;
							}
						}
					}
				}
				if (ftp_rmdir($this->conn_id, $name)) {
					return array('Result'=>'Directorio eliminado Satisfactoriamente.');
				} else {
					return false;
				}
			}
			else{
				$this->conn_id = ftp_connect('127.0.0.1');
				$this->login = ftp_login($this->conn_id, 'VirFile', 'admin');
				$this->ftpRemoveDirectory($name);
			}
		}
		public function ftpChangeName($oldname, $newname){
			if($this->login && $this->conn_id){
				if (ftp_rename($this->conn_id, $oldname, $newname)) {
					$this->ftpFree();
					return array('Result'=>'Nombre Cambiado Satisfactoriamente.');
				} else {
					$this->ftpFree();
					return false;
				}
			}
			else return false;
		}

		public function ftpDownload($name, $path){
			if($this->login && $this->conn_id){
				if (ftp_get($this->conn_id, './Downloads/'.$name, $path, FTP_BINARY)) {
					$this->ftpFree();
					return array('Result'=>'Descarga Completada con exito.');
				} else {
					$this->ftpFree();
					return false;
				}
			}
			else return false;
		}

		public function ftpFree(){
			if(isset($this->conn_id)) ftp_close($this->conn_id);
		}
	}
?>