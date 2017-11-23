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

		public function ListDirectory(){
			$res = $this->Model->ftpListDir();
			if($res != false) return $res;
			else return array('Error'=>'Error al obtener los datos.');
		}
		public function changeDir($dir){
			$res = $this->Model->cDir($dir);
			/*if($res != false) return array('Result'=>'Directorio cambiado.');
			else return array('Result'=>'Error al cambiar de directorio.');*/
		}

	}
?>