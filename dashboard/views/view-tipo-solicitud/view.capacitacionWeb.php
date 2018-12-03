<table class="table-usta">
  <tr>
    <th width="33.333%">Nombre de la persona que tomará la capacitación</th>
    <th width="33.333%">Telefono de contacto</th>
    <th width="33.333%">Celular de contacto</th>
  </tr>
  <tr>
    <td><?php echo $consulta['nomPersona'] ?></td>
    <td><?php echo $consulta['telefonoExt'] ?></td>
    <td>
      <?php
        if (!empty($consulta['numCelular'])) {
          echo $consulta['numCelular'];
        }else{
          echo "No hay número alterno.";
        }
      ?>
    </td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th width="33.333%">Correo institucional</th>
    <th width="33.333%">Fecha sugerida</th>
    <th width="33.333%">Hora sugerida</th>
  </tr>
  <tr>
    <td><?php echo $consulta['emailCapa'] ?></td>
    <td>
      <?php
        if ($consulta['fechaCW'] == '0000-00-00') {
          echo "No hay fecha sugerida.";
        }elseif (!empty($consulta['fechaCW'])) {
          echo fecha($consulta['fechaCW']);
        }else{
          echo "No hay fecha sugerida.";
        }
      ?>
    </td>
    <td>
      <?php
        if ($consulta['horaCW'] == '00:00:00') {
           echo "No hay hora sugerida.";
        }elseif (!empty($consulta['horaCW'])) {
          echo doceHoras($consulta['horaCW']);
        }else{
          echo "No hay hora sugerida.";
        }
      ?>
    </td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th>Motívo de la capacitación</th>
  </tr>
  <tr>
    <td><?php echo $consulta['txtMotivo'] ?></td>
  </tr>
</table>