<?php
include"header.php";
?>
<script type="text/javascript">
//	function eliminarReg(x){
		//alert("Se eliminará el Servicio "+x);
		//location.href = "eliminar_servicio.php?id_tipo_servicio="+x;
	//}
    //function eliminarReg(x){
      //  alert("Se eliminará el Servicio "+x);
        //var r = confirm("¿Desea eliminar el registro?");
        //if (r == true) {
          //  location.href ="eliminar_servicio.php?id_tipo_servicio="+x;
        //}
   // }
</script>
<div align="left" style="padding-left: 10px;">
	<table>
		<tr>
			<td><a href="home.php" style="color: #0a0a0a">Inicio</a> >&nbsp;</td>
			<td><h1 style="color:#4fb7a9" > Administrar Mantenimientos</h1></td>
		</tr>
	</table>
</div>
<br>
<br>
<div align="center">
	<table  style="width: 60%">
		<tr style= "background-color: #4fb7a9;">
			<th width="5%" align="center" ><b>No.</b></th>
			<th width="25%" align="center" ><b>Mantenimiento</b></th>
			<th width="35%" align="center" ><b>Descripción</b></th>
			<th width="20%" align="center" ><b>Estatus</b></th>
			<th width="15%" align="center" ><b>Acciones</b></th>
		</tr>
		<?php
		include("conect.php");
		$query = 'select * from cat_tipo_servicio';
		$registros = mysqli_query($conection, $query) or die ('Error en el select' .mysqli_error());
		$i=1;
		$row = mysqli_num_rows($registros);
		if ($row > 0) {
			$c1= '#ffffff';
			while ($res=mysqli_fetch_array($registros)) {
				if ($c1 == '#ffffff') {
					$color_fondo = $c1;
					$c1 = '#eeeeee';
				}else{
					$color_fondo = $c1;
					$c1 = '#ffffff';
				}
				echo "
				<tr>
					<td colspan='5'>
						<table style='width: 100%; border: 0px solid'>";
				//if (fmod($i, 2) == 0) {
				//	echo "<tr style='background-color:#eeeeee'>";
				//}else{
				//	echo "<tr style='background-color:#ffffff'>";
				//}
					echo "<tr style='background-color:".$color_fondo."'>";
					echo "
								<td width='5%' align='center'>".$i++."</td>
								<td width='25%' align='center'>".$res['nombre_servicio']."</td>
								<td width='35%' align='center'>".$res['descripcion_servicio']."</td>
								<td width='20%' align='center'>";
									if ($res['activo'] == "S") {
										echo "<img src='on.png' alt='Activo' style='width:40px; height:auto';>";
									}else{
										echo "<img src='off.png' alt='Inactivo' style='width:40px; height:auto';>";
									}
									echo "</td>
								<td width='15%' align='center'>
									<a href='editar_servicio.php?id_tipo_servicio=".$res['id_tipo_servicio']."'><img src='lapiz.png' alt='Editar' style='width:20px; height:20px';></a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				";
				//$i++;
			}
		}else {
		echo"
			<tr>
				<td colspan='5' align='center'>No hay registros</td>
			</tr>";
		}
		?>
	</table>
	<br>
	<br>
	<div>
		<table>
			<tr>
				<td><a href="home.php" class="button">Regresar</a></td>
				<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><a href="agregar_servicio.php" class="button">Agregar</a></td>
			</tr>
		</table>
		<div align="right" style="padding-right:5%;"></div>
		<div align="right" style="padding-right: 15px;"></div>
	</div>
	<br>
	<br>
<?php
include"footer.php";
?>
