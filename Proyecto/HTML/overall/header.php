<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo URL;?>">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./Views/Bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./Views/App/css/styles.css" rel="stylesheet">
    <script src="Views/App/js/funciones_generales.js"></script>
	<title><?php echo APP_NAME;?></title>
</head>
<body>
	<div class="container-fluid">
		<header>         <!-- header -->
			<nav class="navbar navbar-default navbar-fixed-top cabecera">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="#" class="navbar-brand"><?php echo APP_NAME;?> (Puede Ir el Logo Aquí)</a>
					</div>
					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav">
							<li><a href="">Página 1</a></li>
							<li><a href="">Página 2</a></li>
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Dropdown <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Página 1</a></li>
									<li><a href="#">Página 2</a></li>
									<li class="divider"></li>
									<li><a href="#">Página 3</a></li>
								</ul>
							</li>
						</ul>
						<!--<form action="" class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Buscar">
							</div>
						</form>-->
						<form class="navbar-form navbar-right">
							<?php 
								if(!isset($_SESSION["app_id"])){
									echo "<a href='#' class='btn btn-default' data-toggle='modal' data-target='#LoginModal'>Ingresar</a>
							<a href='#' class='btn btn-default' data-toggle='modal' data-target='#RegisterModal'>Registrar</a>";
								}else{
									echo "<a href='#' class='btn btn-default'>Cuenta</a>
							<a href='index.php?view=logout' class='btn btn-default'>Cerrar Sesion</a>";
								}
								
							?>
							
						</form>
					</div>
				</div>
			</nav>
		</header>
		<?php 
			if(!isset($_SESSION["app_id"])){
				include(HTML_DIR.'public/login.html');
				include(HTML_DIR.'public/reg.html');
			}
		?>