
function() {
  

  var dataUser = {
    "canvas": canvas.toDataURL("image/png"),
    "fecha_cita": $("#fecha_cita").val(),
    "id_direccion": $("#direccion").val(),
    "id_oficina": $("#id_oficina").val(),
    "estado": $("#estado").val(),
    "codigo": $("#codigo").val()
  };
  //validamos que no quede ningun campo vacio
  if (
    dataUser.codigo === '' ||
    dataUser.fecha_cita === '' ||
    dataUser.id_oficina === '') {
    // mensaje en caso de que exista un campo vacio del formulario
    $("#alerta").html("<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='icon fa fa-warning'></i> Alerta...! Informacion Incompleta, debe llenar todos los campos....</div>");
    //En caso contrario que no hayan campos vacios enviamos los parametros por ajax
  } else {

    $.ajax({
      url: "http://citaslegalizaciones.mppre.gob.ve/cita/guardar_cita",
      type: "POST",
      data: dataUser,
      beforeSend: function() {
        $("#alerta").show();
        $("#alerta").html('<div><img width="2%" src="http://citaslegalizaciones.mppre.gob.ve/application/recursos/imagenes/ajax-loader_1.gif"></div>');
      },
      //Despues de enviar los datos limpiamos los campos del formulario
      success: function(respuesta) {
        // Enviamos un mensaje de exito al insertar los datos
        $("#alerta").html("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='icon fa fa-check'></i>Los Datos Fueron registrados Exitosamente</div>");
      }
    });
    //Redirijimos luego de enviar los datos 
    setInterval(function() {
      window.location.href = $("#url_respuesta").val();
    }, 3000); //Lo temporizamos a 3 segundos para mostrar el mensaje al usuario
  }
}