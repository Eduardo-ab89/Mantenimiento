<?php
include("conect.php");
//print_r($_POST);
$servicio = $_POST['n_servicio'];
$descripcion = $_POST['descripcion'];

$query = 'insert into tipo_servicio (nombre_servicio, descripcion_servicio) values ("'.$servicio.'", "'.$descripcion.'")';
$registros = mysqli_query($conection, $query) or die ('Error en el insert' .mysqli_error());
//$res = mysqli_fetch_array($registros);
//print_r($res) ;

//die();

if ($registros > 0) {
	header("location:msg.php?ok=1");		
}else {
	header("location:msg.php?error=1");
}