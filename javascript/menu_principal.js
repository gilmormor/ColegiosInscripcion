$(document).ready(function() 
{	// dialog que muestra el gif de espera, en las consultas
	$('#mensaje1').hide();
	$('#mensaje2').html('<font color="red">'+sessvars.mensajefininsc+"</font>");
	$.ajax({
			type 	: 'POST',
			url		: 'controladores/controlador_datoscolegio.php',
			data 	: 
			{
				accion         : "consultar"
			},
			dataType: 'json',
			encode	: true
	})
	.done(function(datos){
		//ESPESIFICAR COMO ACTUAR CON LOS DATOS RECIBIDOS
		if(datos.exito)
		{
			$('#titulo').html(datos.datos[0]['nomcorto']);
			$('#titulosist').html(datos.datos[0]['nomcolegio']);
			
		}else
		{
			alertify.error(datos.mensaje);
		}
	});

	tamanoVentana();
	$(window).resize(function() {
		tamanoVentana();
	});


	if(sessvars.fil_inscviva == 1)
	{
		$('#mensaje1').hide();
	}else
	{
		$('#mensaje1').show();
	}

});

function tamanoVentana()
{
	aux_alto = $( window ).height() - 157
	$('#central').height(aux_alto);
}