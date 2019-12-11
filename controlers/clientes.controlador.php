<?php

class Controladorcliente
{
    
    public static function CtrCrearcliente()
    {
        
        if (isset($_POST["nrocelc"])) {
            if (// preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombrec"]) &&
                // preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ApPaternoc"]) &&
                 //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ApMaterno"]) &&
                 preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["Cic"]) &&
                preg_match('/^[a-zA-Z0-9.@]+$/', $_POST["emailc"]) &&
                 preg_match('/^[Z0-9 ]+$/', $_POST["nrocelc"]))  
                 {
                    
        $tabla="persona";
                $datos = array("Nombre" => $_POST["nombrec"], 
                               "Ap_Paterno" => $_POST["ApPaternoc"],
                              "Ap_Materno" => $_POST["ApMaternoc"],
                              "Ci" => $_POST["Cic"],
                              "Genero" => $_POST["generoc"],
                              "Correo_Electronico" => $_POST["emailc"],
                              "Nro_Cel" => $_POST["nrocelc"],
                             "Fecha_Nac"=>$_POST["fechanacc"]);


         $tabla1="cliente";

         $datos1 = array("Grado_Cliente" => $_POST["grado"],
                     "Cod_Casillero" => $_POST["nuevocasillero"],
                     "Costo_ing" => $_POST["costo_Ing"],
                       "Codigo_C"=> $_POST["codigo"]);  
                            


        $respuesta = Modelocliente::mdlIngresarclientetotal($tabla,$datos,$tabla1, $datos1);

         echo "<script>";
         echo "alert('";
         echo  $respuesta;
         echo "')</script>";

                if ( $respuesta === "ok" ) {
                    echo '<script>
                                swal({
                                    type: "success",
                                    title: "EL CLIENTE A SIDO GUARDADO CORRECTAMENTE",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false

                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "clientes";
                                    }
                                });
                                </script>';
                } else {
                    echo '<script>

        swal({
            type: "error",
            title: "¡El Cliente no ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "clientes";
            }
        });
        </script>';

                }
            } else {
                echo '<script>

        swal({
            type: "error",
            title: "¡Los datos tienen errores los datos deben estar sin caracteres especiales ni puntos, <br> (Nombre y Fecha de nacimiento 1996-09-22 nro de carnet (12457890LP)!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{
            if(result.value){
                window.location = "clientes";
            }
        });
        </script>';
            
           }
        }
    }
    
    static public function ctrMostrarclientes($item, $valor){
        $tabla = "persona";
        $tabla1 ="cliente";   
		$respuesta =Modelocliente::MdlMostrarcliente($tabla,$tabla1, $item, $valor);
		return $respuesta;
    }
}
