<?php
	$proveedor = $_GET['proveedor'];
	$familia = $_GET['familia'];
    include_once("./ini_base_datos.php");
    if($proveedor != 0)
    {
		$cadena = "SELECT DISTINCT F.nombre as nombre,F.id as id from familia F, productos P WHERE F.id=P.familia AND P.proveedor='$proveedor';";
		$consulta = mysql_query( $cadena,$db_resource );
	}
	else
	{
		$cadena = "SELECT nombre,id from familia;";
		$consulta = mysql_query( $cadena,$db_resource );
	}
	echo "Busqueda por Familia <select id='selectFamilia' name='itemlist' size=1 onchange='lista_prod();'>";
	echo "<option value='vacio'>Selecciona una familia</option>";
    while($fila = mysql_fetch_array($consulta))
	{
		$nombre = $fila['nombre'];
		$id = $fila['id'];
		echo utf8_encode("<option value=".$fila['id'].">".$fila['nombre']."</option>");
	}
	echo "</select>";
?>
