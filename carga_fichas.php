<?php
	$codigo = $_GET['codigo'];
    include_once("./ini_base_datos.php");
    $consulta = mysql_query("SELECT P.nombre AS nombre, F.id AS ficha FROM productos P, fichas F WHERE P.codigo = $codigo AND F.id_producto = P.codigo AND F.tipo = ( SELECT id FROM tipo_ficha WHERE nombre = 'seguridad' )",$db_resource);
	while($fila = mysql_fetch_array($consulta))
	{
		$nombre = $fila['nombre'];
		$ficha = $fila['id'];
		echo utf8_encode("<div><a href='archivos.php?id=$ficha' target='_blank' ><font color='#ee9803'>Descarga aqu&iacute; - </font><img src='./images/descarga.png' width='20' height='20' float='right'/></a></div>");
	}
	mysql_free_result($consulta);
	mysql_close($db_resource);
?>
