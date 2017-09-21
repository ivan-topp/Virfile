<?php

	session_start();
	
	#Constantes de conexion a BD

	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'proyecto');

	#Constantes para la pagina
	define('HTML_DIR', 'HTML/');
	define('APP_NAME','Proyecto');
	define('COPYRIGHT','Copyright &copy; 2017 - '.date('Y',time()).' Todos Los Derechos Recervados: '.APP_NAME.'.');
	define('URL', 'http://localhost:8090/Lenguaje%20de%20Marcado/Proyecto/');

	#Estructura

	require('Core/Models/class.Conexion.php');
	require('Core/Bin/Functions/Encrypt.php');



?>