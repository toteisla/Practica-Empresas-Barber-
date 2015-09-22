<?php
	$codigo = $_GET['codigo'];
    include_once("./ini_base_datos.php");
    $consulta = mysql_query("SELECT P.nombre AS nombre, F.ficha AS ficha FROM productos P, fichas F WHERE P.codigo = $codigo AND F.id_producto = P.codigo AND F.tipo = ( SELECT id FROM tipo_ficha WHERE nombre = 'tecnica' )",$db_resource);
	while($fila = mysql_fetch_array($consulta))
	{
		$nombre = $fila['nombre'];
		$ficha = $fila['ficha'];
	
		echo "<div><a href='$ficha' target='_blank' rel='rokbox[800 479]'><font color='#ee9803'>Descarga aquí - </font><img src='./images/descarga.png' width='20' height='20' float='right'/></a></div>";
	}
?>
      
