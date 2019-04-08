<?php
include("conect.php");
print_r($_POST);
$servicio = $_POST['servicio'];
$estatus = $_POST['estatus'];
$id = $_POST['id_equipo'];

if (isset($servicio)) {
	$query = 'update equipos set servicio_equipo ="'.$servicio.'", id_estatus = "'.$estatus.'" where id_equipo = "'.$id.'" ';
	$registros = mysqli_query($conection, $query) or die ('Error en el select' .mysqli_error());
}else{
	$query = 'update equipos set id_estatus = "'.$estatus.'" where id_equipo = "'.$id.'" ';
$registros = mysqli_query($conection, $query) or die ('Error en el select' .mysqli_error());
}
//$res = mysqli_fetch_array($registros);
//print_r($res) ;

//die();
if ($registros > 0) {
	header("location:msg1.php?regok=1");		
}else {
	header("location:index.php?error=1");
}