<?php
include ("conect.php");

$servicio = $_POST['servicio'];
$descripcion = $_POST['observaciones'];
$estatus = $_POST['estatus'];
$id = $_POST['equipo'];
$query = 'update equipos set servicio_equipo ="'.$servicio.'", id_estatus = '.$estatus.', descripcion_equipo = "'.$descripcion.'" where id_equipo = '.$id.' ';
$registro = mysqli_query($conection, $query) or die ('Error en el select' .mysqli_error());
//echo $query;
//print_r($_POST);
//die();

if ($query) {
	header("location:msg3.php?regok=1");		
}else {
	header("location:mant_equipos.php?error=1");
}
