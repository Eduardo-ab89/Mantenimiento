<?php
include "header.php";
?>
<div align="left" style="padding-left: 10px;">
	<table>
		<tr>
			<td><a href="home.php" style="color: #0a0a0a">Inicio</a> >&nbsp; </td>
			<td><h1 style="color:#4fb7a9" > Registrar Mantenimientos</h1></td>
		</tr>
	</table>
</div>
<br>
<br>
<div align="center">
	<table style="width: 60%">
		<tr style= "background-color: #4fb7a9;">
			<th width="5%" align="center"><b>ID<b></th>
			<th width="10%" align="center"><b>Usuario<b></th>
			<th width="25%" align="center"><b>Nombre del equipo<b></th>
			<th width="25%" align="center"><b>Servicio<b></th>
			<th width="25%" align="center"><b>Estatus<b></th>
			<th width="10%x" align="center"><b>Acciones</b></th>
		</tr>

		<?php
		include("conect.php");
		$query = 'select * from cat_equipos_usuarios as e left join cat_estatus as s on e.id_estatus = s.id_estatus';
		$registros = mysqli_query($conection, $query) or die ('Error en el select' .mysqli_error());
		$i=1;
		$c1= "#ffffff";
		while ($res=mysqli_fetch_array($registros)) {
			if ($c1 == "#ffffff") {
				$color_fondo = $c1;
				$c1 = "#eeeeee";
			}else{
				$color_fondo = $c1;
				$c1 = "#ffffff";
			}
			echo "
				<tr>
					<td colspan='6'>
						<form action='guardar_equipos.php' method='post'>
							<table style='width: 100%'>";
						//if (fmod($i, 2) == 0 ) {
						//	echo "<tr style='background-color:eeeeee'>";
						//}else{
						//	echo "<tr style='background-color:ffffff'>";
						//}
								echo "<tr style='background-color:".$color_fondo."'>";
								echo "
									<td width='5%' align='center'>".$i++."</td>
									<td width='10%' align='center'>".$res['usuario_equipo']."</td>
									<td width='25%' align='center'>".$res['nombre_equipo']."</td>
									<td width='25%' align='center'>";
										if (empty($res['servicio_equipo'])) {
											$query1 = 'select nombre_servicio from tipo_servicio where activo = "S"';
											$sql = mysqli_query($conection, $query1) or die ('Error en el select' .mysqli_error());
											if (mysqli_num_rows($sql) > 0){
												echo "<select name='servicio' align='center' style='width:65%; text-align=center'>
												<option value='0' align='center'>Seleccione una opción</option>";
												while ($res1 = mysqli_fetch_array($sql))
												  {
												    print" <option value='".$res1['nombre_servicio']."'>".$res1['nombre_servicio']."</option>";
												  }
												  echo "</select>";
											}else{
												echo"No hay servicios activos";
											}
										}else{
											echo $res['servicio_equipo'];
										}
										echo "
									</td>
									<td width='25%' align='center'>";
										$query3 = 'select * from estatus';
										$sql3 = mysqli_query($conection, $query3) or die ('Error en el select' .mysqli_error());
											if (empty($res['nombre_estatus'])) {
												echo "<select name='estatus' align='center' style='width:65%'>
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
									echo"</td>
									<td width='10%' align='center'>
										<input type='hidden' name='id_equipo' value='".$res['id_equipo']."'>
										<input type='image' name='imageField' src='iguardar.png' width='30px' heigth='30px' style='vertical-align: middle'></input>
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			";
			//$i++;
		}
		?>
	</table>
</div>
	<br>
	<br>
	<div align="center" style="padding-right: 15px;"><a href="home.php" class="button" >Regresar</a></div>
	<br>
	<br>
<?php
include"footer.php";
?>
