<?php
  include "header.php";
?>
<div style="padding-left: 10px;">
	<table>
		<tr align="left">
			<td><a href="home.php" style="color: #0a0a0a">Inicio</a> >&nbsp; </td>
			<td><h1 style="color:#4fb7a9">Mantenimientos</h1></td>
		</tr>
    <tr align="right">
      <td colspan="6">
        <?php
        include("conect.php");
        $query ='select * from cat_tipo_servicio where activo="S"';
        $registros =mysqli_query($conection, $query) or die ('Error en el select' .mysqli_error());
        if (mysqli_num_rows($registros) > 0){
          echo "<select name='servicio' align='center' style='width:100%; text-align=center'>
                  <option value='0' align='center'>Seleccione una opción</option>";
          while ($res = mysqli_fetch_array($registros)){
              print" <option value='".$res['id_tipo_servicio']."'>".$res['nombre_servicio']."</option>";
            }
            echo "</select>";
        }else{
          echo "No hay servicios activos";
        }
        echo "
      </td>
    </tr>
	</table>
</div>
<br>
<br>
<div align='center'>
    <table style='width: 80%'>
      <tr style='background-color: 4fb7a9;'>
        <th width='5%' align='center'>ID</th>
        <th width='10%' align='center'>Usuario</td>
        <th  width='25%' align='center'>Nombre del Equipo</th>
        <th  width='25%' align='center'>Servicio</th>
        <th  width='25%' align='center'>Estatus</th>
        <th width='10%x' align='center'>Acciones</th>
      </tr>";
      $query1 = 'select * from cat_mantenimiento_equipo';
      $registros1 = mysqli_query($conection, $query1) or die ('Error en el select' .mysqli_error());
      $c1= '#ffffff';
      if (mysqli_num_rows($registros1) > 0){
        if ($res1['id_tipo_servicio'] = $res['id_tipo_servicio']){
          while ($res1=mysqli_fetch_array($registros1)){
            if ($c1 == '#ffffff') {
    					$color_fondo = $c1;
    					$c1 = '#eeeeee';
    				} else {
    					$color_fondo = $c1;
    					$c1 = '#ffffff';
    			 }
         }
        }
      } else {
        echo "No hay registros";
      }
      echo "<tr>

    </table>
</div>";


  include "footer.php";
