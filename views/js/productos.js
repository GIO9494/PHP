/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/

$(".nuevafotoP").change(function(){
	var imagen = this.files[0];
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevafotoP").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevafotoP").val("");

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

  			$(".previsualizar1").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
EDITAR PRODUCTO
=============================================*/

$(".btnEditarProducto").click(function(){
    
	var Cod_producto=$(this).attr("Cod_producto");

	var datos = new FormData();
	
	datos.append("Cod_producto", Cod_producto);
    
	$.ajax({

		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	
      $("#editarnombreprod").val(respuesta["Nom_Prod"]);
  		$("#editarCantidad").val(respuesta["Cantidad"]);
  		$("#editarProveedor").val(respuesta["Proveedor"]);
  		$("#editarultimacom").val(respuesta["Fecha_Compraul"]);
  		$("#editarprecioC").val(respuesta["Precio_Compra"]);
  		$("#editarprecio").val(respuesta["Precio_Venta"]);
  		$("#Nuevotipo").val(respuesta["Tipo"]);
  		$("#editaringredientes").val(respuesta["Ingredientes"]);
  		if(respuesta["FotoCo"]!=null){
  		  $(".previsualizar1").attr("src",respuesta["FotoCo"]);
  			}
		
		/*OBTENIENDO DATOS QUE FALTAN
		*/
        }
	});

})



/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO

$("#nuevoUsuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

	})
})

=============================================*/

/*=============================================
ELIMINAR USUARIO

$(".btnEliminarUsuario").click(function(){
	
  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then((result)=>{

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})

=============================================*/




$(".btnEliminarProducto").click(function(){
	var Cod_producto=$(this).attr("Cod_producto");
	var fotoCo=$(this).attr("fotoCo");
	var Nom_Prod=$(this).attr("Nom_Prod");
   swal({
        title: '¿Está seguro de borrar el producto?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'  
      
   }).then((result)=>{
     if(result.value){
    window.location = "index.php?ruta=productos&Cod_producto="+Cod_producto+"&Nom_Prod="+Nom_Prod+"&fotoCo="+fotoCo;

     }


   })

})



$(".btnEliminarObjeto").click(function(){
	var Cod_producto=$(this).attr("Cod_producto");
	var FotoO=$(this).attr("FotoO");
	var Nom_Prod=$(this).attr("Nom_Prod");
   swal({
        title: '¿Está seguro de borrar el objeto?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'  
      
   }).then((result)=>{
     if(result.value){
    window.location = "index.php?ruta=productos&Cod_producto="+Cod_producto+"&Nom_Prod="+Nom_Prod+"&FotoO="+FotoO;

     }


   })

})