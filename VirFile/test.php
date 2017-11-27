<?php
	require("./Db/db.php");
	require("./Controller/adminController.php");

	if(isset($_POST["Action"])){
		$adm=new adminController();
		$res =$adm->Listar();
		if($res != false){
			/*for ($i=0; $i <$res.count(); $i++) { 
				$res
			}*/
			echo json_encode();
		}

		else echo json_encode(array('Error'=>'ashdkahs'));
	}

?>