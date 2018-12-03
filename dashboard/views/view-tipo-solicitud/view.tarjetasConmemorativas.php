
<table class="table-usta">
  <tr>
    <th width="50%">Nombre conmemoración</th>
    <th width="50%">Fecha conmemoración</th>
  </tr>
  <tr>
    <td><?php echo $consulta['nombreTarjeta']; ?></td>
     <td><?php echo fecha($consulta['fechaTarjeta']); ?></td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th>Mensaje</th>
  </tr>
  <tr>
    <td><?php echo $consulta['mensaje']; ?></td>
  </tr>
</table>