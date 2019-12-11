/*=============================================
SUBIENDO LA FOTO DEL INSTRUCTOR 
=============================================*/

$(".nuevafotoI").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevafotoI").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevafotoI").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})


	/*=============================================
  	EDITAR INSTRUCTOR
  	=============================================*/



$(".btnEditarInstructor").click(function(){
	
	var idInstructor = $(this).attr("idInstructor");
	console.log('Instructor: ',idInstructor);


	var bandera=true;
	var datos = new FormData();
	datos.append("idInstructor", idInstructor);

	$.ajax({

		url:"ajax/instructores.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
		
			console.log("fecha", respuesta["Nro_de_Meritos"]);
			$("#editarnombre").val(respuesta["Nombre"]);
			$("#editarappaterno").val(respuesta["Ap_Paterno"]);
			$("#editarapmaterno").val(respuesta["Ap_Materno"]);
			$("#editarci").val(respuesta["Ci"]);
			$("#editaremail").val(respuesta["Correo_Electronico"]);
			$("#editarnrocel").val(respuesta["Nro_Cel"]);
			$("#editarfechanac").val(respuesta["Fecha_Nac"]);
			$("#editarmeritos").val(respuesta["Nro_de_Meritos"]);
			$("#editarespecialidades").val(respuesta["Especialidades"]);
			$("#fotoActual").val(respuesta["foto"]);
			$("#editarfoto").val(respuesta["foto"]);
			
			if (respuesta["Genero"]=="Masculino") {
				$("#g1").val(true);
			
			} else {
				if (respuesta["Genero"]=="Femenino") {
					$("#g2").val(bandera);
				} else {
					$("#g3").val(bandera);
					
				}
				
			}
			
			

			 if(respuesta["foto"] != ""){

			 	$(".previsualizar").attr("src", respuesta["fotoI"]);

			}

		}

	});

})


	/*=============================================
  	EDITAR INSTRUCTOR
  	=============================================*/

	 
$(".btnEliminarInstructor").click(function(){
	
	var idInstructor = $(this).attr("idInstructor");
	var fotoI = $(this).attr("fotoI");
	var Nombre = $(this).attr("Nombre");
  
	swal({
	  title: '¿Está seguro de borrar el instructor?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar usuario!'
	}).then((result)=>{
  
	  if(result.value){
  
		window.location = "index.php?ruta=instructores&idInstructor="+idInstructor+"&Nombre="+Nombre+"&fotoI="+fotoI;
  
	  }
  
	})
  
  })
  
   