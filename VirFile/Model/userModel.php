<?php
	require_once('./Db/db.php');
	class userModel{
		function __construct(){
			$this->conn_id = ftp_connect('127.0.0.1');
			$this->login = ftp_login($this->conn_id, 'VirFile', 'admin');
		}

		public function upFile($name, $temp){
			if($this->login && $this->conn_id){
				if(ftp_put($this->conn_id, $_SESSION['ID'].'/'.$name, $temp,FTP_BINARY)){
					$this->ftpFree();
					return true;
				}else{
					$this->ftpFree();
					return false;
				}
			}else{
				return false;
			}
		}

		public function ftpListDir($dir){
			if($this->login && $this->conn_id){
				$res = array();
				$buff = ftp_nlist($this->conn_id, ftp_pwd($this->conn_id).$dir.'/');
				sort($buff);
				foreach ($buff as $c) {
					str_replace(".","",$c,$i);
					if($i==0){
						array_push($res, $c.',Dire');
					}else{
						array_push($res, $c.',File');
					}
				}
				$this->ftpFree();
				return $res;
			}else{
				return false;
			}
		}

		public function ftpFree(){
			if(isset($this->conn_id)) ftp_close($this->conn_id);
		}
	}
?>