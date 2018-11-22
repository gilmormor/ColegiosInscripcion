<?php
require_once("../clases/estudiante.class.php");
require_once("../clases/utilidades.class.php");
require_once("../clases/conexion.class.php");
require_once("../clases/seguridad.class.php");
require_once("../clases/opciones.class.php");

$objestudiante=new estudiante();	
/*Instanciamos un objeto de la clase Utilidades*/
$objUtilidades=new utilidades;
//$objConexion=new conexion;
$conexion=Db::getInstance();/*instancia la clase*/

$objSeguridad=new seguridad;
$objOpcion = new opciones;

//$conexion=$objConexion->conectar();

$nombre_script=$objUtilidades->ruta_script(); //Averigua el nombre del script que se está ejecutando
//echo $nombre_script;
$num_opc = $objOpcion->devolver_cod_opc($conexion,$nombre_script); //Devuelve el código de la opción asociada al script

$retorno=$objSeguridad->validarAcceso($conexion,$_SESSION["usuario"],$num_opc);
//$retorno = 1;
if($retorno==1)
{


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Datos del Estudiante</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../bootstrap/css/alertify.min.css">
	<link type="text/css" rel="Stylesheet" href="../bootstrap/css/jquery.qtip.min.css" />
	<link rel="stylesheet" href="../bootstrap/js/jquery-ui-1.10.3/themes/base/jquery.ui.all.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/js/jqGrid-4.5.4/css/ui.jqgrid.css"/>
	<link rel="stylesheet" type="text/css" href="../bootstrap/js/jqGrid-4.5.4/css/ui.jqgrid.css"/>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-datepicker.css"/>
	<!--<link rel="stylesheet" href="../bootstrap/datepicker/css/bootstrap-datepicker.css"/>-->
	<link rel="stylesheet" href="../css/estilos_nivel2.css">
</head>
<body>

	<div class="container-fluid" >
		<div class="form-group separador-md col-xs-12 col-md-12">
			<div class="bg-primary text-center titulo text-uppercase">Datos del Estudiante</div>
		</div>	
	</div>

	<div class="container">
		<form role="form" id="datosestudiante1" >
			<div class="row">
				<div class="col-xs-12 col-sm-3">
					<div class="form-group">
						<input id="est_exp" name="est_exp" type="text" style='display:none;'>
						<label for="est_ced" type="text" class="form-group">Cédula</label>

						<input id="est_ced" name="est_ced" type="text" class="form-control" placeholder="123456789012" autofocus  maxlength="11">
						<span class="help-block"></span>
					</div>
				</div>

			</div>	
		</form>		
	</div>		

	<div class="container">
		<legend></legend>
	</div>

 	<div class="col-xs-12">
 		<button type="button" class="btn btn-primary col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4" id="btnguardar" name="btnguardar" title="Guardar - Imprimir">Guardar - Imprimir</button>
		<button type="button" class="btn btn-primary col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4" id="btnimprimir" name="btnimprimir" title="Imprimir" style='display:none;'>Imprimir</button>
		<button type="button" class="btn btn-primary col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4" id="btnprueba" name="btnprueba" title="Imprimir">Imprimir</button>
 	</div>

	<div id="inscp" class="col-xs-12">
	</div>

<!--
	<div id="dialog_cargar" title="Cargando..." style="display:none;" align="center">
	<img src="../imagenes/cargando.gif" alt="q" width="50" height="50"></div>
-->

	<div id="dialog_carga" title="Cargando..."align="center">
	<div class="loader"></div></div>


	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/js/jquery.js"></script>
	<script src="../bootstrap/js/jquery.numeric.min.js"></script>
	<script src="../bootstrap/js/alertify.js"></script>
	<script src="../bootstrap/js/livevalidation.js"></script>
	<script type="text/javascript" src="../bootstrap/js/jqGrid-4.5.4/js/grid.locale-es.js"></script>
	<script type="text/javascript" src="../bootstrap/js/jqGrid-4.5.4/js/jquery.jqGrid.min.js"></script>
	<script src="../bootstrap/js/jquery-ui-1.10.3/ui/jquery.ui.core.js"></script>
	<script src="../bootstrap/js/jquery-ui-1.10.3/ui/jquery-ui.js"></script>
	<script src="../bootstrap/js/jquery.validate.js"></script> <!--Plugin para Validar Formularios -->
	<script src="../bootstrap/js/messages_es.js"></script> <!--JS para cambiar mensaje de validación a español -->
	<script src="../bootstrap/js/bootstrap-datepicker.js"></script>
<!--	<script src="../bootstrap/datepicker/js/bootstrap-datepicker.js"></script> -->
	<script src="../bootstrap/js/sessvars.js"></script>
<!--
	<script src="../javascript/actualizar_datos_estudiantes.js" language="javascript" type="text/javascript"> </script>
-->
	<script src="../javascript/principal.js" language="javascript" type="text/javascript"> </script>

</body>
</html>
<?php
}else
{
	echo "<script>
			alert('El usuario no tiene privilegios para acceder a esta pagina');
			location.replace('../index.php');
			</script>";
}
?>
