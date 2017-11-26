<?php include('./View/header.php');?>
	<title>VirFile</title>
</head>
<body>
	<div id="bar">
        <div id="containerlogin">
        	
        	<button> <a href="#ofrecemos"> Que Ofrecemos</a></button>
        	<button> <a href="#Nosotros"> Nosotros</a></button>
        	<button> <a href="#contacto"> contacto</a></button>

            <!-- Login Starts Here -->
            <div id="loginContainer">
                <a href="#" id="loginButton"><span>Login</span><em></em></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <form id="loginForm" method="POST">
                        <fieldset id="body">
                            <fieldset>
                                <label for="User"></label>
								<input type="text" id="User" name="User" placeholder="Usuario o Correo" required>
                            </fieldset>
                            <fieldset>
                                <label for="Pass"></label>
								<input type="password" id="Pass" name="Pass" placeholder="Contraseña" required>
								
                            </fieldset>
                            <input type="submit" name="Login" id="Login">
                        </fieldset>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 service">
				<div class="center">
					<a name="ofrecemos"></a>
					<h1>¿Qué Ofrecemos?</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur officia expedita beatae veniam alias adipisci magni eius dolores vero dolore id rerum necessitatibus, modi quasi nobis esse placeat officiis, quo?</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 About-us">
				<div class="text-center">
					<a name="Nosotros"></a>
					<h1>Acerca de Nosotros</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur officia expedita beatae veniam alias adipisci magni eius dolores vero dolore id rerum necessitatibus, modi quasi nobis esse placeat officiis, quo?</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 contacto">
				<div class="text-center">
					<a name="contacto"></a>
					<h1>Contacto</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur officia expedita beatae veniam alias adipisci magni eius dolores vero dolore id rerum necessitatibus, modi quasi nobis esse placeat officiis, quo?</p>
				</div>
			</div>
		</div>
		<?php include('./View/footer.php');?>
	</div>
	<script src="./Resources/Jquery/jquery-3.2.1.min.js"></script>
	<script src="./Resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="./Resources/App/js/Main.js"></script>
	<script src="./Resources/App/js/login.js"></script>
	
</body>
</html>