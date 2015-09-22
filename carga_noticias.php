<?php
	include_once("./ini_base_datos.php");
	$consulta = mysql_query("SELECT id, nombre FROM productos ORDER BY id desc LIMIT 5");
	$cont = mysql_num_rows($consulta);
	if($cont != 0)
	{
		while($cont > 0)
		{
			$fila = mysql_fetch_array($consulta);
			$nombre = $fila['nombre'];
			echo "<div style='padding-top: 10px; padding-left: 10px;' class='news_head' href='productos.php'><b>·</b>&nbsp;&nbsp;$nombre</div></br>";
			$cont--;
		}
	}
	else
	{
		echo "<a class='news_head' href='productos.php'>No hay productos nuevos</a>";
	}
?>

