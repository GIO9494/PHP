 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="#" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			
			<img src="views/img/plantilla/logo.png" class="img-responsive" style="padding:8px 3px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">
			
			<img src="views/img/plantilla/logoo.png" class="img-responsive" style="padding: 3px 0px">

		</span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
			<span>Menu</span>
      	
      	</a>
		


		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					
					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{
						echo '<img src="views/img/usuarios/default/um1.jpg" class="user-image">';

					}
					?>					
						<span class="hidden-xs jean"><?php echo $_SESSION["nombre_Cuenta"]; ?></span>						
					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">
						
						<li class="user-body">
							
							<div class="pull-right">
								
								<a href="salir" class="btn btn-default btn-flat" style="background: skyblue" size="10">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>