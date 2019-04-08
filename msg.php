<?php
include"header.php";
?>
<?php
//print_r($_GET);
if (isset($_GET['ok'])) {
	echo "El registro ha sido exitoso";
}elseif (isset($_GET['error'])) {
	echo "El registro no ha sido exitoso";
}elseif (isset($_GET['oki'])) {
	echo "Se ha eliminado el registro";
}elseif (isset($_GET['regok'])) {
	echo "El registro se actualizo correctamente";
}else{
	echo "No se ha eliminado el registro, intente de nuevo";
}
?>
<div align="center"><a href="servicios.php" class="button">Regresar</a></div>
<?php
include"footer.php";
?>