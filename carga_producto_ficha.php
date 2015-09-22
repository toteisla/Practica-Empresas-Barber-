<?php
    include_once("./ini_base_datos.php");
    
	$consulta = mysql_query("SELECT DISTINCT codigo, nombre FROM productos P, fichas F WHERE P.codigo=F.id_producto");
	$cont = 0;
    while($fila = mysql_fetch_array($consulta))
	{
		$cont++;
		$nombre = $fila['nombre'];
		$id = $fila['codigo'];
		echo utf8_encode("$cont<div id='$id' style='cursor:pointer; float:left; width:90%;'  onclick='lista_fichas(this.id); lista_fichas_tec(this.id); ponFlecha(this,\"$nombre\");'><b><font color='#ee9803'><a>-> $nombre</a></font></b></div><br /><br />");
	}
?>
