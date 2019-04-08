<?php
include"header.php";
?>
<?php
//print_r($_GET);
if (isset($_GET['regok'])) {
	echo "El registro se actualizó correctamente";
}else{
	echo "No se ha modificado el registro, intente de nuevo";
}
?>
<div align="center"><a href="mant_equipos.php" class="button">Regresar</a></div>
<?php
include"footer.php";
?>