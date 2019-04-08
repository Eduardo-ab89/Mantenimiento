<?php
include("conect.php");
print_r($_GET);//$_GET['id_tipo_servicio'];
$id = $_GET['id_tipo_servicio'];

$query = 'delete from tipo_servicio where id_tipo_servicio = "'.$id.'"';
$registros = mysqli_query($conection, $query)or die('Error en el insert' .mysqli_error());

if ($registros > 0) {
	header("location:msg.php?oki=1");
}else {
	header("location:msg.php?errord=1");
}
