<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Error</title>
</head>
<body>
	<h1>Ups, Ha ocurrido un error.</h1>
	<?php
	if(isset($_GET['error'])){
		echo "Error: ".$_GET['error'];
	}
	?>
</body>
</html>