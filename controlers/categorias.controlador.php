<?php

class ControladorCursos
{ 

    public static function CtrCrearcurso()
    {

        if (isset($_POST["nuevocurso"])) {

            if ( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevocurso"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["Certificacion"]) &&
                preg_match('/^[Z0-9 ]+$/', $_POST["Cupos"]) &&
                preg_match('/^[Z0-9 ]+$/', $_POST["Costo"])
                )  
                 {
                /*validar imagen */
                $ruta ="";
                if (isset($_FILES["nuevafotoc"]["tmp_name"])) {
                    list($ancho, $alto)=getimagesize($_FILES["nuevafotoc"]["tmp_name"]);
                   
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                   /* creamos el directorio a guardar la foto del usuario*/
                $directorio1 ="views/img/cursos/".$_POST["nuevocurso"];

                mkdir($directorio1,0755);

                   /* de acuerdo al tipo de imagen aplicamos las funciones por defecto de php*/
                   if($_FILES["nuevafotoc"]["type"] == "image/jpeg"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "views/img/cursos/".$_POST["nuevocurso"]."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["nuevafotoc"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($_FILES["nuevafotoc"]["type"] == "image/png"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "views/img/cursos/".$_POST["nuevocurso"]."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["nuevafotoc"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }
                
                }

                $tabla = "curso";

                $datos = array("Nombre_Curso" => $_POST["nuevocurso"], 
                               "Costo" => $_POST["Costo"],
                              "Cant_Cupos" => $_POST["Cupos"],
                              "Certificacion" => $_POST["Certificacion"],
                              "Id_instructor" => $_POST["nuevapersonai"],
                              "Id_Horario" => $_POST["Nuevohorario"],
                              "Inicio_Fin_Clases" => $_POST["daterange"],
                              "Ubicacion" => $_POST["Ubicacion"],
                             "fotoC"=>$ruta);

                $respuesta = Modelocursos::mdlIngresarcurso($tabla, $datos);

                
                if ($respuesta === "ok") {
                    echo '<script>
                                swal({
                                    type: "success",
                                    title: "EL CURSO A SIDO GUARDADO CORRECTAMENTE",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "categorias";
                                    }
                                });
                                </script>';
                } else {
                    echo '<script>

        swal({
            type: "error",
            title: "¡El Curso no ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "categorias";
            }
        });
        </script>';

                }
            } else {
                echo '<script>

        swal({
            type: "error",
            title: "¡El costo y cantidad de cupos son numeros puede usar caracteres especiales ni letras , <br> (Nuevo curso y certificacion) deben estar sin caracteres especiales ni puntos!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "categorias";
            }
        });
        </script>';
            }
        }
    }
    /*MOSTRAR CURSO */
    static public function ctrMostrarCursos($item, $valor){
		$tabla = "curso";
		$respuesta = Modelocursos::MdlMostrarCursos($tabla, $item, $valor);
		return $respuesta;
    }
	/*=============================================
	EDITAR USUARIO
	=============================================*/
    
	static public function Ctreditarcurso(){
        
		if(isset($_POST["editarcurso"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarcurso"])
            && preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarcosto"])){
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/
                
				$ruta = $_POST["fotoActual1"];
				if(isset($_FILES["editarfotoc"]["tmp_name"]) && !empty($_FILES["editarfotoc"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarfotoc"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "views/img/cursos/".$_POST["editarcurso"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual1"])){

						unlink($_POST["fotoActual1"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    
					if($_FILES["editarfotoc"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/cursos/".$_POST["editarcurso"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarfotoc"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarfotoc"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/cursos/".$_POST["editarcurso"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarfotoc"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}
                $tabla = "curso";
               
                   
                 $datos = array("Id_Horario" => $_POST["editarhorario"],
                                "Nombre_Curso" => $_POST["editarcurso"], 
                                "Ubicacion" => $_POST["editarubi"], 
                                "Id_Instructor" => $_POST["editarpersonai"], 
                                "Cant_Cupos" => $_POST["editarcupos"], 
                                "Certificacion" => $_POST["editarcertificacion"], 
                                "Costo" => $_POST["editarcosto"], 
                                "fotoC" =>$ruta,
                            );
                $respuesta = Modelocursos::mdleditarcurso($tabla, $datos);
                
                    echo "<script>";
                    echo "alert('";
                    echo  $respuesta;
                    echo "')</script>";

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El curso ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡llene los datos correctos en cada una de las celdas!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "categorias";

							}
						})

			  	</script>';

			}

		}

    }



    static public function ctrborrarcurso(){
        
        
        if (isset($_GET["codcursos"])) {

        $tabla ="curso";
        $datos = $_GET["codcursos"];
        if($_GET["fotocurso"] != "" && $_GET["fotocurso"] !="Views/img/cursos/defaultc/curso.jpg"){

            unlink($_GET["fotocurso"]);
            rmdir('views/img/cursos/'.$_GET["curso"]);
            
        }
        
                         
        $respuesta = Modelocursos::mdlborrarcurso($tabla, $datos);
        echo "<script>";
        echo "alert('";
        echo  $respuesta;
        echo "')</script>";

        if($respuesta == "ok"){

            echo'<script>

            swal({
                  type: "success",
                  title: "El curso ha sido borrado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                  }).then((result) => {
                            if (result.value) {

                            window.location = "categorias";

                            }
                        
                        })
            </script>';

        }		
    }
    
 }
    	
}