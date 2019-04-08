<?php
include"header.php";
?>

<div align="left" style="padding-left: 10px;">
	<table>
		<tr>
			<td><a href="home.php" style="color: #0a0a0a">Inicio</a> >&nbsp; </td>
			<td><a href="servicios.php" style="color: #0a0a0a" > Administrar Mantenimientos >&nbsp;</a> </td>
			<td><h1 style="color:#4fb7a9" > Editar</h1></td>
		</tr>		
	</table>	
</div>
<script type="text/javascript">
	 function eliminarReg(x){
        alert("Se eliminará el Servicio "+x);
        var r = confirm("¿Desea eliminar el registro?");
        if (r == true) {
           location.href ="eliminar_servicio.php?id_tipo_servicio="+x;
        }
    }
</script>
<div>
	<?php
		include("conect.php");
		$query = 'select * from tipo_servicio where id_tipo_servicio ='.$_GET['id_tipo_servicio'].'';
		$registros = mysqli_query($conection, $query) or die ('Error en el select' .mysqli_error());
		$i = $_GET['id_tipo_servicio'];
		$row = mysqli_num_rows($registros);
			while ($res=mysqli_fetch_array($registros)) {
				echo "	
					<div align='center'>
						<form action='actualizar_servicio.php' method='post'>
							<b>Nombre del Servicio</b>
							<br>
							<input type='text' name='n_servicio' value='".$res['nombre_servicio']."' style='text-align: center'>
							<br>
							Descripción
							<br>
							<input type='textarea' name='descripcion_servicio' value='".$res['descripcion_servicio']."' style='text-align: center'>
							<br>
							Estatus
							<br>
							<div width:'20px'>
								<select name='estatus' style='width: 30px'>";
									if ($res['activo'] == "S") {
										$selected1 = "selected";
										$selected2 = "";
									}else{
										$selected1 = "";
										$selected2 = "selected";
									}
									echo
									"<option value='S' ".$selected1." >Si</option>
									<option value='N' ".$selected2.">No</option>
								</select>
							</div>
							<br>
							<br>
							<input type='hidden' name='id_tipo_servicio' value='".$_GET['id_tipo_servicio']."'>
							<table>
								<tr align='center'>
									<td><input type='submit' class='button' value='Guardar'></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><a href='servicios.php' class='button'>Regresar</a></td>
								</tr>
							</table>							
						</form>
					</div>
					";
			}
		?>
<?php
include"footer.php";
?>