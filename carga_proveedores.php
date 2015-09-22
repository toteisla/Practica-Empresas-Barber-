<?php
    include_once("./ini_base_datos.php");
    $consulta = mysql_query("SELECT id, nombre FROM proveedores");
    while($fila = mysql_fetch_array($consulta))
		{
			$nombre = $fila['nombre'];
			$id = $fila['id'];		
			echo utf8_encode("<div class='clients_logo' id='$id' ><p>$nombre</p></div>");
		}
?>
      
