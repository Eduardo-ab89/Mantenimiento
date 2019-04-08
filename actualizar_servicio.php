<?php
include("conect.php");
$servicio = $_POST['n_servicio'];
$descripcion = $_POST['descripcion_servicio'];
$estatus = $_POST['estatus'];
$id = $_POST['id_tipo_servicio'];

//die();

$query = 'update tipo_servicio set nombre_servicio="'.$servicio.'", descripcion_servicio="'.$descripcion.'", activo="'.$estatus.'" where id_tipo_servicio = "'.$id.'"';
$registros = mysqli_query($conection, $query) or die ('Error en el insert' .mysqli_error());
//$res = mysqli_fetch_array($registros);


if ($registros > 0) {
	header("location:msg.php?ok=1");		
}else {
	header("location:msg.php?error=1");
}