<?php
	require_once('./Model/userModel.php');
	class userController{
		function __construct(){
			$this->Model = new userModel();
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

		public function createDir($dir){
			$res = $this->Model->ftpCreateDir($dir);
			if($res != false) return $res;
			else return array('Error'=>'Error el crear el directorio (Probablemente el directorio ya existe).');
		}
	}
?>