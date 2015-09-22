<?PHP
include_once( "./ini_base_datos.php" );
$id=$_GET['id'];
$qry = "SELECT ficha from archivos_fases where id='$id';";
$res = mysql_query($qry);
$contenido = mysql_result($res, 0, "ficha");

header("Content-type: application/pdf");
header("Content-Disposition: ; filename=\"Ficha.pdf\"");
print $contenido; 
?>
