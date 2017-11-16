<?php include('./View/header.php');?>
	<title>VirFile</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 service">
				<div class="center">
					<h1>¿Qué Ofrecemos?</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur officia expedita beatae veniam alias adipisci magni eius dolores vero dolore id rerum necessitatibus, modi quasi nobis esse placeat officiis, quo?</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 About-us">
				<div class="text-center">
					<h1>Acerca de Nosotros</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur officia expedita beatae veniam alias adipisci magni eius dolores vero dolore id rerum necessitatibus, modi quasi nobis esse placeat officiis, quo?</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 contacto">
				<div class="text-center">
					<h1>Contacto</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur officia expedita beatae veniam alias adipisci magni eius dolores vero dolore id rerum necessitatibus, modi quasi nobis esse placeat officiis, quo?</p>
				</div>
			</div>
		</div>
		<form action="" method="POST">
			<label for="User"></label>
			<input type="text" id="User" name="User" placeholder="Usuario o Correo" required>
			<label for="Pass"></label>
			<input type="password" id="Pass" name="Pass" placeholder="Contraseña" required>
			<input type="submit" name="Login" id="Login">
		</form>
		<?php include('./View/footer.php');?>
	</div>
	<script src="./Resources/Jquery/jquery-3.2.1.min.js"></script>
	<script src="./Resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="./Resources/App/js/Main.js"></script>
</body>
</html>