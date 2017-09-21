<?php

	if($_POST){
		require('Core/core.php');
		switch (isset($_GET["mode"]) ? $_GET["mode"] : null) {
			case 'login':
				require('Core/Bin/Ajax/Logea.php');
				break;

			case 'register':
				require('Core/Bin/Ajax/Registra.php');
				break;
			
			default:
				header('location: index.php');
				break;
		}
	}else{
		header('location: index.php');
	}

?>