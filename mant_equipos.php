<?php
include"header.php";
?>
<?php
include("conect.php");

echo"
	<div align='center'>
		<form action='guardar_mant.php' method='post'>
			<table>
				<tr>
					<td>Mantenimiento</td>
					<td>&nbsp;</td>
					<td style='padding-bottom:15px'>";
						$query = "select * from tipo_servicio where activo = 'S'";
						$registros = mysqli_query($conection, $query) or die ('Error en el select' .mysql_error());	
							if (mysqli_num_rows($registros) > 0) {
								echo"
								<select name='servicio' width='100%' style= 'text-aling:center; border-radius:7px;'>
									<option value='0' align='center'>Selecciona una opción</option>";
								while ($res = mysqli_fetch_array($registros)) {
									print "<option value='".$res['nombre_servicio']."'>".$res['nombre_servicio']."</option>";
								}
								echo "</select>";
							}
							else{
								echo "No hay servicios activos";
								}
							echo "
					</td>
				</tr>
				<br><br>
				<tr>
					<td>Equipo</td>
					<td>&nbsp;</td>
					<td style='padding-bottom:15px'>";
						$query1 = "select * from equipos where id_estatus = 1";
						$reg = mysqli_query($conection, $query1) or die( 'Error en el select' .mysqli_error());
						if(mysqli_num_rows($reg) > 0){
							echo "
							<select name='equipo' width='100%' style= 'border-radius:7px;'>
								<option value='0' align='center'>Selecciona un Equipo</option>";
							while ($res1 = mysqli_fetch_array($reg)) {
								print "<option value='".$res1['id_equipo']."'>".$res1['nombre_equipo']."</option>";
							}
							echo "</select>";
						}
						else{
							echo "No hay equipos";
						}	
					echo"
					</td>
				</tr>
				<tr>
					<td>Estatus</td>
					<td> &nbsp;</td>
					<td style='padding-bottom:15px; border-radius:20px;'>";
						$query3 = 'select * from estatus';
						$sql3 = mysqli_query($conection, $query3) or die ('Error en el select' .mysqli_error());
							if (empty($res['nombre_estatus'])) {
								echo "<select name='estatus' style= border-radius:7px;' >
								<option align='center' value='0'>Seleccione una opci&oacute;n</option>";
								while ($res3 = mysqli_fetch_array($sql3)) {
									print "<option value='".$res3['id_estatus']."'>".$res3['nombre_estatus']."</option>";							
									}
									echo "</select>";
							}elseif($res['nombre_estatus'] == "Pendiente"){
								echo "<select name='estatus' align='center' style='width:65%'>";
								while ($res3 = mysqli_fetch_array($sql3)) {
									if ($res3['nombre_estatus'] == "Pendiente") {
										$seleccionado = "selected";																
									}else{
										$seleccionado = "";																
									}
									print "<option value='".$res3['id_estatus']."' ".$seleccionado.">".$res3['nombre_estatus']."</option>";	
									}
									echo "</select>";
							}else{
								echo $res['nombre_estatus'];
							}
					echo"
					</td>
				</tr>
				<tr>
					<td>Observaciones</td>
					<td>&nbsp;</td>
					<td><input type='textarea' name='observaciones' maxlength='50' style= 'border-radius:7px;'></td>			
				</tr>				
			</table>
			<br><br>
			<input type='hidden' name='id_equipo' value='".$res1['id_equipo']."'>
			<input type='submit' value='Guardar y Salir' class='button'>
		</form>		
	</div>	
	";
?>

<?php
include"footer.php";
?>