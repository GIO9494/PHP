/*=============================================
SUBIENDO LA FOTO DEL CURSO
=============================================*/

$(".nuevafotoc").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevafotoc").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevafotoc").val("");

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
EDITAR Curso
=============================================*/

$(".btneditarcurso").click(function(){

	var codcurso = $(this).attr("codcurso");
	 var datos = new FormData();
	 datos.append("codcurso", codcurso);
 
	 $.ajax({
 
		 url:"ajax/cursos.ajax.php",
		 method: "POST",
		 data: datos,
		 cache: false,
		 contentType: false,
		 processData: false,
		 dataType: "json",
 
		 success: function(respuestas){
		 
			$("#editarhorario").val(respuestas["Id_Horario"]);
			$("#editarcurso").val(respuestas["Nombre_Curso"]);
			$("#editarubi").val(respuestas["Ubicacion"]);
		$("#editarpersonai").val(respuestas["Id_Instructor"]);
			$("#editarcupos").val(respuestas["Cant_Cupos"]);
			$("#editarcertificacion").val(respuestas["Certificacion"]);
			$("#editarcosto").val(respuestas["Costo"]);
			
			if(respuestas["fotoC"] != ""){

				$(".previsualizar").attr("src", respuestas["fotoC"]);

			}
 
		 }
 
	 });
	})

/*=============================================
eliminar curso
=============================================*/

$(".btneliminarcurso").click(function(){
	   
	var codcursos = $(this).attr("codcursos");
	var fotocurso = $(this).attr("fotocurso");
	var curso = $(this).attr("curso");
	  console.log("codcurso",codcursos);
      console.log("foto",fotocurso);
	  console.log("codcurso",curso);
	  
	  swal({
		title: '¿Está seguro de borrar el curso?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si, borrar curso!'
	  }).then((result)=>{
		if(result.value) {
	
		  window.location = "index.php?ruta=categorias&codcursos="+codcursos+"&curso="+curso+"&fotocurso="+fotocurso;
	
		}
	
	  })
	  
  
  })



































/*=============================================
ACTIVAR Curso
=============================================*/

$(".btnActivar").click(function(){

	var Cod_Curso = $(this).attr("Cod_Curso");
	var estadoCurso = $(this).attr("estadoCurso");

	var datos = new FormData();
 	datos.append("activarId", Cod_Curso);
  	datos.append("activarCurso", estadoCurso);

  	$.ajax({

	  url:"ajax/Cursos.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      }

  	})

  	if(estadoCurso == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoCurso',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoCurso',0);

  	}

})


/*=============================================
REVISAR SI EL Curso YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoCurso").change(function(){

	$(".alert").remove();

	var Curso = $(this).val();

	var datos = new FormData();
	datos.append("validarCurso", Curso);

	 $.ajax({
	    url:"ajax/Cursos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoCurso").parent().after('<div class="alert alert-warning">Este Curso ya existe en la base de datos</div>');

	    		$("#nuevoCurso").val("");

	    	}

	    }

	})
})


/*=============================================
ELIMINAR Curso
=============================================*/

$(".btnEliminarCurso").click(function(){
	
  var Cod_Curso = $(this).attr("Cod_Curso");
  var fotoCurso = $(this).attr("fotoCurso");
  var Curso = $(this).attr("Curso");

  swal({
    title: '¿Está seguro de borrar el Curso?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Curso!'
  }).then((result)=>{

    if(result.value){

      window.location = "index.php?ruta=Cursos&Cod_Curso="+Cod_Curso+"&Curso="+Curso+"&fotoCurso="+fotoCurso;

    }

  })

})
