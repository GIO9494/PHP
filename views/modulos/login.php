<!--     Fonts and icons     -->
<!-- CSS Files -->
<link href="views/modulos/assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="views/modulos/assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->


<!--   Core JS Files   -->
<script src="views/modulos/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="views/modulos/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="views/modulos/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="views/modulos/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="views/modulos/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="views/modulos/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="views/modulos/assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>


<div class="wrapper">
	<div class="main">
		<div class="section section-signup" id="#section-signup" style="background-image: url('views/modulos/assets/img/fondito.jpg'); background-size: cover; background-position: top center; min-height: 700px;">
			<div class="container">
				<div class="row">
					<div class="card card-signup"  style="background-image: url('views/modulos/assets/img/10.jpg'); background-size: cover; background-position: top center; min-height: 500px;" >
						<div class="login-box card-header text-center "   style="background-image: url('views/modulos/assets/img/9.jpg'); background-size: cover; background-position: top center; min-height: 500px;" >
												<!-- /.login-logo -->
						    <div class="container" >
								<h5 class="login-box-msg"> <a>SISTEMA DE ADMINISTRACIÓN DE PISCINAS VER 1.0 </a></h5>								
								<h3 class="card-title title-up">  <a href="" class="btn btn-neutral btn-round btn-lg">INICIAR SESIÓN </a></h3>
								<p class="login-box-msg" >Para Ingresar al sistema digite su nombre y contraseña</p>
								<form method="post">
									<?php
									$login = new ControladorUsuarios();
									$login->ctrIngresoUsuario();
									?>
									
									<div class="form-group has-feedback">
									  <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
									  <span class="glyphicon glyphicon-user form-control-feedback"></span>
									</div>

									<div class="form-group has-feedback">
									  <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
									  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
									</div>

									<div class="row">
									  <div class="col-xs-8">
										<div class="checkbox icheck">
										  <label>
											<input type="checkbox"  > <h7 class="title"> Recordar Contraseña </h7>
										  </label>
										</div>
									  </div>
									  <!-- /.col -->
									  <div class="col-xs-12">
										<button type="submit" class="btn btn-primary ">INGRESAR</button>
									  </div>
									  <!-- /.col -->
									</div>
								</form>

									<!-- /.social-auth-links -->
									<a href="#" class="title" >Olvide Mi Contraseña</a><br> <br> 
									<!-- <a href="register.html" class="title" >Registrar nuevo usuario</a> -->

							</div>
							<!-- /.login-box-body -->
						</div>

					</div>
												  
				</div>
            </div>
		</div>
	</div>
</div>
