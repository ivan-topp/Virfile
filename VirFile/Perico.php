<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hola</title>
</head>
<body>
	<h1>Hi!!</h1>
	<form action="" method="POST">
		<input type="submit" name="Logout" value="Logout">
	</form>
</body>
</html>
<?php
	require_once('./Controller/userController.php');
	session_start();
	$aData = $_SESSION['UserData'];
	$userController = new userController($aData["ID_User"], $aData["User_Name"], $aData["Enterprise"], $aData["Stock"], $aData["Name"], $aData["Mail"], $aData["Password"], $aData["user_Level"]);
	if(isset($_POST["Logout"])){
		unset($userController);
		unset($_SESSION["UserData"]);
		unset($_SESSION["ID"]);
		unset($_SESSION["Level"]);
		header("Location: ./index.php");
	}
?>