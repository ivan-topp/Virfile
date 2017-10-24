<?php
	require_once('../Db/db.php');
	function Logear($uc, $p){
		$DB = new Database();
		$Con = $DB->Connect();
		$sql= "SELECT * FROM USUARIO WHERE (NombreUsuario = '".$uc."' OR Correo = '".$uc."') AND Contraseña = '".$p."' LIMIT 1;";
        $query = $Con->prepare($sql);
        $query->execute();
        $DB->free();
        $rows = $query->fetchAll();
        if ($query->rowCount() > 0){
        	return $rows;
        }
        else{
        	return 'Error';
        }
	}
?>