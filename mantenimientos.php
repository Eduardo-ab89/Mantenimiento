<?php
  include "header.php";
  include("conect.php");

  $statement = mysqli_stmt_init($conection);
  if (isset($_GET['select']) && $_GET['select'] != '') {
      $select = $_GET['select'];
      mysqli_stmt_prepare($statement, "SELECT * FROM cat_mantenimiento_equipo WHERE id_tipo_servicio = ?");
      mysqli_stmt_bind_param($statement, 'i', $select);
  }else{
      mysqli_stmt_prepare($statement, "SELECT * FROM cat_mantenimiento_equipo");
  }
  $result = mysqli_stmt_execute($statement);
  $values = null;
  if($result){
    $values = $statement->get_result();
  }
  mysqli_stmt_close($statement);


  if (isset($_GET['select']) && $_GET['select'] != '') {
      $statement_not = mysqli_stmt_init($conection);
      $select = $_GET['select'];
      mysqli_stmt_prepare(
        $statement_not,
        "SELECT * FROM cat_equipos_usuarios
         WHERE id_equipo_usuario
         NOT IN (
           SELECT id_mantenimiento_equipo
           FROM cat_mantenimiento_equipo
           WHERE id_tipo_servicio = ?
         )"
      );
      mysqli_stmt_bind_param($statement_not, 'i', $select);
      $result_not = mysqli_stmt_execute($statement_not);
      $values_not = null;
      if($result_not){
        $values_not = $statement_not->get_result();
      }
      mysqli_stmt_close($statement_not);
  }
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
          $query ='select * from cat_tipo_servicio where activo="S"';
          $registros =mysqli_query($conection, $query) or die ('Error en el select' .mysqli_error());
          if (mysqli_num_rows($registros) > 0){
            echo "<select id='mantenimiento-select' name='servicio' align='center' style='width:100%; text-align=center'>
                    <option value='' align='center'>Seleccione una opción</option>";
            while ($res = mysqli_fetch_array($registros)){
              if(isset($_GET['select']) && $_GET['select'] == $res['id_tipo_servicio']){
                echo "<option selected value='".$res['id_tipo_servicio']."'>".$res['nombre_servicio']."yyy</option>";
              } else {
                echo "<option value='".$res['id_tipo_servicio']."'>".$res['nombre_servicio']."zzz</option>";
              }
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
      <thead>
        <tr style='background-color: 4fb7a9;'>
          <th width='5%' align='center'>ID</th>
          <th width='10%' align='center'>Usuario</td>
          <th width='25%' align='center'>Nombre del Equipo</th>
          <th width='25%' align='center'>Servicio</th>
          <th width='25%' align='center'>Estatus</th>
          <th width='10%x' align='center'>Acciones</th>
        </tr>
      </thead>
      <tbody>";
      $c1= '#ffffff';
      $count = 0;
      while ($row=$values->fetch_assoc()){
        if($count % 2 == 0){
          $element = "<tr style='background-color: #eeeeee'>";
        } else {
          $element = "<tr style='background-color: #ffffff'>";
        }
        $element .= "<td width='5%' aling='center';>" . $row['id_mantenimiento_equipo'] . "</td>";
        $element .= "<td width='10%' align='center';>" . $row['id_equipo_usuario'] . "</td>";
        $element .= "<td width='25%' align='center';>" . $row['id_tipo_servicio'] . "</td>";
        $element .= "<td width='25%' align='center'>" . $row['id_usuario'] . "</td>";
        $element .= "<td width='25%' align='center'>" . $row['fecha_registro'] . "</td>";
        $element .= "<td width='25%' align='center'>" . $row['id_estatus'] . "</td>";
        $element .= "<td width='10%' align='center'>" . $row['descripcion'] . "</td>";
        $element .= "</tr>";
        echo $element;
        $count++;
      }
      echo "</tbody>
    </table>
</div>";

if(isset($_GET['select']) && $_GET['select'] != ''){
  $table = '<div align="center">';
  $table .= '<table>';
  $table .= "<table style='width: 80%'>
              <thead>
                <tr style='background-color: 4fb7a9;'>
                  <th width='5%' align='center'>ID</th>
                  <th width='10%' align='center'>Usuario</td>
                  <th width='25%' align='center'>Nombre del Equipo</th>
                  <th width='25%' align='center'>Servicio</th>
                  <th width='25%' align='center'>Estatus</th>
                  <th width='25%' align='center'>Estatus</th>
                </tr>
              </thead>
              <tbody>";
  $count = 0;
  while ($row=$values_not->fetch_assoc()){
    if($count % 2 == 0){
      $table .= "<tr style='background-color: #eeeeee'>";
    } else {
      $table .= "<tr style='background-color: #ffffff'>";
    }
    $table .= "<td>" . $row['id_equipo_usuario'] . "</td>";
    $table .= "<td>" . $row['id_personal'] . "</td>";
    $table .= "<td>" . $row['nombre_equipo'] . "</td>";
    $table .= "<td>" . $row['ip_equipo'] . "</td>";
    $table .= "<td>" . $row['fecha_registro'] . "</td>";
    $table .= "<td>" . $row['activo'] . "</td>";
    $table .= "</tr>";
    $count++;
  }
  $table .= "</tbody>
</table>
</div>";

  echo $table;
}

include "footer.php";
