<?php

class ControladorUsuarios
{    
    public static function ctrIngresoUsuario()
    {
        if (isset($_POST["ingUsuario"])) 
		{
            if (preg_match('/^[a-zA-z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-z0-9]+$/', $_POST["ingPassword"])) 
			{                
                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');                
                $tabla = "cuenta";
                $item = "nombre_Cuenta";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
                   
                if ($respuesta["nombre_Cuenta"] == $_POST["ingUsuario"] && $respuesta["passwords"] ==  $encriptar  )
                {
                    if($respuesta["estado"] == 1)
					{
						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["Id_Usuario"] = $respuesta["Id_Usuario"];
						$_SESSION["nombre_Cuenta"] = $respuesta["nombre_Cuenta"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["perfil"] = $respuesta["perfil"];
						

                        /*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/La_Paz');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;
                        
						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "Id_Usuario";
						$valor2 = $respuesta["Id_Usuario"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
		//-------------------------				

/*						
						if($ultimoLogin == "ok"){							
							$resultp=ModeloUsuarios::Mdlpermiso($tablap, $id_persona);
							//echo implode($resultp);
							echo $resultp["tcp_id"];
							echo ("hola");/*
							echo '<script>
								window.location = "inicio";
							</script>';

						//}  */						

                        if($ultimoLogin == "ok")
						{							
							if($_SESSION["perfil"] == "Administracion")
							{
							echo '<script>
								window.location = "inicio";
								</script>';
							}
							if($_SESSION["perfil"] == "Recepcion")
							{
								echo '<script>
								window.location = "inicio2";
								</script>';
							}
							if($_SESSION["perfil"] == "Ventas")
							{
								echo '<script>
								window.location = "inicio3";
								</script>';
							}
						}
					}
					else
					{
						echo '<br>
						<div class="alert alert-danger">El usuario aún no está activado</div>';
					}
				}
				else
				{
					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
			    }
			}
		}
	}

    /* registro usuario */
    public static function CtrCrearUsuario()
    {          
        if (isset($_POST["nuevoUsuario"])) {

            if (preg_match('/^[a-zA-Z0-9.@]+$/', $_POST["Email"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]) 
                ) {

                /*validar imagen */
                $ruta ="";
                if (isset($_FILES["nuevafoto"]["tmp_name"])) {
                    list($ancho, $alto)=getimagesize($_FILES["nuevafoto"]["tmp_name"]);
                   
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                   /* creamos el directorio a guardar la foto del usuario*/
                   
                $directorio ="views/img/usuarios/".$_POST["nuevoUsuario"];
                mkdir($directorio,0755);
                   /* de acuerdo al tipo de imagen aplicamos las funciones por defecto de php*/
                if($_FILES["nuevafoto"]["type"] == "image/jpeg"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "views/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["nuevafoto"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen,0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($_FILES["nuevafoto"]["type"] == "image/png"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "views/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["nuevafoto"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen,0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }
                
                }

                $tabla = "cuenta";
               $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("perfil" => $_POST["NuevoPerfil"],
                               "nombre_Cuenta" => $_POST["nuevoUsuario"], 
                               "passwords" =>$encriptar,
                              "email" => $_POST["Email"],
                             "foto"=>$ruta);
               
                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

             
                if ($respuesta === "ok") {
                    echo '<script>
                                swal({
                                    type: "success",
                                    title: "EL USUARIO A SIDO GUARDADO CORRECTAMENTE",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "usuarios";
                                    }
                                });
                                </script>';
                } else {
                    echo '<script>

        swal({
            type: "error",
            title: "¡El usuario no ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "usuarios";
            }
        });
        </script>';

                }
            } else {
                echo '<script>

        swal({
            type: "error",
            title: "¡El usuario no pude usar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "usuarios";
            }
        });
        </script>';
            }

        }
    }
    static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "cuenta";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
    }
    
    /*=============================================
	EDITAR USUARIO
	=============================================*/
    
	static public function ctreditarUsuario(){

		if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarUsuario"])){
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];
				if(isset($_FILES["editarfoto"]["tmp_name"]) && !empty($_FILES["editarfoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarfoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "views/img/usuarios/".$_POST["editarUsuario"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    
					if($_FILES["editarfoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarfoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarfoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarfoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "cuenta";
               
				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									  }).then((result) => {
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';

					}

				}else{

					$encriptar = $passwordActual;

                }
                $tabla = "cuenta";
                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                   
                 $datos = array("perfil" => $_POST["editarPerfil"],
                                "nombre_Cuenta" => $_POST["editarUsuario"], 
                                "passwords" =>$encriptar,
                               "email" => $_POST["editarEmail"],
                              "foto"=>$ruta);

                
                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
                
                    echo "<script>";
                    echo "alert('";
                    echo  $respuesta;
                    echo "')</script>";

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){
            
			$tabla ="cuenta";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('views/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);
            echo "<script>";
            echo "alert('";
            echo  $respuesta;
            echo "')</script>";

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}

  

    
}