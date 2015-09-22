<?php
	$proveedor = $_GET['proveedor'];
	$familia = $_GET['familia'];
    include_once("./ini_base_datos.php");
    if($proveedor == 0 && $familia != 'vacio')
    {
		$consulta = mysql_query("SELECT codigo, nombre FROM productos WHERE familia = $familia");
	}
	else if($familia == 'vacio' && $proveedor != 0)
	{
		$consulta = mysql_query("SELECT codigo, nombre FROM productos WHERE proveedor = $proveedor");
	}
	else
	{
		$consulta = mysql_query("SELECT codigo, nombre FROM productos WHERE proveedor = '$proveedor' AND familia = '$familia'");
	}
    while($fila = mysql_fetch_array($consulta))
	{
		$nombre = $fila['nombre'];
		$id = $fila['codigo'];
		echo utf8_encode("<div id='$id' style='cursor:pointer; float:left; width:90%;'  onclick='lista_fichas(this.id); lista_fichas_tec(this.id); ponFlecha(this,\"$nombre\");'><b><font color='#ee9803'><a>-> $nombre</a></font></b></div><br /><br />");
	}
?>
