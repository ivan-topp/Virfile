<?php
	require_once('./Model/userModel.php');
	class userController{
		function __construct(){
			$this->Model = new userModel();
		}

		public function uploadFile($name, $temp, $size){
			$res = $this->Model->upFile($name, $temp, $size);
			if($res != false){
				if($res != "ErrorPeroSubido" and $res != "Error de Capacidad") return array('Result'=>'Archivo subido correctamente.');
				else if($res == "Error de Capacidad") array('Error'=>'Haz Exedido la capacidad maxima.');
			}else{
				return array('Error'=>'Problemas al subir el archivo.');
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
			else return array('Error'=>'Error al crear el directorio (Probablemente el directorio ya existe).');
		}

		public function remove($name, $type){
			if($type == "File") $res = $this->Model->ftpRemoveFile($name);
		    else $res = $this->Model->ftpRemoveDirectory($name);
		    if($res != false) return $res;
		    else if($res==false && $type == 'File') return array('Error'=>'Error al eliminar el archivo (Probablemente el archivo que usted selecciono para eliminar ya ha sido eliminado).');
		    else return array('Error'=>'Error al eliminar el directorio (Probablemente el directorio que usted selecciono para eliminar ya ha sido eliminado).');
		}

		public function changeName($oldname, $newname){
			$res = $this->Model->ftpChangeName($oldname, $newname);
			if($res != false) return $res;
			else return array('Error'=>'Error al cambiar el nombre del archivo o directorio que usted ha seleccionado.');
		}

		public function download($name, $path){
			$res = $this->Model->ftpDownload($name, $path);
			if($res != false) return $res;
			else return array('Error'=>'Error al realizar la descarga.');
		}
	}
?>