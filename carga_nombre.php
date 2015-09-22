<?php
	$nombre = $_GET['nombre'];
    include_once("./ini_base_datos.php");
    $strQuery = "SELECT codigo, nombre FROM productos WHERE nombre LIKE '%$nombre%'";
    $query = mysql_query($strQuery,$db_resource);
    if(mysql_num_rows($query) > 0)
    {
		while($fila = mysql_fetch_array($query))
		{
			$nombre = $fila['nombre'];
			$codigo = $fila['codigo'];
			echo utf8_encode("<div id='$codigo' style='cursor:pointer; float:left; width:90%;'  onclick='lista_fichas(this.id); lista_fichas_tec(this.id); ponFlecha(this,\"$nombre\");'><b><font color='#ee9803'><a>-> $nombre</a></font></b></div><br /><br />");
		}
	}
	else
		echo 1;
	mysql_free_result($query);
	mysql_close($db_resource);
?>
