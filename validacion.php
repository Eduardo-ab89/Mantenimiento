<?php
include("conect.php");
print_r($_POST);

$user = limpiarCadena($_POST['usuario']);
$pass = $_POST['contrasena'];
$pass2 =  md5($pass);
if (empty($_POST['usuario']) || empty($_POST['contrasena'])) {
	header("location:index.php?error=2");
}

function limpiarCadena($string) {
		// ----- remueve los TAG's HTML----- 
		//$string = htmlspecialchars($string,NO_QUOTES);
		$string = strip_tags($string);
		//$string = preg_replace ('/<[^>]*>/', ' ', $string); 		
		 
		// ----- remueve los caracteres de control ----- 
		/*$string = str_replace("\r", '', $string);    // --- replace with empty space
		$string = str_replace("\n", ' ', $string);   // --- replace with space
		$string = str_replace("\t", ' ', $string);   // --- replace with space*/
		
		// ----- remueve los espacios multiples ----- 
		//$string = trim(preg_replace('/ {2,}/', ' ', $string));		
			
		// ----- remueve los caracteres raros ----- 
		$string = str_replace("/",'',$string);    // --- replace with empty space
		$string = str_replace("\\",'',$string);    // --- replace with empty space
		$string = str_replace("*",'',$string);    // --- replace with empty space
		$string = str_replace("!",'',$string);    // --- replace with empty space
		$string = str_replace("¿",'',$string);    // --- replace with empty space
		$string = str_replace('"','',$string);    // --- replace with empty space
		$string = str_replace("#",'',$string);    // --- replace with empty space
		$string = str_replace("%",'',$string);    // --- replace with empty space
		$string = str_replace("$",'',$string);    // --- replace with empty space
		$string = str_replace("&",'',$string);    // --- replace with empty space
		$string = str_replace("(",'',$string);    // --- replace with empty space
		$string = str_replace(")",'',$string);    // --- replace with empty space
		$string = str_replace("=",'',$string);    // --- replace with empty space
		$string = str_replace("?",'',$string);    // --- replace with empty space
		$string = str_replace("'",'',$string);    // --- replace with empty space
		$string = str_replace("{",'',$string);    // --- replace with empty space
		$string = str_replace("}",'',$string);    // --- replace with empty space
		$string = str_replace("[",'',$string);    // --- replace with empty space
		$string = str_replace("]",'',$string);    // --- replace with empty space
		$string = str_replace(";",'',$string);    // --- replace with empty space
		//$string = str_replace(".",'',$string);    // --- replace with empty space
		$string = str_replace(",",'',$string);    // --- replace with empty space
		//$string = str_replace("-",'',$string);    // --- replace with empty space
		//$string = str_replace("_",'',$string);    // --- replace with empty space
		$string = str_replace("*",'',$string);    // --- replace with empty space
		$string = str_replace("<",'',$string);    // --- replace with empty space
		$string = str_replace(">",'',$string);    // --- replace with empty space
		
		//  -------------- CBM  ------------------------

		//$string = str_replace("--","",$string);
		$string = str_replace("^","",$string);

		// ----- remueve palabras reservadas SQL -------
		$string = str_ireplace("SELECT","",$string);
		$string = str_ireplace("COPY","",$string);
		$string = str_ireplace("DELETE","",$string);
		$string = str_ireplace("DROP","",$string);
		$string = str_ireplace("DUMP","",$string);
		//$string = str_ireplace(" OR ","",$string);
		$string = str_ireplace("%","",$string);
		$string = str_ireplace("LIKE","",$string);
		$string = str_ireplace("FROM","",$string);		
		$string = str_ireplace("DISTINCT","",$string);				
		//$string = str_ireplace("ALL","",$string);	
		$string = str_ireplace("FILE","",$string);					
		$string = str_ireplace("OUTFILE","",$string);					
		$string = str_ireplace("HAVING","",$string);
		$string = str_ireplace("INTO","",$string);	
		$string = str_ireplace("GROUP","",$string);	
		$string = str_ireplace("ORDER","",$string);		
		$string = str_ireplace("WHERE","",$string);	
		// ------------- FIN CBM  ---------------------

		$string = addslashes($string);
		return $string;
	}
//$query = 'update table usuarios set contrasena2 = "'.$pass2.'" where id_usuario = "'.     .'"';
$query = 'select * from usuarios where usuario = "'.$user.'" and contrasena = "'.$pass.'" and contrasena2 = "'.$pass2.'"';
$registros = mysqli_query($conection, $query) or die ('Error en el select' .mysqli_error());
//$res = mysqli_fetch_array($registros);
$row = mysqli_num_rows($registros);

//print_r($res) ;

if ($row > 0) {
	session_start();
	$reg = mysqli_fetch_array($registros);
	//print_r($reg);
	$_SESSION['nombre'] = $reg['nombre']." ".$reg['ap_paterno']." ".$reg['ap_materno'];
	$_SESSION['id'] = $reg['id_usuario'];
	header("location:home.php");
		
}else {
	header("location:index.php?error=1");
}