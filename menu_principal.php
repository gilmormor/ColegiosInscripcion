<?php
require("clases/conexion.class.php");
require("clases/seguridad.class.php");
$objSeguridad=new seguridad;
//$objConexion=new conexion;
//$con=$objConexion->conectar();
$conexion=Db::getInstance();/*instancia la clase*/

$operacion=0; /*Se envia cero (0) a la funcion para que solo filtre por el login de Usuario*/
$retorno=$objSeguridad->validarAcceso($conexion,@$_SESSION["usuario"],$operacion);
if ($retorno>=1)
{
?>
<!DOCTYPE html>

<html lang="es">

<head>
<title id="titulo" name="titulo">Sistema</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/js/jquery-ui-1.12.1.custom/jquery-ui.min.css">
<link rel="stylesheet" href="css/estilos_nivel2.css">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<header>
  <p class="text-header" id="titulosist" name="titulosist">Sistema</p>
</header>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluit"> <!--div ajustable -->
    <div class="navbar-header"> 
      <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#opciones"> 
        <span class="icon-bar"> </span>
        <span class="icon-bar"> </span>
        <span class="icon-bar"> </span>
      </button>
      <a href="" class="navbar-brand">Softservi, C.A.</a> 
    </div>
    <div class="collapse navbar-collapse" id="opciones">  
      <ul class="nav navbar-nav">
      <?php
        $ok=$objSeguridad->crear_menu_bootstrap($conexion,$_SESSION["usuario"]);

        $bandera=0;
        $modulo="";
        while(($datos=mysql_fetch_assoc($ok))>0)
        {

          if($modulo!=$datos["nom_mod"])
          {
            if($bandera==1)
            {
              echo "</ul>";
              echo "</li>";
            }
            echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>$datos[nom_mod]<span class='caret'></span></a>";
            echo "<ul class='dropdown-menu' role='menu'>";
            $bandera=1;
          }
          echo "<li><a href=$datos[url] target='central'>$datos[nom_ope]</a></li>";
          $modulo=$datos["nom_mod"];
        }
        echo "</ul>";
        echo "</li>";
      ?>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cerrar Sesion<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?salir=1">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
      <div id='mensaje1' name='mensaje1' style='display:none;'> <!--style='display:none;'-->
        <p id='mensaje2' style='line-height: 2.1;  text-indent: 5em; text-align:right;'><font color="red">Mensaje</font></p> 
      </div>
    </div>
  </div>
</nav>

<div class="row">
  <div class="centro col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
  <!--<div class="centro"> -->
    <iframe src="" frameborder="0" id="central" name="central" width="100%" height="485px"></iframe>
  
  </div>
</div>

<footer>
  <p class="text-footer">Sistema Desarrollado por: Softservi, C.A. <a href="http://www.softservica.com" TARGET="_new">www.softservica.com</a></p>
</footer>
<!--
  <div id="dialog_carga" title="Cargando..." style="display:none;" align="center">
  <img src="imagenes/cargando.gif" alt="q" width="50" height="500px"></div>
-->

  <div id="dialog_carga" title="Cargando..."align="center">
  <div class="loader"></div></div>

  <script src="bootstrap/js/jquery-3.1.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="bootstrap/js/sessvars.js"></script>
  <script src="javascript/menu_principal.js" language="javascript" type="text/javascript"> </script>
  <script src="javascript/principal.js" language="javascript" type="text/javascript"> </script>
</body>
</html>
<?php
}
else
{
    echo "<script>
      alert('El usuario no tiene privilegion para entrar.');
      location.replace('index.php');
    </script>";
}
?>