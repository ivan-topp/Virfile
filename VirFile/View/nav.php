	<nav class="navbar navbar-default mar0 navStyle">
		<div class="container-fluid">
	    	<div class="navbar-header">
	    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#NavbarBody" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
	    		<a class="navbar-brand" href=".">
	    			<img alt="Logo VirFile">
	    		</a>
	    	</div>
	    	<div class="collapse navbar-collapse" id="NavbarBody">
				<ul class="nav navbar-nav">
				<?php
					if(!isset($_SESSION['ID'])){
				?>
	        		<li><a href="#service">¿Que Ofrecemos?</a></li>
	        		<li><a href="#Nosotros">Nosotros</a></li>
	        		<li><a href="#contacto">Contacto</a></li>
	        	<?php }?>
	        	</ul>
	        	<form class="navbar-form navbar-right">
					<?php
						if(!isset($_SESSION['ID'])){
					?>
					<a id="btnLogin" href='#' class='btn btn-default' data-toggle='modal' data-target='#modalLogin'>Ingresar</a>
		        	<?php }?>
			    </form>
		    </div>
	  	</div>
	</nav>