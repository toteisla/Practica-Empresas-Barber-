<?php
	$codigo = $_GET['codigo'];
    include_once("./ini_base_datos.php");
    $consulta = mysql_query("SELECT codigo,nombre FROM productos WHERE codigo = '$codigo'",$db_resource);
    if(mysql_num_rows($consulta) > 0)
    {
		while($fila = mysql_fetch_array($consulta))
		{
			$nombre = $fila['nombre'];
			$codigo_consulta = $fila['codigo'];
			echo utf8_encode("<div id='$codigo_consulta' style='cursor:pointer; float:left; width:90%;'  onclick='lista_fichas(this.id); lista_fichas_tec(this.id); ponFlecha(this,\"$nombre\");'><b><font color='#ee9803'><a>-> $nombre</a></font></b></div><br /><br />");
		}
	}
	else
		echo 1;
	mysql_free_result($consulta);
	mysql_close($db_resource);
?>
