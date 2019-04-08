
<?php
$conection = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error());
mysqli_select_db($conection,'servicio_mantenimiento') or die("No se encuentra la base de datos");
?>