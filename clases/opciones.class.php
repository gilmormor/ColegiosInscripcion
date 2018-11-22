<?php
class opciones
{
	function agregar_opciones($conexion,$nom_ope,$url,$fk_mod,$est_ope)
	{
		$sql="insert into operaciones(nom_ope,url,fk_mod,est_ope) values('$nom_ope','$url',$fk_mod,'$est_ope')"; //fk_mod va sin comillas porque es numerico
		//echo $sql;
		$ok=$conexion->ejecutarQuery($sql);
		return $ok;
	}
	function modificar_opciones($conexion,$id_ope,$nom_ope,$url,$fk_mod,$est_ope)
	{
		$sql="update operaciones set nom_ope='$nom_ope',url='$url',fk_mod=$fk_mod,est_ope='$est_ope' where id_ope=$id_ope"; //fk_mod va sin comillas porque es numerico
		//echo $sql;
		$ok=$conexion->ejecutarQuery($sql);
		return $ok;
	}

	function devolver_cod_opc($conexion,$url)
	{
		$sql="select id_ope from operaciones where trim(url)='$url'";
		$ok=$conexion->ejecutarQuery($sql);
		if (mysql_num_rows($ok)>0)
		{
			$datos=mysql_fetch_assoc($ok);
			//echo $datos["cod_opc"];
			return $datos["id_ope"];
			}
		return 0;
	}

}

?>