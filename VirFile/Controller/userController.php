<?php
	require_once('./Model/userModel.php');
	class userController{
		function __construct(){
			$this->Model = new userModel();
			//$this->FTP_Cnx = ftp_connect('127.0.0.1')
		}

		public function uploadFile($name, $temp){
			if($this->Model->upFile($name, $temp)){
				return array('Result'=>'Archivo subido correctamente.');
			}else{
				return array('Result'=>'Problemas al subir el archivo.');
			}
		}

		public function ListDirectory($dir){
			$res = $this->Model->ftpListDir($dir);
			if($res != false) return $res;
			else return array('Error'=>'Error al obtener los datos.');
		}
	}
?>