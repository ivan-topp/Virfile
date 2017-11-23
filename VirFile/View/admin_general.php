<?php include('header.php');?>
	<title>VirFile</title>
	<link rel="stylesheet" href="../Resources/Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../resources/App/css/styles.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-9" >
				<div class="row" style="background-color: white;height: 90vh; padding-left: 10vw; padding-right: 10vw; font-family: Century Gothic, Georgia;">
					<div class="center">
						<h1>Welcome</h1>
					</div>
				</div>
				<div class="row" style="background-color: #585858;height: 10vh; padding-left: 10vw; padding-right: 10vw; padding-top: 1.5vw; font-family: Century Gothic, Georgia;">
					<div style="text-align: center; color:red;">
						Status_Bar
					</div>
				</div>
			</div>
			<div class="col-xs-3" style="padding-left: 5vh;padding-right: 5vh; height: 100vh; background-color: #8181F7">
				<div class="row" style="background-color: #8181F7;height: 20vh auto; padding-left: 40%; padding-right: 50%;padding-top: 1%; font-family: Century Gothic, Georgia; -webkit-user-select: none; -moz-user-select: none;-khtml-user-select: none;-ms-user-select:none;">
					<div style="text-align: right;">
						<input type="submit" value="LogOut">
					</div>
					<br>
					<img src="../Resources/Image/icono_standar.png" alt="c" height="50"/>
					<br>
					<div style="margin-left: 1%; margin-right: 1%;">Name_user.perico</div>
					
				</div>
					<br>
				<div class="row" style="background-color: #A4A4A0;height: 7.5vh; padding-left: 0vw; padding-top: 1.1vw; font-family: Century Gothic, Georgia; border-style: outset; -webkit-user-select: none; -moz-user-select: none;-khtml-user-select: none;-ms-user-select:none; ">
					<div style="text-align: center;">Manage Enterprise</div>
				</div>
				<br>
				<div class="row" style="background-color: #A4A400;height: 7.5vh; padding-left: 1%; padding-top: 1.1%;padding-right:1%; font-family: Century Gothic, Georgia; border-style: outset; -webkit-user-select: none; -moz-user-select: none;-khtml-user-select: none;-ms-user-select:none;">
					<div style="text-align: center;">Register Enterprice</div>
				</div>
				<br>
				<div class="row" style="background-color: #A4A4FF;height: 7.5vh; padding-left: 1%; padding-top: 1.1%;padding-right:1%; font-family: Century Gothic, Georgia; border-style: outset; -webkit-user-select: none; -moz-user-select: none;-khtml-user-select: none;-ms-user-select:none;">
					<div style="text-align: center;">Register User</div>
				</div>
				<br>
				<div class="row" style="background-color: #A4A4AA;height: 7.5vh; padding-left: 0%; padding-top: 1%;padding-right:1%; font-family: Century Gothic, Georgia; border-style: outset; -webkit-user-select: none; -moz-user-select: none;-khtml-user-select: none;-ms-user-select:none;" id="Setting" name="Setting" onclick="">
					<div style="text-align: center;">Setting</div>
				</div>
				<br>
				<div class="row" style="background-color: #A4A4AA;height: 33vh; padding-left: 0vw; padding-top: 1.1vw; font-family: Century Gothic, Georgia; -webkit-user-select: none; -moz-user-select: none;-khtml-user-select: none;-ms-user-select:none;">
				</div>
			</div>
		</div>
		<?php include('footer.php');?>
	</div>
	<script src="./Resources/Jquery/jquery-3.2.1.min.js"></script>
	<script src="./Resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="./Resources/App/js/GeneralActions.js"></script>
</body>
</html>