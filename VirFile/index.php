<?php
	session_start();
	require("./Controller/adminController.php");
	if(!isset($_SESSION['ID']) and !isset($_SESSION['Level']) and !isset($userController)){
		include('./View/home.php');
	}else{
		//if(isset($_POST["btndelete"])){
		
		if(isset($_POST["btnlist"])){
			$empresa = $_POST["empre"];
			$adm=new adminController();
			$res =$adm->Listar();
			if($res != false) {
				//<input type='hidden' name='res' value='".json_encode($res)."'>
				echo"<form action='./recibe.php' method='POST'>
					 <table border='1'>";
				for ($i=0; $i <count($res); $i++) {		
					echo "<tr>
							<td><input type='checkbox' name='numero[]' id='cbox".$i."' value='".$res[$i][0]."'></input></td>
							<td>USUARIO : ".$res[$i][1]."</td>
							<td>CORREO  : ".$res[$i][5]."</td>
							<input type='hidden' name='iduser' value='".$_SESSION['ID']."'";
					echo    "<input type='hidden' name='empre' value='".$empresa."'";

					echo "
						  </tr>
						 ";
				}
				echo "</table>";
				echo "<input type='submit' name='btndelete' value='ELIMINAR SELECCIONADOS'></input></form>";
				//type="submit" name="Logout" id="Logout" value="Logout"
				echo json_encode($res);
			}
			else echo json_encode(array('Error'=>'ashdkahs'));
		}

		else{
			if($_SESSION['Level']==0){
				header("Location: ./Perico.php");
			}
			if($_SESSION['Level']==1){
				header("Location: ./vistadmin.php");
			}
		}

	}
?>
