<?php
	require_once('./Db/db.php');
	require("./Controller/adminController.php");

	if(isset($_POST["btndelete"])){
		//echo $_POST["iduser"];
		$_SESSION["Enterprise"] = $_POST["empre"];
		$adm=new adminController();
		$res =$adm->Eliminar();

		if ($_SERVER["REQUEST_METHOD"] == "POST"){
		    $numero=$_POST["numero"];
		    for ($i = 0; $i < count($numero); $i++){
		        echo "Se ha eliminado : ".$numero[$i]."<br>";
		    }
		}
		if($res != false){
			echo json_encode($res);
		}
	}
?>