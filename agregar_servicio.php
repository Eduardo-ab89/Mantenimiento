<?php
include"header.php";
?>
<div align="center">
	<form action="guardar_servicios.php" method="post">
		Ingresa los datos solicitados a continuación
		<br>
		<br>
		Nombre del servicio:
		<br>
		<input type="text" name="n_servicio" required>
		<br>
		<br>
		Descripción del servicio:
		<br>
		<input type="textarea" name="descripcion">
		<br>
		<br>
		<table>
			<tr>
				<td><a href="servicios.php" class="button">Regresar</a></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="submit" name="Entrar" value="Entrar" class="button"></td>
			</tr>
		</table>		
	</form>
</div>
<?php
include"footer.php";
?>
