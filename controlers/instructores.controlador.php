<?php

class ControladorInstructor
{
    
    public static function CtrCrearInstructor()
    {

        if (isset($_POST["nrocel"])) {

            if ( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ApPaterno"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ApMaterno"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["Ci"]) &&
                preg_match('/^[a-zA-Z0-9.@]+$/', $_POST["emaild"]) &&
                preg_match('/^[Z0-9 ]+$/', $_POST["nrocel"]) &&
                preg_match('/^[Z0-9 ]+$/', $_POST["meritos"]))  
                 {
                /*validar imagen */
                $ruta ="";
                if (isset($_FILES["nuevafotoI"]["tmp_name"])) {
                    list($ancho, $alto)=getimagesize($_FILES["nuevafotoI"]["tmp_name"]);
                   
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                   /* creamos el directorio a guardar la foto del usuario*/
                $directorio3 ="views/img/instructores/".$_POST["nombre"];
                 mkdir($directorio3,0755);

                   /* de acuerdo al tipo de imagen aplicamos las funciones por defecto de php*/
                   if($_FILES["nuevafotoI"]["type"] == "image/jpeg"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "views/img/instructores/".$_POST["nombre"]."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["nuevafotoI"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }
                

                if($_FILES["nuevafotoI"]["type"] == "image/png"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO instructores
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "views/img/instructores/".$_POST["nombre"]."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["nuevafotoI"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }
        }

        $tabla="persona";
                $datos = array("Nombre" => $_POST["nombre"], 
                               "Ap_Paterno" => $_POST["ApPaterno"],
                              "Ap_Materno" => $_POST["ApMaterno"],
                              "Ci" => $_POST["Ci"],
                              "Genero" => $_POST["genero"],
                              "Correo_Electronico" => $_POST["emaild"],
                              "Nro_Cel" => $_POST["nrocel"],
                             "Fecha_Nac"=>$_POST["fechanac"]);
         $tabla1="instructor";
         $datos1 = array("Nro_de_Meritos" => $_POST["meritos"],
                 "Especialidades" => $_POST["especialidades"],
                 "fotoI"=>$ruta);                           
        $respuesta = Modeloinstructor::mdlIngresarinstructortotal($tabla,$datos,$tabla1, $datos1);

         echo "<script>";
         echo "alert('";
         echo  $respuesta;
         echo "')</script>";

                if ( $respuesta === "ok" ) {
                    echo '<script>
                                swal({
                                    type: "success",
                                    title: "EL INSTRUCTOR A SIDO GUARDADO CORRECTAMENTE",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "ingreso";
                                    }
                                });
                                </script>';
                } else {
                    echo '<script>

        swal({
            type: "error",
            title: "¡El Instructor no ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "ingreso";
            }
        });
        </script>';

                }
            } else {
                echo '<script>

        swal({
            type: "error",
            title: "¡Los datos tienen errores los datos deben estar sin caracteres especiales ni puntos, <br> (Nombre Completo y Fecha de nacimiento 1996-09-22) !",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "ingreso";
            }
        });
        </script>';
            }
        }
    }

    /*MOSTRAR CURSO */
    static public function ctrMostrarinstructor($item, $valor){
        $tabla = "persona";
        $tabla1 ="instructor";   
		$respuesta =Modeloinstructor::MdlMostrarinstructor($tabla,$tabla1, $item, $valor);
		return $respuesta;
    }
    

        /*=============================================
	EDITAR INSTRUCTOR
	=============================================*/
    
	static public function ctreditarInstructor(){
        if (isset($_POST["nrocel"])) {

            if ( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarappaterno"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarapmaterno"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarci"]) &&
                preg_match('/^[a-zA-Z0-9.@]+$/', $_POST["editaremail"]) &&
                preg_match('/^[Z0-9 ]+$/', $_POST["editarnrocel"]) &&
                preg_match('/^[Z0-9 ]+$/', $_POST["editarmeritos"]))  
                 {
                
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

					$directorio = "views/img/instructores/".$_POST["editarnombre"];

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

						$ruta = "views/img/instructores/".$_POST["editarnombre"]."/".$aleatorio.".jpg";

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

						$ruta = "views/img/instructores/".$_POST["editarnombre"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarfoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

                $tabla = "persona";
                $tabla1 = "instructor";
                 $datos = array("Nombre" => $_POST["editarnombre"],
                                "Ap_Paterno" => $_POST["editarappaterno"],
                                "Ap_Materno" => $_POST["editarapmaterno"],
                                "Ci" => $_POST["editarci"],
                                "Genero" => $_POST["g1"],
                                "Correo_Electronico" => $_POST["editaremail"],
                                "Nro_Cel" => $_POST["editarnrocel"], 
                               "Fecha_Nac" => $_POST["editarfechanac"]
                               );


                               $tabla1="instructor";
                               $datos1 = array( "Id_Instructor" => $_POST["idInstructor"],
                                   "Nro_de_Meritos" => $_POST["editarmeritos"],
                               "Especialidades" => $_POST["editarespecialidades"],
                               "fotoI"=>$ruta);    
                               echo $datos1;                       
                              $respuesta = Modeloinstructor::mdlEditarInstructor($tabla,$datos,$tabla1, $datos1);
                              echo "<script>";
                              echo "console.log(';
                              echo  $datos1;
                              echo ')</script>";
                               
                
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

	static public function ctrBorrarInstructor(){

		if(isset($_GET["idInstructor"])){
            
			$tabla ="persona";
			$datos = $_GET["idInstructor"];
            $tabla1 ="instructor";
            
			if($_GET["fotoI"] != ""){

				unlink($_GET["fotoI"]);
				rmdir('views/img/instructores/'.$_GET["Nombre"]);

			}

			$respuesta = Modeloinstructor::mdlBorrarInstructor($tabla, $datos,$tabla1);
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